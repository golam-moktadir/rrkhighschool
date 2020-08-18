<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Admins extends CI_Controller {
   
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        if($this->session->yes != 'yes'){ 
          redirect("Log_in_out");
        } 
    }
    public function index(){   
        $data['all_student'] = $this->Common_model->count_all('12_insert_student_info',array("status"=>1));
        $data['all_teacher'] = $this->Common_model->count_all('13_insert_teacher_info');
        $data['all_staff'] = $this->Common_model->count_all('14_insert_staff_info');
        $data['all_book'] = $this->Common_model->count_all('42_library');
        $data['all_dormitory'] = $this->Common_model->count_all('41_insert_dormitory_info');
        $data['all_transport'] = $this->Common_model->count_all('44_transport');
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
     
    }
    public function create_base_info($id) {
        $this->load->model('Admin_model');
        $data['base_id'] = $id;
        $data['baseList'] = $this->Admin_model->get_all_base_info($id);
        $this->load->view('admin/create_base_info', $data);
        
    }
    public function insert_base_info() {
        $this->load->model('Admin_model');
        $base_id = $this->input->post('base_id');
        $this->Admin_model->user_contact = 1;
         if ($base_id == 20) {
            $gen_name = "Fixed Product Name";
        } else if ($base_id == 21) {
            $gen_name = "Cash Type";
        } else if ($base_id == 22) {
            $gen_name = "Receiver Name";
            $this->Admin_model->user_contact = $this->input->post('mobile');
        } else if ($base_id == 23) {
            $gen_name = "Damage & Repair Type";
        } else if ($base_id == 24) {
            $gen_name = "Voucher Expense Type";
        }else{
          $this->session->set_flashdata('user_insert_msg_error', 'Error');
            redirect('admins/create_base_info/' . $base_id, 'refresh');  
        }
        $this->Admin_model->bank_name = $gen_name; //Generic Name
        $this->Admin_model->bank_id = $base_id; //Generic Name
        $this->Admin_model->parts_name = $this->input->post('name');

        if ($this->Admin_model->insert_base_info()) {
            $this->session->set_flashdata('user_insert_msg', 'Creation Successfully Completed');
            redirect('admins/create_base_info/' . $base_id, 'refresh');
        } else {
            $this->session->set_flashdata('user_insert_msg_error', 'Error occured to save');
            redirect('admins/create_base_info/' . $base_id, 'refresh');
        }
    }
    public function search_asset_information() {
        $this->load->view('admin/search_asset_information');
        
    }
    public function search_asset_information_by_type() {
        $this->load->model('Admin_model');
            $asset_type = $this->input->post('asset_type');
            $date_of_issue_from = $this->input->post('date_of_issue_from');
            $date_of_issue_to = $this->input->post('date_of_issue_to');
            $assetList = $this->Admin_model->get_all_asset_info_by_asset($asset_type, $date_of_issue_from, $date_of_issue_to);
            $sl = 1;
            if ($asset_type == "1") {
                foreach ($assetList->result() as $asset) {
                    $data[] = array(
                        'sl' => $sl++,
                        'date' => $asset->fa_date, 
                        'p_name' => $asset->fa_product_name,
                        'p_model' => $asset->fa_product_model,
                        'p_brand' => $asset->fa_product_band,
                        'provider' => $asset->fa_provider,
                        'price' => $asset->fa_price,
                        'qty' => $asset->fa_quantity,
                        'amount' => $asset->fa_total_amount
                    );
                }
            } else if ($asset_type == "2") {
                foreach ($assetList->result() as $asset) {
                    $data[] = array(
                        'sl' => $sl++,
                        'date' => $asset->ca_date,
                        'cash_type' => $asset->ca_cash_type,
                        'receiver' => $asset->ca_receiver,
                        'amount' => $asset->ca_amount
                    );
                }
            } else if ($asset_type == "3") {
                foreach ($assetList->result() as $asset) {
                    $data[] = array(
                        'sl' => $sl++,
                        'date' => $asset->lsa_date,
                        'cash_type' => $asset->lsa_type,
                        'qty' => $asset->lsa_quantity,
                        'amount' => $asset->lsa_amount
                    );
                }
            } else if ($asset_type == "4") {
                foreach ($assetList->result() as $asset) {
                    $data[] = array(
                        'sl' => $sl++,
                        'date' => $asset->dra_date,
                        'p_name' => $asset->dra_product_name,
                        'p_model' => $asset->dra_product_model,
                        'p_brand' => $asset->dra_product_band,
                        'provider' => $asset->dra_provider,
                        'damage_type' => $asset->dra_damage_type,
                        'price' => $asset->dra_price,
                        'qty' => $asset->dra_quantity,
                        'amount' => $asset->dra_total_amount
                    );
                }
            }
            echo json_encode($data);
       
    }
    public function create_asset_information() {
        $this->load->view('admin/create_asset_information');        
    }
     public function insert_asset_info() {
          $this->load->model('Admin_model');
        $asset_type = $this->input->post('asset_type');
        if ($asset_type == 1) {
            $this->Admin_model->repair_type = $asset_type;
            $this->Admin_model->parts_installed_date = $this->input->post('fa_date');
            $this->Admin_model->parts_name = $this->input->post('fa_product_name');
            $this->Admin_model->parts_model = $this->input->post('fa_product_model');
            $this->Admin_model->parts_installed_vehicle_no = $this->input->post('fa_product_band');
            $this->Admin_model->parts_provider = $this->input->post('fa_provider');
            $this->Admin_model->parts_rate = $this->input->post('fa_price');
            $this->Admin_model->parts_quantity = $this->input->post('fa_quantity');
            $this->Admin_model->parts_total_amount = $this->input->post('fa_total_amount');
            //echo "here";
        } else if ($asset_type == 2) {
            $this->Admin_model->repair_type = $asset_type;
            $this->Admin_model->parts_installed_date = $this->input->post('ca_date');
            $this->Admin_model->parts_name = $this->input->post('ca_cash_type');
            $this->Admin_model->parts_model = $this->input->post('ca_amount');
            $this->Admin_model->parts_installed_vehicle_no = $this->input->post('ca_receiver');
        } else if ($asset_type == 3) {
            $this->Admin_model->repair_type = $asset_type;
            $this->Admin_model->parts_installed_date = $this->input->post('lsa_date');
            $this->Admin_model->parts_name = $this->input->post('lsa_type');
            $this->Admin_model->parts_model = $this->input->post('lsa_lost_by');
            $this->Admin_model->parts_installed_vehicle_no = $this->input->post('lsa_stolen_by');
            $this->Admin_model->parts_provider = $this->input->post('lsa_amount');
            $this->Admin_model->parts_rate = $this->input->post('lsa_quantity') == '' ? 0 : $this->input->post('lsa_stolen_by');
        } else if ($asset_type == 4) {
            $this->Admin_model->repair_type = $asset_type;
            $this->Admin_model->parts_installed_date = $this->input->post('dra_date');
            $this->Admin_model->parts_name = $this->input->post('dra_product_name');
            $this->Admin_model->parts_model = $this->input->post('dra_product_model');
            $this->Admin_model->parts_installed_vehicle_no = $this->input->post('dra_product_band');
            $this->Admin_model->parts_provider = $this->input->post('dra_provider');
            $this->Admin_model->comments = $this->input->post('dra_damage_type');
            $this->Admin_model->parts_rate = $this->input->post('dra_price');
            $this->Admin_model->parts_quantity = $this->input->post('dra_quantity');
            $this->Admin_model->parts_total_amount = $this->input->post('dra_total_amount');
        }
        if ($this->Admin_model->insert_asset_info()) {
            $this->session->set_flashdata('user_insert_msg', 'Creation Successfully Completed');
            redirect('admins/create_asset_information', 'refresh');
        } else {
            $this->session->set_flashdata('user_insert_msg_error', 'Error occured to save');
            redirect('admins/create_asset_information', 'refresh');
        }
    }
    public function delete_base_info() {
        $this->load->model('Admin_model');
        $this->Admin_model->user_id = $this->uri->segment(3);
        $this->Admin_model->deleteBaseInfo();
        $this->session->set_userdata('isdeleteUser', 'some_value');
        redirect($_SERVER['HTTP_REFERER']);   
    }
    public function user_list(){
        $users = $this->Common_model->get_all_info('users');
        $this->load->view('admin/header');
        $this->load->view('admin/users/user-list', ['users' => $users]);
        $this->load->view('admin/footer');
    }
    public function add_permession($id){
        $permission = $this->Common_model->get_single_row(['user_id' => $id], 'permissions');
        if(empty($permission->id)){
            $this->load->view('admin/header');
            $this->load->view('admin/users/add_permession',['id' => $id]);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url()."Show_edit_form/edit_permission/$id");
        }
    }
}

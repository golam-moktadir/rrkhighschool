<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Log_in_out extends CI_Controller {

    public function index() {
        $this->load->view('website/login_check');
    }
    public function login_check() {
        $this->load->model('Common_model');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        } 
        else{
            $data = $this->Common_model
                         ->get_single_row([
                                        "username" => $this->input->post('username'), 
                                         "password" => $this->input->post('password')
                                        ], 
                                         'users');
            if(empty($data->id)){
                $this->session->set_flashdata('message','Username or Password Errors');
                redirect('Log_in_out', 'refresh');
            }
            else if($data->approval_status == 10){
                $this->session->set_flashdata('message','Sorry ! Your ID is inactive now<br>Please Contact with Help Care');
                redirect('Log_in_out', 'refresh');
            }
            else{
             $permission = $this->Common_model->get_single_row(['user_id' => $data->id],'permissions');
             $this->session->set_userdata([
                                            'yes' => 'yes',
                                            'role' => $data->role,
                                            'menu' => $permission->menu,
                                            'submenu' => $permission->submenu]);
             redirect(base_url().'Admins');
            }
            // } elseif ($user_type == "accounts") {
            //     $table_name = "14_insert_staff_info";
            //     $checking_array = array("staff_unique_id" => $user_id, "password" => $password);
            //     $result = $this->Common_model->check_value_get_data($table_name, $checking_array);
            //     if ($result) {
            //         $right_data = 1;
            //         foreach ($result as $result_info) {
            //             $status = $result_info->status;
            //             $record_id = $result_info->record_id;
            //             $unique_id = $result_info->staff_unique_id;
            //             $password = $result_info->password;

            //             $library = $result_info->library;
            //             $fees_collection = $result_info->fees_collection;
            //             $accounting = $result_info->accounting;
            //             $asset_info = $result_info->asset_info;
            //             $dormitory = $result_info->dormitory;
            //         }
            //         $ses_data_permission = array(
            //             'ses_library_access' => $library,
            //             'ses_fees_collection_access' => $fees_collection,
            //             'ses_accounting_access' => $accounting,
            //             'ses_asset_info_access' => $asset_info,
            //             'ses_dormitory_access' => $dormitory
            //         );
            //         $this->session->set_userdata($ses_data_permission);
            //     }
            // } elseif ($user_type == "staff") {
            //     $table_name = "14_insert_staff_info";
            //     $checking_array = array("staff_unique_id" => $user_id, "password" => $password);
            //     $result = $this->Common_model->check_value_get_data($table_name, $checking_array);
            //     if ($result) {
            //         $right_data = 1;
            //         foreach ($result as $result_info) {
            //             $status = $result_info->status;
            //             $record_id = $result_info->record_id;
            //             $unique_id = $result_info->staff_unique_id;
            //             $password = $result_info->password;

            //             $library = $result_info->library;
            //             $fees_collection = $result_info->fees_collection;
            //             $accounting = $result_info->accounting;
            //             $asset_info = $result_info->asset_info;
            //             $dormitory = $result_info->dormitory;
            //         }
            //         $ses_data_permission = array(
            //             'ses_library_access' => $library,
            //             'ses_fees_collection_access' => $fees_collection,
            //             'ses_accounting_access' => $accounting,
            //             'ses_asset_info_access' => $asset_info,
            //             'ses_dormitory_access' => $dormitory
            //         );
            //         $this->session->set_userdata($ses_data_permission);
            //     }
            // } elseif ($user_type == "teacher") {
            //     $table_name = "13_insert_teacher_info";
            //     $checking_array = array("teacher_unique_id" => $user_id, "password" => $password);
            //     $result = $this->Common_model->check_value_get_data($table_name, $checking_array);
            //     if ($result) {
            //         $right_data = 1;
            //         foreach ($result as $result_info) {
            //             $status = $result_info->status;
            //             $record_id = $result_info->record_id;
            //             $unique_id = $result_info->teacher_unique_id;
            //             $password = $result_info->password;
            //         }
            //     }
            // } elseif ($user_type == "student") {
            //     $table_name = "12_insert_student_info";
            //     $checking_array = array("student_unique_id" => $user_id, "password" => $password);
            //     $result = $this->Common_model->check_value_get_data($table_name, $checking_array);
            //     if ($result) {
            //         $right_data = 1;
            //         foreach ($result as $result_info) {
            //             $status = $result_info->status;
            //             $record_id = $result_info->record_id;
            //             $unique_id = $result_info->student_unique_id;
            //             $password = $result_info->password;
            //         }
            //     }
            // } elseif ($user_type == "guardian") {
            //     $table_name = "15_insert_guardian_info";
            //     $checking_array = array("guardian_unique_id" => $user_id, "password" => $password);
            //     $result = $this->Common_model->check_value_get_data($table_name, $checking_array);
            //     if ($result) {
            //         $right_data = 1;
            //         foreach ($result as $result_info) {
            //             $status = $result_info->status;
            //             $record_id = $result_info->record_id;
            //             $unique_id = $result_info->guardian_unique_id;
            //             $password = $result_info->password;
            //         }
            //     }
            // }

            // if ($status == 0) {
            //     redirect('Log_in_out/block_msg', 'refresh');
            // } elseif ($right_data == 1) {
            //     $sesdata = array(
            //         'ses_record_id' => $record_id,
            //         'ses_unique_id' => $unique_id,
            //         'ses_password' => $password,
            //         'ses_user_type' => $user_type,
            //         'ses_logged' => "YES"
            //     );
            //     $this->session->set_userdata($sesdata);
            //     // shipan----update 11-05-2019
            //     $checking_array = array("status" => 1);
            //     $data['all_student'] = count($this->Common_model->check_value_get_data('12_insert_student_info', $checking_array));
            //     $data['all_teacher'] = count($this->Common_model->get_all_info('13_insert_teacher_info'));
            //     $data['all_staff'] = count($this->Common_model->get_all_info('14_insert_staff_info'));
            //     $data['all_book'] = count($this->Common_model->get_all_info('43_issue_book'));
            //     $data['all_dormitory'] = count($this->Common_model->get_all_info('41_insert_dormitory_info'));
            //     $data['all_transport'] = count($this->Common_model->get_all_info('44_transport'));

            //     $this->load->view('admin/header');
            //     $this->load->view('admin/dashboard', $data);
            //     $this->load->view('admin/footer');
            // } else {
            //     $data['wrong_msg'] = "Wrong Name/Password";
            //     $this->load->view('website/login_check', $data);
            // }
        }
    }

    public function logout() {   
        if ($this->session->has_userdata("yes")) {
            $this->session->unset_userdata(['yes','role','menu','submenu']);
            $this->session->sess_destroy();
            redirect('/Home', 'refresh');
        }
    }
}

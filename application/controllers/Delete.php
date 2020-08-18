<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Delete extends CI_Controller {
//26-06-19
    public function previous_marks() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $data['session_id'] = $this->input->post('session_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            $data['shift_id'] = $this->input->post('shift_id');
            $data['class_id'] = $this->input->post('class_id');
            $data['section_id'] = $this->input->post('section_id');
            $data['group_id'] = $this->input->post('group_id');
            $data['exam_id'] = $this->input->post('exam_id');
            $data['subject_id'] = $this->input->post('subject_id');
            // echo "<pre>";
            // print_r($data);
            // die();
            $this->Common_model->delete_where_array("26_grade_mark_management", $data);
            $this->session->set_flashdata('msg','<div class="alert alert-success">Delete Successfully</div>');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '30_income');
            redirect('Show_form/income/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '31_expense');
            redirect('Show_form/expense/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_loan_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'pf_loan_info');
            redirect('Show_form/pf_loan_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_deposit_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'pf_deposit_info');
            redirect('Show_form/pf_deposit_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'teacher_staff_salary');
            redirect('Show_form/create_salary_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_withdraw($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'bank_withdraw');
            redirect('Show_form/bank_withdraw/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_deposit($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'bank_deposit');
            redirect('Show_form/bank_deposit/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_bank_name($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'create_bank_name');
            redirect('Show_form/create_bank_name/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_sheet($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'create_salary_sheet');
            redirect('Show_form/create_salary_sheet/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function pf_deposit_info($id) {
//       $user_type = $this->session->ses_user_type;
//        if ($user_type == "admin") {
//            $this->load->model('Common_model');
//            $this->Common_model->delete_info('record_id', $id, 'pf_deposit_info');
//            redirect('Show_form/pf_deposit_info/delete', 'refresh');
//        } else {
//            $data['wrong_msg'] = "";
//            $this->load->view('website/login_check', $data);
//        }
//    }
    public function pf_create_info($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, 'pf_create_info');
            redirect('Show_form/pf_create_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_news($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '47_new_msg');
            redirect('Show_form/insert_news/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function student_dorm_allocation($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '41_student_dormitory_allocation');
            redirect('Show_form/student_dorm_allocation/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function issue_book($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '43_issue_book');
            redirect('Show_form/issue_book/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function transport($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '44_transport');
            redirect('Show_form/transport/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_book($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '42_library');
            redirect('Show_form/insert_book/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function exam_routine($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '41_exam_routine');
            redirect('Show_form/exam_routine/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function class_routine($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $result=$this->Common_model->get_single("class_routine",array("record_id"=>$id));
            $this->Common_model->delete_info('record_id', $id, 'class_routine');
            @unlink("assets/pdf/class_routine/".$result->pdf);
            redirect('Show_form/class_routine/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function class_routine_info($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $result = $this->Common_model->get_allinfo_byid('40_create_class_routine', 'record_id', $id);
            foreach ($result as $info) {
                $data_one['class_name'] = $info->class_name;
                $data_one['group_name'] = $info->group_name;
                $data_one['section_name'] = $info->section_name;
                $data_one['shift_name'] = $info->shift_name;
                $data_one['session_name'] = $info->session_name;
                $data_one['version_name'] = $info->version_name;
            }
            $data_one['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data_one['all_group'] = $this->Common_model->get_all_info('2_create_group');
            $data_one['all_section'] = $this->Common_model->get_all_info('3_create_section');
            $data_one['all_shift'] = $this->Common_model->get_all_info('4_create_shift');
            $data_one['all_session'] = $this->Common_model->get_all_info('5_create_session');
            $data_one['all_version'] = $this->Common_model->get_all_info('6_create_version');
            $data_one['msg'] = "Deleted Successfuly";

            $this->Common_model->delete_info('record_id', $id, '40_create_class_routine');

            $this->load->view('admin/header');
            $this->load->view('admin/60_edit_class_routine_reload', $data_one);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class_time($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '39_create_time');
            redirect('Show_form/create_class_time/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function board_of_directors($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '38_board_of_directors');
            redirect('Show_form/board_of_directors/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function notice($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '37_notice');
            setMessage("msg","success","Successfully");
            redirect('Show_form/notice');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function syllabus($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '36_syllabus');
            redirect('Show_form/syllabus/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function booklist($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '35_booklist');
            redirect('Show_form/booklist/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function governing_body_profile($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '34_governing_body_profile');
            setMessage("msg","success","Successfully.");
            redirect('Show_form/governing_body_profile');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function photo_gallery($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '33_photo_gallery');
            setMessage("msg","success","Delete Successfully!");
            redirect('Show_form/photo_gallery');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function single_page_content($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '32_single_page_content');
            setMessage("msg","success","Delete Successfuly!");
            redirect('Show_form/single_page_content');
        } else { 
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '1_create_class');
            redirect('Show_form/create_class/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_group($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '2_create_group');
            redirect('Show_form/create_group/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_section($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '3_create_section');
            redirect('Show_form/create_section/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_shift($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '4_create_shift');
            redirect('Show_form/create_shift/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_session($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '5_create_session');
            redirect('Show_form/create_session/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_version($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '6_create_version');
            redirect('Show_form/create_version/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_subject($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '7_create_subject');
            redirect('Show_form/create_subject/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_exam_type($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '8_create_exam_type');
            redirect('Show_form/create_exam_type/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_exam_grade($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '9_create_exam_grade');
            redirect('Show_form/create_exam_grade/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_designation($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '11_create_designation');
            redirect('Show_form/create_designation/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function teacher_subject_management($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '25_teacher_subject_management');
            $this->session->set_flashdata('msg','<div class="alert alert-success">Delete Successfully</div>');
            redirect('Show_form/teacher_subject_management/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function academic_calendar($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $result = $this->Common_model->get_allinfo_byid('23_academic_calendar', 'record_id', $id);
            foreach ($result as $info) {
                $file_type = $info->file_type;
            }
            if ($file_type == "Image") {
                unlink('./assets/img/academic_calendar/' . $id . '.jpg');
            } elseif ($file_type == "PDF") {
                unlink('./assets/pdf/academic_calendar/' . $id . '.pdf');
            }
            $this->Common_model->delete_info('record_id', $id, '23_academic_calendar');
            redirect('Show_form/academic_calendar/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dorm($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '41_insert_dormitory_info');
            redirect('Show_form/dorm_info/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function sms($id) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '46_create_sms');
            redirect('Show_form/create_sms/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fee_head($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '10_create_fee_head');
            redirect('Show_form/create_fees_heads/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fee_settings($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '10_1_class_fee');
            redirect('Show_form/fee_settings/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function income_head($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '28_income_head');
            redirect('Show_form/create_income_head/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense_head($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '29_expense_head');
            redirect('Show_form/create_expense_head/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_income_head($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '41_hall_income_head');
            redirect('Show_form/hall_create_income_head/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_expense_head($id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->Common_model->delete_info('record_id', $id, '41_hall_expense_head');
            redirect('Show_form/hall_create_expense_head/delete', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

}

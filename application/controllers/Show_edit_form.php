<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Show_edit_form extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model','common_model',true);
    }
    public function transport($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('44_transport');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('44_transport', 'record_id', $id);
            $data['msg']=$msg;
            $this->load->view('admin/header');
            $this->load->view('admin/42_edit_transport', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function issue_book($id, $msg=null) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('43_issue_book');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('43_issue_book', 'record_id', $id);
            $data['msg']=$msg;
            $this->load->view('admin/header');
            $this->load->view('admin/41_edit_issue_book', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function insert_book($id, $msg=null) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('42_library');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('42_library', 'record_id', $id);
            $data['msg']=$msg;
            $this->load->view('admin/header');
            $this->load->view('admin/40_edit_insert_book', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function exam_routine($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('41_exam_routine', 'record_id', $id);
            $data['all_value'] = $this->Common_model->get_all_info('41_exam_routine');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/61_edit_exam_routine', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function class_routine($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('class_routine', 'record_id', $id);
            $data['all_value'] = $this->Common_model->get_all_info('class_routine');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/edit_class_routine', $data);
            $this->load->view('admin/footer');
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
                $class_name = $info->class_name;
                $data_one['record_id'] = $info->record_id;
                $data_one['class_day'] = $info->class_day;
                $data_one['class_time'] = date('h:i A', strtotime($info->class_time));
                $data_one['subject_name'] = $info->subject_name;
                $data_one['teacher_name'] = $info->teacher_name;
                $data_one['teacher_id'] = $info->teacher_id;
            }
            $data_one['all_class_time'] = $this->Common_model->get_allinfo_byid('39_create_time', 'class_name', $class_name);
            $data_one['all_subject'] = $this->Common_model->get_distinct_subject_classwise($class_name);
            $result_teacher = $this->Common_model->get_distinct_teacher_id_classwise($class_name);
            $count = 0;
            foreach ($result_teacher as $teacher_info) {
                $count++;
                $teacher_unique_id = $teacher_info->teacher_unique_id;
                $result_name = $this->Common_model->get_allinfo_byid('13_insert_teacher_info', 'teacher_unique_id', $teacher_unique_id);
                foreach ($result_name as $info_name) {
                    $teacher_name = $info_name->name;
                }
                $data_one['single_teacher_id' . $count] = $teacher_unique_id;
                $data_one['single_teacher_name' . $count] = $teacher_name;
            }
            $data_one['count_it'] = $count;

            $this->load->view('admin/header');
            $this->load->view('admin/60_edit_class_routine_info', $data_one);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class_time($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['all_value'] = $this->Common_model->get_all_info_orderby('39_create_time', 'class_name', 'ASC');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('39_create_time', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/57_edit_create_time', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function board_of_directors($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('38_board_of_directors');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('38_board_of_directors', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/51_edit_board_of_directors', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function notice($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('37_notice', 'record_id', $id);
            $data['all_value'] = $this->Common_model->get_all_info('37_notice');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/50_edit_notice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function syllabus($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('36_syllabus', 'record_id', $id);
            $data['all_value'] = $this->Common_model->get_all_info('36_syllabus');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/49_edit_syllabus', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function booklist($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_group'] = $this->Common_model->get_all_info('2_create_group');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('35_booklist', 'record_id', $id);
            $data['all_value'] = $this->Common_model->get_all_info('35_booklist');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/48_edit_booklist', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function governing_body_profile($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('34_governing_body_profile');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('34_governing_body_profile', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/47_edit_governing_body_profile', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function single_page_content($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info_orderby('34_governing_body_profile',"position","asc");
            $data['one_value'] = $this->Common_model->get_allinfo_byid('34_governing_body_profile', 'record_id', $id);
            $this->load->view('admin/header');
            $this->load->view('admin/45_edit_single_page_content', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('1_create_class');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('1_create_class', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/1_edit_create_class', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_group($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('2_create_group');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('2_create_group', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/2_edit_create_group', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_section($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('3_create_section');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('3_create_section', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/3_edit_create_section', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_shift($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('4_create_shift');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('4_create_shift', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/4_edit_create_shift', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_session($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('5_create_session');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('5_create_session', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/5_edit_create_session', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_version($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('6_create_version');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('6_create_version', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/6_edit_create_version', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function create_subject($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_subject'] = $this->Common_model->get_all_subject();
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['single']=$this->Common_model->get_all_subject($id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/7_edit_create_subject', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function create_exam_type($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_session'] = $this->Common_model->get_all_info('5_create_session');
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['single'] = $this->Common_model->get_single('8_create_exam_type',array("record_id"=>$id));
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/8_edit_create_exam_type', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_exam_grade($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('9_create_exam_grade');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('9_create_exam_grade', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/9_edit_create_exam_grade', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_designation($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('11_create_designation');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('11_create_designation', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/11_edit_create_designation', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_student_info($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->Common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->Common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->Common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->Common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->Common_model->get_all_info('6_create_version');
            // $data['all_subject'] = $this->Common_model->get_all_info('7_create_subject');

            $data['all_value'] = $this->Common_model->get_all_info('12_insert_student_info');

            $data['one_value'] = $this->Common_model->get_allinfo_byid('12_insert_student_info', 'record_id', $id);
            
            $data['msg'] = $msg;
            $class_id=$this->Common_model->get_single("1_create_class",array("class_name"=>$data["one_value"][0]->class_name),'record_id')->record_id;

            $data['all_subject']=$this->Common_model->get_list("7_create_subject","subject_name,record_id",array("class_id"=>$class_id));
            // debug_r($data['all_subject']);

            $this->load->view('admin/header');
            $this->load->view('admin/12_edit_insert_student_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_teacher_info($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_session'] = $this->Common_model->get_all_info('5_create_session');
            $data['all_designation'] = $this->Common_model->get_all_info('11_create_designation');
            $data['all_value'] = $this->Common_model->get_all_info('13_insert_teacher_info');

            $data['one_value'] = $this->Common_model->get_allinfo_byid('13_insert_teacher_info', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/17_edit_insert_teacher_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_staff_info($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_session'] = $this->Common_model->get_all_info('5_create_session');
            $data['all_designation'] = $this->Common_model->get_all_info('11_create_designation');
            $data['all_value'] = $this->Common_model->get_all_info('14_insert_staff_info');

            $data['one_value'] = $this->Common_model->get_allinfo_byid('14_insert_staff_info', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/56_edit_insert_staff_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_guardian_info($id, $msg=null) {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_student'] = $this->Common_model->get_all_info('12_insert_student_info');
            $data['all_session'] = $this->Common_model->get_all_info('5_create_session');
            $data['all_value'] = $this->Common_model->get_all_info('15_insert_guardian_info');

            $data['one_value'] = $this->Common_model->get_allinfo_byid('15_insert_guardian_info', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/19_edit_insert_guardian_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
public function dorm_info($id, $msg=null) {
      $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('41_insert_dormitory_info');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('41_insert_dormitory_info', 'record_id', $id);
            $data['msg']=$msg;
            $this->load->view('admin/header');
            $this->load->view('admin/43_edit_dorm_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function sms($id, $msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $data['all_value'] = $this->Common_model->get_all_info('46_create_sms');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('46_create_sms', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/63_edit_sms', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function fee_settings($id, $msg=null)
    {
       $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data['all_fee_head'] = $this->Common_model->get_all_info('10_create_fee_head');
            $data['all_value'] = $this->Common_model->get_all_info('10_1_class_fee');
            $data['one_value'] = $this->Common_model->get_allinfo_byid('10_1_class_fee', 'record_id', $id);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/32_edit_fee_settings', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function edit_online_class($id,$msg=null){
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('online_class');
            $data['classes'] = $this->common_model->get_all_info('1_create_class');
            $data['groups'] = $this->common_model->get_all_info('2_create_group');
            $data['subjects'] = $this->common_model->get_all_info('7_create_subject');
            $data['sections'] = $this->common_model->get_all_info('3_create_section');
            $data['one_class'] = $this->common_model->get_single_row(['record_id' => $id],'online_class');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/online_class/edit_online_class', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function edit_alumni($id){
        if ($this->session->userdata('ses_user_type') == "admin") {
         $alumni = $this->common_model->get_single_row(['id' => $id],'alumni_list');
         $this->load->view('admin/header');
         $this->load->view('admin/alumni/edit_alumni',['alumni' => $alumni]);
         $this->load->view('admin/footer');
        }
        else{
         $this->session->set_flashdata('message','You can not edit any information');
         redirect('Show_form/loadRecord', 'refresh');
        }
    }
    public function edit_permission($id){
        $permission = $this->common_model->get_single_row(['user_id' => $id], 'permissions');
        $menu = explode('@',$permission->menu);
        $submenu = explode('@',$permission->submenu);
        $this->load->view('admin/header');
        $this->load->view('admin/users/edit_permession',['menu'=>$menu, 
                                                        'submenu'=>$submenu, 
                                                        'id'=>$id]);
        $this->load->view('admin/footer');
    }
}

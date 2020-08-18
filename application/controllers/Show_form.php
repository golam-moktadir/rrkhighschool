<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Show_form extends CI_Controller
{
    //26-06-19
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model',"common_model",true);
        $this->load->library('pagination');
    }
    public function backup($msg=null){
        
        if ($this->session->role == "admin" || $this->session->role == "staff") {
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/backup', $data);
            $this->load->view('admin/footer');
        } 
        else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
     public function print_fee_collection($invoice_no){
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $result = $this->common_model->get_allinfo_byid('10_3_fee_collection', 'invoice_id', $invoice_no);
            $onetime = 0;
            foreach ($result as $info) {
                $onetime++;
                if ($onetime == 1) {
                    $data["sl" . $onetime] = $onetime;
                    $data["invoice_no"] = $info->invoice_id;
                    $data["inserted_by"] = $info->inserted_by;

                    if ($info->inserted_by == "admin") {
                        $inserted_name_result = $this->common_model->one_column_one_info('name', 'admin_unique_id', $info->inserted_by, '0_admin');
                        foreach ($inserted_name_result as $inserted_name_info) {
                            $data["inserted_by_name"] = $inserted_name_info->name;
                        }
                    } else {
                        $inserted_name_result = $this->common_model->one_column_one_info('name', 'staff_unique_id', $info->inserted_by, '14_insert_staff_info');
                        foreach ($inserted_name_result as $inserted_name_info) {
                            $data["inserted_by_name"] = $inserted_name_info->name;
                        }
                    }
                    $data["student_id"] = $info->student_id;
                    $student = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $info->student_id);
                    foreach ($student as $st) {
                        $student_name = $st->name;
                        $class = $st->class_name;
                        $group = $st->group_name;
                        $roll = $st->roll;
                    }
                    $data["student_name"] = $student_name;
                    $data["class"] = $class;
                    $data["group"] = $group;
                    $data["roll"] = $roll;
                    $data["date"] = $info->insertion_date;
                    $data["description" . $onetime] = $info->description;
                    $data["amount" . $onetime] = $info->amount;
                    $data["quantity" . $onetime] = $info->quantity;
                    $data["tuition_discount" . $onetime] = $info->tuition_discount;
                    $data["discount"] = $info->discount;
                    $data["total"] = $info->total;
                    $data["payment"] = $info->payment;
                    $data["due"] = $info->due;
                } else {
                    $data["sl" . $onetime] = $onetime;
                    $data["description" . $onetime] = $info->description;
                    $data["amount" . $onetime] = $info->amount;
                    $data["quantity" . $onetime] = $info->quantity;
                    $data["tuition_discount" . $onetime] = $info->tuition_discount;
                }
            }
            $data["c"] = $onetime;
            $this->load->view('admin/header');
            $this->load->view('admin/print_fee_collection', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_info($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_designation'] = $this->common_model->get_all_info('11_create_designation');
            $data['all_teacher'] = $this->common_model->get_all_info('13_insert_teacher_info');
            $data['all_staff'] = $this->common_model->get_all_info('14_insert_staff_info');
            $data['all_value'] = $this->common_model->get_all_info('teacher_staff_salary');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_salary_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_report($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_bank'] = $this->common_model->get_bank_name();
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/bank_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_bank_name($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('create_bank_name');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_bank_name', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_deposit($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_bank'] = $this->common_model->get_all_info('create_bank_name');
            $data['all_value'] = $this->common_model->get_all_info('bank_deposit');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/bank_deposit', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_withdraw($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_bank'] = $this->common_model->get_all_info('create_bank_name');
            $data['all_value'] = $this->common_model->get_all_info('bank_withdraw');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/bank_withdraw', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_sheet($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_teacher'] = $this->common_model->get_all_info('13_insert_teacher_info');
            $data['all_staff'] = $this->common_model->get_all_info('14_insert_staff_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/create_salary_sheet', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_report($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_teacher_staff'] = $this->common_model->get_all_info('pf_create_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/pf_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_loan_info($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_teacher_staff'] = $this->common_model->get_all_info('pf_create_info');
            $data['all_value'] = $this->common_model->get_all_info('pf_loan_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/pf_loan_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_deposit_info($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_teacher_staff'] = $this->common_model->get_all_info('pf_create_info');
            $data['all_value'] = $this->common_model->get_all_info('pf_deposit_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/pf_deposit_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_create_info($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_designation'] = $this->common_model->get_all_info('11_create_designation');
            $data['all_teacher'] = $this->common_model->get_all_info('13_insert_teacher_info');
            $data['all_staff'] = $this->common_model->get_all_info('14_insert_staff_info');
            $data['all_value'] = $this->common_model->get_all_info('pf_create_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/pf_create_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_news($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('47_new_msg');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/65_insert_news', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function student_id_card($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/13_student_id_card', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function teacher_id_card($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_teacher'] = $this->common_model->get_all_info('13_insert_teacher_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/18_teacher_id_card', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function publish_result_status($msg=null)
    {
        $data['all_class'] = $this->common_model->get_all_info('1_create_class');
        $data['all_group'] = $this->common_model->get_all_info('2_create_group');
        $data['all_section'] = $this->common_model->get_all_info('3_create_section');
        $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
        $data['all_session'] = $this->common_model->get_all_info('5_create_session');
        $data['all_exam_type'] = $this->common_model->group_by_one_column('exam_type', '8_create_exam_type');
        $data['all_value'] = $this->common_model->get_published_result();
        $data['msg'] = $msg;
        
        $this->load->view('admin/header');
        $this->load->view('admin/publish_result_status', $data);
        $this->load->view('admin/footer');
    }
//26-06-19
    public function student_admit_card($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_exam_type'] = $this->common_model->group_by_one_column('exam_type', '8_create_exam_type');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/14_student_admit_card', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function student_mark_sheet($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_exam_type'] = $this->common_model->group_by_one_column('exam_type', '8_create_exam_type');
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/15_student_mark_sheet', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function transport($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('44_transport');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/42_transport', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function issue_book($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('43_issue_book');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_book'] = $this->common_model->get_all_info('42_library');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/41_issue_book', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_book($msg=null)
    {
        $user_type = $this->session->role;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('42_library');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/40_insert_book', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function exam_routine($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_value'] = $this->common_model->get_all_info('41_exam_routine');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/61_exam_routine', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function class_routine($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_value'] = $this->common_model->get_all_info('class_routine');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/class_routine', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function edit_class_routine($msg=null)
    {
        if ($this->session->role == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/60_edit_class_routine', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function view_class_routine()
    {
//Getting Class Time Only
        $cur_year = date('Y');
        $prev_year = date('Y', strtotime('-1 Year'));
        $column_with_value_array = array(
            'session_name' => $cur_year
        );
        $data['all_class_time'] = $this->common_model->get_routine_time($column_with_value_array);
// print_r($data['all_class_time']);
        $total_class_number = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $total_class_number++;
        }
//Saturday
        $count = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $count++;
            $day_check = array(
                'class_time' => $single_time->class_time,
                'class_day' => "Saturday"
            );
            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
            $day_subject = "";
            $day_teacher_name = "";
            if (!empty($result_day)) {
                foreach ($result_day as $info_day) {
                    $show_class = $info_day->class_name;
                    if ($show_class == 9 || $show_class == 10) {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $this->initials($info_day->group_name) . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    } else {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $info_day->section_name . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    }
                }
            } else {
                $day_subject = "";
                $day_teacher_name = "";
            }
            $data['saturday_subject' . $count] = $day_subject;
            $data['saturday_teacher_name' . $count] = $day_teacher_name;
        }
//Sunday
        $count = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $count++;
            $day_check = array(
                'class_time' => $single_time->class_time,
                'class_day' => "Sunday"
            );
            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
            $day_subject = "";
            if (!empty($result_day)) {
                foreach ($result_day as $info_day) {
                    $show_class = $info_day->class_name;
                    if ($show_class == 9 || $show_class == 10) {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $this->initials($info_day->group_name) . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    } else {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $info_day->section_name . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    }
                }
            } else {
                $day_subject = "";
                $day_teacher_name = "";
            }
            $data['sunday_subject' . $count] = $day_subject;
            $data['sunday_teacher_name' . $count] = $day_teacher_name;
        }
//Monday
        $count = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $count++;
            $day_check = array(
                'class_time' => $single_time->class_time,
                'class_day' => "Monday"
            );
            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
            $day_subject = "";
            if (!empty($result_day)) {
                foreach ($result_day as $info_day) {
                    $show_class = $info_day->class_name;
                    if ($show_class == 9 || $show_class == 10) {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $this->initials($info_day->group_name) . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    } else {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $info_day->section_name . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    }
                }
            } else {
                $day_subject = "";
                $day_teacher_name = "";
            }
            $data['monday_subject' . $count] = $day_subject;
            $data['monday_teacher_name' . $count] = $day_teacher_name;
        }
//Tuesday
        $count = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $count++;
            $day_check = array(
                'class_time' => $single_time->class_time,
                'class_day' => "Tuesday"
            );
            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
            $day_subject = "";
            if (!empty($result_day)) {
                foreach ($result_day as $info_day) {
                    $show_class = $info_day->class_name;
                    if ($show_class == 9 || $show_class == 10) {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $this->initials($info_day->group_name) . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    } else {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $info_day->section_name . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    }
                }
            } else {
                $day_subject = "";
                $day_teacher_name = "";
            }
            $data['tuesday_subject' . $count] = $day_subject;
            $data['tuesday_teacher_name' . $count] = $day_teacher_name;
        }
//Wednesday
        $count = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $count++;
            $day_check = array(
                'class_time' => $single_time->class_time,
                'class_day' => "Wednesday"
            );
            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
            $day_subject = "";
            if (!empty($result_day)) {
                foreach ($result_day as $info_day) {
                    $show_class = $info_day->class_name;
                    if ($show_class == 9 || $show_class == 10) {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $this->initials($info_day->group_name) . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    } else {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $info_day->section_name . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    }
                }
            } else {
                $day_subject = "";
                $day_teacher_name = "";
            }
            $data['wednesday_subject' . $count] = $day_subject;
            $data['wednesday_teacher_name' . $count] = $day_teacher_name;
        }
//Thursday
        $count = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $count++;
            $day_check = array(
                'class_time' => $single_time->class_time,
                'class_day' => "Thursday"
            );
            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
            $day_subject = "";
            if (!empty($result_day)) {
                foreach ($result_day as $info_day) {
                    $show_class = $info_day->class_name;
                    if ($show_class == 9 || $show_class == 10) {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $this->initials($info_day->group_name) . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    } else {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $info_day->section_name . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    }
                }
            } else {
                $day_subject = "";
                $day_teacher_name = "";
            }
            $data['thursday_subject' . $count] = $day_subject;
            $data['thursday_teacher_name' . $count] = $day_teacher_name;
        }
//Friday
        $count = 0;
        foreach ($data['all_class_time'] as $single_time) {
            $count++;
            $day_check = array(
                'class_time' => $single_time->class_time,
                'class_day' => "Friday"
            );
            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
            $day_subject = "";
            if (!empty($result_day)) {
                foreach ($result_day as $info_day) {
                    $show_class = $info_day->class_name;
                    if ($show_class == 9 || $show_class == 10) {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $this->initials($info_day->group_name) . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    } else {
                        $day_subject = $day_subject . "" . $info_day->subject_name . " " . $info_day->section_name . " " . $this->initials($info_day->teacher_name) . " "
                            . "(C-" . $show_class . ")<br>";
                    }
                }
            } else {
                $day_subject = "";
                $day_teacher_name = "";
            }
            $data['friday_subject' . $count] = $day_subject;
            $data['friday_teacher_name' . $count] = $day_teacher_name;
        }
        $data['total_class'] = $total_class_number;
        $this->load->view('admin/header');
        $this->load->view('admin/59_show_class_routine', $data);
        $this->load->view('admin/footer');
    }

    public function initials($str)
    {
        $words = explode(" ", $str);
        $initials = null;
        if (!empty($words)) {
            foreach ($words as $w) {
                if (!empty($w)) {
                    $initials .= $w[0];
                }
            }
            return $initials;
        } else {
            return "";
        }
    }

    public function create_class_routine($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/58_create_class_routine', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class_time($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_value'] = $this->common_model->get_all_info_orderby('39_create_time', 'class_name', 'ASC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/57_create_time', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function board_of_directors($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('38_board_of_directors');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/51_board_of_directors', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function notice($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info_orderby('37_notice', 'user_title', 'ASC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/50_notice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function syllabus($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_value'] = $this->common_model->get_all_info('36_syllabus');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/49_syllabus', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function booklist($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_value'] = $this->common_model->get_all_info_orderby('35_booklist', 'group_name', 'DESC');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/48_booklist', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function governing_body_profile($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info_orderby('34_governing_body_profile',"position","asc");
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/47_governing_body_profile', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function photo_gallery($msg=null){
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('33_photo_gallery');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/46_photo_gallery', $data);
            $this->load->view('admin/footer');
        } 
        else {
            redirect('Web_Ct/login', 'refresh');
        }
    }

    public function single_page_content($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('32_single_page_content');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/45_single_page_content', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('1_create_class');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/1_create_class', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_group($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('2_create_group');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/2_create_group', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_section($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('3_create_section');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/3_create_section', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_shift($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('4_create_shift');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/4_create_shift', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_session($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('5_create_session');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/5_create_session', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_version($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('6_create_version');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/6_create_version', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function create_subject($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_subject'] = $this->common_model->get_all_subject();
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/7_create_subject', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function create_exam_type($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_value'] = $this->common_model->get_exam_type();
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/8_create_exam_type', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_exam_grade($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('9_create_exam_grade');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/9_create_exam_grade', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_designation($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('11_create_designation');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/11_create_designation', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_student_info($msg=null, $recent_page_number)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_subject'] = $this->common_model->get_all_info('7_create_subject');

//Getting Page Number Info.
            $limit = 50;
            $offset = ($recent_page_number - 1) * $limit;
            $total_row = count($this->common_model->get_all_info('12_insert_student_info'));

            $data['first_count'] = $total_row;
            $data['recent_page_number'] = $recent_page_number;
            $data['all_value'] = $this->common_model->get_student_info_order_by('12_insert_student_info');

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/12_insert_student_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function search_student()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_exam_type'] = $this->common_model->group_by_one_column('exam_type', '8_create_exam_type');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $this->load->view('admin/header');
            $this->load->view('admin/16_search_student', $data);
            $this->load->view('admin/footer');
        } elseif ($user_type == "student") {
            $record_id = $this->session->ses_record_id;
            $data['one_value'] = $this->common_model->get_allinfo_byid('12_insert_student_info', 'record_id', $record_id);
            $this->load->view('admin/header');
            $this->load->view('admin/16_search_student_login', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_teacher_info($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_designation'] = $this->common_model->get_all_info('11_create_designation');
            $data['all_value'] = $this->common_model->get_all_info_orderby('13_insert_teacher_info',"record_id","desc");
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/17_insert_teacher_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function search_teacher()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('13_insert_teacher_info');
            $this->load->view('admin/header');
            $this->load->view('admin/18_search_teacher', $data);
            $this->load->view('admin/footer');
        } elseif ($user_type == "teacher") {
            $record_id = $this->session->ses_record_id;
            $data['one_value'] = $this->common_model->get_allinfo_byid('13_insert_teacher_info', 'record_id', $record_id);
            $this->load->view('admin/header');
            $this->load->view('admin/18_search_teacher_login', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_staff_info($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_designation'] = $this->common_model->get_all_info('11_create_designation');
            $data['all_value'] = $this->common_model->get_all_info('14_insert_staff_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/56_insert_staff_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function search_staff()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('14_insert_staff_info');
            $this->load->view('admin/header');
            $this->load->view('admin/56_search_staff', $data);
            $this->load->view('admin/footer');
        } elseif ($user_type == "staff" || $user_type == "accounts") {
            $record_id = $this->session->ses_record_id;
            $data['one_value'] = $this->common_model->get_allinfo_byid('14_insert_staff_info', 'record_id', $record_id);
            $this->load->view('admin/header');
            $this->load->view('admin/56_search_staff_login', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_guardian_info($msg, $recent_page_number)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');

//Getting Page Number Info.
            $limit = 50;
            $offset = ($recent_page_number - 1) * $limit;
            $total_row = count($this->common_model->get_all_info('15_insert_guardian_info'));
            if ($total_row % $limit == 0) {
                $data['total_page_num'] = $total_row / $limit;
            } else {
                $data['total_page_num'] = intval($total_row / $limit) + 1;
            }
            $data['first_count'] = $offset;
            $data['recent_page_number'] = $recent_page_number;
            $data['all_value'] = $this->common_model->get_all_info_limit_offset('15_insert_guardian_info', $limit, $offset);

            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/19_insert_guardian_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function search_guardian()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('15_insert_guardian_info');
            $this->load->view('admin/header');
            $this->load->view('admin/20_search_guardian', $data);
            $this->load->view('admin/footer');
        } elseif ($user_type == "guardian") {
            $record_id = $this->session->ses_record_id;
            $data['one_value'] = $this->common_model->get_allinfo_byid('15_insert_guardian_info', 'record_id', $record_id);
            $this->load->view('admin/header');
            $this->load->view('admin/20_search_guardian_login', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function teacher_subject_management($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_subject'] = $this->common_model->get_all_info('7_create_subject');
            $data['all_teacher'] = $this->common_model->get_all_info('13_insert_teacher_info');

            $data['all_value'] = $this->common_model->get_teacher_subject();
            // echo "<pre>";
            // print_r($data['all_value']);
            // die();
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/21_teacher_sub_management', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function academic_calendar($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('23_academic_calendar');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/22_academic_calendar', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function student_attendance($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_class_time'] = $this->common_model->get_all_info('39_create_time');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/23_student_attendance', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function attendance_report($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/24_attendance_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function teacher_staff_attendance($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/25_teacher_staff_attendance', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function staff_attendance()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->view('admin/header');
            $this->load->view('admin/26_staff_attendance');
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function teacher_staff_attendance_report()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->view('admin/header');
            $this->load->view('admin/27_teacher_staff_attendance_report');
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_marks_by_sms()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
// $data['all_value']=$this->common_model->get_all_info('26_grade_mark_management');
            $data['all_exam_type'] = $this->common_model->group_by_one_column('exam_type', '8_create_exam_type');
            $this->load->view('admin/header');
            $this->load->view('admin/30_send_marks_by_sms', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_fees_heads($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('10_create_fee_head');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/31_create_fees_heads', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fee_settings($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_fee_head'] = $this->common_model->get_all_info('10_create_fee_head');
            $data['all_value'] = $this->common_model->get_all_info('10_1_class_fee');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/32_fee_settings', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fee_collection($msg=null) 
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_value'] = $this->common_model->get_all_info('10_2_fee_collection');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/33_fee_collection', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function update_collection_report()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_collection_staff'] = $this->common_model->get_all_info('14_insert_staff_info');
            $this->load->view('admin/header');
            $this->load->view('admin/34_update_collection_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function collection_report()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_collection_staff'] = $this->common_model->get_all_info('14_insert_staff_info');
            $this->load->view('admin/header');
            $this->load->view('admin/34_collection_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//23-05-18
    public function income($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_income'] = $this->common_model->get_all_info('28_income_head');
            $data['all_value'] = $this->common_model->get_all_info('30_income');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/35_income', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function expense($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_expense'] = $this->common_model->get_all_info('29_expense_head');
            $data['all_value'] = $this->common_model->get_all_info('31_expense');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/36_expense', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_income_head($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('28_income_head');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/37_create_income_head', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_expense_head($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('29_expense_head');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/38_create_expense_head', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function ledger()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->view('admin/header');
            $this->load->view('admin/39_ledger');
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dorm_info($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('41_insert_dormitory_info');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/43_dorm_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function student_dorm_allocation($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_dorm'] = $this->common_model->get_all_info('41_insert_dormitory_info');
            $data['all_value'] = $this->common_model->get_all_info('41_student_dormitory_allocation');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/44_student_dorm_allocation', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function input_marks($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        $data['all_session'] = $this->common_model->get_all_info('5_create_session');
        $data['msg'] = $msg;
        if ($user_type == "admin") {
            $data['all_teacher'] = $this->common_model->get_all_info('13_insert_teacher_info');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/28_input_marks', $data);
            $this->load->view('admin/footer');
        } elseif ($user_type == "teacher") {
            $record_id = $this->session->ses_record_id;
            $data['all_teacher'] = $this->common_model->get_allinfo_byid('13_insert_teacher_info', 'record_id', $record_id);
            $this->load->view('admin/header');
            $this->load->view('admin/28_input_marks', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function marks_report()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/29_marks_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function total_result()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/52_total_result', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function report_card()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/53_report_card', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function merit_list()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/54_merit_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fail_list()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/55_fail_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dorm_rent_collection($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_value'] = $this->common_model->get_all_info('41_dormitory_rent_collection');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/44_dorm_rent_collection', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_dorm_rent_invoice($id)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $table_name = "41_dormitory_rent_collection";
            $data['all_value'] = $this->common_model->get_allinfo_byid($table_name, 'record_id', $id);
            foreach ($data['all_value'] as $value) {
                $data['date'] = $value->date;
                $data['invoice_no'] = $value->invoice_no;
            }
            $this->load->view('admin/header');
            $this->load->view('admin/44_dorm_rent_invoice', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_sms($msg=null)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $table_name = "46_create_sms";
            $data['all_value'] = $this->common_model->get_all_info($table_name);
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/63_create_sms', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_sms_to_guardian()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('46_create_sms');
            $this->load->view('admin/header');
            $this->load->view('admin/64_send_sms_to_guardian', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_sms_teacher()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('46_create_sms');
            $this->load->view('admin/header');
            $this->load->view('admin/64_send_sms_teacher', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_sms_staff()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('46_create_sms');
            $this->load->view('admin/header');
            $this->load->view('admin/64_send_sms_staff', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_sms_governing_body()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('46_create_sms');
            $this->load->view('admin/header');
            $this->load->view('admin/64_send_sms_governing_body', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function testimonial()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_version'] = $this->common_model->get_all_info('6_create_version');
            $data['all_exam'] = $this->common_model->group_by_one_column('exam_type', '8_create_exam_type');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $this->load->view('admin/header');
            $this->load->view('admin/62_testimonial', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dorm_rent_collection_report()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_student'] = $this->common_model->get_all_info('12_insert_student_info');
            $data['all_value'] = $this->common_model->get_all_info('41_dormitory_rent_collection');

            $this->load->view('admin/header');
            $this->load->view('admin/44_dorm_rent_collection_report', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function result_at_a_glance()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/66_result_at_a_glance', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_create_income_head($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('41_hall_income_head');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/44_hall_create_income_head', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_create_expense_head($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_value'] = $this->common_model->get_all_info('41_hall_expense_head');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/44_hall_create_expense_head', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_expense($msg=null)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_expense'] = $this->common_model->get_all_info('41_hall_expense_head');
            $data['all_value'] = $this->common_model->get_all_info('41_hall_expense');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/44_hall_expense', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_ledger()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->view('admin/header');
            $this->load->view('admin/44_hall_ledger');
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function student_tort_list()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $this->load->view('admin/header');
            $this->load->view('admin/12_student_tort_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function generate_seat_plan()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_exam_type'] = $this->common_model->group_by_one_column('exam_type', '8_create_exam_type');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $this->load->view('admin/header');
            $this->load->view('admin/67_generate_seat_plan', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function all_students()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $checking_array = array("status" => 1);

            $data['all_students'] = $this->common_model->check_value_get_data('12_insert_student_info', $checking_array);
            
//            $data['all_students'] = $this->common_model->get_all_info('12_insert_student_info');
            $this->load->view('admin/header');
            $this->load->view('admin/all_students_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function all_teachers()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_teachers'] = $this->common_model->get_all_info('13_insert_teacher_info');
            $this->load->view('admin/header');
            $this->load->view('admin/all_teachers_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function all_staffs()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_staffs'] = $this->common_model->get_all_info('14_insert_staff_info');
            $this->load->view('admin/header');
            $this->load->view('admin/all_staffs_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function all_books()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $data['all_books'] = $this->common_model->get_all_info('42_library');
            $this->load->view('admin/header');
            $this->load->view('admin/all_books_list', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function class_promotion()
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_class'] = $this->common_model->get_all_info('1_create_class');
            $data['all_group'] = $this->common_model->get_all_info('2_create_group');
            $data['all_section'] = $this->common_model->get_all_info('3_create_section');
            $data['all_shift'] = $this->common_model->get_all_info('4_create_shift');
            $data['all_session'] = $this->common_model->get_all_info('5_create_session');
            $data['all_value'] = $this->common_model->get_all_info('26_grade_mark_management');
            $this->load->view('admin/header');
            $this->load->view('admin/68_class_promotion', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
   public function alumni_insertion($msg=null){
        $ses_user_type = $this->session->userdata('ses_user_type');
        if ($ses_user_type == "admin" || $ses_user_type == "alumni") {
            $data['alumni_list'] = $this->common_model->get_all_alumni('alumni_list');
            $data['msg'] = $msg;
            redirect('Show_form/loadRecord');
        } 
        else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function loadRecord($rowno=0){
    // Search text
    $search_text = "";
    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');
      $this->session->set_userdata(["search"=>$search_text]);
    }
    else{
      if($this->session->userdata('search') != NULL){
        $search_text = $this->session->userdata('search');
      }
    }
    // Row per page
    $rowperpage = 20;
    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
    // All records count
    $allcount = $this->common_model->getrecordCount($search_text);
    // Get records
    $users_record = $this->common_model->getData($rowno,$rowperpage,$search_text);
    // Pagination Configuration
    $config['base_url'] = base_url().'index.php/User/loadRecord';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    // Initialize
    $this->pagination->initialize($config);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;
    $msg = "main";
    $data['msg'] = $msg;
    $this->load->view('admin/header');
    $this->load->view('admin/alumni/alumni_insertion', $data);
    $this->load->view('admin/footer');
 
  }

  public function delete_alumni($id, $image=null){ 
    if ($this->session->userdata('ses_user_type') == "admin") {
            $data['alumni_list'] = $this->common_model->get_all_alumni('alumni_list');
            $msg = "delete";
            $data['msg'] = $msg;
            if(file_exists("assets/img/alumni_images/$image")){
                unlink("assets/img/alumni_images/$image");
            }
            $this->common_model->delete_alumni($id);
            $this->session->set_flashdata('message', 'Deleted Successfully');
            redirect('Show_form/loadRecord');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
  }
    public function online_class($msg=null){
        if ($this->session->userdata('ses_user_type') == "admin") {
            $data['all_value'] = $this->common_model->get_all_info('online_class');
            $data['classes'] = $this->common_model->get_all_info('1_create_class');
            $data['groups'] = $this->common_model->get_all_info('2_create_group');
            $data['subjects'] = $this->common_model->get_all_info('7_create_subject');
            $data['sections'] = $this->common_model->get_all_info('3_create_section');
            $data['msg'] = $msg;
            $this->load->view('admin/header');
            $this->load->view('admin/online_class/online_class', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
}

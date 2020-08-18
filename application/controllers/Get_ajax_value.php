<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Get_ajax_value extends CI_Controller {
    //26-06-19
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model',"common_model",true);
    }
    
    //26-06-19
    public function get_subject_by_class()
    {
        if($_GET)
        {
            $result=array();
            $class_id=$this->input->get("class_id");
            $result=$this->common_model->get_list("7_create_subject","subject_name,record_id",array("class_id"=>$class_id),"subject_name","ASC");
            echo json_encode($result);
        }
    }
    //26-06-19
    public function get_student_by_condition()
    {
        if($_POST)
        {
            $checking_array=array();
            $session_name=$this->input->post("session_name");
            $class_name=$this->input->post("class_name");
            $shift_name=$this->input->post("shift_name");
            $section_name=$this->input->post("section_name");
            $group_name=$this->input->post("group_name");
            $checking_array['session_name']=$session_name;
            $checking_array['class_name']=$class_name;
            $checking_array['shift_name']=$shift_name;
            if($section_name!='')
            {
                $checking_array['section_name']=$section_name;
            }
            if($group_name!='')
            {
                $checking_array['group_name']=$group_name;
            }
            $result=$this->common_model->get_list("12_insert_student_info","record_id,student_unique_id",$checking_array,"student_unique_id","asc");
            echo json_encode($result);

        }
    }
    //26-06-19
    public function get_exam_by_class()
    {
        if($_POST)
        {
            $session_id=$this->input->post("session_id");
            $class_id=$this->input->post("class_id");
            $checking_array=array(
                "session_id"=>$session_id,
                "class_id"=>$class_id,
            );
            $result=$this->common_model->get_list("8_create_exam_type","record_id,exam_type",$checking_array,"exam_type","asc");
            echo json_encode($result);

        }
    }
    public function get_percent_scale() {
        $teacher_staff = explode("#", $this->input->post('teacher_staff'));
        $teacher_staff_id = $teacher_staff[0];

        $result = $this->common_model->get_allinfo_byid('pf_create_info', 'teacher_staff_id', $teacher_staff_id);
        foreach ($result as $info) {
            $salary_scale = $info->salary_scale;
        }
        $percentage = $salary_scale * (10 / 100);
        $result = $this->common_model->get_last_data_byid('pf_deposit_info', 'teacher_staff_id', $teacher_staff_id);
        foreach ($result as $info) {
            $total = $info->sub_total;
        }
        $data = array($total, $percentage);
        echo json_encode($data);
    }

    public function get_salary_sheet() {
        $month = $this->input->post('month');
        $data['all_value'] = $this->common_model->get_allinfo_byid('create_salary_sheet', 'month', $month);
        $total = 0;
        foreach ($data['all_value'] as $info) {
            $total += $info->salary_scale;
        }
        $data['month'] = $month;
        $data['total'] = $total;
        $this->load->view('admin/show_salary_sheet', $data);
    }

    public function get_des_acc_salary() {
        $teacher_staff = explode("#", $this->input->post('teacher_staff'));
        $teacher_staff_id = $teacher_staff[0];

        $result = $this->common_model->get_allinfo_byid('teacher_staff_salary', 'teacher_staff_id', $teacher_staff_id);
        if (empty($result)) {
            $data = array("Not Available", "Not Available", "Not Available");
        } else {
            foreach ($result as $info) {
                $designation = $info->designation;
                $account = $info->account_no;
                $salary = $info->salary_amount;
            }
            $data = array($designation, $account, $salary);
        }
        echo json_encode($data);
    }

    public function get_bank_report() {
        $from_date = date('Y-m-d', strtotime($this->input->post('from_date')));
        $to_date = date('Y-m-d', strtotime($this->input->post('to_date')));
        $bank_name = $this->input->post('bank_name');
        if (empty($from_date) && empty($to_date)) {
            $data['deposit_result'] = $this->common_model->get_allinfo_byid('bank_deposit', 'bank_name', $bank_name);
            $data['withdraw_result'] = $this->common_model->get_allinfo_byid('bank_withdraw', 'bank_name', $bank_name);
        } elseif (empty($bank_name)) {
            $data['deposit_result'] = $this->common_model->data_between_date('bank_deposit', 'date', $to_date, $from_date);
            $data['withdraw_result'] = $this->common_model->data_between_date('bank_withdraw', 'date', $to_date, $from_date);
        } else {
            $data['deposit_result'] = $this->common_model->data_between_date_where('bank_deposit', 'date', $to_date, $from_date, 'bank_name', $bank_name);
            $data['withdraw_result'] = $this->common_model->data_between_date_where('bank_withdraw', 'date', $to_date, $from_date, 'bank_name', $bank_name);
        }
        $this->load->view('admin/bank_show_report', $data);
    }

    public function get_pf_report() {
        $date = $this->input->post('date');
        $teacher_staff = $this->input->post('teacher_staff');
        if (empty($date) && empty($teacher_staff)) {
            $data['deposit_result'] = array();
            $data['loan_result'] = array();
        } elseif (empty($teacher_staff)) {
            $data['deposit_result'] = $this->common_model->data_until_date('pf_deposit_info', 'date', $date);
            $data['loan_result'] = $this->common_model->data_until_date('pf_loan_info', 'date', $date);
        } elseif (empty($date)) {
            $data['deposit_result'] = $this->common_model->get_allinfo_byid('pf_deposit_info', 'teacher_staff_id', $teacher_staff);
            $data['loan_result'] = $this->common_model->get_allinfo_byid('pf_loan_info', 'teacher_staff_id', $teacher_staff);
        } else {
            $data['deposit_result'] = $this->common_model->data_until_date_where_id('pf_deposit_info', 'date', $date, 'teacher_staff_id', $teacher_staff);
            $data['loan_result'] = $this->common_model->data_until_date_where_id('pf_loan_info', 'date', $date, 'teacher_staff_id', $teacher_staff);
        }
        $this->load->view('admin/pf_show_report', $data);
    }

    public function get_balance() {
        $teacher_staff = explode("#", $this->input->post('teacher_staff'));
        $teacher_staff_id = $teacher_staff[0];

        $result = $this->common_model->get_last_data_byid('pf_deposit_info', 'teacher_staff_id', $teacher_staff_id);
        foreach ($result as $info) {
            $total = $info->sub_total;
        }
        $due_result = $this->common_model->get_last_data_byid('pf_loan_info', 'teacher_staff_id', $teacher_staff_id);
        if (empty($due_result)) {
            $due_amount = 0;
        } else {
            foreach ($due_result as $due_info) {
                $due_amount = $due_info->due_amount;
            }
        }
        $data = array($total, $due_amount);
        echo json_encode($data);
    }
    public function get_specific_mark_sheet() {

        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $student_id = $this->input->post('student_id');
//        $class_name = $this->input->post('class_name');
        $exam_type = $this->input->post('exam_type');
        $data['exam_type'] = $exam_type;
        $published_date = $this->input->post('published_date2');
        if (empty($published_date)) {
            $data['published_date'] = "";
        } else {
            $data['published_date'] = date('d F, Y', strtotime($published_date));
        }
        $count_st = 0;
        $data['all_value'] = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $student_id);

        if (!empty($data['all_value'])) {
            foreach ($data['all_value'] as $info) {
                $count_st++;
                $class_name = $info->class_name;
                $data["name" . $count_st] = $info->name;
                $data["class_name" . $count_st] = $info->class_name;
                $data["father_name" . $count_st] = $info->father_name;
                $data["student_unique_id" . $count_st] = $info->student_unique_id;
                $data["group_name" . $count_st] = $info->group_name;
                $data["mother_name" . $count_st] = $info->mother_name;
                $data["roll" . $count_st] = $info->roll;
                $data["section_name" . $count_st] = $info->section_name;
                $data["roll" . $count_st] = $info->roll;
            }

            $checking_array = array(
                "class_name" => $class_name,
                "student_id" => $student_id,
                "exam_type" => $exam_type,
            );
            $result = $this->common_model->check_value_get_data_orderby('26_grade_mark_management', $checking_array, 'subject_serial');
            $result2 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

//             echo "<pre>";
//                    print_r($result2);
            if (!empty($result2)) {
                $result3 = array_merge($result, $result2);
                $data['t_count'] = 1;
            } else {
                $result3 = $result;
                $data['t_count'] = 0;
            }

            $total_gpa = 0;
            $gpa=0;
            $temp_mark=0;
            $count_mark = 0;
            $sub_count = 1;
            $flag = 0;
            $b = 0;
            $e = 0;
            $d = 0;
            $count_bang = 0;
            $count_eng = 0;
            if (!empty($result3)) {
                foreach ($result3 as $info) {
                    $count_mark++;
                    $checking_array = array(
                        "student_id" => $info->student_id,
                        "exam_type" => $exam_type,
                        "class_name" => $info->class_name,
                    );
                    $sub_count = 0;
                    $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, '26_grade_mark_management');

                    foreach ($data['all_subject'] as $sub) {
                        $sub_count++;
                    }
                    // echo "<pre>";
                    // print_r($data['all_subject']);
                    // die();
                    $total_mark = $info->total_mark;
                    $data["subject" . $count_mark . $count_st] = $info->subject_name;
                    $data['marks' . $count_mark . $count_st] = $total_mark;

                    if (in_array($info->class_name, $class_array1) || in_array($info->class_name, $class_array2)) {
                        if ($info->subject_name == 'Drawing') {
                            $d = ($info->total_mark * 5);
                        } elseif (in_array($info->subject_name, $subject_50)) {
                            $d = $info->total_mark * 2;
                        } else {
                            $d = $info->total_mark;
                        }
                    } else {
                        if (strpos($info->subject_name, 'Bang') != false) {
                            $count_bang++;
                            $d += $info->total_mark;
                            $b += $info->total_mark;
                            if ($info->class_name == 9 || $info->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($info->subject_name, 'English ') != false) {
                            $count_eng++;
                            $d += $info->total_mark;
                            $e += $info->total_mark;
                            if ($info->class_name == 9 || $info->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $info->total_mark;
                        }
                    }
                    $calculate_mark=mark_grade_point_calculation($info->subject_total_mark,$d);
                    if(!empty($calculate_mark))
                    {
                        $temp_mark = $calculate_mark['grade_point'];
                        $gpa=$calculate_mark['grade_point'];
                    }
                    if ($info->fourth_subject == '1') {
                        $data['fs' . $count_mark . $count_st] = 1;
                        if ($gpa <= 2.00) {
                            $gpa = 0.00;
                        } else {
                            $gpa = $gpa - 2.00;
                        }
                    } else {
                        $data['fs' . $count_mark . $count_st] = 0;
                    }

                    if (in_array($info->class_name, $class_array1) || in_array($info->class_name, $class_array2)) {
                        if ($info->subject_name == 'Drawing') {
                            $d = $info->total_mark;
                        } elseif (in_array($info->class_name, $class_array1) || in_array($info->class_name, $class_array2)) {
                            if (in_array($info->subject_name, $subject_50)) {
                                $d = $info->total_mark;
                            }
                        }
                    }

                    $total_gpa += $gpa;
                    $gpa = $temp_mark;
                    $data['gpa' . $count_mark . $count_st] = $gpa;
//                        echo $total_gpa.'<br>';
                }
            }
            if ($info->class_name == 9 || $info->class_name == 10) {
                if ($flag == 1) {
                    $total_gpa = $total_gpa / ($sub_count - 3 + $data['t_count']);
                } elseif ($flag == 0) {
                    $total_gpa = $total_gpa / ($sub_count - 3 + $data['t_count']);
                }
            } else {
                $total_gpa = $total_gpa / ($sub_count + $data['t_count']);
            }
            if ($total_gpa >= 5) {
                $data['total_gpa' . $count_st] = 5.0;
            } else {
                $data['total_gpa' . $count_st] = $total_gpa;
            }

            $data['count_it'] = $count_mark;
            $data['count_st'] = $count_st;
            $data['sub_count'] = $sub_count;
            $data['all_mark'] = $result3;
        }
        $this->load->view('admin/15_show_student_mark_sheet', $data);
    }
    //26-06-19
    public function get_student_mark_sheet() {
        if($_POST)
        {
            $data['session_id']=explode("#",$this->input->post("session_id"))[0];
            $data['class_id']=explode("#",$this->input->post("class_id"))[0];
            $data['shift_id']=explode("#",$this->input->post("shift_id"))[0];
            $data['section_id']=explode("#",$this->input->post("section_id"))[0];
            $data['group_id']=explode("#",$this->input->post("group_id"))[0];
            $data['student_id']=explode("#",$this->input->post("student_id"))[0];
            $data['exam_id']=$this->input->post("exam_id");
            $data['published_date']=$this->input->post("published_date");
            $result=$this->common_model->get_student_mark_sheet($data);
            $result_data["mark_sheet"]=$result;
            $result_data["published_date"]=$this->input->post("published_date");
            // echo "<pre>";
            // print_r($result);
            // die();
            $this->load->view('admin/15_show_student_mark_sheet', $result_data);
        }
       
        // $this->load->view('admin/15_show_student_mark_sheet', $data);
    }
//26-06-19
    public function get_all_mark_sheet() {

        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $class_name = $this->input->post('class_name');
        $group_name = $this->input->post('group_name');
        $section_name = $this->input->post('section_name');
        $shift_name = $this->input->post('shift_name');
//        $version_name = $this->input->post('version_name');
        $session_name = $this->input->post('session_name');
        $exam_type = $this->input->post('exam_type');
        $data['exam_type'] = $this->input->post('exam_type');
        $published_date = $this->input->post('published_date');
        if (empty($published_date)) {
            $data['published_date'] = "";
        } else {
            $data['published_date'] = date('d F, Y', strtotime($published_date));
        }
        $checking_array = array(
            "class_name" => $class_name,
        );
        if (!empty($group_name)) {
            $checking_array['group_name'] = $group_name;
        }
        if (!empty($section_name)) {
            $checking_array['section_name'] = $section_name;
        }
        if (!empty($shift_name)) {
            $checking_array['shift_name'] = $shift_name;
        }
//        if (!empty($version_name)) {
//            $checking_array['version_name'] = $version_name;
//        }
        if (!empty($session_name)) {
            $checking_array['session_name'] = $session_name;
        }
        $data['all_value'] = $this->common_model->check_value_get_data('12_insert_student_info', $checking_array);
        $count_st = 0;

        if (!empty($data['all_value'])) {
            foreach ($data['all_value'] as $info) {
                $count_st++;
                $data["name" . $count_st] = $info->name;
                $data["class_name" . $count_st] = $info->class_name;
                $data["father_name" . $count_st] = $info->father_name;
                $data["student_unique_id" . $count_st] = $info->student_unique_id;
                $data["group_name" . $count_st] = $info->group_name;
                $data["mother_name" . $count_st] = $info->mother_name;
                $data["roll" . $count_st] = $info->roll;
                $data["section_name" . $count_st] = $info->section_name;
                $data["roll" . $count_st] = $info->roll;

                $checking_array = array(
                    "class_name" => $class_name,
                    "student_id" => $info->student_unique_id,
                    "exam_type" => $exam_type,
                );
                if (!empty($group_name)) {
                    $checking_array['group_name'] = $group_name;
                }
                if (!empty($section_name)) {
                    $checking_array['section_name'] = $section_name;
                }
                if (!empty($shift_name)) {
                    $checking_array['shift_name'] = $shift_name;
                }
//        if (!empty($version_name)) {
//            $checking_array['version_name'] = $version_name;
//        }
                if (!empty($session_name)) {
                    $checking_array['session_name'] = $session_name;
                }
                $result = $this->common_model->check_value_get_data_orderby('26_grade_mark_management', $checking_array, 'subject_serial');
                $result2 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result2)) {
                    $result3 = array_merge($result, $result2);
                    $data['t_count'] = 1;
                } else {
                    $result3 = $result;
                    $data['t_count'] = 0;
                }

                $data['all_mark'] = $result3;
//            echo '<pre>';
//            print_r($result);
                $total_gpa = 0;
                $sub_count = 1;
                $count_mark = 0;
                $gpa=0;
                $temp_mark=0;
                $flag = 0;
                $b = 0;
                $e = 0;
                $d = 0;
                $count_bang = 0;
                $count_eng = 0;
                if (!empty($result3)) {
                    foreach ($result3 as $info) {
                        $count_mark++;
                        $checking_array = array(
                            "student_id" => $info->student_id,
                            "exam_type" => $exam_type,
                            "class_name" => $info->class_name,
                        );
                        $sub_count = 0;
                        $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, '26_grade_mark_management');
                        foreach ($data['all_subject'] as $sub) {
                            $sub_count++;
                        }
                        $total_mark = $info->total_mark;
                        $data["subject" . $count_mark . $count_st] = $info->subject_name;
                        $data['marks' . $count_mark . $count_st] = $total_mark;
                        if (in_array($info->class_name, $class_array1) || in_array($info->class_name, $class_array2)) {
                            if ($info->subject_name == 'Drawing') {
                                $d = ($info->total_mark * 5);
                            } elseif (in_array($info->subject_name, $subject_50)) {
                                $d = $info->total_mark * 2;
                            } else {
                                $d = $info->total_mark;
                            }
                        } else {
                            if (strpos($info->subject_name, 'Bang') != false) {
                                $count_bang++;
                                $d += $info->total_mark;
                                $b += $info->total_mark;
                                if ($info->class_name == 9 || $info->class_name == 10) {
                                    if ($count_bang == 1) {
                                        $d = 0;
                                    } elseif ($count_bang == 2) {
                                        $d = $b / 2;
                                        $count_bang = 0;
                                    }
                                }
                            } elseif (strpos($info->subject_name, 'English ') != false) {
                                $count_eng++;
                                $d += $info->total_mark;
                                $e += $info->total_mark;
                                if ($info->class_name == 9 || $info->class_name == 10) {
                                    if ($count_eng == 1) {
                                        $d = 0;
                                    } elseif ($count_eng == 2) {
                                        $d = $e / 2;
                                        $count_eng = 0;
                                    }
                                }
                            } else {
                                $d = $info->total_mark;
                            }
                        }

                        $calculate_mark=mark_grade_point_calculation($info->subject_total_mark,$d);
                        if(!empty($calculate_mark))
                        {
                            $temp_mark = $calculate_mark['grade_point'];
                            $gpa=$calculate_mark['grade_point'];

                        }
                        
                        if ($info->fourth_subject == '1') {
                            $data['fs' . $count_mark . $count_st] = 1;
                            if ($gpa <= 2.00) {
                                $gpa = 0.00;
                            } else {
                                $gpa = $gpa - 2.00;
                            }
                        } else {
                            $data['fs' . $count_mark . $count_st] = 0;
                        }
                        
                        if (in_array($info->class_name, $class_array1) || in_array($info->class_name, $class_array2)) {
                            if ($info->subject_name == 'Drawing') {
                                $d = $info->total_mark;
                            } elseif (in_array($info->class_name, $class_array1) || in_array($info->class_name, $class_array2)) {
                                if (in_array($info->subject_name, $subject_50)) {
                                    $d = $info->total_mark;
                                }
                            }
                        }
                        
                        $total_gpa += $gpa;
                        $gpa = $temp_mark;
                        $data['gpa' . $count_mark . $count_st] = $gpa;
                        //                        echo $total_gpa.'<br>';
                    }
                }
                if ($info->class_name == 9 || $info->class_name == 10) {
                    if ($flag == 1) {
                        $total_gpa = $total_gpa / ($sub_count - 3 + $data['t_count']);
                    } elseif ($flag == 0) {
                        $total_gpa = $total_gpa / ($sub_count - 3 + $data['t_count']);
                    }
                } else {
                    $total_gpa = $total_gpa / ($sub_count + $data['t_count']);
                }
                if ($total_gpa > 5) {
                    $data['total_gpa' . $count_st] = 5.0;
                } else {
                    $data['total_gpa' . $count_st] = $total_gpa;
                }
                
                $data['count_it'] = $count_mark;
                $data['count_st'] = $count_st;
                $data['sub_count'] = $sub_count;
            }
        }
        $this->load->view('admin/15_show_student_mark_sheet', $data);
    }

    public function get_specific_admit_card() {
        $student_id = $this->input->post('student_id');

        $data['exam_type'] = $this->input->post('exam_type');
        $exam_date = $this->input->post('exam_date2');
        if (empty($exam_date)) {
            $data['exam_date'] = "";
        } else {
            $data['exam_date'] = date('d F, Y', strtotime($exam_date));
        }

        $data['all_value'] = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $student_id);
        $this->load->view('admin/14_show_student_admit_card', $data);
    }
//26-06-19
    public function get_all_admit_card_old() {
        $class_name = $this->input->post('class_name');
        $group_name = $this->input->post('group_name');
        $section_name = $this->input->post('section_name');
        $shift_name = $this->input->post('shift_name');
        $version_name = $this->input->post('version_name');
        $session_name = $this->input->post('session_name');

        $data['exam_type'] = $this->input->post('exam_type');
        $exam_date = $this->input->post('exam_date');
        if (empty($exam_date)) {
            $data['exam_date'] = "";
        } else {
            $data['exam_date'] = date('d F, Y', strtotime($exam_date));
        }

        $checking_array = array();
        if (!empty($class_name)) {
            $checking_array['class_name'] = $class_name;
        }
        if (!empty($group_name)) {
            $checking_array['group_name'] = $group_name;
        }
        if (!empty($section_name)) {
            $checking_array['section_name'] = $section_name;
        }
        if (!empty($shift_name)) {
            $checking_array['shift_name'] = $shift_name;
        }
        if (!empty($version_name)) {
            $checking_array['version_name'] = $version_name;
        }
        if (!empty($session_name)) {
            $checking_array['session_name'] = $session_name;
        }
        $data['all_value'] = $this->common_model->get_all_info_by_array('12_insert_student_info', $checking_array);
        $this->load->view('admin/14_show_student_admit_card', $data);
    }
    //26-06-19
    public function get_student_admit_card() {
        $data['session_name']=explode("#",$this->input->post("session_id"))[1];

        $class=$this->input->post("class_id");
        if($class!='')
        {
            $data['class_name']=explode("#",$class)[1];
        }
        
        $shift=$this->input->post("shift_id");
        if($shift!='')
        {
            $data['shift_name']=explode("#",$shift)[1];
        }
        $section=$this->input->post("section_id");
        if($section!='')
        {
            $data['section_name']=explode("#",$section)[1];
        }
        $group=$this->input->post("group_id");
        if($group!='')
        {
            $data['group_name']=explode("#",$group)[1];
        }
        $student=$this->input->post("student_id");
        if($student!='')
        {
            $data['record_id']=explode("#",$student)[0];
        }
        $result=$this->common_model->get_list('12_insert_student_info',"class_name,group_name,section_name,shift_name,session_name,name,student_unique_id,roll,father_name,mother_name,image", $data,"roll","ASC");
        
        $result_data['exam_name']=explode("#",$this->input->post("exam_id"))[1];
        
        $result_data["admit_card"]=$result;
        $result_data["exam_date"]=$this->input->post("exam_date");
        // echo "<pre>";
        // print_r($result_data);
        // die();
        $this->load->view('admin/14_show_student_admit_card', $result_data);
    }

    public function get_specific_id_card() {
        $student_id = $this->input->post('student_id');
        $data['validity'] = $this->input->post('validity');
        $data['all_value'] = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $student_id);
        $this->load->view('admin/13_show_student_id_card', $data);
    }

    public function get_specific_id_card_teacher() {
        $teacher_id = $this->input->post('teacher_id');
        $data['validity'] = $this->input->post('validity');
        $data['all_value'] = $this->common_model->get_allinfo_byid('13_insert_teacher_info', 'teacher_unique_id', $teacher_id);
        $this->load->view('admin/18_show_teacher_id_card', $data);
    }

    public function get_all_id_card() {
        $class_name = $this->input->post('class_name');
        $group_name = $this->input->post('group_name');
        $section_name = $this->input->post('section_name');
        $shift_name = $this->input->post('shift_name');
        $version_name = $this->input->post('version_name');
        $session_name = $this->input->post('session_name');
        $data['validity'] = $this->input->post('validity');

        $checking_array = array();
        if (!empty($class_name)) {
            $checking_array['class_name'] = $class_name;
        }
        if (!empty($group_name)) {
            $checking_array['group_name'] = $group_name;
        }
        if (!empty($section_name)) {
            $checking_array['section_name'] = $section_name;
        }
        if (!empty($shift_name)) {
            $checking_array['shift_name'] = $shift_name;
        }
        if (!empty($version_name)) {
            $checking_array['version_name'] = $version_name;
        }
        if (!empty($session_name)) {
            $checking_array['session_name'] = $session_name;
        }
        $data['all_value'] = $this->common_model->get_all_info_by_array('12_insert_student_info', $checking_array);
        $this->load->view('admin/13_show_student_id_card', $data);
    }

    public function get_all_id_card_teacher() {
        $designation = $this->input->post('designation');
        $data['validity'] = $this->input->post('validity');

        $checking_array = array();
        if (!empty($designation)) {
            $checking_array['designation'] = $designation;
        }

        $data['all_value'] = $this->common_model->get_all_info_by_array('13_insert_teacher_info', $checking_array);
        $this->load->view('admin/18_show_teacher_id_card', $data);
    }

    public function get_routine_info() {
        $class_name = $this->input->post('class_name');
        $shift_name = $this->input->post('shift_name');
        $group_name = $this->input->post('group_name');
        $section_name = $this->input->post('section_name');
        $session_name = $this->input->post('session_name');
        $checking_array = array(
            'class_name' => $class_name,
            'shift_name' => $shift_name,
            'group_name' => $group_name,
            'section_name' => $section_name,
            'session_name' => $session_name,
        );
        $data['all_value'] = $this->common_model->check_value_get_data('40_create_class_routine', $checking_array);
        $this->load->view('admin/60_get_routine_info', $data);
    }

    public function get_collection_report_old() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
            $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
            $student_id = $this->input->post('student_id');
            $staff = $this->input->post('staff');
            $class = $this->input->post('class');
            $table_name = "10_3_fee_collection";
            $checking_array = array();
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['insertion_date >='] = $date_from;
                $checking_array['insertion_date <='] = $date_to;
            }
            if (!empty($student_id)) {
                $checking_array['student_id'] = $student_id;
            }
            if (!empty($staff)) {
                $checking_array['inserted_by'] = $staff;
            }
            if (!empty($class)) {
                $checking_array['class_name'] = $class;
            }
            $data['staff'] = $staff;
            $result_ind = $this->common_model->get_fee_collection_invoice();
            $count_mark = 0;
            $invoice_no = 0;
            $total = 0;
            $total_paid = 0;
            $total_payable = 0;
            $discount = 0;
//            echo '<pre>';
//            print_r($result_ind);
            foreach ($result_ind as $info_ind) {
                $first_time = 0;
                $first_time++;
                $checking_array['invoice_id'] = $info_ind->invoice_id;
                $result = $this->common_model->check_value_get_data_orderby($table_name, $checking_array, 'record_id');
                if (!empty($result)) {
                    foreach ($result as $res) {
                        if ($first_time == 1) {
                            $count_mark++;
                            $invoice_no++;
                            $data["sl" . $count_mark] = $invoice_no;
                            $data["student_id" . $count_mark] = $res->student_id;
                            $data["inserted_by" . $count_mark] = $res->inserted_by;

                            if ($res->inserted_by == "admin") {
                                $inserted_name_result = $this->common_model->one_column_one_info('name', 'admin_unique_id', $res->inserted_by, '0_admin');
                                foreach ($inserted_name_result as $inserted_name_info) {
                                    $data["inserted_by_name" . $count_mark] = $inserted_name_info->name;
                                }
                            } else {
                                $inserted_name_result = $this->common_model->one_column_one_info('name', 'staff_unique_id', $res->inserted_by, '14_insert_staff_info');
                                foreach ($inserted_name_result as $inserted_name_info) {
                                    $data["inserted_by_name" . $count_mark] = $inserted_name_info->name;
                                }
                            }
                            $student = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $res->student_id);
                            foreach ($student as $st) {
                                $student_name = $st->name;
                                $class = $st->class_name;
                                $group = $st->group_name;
                                $roll = $st->roll;
                            }
                            $data["student_name" . $count_mark] = $student_name;
                            $data["print" . $count_mark] = anchor('Show_form/print_fee_collection/' . $res->invoice_id, ' ', 'style="margin: 5px;" '
                                    . 'title="Edit" class="btn btn-warning fa fa-print"');
                            $data["class" . $count_mark] = $class;
                            $data["group" . $count_mark] = $group;
                            $data["roll" . $count_mark] = $roll;
                            $data["date" . $count_mark] = $res->insertion_date;
                            $data["invoice" . $count_mark] = $res->invoice_id;
                            $data["description" . $count_mark] = $res->description;
                            $data["amount" . $count_mark] = $res->amount;
                            $data["quantity" . $count_mark] = $res->quantity;
                            $data["discount" . $count_mark] = $res->discount;
                            $data["total" . $count_mark] = $res->total + $res->discount;
                            $data["payment" . $count_mark] = $res->payment;
                            $data["due" . $count_mark] = $res->due;
                            $data["previous_due" . $count_mark] = $res->payment + $res->due - $res->total;
                            $data["grand_total" . $count_mark] = $data["total" . $count_mark] + $data["previous_due" . $count_mark];
                            $data["payable" . $count_mark] = $data["total" . $count_mark] + $data["previous_due" . $count_mark] - $res->discount;
                            $total += $data["grand_total" . $count_mark];
                            $total_payable += $data["payable" . $count_mark];
                            $discount += $data["discount" . $count_mark];
                            $total_paid += $data["payment" . $count_mark];
                        }
                        $first_time++;
                    }
                }
            }

            $data['c'] = $count_mark;
            $data['total'] = $total;
            $data['discount'] = $discount;
            $data['total_paid'] = $total_paid;
            $data['total_payable'] = $total_payable;
            $data['due'] = $total - $total_paid;
//        echo '<pre>';
//        print_r($data['all_value']);
            $this->load->view('admin/34_collection_report_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

 //26-06-19
    public function get_collection_report() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
            $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
            $student_id = $this->input->post('student_id');
            $staff = $this->input->post('staff');
            $class = $this->input->post('class');
            $table_name = "10_3_fee_collection";
            $checking_array = array();
            if (!empty($date_from) && !empty($date_to)) {
                $checking_array['insertion_date >='] = $date_from;
                $checking_array['insertion_date <='] = $date_to;
            }
            if (!empty($student_id)) {
                $checking_array['student_id'] = $student_id;
            }
            if (!empty($staff)) {
                $checking_array['inserted_by'] = $staff;
            }
            if (!empty($class)) {
                $checking_array['class_name'] = $class;
            }
            $data['staff'] = $staff;
           $data['invoice_result']=$this->common_model->get_student_collection($checking_array);
           $this->load->view('admin/34_collection_report_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function get_update_collection_report() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
//            $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
//            $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
            $student_id = $this->input->post('student_id');
            $staff = $this->input->post('staff');
            $class = $this->input->post('class');
            $table_name = "10_3_fee_collection";
            $checking_array = array();
//            if (!empty($date_from) && !empty($date_to)) {
//                $checking_array['insertion_date >='] = $date_from;
//                $checking_array['insertion_date <='] = $date_to;
//            }
            if (!empty($student_id)) {
                $checking_array['student_id'] = $student_id;
            }
            if (!empty($staff)) {
                $checking_array['inserted_by'] = $staff;
            }
            if (!empty($class)) {
                $checking_array['class_name'] = $class;
            }
            $data['staff'] = $staff;

            $result_ind = $this->common_model->get_distinct_value_where("student_id", $table_name, $checking_array);
            $count_mark = 0;
            $invoice_no = 0;
            $total = 0;
            $total_paid = 0;
            $total_payable = 0;
            $discount = 0;
//            echo '<pre>';
//            print_r($result_ind);
            foreach ($result_ind as $info_ind) {
                $first_count = 0;
                $student_id = $info_ind->student_id;

                $result = $this->common_model->get_allinfo_byid_orderby_invoice($table_name, "student_id", $student_id);
//                echo '<pre>';
//            print_r($result);
                foreach ($result as $res) {
                    if ($res->total != 0) {
                        $first_count++;
                        if ($first_count == 1) {
                            $count_mark++;
                            $invoice_no++;
                            $data["sl" . $count_mark] = $invoice_no;
                            $data["student_id" . $count_mark] = $res->student_id;
                            $data["inserted_by" . $count_mark] = $res->inserted_by;

                            if ($res->inserted_by == "admin") {
                                $inserted_name_result = $this->common_model->one_column_one_info('name', 'admin_unique_id', $res->inserted_by, '0_admin');
                                foreach ($inserted_name_result as $inserted_name_info) {
                                    $data["inserted_by_name" . $count_mark] = $inserted_name_info->name;
                                }
                            } else {
                                $inserted_name_result = $this->common_model->one_column_one_info('name', 'staff_unique_id', $res->inserted_by, '14_insert_staff_info');
                                foreach ($inserted_name_result as $inserted_name_info) {
                                    $data["inserted_by_name" . $count_mark] = $inserted_name_info->name;
                                }
                            }
                            $student = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $res->student_id);
                            foreach ($student as $st) {
                                $student_name = $st->name;
                                $class = $st->class_name;
                                $group = $st->group_name;
                                $roll = $st->roll;
                            }
                            $data["student_name" . $count_mark] = $student_name;
                            $data["print" . $count_mark] = anchor('Show_form/print_fee_collection/' . $res->invoice_id, ' ', 'style="margin: 5px;" '
                                    . 'title="Print" class="btn btn-warning fa fa-print"');
                            $data["class" . $count_mark] = $class;
                            $data["group" . $count_mark] = $group;
                            $data["roll" . $count_mark] = $roll;
                            $data["date" . $count_mark] = $res->insertion_date;
                            $data["invoice" . $count_mark] = $res->invoice_id;
                            $data["description" . $count_mark] = $res->description;
                            $data["amount" . $count_mark] = $res->amount;
                            $data["quantity" . $count_mark] = $res->quantity;
                            $data["discount" . $count_mark] = $res->discount;
                            $data["total" . $count_mark] = $res->total + $res->discount;
                            $data["payment" . $count_mark] = $res->payment;
                            $data["due" . $count_mark] = $res->due;
                            $data["previous_due" . $count_mark] = $res->payment + $res->due - $res->total;
                            $data["grand_total" . $count_mark] = $data["total" . $count_mark] + $data["previous_due" . $count_mark];
                            $data["payable" . $count_mark] = $data["total" . $count_mark] + $data["previous_due" . $count_mark] - $res->discount;
                            $total += $data["grand_total" . $count_mark];
                            $total_payable += $data["payable" . $count_mark];
                            $discount += $data["discount" . $count_mark];
                            $total_paid += $data["payment" . $count_mark];
                        }
                    }
                }
            }

            $data['c'] = $count_mark;
            $data['total'] = $total;
            $data['discount'] = $discount;
            $data['total_paid'] = $total_paid;
            $data['total_payable'] = $total_payable;
            $data['due'] = $total - $total_paid;
//        echo '<pre>';
//        print_r($data['all_value']);
            $this->load->view('admin/34_collection_report_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_collection_report2($date, $student_id, $invoice_id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $table_name = "10_3_fee_collection";
            $checking_array = array();
            if (!empty($date)) {
                $checking_array['insertion_date'] = $date;
            }
            if (!empty($student_id)) {
                $checking_array['student_id'] = $student_id;
            }
            if (!empty($student_id)) {
                $checking_array['invoice_id'] = $invoice_id;
            }

            $result = $this->common_model->check_value_get_data_orderby($table_name, $checking_array, 'record_id');
            $count_mark = 0;
            $total = 0;
            $sl = 1;
            if (!empty($result)) {
                foreach ($result as $res) {
                    $count_mark++;
                    $data["sl" . $count_mark] = $sl++;
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["inserted_by" . $count_mark] = $res->inserted_by;
                    if (stripos(strtolower($res->inserted_by), "A")) {
                        $data["inserted_by_name" . $count_mark] = $this->common_model->one_column_one_info('name', 'admin_unique_id', $res->inserted_by, '0_admin');
                    } else if (stripos(strtolower($res->inserted_by), "D")) {
                        $data["inserted_by_name" . $count_mark] = $this->common_model->one_column_one_info('name', 'staff_unique_id', $res->inserted_by, '14_insert_staff_info');
                    }
                    $student = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $res->student_id);
                    foreach ($student as $st) {
                        $student_name = $st->name;
                        $class = $st->class_name;
                        $group = $st->group_name;
                        $roll = $st->roll;
                    }
                    $data["student_name"] = $student_name;
                    $data["class"] = $class;
                    $data["group" . $count_mark] = $group;
                    $data["roll"] = $roll;
                    $data["description" . $count_mark] = $res->description;
                    $data["amount" . $count_mark] = $res->amount;
                    $data["quantity" . $count_mark] = $res->quantity;
                    $data["discount" . $count_mark] = $res->discount;
                    $data["invoice" . $count_mark] = $res->invoice_id;
                    $data["date" . $count_mark] = $res->insertion_date;
                    $data["total" . $count_mark] = $res->total;
                    $data["payment" . $count_mark] = $res->payment;
                    $data["due" . $count_mark] = $res->due;
                    $total += $res->payment;
                }
            }
            $data["total"] = $total;

            $data['c'] = $count_mark;
            $data['all_value'] = $result;
            $data['date'] = $date;
            $data['student_id'] = $student_id;
            $data['invoice_no'] = $invoice_id;
//        echo '<pre>';
//        print_r($data['all_value']);
            $this->load->view('admin/header');
            $this->load->view('admin/34_2_collection_report_info', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//    public function get_class_routine() {
//        $class_name = $this->input->post('class_name');
//        $group_name = $this->input->post('group_name');
//        $section_name = $this->input->post('section_name');
//        $session_name = $this->input->post('session_name');
//        
//          $column_with_value_array = array();
//            if (!empty($class_name)) {
//                $checking_array['class_name'] = $class_name;
//            }
//            if (!empty($group_name)) {
//                $checking_array['group_name'] = $group_name;
//            }
//            if (!empty($section_name)) {
//                $checking_array['section_name'] = $section_name;
//            }
//            if (!empty($session_name)) {
//                $checking_array['session_name'] = $session_name;
//            }
//        
//        
//        /*$column_with_value_array = array(
//            'class_name' => $class_name,
//            'group_name' => $group_name,
//            'section_name' => $section_name,
//            'session_name' => $session_name
//        );*/
//        $data['all_class_time'] = $this->common_model->get_routine_time($column_with_value_array);
//        $total_class_number = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $total_class_number++;
//        }
//        //Saturday
//        $count = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $count++;
//            $day_check = array(
//                'class_time' => $single_time->class_time,
//                'class_day' => "Saturday"
//            );
//            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
//            //print_r($result_day);
//           // exit();
//           $day_subject = "";
//                $day_teacher_name = "";
//            if (!empty($result_day)) {
//                foreach ($result_day as $info_day) {
//                    $day_subject =$day_subject.$info_day->subject_name." ".$info_day->teacher_name." ".$info_day->section_name." ".$info_day->group_name."<br>";
//                   // $day_teacher_name = $info_day->teacher_name;
//                    
//                }
//                
//            } else {
//                $day_subject = "";
//                $day_teacher_name = "";
//            }
//            $data['saturday_subject' . $count] = $day_subject;
//            $data['saturday_teacher_name' . $count] = $day_teacher_name;
//        }
//        //Sunday
//        $count = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $count++;
//            $day_check = array(
//                'class_time' => $single_time->class_time,
//                'class_day' => "Sunday"
//            );
//            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
//            if (!empty($result_day)) {
//                foreach ($result_day as $info_day) {
//                    $day_subject = $info_day->subject_name;
//                    $day_teacher_name = $info_day->teacher_name;
//                }
//            } else {
//                $day_subject = "";
//                $day_teacher_name = "";
//            }
//            $data['sunday_subject' . $count] = $day_subject;
//            $data['sunday_teacher_name' . $count] = $day_teacher_name;
//        }
//        //Monday
//        $count = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $count++;
//            $day_check = array(
//                'class_time' => $single_time->class_time,
//                'class_day' => "Monday"
//            );
//            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
//            if (!empty($result_day)) {
//                foreach ($result_day as $info_day) {
//                    $day_subject = $info_day->subject_name;
//                    $day_teacher_name = $info_day->teacher_name;
//                }
//            } else {
//                $day_subject = "";
//                $day_teacher_name = "";
//            }
//            $data['monday_subject' . $count] = $day_subject;
//            $data['monday_teacher_name' . $count] = $day_teacher_name;
//        }
//        //Tuesday
//        $count = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $count++;
//            $day_check = array(
//                'class_time' => $single_time->class_time,
//                'class_day' => "Tuesday"
//            );
//            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
//            if (!empty($result_day)) {
//                foreach ($result_day as $info_day) {
//                    $day_subject = $info_day->subject_name;
//                    $day_teacher_name = $info_day->teacher_name;
//                }
//            } else {
//                $day_subject = "";
//                $day_teacher_name = "";
//            }
//            $data['tuesday_subject' . $count] = $day_subject;
//            $data['tuesday_teacher_name' . $count] = $day_teacher_name;
//        }
//        //Wednesday
//        $count = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $count++;
//            $day_check = array(
//                'class_time' => $single_time->class_time,
//                'class_day' => "Wednesday"
//            );
//            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
//            if (!empty($result_day)) {
//                foreach ($result_day as $info_day) {
//                    $day_subject = $info_day->subject_name;
//                    $day_teacher_name = $info_day->teacher_name;
//                }
//            } else {
//                $day_subject = "";
//                $day_teacher_name = "";
//            }
//            $data['wednesday_subject' . $count] = $day_subject;
//            $data['wednesday_teacher_name' . $count] = $day_teacher_name;
//        }
//        //Thursday
//        $count = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $count++;
//            $day_check = array(
//                'class_time' => $single_time->class_time,
//                'class_day' => "Thursday"
//            );
//            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
//            if (!empty($result_day)) {
//                foreach ($result_day as $info_day) {
//                    $day_subject = $info_day->subject_name;
//                    $day_teacher_name = $info_day->teacher_name;
//                }
//            } else {
//                $day_subject = "";
//                $day_teacher_name = "";
//            }
//            $data['thursday_subject' . $count] = $day_subject;
//            $data['thursday_teacher_name' . $count] = $day_teacher_name;
//        }
//        //Friday
//        $count = 0;
//        foreach ($data['all_class_time'] as $single_time) {
//            $count++;
//            $day_check = array(
//                'class_time' => $single_time->class_time,
//                'class_day' => "Friday"
//            );
//            $result_day = $this->common_model->check_value_get_data('40_create_class_routine', $day_check);
//            if (!empty($result_day)) {
//                foreach ($result_day as $info_day) {
//                    $day_subject = $info_day->subject_name;
//                    $day_teacher_name = $info_day->teacher_name;
//                }
//            } else {
//                $day_subject = "";
//                $day_teacher_name = "";
//            }
//            $data['friday_subject' . $count] = $day_subject;
//            $data['friday_teacher_name' . $count] = $day_teacher_name;
//        }
//        $data['total_class'] = $total_class_number;
//        $this->load->view('admin/59_show_class_routine', $data);
//    }

    public function get_student_info() {
        $student_id = $this->input->post('student_id');
        $data['all_value'] = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $student_id);
        $this->load->view('admin/16_show_only_student_info', $data);
    }

    public function get_teacher_info() {
        $teacher_id = $this->input->post('teacher_id');
        $data['all_value'] = $this->common_model->get_allinfo_byid('13_insert_teacher_info', 'teacher_unique_id', $teacher_id);
        $this->load->view('admin/18_show_only_teacher_info', $data);
    }

    public function get_staff_info() {
        $teacher_id = $this->input->post('staff_id');
        $data['all_value'] = $this->common_model->get_allinfo_byid('14_insert_staff_info', 'staff_unique_id', $teacher_id);
        $this->load->view('admin/56_show_only_staff_info', $data);
    }

    public function get_guardian_info() {
        $guardian_id = $this->input->post('guardian_id');
        $data['all_value'] = $this->common_model->get_allinfo_byid('15_insert_guardian_info', 'guardian_unique_id', $guardian_id);
        $this->load->view('admin/20_show_only_guardian_info', $data);
    }

    public function get_day_time_subject() {
        $class_name = $this->input->post('class_name');
        $data['all_class_time'] = $this->common_model->get_allinfo_byid('39_create_time', 'class_name', $class_name);
        $data['all_subject'] = $this->common_model->get_allinfo_byid('25_teacher_subject_management', 'class_name', $class_name);
        $this->load->view('admin/58_show_day_time_subject', $data);
    }

    public function get_class_time() {
        $class_name = $this->input->post('class_name');
        $data['all_class_time'] = $this->common_model->get_allinfo_byid('39_create_time', 'class_name', $class_name);
        $this->load->view('admin/24_get_class_time', $data);
    }

    public function get_teacher_id() {
        $subject_name = $this->input->post('subject_name');
        $result = $this->common_model->get_teacher_unique_id_distinct($subject_name);
        $count = 0;
        foreach ($result as $info) {
            $count++;
            $teacher_unique_id = $info->teacher_unique_id;
            $result_name = $this->common_model->get_allinfo_byid('13_insert_teacher_info', 'teacher_unique_id', $teacher_unique_id);
            foreach ($result_name as $info_name) {
                $teacher_name = $info_name->name;
            }
            $data['teacher_id' . $count] = $teacher_unique_id;
            $data['teacher_name' . $count] = $teacher_name;
        }
        $data['count_it'] = $count;
        $this->load->view('admin/58_show_teacher_id', $data);
    }

    public function get_fee_discount() {
        $student_id = $this->input->post('student_id');
        $dis = 0;
        $result = $this->common_model->get_allinfo_byid('student_fee_discount', 'student_id', $student_id);
        foreach ($result as $info) {
            $dis = $info->discount;
        }
        echo $dis;
    }

    public function get_student_info_2() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $student_id = $this->input->post('student_id');
            if (!empty($student_id)) {
                $month = $this->input->post('month');
                $class_name = "";
                $data['all_value'] = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $student_id);
                foreach ($data['all_value'] as $single_value) {
                    $old_y = $single_value->session_name;
                    $class_name = $single_value->class_name;
                }

                $checking_array = array(
                    'student_id' => $student_id
                );
                $invoice_id = '';
                $fees_heads = '';
                $result = $this->common_model->check_value_get_data_orderby('10_3_fee_collection', $checking_array, 'record_id');
                if (!empty($result)) {
                    foreach ($result as $single_value) {
                        $invoice_id = $single_value->invoice_id;
                        if (!preg_match('/Tuition Fee/', $single_value->description)) {
                            $fees_heads .= $single_value->description . '-' . date('Y', strtotime($single_value->insertion_date));
                        }
                    }
                }
                $data['paid_fees_heads'] = $fees_heads;
                $data['student_paid_fees'] = $result;
                $checking_array = array(
                    'student_id' => $student_id,
                    'invoice_id' => $invoice_id
                );
                $result = $this->common_model->check_value_get_data_orderby('10_3_fee_collection', $checking_array, 'record_id');
                $total_due = 0;
                if (!empty($result)) {
                    foreach ($result as $single_value) {
                        $total_due += $single_value->due;
                    }
                }
//                print_r($invoice_id);
//                print_r($result);
                $data['due'] = $total_due;
                $data['month'] = $month;
                $data['all_fee_head'] = $this->common_model->get_all_info_by_class_name('10_1_class_fee', 'class_name', $class_name);
                
                $this->load->view('admin/33_show_student_info', $data);
            } else {
                echo "<p style='color: red'>Please Select a Student ID</p>";
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

//26-06-19
    public function student_tuition_months() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $student_id = $this->input->post('student_id');
            $recent_year = $this->input->post('recent_year');

            if (!empty($student_id)) {
                $checking_array = array(
                    'student_id' => $student_id,
                    'year' => $recent_year,
                );
                $tuition_month = '';
                $tuition_month_temp='';
                $tuition_amount = '';
                $result = $this->common_model->check_value_get_data_orderby_like('10_3_fee_collection', $checking_array, 'record_id', 'description', 'Tuition Fee');
                if (!empty($result)) {
                    foreach ($result as $single_value) {
                        $tuition_month_temp = str_replace('Tuition Fee', '', $single_value->description);
                        $tuition_month_temp = str_replace(')(', ',', $tuition_month_temp);
                        $tuition_month_temp = str_replace('(', '', $tuition_month_temp);
                        $tuition_month_temp = str_replace(')', '', $tuition_month_temp);
                        if($single_value->tuition_description=="")
                        {
                            $tuition_amount.=$tuition_month_temp.',';   
                        }else{
                            $tuition_amount .= $single_value->tuition_description.',';
                        }
                        $tuition_month .= $single_value->description;
                    }
                }
                $tuition_month = str_replace('Tuition Fee', '', $tuition_month);
                $tuition_month = str_replace(')(', ',', $tuition_month);
                $tuition_month = str_replace('(', '', $tuition_month);
                $tuition_month = str_replace(')', '', $tuition_month);
                $temp["tution_month"]=$tuition_month;
                $temp["tution_amount"]=$tuition_amount;
                echo json_encode($temp);
            } else {
                echo "<p style='color: red'>Please Select a Student ID</p>";
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_ledger_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {

            $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
            $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
            $data['all_income'] = $this->common_model->data_date_to_date('30_income', 'date', $date_from, $date_to);
            $data['all_fee'] = $this->common_model->data_date_to_date('10_3_fee_collection', 'insertion_date', $date_from, $date_to);
            $data['all_rent'] = $this->common_model->data_date_to_date('41_dormitory_rent_collection', 'date', $date_from, $date_to);

            $data['all_expense'] = $this->common_model->data_date_to_date('31_expense', 'date', $date_from, $date_to);

            $count = 0;
            foreach ($data['all_income'] as $info1) {
                $count++;
                $data['date' . $count] = $info1->date;
                $data['income_head' . $count] = $info1->income_head;
                $data['voucher_no' . $count] = $info1->voucher_no;
                $data['quantity' . $count] = $info1->quantity;
                $data['amount' . $count] = $info1->amount;
            }
            foreach ($data['all_fee'] as $info1) {
                $count++;
                $data['date' . $count] = $info1->insertion_date;
                $data['income_head' . $count] = $info1->student_id;
                $data['voucher_no' . $count] = $info1->invoice_id;
                $data['quantity' . $count] = $info1->quantity;
                $data['amount' . $count] = $info1->payment;
            }
//            foreach ($data['all_rent'] as $info1) {
//                $count++;
//                $data['date' . $count] = $info1->date;
//                $data['income_head' . $count] = $info1->dormitory_name;
//                $data['voucher_no' . $count] = $info1->invoice_no;
//                $data['quantity' . $count] = $info1->quantity;
//                $data['amount' . $count] = $info1->amount;
//            }

            $count_ex = 0;
            foreach ($data['all_expense'] as $info1) {
                $count_ex++;
                $data['expense_date' . $count_ex] = $info1->date;
                $data['expense_head' . $count_ex] = $info1->expense_head;
                $data['expense_voucher_no' . $count_ex] = $info1->voucher_no;
                $data['expense_quantity' . $count_ex] = $info1->quantity;
                $data['expense_amount' . $count_ex] = $info1->amount;
            }


            if ($count >= $count_ex) {
                $empty_range = $count - $count_ex;
                $start = $count_ex + 1;
                $finish = $count_ex + $empty_range;
                for ($i = $start; $i <= $finish; $i++) {
                    $data['expense_date' . $i] = "";
                    $data['expense_head' . $i] = "";
                    $data['expense_voucher_no' . $i] = "";
                    $data['expense_quantity' . $i] = "";
                    $data['expense_amount' . $i] = "";
                }
                $data['count_it'] = $count;
            } else {
                $empty_range = $count_ex - $count;
                $start = $count + 1;
                $finish = $count + $empty_range;
                for ($i = $start; $i <= $finish; $i++) {
                    $data['date' . $i] = "";
                    $data['income_head' . $i] = "";
                    $data['voucher_no' . $i] = "";
                    $data['quantity' . $i] = "";
                    $data['amount' . $i] = "";
                }
                $data['count_it'] = $count_ex;
            }

            $this->load->view('admin/39_ledger_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_website_total_result() {
        $class = $this->input->post('class');
        $shift = $this->input->post('shift');
        $group = $this->input->post('group');
        $section = $this->input->post('section');
        $session_name = $this->input->post('session_name');
        $exam = $this->input->post('exam_name');
        $data['class'] = $class;

        $check_data = array(
            "class_name" => $class,
            "session_name" => $session_name,
            "exam_type" => $exam,
            'status' => 1
        );
        if (!empty($group)) {
            $check_data['group_name'] = $group;
        }
        if (!empty($section)) {
            $check_data['section_name'] = $section;
        }
        if (!empty($shift)) {
            $check_data['shift_name'] = $shift;
        }
        $publish_result = $this->common_model->check_value('45_publish_result', $check_data);

        if ($publish_result) {
            $table_name = "26_grade_mark_management";
            $checking_array = array(
                "class_name" => $class,
                "session_name" => $session_name,
                "exam_type" => $exam,
            );
            if (!empty($group)) {
                $checking_array['group_name'] = $group;
            }
            if (!empty($section)) {
                $checking_array['section_name'] = $section;
            }
            if (!empty($shift)) {
                $checking_array['shift_name'] = $shift;
            }
            $result = $this->common_model->check_value_get_data($table_name, $checking_array);
            $count_mark = 0;
            $student_total = 0;
            $student_gpa = 0.00;
            if (!empty($result)) {
                foreach ($result as $res) {
                    $count_mark++;
                    $checking_array = array(
                        "student_id" => $res->student_id,
                        "exam_type" => $exam,
                    );
                    $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, $table_name);
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["student_name" . $count_mark] = $res->student_name;
                    $data["student_roll" . $count_mark] = $res->roll;
                    $data["student_class" . $count_mark] = $res->class_name;
                    $data["student_group" . $count_mark] = $res->group_name;
                    $data["student_section" . $count_mark] = $res->section_name;
                    $data["exam_type"] = $res->exam_type;
                    $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                    $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);


                    if (!empty($result3)) {
                        $data['marks' . $count_mark] = array_merge($result2, $result3);
                        $data['t_count'] = 1;
                    } else {
                        $data['marks' . $count_mark] = $result2;
                        $data['t_count'] = 0;
                    }

                    $b = 0;
                    $e = 0;
                    $d = 0;
                    $count_bang = 0;
                    $count_eng = 0;
                    foreach ($data['marks' . $count_mark] as $mark) {
                        if (strpos($mark->subject_name, 'BANG') !== false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'ENG') !== false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }

                        if (0 <= $d && $d < 40) {
                            $gpa = 0.00;
                        } else if (40 <= $d && $d < 50) {
                            $gpa = 2.00;
                        } else if (50 <= $d && $d < 60) {
                            $gpa = 3.00;
                        } else if (60 <= $d && $d < 70) {
                            $gpa = 3.50;
                        } else if (70 <= $d && $d < 80) {
                            $gpa = 4.00;
                        } else if (80 <= $d && $d <= 100) {
                            $gpa = 5.00;
                        } else {
                            $gpa = 'Invalid';
                        }
                        if ($mark->fourth_subject == '1') {
                            $data['fs' . $count_mark] = 1;
                            if ($gpa <= 2.00) {
                                $gpa = 0.00;
                            } else {
                                $gpa = $gpa - 2.00;
                            }
                        } else {
                            $data['fs' . $count_mark] = 0;
                        }


                        $student_total += $d;
                        $student_gpa = $student_gpa + $gpa;
                        $data['total' . $count_mark] = $student_total;
                        $data['gpa' . $count_mark] = $student_gpa;
                    }
                    $student_total = 0;
                    $student_gpa = 0;
                }
            }
            $data['c'] = $count_mark;
            $data['all_value'] = $result;
//        print_r($result);
//        print_r($data['all_subject']);
            $this->load->view('admin/52_total_result_info', $data);
        } else {
            echo "<p style='color: red; text-align: center; font-size: 20px;'><b>Result has not been published yet</b></p>";
        }
    }

    public function get_website_merit_list() {
        $class = $this->input->post('class');
        $shift = $this->input->post('shift');
        $group = $this->input->post('group');
        $section = $this->input->post('section');
        $session_name = $this->input->post('session_name');
        $exam = $this->input->post('exam_name');
        $data['class'] = $class;

        $check_data = array(
            "class_name" => $class,
            "session_name" => $session_name,
            "exam_type" => $exam,
            'status' => 1
        );
        if (!empty($group)) {
            $check_data['group_name'] = $group;
        }
        if (!empty($section)) {
            $check_data['section_name'] = $section;
        }
        if (!empty($shift)) {
            $check_data['shift_name'] = $shift;
        }
        $publish_result = $this->common_model->check_value('45_publish_result', $check_data);
        if ($publish_result) {
            $table_name = "26_grade_mark_management";
            $checking_array = array(
                "class_name" => $class,
                "session_name" => $session_name,
                "exam_type" => $exam,
            );
            if (!empty($group)) {
                $checking_array['group_name'] = $group;
            }
            if (!empty($section)) {
                $checking_array['section_name'] = $section;
            }
            if (!empty($shift)) {
                $checking_array['shift_name'] = $shift;
            }
            $result = $this->common_model->check_value_get_data($table_name, $checking_array);
            $count_mark = 0;
            $student_total = 0;
            $student_gpa = 0.00;
            if (!empty($result)) {
                foreach ($result as $res) {
                    $count_mark++;
                    $checking_array = array(
                        "student_id" => $res->student_id,
                        "exam_type" => $exam,
                    );
                    $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, $table_name);
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["student_name" . $count_mark] = $res->student_name;
                    $data["student_class" . $count_mark] = $res->class_name;
                    $data["student_group" . $count_mark] = $res->group_name;
                    $data["student_section" . $count_mark] = $res->section_name;
                    $data["student_roll" . $count_mark] = $res->roll;
                    $data["exam_type"] = $res->exam_type;
                    $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                    $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                    if (!empty($result3)) {
                        $data['marks' . $count_mark] = array_merge($result2, $result3);
                        $data['t_count'] = 1;
                    } else {
                        $data['marks' . $count_mark] = $result2;
                        $data['t_count'] = 0;
                    }

                    $b = 0;
                    $e = 0;
                    $d = 0;
                    $count_bang = 0;
                    $count_eng = 0;
                    foreach ($data['marks' . $count_mark] as $mark) {
                        if (strpos($mark->subject_name, 'BANG') !== false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'ENG') !== false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }

                        if (0 <= $d && $d < 40) {
                            $gpa = 0.00;
                        } else if (40 <= $d && $d < 50) {
                            $gpa = 2.00;
                        } else if (50 <= $d && $d < 60) {
                            $gpa = 3.00;
                        } else if (60 <= $d && $d < 70) {
                            $gpa = 3.50;
                        } else if (70 <= $d && $d < 80) {
                            $gpa = 4.00;
                        } else if (80 <= $d && $d <= 100) {
                            $gpa = 5.00;
                        } else {
                            $gpa = 'Invalid';
                        }
                        if ($mark->fourth_subject == '1') {
                            $data['fs' . $count_mark] = 1;
                            if ($gpa <= 2.00) {
                                $gpa = 0.00;
                            } else {
                                $gpa = $gpa - 2.00;
                            }
                        } else {
                            $data['fs' . $count_mark] = 0;
                        }


                        $student_total += $d;
                        $student_gpa = $student_gpa + $gpa;
                        $data['total' . $count_mark] = $student_total;
                        $data['gpa' . $count_mark] = $student_gpa;
                    }
                    $student_total = 0;
                    $student_gpa = 0;
                }
            }
            $data['c'] = $count_mark;
            $data['all_value'] = $result;
//        print_r($result);
//        print_r($data['all_subject']);
            $this->load->view('admin/54_merit_list_info', $data);
        } else {
            echo "<p style='color: red; text-align: center; font-size: 20px;'><b>Result has not been published yet</b></p>";
        }
    }

    public function get_website_fail_list() {
        $class = $this->input->post('class');
        $shift = $this->input->post('shift');
        $group = $this->input->post('group');
        $section = $this->input->post('section');
        $session_name = $this->input->post('session_name');
        $exam = $this->input->post('exam');
        $data['class'] = $class;

        $table_name = "26_grade_mark_management";
        $check_data = array(
            "class_name" => $class,
            "session_name" => $session_name,
            "exam_type" => $exam,
        );
        if (!empty($group)) {
            $check_data['group_name'] = $group;
        }
        if (!empty($section)) {
            $check_data['section_name'] = $section;
        }
        if (!empty($shift)) {
            $check_data['shift_name'] = $shift;
        }
        $publish_result = $this->common_model->check_value('45_publish_result', $check_data);
        if ($publish_result) {
            $table_name = "26_grade_mark_management";
            $checking_array = array(
                "class_name" => $class,
                "session_name" => $session_name,
                "exam_type" => $exam,
            );
            if (!empty($group)) {
                $checking_array['group_name'] = $group;
            }
            if (!empty($section)) {
                $checking_array['section_name'] = $section;
            }
            if (!empty($shift)) {
                $checking_array['shift_name'] = $shift;
            }
            $result = $this->common_model->check_value_get_data($table_name, $checking_array);
            $count_mark = 0;
            $student_total = 0;
            $student_gpa = 0.00;
            if (!empty($result)) {
                foreach ($result as $res) {
                    $count_mark++;
                    $checking_array = array(
                        "student_id" => $res->student_id,
                        "exam_type" => $exam,
                    );
                    $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, $table_name);
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["student_name" . $count_mark] = $res->student_name;
                    $data["student_roll" . $count_mark] = $res->roll;
                    $data["student_class" . $count_mark] = $res->class_name;
                    $data["student_group" . $count_mark] = $res->group_name;
                    $data["student_section" . $count_mark] = $res->section_name;
                    $data["exam_type"] = $res->exam_type;
                    $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                    $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                    if (!empty($result3)) {
                        $data['marks' . $count_mark] = array_merge($result2, $result3);
                        $data['t_count'] = 1;
                    } else {
                        $data['marks' . $count_mark] = $result2;
                        $data['t_count'] = 0;
                    }

                    $b = 0;
                    $e = 0;
                    $d = 0;
                    $count_bang = 0;
                    $count_eng = 0;
                    foreach ($data['marks' . $count_mark] as $mark) {
                        if (strpos($mark->subject_name, 'BANG') !== false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'ENG') !== false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }

                        if (0 <= $d && $d < 40) {
                            $gpa = 0.00;
                        } else if (40 <= $d && $d < 50) {
                            $gpa = 2.00;
                        } else if (50 <= $d && $d < 60) {
                            $gpa = 3.00;
                        } else if (60 <= $d && $d < 70) {
                            $gpa = 3.50;
                        } else if (70 <= $d && $d < 80) {
                            $gpa = 4.00;
                        } else if (80 <= $d && $d <= 100) {
                            $gpa = 5.00;
                        } else {
                            $gpa = 'Invalid';
                        }
                        if ($mark->fourth_subject == '1') {
                            $data['fs' . $count_mark] = 1;
                            if ($gpa <= 2.00) {
                                $gpa = 0.00;
                            } else {
                                $gpa = $gpa - 2.00;
                            }
                        } else {
                            $data['fs' . $count_mark] = 0;
                        }


                        $student_total += $d;
                        $student_gpa = $student_gpa + $gpa;
                        $data['total' . $count_mark] = $student_total;
                        $data['gpa' . $count_mark] = $student_gpa;
                    }
                    $student_total = 0;
                    $student_gpa = 0;
                }
            }
            $data['c'] = $count_mark;
            $data['all_value'] = $result;
//        print_r($result);
//        print_r($data['all_subject']);
            $this->load->view('admin/55_fail_list_info', $data);
        } else {
            echo "<p style='color: red; text-align: center; font-size: 20px;'><b>Result has not been published yet</b></p>";
        }
    }

    public function get_dorm_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $student_id = $this->input->post('student_id');

            $table_name = "41_student_dormitory_allocation";
            $result = $this->common_model->one_column_one_info('dormitory_name', 'student_id', $student_id, $table_name);
            foreach ($result as $res) {
                $dorm = $this->common_model->one_column_one_info('rent', 'dormitory_name', $res->dormitory_name, '41_insert_dormitory_info');
                foreach ($dorm as $d) {
                    echo $res->dormitory_name . ',' . $d->rent;
                }
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_sms_by_title() {
        $title = $this->input->post('title');
        $message = $this->common_model->one_column_one_info('body', 'title', $title, '46_create_sms');
        foreach ($message as $m) {
            $msg = $m->body;
        }
        echo $msg;
    }

    public function send_sms_to_guardians2() {
        $sms_content = $this->input->post('sms_body');
        $data['sms_sent'] = 1;
        $sms_body = $sms_content;

        $result = $this->common_model->get_all_info('15_insert_guardian_info');
        $count_mark = 0;

        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
//                $sms_result = $this->send_sms("+88" . $res->mobile, $sms_body);
//                if ($sms_result == -1) {
//                    $sms_msg = "Error!";
//                } else if ($sms_result == 0) {
//                    $sms_msg = "Accepted";
//                } else if ($sms_result == 1) {
//                    $sms_msg = "PENDING";
//                } else if ($sms_result == 2) {
//                    $sms_msg = "UNDELIVERABLE";
//                } else if ($sms_result == 3) {
//                    $sms_msg = "DELIVERED";
//                } else if ($sms_result == 4) {
//                    $sms_msg = "EXPIRED";
//                } else if ($sms_result == 5) {
//                    $sms_msg = "REJECTED";
//                } else {
//                    $sms_msg = "ERS";
//                }
            }
        }
        echo "<p style='color: green; font-size: 20px; padding: 10px;'>Message Sent Successfully</p>";
    }

    public function send_sms($mobile, $sms_body) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://107.20.199.106/restapi/sms/1/text/single",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ "
            . "\"from\":\"+8804445650406\", "
            . "\"to\":\"" . $mobile . "\", "
            . "\"text\":\"" . $sms_body . "\" }",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Basic bGVvcGFyZDU4OmFiYzI3MTEzMTg5MA==",
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            //echo "cURL Error #:" . $err;
            return -1;
        } else {
            //echo $response;
            $result = json_decode($response, true);
            return $result['messages'][0]['status']['groupId'];
        }
    }

    public function send_sms_to_teacher() {
        $sms_content = $this->input->post('sms_body');
        $data['sms_sent'] = 1;
        $sms_body = $sms_content;

        $result = $this->common_model->get_all_info('13_insert_teacher_info');
        $count_mark = 0;

        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
//                $sms_result = $this->send_sms("+88" . $res->mobile, $sms_body);
//                if ($sms_result == -1) {
//                    $sms_msg = "Error!";
//                } else if ($sms_result == 0) {
//                    $sms_msg = "Accepted";
//                } else if ($sms_result == 1) {
//                    $sms_msg = "PENDING";
//                } else if ($sms_result == 2) {
//                    $sms_msg = "UNDELIVERABLE";
//                } else if ($sms_result == 3) {
//                    $sms_msg = "DELIVERED";
//                } else if ($sms_result == 4) {
//                    $sms_msg = "EXPIRED";
//                } else if ($sms_result == 5) {
//                    $sms_msg = "REJECTED";
//                } else {
//                    $sms_msg = "ERS";
//                }
            }
        }
        echo "<p style='color: green; font-size: 20px; padding: 10px;'>Message Sent Successfully</p>";
    }

    public function send_sms_to_staff() {
        $sms_content = $this->input->post('sms_body');
        $data['sms_sent'] = 1;
        $sms_body = $sms_content;

        $result = $this->common_model->get_all_info('14_insert_staff_info');
        $count_mark = 0;

        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
//                $sms_result = $this->send_sms("+88" . $res->mobile, $sms_body);
//                if ($sms_result == -1) {
//                    $sms_msg = "Error!";
//                } else if ($sms_result == 0) {
//                    $sms_msg = "Accepted";
//                } else if ($sms_result == 1) {
//                    $sms_msg = "PENDING";
//                } else if ($sms_result == 2) {
//                    $sms_msg = "UNDELIVERABLE";
//                } else if ($sms_result == 3) {
//                    $sms_msg = "DELIVERED";
//                } else if ($sms_result == 4) {
//                    $sms_msg = "EXPIRED";
//                } else if ($sms_result == 5) {
//                    $sms_msg = "REJECTED";
//                } else {
//                    $sms_msg = "ERS";
//                }
            }
        }
        echo "<p style='color: green; font-size: 20px; padding: 10px;'>Message Sent Successfully</p>";
    }

    public function send_sms_to_governing_body() {
        $sms_content = $this->input->post('sms_body');
        $data['sms_sent'] = 1;
        $sms_body = $sms_content;

        $result = $this->common_model->get_all_info('17_insert_governing_body');
        $count_mark = 0;

        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
//                $sms_result = $this->send_sms("+88" . $res->mobile, $sms_body);
//                if ($sms_result == -1) {
//                    $sms_msg = "Error!";
//                } else if ($sms_result == 0) {
//                    $sms_msg = "Accepted";
//                } else if ($sms_result == 1) {
//                    $sms_msg = "PENDING";
//                } else if ($sms_result == 2) {
//                    $sms_msg = "UNDELIVERABLE";
//                } else if ($sms_result == 3) {
//                    $sms_msg = "DELIVERED";
//                } else if ($sms_result == 4) {
//                    $sms_msg = "EXPIRED";
//                } else if ($sms_result == 5) {
//                    $sms_msg = "REJECTED";
//                } else {
//                    $sms_msg = "ERS";
//                }
            }
        }
        echo "<p style='color: green; font-size: 20px; padding: 10px;'>Message Sent Successfully</p>";
    }

    public function get_student_for_attendance() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $class = $this->input->post('class_name');
            $group = $this->input->post('group_name');
            $section = $this->input->post('section_name');
            $shift_name = $this->input->post('shift_name');
            $version_name = $this->input->post('version_name');
            $session = date("Y");
            $data['session'] = $session;
            $data['date'] = $this->input->post('date');
            $data['intime'] = $this->input->post('intime');

            $table_name = "12_insert_student_info";
            $checking_array = array();
            if (!empty($class)) {
                $checking_array['class_name'] = $class;
            }
            if (!empty($group)) {
                $checking_array['group_name'] = $group;
            }
            if (!empty($section)) {
                $checking_array['section_name'] = $section;
            }
            if (!empty($shift_name)) {
                $checking_array['shift_name'] = $shift_name;
            }
            if (!empty($version_name)) {
                $checking_array['version_name'] = $version_name;
            }
            if (!empty($session)) {
                $checking_array['session_name'] = $session;
            }
            $result = $this->common_model->get_all_info_by_array($table_name, $checking_array);

            $data['all_value'] = $result;
//            print_r($result);
            $this->load->view('admin/23_student_info_for_attendance', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_employee_for_attendance() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $e_type = $this->input->post('e_type');
            $data['e_type'] = $e_type;
            $session = date("Y");
            $data['session'] = $session;
            $data['date'] = $this->input->post('date');
            $data['intime'] = $this->input->post('intime');
            if ($e_type == 'teacher') {
                $table_name = "13_insert_teacher_info";
            } elseif ($e_type == 'staff') {
                $table_name = "14_insert_staff_info";
            }
            $result = $this->common_model->get_all_info($table_name);
            $data['all_value'] = $result;
////            print_r($result);
            $this->load->view('admin/25_employee_info_for_attendance', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_employee_id() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $e_type = $this->input->post('e_type');
            $data['e_type'] = $e_type;
            if ($e_type == 'teacher') {
                $table_name = "13_insert_teacher_info";
            } elseif ($e_type == 'staff') {
                $table_name = "14_insert_staff_info";
            }
            $result = $this->common_model->get_all_info($table_name);

            $data['all_value'] = $result;
//            print_r($result);
            $this->load->view('admin/25_id_by_type', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_student_attendance_report() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $class = $this->input->post('class_name');
            $group = $this->input->post('group_name');
            $section = $this->input->post('section_name');
            $shift_name = $this->input->post('shift_name');
            $version_name = $this->input->post('version_name');
            $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
            $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
            $report = $this->input->post('report');
            $data['e_type'] = $report;
            $table_name = "47_student_attendance";
            $checking_array = array();
            if (!empty($class)) {
                $checking_array['class_name'] = $class;
            }
            if (!empty($group)) {
                $checking_array['group_name'] = $group;
            }
            if (!empty($section)) {
                $checking_array['section_name'] = $section;
            }
            if (!empty($shift_name)) {
                $checking_array['shift_name'] = $shift_name;
            }
            if (!empty($version_name)) {
                $checking_array['version_name'] = $version_name;
            }

            $result = $this->common_model->data_date_to_date_with_check($table_name, $checking_array, 'date', $date_from, $date_to);

            $data['all_value'] = $result;
            $data['date_range'] = date('d F, Y', strtotime($date_from)) . " - " . date('d F, Y', strtotime($date_to));
//            print_r($result);
            $this->load->view('admin/24_attendance_report_student', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_employee_attendance_report() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $report = $this->input->post('report');
            $data['e_type'] = $report;
            $date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
            $date_to = date('Y-m-d', strtotime($this->input->post('date_to')));

            $table_name = "47_employee_attendance";
            $checking_array = array(
                'employee_type' => $report
            );
            $data['date_range'] = date('d F, Y', strtotime($date_from)) . " - " . date('d F, Y', strtotime($date_to));

            $result = $this->common_model->data_date_to_date_with_check($table_name, $checking_array, 'date', $date_from, $date_to);

            $data['all_value'] = $result;
//            print_r($result);
            $this->load->view('admin/24_attendance_report_employee', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_all_testimonial() {

        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $class_name = $this->input->post('class_name');
        $shift_name = $this->input->post('shift_name');
        $group_name = $this->input->post('group_name');
        $section_name = $this->input->post('section_name');
        $session_name = $this->input->post('session_name');
        $exam_type = $this->input->post('exam_name');
        $data['class'] = $class_name;
        $checking_array = array();
        $checking_array['26_grade_mark_management.exam_type'] = $exam_type;
        if (!empty($class_name)) {
            $checking_array['26_grade_mark_management.class_name'] = $class_name;
        }
        if (!empty($shift_name)) {
            $checking_array['26_grade_mark_management.shift_name'] = $shift_name;
        }
        if (!empty($group_name)) {
            $checking_array['26_grade_mark_management.group_name'] = $group_name;
        }
        if (!empty($section_name)) {
            $checking_array['26_grade_mark_management.section_name'] = $section_name;
        }
        if (!empty($session_name)) {
            $checking_array['26_grade_mark_management.session_name'] = $session_name;
        }

        $result = $this->common_model->check_value_get_data_with_parents($checking_array);
        if (!empty($result)) {
            foreach ($result as $res) {
                $data['exam'] = $res->exam_type;
            }
        }
        unset($checking_array);
        if (!empty($result)) {
            $count_mark = 0;
            $student_total = 0;
            $student_gpa = 0.00;
            $checking_array = array();
            if (!empty($class_name)) {
                $checking_array['class_name'] = $class_name;
            }
            if (!empty($shift_name)) {
                $checking_array['shift_name'] = $shift_name;
            }
            if (!empty($group_name)) {
                $checking_array['group_name'] = $group_name;
            }
            if (!empty($section_name)) {
                $checking_array['section_name'] = $section_name;
            }
            if (!empty($session_name)) {
                $checking_array['session_name'] = $session_name;
            }
            $sub_count = 0;
            foreach ($result as $res) {
                $count_mark++;
                $checking_array = array(
                    "student_id" => $res->student_id,
                    "exam_type" => $res->exam_type,
                );
                $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, '26_grade_mark_management');
                foreach ($data['all_subject'] as $sub) {
                    $sub_count++;
                }
                $data["student_id" . $count_mark] = $res->student_id;
                $data["student_name" . $count_mark] = $res->student_name;
                $data["father_name" . $count_mark] = $res->father_name;
                $data["mother_name" . $count_mark] = $res->mother_name;
                $data["birth_date" . $count_mark] = $res->date_of_birth;
                $data["student_roll" . $count_mark] = $res->roll;
                $data["exam_type"] = $res->exam_type;
                $result2 = $this->common_model->check_value_get_data('26_grade_mark_management', $checking_array);
                $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result3)) {
                    $data['marks' . $count_mark] = array_merge($result2, $result3);
                    $data['t_count'] = 1;
                } else {
                    $data['marks' . $count_mark] = $result2;
                    $data['t_count'] = 0;
                }

                $b = 0;
                $e = 0;
                $d = 0;
                $count_bang = 0;
                $count_eng = 0;
                foreach ($data['marks' . $count_mark] as $mark) {
                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = ($mark->total_mark * 5);
                        } elseif (in_array($mark->subject_name, $subject_50)) {
                            $d = $mark->total_mark * 2;
                        } else {
                            $d = $mark->total_mark;
                        }
                    } else {
                        if (strpos($mark->subject_name, 'Bang') != false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'English ') != false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }
                    }

                    if (0 <= $d && $d < 33) {
                        $gpa = 0.00;
                    } else if (33 <= $d && $d < 40) {
                        $gpa = 1.00;
                    } else if (40 <= $d && $d < 50) {
                        $gpa = 2.00;
                    } else if (50 <= $d && $d < 60) {
                        $gpa = 3.00;
                    } else if (60 <= $d && $d < 70) {
                        $gpa = 3.50;
                    } else if (70 <= $d && $d < 80) {
                        $gpa = 4.00;
                    } else if (80 <= $d && $d <= 100) {
                        $gpa = 5.00;
                    } else {
                        $gpa = 'Invalid';
                    }
                    if ($mark->fourth_subject == '1') {
                        $data['fs' . $count_mark] = 1;
                        if ($gpa <= 2.00) {
                            $gpa = 0.00;
                        } else {
                            $gpa = $gpa - 2.00;
                        }
                    } else {
                        $data['fs' . $count_mark] = 0;
                    }


                    $student_total += $d;
                    $student_gpa = $student_gpa + $gpa;
                    $data['total' . $count_mark] = $student_total;
                    $data['gpa' . $count_mark] = $student_gpa;
                }
                $student_total = 0;
                $student_gpa = 0;
            }
            $data['c'] = $count_mark;
            $data['all_value'] = $result;
        } else {
            $data['all_val'] = 'Exam not given';
        }
        $this->load->view('admin/62_show_testimonial', $data);
    }

    public function get_specific_testimonial() {

        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $student_id = $this->input->post('student_id');
        $session_name = $this->input->post('session_name');
        $exam_type = $this->input->post('exam_type');
        $checking_array['student_unique_id'] = $student_id;
        $result = $this->common_model->get_all_info_by_array('12_insert_student_info', $checking_array);
        foreach ($result as $res) {
            $data['class'] = $res->class_name;
        }
        $checking_array = array();
        $checking_array['26_grade_mark_management.student_id'] = $student_id;
        $checking_array['26_grade_mark_management.exam_type'] = $exam_type;
        if (!empty($session_name)) {
            $checking_array['26_grade_mark_management.session_name'] = $session_name;
        }

        $result = $this->common_model->check_value_get_data_with_parents($checking_array);
        if (!empty($result)) {
            foreach ($result as $res) {
                $data['exam'] = $res->exam_type;
            }
        }
        unset($checking_array);
        if (!empty($result)) {
            $count_mark = 0;
            $student_total = 0;
            $student_gpa = 0.00;
            $checking_array = array();
            if (!empty($class_name)) {
                $checking_array['class_name'] = $class_name;
            }
            if (!empty($shift_name)) {
                $checking_array['shift_name'] = $shift_name;
            }
            if (!empty($group_name)) {
                $checking_array['group_name'] = $group_name;
            }
            if (!empty($section_name)) {
                $checking_array['section_name'] = $section_name;
            }
            if (!empty($session_name)) {
                $checking_array['session_name'] = $session_name;
            }
            $sub_count = 0;
            foreach ($result as $res) {
                $count_mark++;
                $checking_array = array(
                    "student_id" => $res->student_id,
                    "exam_type" => $res->exam_type,
                );
                $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, '26_grade_mark_management');
                foreach ($data['all_subject'] as $sub) {
                    $sub_count++;
                }
                $data["student_id" . $count_mark] = $res->student_id;
                $data["student_name" . $count_mark] = $res->student_name;
                $data["father_name" . $count_mark] = $res->father_name;
                $data["mother_name" . $count_mark] = $res->mother_name;
                $data["birth_date" . $count_mark] = $res->date_of_birth;
                $data["student_roll" . $count_mark] = $res->roll;
                $data["exam_type"] = $res->exam_type;
                $result2 = $this->common_model->check_value_get_data('26_grade_mark_management', $checking_array);
                $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result3)) {
                    $data['marks' . $count_mark] = array_merge($result2, $result3);
                    $data['t_count'] = 1;
                } else {
                    $data['marks' . $count_mark] = $result2;
                    $data['t_count'] = 0;
                }

                $b = 0;
                $e = 0;
                $d = 0;
                $count_bang = 0;
                $count_eng = 0;
                foreach ($data['marks' . $count_mark] as $mark) {
                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = ($mark->total_mark * 5);
                        } elseif (in_array($mark->subject_name, $subject_50)) {
                            $d = $mark->total_mark * 2;
                        } else {
                            $d = $mark->total_mark;
                        }
                    } else {
                        if (strpos($mark->subject_name, 'Bang') != false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'English ') != false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }
                    }

                    if (0 <= $d && $d < 33) {
                        $gpa = 0.00;
                    } else if (33 <= $d && $d < 40) {
                        $gpa = 1.00;
                    } else if (40 <= $d && $d < 50) {
                        $gpa = 2.00;
                    } else if (50 <= $d && $d < 60) {
                        $gpa = 3.00;
                    } else if (60 <= $d && $d < 70) {
                        $gpa = 3.50;
                    } else if (70 <= $d && $d < 80) {
                        $gpa = 4.00;
                    } else if (80 <= $d && $d <= 100) {
                        $gpa = 5.00;
                    } else {
                        $gpa = 'Invalid';
                    }
                    if ($mark->fourth_subject == '1') {
                        $data['fs' . $count_mark] = 1;
                        if ($gpa <= 2.00) {
                            $gpa = 0.00;
                        } else {
                            $gpa = $gpa - 2.00;
                        }
                    } else {
                        $data['fs' . $count_mark] = 0;
                    }


                    $student_total += $d;
                    $student_gpa = $student_gpa + $gpa;
                    $data['total' . $count_mark] = $student_total;
                    $data['gpa' . $count_mark] = $student_gpa;
                }
                $student_total = 0;
                $student_gpa = 0;
            }
            $data['c'] = $count_mark;
            $data['all_value'] = $result;
        } else {
            $data['all_val'] = 'Exam not given';
        }
        $this->load->view('admin/62_show_testimonial', $data);
    }

    public function get_dorm_rent_collection_report() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $date = $this->input->post('date');
            $student_id = $this->input->post('student_id');
            $table_name = "41_dormitory_rent_collection";
            $checking_array = array();
            if (!empty($date)) {
                $checking_array['date'] = $date;
            }
            if (!empty($student_id)) {
                $checking_array['student_id'] = $student_id;
            }

            $result = $this->common_model->check_value_get_data($table_name, $checking_array);
            $count_mark = 0;
            $total = 0;
            $sl = 1;
            if (!empty($result)) {
                foreach ($result as $res) {
                    $count_mark++;
                    $data["sl" . $count_mark] = $sl++;
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["inserted_by" . $count_mark] = $res->inserted_by;
                    if (stripos(strtolower($res->inserted_by), "A")) {
                        $data["inserted_by_name" . $count_mark] = $this->common_model->one_column_one_info('name', 'admin_unique_id', $res->inserted_by, '0_admin');
                    } else if (stripos(strtolower($res->inserted_by), "D")) {
                        $data["inserted_by_name" . $count_mark] = $this->common_model->one_column_one_info('name', 'staff_unique_id', $res->inserted_by, '14_insert_staff_info');
                    }
                    $student = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $res->student_id);
                    foreach ($student as $st) {
                        $student_name = $st->name;
                        $class = $st->class_name;
                        $group = $st->group_name;
                        $roll = $st->roll;
                    }
                    $data["student_name" . $count_mark] = $student_name;
                    $data["class" . $count_mark] = $class;
                    $data["group" . $count_mark] = $group;
                    $data["roll" . $count_mark] = $roll;
                    $data["description" . $count_mark] = $res->month;
                    $data["hall" . $count_mark] = $res->dormitory_name;
                    $data["amount" . $count_mark] = $res->amount;
                    $data["quantity" . $count_mark] = $res->quantity;
                    $data["discount" . $count_mark] = $res->discount;
                    $data["invoice" . $count_mark] = $res->invoice_no;
                    $data["date" . $count_mark] = $res->date;
                    $data["total" . $count_mark] = $res->total;
                    $total += $res->total;
                }
            }
            $data["total"] = $total;

            $data['c'] = $count_mark;
            $data['all_value'] = $result;
            $data['date'] = $date;
            $data['student_id'] = $student_id;
//        echo '<pre>';
//        print_r($data['all_value']);
            $this->load->view('admin/44_dorm_rent_collection_report_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function get_teacher_sub_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $teacher_id = $this->input->post('teacher_id');
            $session_id = $this->input->post('session_id');

            $data['all_class'] = $this->common_model->get_class_by_teacher_for_marks($teacher_id,$session_id);
            $data['all_shift'] = $this->common_model->get_shift_by_teacher_for_marks($teacher_id,$session_id);
            $data['all_group'] = $this->common_model->get_group_by_teacher_for_marks($teacher_id,$session_id);
            $data['all_section'] = $this->common_model->get_section_by_teacher_for_marks($teacher_id,$session_id);
            // $data['all_subject'] = $this->common_model->get_subject_by_teacher_for_marks($teacher_id);
            $this->load->view('admin/28_teacher_sub_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function get_exam_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $class_id = $this->input->post('class_id');
            $session_id = $this->input->post('session_id');
            $data['all_value'] = $this->common_model->get_list("8_create_exam_type","record_id,exam_type",array("class_id"=>$class_id,"session_id"=>$session_id));
            $this->load->view('admin/28_class_exam_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function get_teacher_class_subject_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $teacher_id = $this->input->post('teacher_id');
            $class_id = $this->input->post('class_id');
            $session_id = $this->input->post('session_id');

            $group_id = $this->input->post('group_id');
            $shift_id = $this->input->post('shift_id');
            $section_id = $this->input->post('section_id');
            $checking_array = array(
                'SM.teacher_id' => $teacher_id,
                'SM.class_id' => $class_id,
                'SM.session_id' => $session_id,
            );
            if (!empty($shift_id)) {
                $checking_array['SM.shift_id'] = $shift_id;
            }
            if (!empty($group_id)) {
                $checking_array['SM.group_id'] = $group_id;
            }
            if (!empty($section_id)) {
                $checking_array['SM.section_id'] = $section_id;
            }
            // echo "<pre>";
            // print_r($checking_array);
            // die();
            $data['all_subject'] = $this->common_model->get_subject_by_multiple_condition_for_marks($checking_array);
            $this->load->view('admin/28_class_subject_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function get_subject_total_mark(){
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $subject_name=$this->input->post("subject_name");
            $result = $this->common_model->get_allinfo_byid('7_create_subject', 'subject_name', $subject_name);
           echo $result[0]->subject_total_mark;
            // $this->load->view('admin/66_class_exam_info_glance', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_exam_info_glance() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $class_name = $this->input->post('class_name');
            $data['all_value'] = $this->common_model->get_allinfo_byid('8_create_exam_type', 'class_name', $class_name);
            $this->load->view('admin/66_class_exam_info_glance', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    //26-06-2019
    public function get_total_result() {
        $list=$this->input->post("list");
        $website=$this->input->post("website");
        $session_id=explode("#",$this->input->post("session_id"))[0];
        $session_name=explode("#",$this->input->post("session_id"))[1];
        $class_id=explode("#",$this->input->post("class_id"))[0];
        $class_name=explode("#",$this->input->post("class_id"))[1];
        $shift_id=explode("#",$this->input->post("shift_id"))[0];
        $shift_name=explode("#",$this->input->post("shift_id"))[1];
        $section_id=explode("#",$this->input->post("section_id"))[0];
        $group_name='';
        $section_name='';
        if($section_id!='')
        {
            $section_name=explode("#",$this->input->post("section_id"))[1];
            $checking_array['GM.section_id']=$section_id;
        }
        $group_id=explode("#",$this->input->post("group_id"))[0];
        if($group_id!='')
        {
            $group_name=explode("#",$this->input->post("group_id"))[1];
            $checking_array['GM.group_id']=$group_id;
        }
        $exam_id=$this->input->post("exam_id");
        $checking_array['GM.session_id']=$session_id;
        $checking_array['GM.class_id']=$class_id;
        $checking_array['GM.shift_id']=$shift_id;
        $checking_array['GM.exam_id']=$exam_id;
        $data['class_name']=$class_name;
        $data['section_name']=$section_name;
        $data['group_name']=$group_name;
        if($website!='')
        {
            $check_array = array(
                'class_id' => $class_id,
                'shift_id' => $shift_id,
                'group_id' => $group_id,
                'section_id' => $section_id,
                'session_id' => $session_id,
                'exam_id' => $exam_id,
                'status' => 1,
            );
            $exits=$this->common_model->exits_check("45_publish_result",$check_array);
            if($exits)
            {
                $data['all_result']=$this->common_model->get_student_total_result($checking_array);
            }else{
                $data['all_result']="";
            }
        }else{
            $data['all_result']=$this->common_model->get_student_total_result($checking_array);
        }
        // debug_r($data);
        if(empty($data['all_result']))
        {
            $send_data['msg']="err";
        }else{
            if($list=="merit_list")
            {
                $send_data["result"]=$this->load->view('admin/54_merit_list_info', $data,true);
            }
            else if($list=="fail_list")
            {
                $send_data["result"]=$this->load->view('admin/55_fail_list_info', $data,true);
            }
            else if($list=="at_a_glance")
            {
                $send_data["result"]=$this->load->view('admin/66_result_at_a_glance_info', $data,true);
            }
            else{
                $send_data["result"]=$this->load->view('admin/52_total_result_info', $data,true);
            }
            $send_data['msg']="success";
        }
        echo json_encode($send_data);
    }

    public function get_total_result_for_promotion() {
        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $class = $this->input->post('class');
        $shift = $this->input->post('shift');
        $group = $this->input->post('group');
        $section = $this->input->post('section');
        $session_name = $this->input->post('session_name');
        $exam = $this->input->post('exam');
        $data['class'] = $class;

        $table_name = "26_grade_mark_management";
        $checking_array = array(
            "class_name" => $class,
            "session_name" => $session_name,
            "exam_type" => $exam,
        );
        if (!empty($group)) {
            $checking_array['group_name'] = $group;
        }
        if (!empty($section)) {
            $checking_array['section_name'] = $section;
        }
        if (!empty($shift)) {
            $checking_array['shift_name'] = $shift;
        }

        $result = $this->common_model->check_value_get_data($table_name, $checking_array);

        $count_mark = 0;
        $student_total = 0;
        $student_gpa = 0.00;
        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
                $checking_array = array(
                    "student_id" => $res->student_id,
                    "exam_type" => $exam,
                );
                $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, $table_name);
                $data["student_id" . $count_mark] = $res->student_id;
                $data["student_name" . $count_mark] = $res->student_name;
                $data["student_roll" . $count_mark] = $res->roll;
                $data["student_class" . $count_mark] = $res->class_name;
                $data["student_group" . $count_mark] = $res->group_name;
                $data["student_section" . $count_mark] = $res->section_name;
                $data["exam_type"] = $res->exam_type;
                $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result3)) {
                    $data['marks' . $count_mark] = array_merge($result2, $result3);
                    $data['t_count'] = 1;
                } else {
                    $data['marks' . $count_mark] = $result2;
                    $data['t_count'] = 0;
                }

                $b = 0;
                $e = 0;
                $d = 0;
                $count_bang = 0;
                $count_eng = 0;
                foreach ($data['marks' . $count_mark] as $mark) {
                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = ($mark->total_mark * 5);
                        } elseif (in_array($mark->subject_name, $subject_50)) {
                            $d = $mark->total_mark * 2;
                        } else {
                            $d = $mark->total_mark;
                        }
                    } else {
                        if (strpos($mark->subject_name, 'Bang') != false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'English ') != false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }
                    }

                    if (0 <= $d && $d < 33) {
                        $gpa = 0.00;
                    } else if (33 <= $d && $d < 40) {
                        $gpa = 1.00;
                    } else if (40 <= $d && $d < 50) {
                        $gpa = 2.00;
                    } else if (50 <= $d && $d < 60) {
                        $gpa = 3.00;
                    } else if (60 <= $d && $d < 70) {
                        $gpa = 3.50;
                    } else if (70 <= $d && $d < 80) {
                        $gpa = 4.00;
                    } else if (80 <= $d && $d <= 100) {
                        $gpa = 5.00;
                    } else {
                        $gpa = 'Invalid';
                    }
                    if ($mark->fourth_subject == '1') {
                        $data['fs' . $count_mark] = 1;
                        if ($gpa <= 2.00) {
                            $gpa = 0.00;
                        } else {
                            $gpa = $gpa - 2.00;
                        }
                    } else {
                        $data['fs' . $count_mark] = 0;
                    }

                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = $mark->total_mark;
                        } elseif (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                            if (in_array($mark->subject_name, $subject_50)) {
                                $d = $mark->total_mark;
                            }
                        }
                    }

                    $student_total += $d;
                    $student_gpa = $student_gpa + $gpa;
                    $data['total' . $count_mark] = $student_total;
                    $data['gpa' . $count_mark] = $student_gpa;
                }
                $student_total = 0;
                $student_gpa = 0;
            }
        }
        $data['c'] = $count_mark;
        $data['all_value'] = $result;
//        print_r($result);
//        print_r($data['all_subject']);
        $this->load->view('admin/68_class_promotion_info', $data);
    }

    public function get_report_card() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
            $class_array2 = array('6', '7', '8');
            $class_array3 = array('9', '10');
            $subject_50 = array(
                'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
                'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
                'Physical Education & Health', 'Work & Life Oriented Education'
            );

            $class = $this->input->post('class');
            $student_id = $this->input->post('student_id');
            $exam = $this->input->post('exam');

            $student = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $student_id);
            foreach ($student as $st) {
                $data["st_name"] = $st->name;
                $data["st_class"] = $st->class_name;
                $data["st_section_name"] = $st->section_name;
                $data["st_father_name"] = $st->father_name;
                $data["st_mother_name"] = $st->mother_name;
                $data["st_roll"] = $st->roll;
                $data["st_id"] = $student_id;
            }


            $table_name = "26_grade_mark_management";
            $checking_array = array(
                "class_name" => $class,
                "student_id" => $student_id,
                "exam_type" => $exam,
            );
            $result = $this->common_model->check_value_get_data_orderby('26_grade_mark_management', $checking_array, 'subject_serial');
            $result2 = $this->common_model->check_value_get_data_orderby('26_grade_mark_tutorial', $checking_array, 'subject_serial');
            if (!empty($result2)) {
                $result3 = array_merge($result, $result2);
            } else {
                $result3 = $result;
            }

            $year = date("Y");
            $n_year = date('Y', strtotime('+1 year', strtotime($year)));
            if ($exam == 'Half Yearly') {
                $date_from = date("Y-m-d", strtotime($year . "-04-01"));
                $date_to = date("Y-m-d", strtotime($year . "-08-30"));
            } elseif ($exam == 'Yearly') {
                $date_from = date("Y-m-d", strtotime($year . "-09-01"));
                $date_to = date("Y-m-d", strtotime($n_year . "-03-31"));
            }
            $count_mark = 0;
            if (!empty($result3)) {
                foreach ($result3 as $res) {
                    $count_mark++;

                    $data["student_name" . $count_mark] = $res->student_name;
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["student_class" . $count_mark] = $res->class_name;
                    $data["student_roll" . $count_mark] = $res->roll;
                    $data["student_section" . $count_mark] = $res->section_name;
                    $data["subject" . $count_mark] = $res->subject_name;
                    $data["exam_type"] = $res->exam_type;
                    if ($res->subject_name != 'Tutorial') {
                        $data["w_mark" . $count_mark] = $res->written_mark;
                        $data["mcq" . $count_mark] = $res->mcq_mark;
                        $data["prac" . $count_mark] = $res->practical_mark;
                    } else {
                        $data["w_mark" . $count_mark] = 'X';
                        $data["mcq" . $count_mark] = 'X';
                        $data["prac" . $count_mark] = 'X';
                    }
                    $data['marks' . $count_mark] = $res->total_mark;

                    if (in_array($class, $class_array1) || in_array($class, $class_array2)) {
                        if ($res->subject_name == 'Drawing') {
                            $data['marks' . $count_mark] = $res->total_mark * 5;
                        } elseif (in_array($res->subject_name, $subject_50)) {
                            $data['marks' . $count_mark] = $res->total_mark * 2;
                        }
                    }

                    if (0 <= $data['marks' . $count_mark] && $data['marks' . $count_mark] < 33) {
                        $data['gpa' . $count_mark] = 0.00;
                    } else if (33 <= $data['marks' . $count_mark] && $data['marks' . $count_mark] < 40) {
                        $data['gpa' . $count_mark] = 1.00;
                    } else if (40 <= $data['marks' . $count_mark] && $data['marks' . $count_mark] < 50) {
                        $data['gpa' . $count_mark] = 2.00;
                    } else if (50 <= $data['marks' . $count_mark] && $data['marks' . $count_mark] < 60) {
                        $data['gpa' . $count_mark] = 3.00;
                    } else if (60 <= $data['marks' . $count_mark] && $data['marks' . $count_mark] < 70) {
                        $data['gpa' . $count_mark] = 3.50;
                    } else if (70 <= $data['marks' . $count_mark] && $data['marks' . $count_mark] < 80) {
                        $data['gpa' . $count_mark] = 4.00;
                    } else if (80 <= $data['marks' . $count_mark] && $data['marks' . $count_mark] <= 100) {
                        $data['gpa' . $count_mark] = 5.00;
                    } else {
                        $data['gpa' . $count_mark] = 'Invalid';
                    }

                    $data['marks' . $count_mark] = $res->total_mark;
                }
            }
            $data['c'] = $count_mark;
            $data['all_value'] = $result;
//            echo "<pre>";
//        print_r($result);
//        print_r($data['all_tutorial']);
            $this->load->view('admin/53_report_card_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function get_student_for_marks_old() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {

            $class_array = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');

            $teacher_id = $this->input->post('teacher_id');
            $class = $this->input->post('class');
            $shift = $this->input->post('shift');
            $group = $this->input->post('group');
            $section = $this->input->post('section');
            $session_name = $this->input->post('session_name');
            $data['exam'] = $this->input->post('exam');
            $data['subject'] = $this->input->post('subject');


            $check_duplicate = array(
                'session_name' => $session_name,
                'teacher_id' => $teacher_id,
                'class_name' => $class,
                'group_name' => $group,
                'section_name' => $section,
                'shift_name' => $shift,
                'subject_name' => $data['subject'],
                'exam_type' => $data['exam']
            );
            $data["duplicate_array"] = $check_duplicate;
            $duplicate_result = $this->common_model->get_all_info_by_array("26_grade_mark_management", $check_duplicate);
            $table_name = "12_insert_student_info";
                if ($class == "9" || $class == "10") {
                    $checking_array = array(
                        "class_name" => $class,
                        "shift_name" => $shift,
                        "group_name" => $group,
                        "session_name" => $session_name
                    );
                } else {
                    $checking_array = array(
                        "class_name" => $class,
                        "shift_name" => $shift,
                        "section_name" => $section,
                        "session_name" => $session_name
                    );
                }


                $data['all_value'] = $this->common_model->check_value_get_data_orderby($table_name, $checking_array, "roll");
//            print_r($checking_array);
                $practical_array = array();
                $result = $this->common_model->get_allinfo_byid('7_create_subject', 'practical_applicable', 1);
                foreach ($result as $info) {
                    $practical_subject = $info->subject_name;
                    array_push($practical_array, $practical_subject);
                }
                $data['subject_practical_array'] = $practical_array;
                if($user_type == "teacher")
                {
                    if (!empty($duplicate_result)) {
                        $this->load->view('admin/allready_marks_input', $data);
                    }else{
                        if (in_array($class, $class_array) && $data['subject'] == 'Tutorial') {
                            $this->load->view('admin/28_student_info_for_marks_tutorial', $data);
                        } else {
                            $this->load->view('admin/28_student_info_for_marks', $data);
                        }
                    }
                }else{
                    if (in_array($class, $class_array) && $data['subject'] == 'Tutorial') {
                        $this->load->view('admin/28_student_info_for_marks_tutorial', $data);
                    } else {
                        $this->load->view('admin/28_student_info_for_marks', $data);
                    }
                }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    //26-06-19
    public function get_student_for_marks() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            if($_POST)
            {
                $temp_array=array();
                $date=date("Y-m-d",strtotime($this->input->post("date")));
                $session_id=explode("#",$this->input->post("session_id"))[0];
                $session_name=explode("#",$this->input->post("session_id"))[1];
                $teacher_id=$this->input->post("teacher_id");
                $class_id=explode("#",$this->input->post("class_id"))[0];
                $class_name=explode("#",$this->input->post("class_id"))[1];
                $shift_id=explode("#",$this->input->post("shift_id"))[0];
                $shift_name=explode("#",$this->input->post("shift_id"))[1];
                $section_id=explode("#",$this->input->post("section_id"))[0];
                if($section_id!='')
                {
                    $section_name=explode("#",$this->input->post("section_id"))[1];
                    $temp_array=array(
                        "section_name"=>$section_name
                    );
                }
                $group_id=explode("#",$this->input->post("group_id"))[0];
                if($group_id!='')
                {
                    $group_name=explode("#",$this->input->post("group_id"))[1];
                    $temp_array=array(
                        "group_name"=>$group_name
                    );
                }
                $exam_id=$this->input->post("exam_id");
                $subject_id=$this->input->post("subject_id");
                $index_array=array(
                    "class_name"=>$class_name,
                    "shift_name"=>$shift_name,
                    "session_name"=>$session_name,
                );
                $index_array=array_merge($temp_array,$index_array);
                $check_duplicate=array(
                    "class_id"=>$class_id,
                    "section_id"=>$section_id,
                    "session_id"=>$session_id,
                    "shift_id"=>$shift_id,
                    "teacher_id"=>$teacher_id,
                    "group_id"=>$group_id,
                    "subject_id"=>$subject_id,
                );
                $insert_data=array();
                $duplicate_result = $this->common_model->check_value("26_grade_mark_management", $check_duplicate);
                if(!$duplicate_result)
                {
                    $get_student=$this->common_model->get_list("12_insert_student_info","record_id",$index_array,"roll","asc");
                    if(isset($get_student))
                    {
                        foreach ($get_student as $key => $value) {
                            $insert_data[$key]['session_id']=$session_id;
                            $insert_data[$key]['class_id']=$class_id;
                            $insert_data[$key]['group_id']=$group_id;
                            $insert_data[$key]['teacher_id']=$teacher_id;
                            $insert_data[$key]['shift_id']=$shift_id;
                            $insert_data[$key]['section_id']=$section_id;
                            $insert_data[$key]['student_id']=$value['record_id'];
                            $insert_data[$key]['subject_id']=$subject_id;
                            $insert_data[$key]['exam_id']=$exam_id;
                        }
                        $this->common_model->insert_batch("26_grade_mark_management",$insert_data);
                    }
                }
                $data['all_student_mark']=$this->common_model->get_student_mark($check_duplicate);
                if($user_type=="teacher")
                {
                    $checking_array=array(
                        "class_id"=>$class_id,
                        "section_id"=>$section_id,
                        "session_id"=>$session_id,
                        "shift_id"=>$shift_id,
                        "teacher_id"=>$teacher_id,
                        "group_id"=>$group_id,
                        "status"=>1,
                    );
                    $duplicate_result = $this->common_model->check_value("26_grade_mark_management", $checking_array);
                    if(!empty($duplicate_result)){
                        $this->load->view('admin/allready_marks_input');
                        exit;
                    }
                }
                $this->load->view("admin/28_student_info_for_marks",$data);
                // echo "<pre>";
                // print_r($index_array);
                // die();
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function send_sms_to_guardians() {
        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $class = $this->input->post('class');
        $group = $this->input->post('group');
        $shift = $this->input->post('shift');
        $section = $this->input->post('section');
        $exam = $this->input->post('exam');
        $data['class'] = $class;
        $grades = $this->common_model->get_all_info('9_create_exam_grade');
        $table_name = "26_grade_mark_management";
        $data['sms_sent'] = 1;

        $checking_array = array(
            "26_grade_mark_management.class_name" => $class,
            "26_grade_mark_management.shift_name" => $shift,
            "26_grade_mark_management.group_name" => $group,
            "26_grade_mark_management.section_name" => $section,
            "26_grade_mark_management.exam_type" => $exam,
        );

        $result = $this->common_model->check_value_get_data($table_name, $checking_array);

        $count_mark = 0;
        $student_total = 0;
        $student_gpa = 0.00;
        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
                $checking_array = array(
                    "student_id" => $res->student_id,
                    "exam_type" => $exam,
                );
                $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, $table_name);
                $sub_row = count($data['all_subject']);
                $data["student_id" . $count_mark] = $res->student_id;
                $data["student_name" . $count_mark] = $res->student_name;
                $data["student_roll" . $count_mark] = $res->roll;
                $data["student_class" . $count_mark] = $res->class_name;
                $data["student_group" . $count_mark] = $res->group_name;
                $data["student_section" . $count_mark] = $res->section_name;
                $data["exam_type"] = $res->exam_type;
                $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result3)) {
                    $data['marks' . $count_mark] = array_merge($result2, $result3);
                    $data['t_count'] = 1;
                } else {
                    $data['marks' . $count_mark] = $result2;
                    $data['t_count'] = 0;
                }

                $b = 0;
                $e = 0;
                $d = 0;
                $count_bang = 0;
                $count_eng = 0;
                foreach ($data['marks' . $count_mark] as $mark) {
                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = ($mark->total_mark * 5);
                        } elseif (in_array($mark->subject_name, $subject_50)) {
                            $d = $mark->total_mark * 2;
                        } else {
                            $d = $mark->total_mark;
                        }
                    } else {
                        if (strpos($mark->subject_name, 'Bang') != false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'English ') != false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }
                    }


                    if (0 <= $d && $d < 33) {
                        $gpa = 0.00;
                    } else if (33 <= $d && $d < 40) {
                        $gpa = 1.00;
                    } else if (40 <= $d && $d < 50) {
                        $gpa = 2.00;
                    } else if (50 <= $d && $d < 60) {
                        $gpa = 3.00;
                    } else if (60 <= $d && $d < 70) {
                        $gpa = 3.50;
                    } else if (70 <= $d && $d < 80) {
                        $gpa = 4.00;
                    } else if (80 <= $d && $d <= 100) {
                        $gpa = 5.00;
                    } else {
                        $gpa = 'Invalid';
                    }
                    if ($mark->fourth_subject == '1') {
                        $data['fs' . $count_mark] = 1;
                        if ($gpa <= 2.00) {
                            $gpa = 0.00;
                        } else {
                            $gpa = $gpa - 2.00;
                        }
                    } else {
                        $data['fs' . $count_mark] = 0;
                    }

                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = $mark->total_mark;
                        } elseif (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                            if (in_array($mark->subject_name, $subject_50)) {
                                $d = $mark->total_mark;
                            }
                        }
                    }
                    $student_total += $d;
                    $student_gpa = $student_gpa + $gpa;
                    $data['total' . $count_mark] = $student_total;
                    $data['gpa' . $count_mark] = $student_gpa;
                }
                $student_total = 0;
                $student_gpa = 0;
            }
        }
        $sms_num = $count_mark / $sub_row;
        for ($j = 1; $j <= $sms_num; $j++) {
            $sms_body = "Dear Guardian,\\nYour student get Total Marks: " .
                    $data['total' . $j] . ", GPA: " . $data['gpa' . $j] . "\\nThanks.";
//            $sms_result = $this->send_sms("+88" . $data["guardian_mobile" . $j], $sms_body);
//            if ($sms_result == -1) {
//                $data['sms' . $j] = "Error!";
//            } else if ($sms_result == 0) {
//                $data['sms' . $j] = "Accepted";
//            } else if ($sms_result == 1) {
//                $data['sms' . $j] = "PENDING";
//            } else if ($sms_result == 2) {
//                $data['sms' . $j] = "UNDELIVERABLE";
//            } else if ($sms_result == 3) {
//                $data['sms' . $j] = "DELIVERED";
//            } else if ($sms_result == 4) {
//                $data['sms' . $j] = "EXPIRED";
//            } else if ($sms_result == 5) {
//                $data['sms' . $j] = "REJECTED";
//            } else {
//                $data['sms' . $j] = "ERS";
//            }
        }
        $data['c'] = $count_mark;
        $data['all_value'] = $result;
        $this->load->view('admin/29_student_mark_info_with_guardian', $data);
    }

    public function get_student_marks_with_guardians() {
        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $class = $this->input->post('class');
        $shift = $this->input->post('shift');
        $group = $this->input->post('group');
        $section = $this->input->post('section');
        $data['class'] = $class;
        $exam = $this->input->post('exam');
        $grades = $this->common_model->get_all_info('9_create_exam_grade');
        $table_name = "26_grade_mark_management";

        $checking_array = array(
            "26_grade_mark_management.class_name" => $class,
            "26_grade_mark_management.shift_name" => $shift,
            "26_grade_mark_management.group_name" => $group,
            "26_grade_mark_management.section_name" => $section,
            "26_grade_mark_management.exam_type" => $exam,
        );


        $result = $this->common_model->check_value_get_data_with_parents($checking_array);
//        print_r($result);
        $count_mark = 0;
        $student_total = 0;
        $student_gpa = 0.00;
        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
                $checking_array = array(
                    "student_id" => $res->student_id,
                    "exam_type" => $exam,
                );
                $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, $table_name);
                $data["student_id" . $count_mark] = $res->student_id;
                $data["student_name" . $count_mark] = $res->student_name;
                $data["student_roll" . $count_mark] = $res->roll;
                $data["student_class" . $count_mark] = $res->class_name;
                $data["student_group" . $count_mark] = $res->group_name;
                $data["student_section" . $count_mark] = $res->section_name;
                $data["guardian_name" . $count_mark] = $res->father_name;
                $data["guardian_mobile" . $count_mark] = $res->parents_mobile;
                $data["exam_type"] = $res->exam_type;
                $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result3)) {
                    $data['marks' . $count_mark] = array_merge($result2, $result3);
                    $data['t_count'] = 1;
                } else {
                    $data['marks' . $count_mark] = $result2;
                    $data['t_count'] = 0;
                }

                $b = 0;
                $e = 0;
                $d = 0;
                $count_bang = 0;
                $count_eng = 0;
                foreach ($data['marks' . $count_mark] as $mark) {
                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = ($mark->total_mark * 5);
                        } elseif (in_array($mark->subject_name, $subject_50)) {
                            $d = $mark->total_mark * 2;
                        } else {
                            $d = $mark->total_mark;
                        }
                    } else {
                        if (strpos($mark->subject_name, 'Bang') != false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'English ') != false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }
                    }


                    if (0 <= $d && $d < 33) {
                        $gpa = 0.00;
                    } else if (33 <= $d && $d < 40) {
                        $gpa = 1.00;
                    } else if (40 <= $d && $d < 50) {
                        $gpa = 2.00;
                    } else if (50 <= $d && $d < 60) {
                        $gpa = 3.00;
                    } else if (60 <= $d && $d < 70) {
                        $gpa = 3.50;
                    } else if (70 <= $d && $d < 80) {
                        $gpa = 4.00;
                    } else if (80 <= $d && $d <= 100) {
                        $gpa = 5.00;
                    } else {
                        $gpa = 'Invalid';
                    }
                    if ($mark->fourth_subject == '1') {
                        $data['fs' . $count_mark] = 1;
                        if ($gpa <= 2.00) {
                            $gpa = 0.00;
                        } else {
                            $gpa = $gpa - 2.00;
                        }
                    } else {
                        $data['fs' . $count_mark] = 0;
                    }

                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = $mark->total_mark;
                        } elseif (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                            if (in_array($mark->subject_name, $subject_50)) {
                                $d = $mark->total_mark;
                            }
                        }
                    }
                    $student_total += $d;
                    $student_gpa = $student_gpa + $gpa;
                    $data['total' . $count_mark] = $student_total;
                    $data['gpa' . $count_mark] = $student_gpa;
                }
                $student_total = 0;
                $student_gpa = 0;
            }
        }
        $data['c'] = $count_mark;
        $data['all_value'] = $result;
//        echo "<pre>";
//        print_r($grades);
//        print_r($data['all_value']);
        $this->load->view('admin/29_student_mark_info_with_guardian', $data);
    }

    public function get_student_marks() {
        $class = $this->input->post('class');
        $shift = $this->input->post('shift');
        $group = $this->input->post('group');
        $section = $this->input->post('section');
        $exam = $this->input->post('exam');
        $grades = $this->common_model->get_all_info('9_create_exam_grade');
        $table_name = "26_grade_mark_management";

        $data['class'] = $class;

        $checking_array = array(
            "class_name" => $class,
            "shift_name" => $shift,
            "group_name" => $group,
            "section_name" => $section,
            "exam_type" => $exam,
        );

        $result = $this->common_model->check_value_get_data($table_name, $checking_array);
        $count_mark = 0;
        $student_total = 0;
        $data['t_count'] = 0;
        $result2 = array();
        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
                $checking_array = array(
                    "student_id" => $res->student_id,
                    "exam_type" => $exam,
                );

                $sub1 = $this->common_model->get_all_info_by_array($table_name, $checking_array);
                $sub2 = $this->common_model->get_all_info_by_array('26_grade_mark_tutorial', $checking_array);
                if (!empty($sub2)) {
                    $data['all_subject'] = array_merge($sub1, $sub2);
                } else {
                    $data['all_subject'] = $sub1;
                }

                $data["student_id" . $count_mark] = $res->student_id;
                $data["student_name" . $count_mark] = $res->student_name;
                $data["student_class" . $count_mark] = $res->class_name;
                $data["student_roll" . $count_mark] = $res->roll;
                $data["exam_type"] = $res->exam_type;
                $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result3)) {
                    $data['marks' . $count_mark] = array_merge($result2, $result3);
                    $data['t_count'] = 1;
                } else {
                    $data['marks' . $count_mark] = $result2;
                    $data['t_count'] = 0;
                }
//
                foreach ($data['marks' . $count_mark] as $mark) {
                    $student_total = $student_total + $mark->total_mark;
                    $data['total' . $count_mark] = $student_total;
                    $data['subject_name' . $count_mark] = $mark->subject_name;
                }
                foreach ($grades as $grade) {
                    if ($grade->min_num <= $student_total && $student_total <= $grade->max_num) {
                        $data['grade' . $count_mark] = $grade->grade_point;
                        $data['letter' . $count_mark] = $grade->letter_grade;
                    }
                }
                $student_total = 0;
            }
        }
        $data['c'] = $count_mark + $data['t_count'];
        $data['all_value'] = $result2;
//        print_r($checking_array);
//        print_r($result);
//        print_r($data['all_subject']);
        $this->load->view('admin/29_student_marks_info', $data);
    }

    public function get_result_at_a_glance() {
        $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
        $class_array2 = array('6', '7', '8');
        $class_array3 = array('9', '10');
        $subject_50 = array(
            'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
            'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
            'Physical Education & Health', 'Work & Life Oriented Education'
        );

        $class = $this->input->post('class');
        $shift = $this->input->post('shift');
        $group = $this->input->post('group');
        $section = $this->input->post('section');
        $session_name = $this->input->post('session_name');
        $exam = $this->input->post('exam');

        $table_name = "26_grade_mark_management";
        $checking_array = array(
            "class_name" => $class,
            "session_name" => $session_name,
            "exam_type" => $exam,
        );
        if (!empty($group)) {
            $checking_array['group_name'] = $group;
        }
        if (!empty($section)) {
            $checking_array['section_name'] = $section;
        }
        if (!empty($shift)) {
            $checking_array['shift_name'] = $shift;
        }
        $result = $this->common_model->check_value_get_data($table_name, $checking_array);

        $count_mark = 0;
        $student_total = 0;
        $student_gpa = 0.00;
        if (!empty($result)) {
            foreach ($result as $res) {
                $count_mark++;
                $checking_array = array(
                    "student_id" => $res->student_id,
                    "exam_type" => $exam,
                );
                $data['all_subject'] = $this->common_model->check_value_get_one_column('subject_name', $checking_array, $table_name);
                $data["student_id" . $count_mark] = $res->student_id;
                $data["student_name" . $count_mark] = $res->student_name;
                $data["student_roll" . $count_mark] = $res->roll;
                $data["student_class" . $count_mark] = $res->class_name;
                $data["student_group" . $count_mark] = $res->group_name;
                $data["student_section" . $count_mark] = $res->section_name;
                $data["exam_type"] = $res->exam_type;
                $result2 = $this->common_model->check_value_get_data($table_name, $checking_array);
                $result3 = $this->common_model->check_value_get_data('26_grade_mark_tutorial', $checking_array);

                if (!empty($result3)) {
                    $data['marks' . $count_mark] = array_merge($result2, $result3);
                    $data['t_count'] = 1;
                } else {
                    $data['marks' . $count_mark] = $result2;
                    $data['t_count'] = 0;
                }

                $b = 0;
                $e = 0;
                $d = 0;
                $count_bang = 0;
                $count_eng = 0;
                foreach ($data['marks' . $count_mark] as $mark) {
                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = ($mark->total_mark * 5);
                        } elseif (in_array($mark->subject_name, $subject_50)) {
                            $d = $mark->total_mark * 2;
                        } else {
                            $d = $mark->total_mark;
                        }
                    } else {
                        if (strpos($mark->subject_name, 'Bang') != false) {
                            $count_bang++;
                            $d += $mark->total_mark;
                            $b += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_bang == 1) {
                                    $d = 0;
                                } elseif ($count_bang == 2) {
                                    $d = $b / 2;
                                    $count_bang = 0;
                                }
                            }
                        } elseif (strpos($mark->subject_name, 'English ') != false) {
                            $count_eng++;
                            $d += $mark->total_mark;
                            $e += $mark->total_mark;
                            if ($mark->class_name == 9 || $mark->class_name == 10) {
                                if ($count_eng == 1) {
                                    $d = 0;
                                } elseif ($count_eng == 2) {
                                    $d = $e / 2;
                                    $count_eng = 0;
                                }
                            }
                        } else {
                            $d = $mark->total_mark;
                        }
                    }


                    if (0 <= $d && $d < 33) {
                        $gpa = 0.00;
                    } else if (33 <= $d && $d < 40) {
                        $gpa = 1.00;
                    } else if (40 <= $d && $d < 50) {
                        $gpa = 2.00;
                    } else if (50 <= $d && $d < 60) {
                        $gpa = 3.00;
                    } else if (60 <= $d && $d < 70) {
                        $gpa = 3.50;
                    } else if (70 <= $d && $d < 80) {
                        $gpa = 4.00;
                    } else if (80 <= $d && $d <= 100) {
                        $gpa = 5.00;
                    } else {
                        $gpa = 'Invalid';
                    }
                    if ($mark->fourth_subject == '1') {
                        $data['fs' . $count_mark] = 1;
                        if ($gpa <= 2.00) {
                            $gpa = 0.00;
                        } else {
                            $gpa = $gpa - 2.00;
                        }
                    } else {
                        $data['fs' . $count_mark] = 0;
                    }

                    if (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                        if ($mark->subject_name == 'Drawing') {
                            $d = $mark->total_mark;
                        } elseif (in_array($mark->class_name, $class_array1) || in_array($mark->class_name, $class_array2)) {
                            if (in_array($mark->subject_name, $subject_50)) {
                                $d = $mark->total_mark;
                            }
                        }
                    }
                    $student_total += $d;
                    $student_gpa = $student_gpa + $gpa;
                    $data['total' . $count_mark] = $student_total;
                    $data['gpa' . $count_mark] = $student_gpa;
                }
                $student_total = 0;
                $student_gpa = 0;
            }
        }
        $data['c'] = $count_mark;
        $data['all_value'] = $result;
//        print_r($result);
//        print_r($data['all_subject']);
        $this->load->view('admin/66_result_at_a_glance_info', $data);
    }

    public function get_student_info_3() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $student_id = $this->input->post('student_id');
            $data['all_value'] = $this->common_model->get_allinfo_byid('41_student_dormitory_allocation', 'student_id', $student_id);

            $data['all_fee_head'] = $this->common_model->get_all_info('41_hall_income_head');
            $this->load->view('admin/33_2_show_student_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_hall_collection_report($date, $student_id, $invoice_id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $table_name = "41_dormitory_rent_collection";
            $checking_array = array();
            if (!empty($date)) {
                $checking_array['date'] = $date;
            }
            if (!empty($student_id)) {
                $checking_array['student_id'] = $student_id;
            }
            if (!empty($student_id)) {
                $checking_array['invoice_no'] = $invoice_id;
            }

            $result = $this->common_model->check_value_get_data($table_name, $checking_array);
            $count_mark = 0;
            $total = 0;
            $sl = 1;
            if (!empty($result)) {
                foreach ($result as $res) {
                    $count_mark++;
                    $data["sl" . $count_mark] = $sl++;
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["inserted_by" . $count_mark] = $res->inserted_by;
                    if (stripos(strtolower($res->inserted_by), "A")) {
                        $data["inserted_by_name" . $count_mark] = $this->common_model->one_column_one_info('name', 'admin_unique_id', $res->inserted_by, '0_admin');
                    } else if (stripos(strtolower($res->inserted_by), "D")) {
                        $data["inserted_by_name" . $count_mark] = $this->common_model->one_column_one_info('name', 'staff_unique_id', $res->inserted_by, '14_insert_staff_info');
                    }
                    $student = $this->common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $res->student_id);
                    foreach ($student as $st) {
                        $student_name = $st->name;
                        $class = $st->class_name;
                        $group = $st->group_name;
                        $roll = $st->roll;
                    }
                    $data["student_name" . $count_mark] = $student_name;
                    $data["class" . $count_mark] = $class;
                    $data["group" . $count_mark] = $group;
                    $data["roll" . $count_mark] = $roll;
                    $data["hall" . $count_mark] = $res->dormitory_name;
                    $data["description" . $count_mark] = $res->month;
                    $data["amount" . $count_mark] = $res->amount;
                    $data["quantity" . $count_mark] = $res->quantity;
                    $data["discount" . $count_mark] = $res->discount;
                    $data["invoice" . $count_mark] = $res->invoice_no;
                    $data["date" . $count_mark] = $res->date;
                    $data["total" . $count_mark] = $res->total;
                    $total += $res->total;
                }
            }
            $data["total"] = $total;

            $data['c'] = $count_mark;
            $data['all_value'] = $result;
            $data['date'] = $date;
            $data['student_id'] = $student_id;
//        echo '<pre>';
//        print_r($data['all_value']);
            $this->load->view('admin/header');
            $this->load->view('admin/44_hall_fee_collection_ibnfo', $data);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_hall_ledger_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $date_from = $this->input->post('date_from');
            $date_to = $this->input->post('date_to');
//            $data['all_income'] = $this->common_model->data_date_to_date('30_income', 'date', $date_from, $date_to);
//            $data['all_fee'] = $this->common_model->data_date_to_date('10_3_fee_collection', 'insertion_date', $date_from, $date_to);
            $data['all_rent'] = $this->common_model->data_date_to_date('41_dormitory_rent_collection', 'date', $date_from, $date_to);

            $data['all_expense'] = $this->common_model->data_date_to_date('41_hall_expense', 'date', $date_from, $date_to);

            $count = 0;
//            foreach ($data['all_income'] as $info1) {
//                $count++;
//                $data['date' . $count] = $info1->date;
//                $data['income_head' . $count] = $info1->income_head;
//                $data['voucher_no' . $count] = $info1->voucher_no;
//                $data['quantity' . $count] = $info1->quantity;
//                $data['amount' . $count] = $info1->amount;
//            }
//            foreach ($data['all_fee'] as $info1) {
//                $count++;
//                $data['date' . $count] = $info1->insertion_date;
//                $data['income_head' . $count] = $info1->student_id;
//                $data['voucher_no' . $count] = $info1->invoice_id;
//                $data['quantity' . $count] = $info1->quantity;
//                $data['amount' . $count] = $info1->total;
//            }
            foreach ($data['all_rent'] as $info1) {
                $count++;
                $data['date' . $count] = $info1->date;
                $data['income_head' . $count] = $info1->dormitory_name;
                $data['voucher_no' . $count] = $info1->invoice_no;
                $data['quantity' . $count] = $info1->quantity;
                $data['amount' . $count] = $info1->total;
            }

            $count_ex = 0;
            foreach ($data['all_expense'] as $info1) {
                $count_ex++;
                $data['expense_date' . $count_ex] = $info1->date;
                $data['expense_head' . $count_ex] = $info1->expense_head;
                $data['expense_voucher_no' . $count_ex] = $info1->voucher_no;
                $data['expense_quantity' . $count_ex] = $info1->quantity;
                $data['expense_amount' . $count_ex] = $info1->amount;
            }
            if ($count >= $count_ex) {
                $empty_range = $count - $count_ex;
                $start = $count_ex + 1;
                $finish = $count_ex + $empty_range;
                for ($i = $start; $i <= $finish; $i++) {
                    $data['expense_date' . $i] = "";
                    $data['expense_head' . $i] = "";
                    $data['expense_voucher_no' . $i] = "";
                    $data['expense_quantity' . $i] = "";
                    $data['expense_amount' . $i] = "";
                }
                $data['count_it'] = $count;
            } else {
                $empty_range = $count_ex - $count;
                $start = $count + 1;
                $finish = $count + $empty_range;
                for ($i = $start; $i <= $finish; $i++) {
                    $data['date' . $i] = "";
                    $data['income_head' . $i] = "";
                    $data['voucher_no' . $i] = "";
                    $data['quantity' . $i] = "";
                    $data['amount' . $i] = "";
                }
                $data['count_it'] = $count_ex;
            }

            $this->load->view('admin/39_ledger_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_tort_list() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $class = $this->input->post('class_name');
            $group = $this->input->post('group_name');
            $session = $this->input->post('session_name');
            $checking_array = array();
            if (!empty($class)) {
                $checking_array['class_name'] = $class;
            }
            if (!empty($group)) {
                $checking_array['group_name'] = $group;
            }
            if (!empty($session)) {
                $checking_array['session_name'] = $session;
            }
            if (empty($session)) {
                $session = date('Y');
            }
            $data['all_value'] = $this->common_model->get_all_info_by_array('12_insert_student_info', $checking_array);
            $f_c = 0;
            foreach ($data['all_value'] as $d) {
                $f_c++;
                $sub = explode(' ', $d->subject);
                $f_sub = $d->fourth_subject;
                $fourth = $this->common_model->get_allinfo_byid('7_create_subject', 'subject_name', $f_sub);
                if (!empty($fourth)) {
                    foreach ($fourth as $sub_code_f) {
                        $code_f = $sub_code_f->subject_code;
                    }
                } else {
                    $code_f = '';
                }
                $data['sub_code_f' . $f_c] = $code_f;
                $count = 0;
                foreach ($sub as $s) {
                    $count++;
                    $data['sub' . $f_c . $count] = $s;

                    if (empty($s)) {
                        $sub_code = "";
                        $code_f = '';
                    } else {
                        $code_result = $this->common_model->get_allinfo_byid('7_create_subject', 'subject_name', $s);

                        foreach ($code_result as $sub_code_info) {
                            $sub_code = $sub_code_info->subject_code;
                        }
                    }
                    $data['sub_code' . $f_c . $count] = $sub_code;
                }
            }
            if (empty($count)) {
                $count = 0;
            }
            $data['c'] = $count;
            $data['year_session'] = $session;
            $data['group'] = $group;
            $this->load->view('admin/12_student_tort_list_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function get_seat_plan_tokens() {
        $class_name = $this->input->post('class_name');
        $group_name = $this->input->post('group_name');
        $section_name = $this->input->post('section_name');
        $shift_name = $this->input->post('shift_name');
        $session_name = $this->input->post('session_name');
        $exam_name = $this->input->post('exam_name');

        $data['exam_name'] = $exam_name;

        $checking_array = array();
        if (!empty($class_name)) {
            $checking_array['class_name'] = $class_name;
        }
        if (!empty($group_name)) {
            $checking_array['group_name'] = $group_name;
        }
        if (!empty($section_name)) {
            $checking_array['section_name'] = $section_name;
        }
        if (!empty($shift_name)) {
            $checking_array['shift_name'] = $shift_name;
        }
        if (!empty($session_name)) {
            $checking_array['session_name'] = $session_name;
        }
        $data['all_value'] = $this->common_model->get_all_info_by_array('12_insert_student_info', $checking_array);
        $this->load->view('admin/67_show_seat_plan_token', $data);
    }

    public function get_student_list_category() {
        $website = $this->input->post('website');
        $class_name = $this->input->post('class_name');
        $data['class_name'] = $class_name;
        $group_name = $this->input->post('group_name');
        $data['group_name'] = $group_name;
        $section_name = $this->input->post('section_name');
        $data['section_name'] = $section_name;
        $shift_name = $this->input->post('shift_name');
        $data['shift_name'] = $shift_name;
        $session_name = $this->input->post('session_name');
        $data['session_name'] = $session_name;

        $checking_array = array();
        if (!empty($class_name)) {
            $checking_array['class_name'] = $class_name;
        }
        if (!empty($group_name)) {
            $checking_array['group_name'] = $group_name;
        }
        if (!empty($section_name)) {
            $checking_array['section_name'] = $section_name;
        }
        if (!empty($shift_name)) {
            $checking_array['shift_name'] = $shift_name;
        }
        if (!empty($session_name)) {
            $checking_array['session_name'] = $session_name;
        }
        $checking_array['status'] = 1;

        $data['student_number'] = count($this->common_model->get_student_info_roll_wise('12_insert_student_info', $checking_array));
        $data['all_value'] = $this->common_model->get_student_info_roll_wise('12_insert_student_info', $checking_array);
        if($website!='')
        {
            $this->load->view('website/16_web_student_list', $data);
        }else{
            $this->load->view('admin/16_student_list', $data);
        }
    }

    public function create_class_time() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $all_times = $this->input->post('all_times');
            if (!empty($all_times)) {
                foreach ($all_times as $single_time) {
                    $class_name = $single_time[0];
                    $class_time = $single_time[1];

                    $insert_data = array(
                        'class_name' => $class_name,
                        'class_time' => $class_time,
                    );
                    $this->common_model->insert_data('39_create_time', $insert_data);
                }
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_exam_type() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $all_exams = $this->input->post('all_exams');
            if (!empty($all_exams)) {
                foreach ($all_exams as $single_exam) {
                    $class_name = $single_exam[0];
                    $exam_type = $single_exam[1];

                    $insert_data = array(
                        'class_name' => $class_name,
                        'exam_type' => $exam_type,
                    );
                    $this->common_model->insert_data('8_create_exam_type', $insert_data);
                }
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fee_settings() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {

            $all_fees = $this->input->post('all_fees');
            if (!empty($all_fees)) {
                foreach ($all_fees as $single_sale) {
                    $class_name = $single_sale[0];
                    $fees_head_name = $single_sale[1];
                    $fee_amount = $single_sale[2];

                    $insert_data = array(
                        'fee_head' => $fees_head_name,
                        'class_name' => $class_name,
                        'amount' => $fee_amount,
                    );
                    $this->common_model->insert_data('10_1_class_fee', $insert_data);
                }
            } else {
                echo "<p style='color: red; font-size: 20px; text-align: center;'>Please input Fees details</p>";
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

}

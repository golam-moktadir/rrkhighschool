<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Insert extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
    }
    public function backup_db() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff") {
            $file_name = date("Y-m-d_H_i_s");
            $file_name = "" . $file_name . ".zip";
            $this->load->dbutil();
            $backup = $this->dbutil->backup();
            $this->load->helper('file');
            write_file($file_name, $backup);
            $this->load->helper('download');
            force_download($file_name, $backup);
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'service.greensoftech@gmail.com',
                'smtp_pass' => 'Abc@12345', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $message = "Dear Sir, Please find the attached document";
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('service.greensoftech@gmail.com'); // change it to yours
            $this->email->to('zipssavar90@yahoo.com'); // change it to yours
            $this->email->subject('Database Backup');
            $this->email->message($message);
            $this->email->attach($file_name);
            if ($this->email->send()) {
                unlink($file_name);
                redirect('Show_form/backup/sent', 'refresh');
            } else {
                show_error($this->email->print_debugger());
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            if ($this->input->post('teacher_staff') == '') {
                $teacher_staff[0] = '';
                $teacher_staff[1] = '';
            } else {
                $teacher_staff = explode("#", $this->input->post('teacher_staff'));
            }
            $designation = $this->input->post('designation');
            $bank_name = $this->input->post('bank_name');
            $account_no = $this->input->post('account_no');
            $govt_salary = $this->input->post('govt_salary');
            $nongovt_salary = $this->input->post('nongovt_salary');
            $salary_scale = $this->input->post('salary_scale');
            $insert_data = array(
                'teacher_staff_id' => $teacher_staff[0],
                'teacher_staff_name' => $teacher_staff[1],
                'designation' => $designation,
                'bank_name' => $bank_name,
                'account_no' => $account_no,
                'govt_salary' => $govt_salary,
                'nongovt_salary' => $nongovt_salary,
                'salary_amount' => $salary_scale
            );
            $this->Common_model->insert_data('teacher_staff_salary', $insert_data);
            redirect('Show_form/create_salary_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_withdraw() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $date = date('Y-m-d', strtotime($this->input->post('date')));
            if ($this->input->post('bank') == '') {
                $bank[0] = '';
                $bank[1] = '';
            } else {
                $bank = explode("#", $this->input->post('bank'));
            }
            $amount = $this->input->post('amount');
            $responsible_person = $this->input->post('responsible_person');
            $insert_data = array(
                'date' => $date,
                'bank_name' => $bank[0],
                'account_no' => $bank[1],
                'amount' => $amount,
                'responsible_person' => $responsible_person
            );
            $this->Common_model->insert_data('bank_withdraw', $insert_data);
            redirect('Show_form/bank_withdraw/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function bank_deposit() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $date = date('Y-m-d', strtotime($this->input->post('date')));
            if ($this->input->post('bank') == '') {
                $bank[0] = '';
                $bank[1] = '';
            } else {
                $bank = explode("#", $this->input->post('bank'));
            }
            $amount = $this->input->post('amount');
            $responsible_person = $this->input->post('responsible_person');
            $insert_data = array(
                'date' => $date,
                'bank_name' => $bank[0],
                'account_no' => $bank[1],
                'amount' => $amount,
                'responsible_person' => $responsible_person
            );
            $this->Common_model->insert_data('bank_deposit', $insert_data);
            redirect('Show_form/bank_deposit/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_bank_name() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $bank_name = $this->input->post('bank_name');
            $account_no = $this->input->post('account_no');
            $insert_data = array(
                'bank_name' => $bank_name,
                'account_no' => $account_no
            );
            $this->Common_model->insert_data('create_bank_name', $insert_data);
            redirect('Show_form/create_bank_name/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_salary_sheet() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');

            $teacher_staff = explode("#", $this->input->post('teacher_staff'));
            $month = $this->input->post('month');
            $designation = $this->input->post('designation');
            $account_no = $this->input->post('account_no');
            $salary_scale = $this->input->post('salary_scale');
            $insert_data = array(
                'teacher_staff_id' => $teacher_staff[0],
                'teacher_staff_name' => $teacher_staff[1],
                'month' => $month,
                'designation' => $designation,
                'account_no' => $account_no,
                'salary_scale' => $salary_scale
            );
            $this->Common_model->insert_data('create_salary_sheet', $insert_data);
            redirect('Show_form/create_salary_sheet/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_loan_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');

            $date = $this->input->post('date');
            $teacher_staff = explode("#", $this->input->post('teacher_staff'));
            $des_acc_result = $this->Common_model->get_allinfo_byid('pf_create_info', 'teacher_staff_id', $teacher_staff[0]);
            foreach ($des_acc_result as $des_acc_info) {
                $designation = $des_acc_info->designation;
                $account_no = $des_acc_info->account_no;
            }
            $balance = $this->input->post('balance');
            $loan_amount = $this->input->post('loan_amount');
            $loan_payable = $this->input->post('loan_payable');
            $due_amount = $this->input->post('due_amount');
            $insert_data = array(
                'date' => $date,
                'teacher_staff_id' => $teacher_staff[0],
                'teacher_staff_name' => $teacher_staff[1],
                'designation' => $designation,
                'account_no' => $account_no,
                'balance_up_to_date' => $balance,
                'loan_amount' => $loan_amount,
                'loan_payable' => $loan_payable,
                'due_amount' => $due_amount
            );
            $this->Common_model->insert_data('pf_loan_info', $insert_data);
            redirect('Show_form/pf_loan_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_deposit_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');

            $date = $this->input->post('date');
            $teacher_staff = explode("#", $this->input->post('teacher_staff'));
            $des_acc_result = $this->Common_model->get_allinfo_byid('pf_create_info', 'teacher_staff_id', $teacher_staff[0]);
            foreach ($des_acc_result as $des_acc_info) {
                $designation = $des_acc_info->designation;
                $account_no = $des_acc_info->account_no;
            }
            $salary_scale = $this->input->post('salary_scale');
            $college_payment = $this->input->post('college_payment');
            $total_deposit = $this->input->post('total_deposit');
            $bank_profit = $this->input->post('bank_profit');
            $sub_total = $this->input->post('sub_total');
            $insert_data = array(
                'date' => $date,
                'teacher_staff_id' => $teacher_staff[0],
                'teacher_staff_name' => $teacher_staff[1],
                'designation' => $designation,
                'account_no' => $account_no,
                'salary_scale' => $salary_scale,
                'college_payment' => $college_payment,
                'total_deposit' => $total_deposit,
                'bank_profit' => $bank_profit,
                'sub_total' => $sub_total
            );
            $this->Common_model->insert_data('pf_deposit_info', $insert_data);
            redirect('Show_form/pf_deposit_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function pf_create_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');

            $teacher_staff = explode("#", $this->input->post('teacher_staff'));
            $job_start_date = $this->input->post('job_start_date');
            $designation = $this->input->post('designation');
            $job_retire_date = $this->input->post('job_retire_date');
            $bank_name = $this->input->post('bank_name');
            $account_no = $this->input->post('account_no');
            $salary_scale = $this->input->post('salary_scale');
            $insert_data = array(
                'teacher_staff_id' => $teacher_staff[0],
                'teacher_staff_name' => $teacher_staff[1],
                'job_starting_date' => $job_start_date,
                'designation' => $designation,
                'job_retirement_date' => $job_retire_date,
                'bank_name' => $bank_name,
                'account_no' => $account_no,
                'salary_scale' => $salary_scale
            );
            $this->Common_model->insert_data('pf_create_info', $insert_data);
            redirect('Show_form/pf_create_info/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_news() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('news', 'News', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_form/insert_news');
            } else {
                $news = $this->input->post('news');
                $insert_data = array(
                    'news' => $news
                );
                $this->Common_model->insert_data('47_new_msg', $insert_data);
                setMessage("msg","success","Sucessfully.");
                redirect('Show_form/insert_news');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    //26-06-19
    public function insert_grade() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $this->load->model('Common_model');
            $mark_id=$this->input->post("mark_id");
            $status=$this->input->post("status");
            $data=array();
            if (in_array("0", $status)) {
                $data['date']=date("Y-m-d");
            }
            foreach($mark_id as $key=>$value)
            {
                $written_mark=$this->input->post("written_mark_".$value);
                $mcq_mark=$this->input->post("mcq_mark_".$value);
                $practical_mark=$this->input->post("practical_mark_".$value);
                $total_mark=$this->input->post("total_mark_".$value);
                $available=$this->input->post("not_available_".$value);
                if($available!='') //checkbox checked
                {
                    $data['subject_available']=1;
                    $data['total_mark']=$total_mark;
                    $data['written_mark']=$written_mark;
                    $data['mcq_mark']=$mcq_mark;
                    $data['practical_mark']=$practical_mark;
                    $grade=$this->input->post("grade_".$value);
                    $grade_point=$this->input->post("grade_point_".$value);
                }else{
                    $data['total_mark']=0;
                    $data['written_mark']=0;
                    $data['mcq_mark']=0;
                    $data['practical_mark']=0;
                    $data['subject_available']=0;
                    $grade="N/A";
                    $grade_point=0.00;
                }
                if($total_mark=="")
                {
                    $total_mark=0;
                }
                if($grade=="")
                {
                    $grade="F";
                    $grade_point=0.0;
                }
                $data['grade']=$grade;
                $data['grade_point']=$grade_point;
                $data['status']=1;
               $this->Common_model->update_data_onerow("26_grade_mark_management",$data,"record_id",$value);
            }
            echo "success";
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_grade_tutorial() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $this->load->model('Common_model');
            $practical_array = array();
            $result = $this->Common_model->get_allinfo_byid('7_create_subject', 'practical_applicable', 1);
            foreach ($result as $info) {
                $practical_subject = $info->subject_name;
                array_push($practical_array, $practical_subject);
            }

            $date = date('Y-m-d', strtotime($this->input->post('date')));
            $teacher = $this->input->post('teacher');

            $subject = $this->input->post('subject');
            $class = $this->input->post('class');
            $shift = $this->input->post('shift');
            $group = $this->input->post('group');
            $section = $this->input->post('section');
            $session_name = $this->input->post('session_name');
            $data['exam'] = $this->input->post('exam');
            $data['subject'] = $this->input->post('subject');
            $checking_array = array(
                'subject_name' => $subject
            );
            $subject_result = $this->Common_model->group_by_one_column_where('subject_name', $checking_array, '7_create_subject');
            foreach ($subject_result as $one_result) {
                $practical_applicable = $one_result->practical_applicable;
                $subject_serial = $one_result->record_id;
            }
            $exam = $this->input->post('exam');
//            $count = $this->input->post('count');

            $marks = $this->input->post('marks');
//            print_r($marks);

            if (!empty($marks)) {
                foreach ($marks as $single_mark) {
                    $student = $single_mark[0];
                    $name = $single_mark[1];
                    $roll = $single_mark[2];
                    $bang = $single_mark[3];
                    $eng = $single_mark[4];
                    $math = $single_mark[5];
                    $gk_arabic = $single_mark[6];
                    $gs = $single_mark[7];
                    $ss = $single_mark[8];
                    $rel = $single_mark[9];
                    $total_mark = $single_mark[10];

                    $insert_data = array(
                        'date' => $date,
                        'session_name' => $session_name,
                        'teacher_id' => $teacher,
                        'class_name' => $class,
                        'group_name' => $group,
                        'section_name' => $section,
                        'shift_name' => $shift,
                        'subject_name' => $subject,
                        'subject_serial' => $subject_serial,
                        'exam_type' => $exam,
                        'student_id' => $student,
                        'student_name' => $name,
                        'roll' => $roll,
                        'bangla' => $bang,
                        'english' => $eng,
                        'mathematics' => $math,
                        'gk_arabic' => $gk_arabic,
                        'general_science' => $gs,
                        'social_science' => $ss,
                        'religion' => $rel,
                        'total_mark' => $total_mark,
                    );
                    $this->Common_model->insert_data('26_grade_mark_tutorial', $insert_data);
                }
            }

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

            $data['all_value'] = $this->Common_model->check_value_get_data($table_name, $checking_array);
            $data['subject'] = $subject;
//            print_r($checking_array);
//            print_r($data['all_value']);

            $data['subject_practical_array'] = $practical_array;
            $this->load->view('admin/28_student_info_for_marks_tutorial', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function publish_result_status() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_id', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('session_id', 'Session Name', 'trim|required');
            $this->form_validation->set_rules('exam_id', 'Exam Type', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/publish_result_status/empty', 'refresh');
            } else {
                $session_id=explode("#",$this->input->post("session_id"))[0];
                $class_id=explode("#",$this->input->post("class_id"))[0];
                $shift_id=explode("#",$this->input->post("shift_id"))[0];
                $section_id=explode("#",$this->input->post("section_id"))[0];
                $group_id=explode("#",$this->input->post("group_id"))[0];
                $exam_id=$this->input->post("exam_id");
                $insert_data = array(
                    'date' => date('Y-m-d'),
                    'class_id' => $class_id,
                    'shift_id' => $shift_id,
                    'group_id' => $group_id,
                    'section_id' => $section_id,
                    'session_id' => $session_id,
                    'exam_id' => $exam_id,
                    'status' => 1
                );
                $check_array = array(
                    'class_id' => $class_id,
                    'shift_id' => $shift_id,
                    'group_id' => $group_id,
                    'section_id' => $section_id,
                    'session_id' => $session_id,
                    'exam_id' => $exam_id,
                );
                $exits=$this->Common_model->exits_check("45_publish_result",$check_array);
                if(!$exits)
                {
                    $this->Common_model->insert_data('45_publish_result', $insert_data);
                    redirect('Show_form/publish_result_status/publish', 'refresh');
                }else{
                    redirect('Show_form/publish_result_status/already', 'refresh');
                }
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function transport() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('transport_name', 'Transport Name', 'trim|required');
            $this->form_validation->set_rules('model', 'Model', 'trim|required');
            $this->form_validation->set_rules('route', 'Route', 'trim|required');
            $this->form_validation->set_rules('driver_name', 'Driver Name', 'trim|required');
            $this->form_validation->set_rules('driver_mobile', 'Driver Mobile', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/transport/empty', 'refresh');
            } else {
                $transport_name = $this->input->post('transport_name');
                $model = $this->input->post('model');
                $route = $this->input->post('route');
                $driver_name = $this->input->post('driver_name');
                $driver_mobile = $this->input->post('driver_mobile');

                $insert_data = array(
                    'transport_name' => $transport_name,
                    'model' => $model,
                    'route' => $route,
                    'driver_name' => $driver_name,
                    'driver_mobile' => $driver_mobile
                );
                $this->Common_model->insert_data('44_transport', $insert_data);
                redirect('Show_form/transport/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function issue_book() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('issue_date', 'Issue Date', 'trim|required');
            $this->form_validation->set_rules('due_date', 'Due Date', 'trim|required');
            $this->form_validation->set_rules('book_id', 'Book Name', 'trim|required');
            $this->form_validation->set_rules('student_id', 'Student ID', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/issue_book/empty', 'refresh');
            } else {

                $issue_date = date('Y-m-d', strtotime($this->input->post('issue_date')));
                $due_date = date('Y-m-d', strtotime($this->input->post('due_date')));
                $book_id = $this->input->post('book_id');
                $student_id = $this->input->post('student_id');

                $result = $this->Common_model->one_column_one_info('book_name', 'record_id', $book_id, '42_library');
                foreach ($result as $info) {
                    $book_name = $info->book_name;
                }
                $result = $this->Common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $student_id);
                foreach ($result as $info) {
                    $student_name = $info->name;
                    $class = $info->class_name;
                }
                $insert_data = array(
                    'issue_date' => $issue_date,
                    'due_date' => $due_date,
                    'book_name' => $book_name,
                    'book_id' => $book_id,
                    'student_id' => $student_id,
                    'student_name' => $student_name,
                    'class' => $class,
                    'return_status' => 0,
                );
                $this->Common_model->insert_data('43_issue_book', $insert_data);
                redirect('Show_form/issue_book/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_book() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('book_name', 'Book Name', 'trim|required');
            $this->form_validation->set_rules('author_name', 'Author Name', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/insert_book/empty', 'refresh');
            } else {
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $book_name = $this->input->post('book_name');
                $author_name = $this->input->post('author_name');
                $quantity = $this->input->post('quantity');

                $insert_data = array(
                    'date' => $date,
                    'book_name' => $book_name,
                    'author_name' => $author_name,
                    'quantity' => $quantity
                );
                $this->Common_model->insert_data('42_library', $insert_data);
                redirect('Show_form/insert_book/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function exam_routine() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('published_date', 'Published Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/exam_routine/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '41_exam_routine');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }
                $file_name = $max_id . ".pdf";

                $config['file_name'] = $file_name;
                $config['upload_path'] = './assets/pdf/exam_routine/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('file');

                $class_name = $this->input->post('class_name');
                $published_date = date('Y-m-d', strtotime($this->input->post('published_date')));
                $insert_data = array(
                    'record_id' => $max_id,
                    'class_name' => $class_name,
                    'published_date' => $published_date,
                    'pdf' => $file_name,
                );
                $this->Common_model->insert_data('41_exam_routine', $insert_data);
                redirect('Show_form/exam_routine/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function class_routine() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('published_date', 'Published Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/class_routine/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', 'class_routine');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }
                $file_name = $max_id . ".pdf";

                $config['file_name'] = $file_name;
                $config['upload_path'] = './assets/pdf/class_routine/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('file');

                $class_name = $this->input->post('class_name');
                $published_date = date('Y-m-d', strtotime($this->input->post('published_date')));
                $insert_data = array(
                    'record_id' => $max_id,
                    'class_name' => $class_name,
                    'published_date' => $published_date,
                    'pdf' => $file_name,
                );
                $this->Common_model->insert_data('class_routine', $insert_data);
                redirect('Show_form/class_routine/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class_routine() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
//            $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
//            $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required');
//            $this->form_validation->set_rules('session_name', 'Session Name', 'trim|required');
            $this->form_validation->set_rules('class_day', 'Class Day', 'trim|required');
            $this->form_validation->set_rules('class_time', 'Class Time', 'trim|required');
            $this->form_validation->set_rules('subject_name', 'Subject Name', 'trim|required');
            $this->form_validation->set_rules('teacher_id', 'Teacher', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_class_routine/empty', 'refresh');
            } else {
                $class_name = $this->input->post('class_name');
                $shift_name = $this->input->post('shift_name');
                $group_name = $this->input->post('group_name');
                $section_name = $this->input->post('section_name');
//                $session_name = $this->input->post('session_name');
                $session_name = date('Y');
                $class_day = $this->input->post('class_day');
                $class_time = $this->input->post('class_time');
                $subject_name = $this->input->post('subject_name');
                $teacher_id = $this->input->post('teacher_id');
                $result = $this->Common_model->one_column_one_info('name', 'teacher_unique_id', $teacher_id, '13_insert_teacher_info');
                foreach ($result as $info) {
                    $teacher_name = $info->name;
                }
                $insert_data = array(
                    'class_name' => $class_name,
                    'shift_name' => $shift_name,
                    'group_name' => $group_name,
                    'section_name' => $section_name,
                    'session_name' => $session_name,
                    'class_day' => $class_day,
                    'class_time' => $class_time,
                    'subject_name' => $subject_name,
                    'teacher_id' => $teacher_id,
                    'teacher_name' => $teacher_name
                );
                $this->Common_model->insert_data('40_create_class_routine', $insert_data);
                redirect('Show_form/create_class_routine/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class_time() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('class_time', 'Class Time', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_class_time/empty', 'refresh');
            } else {
                $class_name = $this->input->post('class_name');
                $class_time = $this->input->post('class_time');
                $insert_data = array(
                    'class_name' => $class_name,
                    'class_time' => $class_time,
                );
                $this->Common_model->insert_data('39_create_time', $insert_data);
                redirect('Show_form/create_class_time/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function board_of_directors() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('duration', 'Duration', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/board_of_directors/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '38_board_of_directors');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }

                $img_name = $max_id . ".jpg";

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/board_of_directors/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
                
                 $zdata = array('upload_data' => $this->upload->data()); // get data
                $zfile = $zdata['upload_data']['full_path']; // get file path
                chmod($zfile, 0777); // CHMOD file
                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $duration = $this->input->post('duration');

                $insert_data = array(
                    'record_id' => $max_id,
                    'name' => $name,
                    'designation' => $designation,
                    'duration' => $duration,
                    'image' => $img_name);
                $this->Common_model->insert_data('38_board_of_directors', $insert_data);
                redirect('Show_form/board_of_directors/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function notice() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('user_title', 'User', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('particular', 'Particular', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            
                $user_title = $this->input->post('user_title');
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $particular = $this->input->post('particular');

                $file_name = $date . ".pdf";

                $config['file_name'] = $file_name;
                $config['upload_path'] = './assets/pdf/notice/';
                $config['allowed_types'] = 'pdf';

                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if( $this->upload->do_upload('details')==TRUE){
                    $details = $file_name;
                    
                    ///copy this for paste another
                    $zdata = array('upload_data' => $this->upload->data()); // get data
                    $zfile = $zdata['upload_data']['full_path']; // get file path
                    chmod($zfile, 0777); // CHMOD file
                    
                    ////end area
                }
                else{

                $details = "No file";
                }
                $insert_data = array(
                    'user_title' => $user_title,
                    'date' => $date,
                    'particular' => $particular,
                    'details' => $details
                );
                $this->Common_model->insert_data('37_notice', $insert_data);
                setMessage("msg","success","Successfully");
                redirect('Show_form/notice');
            
     } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function syllabus() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('published_date', 'Published Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/syllabus/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '36_syllabus');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }
                $file_name = $max_id . ".pdf";

                $config['file_name'] = $file_name;
                $config['upload_path'] = './assets/pdf/syllabus/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('file');

                $class_name = $this->input->post('class_name');
                $published_date = date('Y-m-d', strtotime($this->input->post('published_date')));

                $insert_data = array(
                    'record_id' => $max_id,
                    'class_name' => $class_name,
                    'published_date' => $published_date,
                    'pdf' => $file_name,
                );
                $this->Common_model->insert_data('36_syllabus', $insert_data);
                redirect('Show_form/syllabus/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function booklist() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
            $this->form_validation->set_rules('book_name', 'Book Name', 'trim|required');
            $this->form_validation->set_rules('author_name', 'Author Name', 'trim|required');
            $this->form_validation->set_rules('edition', 'Edition', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/booklist/empty', 'refresh');
            } else {
                $group_name = $this->input->post('group_name');
                $book_name = $this->input->post('book_name');
                $author_name = $this->input->post('author_name');
                $edition = $this->input->post('edition');

                $insert_data = array('group_name' => $group_name, 'book_name' => $book_name,
                    'author_name' => $author_name, 'edition' => $edition);
                $this->Common_model->insert_data('35_booklist', $insert_data);
                redirect('Show_form/booklist/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function governing_body_profile() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            $this->form_validation->set_rules('position', 'Position', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_form/governing_body_profile');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '34_governing_body_profile');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }
    
                $img_name = $max_id . ".jpg";
    
                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/governing_body_profile/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;
    
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
    
                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $details = $this->input->post('details');
                $position = $this->input->post('position');
    
                $insert_data = array(
                    'name' => $name,
                    'designation' => $designation,
                    'details' => $details,
                    'position' => $position,
                    'image' => $img_name);
                $this->Common_model->insert_data('34_governing_body_profile', $insert_data);
                setMessage("msg","success","Successfully");
                redirect('Show_form/governing_body_profile');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function photo_gallery() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('image_name', 'Image Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_form/photo_gallery');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '33_photo_gallery');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }

                $img_name = $max_id . ".jpg";

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/photo_gallery/';
                $config['allowed_types'] = '*';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
                $zdata = array('upload_data' => $this->upload->data()); // get data
                $zfile = $zdata['upload_data']['full_path']; // get file path
                chmod($zfile, 0777); // CHMOD file
                $image_name = $this->input->post('image_name');
                $insert_data = array(
                    'record_id' => $max_id,
                    'image_name' => $image_name,
                    'image_id' => $img_name
                );
                $this->Common_model->insert_data('33_photo_gallery', $insert_data);
                setMessage("msg","success","Successfully");
                redirect('Show_form/photo_gallery');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function single_page_content() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_form/single_page_content');
            } else {
                $exits=$this->Common_model->exits_check("32_single_page_content",array("title"=>$this->input->post('title')));
                if(!$exits)
                {
    
                    $result = $this->Common_model->find_last_id('record_id', '32_single_page_content');
                    if (!$result) {
                        $max_id = 1;
                    } else {
                        foreach ($result as $row) {
                            $max_id = ($row->record_id) + 1;
                        }
                    }
        
                    $img_name = $max_id . ".jpg";
        
                    $config['file_name'] = $img_name;
                    $config['upload_path'] = './assets/img/single_page_content/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;
                    $config['overwrite'] = TRUE;
        
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('image');
        
                    $title = $this->input->post('title');
                    $details = $this->input->post('details');
                    $insert_data = array(
                        'record_id' => $max_id,
                        'title' => $title,
                        'details' => $details,
                        'image' => $img_name
                    );
                    $this->Common_model->insert_data('32_single_page_content', $insert_data);
                    setMessage("msg","success","Successfully");
                }else{
                    setMessage("msg","danger","Title Already Exits");
                }
                redirect('Show_form/single_page_content');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_class/empty', 'refresh');
            } else {
                $class_name = $this->input->post('class_name');
                $insert_data = array('class_name' => $class_name);
                $this->Common_model->insert_data('1_create_class', $insert_data);
                redirect('Show_form/create_class/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_group() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_group/empty', 'refresh');
            } else {
                $group_name = $this->input->post('group_name');
                $insert_data = array('group_name' => $group_name);
                $this->Common_model->insert_data('2_create_group', $insert_data);
                redirect('Show_form/create_group/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_section() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_section/empty', 'refresh');
            } else {
                $section_name = $this->input->post('section_name');
                $insert_data = array('section_name' => $section_name);
                $this->Common_model->insert_data('3_create_section', $insert_data);
                redirect('Show_form/create_section/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_shift() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('shift_name', 'Shift Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_shift/empty', 'refresh');
            } else {
                $shift_name = $this->input->post('shift_name');
                $insert_data = array('shift_name' => $shift_name);
                $this->Common_model->insert_data('4_create_shift', $insert_data);
                redirect('Show_form/create_shift/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_session() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('session_name', 'Session Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_session/empty', 'refresh');
            } else {
                $session_name = $this->input->post('session_name');
                $insert_data = array('session_name' => $session_name);
                $this->Common_model->insert_data('5_create_session', $insert_data);
                redirect('Show_form/create_session/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_version() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('version_name', 'Version Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_version/empty', 'refresh');
            } else {
                $version_name = $this->input->post('version_name');
                $insert_data = array('version_name' => $version_name);
                $this->Common_model->insert_data('6_create_version', $insert_data);
                redirect('Show_form/create_version/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_subject_old() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('subject_name', 'Subject Name', 'trim|required');
//            $this->form_validation->set_rules('subject_code', 'Subject Name', 'trim|required');
            $this->form_validation->set_rules('practical', 'Practical Applicable', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_subject/empty', 'refresh');
            } else {
                $subject_name = $this->input->post('subject_name');
                $subject_code = $this->input->post('subject_code');
                $practical = $this->input->post('practical');
                $subject_total_mark = $this->input->post('subject_total_mark');
                $insert_data = array(
                    'subject_name' => $subject_name,
                    'subject_code' => $subject_code,
                    'subject_total_mark' => $subject_total_mark,
                    'practical_applicable' => $practical
                );
                $this->Common_model->insert_data('7_create_subject', $insert_data);
                redirect('Show_form/create_subject/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function create_subject() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('subject_name', 'Subject Name', 'trim|required|callback_subject_name');
            $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim');
            $this->form_validation->set_rules('class_id', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('subject_total_mark', 'Subject Total Mark', 'trim|required');
            $this->form_validation->set_rules('written_mark', 'Written Mark', 'trim');
            $this->form_validation->set_rules('mcq', 'MCQ Applicable', 'trim|required');
            $this->form_validation->set_rules('mcq_mark', 'MCQ Mark', 'trim');
            $this->form_validation->set_rules('practical', 'Practical Applicable', 'trim|required');
            $this->form_validation->set_rules('practical_mark', 'Objective Mark', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
                redirect('Show_form/create_subject/empty');
            } else {
                $subject_name = $this->input->post('subject_name');
                $subject_code = $this->input->post('subject_code');
                $subject_total_mark = $this->input->post('subject_total_mark');
                $written_mark = $this->input->post('written_mark');
                $mcq = $this->input->post('mcq');
                $mcq_mark = $this->input->post('mcq_mark');
                $practical = $this->input->post('practical');
                $practical_mark = $this->input->post('practical_mark');
                $class_id = $this->input->post('class_id');
                $insert_data = array(
                    'subject_name' => $subject_name,
                    'subject_code' => $subject_code,
                    'subject_total_mark' => $subject_total_mark,
                    'written_mark' => $written_mark,
                    'mcq' => $mcq,
                    'mcq_mark' => $mcq_mark,
                    'practical' => $practical,
                    'practical_mark' => $practical_mark,
                    'class_id' => $class_id,
                );
                $this->Common_model->insert_data('7_create_subject', $insert_data);
                $this->session->set_flashdata('msg','<div class="alert alert-success">Subject Created Successfully</div>');
                redirect('Show_form/create_subject/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    //26-06-19
    public function subject_name()
    {
        $exits_check = $this->Common_model->exits_check("7_create_subject",array("subject_name"=>$this->input->post('subject_name'),"class_id"=>$this->input->post('class_id')));
        if ($exits_check) {
            $this->form_validation->set_message('subject_name', "Subject Name Already Exits");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    //26-06-19
    public function create_exam_type() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_id', 'Class Name', 'trim');
            $this->form_validation->set_rules('session_id', 'Session', 'trim');
            $this->form_validation->set_rules('exam_type', 'Exam Type', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');

                redirect('Show_form/create_exam_type/empty', 'refresh');
            } else {
                $data=array();
                $class_id = $this->input->post('class_id');
                for($i=0;$i<count($class_id);$i++)
                {
                    $checking_array=array(
                        "class_id"=>$this->input->post('class_id')[$i],
                        "exam_type"=>$this->input->post('exam_type')[$i],
                        "session_id"=>$this->input->post('session_id')[$i],
                    );
                    $exits_check=$this->Common_model->exits_check("8_create_exam_type",$checking_array);
                    if(!$exits_check)
                    {
                        $data[$i]['class_id']=$this->input->post('class_id')[$i];
                        $data[$i]['exam_type']=$this->input->post('exam_type')[$i];
                        $data[$i]['session_id']=$this->input->post('session_id')[$i];
                    }
                }
                if(!empty($data))
                {
                    $this->Common_model->insert_batch("8_create_exam_type",$data);
                }
                $this->session->set_flashdata('msg','<div class="alert alert-success">Exam type Created Successfully</div>');
                echo json_encode(array("msg"=>"success"));
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_exam_grade() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('min_num', 'Minimum Number', 'trim|required');
            $this->form_validation->set_rules('max_num', 'Maximum Number', 'trim|required');
            $this->form_validation->set_rules('letter_grade', 'Letter Grade', 'trim|required');
            $this->form_validation->set_rules('grade_point', 'Grade Point', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_exam_grade/empty', 'refresh');
            } else {
                $min_num = $this->input->post('min_num');
                $max_num = $this->input->post('max_num');
                $letter_grade = $this->input->post('letter_grade');
                $grade_point = $this->input->post('grade_point');

                $insert_data = array('min_num' => $min_num, 'max_num' => $max_num,
                    'letter_grade' => $letter_grade, 'grade_point' => $grade_point);
                $this->Common_model->insert_data('9_create_exam_grade', $insert_data);
                redirect('Show_form/create_exam_grade/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_designation() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_designation/empty', 'refresh');
            } else {
                $designation = $this->input->post('designation');
                $insert_data = array('designation' => $designation);
                $this->Common_model->insert_data('11_create_designation', $insert_data);
                redirect('Show_form/create_designation/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function insert_student_info() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('session_name', 'Session Name', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('roll', 'Roll', 'trim|required|callback_roll');
            $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim');
            $this->form_validation->set_rules('parents_mobile', 'Parents Mobile', 'trim');
            $this->form_validation->set_rules('admission_date', '', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_form/insert_student_info/empty/1', 'refresh');
            } else {
                
                $result = $this->Common_model->find_last_id('record_id', '12_insert_student_info');
                if (!$result) {
                    $max_id = 1;
                    $img_name = "1.jpg";
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                        $img_name = $max_id . ".jpg";
                    }
                }

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/student/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $class_name = explode("#",$this->input->post('class_name'))[0];
                $group_name = $this->input->post('group_name');
                $section_name = $this->input->post('section_name');
                $shift_name = $this->input->post('shift_name');
                $session_name = $this->input->post('session_name');
                $name = $this->input->post('name');
                $roll = $this->input->post('roll');
                $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
                $gender = $this->input->post('gender');
                $blood_group = $this->input->post('blood_group');
                $nationality = $this->input->post('nationality');
                $religion = $this->input->post('religion');
                $address = $this->input->post('address');
                $subject =$this->input->post('subject');
                $fourth_subject = '';
                $fourth_subject_id = '';
                $sub = '';
                if ($class_name == '9' || $class_name == '10') {
                    $fourth_subject = explode("#",$this->input->post('fourth_subject'))[1];
                    $fourth_subject_id = explode("#",$this->input->post('fourth_subject'))[0];
                    if(!empty($subject))
                    {
                        foreach ($subject as $s) {
                            $sub = $sub . ' ' . $s;
                        }
                    }
                }

                $total_student_result = $this->Common_model->one_column_one_info('total_student', 'session_name', $session_name, '5_create_session');
                foreach ($total_student_result as $total_student_info) {
                    $student_number = $total_student_info->total_student;
                }
                $final_student_number = $student_number + 1;
                $unique_id = $session_name . str_pad($final_student_number, 4, "0", STR_PAD_LEFT) . "S";
                $update_data = array('total_student' => $final_student_number);
                $this->Common_model->update_data_onerow('5_create_session', $update_data, 'session_name', $session_name);

                $father_name = $this->input->post('father_name');
                $mother_name = $this->input->post('mother_name');
                $parents_mobile = $this->input->post('parents_mobile');
                $father_occupation = $this->input->post('father_occupation');
                $mother_occupation = $this->input->post('mother_occupation');
                $guardian_name = $this->input->post('guardian_name');
                $guardian_mobile = $this->input->post('guardian_mobile');
                $guardian_realtion = $this->input->post('guardian_realtion');
                $admission_date = date('Y-m-d', strtotime($this->input->post('admission_date')));
                $image = $img_name;
                $this->session->set_userdata("stInfo",$_POST);
                
                $insert_data = array(
                    'record_id' => $max_id,
                    'class_name' => $class_name,
                    'group_name' => $group_name,
                    'section_name' => $section_name,
                    'shift_name' => $shift_name,
                    'session_name' => $session_name,
                    'name' => $name,
                    'roll' => $roll,
                    'date_of_birth' => $date_of_birth,
                    'gender' => $gender,
                    'blood_group' => $blood_group,
                    'nationality' => $nationality,
                    'religion' => $religion,
                    'address' => $address,
                    'student_unique_id' => $unique_id,
                    'password' => '',
                    'fourth_subject' => $fourth_subject,
                    'fourth_subject_id' => $fourth_subject_id,
                    'father_name' => $father_name,
                    'mother_name' => $mother_name,
                    'parents_mobile' => $parents_mobile,
                    'guardian_name' => $guardian_name,
                    'guardian_mobile' => $guardian_mobile,
                    'guardian_realtion' => $guardian_realtion,
                    'father_occupation' => $father_occupation,
                    'mother_occupation' => $mother_occupation,
                    'parents_email' => '',
                    'subject' => $sub,
                    'admission_date' => $admission_date,
                    'image' => $image,
                    'status' => 1
                );
                $this->Common_model->insert_data('12_insert_student_info', $insert_data);
                setMessage("msg","success","Successfully");
                redirect('Show_form/insert_student_info/created/1', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function roll() {
        if ($this->input->post('id') == '') {
            $class_name = explode("#",$this->input->post('class_name'))[0];
            $group_name = $this->input->post('group_name');
            $section_name = $this->input->post('section_name');
            $session_name = $this->input->post('session_name');
            $roll = $this->input->post('roll');
            $check_array['class_name']=$class_name;
            $check_array['roll']=$roll;
            if($group_name!='')
            {
                $check_array['group_name']=$group_name;
            }
            if($section_name!="")
            {
                $check_array['section_name']=$section_name;
            }
            $check_array['session_name']=$session_name;
            $exits=$this->Common_model->exits_check("12_insert_student_info",$check_array);
            if ($exits) {
                $this->form_validation->set_message('roll', "Rolle Already Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        }else {
            return TRUE;
        }
    }
    public function insert_teacher_info() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/insert_teacher_info/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '13_insert_teacher_info');
                if (!$result) {
                    $max_id = 1;
                    $img_name = "1.jpg";
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                        $img_name = $max_id . ".jpg";
                    }
                }

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/teacher/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $education = $this->input->post('education');
                $date_of_joining = date('Y-m-d', strtotime($this->input->post('date_of_joining')));
                $mobile = $this->input->post('mobile');
                $email = $this->input->post('email');
                $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
                $gender = $this->input->post('gender');
                $blood_group = $this->input->post('blood_group');
                $nationality = $this->input->post('nationality');
                $religion = $this->input->post('religion');
                $session_name = date("Y",strtotime($this->input->post('date_of_joining')));
                $address = $this->input->post('address');

                $total_teacher_result = $this->Common_model->one_column_one_info('total_teacher', 'session_name', $session_name, '5_create_session');
                $teacher_number=0;
                if(isset($total_teacher_result))
                {
                    foreach ($total_teacher_result as $total_teacher_info) {
                        $teacher_number = $total_teacher_info->total_teacher;
                    }

                }
                $final_teacher_number = $teacher_number + 1;
                $unique_id = $session_name . str_pad($final_teacher_number, 3, "0", STR_PAD_LEFT) . "T";
                $update_data = array('total_teacher' => $final_teacher_number);
                $this->Common_model->update_data_onerow('5_create_session', $update_data, 'session_name', $session_name);

                $password = $this->input->post('password');
                $image = $img_name;

                $insert_data = array(
                    'record_id' => $max_id,
                    'name' => $name,
                    'designation' => $designation,
                    'mobile' => $mobile,
                    'email' => $email,
                    'date_of_birth' => $date_of_birth,
                    'gender' => $gender,
                    'blood_group' => $blood_group,
                    'nationality' => $nationality,
                    'religion' => $religion,
                    'address' => $address,
                    'session_name' => $session_name,
                    'date_of_joining' => $date_of_joining,
                    'education' => $education,
                    'teacher_unique_id' => $unique_id,
                    'password' => $password,
                    'image' => $image,
                    'status' => 1
                );
                $this->Common_model->insert_data('13_insert_teacher_info', $insert_data);
                redirect('Show_form/insert_teacher_info/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_staff_info() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
//            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('session_name', 'Joining Year', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/insert_staff_info/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '14_insert_staff_info');
                if (!$result) {
                    $max_id = 1;
                    $img_name = "1.jpg";
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                        $img_name = $max_id . ".jpg";
                    }
                }

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/staff/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $mobile = $this->input->post('mobile');
                $alternative_mobile = $this->input->post('alternative_mobile');
                $email = $this->input->post('email');
                $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
                $gender = $this->input->post('gender');
                $blood_group = $this->input->post('blood_group');
                $nationality = $this->input->post('nationality');
                $religion = $this->input->post('religion');
                $session_name = $this->input->post('session_name');
                $address = $this->input->post('address');

                $library = $this->input->post('library');
                $fees_collection = $this->input->post('fees_collection');
                $accounting = $this->input->post('accounting');
//                $asset_info = $this->input->post('asset_info');
//                $dormitory = $this->input->post('dormitory');

                $total_staff_result = $this->Common_model->one_column_one_info('total_staff', 'session_name', $session_name, '5_create_session');
                foreach ($total_staff_result as $total_staff_info) {
                    $staff_number = $total_staff_info->total_staff;
                }
                $final_staff_number = $staff_number + 1;
                $unique_id = $session_name . str_pad($final_staff_number, 3, "0", STR_PAD_LEFT) . "E";
                $update_data = array('total_staff' => $final_staff_number);
                $this->Common_model->update_data_onerow('5_create_session', $update_data, 'session_name', $session_name);

                $password = $this->input->post('password');
                $image = $img_name;

                $insert_data = array(
                    'record_id' => $max_id,
                    'name' => $name,
                    'designation' => $designation,
                    'mobile' => $mobile,
                    'alternative_mobile' => $alternative_mobile,
                    'email' => $email,
                    'date_of_birth' => $date_of_birth,
                    'gender' => $gender,
                    'blood_group' => $blood_group,
                    'nationality' => $nationality,
                    'religion' => $religion,
                    'address' => $address,
                    'session_name' => $session_name,
                    'staff_unique_id' => $unique_id,
                    'password' => $password,
                    'image' => $image,
                    'status' => 1,
                    'library' => $library,
                    'fees_collection' => $fees_collection,
                    'accounting' => $accounting,
//                  'asset_info' => $asset_info,
//                    'dormitory' => $dormitory
                );
                $this->Common_model->insert_data('14_insert_staff_info', $insert_data);
                redirect('Show_form/insert_staff_info/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_guardian_info() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('student_id', 'Student Id', 'trim|required');
            $this->form_validation->set_rules('relation_student', 'Relation With Student', 'trim|required');
            $this->form_validation->set_rules('nid', 'National ID', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('session_name', 'Session Name', 'trim|required');
            $this->form_validation->set_rules('blood_group', 'Blood Group', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/insert_guardian_info/empty/1', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '15_insert_guardian_info');
                if (!$result) {
                    $max_id = 1;
                    $img_name = "1.jpg";
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                        $img_name = $max_id . ".jpg";
                    }
                }

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/guardian/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $name = $this->input->post('name');
                $mobile = $this->input->post('mobile');
                $email = $this->input->post('email');
                $gender = $this->input->post('gender');
                $student_id = $this->input->post('student_id');
                $relation_student = $this->input->post('relation_student');
                $nid = $this->input->post('nid');
                $blood_group = $this->input->post('blood_group');
                $session_name = $this->input->post('session_name');
                $address = $this->input->post('address');

                $total_guardian_result = $this->Common_model->one_column_one_info('total_guardian', 'session_name', $session_name, '5_create_session');
                foreach ($total_guardian_result as $total_guardian_info) {
                    $guardian_number = $total_guardian_info->total_guardian;
                }
                $final_guardian_number = $guardian_number + 1;
                $unique_id = substr($session_name, -2) . str_pad($final_guardian_number, 5, "0", STR_PAD_LEFT) . "E";
                $update_data = array('total_guardian' => $final_guardian_number);
                $this->Common_model->update_data_onerow('5_create_session', $update_data, 'session_name', $session_name);

                $password = $this->input->post('password');
                $image = $img_name;

                $insert_data = array(
                    'record_id' => $max_id,
                    'name' => $name,
                    'mobile' => $mobile,
                    'email' => $email,
                    'gender' => $gender,
                    'student_id' => $student_id,
                    'relation_student' => $relation_student,
                    'nid' => $nid,
                    'blood_group' => $blood_group,
                    'session_name' => $session_name,
                    'guardian_unique_id' => $unique_id,
                    'address' => $address,
                    'password' => $password,
                    'image' => $image,
                    'status' => 1
                );
                $this->Common_model->insert_data('15_insert_guardian_info', $insert_data);
                redirect('Show_form/insert_guardian_info/created/1', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
//26-06-19
    public function teacher_subject_management() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_id', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('shift_id', 'Shift Name', 'trim|required');
            $this->form_validation->set_rules('section_id', 'Section Name', 'trim');
            $this->form_validation->set_rules('group_id', 'Group Name', 'trim');
            $this->form_validation->set_rules('subject_id', 'Subject Name', 'trim|required|callback_subject_id');
            $this->form_validation->set_rules('teacher_id', 'Teacher Name', 'trim|required');
            $this->form_validation->set_rules('session_id', 'Session', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
                redirect('Show_form/teacher_subject_management/empty');
            } else {
                $data=$this->_get_posted_subject_assign_data();
                $this->Common_model->insert_data('25_teacher_subject_management', $data);
                $this->session->set_flashdata('msg','<div class="alert alert-success">Subject Assign Successfully.</div>');
                redirect('Show_form/teacher_subject_management/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    //26-06-19
    public function subject_id()
    {
        $data=$this->_get_posted_subject_assign_data();
        $exits_check = $this->Common_model->exits_check("25_teacher_subject_management",$data);
        if ($exits_check) {
            $this->form_validation->set_message('subject_id', "Subject Name Already Exits");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function _get_posted_subject_assign_data(Type $var = null)
    {
        $data=array();
        $data['class_id'] = explode("#",$this->input->post('class_id'))[0];
        $data['shift_id'] = $this->input->post('shift_id');
        $data['section_id'] = $this->input->post('section_id');
        $data['group_id'] = $this->input->post('group_id');
        $data['subject_id'] = $this->input->post('subject_id');
        $data['teacher_id'] = $this->input->post('teacher_id');
        $data['session_id'] = $this->input->post('session_id');
        return $data;
    }
    public function create_fees_heads() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('fees_head_name', 'Fees Head Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_fess_heads/empty', 'refresh');
            } else {
                $fees_head_name = $this->input->post('fees_head_name');
                $insert_data = array('fee_head' => $fees_head_name);
                $this->Common_model->insert_data('10_create_fee_head', $insert_data);
                redirect('Show_form/create_fees_heads/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fee_settings() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('fees_head_name', 'Fees Head Name', 'trim|required');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('fee_amount', 'Fee Amount', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/fee_settings/empty', 'refresh');
            } else {
                $fees_head_name = $this->input->post('fees_head_name');
                $class_name = $this->input->post('class_name');
                $fees_amount = $this->input->post('fee_amount');
                $insert_data = array(
                    'fee_head' => $fees_head_name,
                    'class_name' => $class_name,
                    'amount' => $fees_amount,
                );
                $this->Common_model->insert_data('10_1_class_fee', $insert_data);
                redirect('Show_form/fee_settings/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function academic_calendar() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('file_type', 'File Type', 'trim|required');
            $this->form_validation->set_rules('published_date', 'Published Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/academic_calendar/empty', 'refresh');
            } else {
                $result = $this->Common_model->find_last_id('record_id', '23_academic_calendar');
                if (!$result) {
                    $max_id = 1;
                } else {
                    foreach ($result as $row) {
                        $max_id = ($row->record_id) + 1;
                    }
                }

                $title = $this->input->post('title');
                $file_type = $this->input->post('file_type');
                $published_date = date('Y-m-d', strtotime($this->input->post('published_date')));

                if ($file_type == "Image") {
                    $file_name = $max_id . ".jpg";

                    $config['file_name'] = $file_name;
                    $config['upload_path'] = './assets/img/academic_calendar/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;
                    $config['overwrite'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('file');
                } elseif ($file_type == "PDF") {
                    $file_name = $max_id . ".pdf";

                    $config['file_name'] = $file_name;
                    $config['upload_path'] = './assets/pdf/academic_calendar/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 0;
                    $config['overwrite'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('file');
                }

                $insert_data = array(
                    'record_id' => $max_id,
                    'title' => $title,
                    'file_type' => $file_type,
                    'file_name' => $file_name,
                    'published_date' => $published_date
                );
                $this->Common_model->insert_data('23_academic_calendar', $insert_data);
                redirect('Show_form/academic_calendar/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_income() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('income_head_name', 'Income Head Name', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('voucher_no', 'Voucher No.', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            $this->form_validation->set_rules('amount', 'Income Head amount', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/income/empty', 'refresh');
            } else {
                $income_head_name = $this->input->post('income_head_name');
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $voucher_no = $this->input->post('voucher_no');
                $quantity = $this->input->post('quantity');
                $amount = $this->input->post('amount');
                $insert_data = array(
                    'income_head' => $income_head_name,
                    'date' => $date,
                    'voucher_no' => $voucher_no,
                    'quantity' => $quantity,
                    'amount' => $amount
                );
                $this->Common_model->insert_data('30_income', $insert_data);
                redirect('Show_form/income/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_expense() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('expense_head_name', 'Expense Head Name', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('voucher_no', 'Voucher No.', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            $this->form_validation->set_rules('amount', 'Income Head amount', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/expense/empty', 'refresh');
            } else {
                $expense_head_name = $this->input->post('expense_head_name');
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $voucher_no = $this->input->post('voucher_no');
                $quantity = $this->input->post('quantity');
                $amount = $this->input->post('amount');
                $insert_data = array(
                    'expense_head' => $expense_head_name,
                    'date' => $date,
                    'voucher_no' => $voucher_no,
                    'quantity' => $quantity,
                    'amount' => $amount
                );
                $this->Common_model->insert_data('31_expense', $insert_data);
                redirect('Show_form/expense/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_income_head() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('income_head_name', 'Income Head Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_income_head/empty', 'refresh');
            } else {
                $income_head_name = $this->input->post('income_head_name');
                $insert_data = array('income_head' => $income_head_name);
                $this->Common_model->insert_data('28_income_head', $insert_data);
                redirect('Show_form/create_income_head/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_expense_head() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('expense_head_name', 'Expense Head Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_expense_head/empty', 'refresh');
            } else {
                $expense_head_name = $this->input->post('expense_head_name');
                $insert_data = array('expense_head' => $expense_head_name);
                $this->Common_model->insert_data('29_expense_head', $insert_data);
                redirect('Show_form/create_expense_head/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_dorm_info() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('dormitory_name', 'Dormitory Name', 'trim|required');
            $this->form_validation->set_rules('dormitory_address', 'Dormitory Address', 'trim|required');
            $this->form_validation->set_rules('dormitory_super', 'Dormitory Supervisor.', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('rent', 'Monthly Rent', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/dorm_info/empty', 'refresh');
            } else {
                $dormitory_name = $this->input->post('dormitory_name');
                $dormitory_adress = $this->input->post('dormitory_address');
                $dormitory_super = $this->input->post('dormitory_super');
                $mobile = $this->input->post('mobile');
                $rent = $this->input->post('rent');
                $insert_data = array(
                    'dormitory_name' => $dormitory_name,
                    'address' => $dormitory_adress,
                    'supervisor' => $dormitory_super,
                    'mobile_no' => $mobile,
                    'rent' => $rent
                );
                $this->Common_model->insert_data('41_insert_dormitory_info', $insert_data);
                redirect('Show_form/dorm_info/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dorm_rent_collection() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $student_id = $this->input->post('student_id');
            $class_name = $this->input->post('class');
            $hall = $this->input->post('hall');
            //$invoice_id = uniqid();
            $t_data = substr($this->input->post('t_data'), 0, -1);
            $t_data = explode("#", $t_data);

            function generateRandomString($length) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = 'H';
                for ($i = 0; $i < $length - 1; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

            $invoice_id = generateRandomString(7);
            for ($i = 0; $i < sizeof($t_data); $i = $i + 5) {
                $insert_data = array(
                    'date' => date('Y-m-d'),
                    'student_id' => $student_id,
                    'dormitory_name' => $hall,
                    'month' => $t_data[$i],
                    'amount' => $t_data[$i + 1],
                    'quantity' => $t_data[$i + 2],
                    'discount' => $t_data[$i + 3],
                    'total' => $t_data[$i + 4],
                    'invoice_no' => $invoice_id,
                    'inserted_by' => $this->session->userdata('ses_unique_id'),
                );
                $this->Common_model->insert_data('41_dormitory_rent_collection', $insert_data);
            }
            echo $invoice_id;
//          redirect('Show_form/fee_collection/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_sms() {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('date', 'Create Date', 'trim|required');
            $this->form_validation->set_rules('title', 'Message Title', 'trim|required');
            $this->form_validation->set_rules('body', 'Message Body', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/create_sms/empty', 'refresh');
            } else {
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $title = $this->input->post('title');
                $body = $this->input->post('body');

                $insert_data = array(
                    'create_date' => $date,
                    'title' => $title,
                    'body' => $body
                );
                $this->Common_model->insert_data('46_create_sms', $insert_data);
                redirect('Show_form/create_sms/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

     public function fee_collection() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $student_id = $this->input->post('student_id');
            $year = $this->input->post('recent_year');
            $class_name = $this->input->post('class');
            //$invoice_id = uniqid();
            $tution_fee_discount=$this->input->post("tution_fee_discount");
            $total_tution_fee_discount=0;
            
            $discount = $this->input->post('t_discount');
            $fee_discount = $this->input->post('discount');
            $in_total = $this->input->post('in_total');
            $total_pay = $this->input->post('total_pay');
            $due = $this->input->post('due');
            $old_invoice = '';
            $result = $this->Common_model->find_last_id_orderby('record_id', '10_3_fee_collection', 'record_id');
            if (!$result) {
                $invoice_id = 1001;
            } else {
                foreach ($result as $row) {
                    $invoice_id = ($row->invoice_id) + 1;
                }
            }
            $temp_table_data = $this->input->post('t_data');
            if ($temp_table_data == "") {
                $insert_data = array(
                    'student_id' => $student_id,
                    'class_name' => $class_name,
                    'invoice_id' => $invoice_id,
                    'description' => "Previous Due",
                    'amount' => $total_pay + $due,
                    'quantity' => 1,
                    'discount' => $discount,
                    'total' => $total_pay + $due,
                    'payment' => $total_pay,
                    'due' => $due,
                    'year' => $year,
                    'insertion_date' => date('Y-m-d'),
                    'inserted_by' => $this->session->userdata('ses_unique_id'),
                );
                $this->Common_model->insert_data('10_3_fee_collection', $insert_data);
            } else {
                $t_data = substr($this->input->post('t_data'), 0, -1);
                $t_data = explode("#", $t_data);
                $tuition_month = str_replace('Tuition Fee', '', $t_data[0]);
                $tuition_month = str_replace(')(', ',', $tuition_month);
                $tuition_month = str_replace(')', '', $tuition_month);
                $tuition_month = str_replace('(', '', $tuition_month);
                $tuition_month = explode(",",$tuition_month);
                $temp_amount="";
                for ($i = 0; $i < sizeof($t_data); $i = $i + 5) {
                    $tuiton_fee=substr($t_data[$i], 0, 11);
                    if($tuiton_fee!="Tuition Fee")
                    {
                        $total_tution_fee_discount=0;
                        $temp_amount="";
                    }else{
                        if(isset($tution_fee_discount))
                        {
                            foreach($tution_fee_discount as $value)
                            {
                                $total_tution_fee_discount+=$value;
                            }
                        }
                        for($j=0;$j<count($tuition_month);$j++){
                            $temp_amount.=$t_data[$i + 1]-($total_tution_fee_discount/$t_data[$i + 2]);
                            if($j<count($tuition_month)-1)
                            $temp_amount.=",";
                        }
                    }
                    if ($invoice_id == $old_invoice) {
                        $discount = 0;
                        $in_total = 0;
                        $total_pay = 0;
                        $due = 0;
                    }
                    $insert_data = array(
                        'student_id' => $student_id,
                        'class_name' => $class_name,
                        'invoice_id' => $invoice_id,
                        'description' => $t_data[$i],
                        'amount' => $t_data[$i + 1]-($total_tution_fee_discount/$t_data[$i + 2]),
                        'quantity' => $t_data[$i + 2],
                        'discount' => $discount,
                        'tuition_description' => $temp_amount,
                        'tuition_discount' => $total_tution_fee_discount,
                        'total' => $in_total,
                        'payment' => $total_pay,
                        'due' => $due,
                        'year' => $year,
                        'insertion_date' => date('Y-m-d'),
                        'inserted_by' => $this->session->userdata('ses_unique_id'),
                    );
                    $this->Common_model->insert_data('10_3_fee_collection', $insert_data);
                    $old_invoice = $invoice_id;
                }
            }

            $checking_array = array(
                'insertion_date' => date('Y-m-d'),
                'student_id' => $student_id,
                'invoice_id' => $invoice_id,
            );
            $result = $this->Common_model->check_value_get_data_orderby('10_3_fee_collection', $checking_array, 'record_id');
            $count_mark = 0;
            $total = 0;
            $sl = 1;
            if (!empty($result)) {
                foreach ($result as $res) {
                    $count_mark++;
                    $data["sl" . $count_mark] = $sl++;
                    $data["student_id" . $count_mark] = $res->student_id;
                    $data["inserted_by" . $count_mark] = $res->inserted_by;
                    if ($res->inserted_by == "admin") {
                        $data["inserted_by_name" . $count_mark] = $this->Common_model->one_column_one_info('name', 'admin_unique_id', $res->inserted_by, '0_admin');
                    } else {
                        $data["inserted_by_name" . $count_mark] = $this->Common_model->one_column_one_info('name', 'staff_unique_id', $res->inserted_by, '14_insert_staff_info');
                    }
                    $student = $this->Common_model->get_allinfo_byid('12_insert_student_info', 'student_unique_id', $res->student_id);
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
                    $data["tuition_discount" . $count_mark] = $res->tuition_discount;
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
            $data['date'] = date('Y-m-d');
            $data['student_id'] = $student_id;
            $data['invoice_no'] = $invoice_id;
            
             $this->Common_model->delete_info('student_id', $student_id, 'student_fee_discount');
              $this->Common_model->insert_data('student_fee_discount', array("student_id" => $student_id, 
                  "discount" => $fee_discount));
    //    echo '<pre>';
    //    print_r($data);
    //    die();
            $this->load->view('admin/34_2_collection_report_info', $data);
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function student_dorm_allocation() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('shift_name', 'Shift Name', 'trim|required');
            $this->form_validation->set_rules('student_id', 'Student ID', 'trim|required');
            $this->form_validation->set_rules('dormitory', 'Dormitory Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/student_dorm_allocation/empty', 'refresh');
            } else {
                $class_name = $this->input->post('class_name');
                $shift_name = $this->input->post('shift_name');
                $goup_name = $this->input->post('group_name');
                $section_name = $this->input->post('section_name');
                $student_id = $this->input->post('student_id');
                $student = $this->Common_model->one_column_one_info('name', 'student_unique_id', $student_id, '12_insert_student_info');
                foreach ($student as $st) {
                    $student_name = $st->name;
                }
                $dormitory_name = $this->input->post('dormitory');
                $insert_data = array(
                    'class_name' => $class_name,
                    'group_name' => $goup_name,
                    'section_name' => $section_name,
                    'shift_name' => $shift_name,
                    'student_id' => $student_id,
                    'student_name' => $student_name,
                    'dormitory_name' => $dormitory_name,
                );
                $this->Common_model->insert_data('41_student_dormitory_allocation', $insert_data);
                redirect('Show_form/student_dorm_allocation/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_attendance() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {

            $this->load->model('Common_model');
            $date = $this->input->post('date');
            $day = $this->input->post('day');
            $class = $this->input->post('class_name');
            $group = $this->input->post('group_name');
            $section = $this->input->post('section_name');
            $shift = $this->input->post('shift_name');
            $version = $this->input->post('version_name');
            $session_name = $this->input->post('session');
            $intime = $this->input->post('intime');
            $count = $this->input->post('count');
            for ($i = 1; $i <= $count; $i++) {
                $student = $this->input->post('student_id' . $i);
                $name = $this->input->post('name' . $i);
                $roll = $this->input->post('roll' . $i);
                $status = $this->input->post('status' . $i);

                $insert_data = array(
                    'date' => $date,
                    'day' => $day,
                    'year' => $session_name,
                    'student_id' => $student,
                    'name' => $name,
                    'roll' => $roll,
                    'class_name' => $class,
                    'group_name' => $group,
                    'section_name' => $section,
                    'shift_name' => $shift,
                    'version_name' => $version,
                    'intime' => $intime,
                    'status' => $status,
                );
                $this->Common_model->insert_data('47_student_attendance', $insert_data);
            }
            redirect('Show_form/student_attendance/created', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_attendance_ts() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {

            $this->load->model('Common_model');
            $this->form_validation->set_rules('intime', 'intime', 'trim|required');
//            $this->form_validation->set_rules('status', 'status', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/teacher_staff_attendance/empty', 'refresh');
            } else {
                $date = $this->input->post('date');
                $day = $this->input->post('day');
                $session_name = $this->input->post('session');
                $intime = $this->input->post('intime');
                $count = $this->input->post('count');
                $e_type = $this->input->post('e_type');
                for ($i = 1; $i <= $count; $i++) {
                    $employee = $this->input->post('employee_id' . $i);
                    $name = $this->input->post('name' . $i);
                    $status = $this->input->post('status' . $i);

                    $insert_data = array(
                        'date' => $date,
                        'day' => $day,
                        'year' => $session_name,
                        'employee_id' => $employee,
                        'employee_type' => $e_type,
                        'name' => $name,
                        'intime' => $intime,
                        'status' => $status,
                    );
                    $this->Common_model->insert_data('47_employee_attendance', $insert_data);
                }
                redirect('Show_form/teacher_staff_attendance/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_create_income_head() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('income_head_name', 'Income Head Name', 'trim|required');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/hall_create_income_head/empty', 'refresh');
            } else {
                $income_head_name = $this->input->post('income_head_name');
                $amount = $this->input->post('amount');
                $insert_data = array(
                    'fee_head' => $income_head_name,
                    'amount' => $amount
                );
                $this->Common_model->insert_data('41_hall_income_head', $insert_data);
                redirect('Show_form/hall_create_income_head/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function hall_create_expense_head() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('expense_head_name', 'Expense Head Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/hall_create_expense_head/empty', 'refresh');
            } else {
                $expense_head_name = $this->input->post('expense_head_name');
                $insert_data = array('expense_head' => $expense_head_name);
                $this->Common_model->insert_data('41_hall_expense_head', $insert_data);
                redirect('Show_form/hall_create_expense_head/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_hall_expense() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('expense_head_name', 'Expense Head Name', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('voucher_no', 'Voucher No.', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            $this->form_validation->set_rules('amount', 'Income Head amount', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_form/hall_expense/empty', 'refresh');
            } else {
                $expense_head_name = $this->input->post('expense_head_name');
                $date = $this->input->post('date');
                $voucher_no = $this->input->post('voucher_no');
                $quantity = $this->input->post('quantity');
                $amount = $this->input->post('amount');
                $insert_data = array(
                    'expense_head' => $expense_head_name,
                    'date' => $date,
                    'voucher_no' => $voucher_no,
                    'quantity' => $quantity,
                    'amount' => $amount
                );
                $this->Common_model->insert_data('41_hall_expense', $insert_data);
                redirect('Show_form/hall_expense/created', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_alumni_intoDatabase() {
        $ses_user_type = $this->session->userdata('ses_user_type');       
        if ($ses_user_type == "admin" || $ses_user_type == 'alumni') {
    
            $this->load->library('upload', [
                                            'upload_path' => './assets/img/alumni_images/',
                                            'allowed_types' => 'jpg|png|gif'
                                            ]);
            $this->upload->do_upload('image');
            $img_name = $this->upload->data('file_name');
            
            $batch = $this->input->post('batch');
            $name = $this->input->post('name');
            $father_name = $this->input->post('father_name');
            $mother_name = $this->input->post('mother_name');
            $spouse_name = $this->input->post('spouse_name');
            $present_village = $this->input->post('present_village');
            $present_post_office = $this->input->post('present_post_office');
            $present_upagila = $this->input->post('present_upagila');
            $present_district = $this->input->post('present_district');
            $permanent_village = $this->input->post('permanent_village');
            $permanent_post_office = $this->input->post('permanent_post_office');
            $permanent_upagila = $this->input->post('permanent_upagila');
            $permanent_district = $this->input->post('permanent_district');
            $profession = $this->input->post('profession');
            $email_id = $this->input->post('email_id');
            $mobile_number = $this->input->post('mobile_number');
            $present_access = $this->input->post('present_access');
            $mobile_access = $this->input->post('mobile_access');
            $approval_status = 10;
            $insertion_date = date("Y-m-d h:i:sa");
           
            $insert_data = array(
                'batch' => $batch,
                'name' => $name,
                'father_name' => $father_name,
                'mother_name' => $mother_name,
                'spouse_name' => $spouse_name,
                'present_village' => $present_village,
                'present_post_office' => $present_post_office,
                'present_upagila' => $present_upagila,
                'present_district' => $present_district,
                'permanent_village' => $permanent_village,
                'permanent_post_office' => $permanent_post_office,
                'permanent_upagila' => $permanent_upagila,
                'permanent_district' => $permanent_district,
                'profession' =>$profession,
                'email_id' => $email_id,
                'mobile_number' => $mobile_number,
                'present_access' => $present_access,
                'mobile_access' => $mobile_access,
                'image' => $img_name,
                'approval_status' => $approval_status,
                'insertion_date' => $insertion_date
            );
            $this->Common_model->insert_data('alumni_list', $insert_data);
            $this->session->set_flashdata('message','Data Inserted Successfully');
            redirect('Show_form/loadRecord', 'refresh');
        } 
        else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function online_class(){

        if($this->session->userdata('ses_user_type') == "admin"){
            $this->form_validation->set_rules('class_id', 'Class Name', 'required');
            $this->form_validation->set_rules('subject_id', 'Subject Name', 'required');
            $this->form_validation->set_rules('topic_name', 'Topic Name', 'required');
        
            if($this->form_validation->run() == FALSE){
                setMessage("msg","warning",validation_errors());
                redirect('Show_form/online_class');
            } 
            else{  
                $this->load->library('upload',[
                                            'upload_path' => './assets/pdf/lecture',
                                            'allowed_types' =>'pdf' 
                                            ]);             
                $this->upload->do_upload('pdf_file');
                if(empty($this->upload->data('file_name'))){
                    $link = $this->input->post('link');
                }
                else{
                    $link = $this->upload->data('file_name');
                }
                $insert_data = array(
                    'class_id' => $this->input->post('class_id'),
                    'group_id' => $this->input->post('group_id'),
                    'subject_id' => $this->input->post('subject_id'),
                    'section_id' => $this->input->post('section_id'),
                    'topic_name' => $this->input->post('topic_name'),
                    'link' => $link
                );
                $this->Common_model->insert_data('online_class', $insert_data);
                setMessage("msg","success","Successfully");
                redirect('Show_form/online_class');
            }
        } 
        else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function add_permission($id){
        
        $menu = implode('-', $this->input->post('menu'));
        $submenu = implode('-',$this->input->post('submenu'));
        $this->Common_model->insert_data('permissions',[
                                                    'menu' => $menu, 
                                                    'submenu' => $submenu,
                                                    'user_id' => $id]);
        redirect(base_url().'Admins/user_list');
    }
}

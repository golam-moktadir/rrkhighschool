<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Edit extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
    }
    public function publish($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 1);
            $this->Common_model->update_data_onerow('45_publish_result', $update_data, 'record_id', $id);
            redirect('Show_form/publish_result_status/publish', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function not_publish($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 0);
            $this->Common_model->update_data_onerow('45_publish_result', $update_data, 'record_id', $id);
            redirect('Show_form/publish_result_status/not_publish', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function transport($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('transport_name', 'Transport Name', 'trim|required');
            $this->form_validation->set_rules('model', 'Model', 'trim|required');
            $this->form_validation->set_rules('route', 'Route', 'trim|required');
            $this->form_validation->set_rules('driver_name', 'Driver Name', 'trim|required');
            $this->form_validation->set_rules('driver_mobile', 'Driver Mobile', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/transport/' . $id . '/empty', 'refresh');
            } else {
                $transport_name = $this->input->post('transport_name');
                $model = $this->input->post('model');
                $route = $this->input->post('route');
                $driver_name = $this->input->post('driver_name');
                $driver_mobile = $this->input->post('driver_mobile');

                $update_data = array(
                    'transport_name' => $transport_name,
                    'model' => $model,
                    'route' => $route,
                    'driver_name' => $driver_name,
                    'driver_mobile' => $driver_mobile
                );
                $this->Common_model->update_data_onerow('44_transport', $update_data, 'record_id', $id);
                redirect('Show_form/transport/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function issue_book($id)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('issue_date', 'Issue Book', 'trim|required');
            $this->form_validation->set_rules('due_date', 'Due Book', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/issue_book/' . $id . '/empty', 'refresh');
            } else {
                $issue_date = date('Y-m-d', strtotime($this->input->post('issue_date')));
                $due_date = date('Y-m-d', strtotime($this->input->post('due_date')));
                $update_data = array(
                    'issue_date' => $issue_date,
                    'due_date' => $due_date,
                );
                $this->Common_model->update_data_onerow('43_issue_book', $update_data, 'record_id', $id);
                redirect('Show_form/issue_book/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function return_status($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $class_name = $this->input->post('class_name');
            $class_time = $this->input->post('class_time');
            $update_data = array(
                'return_status' => 1
            );
            $this->Common_model->update_data_onerow('43_issue_book', $update_data, 'record_id', $id);
            redirect('Show_form/issue_book/returned', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_book($id)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('book_name', 'Book Name', 'trim|required');
            $this->form_validation->set_rules('author_name', 'Author Name', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/insert_book/' . $id . '/empty', 'refresh');
            } else {
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $book_name = $this->input->post('book_name');
                $author_name = $this->input->post('author_name');
                $quantity = $this->input->post('quantity');

                $update_data = array(
                    'date' => $date,
                    'book_name' => $book_name,
                    'author_name' => $author_name,
                    'quantity' => $quantity
                );
                $this->Common_model->update_data_onerow('42_library', $update_data, 'record_id', $id);
                redirect('Show_form/insert_book/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function exam_routine($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class name', 'trim|required');
            $this->form_validation->set_rules('published_date', 'Published Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/exam_routine/' . $id . '/empty', 'refresh');
            } else {
                $file_name = $id . ".pdf";

                $config['file_name'] = $file_name;
                $config['upload_path'] = './assets/pdf/exam_routine/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('file');

                $class_name = $this->input->post('class_name');
                $published_date = date('Y-m-d', strtotime($this->input->post('published_date')));

                $update_data = array(
                    'class_name' => $class_name,
                    'published_date' => $published_date
                );
                $this->Common_model->update_data_onerow('41_exam_routine', $update_data, 'record_id', $id);
                redirect('Show_form/exam_routine/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function class_routine($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class name', 'trim|required');
            $this->form_validation->set_rules('published_date', 'Published Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/class_routine/' . $id . '/empty', 'refresh');
            } else {
                $file_name = $id . ".pdf";

                $config['file_name'] = $file_name;
                $config['upload_path'] = './assets/pdf/class_routine/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('file');

                $class_name = $this->input->post('class_name');
                $published_date = date('Y-m-d', strtotime($this->input->post('published_date')));

                $update_data = array(
                    'class_name' => $class_name,
                    'published_date' => $published_date
                );
                $this->Common_model->update_data_onerow('class_routine', $update_data, 'record_id', $id);
                redirect('Show_form/class_routine/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function class_routine_info($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $result = $this->Common_model->get_allinfo_byid('40_create_class_routine', 'record_id', $id);
            foreach ($result as $info) {
                $data_one['class_name'] = $info->class_name;
                $data_one['shift_name'] = $info->shift_name;
                $data_one['group_name'] = $info->group_name;
                $data_one['section_name'] = $info->section_name;
                $data_one['session_name'] = $info->session_name;
            }
            $data_one['all_class'] = $this->Common_model->get_all_info('1_create_class');
            $data_one['all_shift'] = $this->Common_model->get_all_info('4_create_shift');
            $data_one['all_group'] = $this->Common_model->get_all_info('2_create_group');
            $data_one['all_section'] = $this->Common_model->get_all_info('3_create_section');
            $data_one['all_session'] = $this->Common_model->get_all_info('5_create_session');
            $data_one['msg'] = "Edited Successfuly";

            $class_day = $this->input->post('class_day');
            $class_time = $this->input->post('class_time');
            $subject_name = $this->input->post('subject_name');
            $teacher_id = $this->input->post('teacher_id');
            $result = $this->Common_model->one_column_one_info('name', 'teacher_unique_id', $teacher_id, '13_insert_teacher_info');
            foreach ($result as $info) {
                $teacher_name = $info->name;
            }
            $update_data = array(
                'class_day' => $class_day,
                'class_time' => $class_time,
                'subject_name' => $subject_name,
                'teacher_id' => $teacher_id,
                'teacher_name' => $teacher_name
            );
            $this->Common_model->update_data_onerow('40_create_class_routine', $update_data, 'record_id', $id);

            $this->load->view('admin/header');
            $this->load->view('admin/60_edit_class_routine_reload', $data_one);
            $this->load->view('admin/footer');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_class_time($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('class_time', 'Class Time', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_class_time/' . $id . '/empty', 'refresh');
            } else {
                $class_name = $this->input->post('class_name');
                $class_time = $this->input->post('class_time');
                $update_data = array(
                    'class_name' => $class_name,
                    'class_time' => $class_time,
                );
                $this->Common_model->update_data_onerow('39_create_time', $update_data, 'record_id', $id);
                redirect('Show_form/create_class_time/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function board_of_directors($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('duration', 'Duration', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/board_of_directors/' . $id . '/empty', 'refresh');
            } else {
                $img_name = $id . ".jpg";

                $config['file_name'] = $img_name;
                $config['upload_path'] = './assets/img/board_of_directors/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $duration = $this->input->post('duration');

                $update_data = array(
                    'name' => $name,
                    'duration' => $duration,
                    'designation' => $designation
                );
                $this->Common_model->update_data_onerow('38_board_of_directors', $update_data, 'record_id', $id);
                redirect('Show_form/board_of_directors/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function notice($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('user_title', 'User', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('particular', 'Particular', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_edit_form/notice/' . $id);
            } else {
                $user_title = $this->input->post('user_title');
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $particular = $this->input->post('particular');
                $details = $this->input->post('details');
                
                $update_data = array(
                    'user_title' => $user_title,
                    'date' => $date,
                    'particular' => $particular,
                    'details' => $details
                );
                $this->Common_model->update_data_onerow('37_notice', $update_data, 'record_id', $id);
                setMessage("msg","success","Successfully");
                redirect('Show_form/notice');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function syllabus($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class name', 'trim|required');
            $this->form_validation->set_rules('published_date', 'Published Date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/syllabus/' . $id . '/empty', 'refresh');
            } else {
                $file_name = $id . ".pdf";

                $config['file_name'] = $file_name;
                $config['upload_path'] = './assets/pdf/syllabus/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('file');

                $class_name = $this->input->post('class_name');
                $published_date = date('Y-m-d', strtotime($this->input->post('published_date')));

                $update_data = array(
                    'class_name' => $class_name,
                    'published_date' => $published_date
                );
                $this->Common_model->update_data_onerow('36_syllabus', $update_data, 'record_id', $id);
                redirect('Show_form/syllabus/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function booklist($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
            $this->form_validation->set_rules('book_name', 'Book Name', 'trim|required');
            $this->form_validation->set_rules('author_name', 'Author Name', 'trim|required');
            $this->form_validation->set_rules('edition', 'Edition', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/booklist/' . $id . '/empty', 'refresh');
            } else {
                $group_name = $this->input->post('group_name');
                $book_name = $this->input->post('book_name');
                $author_name = $this->input->post('author_name');
                $edition = $this->input->post('edition');

                $update_data = array('group_name' => $group_name, 'book_name' => $book_name,
                    'author_name' => $author_name, 'edition' => $edition);
                $this->Common_model->update_data_onerow('35_booklist', $update_data, 'record_id', $id);
                redirect('Show_form/booklist/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function governing_body_profile($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            $this->form_validation->set_rules('position', 'Position', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_edit_form/governing_body_profile/' . $id);
            } else {
                if($_FILES['image']['name'])
                {
                    $img_name = $id . ".jpg";
                    @unlink("assets/img/governing_body_profile/".$img_name);
                    $config['file_name'] = $img_name;
                    $config['upload_path'] = './assets/img/governing_body_profile/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;
                    $config['overwrite'] = TRUE;
        
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('image');
                    $update_data['image']=$img_name;
                    
                }
    
                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $details = $this->input->post('details');
                $position = $this->input->post('position');
                $update_data['name']=$name;
                $update_data['designation']=$designation;
                $update_data['details']=$details;
                $update_data['position']=$position;
                $this->Common_model->update_data_onerow('34_governing_body_profile', $update_data, 'record_id', $id);
                setMessage("msg","success","Successfully.");
                redirect('Show_form/governing_body_profile');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function single_page_content($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('details', 'Details', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_edit_form/single_page_content/' . $id);
            } else {
                $exits=$this->Common_model->exits_check("32_single_page_content",array("title"=>$this->input->post('title')),$this->input->post("id"));
                if(!$exits)
                {
                    $img_name = $id . ".jpg";
    
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
                    $update_data = array(
                        'title' => $title,
                        'details' => $details
                    );
                    $this->Common_model->update_data_onerow('32_single_page_content', $update_data, 'record_id', $id);
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

    public function create_class($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_class/' . $id . '/empty', 'refresh');
            } else {
                $class_name = $this->input->post('class_name');
                $update_data = array('class_name' => $class_name);
                $this->Common_model->update_data_onerow('1_create_class', $update_data, 'record_id', $id);
                redirect('Show_form/create_class/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_group($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_group/' . $id . '/empty', 'refresh');
            } else {
                $group_name = $this->input->post('group_name');
                $update_data = array('group_name' => $group_name);
                $this->Common_model->update_data_onerow('2_create_group', $update_data, 'record_id', $id);
                redirect('Show_form/create_group/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_section($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_section/' . $id . '/empty', 'refresh');
            } else {
                $section_name = $this->input->post('section_name');
                $update_data = array('section_name' => $section_name);
                $this->Common_model->update_data_onerow('3_create_section', $update_data, 'record_id', $id);
                redirect('Show_form/create_section/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_shift($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('shift_name', 'Shift Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_shift/' . $id . '/empty', 'refresh');
            } else {
                $shift_name = $this->input->post('shift_name');
                $update_data = array('shift_name' => $shift_name);
                $this->Common_model->update_data_onerow('4_create_shift', $update_data, 'record_id', $id);
                redirect('Show_form/create_shift/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_session($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('session_name', 'Session Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_session/' . $id . '/empty', 'refresh');
            } else {
                $session_name = $this->input->post('session_name');
                $update_data = array('session_name' => $session_name);
                $this->Common_model->update_data_onerow('5_create_session', $update_data, 'record_id', $id);
                redirect('Show_form/create_session/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_version($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('version_name', 'Version Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_version/' . $id . '/empty', 'refresh');
            } else {
                $version_name = $this->input->post('version_name');
                $update_data = array('version_name' => $version_name);
                $this->Common_model->update_data_onerow('6_create_version', $update_data, 'record_id', $id);
                redirect('Show_form/create_version/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    //26-06-19
    public function create_subject($id)
    {
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
                if($mcq_mark=="")
                {
                    $mcq_mark=null;
                }
                if($practical_mark=="")
                {
                    $practical_mark=null;
                }
                $class_id = $this->input->post('class_id');
                $update_data = array(
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
                $this->Common_model->update_data_onerow('7_create_subject', $update_data, 'record_id', $id);
                $this->session->set_flashdata('msg','<div class="alert alert-success">Subject Updated Successfully</div>');
                redirect('Show_form/create_subject/edited', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    //26-06-2019
    public function subject_name()
    {
        $exits_check = $this->Common_model->exits_check("7_create_subject",array("subject_name"=>$this->input->post('subject_name'),"class_id"=>$this->input->post('class_id')), $this->input->post('id'));
        if ($exits_check) {
            $this->form_validation->set_message('subject_name', "Subject Name Already Exits");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    //26-06-19
    public function create_exam_type($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_id', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('session_id', 'Session', 'trim|required');
            $this->form_validation->set_rules('exam_type', 'Exam Type', 'trim|required|callback_exam_type');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
                redirect('Show_edit_form/create_exam_type/' . $id . '/empty', 'refresh');
            } else {
                $class_id = $this->input->post('class_id');
                $session_id = $this->input->post('session_id');
                $exam_type = $this->input->post('exam_type');
                $update_data = array('class_id' => $class_id, 'exam_type' => $exam_type,'session_id' => $session_id);
                $this->Common_model->update_data_onerow('8_create_exam_type', $update_data, 'record_id', $id);
                $this->session->set_flashdata('msg','<div class="alert alert-success">Exam Type Updated Successfully</div>');
                redirect('Show_form/create_exam_type/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
     //26-06-2019
     public function exam_type()
     {
        $checking_array=array(
            "class_id"=>$this->input->post('class_id'),
            "exam_type"=>$this->input->post('exam_type'),
            "session_id"=>$this->input->post('session_id'),
        );
         $exits_check = $this->Common_model->exits_check("8_create_exam_type",$checking_array, $this->input->post('id'));
         if ($exits_check) {
             $this->form_validation->set_message('exam_type', "Exam Type  Already Exits");
             return FALSE;
         } else {
             return TRUE;
         }
     }

    public function create_exam_grade($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('min_num', 'Minimum Number', 'trim|required');
            $this->form_validation->set_rules('max_num', 'Maximum Number', 'trim|required');
            $this->form_validation->set_rules('letter_grade', 'Letter Grade', 'trim|required');
            $this->form_validation->set_rules('grade_point', 'Grade Point', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_exam_grade/' . $id . '/empty', 'refresh');
            } else {
                $min_num = $this->input->post('min_num');
                $max_num = $this->input->post('max_num');
                $letter_grade = $this->input->post('letter_grade');
                $grade_point = $this->input->post('grade_point');

                $update_data = array('min_num' => $min_num, 'max_num' => $max_num,
                    'letter_grade' => $letter_grade, 'grade_point' => $grade_point);
                $this->Common_model->update_data_onerow('9_create_exam_grade', $update_data, 'record_id', $id);
                redirect('Show_form/create_exam_grade/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_designation($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/create_designation/' . $id . '/empty', 'refresh');
            } else {
                $designation = $this->input->post('designation');
                $update_data = array('designation' => $designation);
                $this->Common_model->update_data_onerow('11_create_designation', $update_data, 'record_id', $id);
                redirect('Show_form/create_designation/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function active($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 1);
            $this->Common_model->update_data_onerow('12_insert_student_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_student_info/active/1', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function inactive($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 0);
            $this->Common_model->update_data_onerow('12_insert_student_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_student_info/inactive/1', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function teacher_active($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 1);
            $this->Common_model->update_data_onerow('13_insert_teacher_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_teacher_info/active', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function teacher_inactive($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 0);
            $this->Common_model->update_data_onerow('13_insert_teacher_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_teacher_info/inactive', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function staff_active($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 1);
            $this->Common_model->update_data_onerow('14_insert_staff_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_staff_info/active', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function staff_inactive($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 0);
            $this->Common_model->update_data_onerow('14_insert_staff_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_staff_info/inactive', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function guardian_active($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 1);
            $this->Common_model->update_data_onerow('15_insert_guardian_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_guardian_info/active/1', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function guardian_inactive($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $update_data = array('status' => 0);
            $this->Common_model->update_data_onerow('15_insert_guardian_info', $update_data, 'record_id', $id);
            redirect('Show_form/insert_guardian_info/inactive/1', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_student_info($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('session_name', 'Session Name', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('roll', 'Roll', 'trim|required|callback_roll');
            $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('parents_mobile', 'Parents Mobile', 'trim');
            $this->form_validation->set_rules('admission_date', '', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                setMessage("msg","warning",validation_errors());
                redirect('Show_form/insert_student_info/empty/1', 'refresh');
            } else {
                $img_name = $id . ".jpg";
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
                $version_name = $this->input->post('version_name');
                $session_name = $this->input->post('session_name');
                $name = $this->input->post('name');
                $roll = $this->input->post('roll');
                $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
                $gender = $this->input->post('gender');
                $blood_group = $this->input->post('blood_group');
                $nationality = $this->input->post('nationality');
                $religion = $this->input->post('religion');
                $address = $this->input->post('address');
                $father_name = $this->input->post('father_name');
                $mother_name = $this->input->post('mother_name');
                $parents_mobile = $this->input->post('parents_mobile');
                $father_occupation = $this->input->post('father_occupation');
                $mother_occupation = $this->input->post('mother_occupation');
                $guardian_name = $this->input->post('guardian_name');
                $guardian_mobile = $this->input->post('guardian_mobile');
                $guardian_realtion = $this->input->post('guardian_realtion');
                $subject = $this->input->post('subject');
                $admission_date = date('Y-m-d', strtotime($this->input->post('admission_date')));
                $fourth_subject = '';
                $fourth_subject_id = '';
                $sub = '';
                if ($class_name == '9' || $class_name == '10') {
                    $fourth_subject = explode("#",$this->input->post('fourth_subject'))[1];
                    $fourth_subject_id = explode("#",$this->input->post('fourth_subject'))[0];
                    if($subject!='')
                    {
                        foreach ($subject as $s) {
                            $sub = $sub . ' ' . $s;
                        }
                    }
                }


                $update_data = array(
                    'class_name' => $class_name,
                    'group_name' => $group_name,
                    'section_name' => $section_name,
                    'shift_name' => $shift_name,
                    'version_name' => $version_name,
                    'session_name' => $session_name,
                    'name' => $name,
                    'roll' => $roll,
                    'date_of_birth' => $date_of_birth,
                    'gender' => $gender,
                    'blood_group' => $blood_group,
                    'nationality' => $nationality,
                    'religion' => $religion,
                    'address' => $address,
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
                );
                $this->Common_model->update_data_onerow('12_insert_student_info', $update_data, 'record_id', $id);
                setMessage("msg","success","Successfully");
                redirect('Show_form/insert_student_info/created/1', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function roll() {
        if ($this->input->post('id') != '') {
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
            $exits=$this->Common_model->exits_check("12_insert_student_info",$check_array,$this->input->post('id'));
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
    public function insert_teacher_info($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/insert_teacher_info/' . $id . '/empty', 'refresh');
            } else {
                $img_name = $id . ".jpg";

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
                $education = $this->input->post('education');
                $date_of_joining = date('Y-m-d', strtotime($this->input->post('date_of_joining')));
                $designation = $this->input->post('designation');
                $mobile = $this->input->post('mobile');
                $email = $this->input->post('email');
                $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
                $gender = $this->input->post('gender');
                $blood_group = $this->input->post('blood_group');
                $nationality = $this->input->post('nationality');
                $religion = $this->input->post('religion');
                $session_name = date("Y",strtotime($this->input->post('date_of_joining')));
                $address = $this->input->post('address');
                $password = $this->input->post('password');

                $update_data = array(
                    'name' => $name,
                    'designation' => $designation,
                    'mobile' => $mobile,
                    'email' => $email,
                    'date_of_birth' => $date_of_birth,
                    'gender' => $gender,
                    'blood_group' => $blood_group,
                    'nationality' => $nationality,
                    'date_of_joining' => $date_of_joining,
                    'education' => $education,
                    'religion' => $religion,
                    'address' => $address,
                    'session_name' => $session_name,
                    'password' => $password
                );
                $this->Common_model->update_data_onerow('13_insert_teacher_info', $update_data, 'record_id', $id);
                redirect('Show_form/insert_teacher_info/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_staff_info($id)
    {
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
                redirect('Show_edit_form/insert_staff_info/' . $id . '/empty', 'refresh');
            } else {
                $img_name = $id . ".jpg";

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
                $password = $this->input->post('password');

                $library = $this->input->post('library');
                $fees_collection = $this->input->post('fees_collection');
                $accounting = $this->input->post('accounting');
//              $asset_info = $this->input->post('asset_info');
//                $dormitory = $this->input->post('dormitory');

                $update_data = array(
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
                    'password' => $password,
                    'library' => $library,
                    'fees_collection' => $fees_collection,
                    'accounting' => $accounting,
//                  'asset_info' => $asset_info,
//                    'dormitory' => $dormitory
                );
                $this->Common_model->update_data_onerow('14_insert_staff_info', $update_data, 'record_id', $id);
                redirect('Show_form/insert_staff_info/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function insert_guardian_info($id)
    {
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
                redirect('Show_edit_form/insert_guardian_info/' . $id . '/empty', 'refresh');
            } else {
                $img_name = $id . ".jpg";

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
                $password = $this->input->post('password');

                $update_data = array(
                    'name' => $name,
                    'mobile' => $mobile,
                    'email' => $email,
                    'gender' => $gender,
                    'student_id' => $student_id,
                    'relation_student' => $relation_student,
                    'nid' => $nid,
                    'blood_group' => $blood_group,
                    'session_name' => $session_name,
                    'address' => $address,
                    'password' => $password
                );

                $this->Common_model->update_data_onerow('15_insert_guardian_info', $update_data, 'record_id', $id);
                redirect('Show_form/insert_guardian_info/edit/1', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function dormitory($id)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('dormitory_name', 'Dormitory Name', 'trim|required');
            $this->form_validation->set_rules('dormitory_address', 'Address', 'trim|required');
            $this->form_validation->set_rules('dormitory_super', 'Supervisor', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required');
            $this->form_validation->set_rules('rent', 'Rent', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/dorm_info/' . $id . '/empty', 'refresh');
            } else {
                $dormitory_name = $this->input->post('dormitory_name');
                $dormitory_address = $this->input->post('dormitory_address');
                $dormitory_super = $this->input->post('dormitory_super');
                $mobile = $this->input->post('mobile');
                $rent = $this->input->post('rent');

                $update_data = array(
                    'dormitory_name' => $dormitory_name,
                    'address' => $dormitory_address,
                    'supervisor' => $dormitory_super,
                    'mobile_no' => $mobile,
                    'rent' => $rent
                );
                $this->Common_model->update_data_onerow('41_insert_dormitory_info', $update_data, 'record_id', $id);
                redirect('Show_form/dorm_info/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function create_sms($id)
    {
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('date', 'Create Date', 'trim|required');
            $this->form_validation->set_rules('title', 'Message Title', 'trim|required');
            $this->form_validation->set_rules('body', 'Message Body', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/sms/' . $id . '/empty', 'refresh');
            } else {
                $date = date('Y-m-d', strtotime($this->input->post('date')));
                $title = $this->input->post('title');
                $body = $this->input->post('body');

                $update_data = array(
                    'create_date' => $date,
                    'title' => $title,
                    'body' => $body
                );
                $this->Common_model->update_data_onerow('46_create_sms', $update_data, 'record_id', $id);
                redirect('Show_form/create_sms/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function fee_settings($id)
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $this->form_validation->set_rules('fees_head_name', 'Fees Head Name', 'trim|required');
            $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
            $this->form_validation->set_rules('fee_amount', 'Fee Amount', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Show_edit_form/fee_settings/' . $id . '/empty', 'refresh');
            } else {
                $fees_head_name = $this->input->post('fees_head_name');
                $class_name = $this->input->post('class_name');
                $fees_amount = $this->input->post('fee_amount');

                $update_data = array(
                    'fee_head' => $fees_head_name,
                    'class_name' => $class_name,
                    'amount' => $fees_amount,
                );
                $this->Common_model->update_data_onerow('10_1_class_fee', $update_data, 'record_id', $id);
                redirect('Show_form/fee_settings/edit', 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function update_attendance()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "staff" || $user_type == "accounts") {
            $this->load->model('Common_model');
            $report = $this->input->post('report');
            $count = $this->input->post('count');
            if ($report == 'student') {
                $table_name = '47_student_attendance';
            } else {
                $table_name = '47_employee_attendance';
            }

            for ($i = 1; $i <= $count; $i++) {
                $outtime = $this->input->post('outtime' . $i);
                $record_id = $this->input->post('record' . $i);
                $status = $this->input->post('status' . $i);

                if (!empty($outtime)) {
                    $update_data = array(
                        'outtime' => $outtime,
                        'status' => $status,
                    );
                    $this->Common_model->update_data_onerow($table_name, $update_data, 'record_id', $record_id);
                } else {
                    $outtime = $this->input->post('outtime' . $count);
                    $update_data = array(
                        'outtime' => $outtime,
                        'status' => $status,
                    );
                    $this->Common_model->update_data_onerow($table_name, $update_data, 'record_id', $record_id);
                }
            }
            redirect('Show_form/attendance_report/edit', 'refresh');
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function class_promotion()
    {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin" || $user_type == "teacher") {
            $this->load->model('Common_model');

            $promoted = $this->input->post('promoted');

            if (!empty($promoted)) {
                foreach ($promoted as $single_promoted) {
                    $student_id = $single_promoted[0];
                    $class = $single_promoted[1];
                    if($class == 'Play'){
                        $new_class = 'Nursery';
                    } elseif ($class == 'Nursery'){
                        $new_class = 'KG';
                    } elseif ($class == 'KG'){
                        $new_class = 1;
                    } else {
                        $new_class = $class + 1;
                    }
                    $promote = $single_promoted[2];
                    if($promote == 1) {
                        $update_data = array(
                            'class_name' => $new_class,
                            'session_name' => date('Y', strtotime('+1 years')),
                        );
                        $this->Common_model->update_data_onerow('12_insert_student_info', $update_data, 'student_unique_id', $student_id);
                    }
                }
            }

        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function online_class($id){

        if($this->session->userdata('ses_user_type') == "admin"){
            $this->load->library('upload',[
                                        'upload_path' => './assets/pdf/lecture',
                                        'allowed_types' =>'pdf' 
                                        ]);             
            $this->upload->do_upload('pdf_file');
            $file_name = $this->upload->data('file_name');
        
            if(empty($this->input->post('link')) && empty($file_name)){
                $value = $this->Common_model->get_single_row(['record_id' => $id],'online_class');
                $link = $value->link;
            }
            else if(empty($file_name)){
                $link = $this->input->post('link');
            }
            else{
                $link = $file_name;
            }
            $data = array(
                'class_id' => $this->input->post('class_id'),
                'group_id' => $this->input->post('group_id'),
                'subject_id' => $this->input->post('subject_id'),
                'section_id' => $this->input->post('section_id'),
                'topic_name' => $this->input->post('topic_name'),
                'link' => $link
            );
            $this->Common_model->update_data_onerow('online_class', $data,'record_id',$id);
            setMessage("msg","success","Successfully");
            redirect('Show_form/online_class');
        } 
        else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }
    public function edit_alumni($id){
        if ($this->session->userdata('ses_user_type') == "admin") {
            $this->load->library('upload', [
                                          'upload_path' => './assets/img/alumni_images/',
                                          'allowed_types' => 'jpg|png|gif'
                                       ]);
            $this->upload->do_upload('image');
            $file_name = $this->upload->data('file_name');
            if(empty($file_name)){
                $alumni = $this->Common_model->get_single_row(['id' => $id],'alumni_list');
                $file_name = $alumni->image;
            }

                $update_data = array(
                    'batch' => $this->input->post('batch'),
                    'name' => $this->input->post('name'),
                    'father_name' => $this->input->post('father_name'),
                    'mother_name' => $this->input->post('mother_name'),
                    'spouse_name' => $this->input->post('spouse_name'),
                    'profession' => $this->input->post('profession'),
                    'present_village' => $this->input->post('present_village'),
                    'present_post_office' => $this->input->post('present_post_office'),
                    'present_upagila' => $this->input->post('present_upagila'),
                    'permanent_village' => $this->input->post('permanent_village'),
                    'permanent_post_office' => $this->input->post('permanent_post_office'),
                    'permanent_upagila' => $this->input->post('permanent_upagila'),
                    'permanent_district' => $this->input->post('permanent_district'),
                    'email_id' => $this->input->post('email_id'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'present_access' => $this->input->post('present_access'),
                    'mobile_access' => $this->input->post('mobile_access'),
                    'image' => $file_name
                );
                $this->Common_model->update_data_onerow('alumni_list', $update_data, 'id', $id);
                $this->session->set_flashdata('message','Data Updated Successfully');
                redirect('Show_form/loadRecord', 'refresh');
            }
            else {
               $data['wrong_msg'] = "";
              $this->load->view('website/login_check', $data);
             }
        }
    public function approval_status($id){

        if($this->session->role == 'admin'){
         $data = $this->Common_model->get_single_row(['id' => $id],'alumni_list');
         if($data->approval_status == 10){
            $message = 'Approved Successfully';
            $array = ['approval_status' => 11];
         }
         else{
            $message = 'Unpproved Successfully';
            $array = ['approval_status' => 10];
         }
         $this->Common_model->update_data_onerow('alumni_list',$array, 'id', $id);
         $this->session->set_flashdata('message',$message);
         redirect('Show_form/loadRecord', 'refresh');
        }
        else if($this->session->role == 'user'){
         $this->session->set_flashdata('message','You can not approve any person');
         redirect('Show_form/loadRecord', 'refresh');
        }
    }
    public function edit_permission($id){
        $menu = implode('@', $this->input->post('menu'));
        $submenu = implode('@',$this->input->post('submenu'));
        $array = ['menu' => $menu, 'submenu' => $submenu];
        $this->Common_model->update_data_onerow('permissions',$array, 'user_id', $id);
        $this->session->set_flashdata('message','You have set permission');
        redirect('Admins/user_list');
    }
}

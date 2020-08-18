<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Show_data extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->library('pagination');
    }
    public function show_result($no) {
        $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
        $data['all_group'] = $this->Common_model->get_all_info('2_create_group');
        $data['all_section'] = $this->Common_model->get_all_info('3_create_section');
        $data['all_shift'] = $this->Common_model->get_all_info('4_create_shift');
        $data['all_session'] = $this->Common_model->get_all_info('5_create_session');
        $data['all_exam_type'] = $this->Common_model->get_all_info('8_create_exam_type');

        $this->load->view('website/header');
        $data['no'] = $no;
        $this->load->view('website/select_for_result', $data);
        $this->load->view('website/footer');
    }

    public function exam_routine() {
        $data['all_value'] = $this->Common_model->get_all_info('41_exam_routine');
        $this->load->view('website/header');
        $this->load->view('website/show_exam_routine', $data);
        $this->load->view('website/footer');
    }
    public function class_routine() {
        $data['all_value'] = $this->Common_model->get_all_info('class_routine');
        $this->load->view('website/header');
        $this->load->view('website/show_class_routine', $data);
        $this->load->view('website/footer');
    }

    public function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }


    public function board_of_directors() {
        $data['all_value'] = $this->Common_model->get_all_info_orderby('38_board_of_directors',"duration","desc");
        $this->load->view('website/header');
        $this->load->view('website/show_board_of_directors', $data);
        $this->load->view('website/footer');
    }

    public function notice($user_title) {
        if ($user_title == 1) {
            $title_name = "শিক্ষার্থীদের জন্য বিজ্ঞপ্তি";
        } elseif ($user_title == 2) {
            $title_name = "শিক্ষকদের জন্য বিজ্ঞপ্তি";
        } elseif ($user_title == 3) {
            $title_name = "কর্মকর্তা-কর্মচারীদের জন্য বিজ্ঞপ্তি";
        } elseif ($user_title == 4) {
            $title_name = "কার্যনির্বাহী পর্ষদের জন্য বিজ্ঞপ্তি";
        }
        $data['all_value'] = $this->Common_model->get_allinfo_byid('37_notice','user_title',$user_title);

        $data['user_title'] = $title_name;

        $this->load->view('website/header');
        $this->load->view('website/show_notice', $data);
        $this->load->view('website/footer');
    }

    public function contact() {
        $this->load->view('website/header');
        $this->load->view('website/show_contact');
        $this->load->view('website/footer');
    }

    public function syllabus() {
        $data['all_value'] = $this->Common_model->get_all_info('36_syllabus');
        $this->load->view('website/header');
        $this->load->view('website/show_syllabus', $data);
        $this->load->view('website/footer');
    }

    public function booklist() {
        $data['all_value'] = $this->Common_model->get_all_info_orderby('35_booklist', 'group_name', 'DESC');
        $this->load->view('website/header');
        $this->load->view('website/show_booklist', $data);
        $this->load->view('website/footer');
    }

    public function governing_body_profile() {
        $data['all_value'] = $this->Common_model->get_all_info('34_governing_body_profile');
        $this->load->view('website/header');
        $this->load->view('website/show_governing_body_profile', $data);
        $this->load->view('website/footer');
    }

    public function show_academic_calendar() {
        $data['all_value'] = $this->Common_model->get_all_info('23_academic_calendar');
        $this->load->view('website/header');
        $this->load->view('website/show_academic_calendar', $data);
        $this->load->view('website/footer');
    }

    public function photo_gallery() {
        $data['all_value'] = $this->Common_model->get_all_info('33_photo_gallery');
        $this->load->view('website/header');
        $this->load->view('website/show_photo_gallery', $data);
        $this->load->view('website/footer');
    }

    public function single_page_content($title) {
        if ($title == 1) {
            $title_name = "স্কুল পরিচিতি";
        } elseif ($title == 2) {
            $title_name = "উপজেলা চেয়ারম্যানের বাণী";
        } elseif ($title == 3) {
            $title_name = "সভাপতির বাণী";
        } elseif ($title == 4) {
            $title_name = "প্রধান শিক্ষকের বক্তব্য";
        } elseif ($title == 5) {
            $title_name = "Message from Upazilla Chairman";
        } elseif ($title == 6) {
            $title_name = "সংসদ সদস্যের বাণী";
        } elseif ($title == 7) {
            $title_name = "Message from Meyor";
        } elseif ($title == 8) {
            $title_name = "আমাদের লক্ষ্য";
        } elseif ($title == 9) {
            $title_name = "নিয়মাবলী";
        } elseif ($title == 10) {
            $title_name = "অভিভাবক গণের দায়িত্ব";
        } elseif ($title == 11) {
            $title_name = "স্কুলের পোষাক পরিচ্ছদ";
        }
        $result = $this->Common_model->get_allinfo_byid('32_single_page_content', 'title', $title);
        if (empty($result)) {
            $details = "";
            $image = "";
        } else {
            foreach ($result as $info) {
                $details = $info->details;
                $image = $info->image;
            }
        }
        $data['title_name'] = $title_name;
        $data['image'] = $image;
        $data['details'] = $details;
        $this->load->view('website/header');
        $this->load->view('website/single_page_content', $data);
        $this->load->view('website/footer');
    }

    public function show_teacher_info() {
        $data['all_value'] = $this->Common_model->get_all_info('13_insert_teacher_info');
        $this->load->view('website/header');
        $this->load->view('website/show_teacher_info', $data);
        $this->load->view('website/footer');
    }

    public function show_staff_info() {
        $data['all_value'] = $this->Common_model->get_all_info('14_insert_staff_info');
        $this->load->view('website/header');
        $this->load->view('website/show_staff_info', $data);
        $this->load->view('website/footer');
    }

    public function show_student_info() {
        $data['all_class'] = $this->Common_model->get_all_info('1_create_class');
        $data['all_group'] = $this->Common_model->get_all_info('2_create_group');
        $data['all_section'] = $this->Common_model->get_all_info('3_create_section');
        $data['all_shift'] = $this->Common_model->get_all_info('4_create_shift');
        $data['all_exam_type'] = $this->Common_model->group_by_one_column('exam_type', '8_create_exam_type');
        $data['all_session'] = $this->Common_model->get_all_info('5_create_session');
        $this->load->view('website/header');
        $this->load->view('website/show_student_info', $data);
        $this->load->view('website/footer');
    }
    public function show_alumni_info() {
        $data['alumni_list'] = $this->Common_model->get_all_alumni('alumni_list');
        $this->load->view('website/header');
        $this->load->view('website/show_alumni_info', $data);
        $this->load->view('website/footer');
    }
    public function online_class(){
        $this->load->model('Counter_model');
        $lectures = $this->Counter_model->online_class();
        $this->load->view('website/header');
        $this->load->view('website/online_class',['lectures' => $lectures]);
        $this->load->view('website/footer');

    }   
}

<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('check_exits_student_mark')) {

    function check_exits_student_mark($check_duplicate=null) {
        $CI = & get_instance();
        $CI->db->select('*');
        $CI->db->from('26_grade_mark_management');
        $CI->db->where($check_duplicate);
        $CI->db->order_by('record_id', 'desc');
        $CI->db->limit(1);
        return $CI->db->get()->row();
    }
}
if (!function_exists('mark_grade_point_calculation')) {

    function mark_grade_point_calculation($fullmark,$getmark) {
        if($fullmark==100) $parcent=$getmark;
        else $parcent=$getmark/$fullmark*100;
        $data=array();
        if($parcent){
            $CI =& get_instance();
            $sql="SELECT * from 9_create_exam_grade order by grade_point desc";
            $query=$CI->db->query($sql)->result_array();
            foreach($query as $value){
                if($parcent>=$value['min_num']){
                    $data['letter_grade']=$value['letter_grade'];
                    $data['grade_point']=$value['grade_point'];
                    break;
                }
            }
        }
        return $data;
    }
}
//26-06-19
if (!function_exists('point_to_grade')) {

    function point_to_grade($point) {
        $CI =& get_instance();
        $point=round($point,"2",PHP_ROUND_HALF_UP);
        if (0 <= $point && $point <1) {
            $data = 'F';
        } else if (1 <= $point && $point <2) {
            $data = 'D';
        } else if (2 <= $point && $point <3) {
            $data = 'C';
        } else if (3 <= $point && $point <3.50) {
            $data = 'B';
        } else if (3.50 <= $point && $point <4) {
            $data = 'A-';
        } else if (4 <= $point && $point <5) {
            $data = 'A';
        } else if (5 == $point) {
            $data = 'A+';
        } else {
            $data = 'F';
        }
        return $data;
    }
}



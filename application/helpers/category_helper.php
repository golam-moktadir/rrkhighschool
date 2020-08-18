<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('base_info_lists')) {

    function base_info_lists($base_id) {
        $CI = & get_instance();
        $CI->load->model('admin_model');
        $membres = $CI->admin_model->get_all_base_info($base_id); 
        return $membres;
    }

}
if (!function_exists('nfa')) {

    function nfa($str) {
        $search = array("10", "2", "3", "4", "5", '6', "7", "8", "9", "1");
        $replace = array("X", "II", "III", "IV", "V", "VI", 'VII', "VIII", "IX", "I");
        return str_replace($search, $replace, $str);
    }

}
if (!function_exists('debug_r')) {

    function debug_r($value) {
        echo "<pre>";
            print_r($value);
        echo "</pre>";
        die();
    }
}
if (!function_exists('debug_v')) {

    function debug_v($value) {
        echo "<pre>";
            var_dump($value);
        echo "</pre>";
        die();
    }
}



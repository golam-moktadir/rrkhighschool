<?php

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('setMessage')) {

    function setMessage($key,$class,$message) {
        $CI = & get_instance();
        $CI->session->set_flashdata($key,'<div class="alert alert-'.$class.'">'.$message.'</div>');
        return true;
    }

}
if(!function_exists("set_loging_agent")){
    function set_loging_agent()
    {
        $CI =& get_instance();
        
        $CI->load->library('user_agent');

		if ($CI->agent->is_browser())
		{
				$agent = $CI->agent->browser().' '.$CI->agent->version();
		}
		elseif ($CI->agent->is_robot())
		{
				$agent = $CI->agent->robot();
		}
		elseif ($CI->agent->is_mobile())
		{
				$agent = $CI->agent->mobile();
		}
		else
		{
				$agent = 'Unidentified User Agent';
		}

		return $agent.$CI->agent->platform();
    }
    
}
if(!function_exists("breadcrumbs"))
{
    function breadcrumbs($home = 'Home')
    {
        global $page_title; //global varable that takes it's value from the page that breadcrubs will appear on. Can be deleted if you wish, but if you delete it, delete also the title tage inside the <li> tag inside the foreach loop.
        $breadcrumb  = '<ol class="breadcrumb pull-right">';
        $root_domain = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        $breadcrumbs = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        // $breadcrumb .= '<li><i class="fa fa-home"></i><a href="' . $root_domain . '" title="Home Page"><span>' . $home . '</span></a></li>';
        foreach ($breadcrumbs as $crumb) {
            $link = ucwords(str_replace(array(".php", "-", "_"), array("", " ", " "), $crumb));
            $root_domain .=  $crumb . '/';
            $breadcrumb .= '<li><a href="' . $root_domain . '" title="' . $page_title . '"><span>' . $link . '</span></a></li>';
        }
        $breadcrumb .= '</ol>';
        return $breadcrumb;
    }
}
if(!function_exists("numbertowords"))
{
    function numbertowords($num)
    {
        $CI =& get_instance();
        $CI->load->library("Numbertowords");
        if($num>0)
        {
            return $CI->numbertowords->convert_number($num);
        }else if($num==0){
            return "Zero";
        }else{
            return "-".$CI->numbertowords->convert_number($num);
        }
    }
}

if (!function_exists('textshorten')) {

    function textshorten($text,$limit=400){
        $text=$text." ";
        $text=substr($text,0,$limit);
        $text=substr($text,0,strrpos($text, ' '));
        return $text=$text." .....";
    }
}
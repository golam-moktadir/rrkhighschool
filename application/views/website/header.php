<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Welcome to <?= DC ?></title>
        <meta name="description" conten t=""> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
         <!-- CSS -->
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">

        <!-- Js -->
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/ajax_jquery_website.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/min/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.js"></script>

        <!-- Google Map -->
        <script src="<?php echo base_url(); ?>assets/js/google_map.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/google-map-init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script> 
    </head>

    <body>
        <div class="container-fluid" style="padding: 0;">
            <div class="row">
                <div class="col-xs-12" style="text-align: center; margin-top: 10px;">
                <div class="header">
                        <img class="header_logo" src="<?php echo base_url(); ?>assets/img/logo.png"
                            alt="Logo">
                </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;" id="no_print1">
                <div class="col-xs-1 col-lg-2"></div>
                <div class="col-xs-1 col-lg-2"></div>
                <div class="col-xs-8 col-lg-6"></div>
                <div class="col-xs-1 col-lg-2" style="margin-top: 10px;">
                <button class="btn btn-success" style="font-weight: bold; padding: 5px 10px 5px 10px; 
                            border: 0px; background: purple;"
                            onclick="location.href = '<?php echo base_url(); ?>Admins'">Login
                    </button>
                </div>
            </div>
            <div class="row" id="no_print2">
                <div class="navbar navbar-inverse" style="background-color: #066; 
                     color: white; border: 0px; margin-left: 30px; margin-right: 30px; border-radius: 10px 10px 0px 0px;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse row" style="padding-top: 13px; font-size: 16px; font-weight: bold;">
                            <div class="col-sm-1 col-xs-12" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>">Home</a>
                            </div>
                            <div class="col-sm-1 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown">About
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/1">
                                            <i class="fa fa-caret-right"></i> স্কুল পরিচিতি</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/8">
                                            <i class="fa fa-caret-right"></i> আমাদের লক্ষ্য</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/6">
                                            <i class="fa fa-caret-right"></i> সংসদ সদস্যের বাণী</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/2">
                                            <i class="fa fa-caret-right"></i> উপজেলা চেয়ারম্যানের বাণী</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/3">
                                            <i class="fa fa-caret-right"></i> সভাপতির বাণী</a>
                                    </li>

                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/4">
                                            <i class="fa fa-caret-right"></i> প্রধান শিক্ষকের বক্তব্য</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown">Administration
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/governing_body_profile">
                                            <i class="fa fa-caret-right"></i> বর্তমান কার্যনির্বাহী পর্ষদ</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/board_of_directors">
                                            <i class="fa fa-caret-right"></i> পূর্ববর্তী কার্যনির্বাহী পর্ষদ</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_staff_info">
                                            <i class="fa fa-caret-right"></i> কর্মকর্তা-কর্মচারী বৃন্দ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-1 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" class="dropdown-toggle" 
                                   data-toggle="dropdown">Alumni
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_alumni_info">
                                            <i class="fa fa-caret-right"></i> প্রাক্তন শিক্ষার্থীদের তালিকা</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown">Academics
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/online_class">
                                            <i class="fa fa-caret-right"></i> Online Class</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/9">
                                            <i class="fa fa-caret-right"></i> নিয়মাবলী</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/10">
                                            <i class="fa fa-caret-right"></i> অভিভাবক গণের দায়িত্ব</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/11">
                                            <i class="fa fa-caret-right"></i> স্কুলের পোষাক পরিচ্ছদ</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_teacher_info">
                                            <i class="fa fa-caret-right"></i> শিক্ষক মন্ডলী</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_student_info">
                                            <i class="fa fa-caret-right"></i> শিক্ষার্থীদের তথ্য</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/booklist">
                                            <i class="fa fa-caret-right"></i> পাঠ্য বইয়ের তালিকা</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/syllabus">
                                            <i class="fa fa-caret-right"></i> সিলেবাস</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/class_routine">
                                            <i class="fa fa-caret-right"></i> ক্লাস রুটিন</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/exam_routine">
                                            <i class="fa fa-caret-right"></i> পরিক্ষার রুটিন</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_academic_calendar">
                                            <i class="fa fa-caret-right"></i> শিক্ষাবর্ষ পুঞ্জি</a>
                                    </li>
                                    <!--<li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_alumni_info">
                                            <i class="fa fa-caret-right"></i> প্রাক্তন শিক্ষার্থীদের তালিকা</a>
                                    </li>-->
                                </ul>
                            </div>
                            <div class="col-sm-1 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" class="dropdown-toggle" 
                                   data-toggle="dropdown">Result
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_result/1">
                                            <i class="fa fa-caret-right"></i> পরিক্ষার ফলাফল</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/show_result/2">
                                            <i class="fa fa-caret-right"></i> মেধা তালিকা</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" class="dropdown-toggle" 
                                   data-toggle="dropdown">Notice
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/notice/1">
                                            <i class="fa fa-caret-right"></i> শিক্ষার্থীদের জন্য বিজ্ঞপ্তি</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/notice/2">
                                            <i class="fa fa-caret-right"></i> শিক্ষকদের জন্য বিজ্ঞপ্তি</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/notice/3">
                                            <i class="fa fa-caret-right"></i> কর্মকর্তা-কর্মচারীদের জন্য বিজ্ঞপ্তি</a>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a href="<?php echo base_url(); ?>Show_data/notice/4">
                                            <i class="fa fa-caret-right"></i> কার্যনির্বাহী পর্ষদের জন্য বিজ্ঞপ্তি</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-1 col-xs-12" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_data/photo_gallery">Gallery</a>
                            </div>
                            <div class="col-sm-1 col-xs-12" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_data/contact">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

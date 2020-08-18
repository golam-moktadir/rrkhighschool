<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= DC ?></title>
    <link rel="Tab Icon" type="image/png" href="<?php echo base_url(); ?>assets/img/fab.jpg"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>adminlte/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>adminlte/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/w3.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>adminlte/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/helper.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

    <!--Live Search-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid" style="position: fixed; z-index: 500; width: 100%;">
    <div class="row">
        <div class="navbar navbar-inverse" style="background-color: #066;
                     color: white; border: 0px; margin-left: 20px; margin-right: 20px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <?php 
                $menu = explode("@", $this->session->userdata('menu')); 
                $submenu = explode("@", $this->session->userdata('submenu')); 
            ?>
            <div class="container-fluid">
                <div class="collapse navbar-collapse row" style="padding: 8px; font-size: 16px; font-weight: bold;">
                        <div class="col-sm-2 col-xs-12" style="text-align: center;">
                            <img src="<?php echo base_url(); ?>assets/img/logo3.png"
                                 style="width: 60px; height: 50px; border-radius: 5px;"
                                 alt="Logo">
                        </div>   
                        <?php
                            if(in_array("dashboard", $menu)){
                        ?>                  
                        <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                <a class="sub_hide" style="color: wheat;" href="<?php echo base_url(); ?>Admins">Dashboard</a>
                        </div>
                        <?php
                         } 
                         if(in_array("users", $menu)){
                         ?>
                        <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                            <a class="sub_hide" style="color: wheat;" href="<?php echo base_url(); ?>Admins/user_list"> Users </a>
                        </div>
                         <?php 
                            }
                            if(in_array("software", $menu)){
                         ?>
                        <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                            <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                               data-toggle="dropdown">Software Part<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                    if(in_array("create_option", $submenu)){
                                ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-red"></i>Create Option<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_class/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Class</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_group/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Group</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_section/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Section</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_shift/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Shift</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_class_time/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Class Time</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_session/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Year</a>
                                        </li>
                                       
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_subject/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Subject</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_exam_type/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Exam Type</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_exam_grade/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Create Exam Grade</a>
                                        </li>
                                        
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_designation/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Create
                                                Designation</a>
                                        </li>

                                    </ul>
                                </li>
                            <?php 
                            }
                            if(in_array("student_management", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-blue"></i>Student Management<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/insert_student_info/main/1"><i
                                                        class="fa fa-angle-double-right text-blue"></i> Insert
                                                Student Info.</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/search_student"><i
                                                        class="fa fa-angle-double-right text-blue"></i> Search
                                                Student</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/student_id_card/main"><i
                                                        class="fa fa-angle-double-right text-blue"></i> ID Card</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/student_admit_card/main"><i
                                                        class="fa fa-angle-double-right text-blue"></i> Admit
                                                Card</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/student_mark_sheet/main"><i
                                                        class="fa fa-angle-double-right text-blue"></i> Progress
                                                Report</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/generate_seat_plan"><i
                                                        class="fa fa-angle-double-right text-blue"></i> Generate
                                                Seat Plan</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/class_promotion"><i
                                                        class="fa fa-angle-double-right text-blue"></i> Class
                                                Promotion</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                            } 
                            if(in_array("teacher_management", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-orange"></i>Teacher Management<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/insert_teacher_info/main"><i
                                                        class="fa fa-angle-double-right text-orange"></i> Insert
                                                Teacher Info.</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/teacher_id_card/main"><i
                                                        class="fa fa-angle-double-right text-orange"></i> Teacher ID
                                                Card</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/search_teacher"><i
                                                        class="fa fa-angle-double-right text-orange"></i> Search
                                                Teacher</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php
                             }
                             if(in_array("staff_management", $submenu)){ 
                             ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-teal"></i>Staff Management<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/insert_staff_info/main"><i
                                                        class="fa fa-angle-double-right text-teal"></i> Insert Staff
                                                Info.</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/search_staff"><i
                                                        class="fa fa-angle-double-right text-teal"></i> Search Staff</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                            }
                            if(in_array("attendance_system", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-green"></i>Attendence System<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/student_attendance/main"><i
                                                        class="fa fa-angle-double-right text-green"></i> Student</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/teacher_staff_attendance/main"><i
                                                        class="fa fa-angle-double-right text-green"></i> Teacher &
                                                Staff</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/attendance_report/main"><i
                                                        class="fa fa-angle-double-right text-green"></i> Attendance
                                                Report</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                                }
                                if(in_array("subject_assignment", $submenu)){
                             ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/teacher_subject_management/main">
                                        <i class="fa fa-th text-yellow"></i>
                                        <span>Subject Assignment</span>
                                    </a>
                                </li>

                            <?php 
                            } 
                            if(in_array("marks_distribution", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-red"></i>Marks Distribution<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/input_marks/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Input
                                                Marks</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/marks_report"><i
                                                        class="fa fa-angle-double-right text-red"></i> Tabulation
                                                Sheet</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/send_marks_by_sms/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Sent Marks By
                                                SMS</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                            } 
                                if(in_array("result", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-blue"></i>Result<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/total_result"><i
                                                        class="fa fa-angle-double-right text-light-blue"></i> Total
                                                Result</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/merit_list"><i
                                                        class="fa fa-angle-double-right text-light-blue"></i> Merit
                                                List</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/fail_list"><i
                                                        class="fa fa-angle-double-right text-light-blue"></i> Fail
                                                List</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/result_at_a_glance/main"><i
                                                        class="fa fa-angle-double-right text-light-blue"></i> Result
                                                At A Glance</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/publish_result_status/main"><i
                                                        class="fa fa-angle-double-right text-light-blue"></i>
                                                Publish Result Status</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                            } 
                                if(in_array("certificates", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-purple"></i>Certificates<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/testimonial"><i
                                                        class="fa fa-angle-double-right text-purple"></i>
                                                Testimonial</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                            }
                            if(in_array("sms_system", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-orange"></i>SMS System<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_sms/main"><i
                                                        class="fa fa-angle-double-right text-orange"></i> Create SMS</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/send_sms_teacher"><i
                                                        class="fa fa-angle-double-right text-orange"></i> SMS to
                                                Teacher</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/send_sms_to_guardian">
                                                <i class="fa fa-angle-double-right text-orange"></i> SMS to Guardian</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/send_sms_staff"><i
                                                        class="fa fa-angle-double-right text-orange"></i> SMS to
                                                Staff</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/send_sms_governing_body"><i
                                                        class="fa fa-angle-double-right text-orange"></i> SMS to
                                                Governing Body</a>
                                        </li>
                                    </ul>
                                </li>

                            <?php 
                                }
                                if(in_array("library", $submenu)){
                             ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-green"></i>Library<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/insert_book/main"><i
                                                        class="fa fa-angle-double-right text-green"></i>Insert Book</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/issue_book/main"><i
                                                        class="fa fa-angle-double-right text-green"></i> Issue Book</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                            }
                            if(in_array("backup", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/backup/main">
                                        <i class="fa fa-th text-maroon"></i>
                                        <span>Backup</span>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>

                        </div>
                        <?php
                            }
                            if(in_array("accounts", $menu)){
                        ?>
                        <div class="col-sm-2 col-xs-12"
                             style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                            <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                               data-toggle="dropdown">Accounts Part<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php 
                                    if(in_array("fees_collection", $submenu)){
                                ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-lime"></i>Fees Collection<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/fee_collection/main"><i
                                                        class="fa fa-angle-double-right text-lime"></i>Fee
                                                Collection</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_fees_heads/main"><i
                                                        class="fa fa-angle-double-right text-lime"></i>Create Fees
                                                Heads</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/fee_settings/main"><i
                                                        class="fa fa-angle-double-right text-lime"></i>Class-wise
                                                Fee Settings </a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/collection_report/main"><i
                                                        class="fa fa-angle-double-right text-lime"></i>Collection
                                                Report</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/update_collection_report/main"><i
                                                        class="fa fa-angle-double-right text-lime"></i>Update Report</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                                } 
                                if(in_array("bank_history", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-fuchsia"></i>Bank History<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_bank_name/main"><i
                                                        class="fa fa-angle-double-right text-fuchsia"></i> Create
                                                Bank Name</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/bank_deposit/main"><i
                                                        class="fa fa-angle-double-right text-fuchsia"></i> Bank
                                                Deposit</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/bank_withdraw/main"><i
                                                        class="fa fa-angle-double-right text-fuchsia"></i> Bank
                                                Withdraw</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/bank_report/main"><i
                                                        class="fa fa-angle-double-right text-fuchsia"></i> Report</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php 
                            }
                            if(in_array("employee_history", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-aqua"></i>Employee Salary<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_salary_info/main"><i
                                                        class="fa fa-angle-double-right text-aqua"></i> Create
                                                Info.</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_salary_sheet/main"><i
                                                        class="fa fa-angle-double-right text-aqua"></i> Salary
                                                Payment</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                    }
                                    if(in_array("accounting", $submenu)){
                                ?>

                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a class="test" href="#">
                                        <i class="fa fa-th text-red"></i>Accounting<span
                                                class="caret"></span>
                                    </a>
                                    <ul class="subtog dropdown-menu">
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/income/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Income
                                                Entry</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/expense/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Expense
                                                Entry</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_income_head/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Create
                                                Income Head</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_expense_head/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Create
                                                Expense Head</a>
                                        </li>
                                        <li style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/ledger/main">
                                                <i class="fa fa-angle-double-right text-red"></i> Ledger</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    <?php
                     }
                     if(in_array("website", $menu)){
                     ?>
                        <div class="col-sm-2 col-xs-12"
                             style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                            <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                               data-toggle="dropdown">Website Part<span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                <?php
                                if(in_array("update_news", $submenu)){
                                ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/insert_news">
                                        <i class="fa fa-th text-fuchsia"></i>
                                        <span>Update News</span>
                                    </a>
                                </li>
                            <?php 
                            }
                            if(in_array("basic_info", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/single_page_content">
                                        <i class="fa fa-th text-yellow"></i>
                                        <span>Insert Basic Info.</span>
                                    </a>
                                </li>
                            <?php 
                            }
                                if(in_array("photo_gallery", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/photo_gallery">
                                        <i class="fa fa-th text-teal"></i>
                                        <span>Photo Gallery</span>
                                    </a>
                                </li>
                                <?php
                                }
                                if(in_array("managing_profile", $submenu)){
                                ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/governing_body_profile">
                                        <i class="fa fa-th text"></i>
                                        <span>Insert Managing Profile</span>
                                    </a>
                                </li>
                            <?php 
                            }
                            if(in_array("class_routine", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/class_routine">
                                        <i class="fa fa-th text-green"></i>
                                        <span>Upload Class Routine</span>
                                    </a>
                                </li>
                            <?php
                             }
                             if(in_array("exam_routine", $submenu)){
                             ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/exam_routine">
                                        <i class="fa fa-th text-blue"></i>
                                        <span>Upload Exam Routine</span>
                                    </a>
                                </li>
                            <?php 
                            }
                            if(in_array("academic_calendar", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/academic_calendar">
                                        <i class="fa fa-th text-red"></i>
                                        <span>Academic Calendar</span>
                                    </a>
                                </li>
                            <?php 
                            }
                            if(in_array("book_list", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/booklist">
                                        <i class="fa fa-th text-lime"></i>
                                        <span>Insert Booklist</span>
                                    </a>
                                </li>
                            <?php 
                                }
                                if(in_array("syllabus", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/syllabus">
                                        <i class="fa fa-th text-orange"></i>
                                        <span>Insert Syllabus</span>
                                    </a>
                                </li>
                            <?php 
                            }
                            if(in_array("notice_board", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/notice">
                                        <i class="fa fa-th text-green"></i>
                                        <span>Notice Board</span>
                                    </a>
                                </li>
                            <?php 
                            } 
                            if(in_array("previous_managing_committe", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/board_of_directors">
                                        <i class="fa fa-th text-aqua"></i>
                                        <span>Insert Previous Managing Committee</span>
                                    </a>
                                </li>
                            <?php 
                            }
                            if(in_array("alumni", $submenu)){ 
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/alumni_insertion">
                                        <i class="fa fa-th text-aqua"></i>
                                        <span>Insert Alumni</span>
                                    </a>
                                </li>
                            <?php 
                            }
                            if(in_array("online_class", $submenu)){
                            ?>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/online_class">
                                        <i class="fa fa-th text-red"></i>
                                        <span>Online Class</span>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                        <div class="col-sm-1 col-xs-12"
                             style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                            <a style="color: wheat;" href="<?php echo base_url(); ?>Log_in_out/logout">Logout</a>
                        </div>
                        <div class="col-sm-2 col-xs-12" style="text-align: center; font-size: 15px; color: white;">
                            <?php echo date('l'); ?><br><?php echo date('d-M-y'); ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.sub_hide').on("click", function () {
        $('.subtog').hide();
    });

    $('.dropdown-submenu a.test').on("click", function (e) {
        $('.subtog').hide();
        $(this).next('ul').show();
        e.stopPropagation();
        e.preventDefault();
    });
</script>

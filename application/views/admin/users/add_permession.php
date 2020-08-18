<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <form action="<?php echo base_url().'Insert/add_permission/'.$id ?>" method="post">
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Staff Info.</p>
                        
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" value="dashboard"> Dashboard
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" value="users"> Users
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" value="software"> Software Part
                                    </label>
                                </div>
                                <div class="form-group col-sm-10 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="create_option"> Create Option
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="student_management"> Student Management
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="teacher_management"> Teacher Management
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="staff_management"> Staff Management
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="student_management"> Student Management
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="attendance_system"> Attendance System
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="subject_assignment"> Subject Assignment
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="marks_distribution"> Marks Distribution
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="result"> Result
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="certificates"> Certificates
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="sms_system"> Sms System
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="library"> Library
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="backup"> Back up
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" value="accounts"> Accounts Part
                                    </label>
                                </div>
                                <div class="form-group col-sm-10 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="fees_collection"> Fees Collection
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="bank_history"> Bank History
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="employee_history"> Employee History
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="accounting"> Accounting
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" value="website"> Website Part
                                    </label>
                                </div>
                                <div class="form-group col-sm-10 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="update_news"> Update News
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="basic_info"> Basic Info
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="photo_gallery"> Photo Gallery
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="managing_profile"> Managing Profile
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="class_routine"> Class Routine
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="exam_routine"> Exam Routine
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="academic_calendar"> Academic Calendar
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="book_list"> Book List
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="syllabus"> Syllabus
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="notice_board"> Notice Board
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="previous_managing_committe"> Previous Managing Committe
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="alumni"> Alumni
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" value="online_class"> Online Class
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-offset-2">
                                    <input class="btn btn-success" type="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>
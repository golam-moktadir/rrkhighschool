<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <form action="<?php echo base_url().'Edit/edit_permission/'.$id ?>" method="post">
                    <div class="box-body">
                        <h3 class="text-info">Edit Permission Level</h3>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" <?php if(in_array('dashboard',$menu)) echo 'checked' ?> value="dashboard"> Dashboard
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" <?php if(in_array('users',$menu)) echo 'checked' ?> value="users"> Users
                                    </label>
                                </div>
                                <div class="form-group col-sm-10 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('permission',$submenu)) echo 'checked' ?> value="permission"> 
                                        Permission
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" <?php if(in_array('software', $menu)) echo 'checked' ?> value="software"> Software Part
                                    </label>
                                </div>
                                <div class="form-group col-sm-10 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('create_option', $submenu)) echo 'checked' ?> value="create_option"> Create Option
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('student_management', $submenu)) echo 'checked' ?> value="student_management"> Student Management
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('teacher_management', $submenu)) echo 'checked' ?> value="teacher_management"> Teacher Management
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('staff_management', $submenu)) echo 'checked' ?> value="staff_management"> Staff Management
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('attendance_system', $submenu)) echo 'checked' ?> value="attendance_system"> Attendance System
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('subject_assignment', $submenu)) echo 'checked' ?> value="subject_assignment"> Subject Assignment
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('marks_distribution', $submenu)) echo 'checked' ?> value="marks_distribution"> Marks Distribution
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('result', $submenu)) echo 'checked' ?> value="result"> Result
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('certificates', $submenu)) echo 'checked' ?> value="certificates"> Certificates
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('sms_system', $submenu)) echo 'checked' ?> value="sms_system"> Sms System
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('library', $submenu)) echo 'checked' ?> value="library"> Library
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('backup', $submenu)) echo 'checked' ?> value="backup"> Back up
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" <?php if(in_array('accounts', $menu)) echo 'checked' ?> value="accounts"> Accounts Part
                                    </label>
                                </div>
                                <div class="form-group col-sm-10 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('fees_collection', $submenu)) echo 'checked' ?> value="fees_collection"> Fees Collection
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('bank_history', $submenu)) echo 'checked' ?> value="bank_history"> Bank History
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('employee_history', $submenu)) echo 'checked' ?> value="employee_history"> Employee History
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('accounting', $submenu)) echo 'checked' ?> value="accounting"> Accounting
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="menu[]" <?php if(in_array('website', $menu)) echo 'checked' ?> value="website"> Website Part
                                    </label>
                                </div>
                                <div class="form-group col-sm-10 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('update_news', $submenu)) echo 'checked' ?> value="update_news"> Update News
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('basic_info', $submenu)) echo 'checked' ?> value="basic_info"> Basic Info
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('photo_gallery', $submenu)) echo 'checked' ?> value="photo_gallery"> Photo Gallery
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('managing_profile', $submenu)) echo 'checked' ?> value="managing_profile"> Managing Profile
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('class_routine', $submenu)) echo 'checked' ?> value="class_routine"> Class Routine
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('exam_routine', $submenu)) echo 'checked' ?> value="exam_routine"> Exam Routine
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('academic_calendar', $submenu)) echo 'checked' ?> value="academic_calendar"> Academic Calendar
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('book_list', $submenu)) echo 'checked' ?> value="book_list"> Book List
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('syllabus', $submenu)) echo 'checked' ?> value="syllabus"> Syllabus
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('notice_board', $submenu)) echo 'checked' ?> value="notice_board"> Notice Board
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('previous_managing_committe', $submenu)) echo 'checked' ?> value="previous_managing_committe"> Previous Managing Committe
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('alumni', $submenu)) echo 'checked' ?> value="alumni"> Alumni
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="submenu[]" <?php if(in_array('online_class', $submenu)) echo 'checked' ?> value="online_class"> Online Class
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-offset-2">
                                    <input class="btn btn-success" type="submit" value="Update">
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
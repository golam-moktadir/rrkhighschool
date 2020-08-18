<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $name = $one_info->name;
    $mobile = $one_info->mobile;
    $email = $one_info->email;
    $gender = $one_info->gender;
    $student_id = $one_info->student_id;
    $relation_student = $one_info->relation_student;
    $nid = $one_info->nid;
    $blood_group = $one_info->blood_group;
    $session_name = $one_info->session_name;
    $address = $one_info->address;
    $password = $one_info->password;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/insert_guardian_info/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Guardian Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" 
                                           value="<?php echo $name; ?>" placeholder="" name="name">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="mobile">Mobile No.</label>
                                    <input type="text" class="form-control" id="mobile" 
                                           value="<?php echo $mobile; ?>" placeholder="" name="mobile">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" 
                                           value="<?php echo $email; ?>" placeholder="" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="gender">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="<?php echo $gender; ?>">
                                            <?php echo $gender; ?>
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="student_id">Student ID</label>
                                    <select name="student_id" id="student_id" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="<?php echo $student_id; ?>"><?php echo $student_id; ?></option>
                                        <?php foreach($all_student as $single_student){ ?>
                                            <option value="<?php echo $single_student->student_unique_id; ?>">
                                                <?php echo $single_student->student_unique_id; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="relation_student">Relation with Student</label>
                                    <input type="text" class="form-control" id="relation_student" 
                                           value="<?php echo $relation_student; ?>" placeholder="" name="relation_student">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="nid">National ID</label>
                                    <input type="text" class="form-control" id="nid" 
                                           value="<?php echo $nid; ?>" placeholder="" name="nid">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="blood_group">Select Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="<?php echo $blood_group; ?>">
                                            <?php echo $blood_group; ?>
                                        </option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="session_name">Select Year</label>
                                    <select name="session_name" id="session_name" class="form-control">
                                        <option value="<?php echo $session_name; ?>">
                                            <?php echo $session_name; ?>
                                        </option>
                                        <?php foreach ($all_session as $single_session) { ?>
                                            <option value="<?php echo $single_session->session_name; ?>">
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-xs-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" 
                                           value="<?php echo $address; ?>" placeholder="" name="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" 
                                           value="<?php echo $password; ?>" placeholder="" name="password">
                                </div>
                                <div class="form-group col-sm-8 col-xs-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>
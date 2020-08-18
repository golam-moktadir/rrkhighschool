<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
} elseif ($msg == "active") {
    $msg = "ID Has been Made Active";
} elseif ($msg == "inactive") {
    $msg = "ID Has been Made Inactive";
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/insert_guardian_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Guardian Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="" name="name">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="mobile">Mobile No.</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="gender">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="student_id">Student ID</label>
                                    <select name="student_id" id="student_id" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach($all_student as $single_student){ ?>
                                            <option value="<?php echo $single_student->student_unique_id; ?>">
                                                <?php echo $single_student->student_unique_id; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="relation_student">Relation with Student</label>
                                    <input type="text" class="form-control" id="relation_student" placeholder="" name="relation_student">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="nid">National ID</label>
                                    <input type="text" class="form-control" id="nid" placeholder="" name="nid">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="blood_group">Select Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="">-- Select --</option>
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
                                        <option value="">-- Select --</option>
                                        <?php foreach($all_session as $single_session){ ?>
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
                                    <input type="text" class="form-control" id="address" placeholder="" name="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="" name="password">
                                </div>
                                <div class="form-group col-sm-8 col-xs-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Guardian ID</th>
                                <th style="text-align: center;">Student ID</th>
                                <th style="text-align: center;">Mobile</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Action</th>
                                    <th style="text-align: center;">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = $first_count;
                                foreach ($all_value as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->guardian_unique_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->student_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/guardian/<?php echo $single_value->image; ?>" width="50" height="50">
                                        </td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" href="<?php echo base_url(); ?>Show_edit_form/insert_guardian_info/<?php echo $single_value->record_id; ?>/main"
                                               class="btn btn-info fa fa-edit" title="Edit">
                                            </a>
                                            <?php if($single_value->status == 0){?>
                                            <a style="margin: 5px;" href="<?php echo base_url(); ?>Edit/guardian_active/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-success">Active
                                            </a>
                                            <?php }else{ ?>
                                            <a style="margin: 5px;" href="<?php echo base_url(); ?>Edit/guardian_inactive/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger">Inactive
                                            </a>
                                            <?php }?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($single_value->status == 1) {
                                                echo "Active";
                                            } else {
                                                echo "Inactive";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="text-align: center;" class="row">
                    <h5 style="color: #0073b7; margin: 0px;">Page - <?php echo $recent_page_number; ?></h5>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $total_page_num; $i++) { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>Show_form/insert_guardian_info/main/<?php echo $i; ?>">
                                    <b><?php echo $i; ?></b>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>  
                </div>
            </section>
        </div>
    </section>
</aside>
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
<style>
    .form-group {
        margin: 0px;
    }

    .col-sm-2 {
        padding: 0px 10px 10px 10px;
    }
</style>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Insert/insert_staff_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Staff Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row" style="padding: 10px">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="" name="name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="designation">Select Designation</label>
                                    <select name="designation" id="designation" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_designation as $single_designation) { ?>
                                            <option value="<?php echo $single_designation->designation; ?>">
                                                <?php echo $single_designation->designation; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="mobile">Mobile No.</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="alternative_mobile">Alternative Mobile</label>
                                    <input type="text" class="form-control" id="alternative_mobile" placeholder=""
                                           name="alternative_mobile">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="email">Email</b></label>
                                    <input type="email" class="form-control" id="email" placeholder="" name="email">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="text" class="form-control new_datepicker" id="date_of_birth"
                                           placeholder="Select Date" name="date_of_birth" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="gender">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="blood_group">Select Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control selectpicker"
                                            data-container="body">
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
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality"
                                           value="Bangladeshi" readonly>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="religion">Religion</label>
                                    <select class="form-control selectpicker"
                                            data-container="body" id="religion" name="religion">
                                        <option value="">--Select--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Buddhism">Buddhism</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="session_name">Select Joining Year</label>
                                    <select name="session_name" id="session_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_session as $single_session) { ?>
                                            <option value="<?php echo $single_session->session_name; ?>">
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="" name="address">
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder=""
                                           name="password">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="" name="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <h4><i class="fa fa-angle-double-right text-red"></i> Permission for Staff</h4>
                                </div>

                                <div class="form-group col-sm-4 col-xs-12" style="margin-top: 10px;">
                                    <label class="checkbox-inline">
                                        <input type="hidden" name="library" value="0">
                                        <input type="checkbox" name="library" value="1"> Library
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="hidden" name="fees_collection" value="0">
                                        <input type="checkbox" name="fees_collection" value="1"> Fees Collection
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="hidden" name="accounting" value="0">
                                        <input type="checkbox" name="accounting" value="1"> Accounting
                                    </label>
                                    <!--                                    <label class="checkbox-inline">
                                                                            <input type="hidden" name="asset_info" value="0">
                                                                            <input type="checkbox" name="asset_info" value="1"> Asset Info.
                                                                        </label> 
                                    -->
                                </div>

                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 5px;" type="submit"
                                            class="pull-left btn btn-success btn-sm">Submit <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="box box-info" style="margin-top: 10px">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Staff ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Designation</th>
                                <th style="text-align: center;">Mobile</th>
                                <th style="text-align: center;">Alternative Mobile</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Permission</th>
                                <th style="text-align: center;">Action</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->staff_unique_id; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->alternative_mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                    <td style="text-align: center;">
                                        <?php if (file_exists('./assets/img/staff/' . $single_value->image)) { ?>
                                            <img src="<?php echo base_url(); ?>assets/img/staff/<?php echo $single_value->image; ?>"
                                                 width="50" height="50">
                                        <?php } ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($single_value->library == 1) {
                                            echo "Library<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->fees_collection == 1) {
                                            echo "Fees Collection<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->accounting == 1) {
                                            echo "Accounting<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->asset_info == 1) {
                                            echo "Residential Hall<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->dormitory == 1) {
                                            echo "Dormitory<br>";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Show_edit_form/insert_staff_info/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info fa fa-edit" title="Edit">
                                        </a>
                                        <?php if ($single_value->status == 0) { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/staff_active/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-success">Active
                                            </a>
                                        <?php } else { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/staff_inactive/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger">Inactive
                                            </a>
                                        <?php } ?>
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
            </section>
        </div>
    </section>
</aside>
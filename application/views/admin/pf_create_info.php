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
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/pf_create_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="teacher_staff">Select Teacher/Staff</label>
                                <select name="teacher_staff" id="teacher_staff" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_teacher as $single_teacher) { ?>
                                        <option value="<?php echo $single_teacher->teacher_unique_id . "#" . $single_teacher->name; ?>">
                                            <?php echo $single_teacher->teacher_unique_id . ", " . $single_teacher->name; ?>
                                        </option>
                                    <?php } ?>
                                    <?php foreach ($all_staff as $single_staff) { ?>
                                        <option value="<?php echo $single_staff->staff_unique_id . "#" . $single_staff->name; ?>">
                                            <?php echo $single_staff->staff_unique_id . ", " . $single_staff->name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="job_start_date">Job Starting Date</label>
                                <input type="date" class="form-control" id="job_start_date" placeholder="" name="job_start_date">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="designation">Select Designation</label>
                                <select name="designation" id="designation" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_designation as $single_designation) { ?>
                                        <option value="<?php echo $single_designation->designation; ?>">
                                            <?php echo $single_designation->designation; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="job_retire_date">Job Retirement Date</label>
                                <input type="date" class="form-control" id="job_retire_date" placeholder="" name="job_retire_date">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" 
                                       value="Uttara Bank" placeholder="" name="bank_name">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="account_no">Account No.</label>
                                <input type="text" class="form-control" id="account_no" placeholder="" name="account_no">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="salary_scale">Salary Scale</label>
                                <input type="text" class="form-control" id="salary_scale" placeholder="" name="salary_scale">
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

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Teacher/Staff ID</th>
                                    <th style="text-align: center;">Teacher/Staff Name</th>
                                    <th style="text-align: center;">Job Starting Date</th>
                                    <th style="text-align: center;">Designation</th>
                                    <th style="text-align: center;">Job Retirement Date</th>
                                    <th style="text-align: center;">Bank Name</th>
                                    <th style="text-align: center;">Account No.</th>
                                    <th style="text-align: center;">Salary Scale</th>
                                    <th style="text-align: center;">Action</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->teacher_staff_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->teacher_staff_name; ?></td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->job_starting_date)); ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->job_starting_date)); ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->bank_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->account_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->salary_scale; ?></td>
                                        <td style="text-align: center;">
                                            <!--                                            <a style="margin: 5px;" class="btn btn-info"
                                                                                           href="<?php echo base_url(); ?>Show_edit_form/pf_create_info/<?php echo $single_value->record_id; ?>/main">Edit
                                                                                        </a>-->
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/pf_create_info/<?php echo $single_value->record_id; ?>">Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div>
            </section>
        </div>
    </section>
</aside>
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
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Insert/create_salary_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="teacher_staff">Select Teacher/Staff</label>
                                <select name="teacher_staff" id="teacher_staff" class="form-control selectpicker"
                                        data-container="body"
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
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name"
                                       value="" placeholder="" name="bank_name">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="account_no">Account No.</label>
                                <input type="text" class="form-control" id="account_no" placeholder=""
                                       name="account_no">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="govt_salary">Govt. Salary</label>
                                <input type="text" class="form-control" value="0" id="govt_salary" placeholder=""
                                       name="govt_salary">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="nongovt_salary">Non Govt. Salary</label>
                                <input type="text" class="form-control" value="0" id="nongovt_salary" placeholder=""
                                       name="nongovt_salary">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="salary_scale">Total Salary</label>
                                <input type="text" class="form-control" value="0" id="salary_scale" placeholder=""
                                       name="salary_scale" readonly>
                            </div>
                            <div class="box-footer col-sm-2  clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Submit
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
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
                                <th style="text-align: center;">Designation</th>
                                <th style="text-align: center;">Account No.</th>
                                <th style="text-align: center;">Govt. Salary</th>
                                <th style="text-align: center;">Non Govt. Salary</th>
                                <th style="text-align: center;">Total Salary</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->account_no; ?></td>
                                    <td style="text-align: center;"><?php echo number_format($single_value->govt_salary); ?>
                                        /-
                                    </td>
                                    <td style="text-align: center;"><?php echo number_format($single_value->nongovt_salary); ?>
                                        /-
                                    </td>
                                    <td style="text-align: center;"><?php echo number_format($single_value->salary_amount); ?>
                                        /-
                                    </td>
                                    <td style="text-align: center;">
                                        <!--                                            <a style="margin: 5px;" class="btn btn-info"
                                                                                           href="<?php echo base_url(); ?>Show_edit_form/pf_create_info/<?php echo $single_value->record_id; ?>/main">Edit
                                                                                        </a>-->
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/create_salary_info/<?php echo $single_value->record_id; ?>">Delete
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

<script type="text/javascript">
    $("#govt_salary, #nongovt_salary").on("change paste keyup", function () {
        var govt_salary = $('#govt_salary').val();
        var nongovt_salary = $('#nongovt_salary').val();
        var total_salary = parseFloat(govt_salary) + parseFloat(nongovt_salary);
        $('#salary_scale').val(total_salary);
    });
</script>
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
                    <?php echo form_open_multipart('Insert/teacher_subject_management'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Teacher Subject Management</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_class as $single_class) { ?>
                                            <option value="<?php echo $single_class->class_name; ?>">
                                                <?php echo "Class - " . nfa($single_class->class_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="shift_name">Select Shift</label>
                                    <select name="shift_name" id="shift_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_shift as $single_shift) { ?>
                                            <option value="<?php echo $single_shift->shift_name; ?>">
                                                <?php echo $single_shift->shift_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="group_div" style="display: none">
                                    <label for="group_name">Select Group</label>
                                    <select name="group_name" id="group_name" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_group as $single_group) { ?>
                                            <option value="<?php echo $single_group->group_name; ?>">
                                                <?php echo $single_group->group_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="section_div">
                                    <label for="section_name">Select Section</label>
                                    <select name="section_name" id="section_name" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_section as $single_section) { ?>
                                            <option value="<?php echo $single_section->section_name; ?>">
                                                <?php echo $single_section->section_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" style="display: none;">
                                    <label for="session_name">Select Year</label>
                                    <select name="session_name" id="session_name" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="<?php echo date('Y-m-d'); ?>">-- Select --</option>
                                        <?php foreach ($all_session as $single_session) { ?>
                                            <option value="<?php echo $single_session->session_name; ?>">
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="subject_name">Select Subject</label>
                                    <select name="subject_name" id="subject_name" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_subject as $single_subject) { ?>
                                            <option value="<?php echo $single_subject->subject_name; ?>">
                                                <?php echo $single_subject->subject_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="teacher_id">Select Teacher</label>
                                    <select name="teacher_id" id="teacher_id" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_teacher as $single_teacher) { ?>
                                            <option value="<?php echo $single_teacher->teacher_unique_id; ?>">
                                                <?php echo $single_teacher->name . " - ID: " . $single_teacher->teacher_unique_id; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">
                                        Submit <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
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
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Group</th>
                                <th style="text-align: center;">Section</th>
                                <th style="text-align: center;">Year</th>
                                <th style="text-align: center;">Subject</th>
                                <th style="text-align: center;">Teacher ID</th>
                                <th style="text-align: center;">Teacher Name</th>
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
                                    <td style="text-align: center;"><?php echo "Class - " . nfa($single_value->class_name); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->group_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->section_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->subject_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->teacher_unique_id; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->teacher_name; ?></td>
                                    <td style="text-align: center;">
                                        <!--                                        <a style="margin: 5px;" href="<?php echo base_url(); ?>Show_edit_form/teacher_subject_management/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info">Edit
                                        </a>-->
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Delete/teacher_subject_management/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-danger">Delete
                                        </a>
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

<script type="text/javascript">
    $("#class_name").on("change", function () {
        var input_data = $('#class_name').val();
        console.log(input_data);
        if (input_data == '9' || input_data == '10') {
            $('#group_div').css('display', 'block');
            $('#section_name').val('');
            $('#section_div').hide();
        } else {
            $('#group_name').val('');
            $('#group_div').hide();
            $('#section_div').css('display', 'block');
        }
    });
</script>
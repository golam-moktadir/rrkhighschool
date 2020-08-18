<?php
if (!isset($msg)) {
    $msg = "";
}
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
                    <?php echo form_open_multipart('aaa/aaa'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Send Marks Report</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <<?php foreach ($all_class as $single_class) { ?>
                                            <option value="<?php echo $single_class->class_name; ?>">
                                                <?php echo 'Class - ' . nfa($single_class->class_name); ?>
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
                                            data-container="body">
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
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_section as $single_section) { ?>
                                            <option value="<?php echo $single_section->section_name; ?>">
                                                <?php echo $single_section->section_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div id="show_info2">
                                    <div class="form-group col-sm-2 col-xs-12">
                                        <label for="exam_name">Select Exam</label>
                                        <select name="exam_name" id="exam_name" class="form-control selectpicker"
                                                data-container="body">
                                            <option value="">-- Select --</option>
                                            <?php foreach ($all_exam_type as $exam_type) { ?>
                                                <option value="<?php echo $exam_type->exam_type; ?>">
                                                    <?php echo $exam_type->exam_type; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer col-sm-4 clearfix ">

                                    <button style="margin-top: 27px" type="button" class="pull-left btn btn-success"
                                            id="search_student_marks">View List &nbsp;<i class="fa fa-search"></i>
                                    </button>
                                    <button style="margin-left: 10px; margin-top: 27px" type="button" class="pull-left btn btn-success"
                                            id="send_sms">Send SMS &nbsp;<i class="fa fa-search"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Marks/SMS Report</h3>
                    </div>
                    <div id="show_info">

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
        var post_data = {
            'class_name': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_exam_info",
            data: post_data,
            success: function (data) {
                $('#show_info2').html(data);
                $('#exam_name').selectpicker('refresh');
            }
        });
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
    $("#search_student_marks").on("click", function () {
        var input_class = $('#class_name').val();
        var input_shift = $('#shift_name').val();
        var input_group = $('#group_name').val();
        var input_section = $('#section_name').val();
        var input_exam = $('#exam_name').val();

        var post_data = {
            'class': input_class,
            'shift': input_shift,
            'group': input_group,
            'section': input_section,
            'exam': input_exam,

            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_student_marks_with_guardians",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
    $("#send_sms").on("click", function () {
        $('#show_info').html("");
        var input_class = $('#class_name').val()
        var input_shift = $('#shift_name').val();
        var input_group = $('#group_name').val();
        var input_section = $('#section_name').val();
        var input_exam = $('#exam_name').val();

        var post_data = {
            'class': input_class,
            'shift': input_shift,
            'group': input_group,
            'section': input_section,
            'exam': input_exam,

            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/send_sms_to_guardians",
            data: post_data,
            success: function (data) {
                //alert(data)
                $('#show_info').html(data);
            }
        });
    });
</script>
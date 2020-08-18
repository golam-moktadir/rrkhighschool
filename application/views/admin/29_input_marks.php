<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Mark Given Successfully";
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
                <?php
                $attributes = array('id' => 'form');
                echo form_open_multipart('Insert/insert_grade', $attributes);
                ?>
                <div class="" style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Student's Mark Input</p>
                        <p style="font-size: 20px; color: #066;" id="msg"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="date">Date</label>
                                    <input type="text" class="form-control new_datepicker"
                                           name="date" id="date"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>
                                <div class="form-group col-sm-3 col-xs-12" style="display:none;">
                                    <label for="session_name">Select Year</label>
                                    <select name="session_name" id="session_name" class="form-control">
                                        <option value="<?php echo date('Y'); ?>">-- Select --</option>
                                        <?php foreach ($all_session as $single_session) { ?>
                                            <option value="<?php echo $single_session->session_name; ?>">
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="teacher">Teacher</label>
                                    <select name="teacher" id="teacher" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_teacher as $single_teacher) { ?>
                                            <option value="<?php echo $single_teacher->teacher_unique_id; ?>">
                                                <?php echo $single_teacher->teacher_unique_id . ", " . $single_teacher->name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div id="show_info"></div>
                                <div class="box-footer col-sm-3 clearfix">
                                    <button style="margin-top: 27px" type="button" class="pull-left btn btn-success"
                                            id="search_student">Search <i
                                                class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="show_info3"></div>

            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#teacher").on("change", function () {
        var input_data = $('#teacher').val();
        console.log(input_data);
        var post_data = {
            'teacher_id': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_teacher_sub_info",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
                $('#class_name').selectpicker('refresh');
                $('#shift_name').selectpicker('refresh');
                $('#group_name').selectpicker('refresh');
                $('#section_name').selectpicker('refresh');
                $('#exam_name').selectpicker('refresh');
                $('#subject').selectpicker('refresh');
            }
        });
    });
   
    $("#search_student").on("click", function () {
        var teacher_id = $('#teacher').val();
        var input_session = $('#session_name').val();
        var input_shift = $('#shift_name').val();
        var input_group = $('#group_name').val();
        var input_section = $('#section_name').val();
        var input_exam = $('#exam_name').val();
        var input_class = $('#class_name').val();
        var input_class = $('#class_name').val();
        var input_subject = $('#subject').val();
        var subject_total_mark = $('#subject_total_mark').val();

        var post_data = {
            'teacher_id': teacher_id,
            'session_name': input_session,
            'class': input_class,
            'shift': input_shift,
            'group': input_group,
            'section': input_section,
            'exam': input_exam,
            'subject': input_subject,
            'subject_total_mark': subject_total_mark,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_student_for_marks",
            data: post_data,
            success: function (data) {
                $('#show_info3').html(data);
            }
        });
    });


</script>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print1">
                    <form id="student_list_form">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_class as $single_class) { ?>
                                            <option value="<?php echo $single_class->class_name; ?>">
                                                <?php echo "Class - " . nfa($single_class->class_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
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
                                <div class="form-group col-sm-3 col-xs-12" id="group_div" style="display: none">
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
                                <div class="form-group col-sm-3 col-xs-12" id="section_div">
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
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="session_name">Select Year</label>
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
                                <div class="box-footer col-sm-3 clearfix">
                                    <button id="student_list_btn" type="button" class="pull-left btn btn-success">Show
                                        <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                </div>
                <div class="box-body table-responsive" id="show_info"
                     style="width: 98%; color: black; overflow: scroll;"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $("#search_student").on("change paste keyup", function () {
            var input_data = $('#search_student').val();
            var post_data = {
                'student_id': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_info",
                data: post_data,
                success: function (data) {
                    $('#show_info').html(data);
                }
            });
        });

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

        $("#student_list_btn").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_list_category",
                data: $('#student_list_form').serialize(),
                success: function (data) {
                    $('#show_info').html(data);
                }
            });
        });
    };
</script>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <form id="routine_form">
                        <div class="box-body">
                            <p style="font-size: 20px;">Edit Class Routine</p>
                            <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control">
                                        <option value="<?php echo $class_name; ?>">
                                            <?php echo "Class - " . $class_name; ?>
                                        </option>
                                        <?php foreach ($all_class as $single_class) {
                                            if ($single_class->class_name == $class_name) {
                                                continue;
                                            } ?>
                                            <option value="<?php echo $single_class->class_name; ?>">
                                                <?php echo "Class - " . $single_class->class_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="shift_name">Select Shift</label>
                                    <select name="shift_name" id="shift_name" class="form-control">
                                        <option value="<?php echo $shift_name; ?>">
                                            <?php echo $shift_name; ?>
                                        </option>
                                        <?php foreach ($all_shift as $single_shift) {
                                            if ($single_shift->shift_name == $shift_name) {
                                                continue;
                                            } ?>
                                            <option value="<?php echo $single_shift->shift_name; ?>">
                                                <?php echo $single_shift->shift_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12" id="group_div"
                                    <?php if ($class_name != 9 && $class_name != 10) {
                                        echo "style = 'display:none;'";
                                    } ?>>
                                    <label for="group_name">Select Group</label>
                                    <select name="group_name" id="group_name" class="form-control">
                                        <option value="<?php echo $group_name; ?>">
                                            <?php echo $group_name; ?>
                                        </option>
                                        <?php foreach ($all_group as $single_group) {
                                            if ($single_group->group_name == $group_name) {
                                                continue;
                                            } ?>
                                            <option value="<?php echo $single_group->group_name; ?>">
                                                <?php echo $single_group->group_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12" id="section_div"
                                    <?php if ($class_name == 9 || $class_name == 10) {
                                        echo "style = 'display:none;'";
                                    } ?>>
                                    <label for="section_name">Select Section</label>
                                    <select name="section_name" id="section_name" class="form-control">
                                        <option value="<?php echo $section_name; ?>">
                                            <?php echo $section_name; ?>
                                        </option>
                                        <?php foreach ($all_section as $single_section) {
                                            if ($single_section->section_name == $section_name) {
                                                continue;
                                            } ?>
                                            <option value="<?php echo $single_section->section_name; ?>">
                                                <?php echo $single_section->section_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                    <label for="session_name">Select Year</label>
                                    <select name="session_name" id="session_name" class="form-control">
                                        <option value="<?php echo $session_name; ?>">
                                            <?php echo $session_name; ?>
                                        </option>
                                        <?php foreach ($all_session as $single_session) {
                                            if ($single_session->session_name == $session_name) {
                                                continue;
                                            } ?>
                                            <option value="<?php echo $single_session->session_name; ?>">
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <button id="routine_btn" type="button" class="pull-left btn btn-success">Show Info.<i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="box box-info">
                    <div class="box-body table-responsive" id="show_routine"
                         style="width: 98%; overflow: scroll; color: black;">

                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $("#routine_btn").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_routine_info",
                data: $('#routine_form').serialize(),
                success: function (data) {
                    $('#show_routine').html(data);
                }
            });
        });
    };
    $("#class_name").on("change paste keyup", function () {
        var input_data = $('#class_name').val();
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
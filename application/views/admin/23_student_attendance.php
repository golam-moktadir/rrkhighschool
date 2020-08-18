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
                <?php
                echo form_open_multipart('Insert/insert_attendance');
                ?>
                <div class="" style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Student Attendance</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
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
                                <div class="form-group col-sm-2 col-xs-12" style="display: none">
                                    <label for="version_name">Select Version</label>
                                    <select name="version_name" id="version_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_version as $single_version) { ?>
                                            <option value="<?php echo $single_version->version_name; ?>">
                                                <?php echo $single_version->version_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control"
                                           value="<?php echo date("Y-m-d"); ?>" readonly>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="intime">In Time</label>
                                    <input type="time" name="intime" id="intime" value="08:30"
                                           class="form-control"
                                           data-container="body">
                                </div>

                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 27px" type="button" id="search_student"
                                            class="pull-left btn btn-success">Search <i
                                                class="fa fa-search"></i></button>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="show_class_time"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Attendance Sheet</h3>
                    </div>
                    <div id="show_info">
                        <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Student ID</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Roll</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Day of the Week</th>
                                    <th style="text-align: center;">In Time</th>
                                    <th style="text-align: center;">Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
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
            $('#section_div').hide();
        } else {
            $('#group_div').hide();
            $('#section_div').css('display', 'block');
        }
    });

    window.onload = function () {
        $("#search_student").on("click", function () {
            var input_class = $('#class_name').val();
            var input_group = $('#group_name').val();
            var input_section = $('#section_name').val();
            var input_shift = $('#shift_name').val();
            var input_version = $('#version_name').val();
            var input_date = $('#date').val();
            var input_intime = $('#intime').val();
            var post_data = {
                'class_name': input_class,
                'group_name': input_group,
                'section_name': input_section,
                'shift_name': input_shift,
                'version_name': input_version,
                'date': input_date,
                'intime': input_intime,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_for_attendance",
                data: post_data,
                success: function (data) {
                    $('#show_info').html(data);
                }
            });
        });
    };
</script>

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
                <div class="" style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Attendance Report</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="report">Report For</label>
                                    <select name="report" id="report" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="date_from">Date From</label>
                                    <input type="text" class="form-control new_datepicker"
                                           name="date_from" id="date_from"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="date_to">Date To</label>
                                    <input type="text" class="form-control new_datepicker"
                                           name="date_to" id="date_to"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>

                                <div id="student_report_div" style="display: none">
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
                                    <div class="form-group col-sm-3 col-xs-12" style="display: none">
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
                                </div>
                                <div class="box-footer  col-sm-3 clearfix">
                                    <button style="margin-top: 27px" type="button" class="pull-left btn btn-success"
                                            id="search_report">Search &nbsp <i
                                                class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>


                    <div class="box box-info">
                        <p style="padding: 10px;">
                            <button id="print_button" title="Click to Print" type="button"
                                    onClick="window.print()" class="btn btn-flat btn-warning">Print
                            </button>
                        </p>
                        <div class="box-header" style="color: black; text-align: center;">
                            <h3><img src="<?php echo base_url(); ?>assets/img/logo.png"
                                 alt="Logo" width="70px" height="70px" style="border-radius: 15px;" class="m-t-22"></h3>
                        </div>
                        <h3 class="box-title" style="color: black; text-align: center; padding-bottom: 20px;"><u>Attendance
                                Report</u></h3>
                        <div id="attendance_report"></div>
                    </div>
            </section>
        </div>
    </section>
</aside>

<script>

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
    $('#report').on('change', function () {
        var report = $('#report').val();
        if (report == 'student') {
            $('#student_report_div').show();
        } else {
            $('#student_report_div').hide();
        }
    });

    $("#search_report").on("click", function () {
        var report = $('#report').val();
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        if (report == 'student') {
            var class_name = $('#class_name').val();
            var group_name = $('#group_name').val();
            var section_name = $('#section_name').val();
            var shift_name = $('#shift_name').val();
            var version_name = $('#version_name').val();
            var post_data = {
                'report': report,
                'class_name': class_name,
                'group_name': group_name,
                'section_name': section_name,
                'shift_name': shift_name,
                'version_name': version_name,
                'date_from': date_from,
                'date_to': date_to,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            console.log(post_data);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_attendance_report",
                data: post_data,
                success: function (data) {
                    $('#attendance_report').html(data);
                }
            });
        } else {
            var post_data = {
                'report': report,
                'date_from': date_from,
                'date_to': date_to,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            console.log(post_data);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_employee_attendance_report",
                data: post_data,
                success: function (data) {
                    $('#attendance_report').html(data);
                }
            });
        }

    });
</script>

<style>
    @media print {
        a[href]:after {
            content: none !important;
        }

        #print_button {
            display: none;
        }

        #no_print1 {
            display: none;
        }

        #no_print2 {
            display: none;
        }
    }

    /*    @page {
            size: auto;    auto is the initial value 
            margin: 0;   this affects the margin in the printer settings 
        }*/
</style>
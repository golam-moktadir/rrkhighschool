<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print1">
                    <form id="specific_admit_card_form">
                        <div class="box-body">
                            <p style="font-size: 20px;">Search Specific Admit Card</p>
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="student_id">Select Student</label>
                                    <select name="student_id" id="student_id" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_student as $single_student) { ?>
                                            <option value="<?php echo $single_student->student_unique_id; ?>">
                                                <?php echo $single_student->student_unique_id; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="exam_type">Select Exam Type</label>
                                    <select name="exam_type" id="exam_type" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_exam_type as $single_exam_type) { ?>
                                            <option value="<?php echo $single_exam_type->exam_type; ?>">
                                                <?php echo $single_exam_type->exam_type; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="exam_date2">Exam Date</label>
                                    <input type="text" class="form-control new_datepicker" id="exam_date2"
                                           placeholder="Select Date" name="exam_date2" autocomplete="off">
                                </div>
                                <div class="box-footer col-sm-3 clearfix" style="margin-top: 27px">
                                    <button id="specific_admit_card_btn" type="button"
                                            class="pull-left btn btn-success">Show <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="" style="color: black;" id="no_print2">
                    <form id="admit_card_form">
                        <div class="box-body">
                            <p style="font-size: 20px;">Search for Admit Card</p>
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
                                            <option value="<?php echo $single_session->session_name; ?>"
                                                <?php if ($single_session->session_name == date('Y')) {
                                                    echo 'selected';
                                                } ?>>
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="exam_type">Select Exam Type</label>
                                    <select name="exam_type" id="exam_type" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_exam_type as $single_exam_type) { ?>
                                            <option value="<?php echo $single_exam_type->exam_type; ?>">
                                                <?php echo $single_exam_type->exam_type; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="exam_date">Exam Date</label>
                                    <input type="text" class="form-control new_datepicker" id="exam_date"
                                           placeholder="Select Date" name="exam_date" autocomplete="off">
                                </div>
                                <div class="box-footer col-sm-3 clearfix" style="margin-top: 27px">
                                    <button id="admit_card_btn" type="button" class="pull-left btn btn-success">Show <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="show_admit_card"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $("#admit_card_btn").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_all_admit_card",
                data: $('#admit_card_form').serialize(),
                success: function (data) {
                    $('#show_admit_card').html(data);
                }
            });
        });
        $("#specific_admit_card_btn").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_specific_admit_card",
                data: $('#specific_admit_card_form').serialize(),
                success: function (data) {
                    $('#show_admit_card').html(data);
                }
            });
        });
    };

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

<style>
    @media print {
        @page{
           size : A4 landscape;
            scale : 100;
            margin:0px;
            padding:0px;
        }
         body{
            margin:20mm 0mm 0mm 70mm;
            width:210mm;
        }
         .page-break { page-break-inside:avoid; page-break-after:always }
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

        #no_print3 {
            display: none;
        }

        #no_print4 {
            display: none;
        }

        #no_print5 {
            display: none;
        }

        #no_print6 {
            display: none;
        }

        #no_print7 {
            display: none;
        }

        #no_print8 {
            display: none;
        }
    }

    /*    @page {
            size: auto;    auto is the initial value
            margin: 0;   this affects the margin in the printer settings
        }*/
</style>
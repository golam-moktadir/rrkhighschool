<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="cr_div">
                    <?php echo form_open_multipart(''); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Update Report</p>
                        <div class="container-fluid">
                            <div class="row">
<!--                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date_from">Date From</label>
                                    <input type="text" class="form-control new_datepicker"
                                           name="date_from" id="date_from"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date_to">Date To</label>
                                    <input type="text" class="form-control new_datepicker"
                                           name="date_to" id="date_to"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>-->
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
                                <div class="form-group col-sm-2 col-xs-12" id="studentwise">
                                    <label for="student_id">Select Student ID</label>
                                    <select name="student_id" id="student_id" class="form-control selectpicker"
                                            data-live-search="true" data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_student as $single_student) { ?>
                                            <option value="<?php echo $single_student->student_unique_id; ?>">
                                                <?php echo $single_student->student_unique_id; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="studentwise">
                                    <label for="staff">Collected By</label>
                                    <select name="staff" id="staff" class="form-control selectpicker"
                                            data-live-search="true" data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_collection_staff as $single_staff) { ?>
                                            <option value="<?php echo $single_staff->staff_unique_id; ?>">
                                                <?php echo "$single_staff->staff_unique_id [$single_staff->name]"; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 27px" type="button" class="pull-left btn btn-success"
                                            id="get_collection">Search &nbsp <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div>

                    <div id="show_info_datewise" style="display:none"></div>
                    <div id="show_info_studentwise" style="display:none">

                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    // $("#report_type").on("change", function () {
    //     if ($("#report_type").val() == 1) {
    //         $("#datewise").show();
    //         $("#studentwise").show();
    //         $("#show_info_studentwise").show();
    //         $("#show_info_datewise").hide();
    //     } else {
    //         $("#datewise").show();
    //         $("#studentwise").hide();
    //         $("#show_info_studentwise").hide();
    //         $("#show_info_datewise").show();
    //     }
    // });
    //$("#date").on("change", function () {
    //    var post_data = {
    //        'date': $("#date").val(),
    //        'report_type': $("#report_type").val()
    //    };
    //    $.ajax({
    //        type: "POST",
    //        url: "<?php //echo base_url();       ?>//Get_ajax_value/get_collection_report",
    //        data: post_data,
    //        success: function (data) {
    //            $('#show_info_datewise').html(data);
    //        }
    //    });
    //});
    $("#get_collection").on("click", function () {
        // alert("hello");

        var post_data = {
//            'date_from': $("#date_from").val(),
//            'date_to': $("#date_to").val(),
            'student_id': $("#student_id").val(),
            'staff': $("#staff").val(),
            'class': $("#class_name").val()
        };
        console.log(post_data);


        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_update_collection_report",
            data: post_data,
            success: function (data) {
                //alert(data);
                $("#show_info_studentwise").show();
                $("#show_info_studentwise").html(data);
            }
        });
    });

</script>
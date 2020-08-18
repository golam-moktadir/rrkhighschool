<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="cr_div">
                    <?php echo form_open_multipart(''); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Hostel Rent Collection Report</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12" id="datewise">
                                    <label for="exam_name">Select Date</label>
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>

                                <div class="form-group col-sm-4 col-xs-12" id="studentwise">
                                    <label for="class_name">Select Student ID</label>
                                    <select name="student_id" id="student_id" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_student as $single_student) { ?>
                                            <option value="<?php echo $single_student->student_unique_id; ?>">
                                                <?php echo $single_student->student_unique_id; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success"
                                id="get_collection">Search &nbsp; <i class="fa fa-search"></i></button>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header" id="cr_title">
                        <h3 class="box-title" style="color: black;">Hostel Rent Collection Report</h3>
                    </div>
                    <div id="show_info_datewise" style="display:none">
                        <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="show_info_studentwise" style="display:none">

                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    $("#get_collection").on("click", function () {
        // alert("hello");

        var post_data = {
            'date': $("#date").val(),
            'student_id': $("#student_id").val()
        };
        console.log(post_data);


        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_dorm_rent_collection_report",
            data: post_data,
            success: function (data) {
                //alert(data);
                $("#show_info_studentwise").show()
                $("#show_info_studentwise").html(data);
            }
        });
    });

</script>
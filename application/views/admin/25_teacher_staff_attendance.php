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
                <?php echo form_open_multipart('Insert/insert_attendance_ts'); ?>
                <div class="" style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Teacher & Staff Attendance</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="e_type">Employee Type</label>
                                    <select name="e_type" id="e_type" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control"
                                           value="<?php echo date("Y-m-d"); ?>" readonly>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="intime">In Time</label>
                                    <input type="time" name="intime" value="08:30" id="intime" class="form-control">
                                </div>
                                <div class="box-footer col-sm-3 clearfix">
                                    <button style="margin-top: 27px" type="button" class="pull-left btn btn-success" id="search_employee">Search &nbsp <i
                                                class="fa fa-search"></i></button>
                                </div>
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
                                    <th style="text-align: center;">Employee ID</th>
                                    <th style="text-align: center;">Name</th>
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

<script>
    $('#e_type').on('change', function () {
        var e_type = $('#e_type').val();
        var post_data = {
            'e_type': e_type,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_employee_id",
            data: post_data,
            success: function (data) {
                $('#e_id_div').html(data);
            }
        });
    });

    $("#search_employee").on("click", function () {
        var input_e_type = $('#e_type').val();
        var input_date = $('#date').val();
        var input_intime = $('#intime').val();
        var post_data = {
            'e_type': input_e_type,
            'date': input_date,
            'intime': input_intime,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_employee_for_attendance",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
</script>


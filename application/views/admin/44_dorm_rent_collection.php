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
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/dorm_rent_collection'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Hostel Fee Collection</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control"
                                           value="<?php echo date("Y-m-d"); ?>" readonly>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="student_id">Select Student</label>
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
                                <div class="box-footer clearfix form-group col-sm-4 col-xs-12">
                                    <button type="button" style="margin: 13px;" class="pull-left btn btn-success"
                                            id="search_student">Search &nbsp <i
                                                class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>

                <div id="show_info"></div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Hostel Fee Collection Info</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Student ID</th>
                                <th style="text-align: center;">Hostel</th>
                                <th style="text-align: center;">Particular</th>
                                <th style="text-align: center;">Amount</th>
                                <th style="text-align: center;">Invoice</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->student_id; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->dormitory_name; ?></td>
                                    <td style="text-align: center;"><?php echo preg_replace('%,%', ' ', $single_value->month); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->amount; ?></td>
                                    <td style="text-align: center;">
                                        <a target="_tab" style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_form/get_dorm_rent_invoice/<?php echo $single_value->record_id; ?>">Print
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $("#search_student").on("click", function () {
            var input_data = $('#student_id').val();
            var input_month = $('#date').val();
            var post_data = {
                'student_id': input_data,
                'month': input_month,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_info_3",
                data: post_data,
                success: function (data) {
                    $('#show_info').html(data);
                }
            });
        });
    };
</script>


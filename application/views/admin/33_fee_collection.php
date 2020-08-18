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
                <div class="" style="color: black;" id="no_print">
                    <?php echo form_open_multipart('Insert/fee_collection'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Fee Collection</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date">Year</label>
                                    <input type="text" name="date" id="date" class="form-control"
                                           value="<?php echo date("Y"); ?>">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="student_id">Select Student</label>
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
                                <div class="box-footer form-group col-sm-4 col-xs-12">
                                    <button type="button" style="margin-top: 26px;" class="pull-left btn btn-success"
                                            id="search_student">Search &nbsp <i
                                                class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>

                <div id="show_info"></div>
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
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_info_2",
                data: post_data,
                success: function (data) {
                    $('#show_info').html(data);
                    $('#fees_head').selectpicker('refresh');
                }
            });
        });
    };
</script>
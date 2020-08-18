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
                    <?php echo form_open_multipart('Insert/pf_loan_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Loan Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="date">Select Date</label>
                                <input type="date" class="form-control" id="date" placeholder="" name="date">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="teacher_staff">Teacher/Staff Info.</label>
                                <select name="teacher_staff" id="teacher_staff" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_teacher_staff as $single_teacher_staff) { ?>
                                        <option value="<?php echo $single_teacher_staff->teacher_staff_id . "#" . $single_teacher_staff->teacher_staff_name; ?>">
                                            <?php echo $single_teacher_staff->teacher_staff_id . ", " . $single_teacher_staff->teacher_staff_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="balance">Balance (Up to Date)</label>
                                <input type="text" class="form-control" id="balance" placeholder="" name="balance" readonly>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="loan_amount">Loan Amount</label>
                                <input type="text" class="form-control" id="loan_amount" placeholder="" name="loan_amount">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="loan_payable">Loan Payable</label>
                                <input type="text" class="form-control" id="loan_payable" placeholder="" name="loan_payable">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="due_amount">Due Amount</label>
                                <input type="text" class="form-control" id="due_amount" placeholder="" name="due_amount" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>                              
                    </div>
                    <p style="font-size: 22px; text-align: center;">Name of the Bank - Uttara Bank Limited</p>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Teacher/Staff ID</th>
                                    <th style="text-align: center;">Teacher/Staff Name</th>
                                    <th style="text-align: center;">Loan Amount</th>
                                    <th style="text-align: center;">Loan Payable</th>
                                    <th style="text-align: center;">Due Amount</th>
                                    <th style="text-align: center;">Action</th>
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
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->teacher_staff_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->teacher_staff_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->loan_amount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->loan_payable; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->due_amount; ?></td>
                                        <td style="text-align: center;">
                                            <!--                                            <a style="margin: 5px;" class="btn btn-info"
                                                                                           href="<?php echo base_url(); ?>Show_edit_form/pf_create_info/<?php echo $single_value->record_id; ?>/main">Edit
                                                                                        </a>-->
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/pf_loan_info/<?php echo $single_value->record_id; ?>">Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#teacher_staff").on("change paste keyup", function () {
        var input_data = $('#teacher_staff').val();
        var post_data = {
            'teacher_staff': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_balance",
            data: post_data,
            dataType: 'JSON',
            success: function (data) {
                $('#balance').val(data[0]);
                $('#loan_amount').val(data[1]);
            }
        });
    });

    $("#loan_amount, #loan_payable").on("change paste keyup", function () {
        var loan_amount = $('#loan_amount').val();
        var loan_payable = $('#loan_payable').val();
        var due_amount = parseFloat(loan_amount) - parseFloat(loan_payable);
        $('#due_amount').val(due_amount);
    });
</script>
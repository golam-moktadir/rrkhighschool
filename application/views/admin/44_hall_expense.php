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
                    <?php echo form_open_multipart('Insert/insert_hall_expense'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Hostel Expense</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="expense_head_name">Expense Head</label>
                                    <select name="expense_head_name" id="expense_head_name" class="form-control">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_expense as $single_expense_head) { ?>
                                            <option value="<?php echo $single_expense_head->expense_head; ?>">
                                                <?php echo $single_expense_head->expense_head; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="voucher_no">Voucher No.</label>
                                    <input type="text" name="voucher_no" id="voucher_no" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit &nbsp <i
                                    class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Expense Head</th>
                                <th style="text-align: center;">Voucher No.</th>
                                <th style="text-align: center;">Quantity</th>
                                <th style="text-align: center;">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0;
                            $count = 0;
                            foreach ($all_value as $single_value) {
                                $total = $total + $single_value->amount;
                                $count++; ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->expense_head; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->voucher_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->quantity; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->amount; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: right">Total</td>
                                <td style="text-align: center;"><?php echo $total; ?></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>


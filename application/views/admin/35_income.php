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
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Insert/insert_income'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Income</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="income_head_name">Income Head</label>
                                    <select name="income_head_name" id="income_head_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_income as $single_income_head) { ?>
                                            <option value="<?php echo $single_income_head->income_head; ?>">
                                                <?php echo $single_income_head->income_head; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date">Date</label>
                                    <input type="text" name="date" id="date"
                                           class="form-control new_datepicker"
                                           autocomplete="off" placeholder="Select Date">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="voucher_no">Voucher No.</label>
                                    <input type="text" name="voucher_no" id="voucher_no" value="0" class="form-control">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" id="quantity" value="1" class="form-control">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="amount"> Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control">
                                </div>
                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Submit &nbsp <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
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
                            <th style="text-align: center;">Income Head</th>
                            <th style="text-align: center;">Invoice No.</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $count = 0;
                        foreach ($all_value as $single_value) {
                            $total = $total + $single_value->amount;
                            $count++;
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->income_head; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->voucher_no; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->quantity; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->amount; ?></td>
                                <td style="text-align: center;">
                                    <a style="margin: 5px;" class="btn btn-danger"
                                       href="<?php echo base_url(); ?>Delete/income/<?php echo $single_value->record_id; ?>">Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: right">Total</td>
                            <td style="text-align: center;"><?php echo $total; ?></td>
                            <td style="text-align: center;"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>
</section>
</aside>

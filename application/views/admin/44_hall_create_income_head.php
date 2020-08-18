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
                    <?php echo form_open_multipart('Insert/hall_create_income_head'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Hostel Income Head</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="income_head_name">Income Head</label>
                                    <input type="text" name="income_head_name" id="income_head_name" class="form-control">
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
                        <th style="text-align: center;">Income Head</th>
                        <th style="text-align: center;">Amount</th>
                        <th style="text-align: center;">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=0; foreach($all_value as $single_value){ $count++; ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $count;?></td>
                            <td style="text-align: center;"><?php echo $single_value->fee_head;?></td>
                            <td style="text-align: center;"><?php echo $single_value->amount;?></td>
                            <td style="text-align: center;">
                                <a style="margin: 5px;" class="btn btn-danger"
                                   href="<?php echo base_url(); ?>Delete/hall_income_head/<?php echo $single_value->record_id; ?>">Delete
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </div>
    </section>
</aside>

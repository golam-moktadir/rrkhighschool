<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $date = date('d-m-Y', strtotime($one_info->create_date));
    $title = $one_info->title;
    $body = $one_info->body;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_sms/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit SMS</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date">Date</label>
                                <input type="text" name="date" id="date"
                                       class="form-control new_datepicker"
                                       autocomplete="off" placeholder="Select Date"
                                       value="<?php echo $date; ?>">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="title">Message Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       value="<?php echo $title; ?>">
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="body">Message Body</label>
                                <textarea rows="8" name="body" id="body"
                                          class="form-control"><?php echo $body; ?></textarea>
                            </div>
                            <div class="box-footer col-sm-4 clearfix">
                                <button type="submit" class="pull-left btn btn-success">Edit &nbsp; <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                        <br>
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
                        <th style="text-align: center;">Create Date</th>
                        <th style="text-align: center;">Message Title</th>
                        <th style="text-align: center;">Message Body</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = 0;
                    foreach ($all_value as $single_value) {
                        $count++; ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $count; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->create_date; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->title; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->body; ?></td>
                            <td style="text-align: center;">
                                <a style="margin: 5px;" class="btn btn-info"
                                   href="<?php echo base_url(); ?>Show_edit_form/sms/<?php echo $single_value->record_id; ?>/main">Edit
                                </a>
                                <a style="margin: 5px;" class="btn btn-danger"
                                   href="<?php echo base_url(); ?>Delete/sms/<?php echo $single_value->record_id; ?>">Delete
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

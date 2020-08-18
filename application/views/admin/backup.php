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
} elseif ($msg == "sent") {
    $msg = "<p style='font-size: 16px; color: #066;'>তথ্যভান্ডার সফলভাবে সংরক্ষণ করা হয়েছে</p>";
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <div class="box-body" align="center">
                        <p style="font-size: 26px;">Back-up:</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <?php echo form_open_multipart('Insert/backup_db'); ?>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12 col-sm-offset-3" style="font-size: 20px;">
                                Send your Data to you Mail Address
                            </div>
                            <div class="box-footer col-sm-4 clearfix">
                                <button type="submit" style="margin-top: -10px;" class="pull-left btn btn-success">
                                    Send <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>
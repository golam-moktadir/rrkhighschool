<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $group_name = $one_info->group_name;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_group/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Group</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="col-sm-4 col-xs-8 form-group">
                                <label for="group_name">Group Name</label><small class="req">*</small>
                                <input type="text" class="form-control" id="group_name" required placeholder="Group Name" value="<?php echo $group_name; ?>" name="group_name">
                            </div>
                            <div class="box-footer col-xs-4 clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Edit <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Group Name</th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++; ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->group_name; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/create_group/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/create_group/<?php echo $single_value->record_id; ?>">Delete
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
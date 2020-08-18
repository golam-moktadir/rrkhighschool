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
                    <?php echo form_open_multipart('Insert/booklist'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Booklist</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="group_name">Select Group</label>
                                <select name="group_name" id="group_name" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_group as $single_group) { ?>
                                        <option value="<?php echo $single_group->group_name; ?>">
                                            <?php echo $single_group->group_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="book_name">Book Name</label>
                                <input type="text" class="form-control" id="book_name" placeholder="" name="book_name">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="author_name">Author Name</label>
                                <input type="text" class="form-control" id="author_name" placeholder=""
                                       name="author_name">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="edition">Edition</label>
                                <input type="text" class="form-control" id="edition" placeholder="" name="edition">
                            </div>
                            <div class="box-footer col-xs-2 clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Submit
                                    <i class="fa fa-arrow-circle-right"></i></button>
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
                                <th style="text-align: center;">Group</th>
                                <th style="text-align: center;">Book Name</th>
                                <th style="text-align: center;">Author Name</th>
                                <th style="text-align: center;">Edition</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->group_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->book_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->author_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->edition; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/booklist/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/booklist/<?php echo $single_value->record_id; ?>">Delete
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
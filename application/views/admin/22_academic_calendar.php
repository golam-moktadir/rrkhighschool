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
                    <?php echo form_open_multipart('Insert/academic_calendar'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Academic Calendar</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="" name="title">
                            </div>

                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="file_type">File Type</label>
                                <select name="file_type" id="file_type" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Image">Image</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="file">Upload File</label>
                                <input type="file" class="form-control" id="file" placeholder="" name="file">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="published_date">Published Date</label>
                                <input type="text" class="form-control new_datepicker" id="published_date"
                                       placeholder="Select Date" autocomplete="off"
                                       name="published_date">
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

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">File Type</th>
                                <th style="text-align: center;">File</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 18px;">
                            <?php
                            $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->title; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->file_type; ?></td>
                                    <td style="text-align: center;">
                                        <?php if ($single_value->file_type == "Image") { ?>
                                            <a href="<?php echo base_url(); ?>assets/img/academic_calendar/<?php echo $single_value->file_name; ?>"
                                               target="_blank">View This File</a>
                                        <?php } elseif ($single_value->file_type == "PDF") { ?>
                                            <a href="<?php echo base_url(); ?>assets/pdf/academic_calendar/<?php echo $single_value->file_name; ?>"
                                               target="_blank">View This File</a>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->published_date)); ?></td>
                                    <td style="text-align: center;">
                                        <!--                                        <a style="margin: 5px;" href="<?php echo base_url(); ?>Show_edit_form/academic_calendar/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info">Edit
                                        </a>-->
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Delete/academic_calendar/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-danger">Delete
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
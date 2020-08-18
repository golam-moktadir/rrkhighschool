<?php
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $name = $one_info->name;
    $designation = $one_info->designation;
    $details = $one_info->details;
    $position = $one_info->position;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/governing_body_profile/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">বর্তমান কার্যনির্বাহী পর্ষদ</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $this->session->flashdata("msg"); ?></p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="name">Name</label><small class="req">*</small>
                                <input type="text" class="form-control" id="name"
                                       value="<?php echo $name; ?>" placeholder="" required name="name">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="designation">Designation</label><small class="req">*</small>
                                <input type="text" class="form-control" id="designation"
                                       value="<?php echo $designation; ?>" placeholder="" required name="designation">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="position">Position</label><small class="req">*</small>
                                <input type="text" value="<?php echo $position; ?>" class="form-control" id="position" required placeholder=""
                                        name="position">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" placeholder=""  name="image">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="details">Details</label><small class="req">*</small>
                                <textarea  class="form-control" id="details" required
                                          name="details"><?php echo $details; ?></textarea>
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
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Designation</th>
                                <th style="text-align: center;">Details</th>
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
                                    <td style="text-align: center;">
                                        <?php if (file_exists('./assets/img/governing_body_profile/' . $single_value->image)) { ?>
                                            <img src="<?php echo base_url(); ?>assets/img/governing_body_profile/<?php echo $single_value->image; ?>"
                                                 width="70" height="60">
                                        <?php } else {
                                            echo "No Image";
                                        } ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->details; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/governing_body_profile/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/governing_body_profile/<?php echo $single_value->record_id; ?>">Delete
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
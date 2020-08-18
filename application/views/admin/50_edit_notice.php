<?php
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $user_title = $one_info->user_title;
    if ($user_title == 1) {
        $user_name = "শিক্ষার্থী";
    } elseif ($user_title == 2) {
        $user_name = "শিক্ষক";
    } elseif ($user_title == 3) {
        $user_name = "শিক্ষক";
    } elseif ($user_title == 4) {
        $user_name = "কার্যনির্বাহী পর্যদ";
    }
    $date = $one_info->date;
    $particular = $one_info->particular;
    $details = $one_info->details;
}
?>
<section class="content">
    <div class="row" style="margin-top: 55px;">
        <section class="col-xs-12 connectedSortable">
            <div class="" style="color: black;">
                <?php echo form_open_multipart('Edit/notice/' . $record_id); ?>
                <div class="box-body">
                    <p style="font-size: 20px;">Edit Notice</p>
                    <p style="font-size: 20px; color: #066;"><?php echo $this->session->flashdata("msg"); ?></p>
                    <div class="row">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="user_title">Notice For</label><small class="req">*</small>
                            <select name="user_title" id="user_title" required class="form-control selectpicker"
                                    data-container="body">
                                <option value="<?php echo $user_title; ?>"><?php echo $user_name; ?></option>
                                <option value="1">শিক্ষার্থী</option>
                                <option value="2">শিক্ষক</option>
                                <option value="3">কর্মকর্তা-কর্মচারি</option>
                                <option value="4">কার্যনির্বাহী পর্যদ</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="date">Date</label><small class="req">*</small>
                            <input type="text" class="form-control new_datepicker" readonly required id="date"
                                    placeholder="Select Date" autocomplete="off"
                                    value="<?php echo $date; ?>" name="date">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="particular">Particular</label><small class="req">*</small>
                            <input type="text" class="form-control" id="particular" required
                                    value="<?php echo $particular; ?>" placeholder="" name="particular">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="details">Details</label><small class="req">*</small>
                            <textarea rows="6" class="form-control"  required id="details"
                                        name="details"><?php echo $details; ?></textarea>
                        </div>
                        <div class="box-footer col-xs-2 clearfix">
                            <button style="margin-top: 27px" class="pull-left btn btn-success">Edit <i
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
                            <th style="text-align: center;">Date</th>
                            <th style="text-align: center;">Notice For</th>
                            <th style="text-align: center;">Particular</th>
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
                                <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                <td style="text-align: center;">
                                    <?php
                                    $title_id = $single_value->user_title;
                                    if ($title_id == 1) {
                                        echo "শিক্ষার্থী";
                                    } elseif ($title_id == 2) {
                                        echo "শিক্ষক";
                                    } elseif ($title_id == 3) {
                                        echo "কর্মকর্তা-কর্মচারি";
                                    } elseif ($title_id == 4) {
                                        echo "কার্যনির্বাহী পর্যদ";
                                    }
                                    ?>
                                </td>

                                <td style="text-align: center;"><?php echo $single_value->particular; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->details; ?></td>
                                <td style="text-align: center;">
                                    <a style="margin: 5px;" class="btn btn-info"
                                        href="<?php echo base_url(); ?>Show_edit_form/notice/<?php echo $single_value->record_id; ?>">Edit
                                    </a>
                                    <a style="margin: 5px;" class="btn btn-danger"
                                        href="<?php echo base_url(); ?>Delete/notice/<?php echo $single_value->record_id; ?>">Delete
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
<script>

$('#date').datepicker({
    autoclose: true,
    format: "dd-mm-yyyy",
    immediateUpdates: true,
    todayBtn: true,
    todayHighlight: true
});
</script>
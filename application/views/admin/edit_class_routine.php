<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $class_name = $one_info->class_name;
    $published_date = $one_info->published_date;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/class_routine/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Class Routine</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="class_name">Select Class</label>
                                <select name="class_name" id="class_name" class="form-control selectpicker"
                                        data-container="body">
                                    <?php foreach ($all_class as $single_class) { ?>
                                        <option <?php if($class_name==$single_class->class_name) echo "selected" ?> value="<?php echo $single_class->class_name; ?>">
                                            <?php echo "Class - " . nfa($single_class->class_name); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="file">Upload PDF</label>
                                <input type="file" class="form-control" id="file" placeholder="" name="file">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="published_date">Published Date</label>
                                <input type="text" class="form-control new_datepicker" id="published_date"
                                       placeholder="Select Date" autocomplete="off"
                                       value="<?php echo $published_date; ?>" name="published_date">
                            </div>
                            <div class="box-footer col-xs-3 clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Edit
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
                                    <th style="text-align: center;">Class</th>
                                    <th style="text-align: center;">File</th>
                                    <th style="text-align: center;">Published Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 16px;">
                                <?php
                                $count = 0;
                                foreach ($all_value as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo "Class - " .nfa( $single_value->class_name); ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url(); ?>assets/pdf/class_routine/<?php echo $single_value->pdf; ?>" 
                                               target="_blank">View Exam Routine</a>
                                        </td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->published_date)); ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" href="<?php echo base_url(); ?>Show_edit_form/class_routine/<?php echo $single_value->record_id; ?>/main" 
                                               class="btn btn-info">Edit
                                            </a>
                                            <a style="margin: 5px;" href="<?php echo base_url(); ?>Delete/class_routine/<?php echo $single_value->record_id; ?>/main" 
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
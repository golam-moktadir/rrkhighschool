<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $min_num = $one_info->min_num;
    $max_num = $one_info->max_num;
    $letter_grade = $one_info->letter_grade;
    $grade_point = $one_info->grade_point;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_exam_grade/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Exam Grade</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="min_num">Min Number</label>
                                <input type="text" class="form-control" id="min_num"
                                       value="<?php echo $min_num; ?>" placeholder="" name="min_num">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="max_num">Max Number</label>
                                <input type="text" class="form-control" id="max_num"
                                       value="<?php echo $max_num; ?>" placeholder="" name="max_num">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="letter_grade">Letter Grade</label>
                                <input type="text" class="form-control" id="letter_grade"
                                       value="<?php echo $letter_grade; ?>" placeholder="" name="letter_grade">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="grade_point">Grade Point</label>
                                <input type="text" class="form-control" id="grade_point"
                                       value="<?php echo $grade_point; ?>" placeholder="" name="grade_point">
                            </div>
                            <div class="box-footer col-sm-2 clearfix">
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
                                <th style="text-align: center;">Min Number</th>
                                <th style="text-align: center;">Max Number</th>
                                <th style="text-align: center;">Letter Grade</th>
                                <th style="text-align: center;">Grade Point</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->min_num; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->max_num; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->letter_grade; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->grade_point; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/create_exam_grade/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/create_exam_grade/<?php echo $single_value->record_id; ?>">Delete
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
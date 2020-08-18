<?php if (!empty($all_value)) { ?>
    <?php echo form_open_multipart('Edit/update_attendance'); ?>
    <input type="hidden" class="form-control" name="report"
           id="report" value="<?php echo $e_type; ?>">
    <h4 style="padding: 0px 10px 10px 10px; text-align: center;"><?php echo $date_range; ?></h4>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;">No.</th>
                <th style="text-align: center;">Employee ID</th>
                <th style="text-align: center;">Designation</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Day of the Week</th>
                <th style="text-align: center;">In Time</th>
                <th style="text-align: center;">Out Time</th>
                <th style="text-align: center;">Status</th>
            </tr>
            </thead>
            <tbody>
            <tbody>
            <?php $count = 0;
            foreach ($all_value as $single_value) {
                $count++; ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->employee_id; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->employee_type; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                    <td style="text-align: center;"><?php echo date('d-m-Y', strtotime($single_value->date)); ?></td>
                    <td style="text-align: center;"><?php echo $single_value->day; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->intime; ?></td>
                    <td style="text-align: center;">
                        <input type="time" class="form-control" name="outtime<?php echo $count; ?>"
                               id="outtime<?php echo $count; ?>" value="<?php echo $single_value->outtime; ?>">
                    </td>
                    <input type="hidden" class="form-control" name="record<?php echo $count; ?>"
                           id="record<?php echo $count; ?>" value="<?php echo $single_value->record_id; ?>">
                    <td style="text-align: center;">
                        <select name="status<?php echo $count; ?>" id="status<?php echo $count; ?>"
                                class="form-control">
                            <option value="<?php echo $single_value->status; ?>">
                                <?php if ($single_value->status == '1') {
                                    echo "Present";
                                } elseif ($single_value->status == '2') {
                                    echo "Absent";
                                } elseif ($single_value->status == '3') {
                                    echo "Late";
                                } ?>
                            </option>
                            <option value="1">Present</option>
                            <option value="2">Absent</option>
                            <option value="3">Late</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="8" style="text-align: center;"></td>
                <input type="hidden" name="count"
                       id="<?php echo $count; ?>" value="<?php echo $count; ?>">
                <td style="text-align: center; float: right" id="no_print2">
                    <button type="submit" class="pull-left btn btn-success" id="give_attendance">Submit &nbsp <i
                                class="fa fa-arrow-circle-right"></i></button>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    </form>
<?php } ?>



<?php if(!empty($all_value)){?>
<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;">SL</th>
            <th style="text-align: center;">Class Day</th>
            <th style="text-align: center;">Class Time</th>
            <th style="text-align: center;">Subject Name</th>
            <th style="text-align: center;">Teacher Name</th>
            <th style="text-align: center;">Teacher ID</th>
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
                <td style="text-align: center;"><?php echo $single_value->class_day; ?></td>
                <td style="text-align: center;"><?php echo date('h:i A', strtotime($single_value->class_time)) ?></td>
                <td style="text-align: center;"><?php echo $single_value->subject_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->teacher_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->teacher_id; ?></td>
                <td style="text-align: center;">
                    <a style="margin: 5px;" class="btn btn-info"
                       href="<?php echo base_url(); ?>Show_edit_form/class_routine_info/<?php echo $single_value->record_id; ?>">Edit
                    </a>
                    <a style="margin: 5px;" class="btn btn-danger"
                       href="<?php echo base_url(); ?>Delete/class_routine_info/<?php echo $single_value->record_id; ?>">Delete
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php }?>
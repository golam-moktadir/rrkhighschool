<div class="form-group col-sm-4 col-xs-12">
    <label for="e_id">Employee ID</label>
    <select name="e_id" id="e_id" class="form-control selectpicker"
            data-live-search="true">
        <option value="">-- Select --</option>
        <?php foreach ($all_value as $single_value) {
            if ($e_type == 'teacher') { ?>
                <option value="<?php echo $single_value->teacher_unique_id; ?>">
                    <?php echo $single_value->teacher_unique_id.', '.$single_value->name; ?>
                </option>

            <?php } elseif ($e_type == 'staff') { ?>
                <option value="<?php echo $single_value->staff_unique_id; ?>">
                    <?php echo $single_value->staff_unique_id.', '.$single_value->name; ?>
                </option>
            <?php }
        } ?>
    </select>
</div>
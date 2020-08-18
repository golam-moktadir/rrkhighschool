<label for="version_name">Select Class Time<b style="color: red;">*</b></label>
<select name="version_name" id="version_name" class="form-control">
    <option value="">-- Select --</option>
    <?php foreach ($all_class_time as $single_class_time) { ?>
        <option value="<?php echo $single_class_time->class_time; ?>">
            <?php echo $single_class_time->class_time; ?>
        </option>
    <?php } ?>
</select>
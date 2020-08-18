<div class="form-group col-sm-4 col-xs-12">
    <label for="exam_name">Select Exam</label>
    <select name="exam_name" id="exam_name" class="form-control">
        <option value="">-- Select --</option>
        <?php foreach ($all_value as $single_value) { ?>
            <option value="<?php echo $single_value->exam_type; ?>">
                <?php echo $single_value->exam_type; ?>
            </option>
        <?php } ?>
    </select>
</div>
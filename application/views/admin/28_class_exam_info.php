<div class="form-group col-sm-3 col-xs-12 section_div">
    <label for="exam_id">Select Exam</label><small class="req"> *</small> 
    <select required name="exam_id" id="exam_id" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php if(isset($all_value)): ?>
        <?php foreach ($all_value as $value): ?>
            <option value="<?php echo $value['record_id']; ?>">
                <?php echo $value['exam_type']; ?>
            </option>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
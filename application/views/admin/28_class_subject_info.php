<div class="form-group col-sm-3 col-xs-12 section_div">
    <label for="subject_id">Select Subject</label><small class="req"> *</small> 
    <select required name="subject_id" id="subject_id" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php if(isset($all_subject)): ?>
        <?php foreach ($all_subject as $value): ?>
            <option value="<?php echo $value['subject_id']; ?>">
                <?php echo $value['subject_name']; ?>
            </option>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
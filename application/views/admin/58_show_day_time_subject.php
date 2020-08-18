<div class="form-group col-sm-3 col-xs-12">
    <label for="class_day">Select Class Day</label>
    <select name="class_day" id="class_day" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
    </select>
</div>
<div class="form-group col-sm-3 col-xs-12">
    <label for="class_time">Select Class time</label>
    <select name="class_time" id="class_time" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php foreach ($all_class_time as $single_class_time) { ?>
            <option value="<?php echo $single_class_time->class_time; ?>">
                <?php echo date('h:i A', strtotime($single_class_time->class_time)); ?>
            </option>
        <?php } ?>
    </select>
</div>
<div class="form-group col-sm-3 col-xs-12">
    <label for="subject_name">Select Subject</label>
    <select name="subject_name" id="subject_name" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php foreach ($all_subject as $single_subject) { ?>
            <option value="<?php echo $single_subject->subject_name; ?>">
                <?php echo $single_subject->subject_name; ?>
            </option>
        <?php } ?>
    </select>
</div>


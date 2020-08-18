<div class="form-group col-sm-3 col-xs-12">
    <label for="teacher_id">Select Teacher Name</label>
    <select name="teacher_id" id="teacher_id" class="form-control selecpicker">
        <option value="">-- Select --</option>
        <?php for ($i=1;$i<=$count_it;$i++) { ?>
            <option value="<?php echo ${"teacher_id".$i} ?>">
                <?php echo ${"teacher_name".$i}." - ID: ".${"teacher_id".$i};?>
            </option>
        <?php } ?>
    </select>
</div>


<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/class_routine_info/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Class Routine</p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="class_day">Select Class Day</label>
                                <select name="class_day" id="class_day" class="form-control selectpicker">
                                    <option value="Saturday" <?php if($class_day == 'Saturday'){echo 'selected';}?>>Saturday</option>
                                    <option value="Sunday" <?php if($class_day == 'Sunday'){echo 'selected';}?>>Sunday</option>
                                    <option value="Monday" <?php if($class_day == 'Monday'){echo 'selected';}?>>Monday</option>
                                    <option value="Tuesday" <?php if($class_day == 'Tuesday'){echo 'selected';}?>>Tuesday</option>
                                    <option value="Wednesday" <?php if($class_day == 'Wednesday'){echo 'selected';}?>>Wednesday</option>
                                    <option value="Thursday" <?php if($class_day == 'Thursday'){echo 'selected';}?>>Thursday</option>
                                    <option value="Friday" <?php if($class_day == 'Friday'){echo 'selected';}?>>Friday</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="class_time">Select Class time</label>
                                <select name="class_time" id="class_time" class="form-control selectpicker">
                                    <?php foreach ($all_class_time as $single_class_time) { ?>
                                        <option value="<?php echo $single_class_time->class_time; ?>"
                                            <?php if($class_time == $single_class_time->class_time){echo 'selected';}?>>
                                            <?php echo date('h:i A', strtotime($single_class_time->class_time)); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="subject_name">Select Subject</label>
                                <select name="subject_name" id="subject_name" class="form-control selectpicker">
                                    <?php foreach ($all_subject as $single_subject) { ?>
                                        <option value="<?php echo $single_subject->subject_name; ?>"
                                            <?php if($subject_name == $single_subject->subject_name){echo 'selected';}?>>
                                            <?php echo $single_subject->subject_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="teacher_id">Select Teacher</label>
                                <select name="teacher_id" id="teacher_id" class="form-control selectpicker">
                                    <?php for ($i=1; $i<=$count_it; $i++) { ?>
                                        <option value="<?php echo ${"single_teacher_id".$i} ?>"
                                            <?php if($teacher_id == ${"single_teacher_id".$i}){echo 'selected';}?>>
                                            <?php echo ${"single_teacher_name".$i}." - ID: ".${"single_teacher_id".$i};?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>
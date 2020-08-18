<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $class_name = $one_info->class_name;
    $class_time = $one_info->class_time;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_class_time/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Class Time</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="class_name">Select Class</label>
                                <select name="class_name" id="class_name" class="form-control selectpicker"
                                        data-container="body">
                                    <?php foreach ($all_class as $single_class) { ?>
                                        <option value="<?php echo $single_class->class_name; ?>"
                                            <?php if ($single_class->class_name == $class_name) {
                                                echo 'selected';
                                            } ?>>
                                            <?php echo "Class - " . nfa($single_class->class_name); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="class_time">Time</label>
                                <input type="time" value="<?php echo $class_time; ?>" class="form-control"
                                       id="class_time" name="class_time">
                            </div>
                            <div class="box-footer col-sm-4 clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Edit <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


            </section>
        </div>
    </section>
</aside>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_exam_type/' . $single->record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Exam Type</p>
                            <?php echo $this->session->flashdata('msg'); ?>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="session_id">Select Session</label><small class="req"> *</small> 
                                <select name="session_id" required data-live-search="true" id="session_id" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php if(isset($all_session)): ?>
                                        <?php foreach ($all_session as $value):?>
                                            <option <?php if($value->record_id==$single->session_id) echo "selected"; ?> value="<?php echo $value->record_id; ?>#<?php echo $value->session_name; ?>">
                                                <?php echo $value->session_name; ?>
                                            </option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="class_id">Select Class</label><small class="req"> *</small> 
                                <select name="class_id" required id="class_id" data-live-search="true" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php if(isset($all_class)): ?>
                                        <?php foreach ($all_class as $value):?>
                                            <option <?php if($value->record_id==$single->class_id) echo "selected"; ?> value="<?php echo $value->record_id; ?>>">
                                                <?php echo "Class - " . nfa($value->class_name); ?>
                                            </option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="exam_type">Exam Type</label>
                                <input type="text" required class="form-control" id="exam_type" value="<?php echo $single->exam_type; ?>" placeholder="" name="exam_type">
                                <input type="hidden" required class="form-control" id="id" value="<?php echo $single->record_id; ?>" placeholder="" name="id">
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
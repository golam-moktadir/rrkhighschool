<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-sm-12 connectedSortable">
                <div class="" style="color: black;">
                    <div class="box-body">
                        <?php echo $this->session->flashdata('msg');?>
                        <?php echo form_open('Edit/create_subject/'.$single['record_id']); ?>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="class_id">Class Name</label><small class="req"> *</small> 
                                    <select name="class_id" required id="class_id" class="form-control selectpicker"
                                            data-container="body">
                                            <option value="">--Select--</option>
                                            <?php if(isset($all_class)): ?>
                                                <?php foreach($all_class as $value): ?>
                                                    <option <?php if($value->record_id==$single['class_id']) echo "selected"; ?> value="<?php echo $value->record_id; ?>"><?php echo "Class-".nfa($value->class_name); ?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="subject_name">Subject Name</label><small class="req"> *</small>
                                    <input type="text" name="subject_name" value="<?php echo $single['subject_name'] ?>" id="subject_name" required placeholder="Subject Name" class="form-control"> 
                                    <input type="hidden" name="id" value="<?php echo $single['record_id'] ?>" id="id"> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="subject_code">Subject Code</label>
                                    <input type="text" name="subject_code" id="subject_code" value="<?php echo $single['subject_code'] ?>" placeholder="Subject Code" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="subject_total_mark">Subject Total Mark</label><small class="req"> *</small>
                                    <input type="text" name="subject_total_mark" id="subject_total_mark" value="<?php echo $single['subject_total_mark'] ?>" required placeholder="Subject Total Mark" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="written_mark">Written Marks</label><small class="req"> *</small>
                                    <input type="text" value="<?php echo $single['written_mark'] ?>" name="written_mark" id="written_mark" required placeholder="Written Marks" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="mcq">MCQ Applicable</label><small class="req"> *</small>
                                    <select name="mcq" required id="mcq" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option <?php if($single['mcq']==1) echo "selected"; ?> value="1">Yes</option>
                                        <option <?php if($single['mcq']==0) echo "selected"; ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="mcq_mark">MCQ Marks</label><small class="req"> *</small>
                                    <input type="text" disabled value="<?php echo $single['mcq_mark'] ?>" name="mcq_mark" id="mcq_mark" required placeholder="MCQ Marks" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="practical">Practical Applicable</label><small class="req"> *</small>
                                    <select name="practical" required id="practical" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option <?php if($single['practical']==1) echo "selected"; ?> value="1">Yes</option>
                                        <option <?php if($single['practical']==0) echo "selected"; ?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="practical_mark">Practical Marks</label><small class="req"> *</small>
                                    <input type="text" disabled value="<?php echo $single['practical_mark'] ?>" name="practical_mark" id="practical_mark" required placeholder="Practical Marks" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="submit" name="" id="" value="Save" style="margin-top: 25px;" class="btn btn-info form-control"> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <div class="row" style="margin-top: 55px;">
            <section class="col-sm-12 connectedSortable">
                <div class="" style="color: black;">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="subject_table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Class Name</th>
                                <th class="text-center">Subject Name</th>
                                <th class="text-center">Subject Code</th>
                                <th class="text-center">Subject Total Mark</th>
                                <th class="text-center">Written Mark</th>
                                <th class="text-center">MCQ Applicable</th>
                                <th class="text-center">MCQ Mark</th>
                                <th class="text-center">Practical Applicable</th>
                                <th class="text-center">Practical Mark</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($all_subject)): ?>
                                <?php foreach($all_subject as $key=>$value): ?>
                                    <tr>
                                        <td class="text-center"><?= ++$key ?></td>
                                        <td class="text-center"><?= "Class-".nfa($value['class_name']) ?></td>
                                        <td class="text-center"><?= $value['subject_name'] ?></td>
                                        <td class="text-center"><?= $value['subject_code'] ?></td>
                                        <td class="text-center"><?= $value['subject_total_mark'] ?></td>
                                        <td class="text-center"><?= $value['written_mark'] ?></td>
                                        <td class="text-center"><?php echo $value["mcq"]==1?"Yes":"No" ?></td>
                                        <td class="text-center"><?= $value['mcq_mark'] ?></td>
                                        <td class="text-center"><?php echo $value["practical"]==1?"Yes":"No" ?></td>
                                        <td class="text-center"><?= $value['practical_mark'] ?></td>
                                        <td class="actions btn-group-xs text-center">
                                            <a title="Edit" href="<?php echo site_url("Show_edit_form/create_subject/" . $value['record_id'].'/main'); ?>" class=" btn btn-info btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                                            <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("Delete/create_subject/" . $value['record_id']); ?>" title="Delete" class="text-danger btn btn-danger  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-ban"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </section>
        </div>
    </section>
</aside>
<script>
    $(document).ready(function(){
        $('#example2').DataTable({
           "info":false,
           "autoWidth": false
       });
        var mcq=  $("#mcq").val();
        mcq_control(mcq);
        var practical=  $("#practical").val();
        practical_control(practical);

        $("#practical").on("change",function(){
            var practical=$(this).val();
            mcq_control(practical);
        });
        $("#mcq").on("change",function(){
            var mcq=$(this).val();
            mcq_control(mcq);
        });
        $("#practical").on("change",function(){
            var practical=$(this).val();
            practical_control(practical);
        });
    
        function mcq_control(mcq)
        {
            if(mcq==1)
            {
                $("#mcq_mark").prop("disabled",false);
            }
            else
            {
                $("#mcq_mark").prop("disabled",true);
                $("#mcq_mark").val('');
            }
        }
        function practical_control(practical)
        {
            if(practical==1)
            {
                $("#practical_mark").prop("disabled",false);
            }
            else
            {
                $("#practical_mark").prop("disabled",true);
                $("#practical_mark").val('');
            }
        }
    });
</script>
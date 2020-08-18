<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open('Insert/teacher_subject_management'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Teacher Subject Management</p>
                        <?php echo $this->session->flashdata('msg');?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="class_id">Select Class</label><small class="req"> *</small>
                                    <select name="class_id" required id="class_id" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_class)): ?>
                                            <?php foreach ($all_class as $value): ?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->class_name;?>">
                                                    <?php echo "Class - " . nfa($value->class_name); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="shift_id">Select Shift</label><small class="req"> *</small>
                                    <select name="shift_id" required id="shift_id" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_shift)): ?>
                                            <?php foreach ($all_shift as $value): ?>
                                                <option value="<?php echo $value->record_id; ?>">
                                                    <?php echo $value->shift_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12 section_div">
                                    <label for="section_id">Section Name</label><small class="req"> *</small>
                                    <select name="section_id" id="section_id" required class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_section)): ?>
                                            <?php foreach ($all_section as $value): ?>
                                                <option value="<?php echo $value->record_id; ?>">
                                                    <?php echo $value->section_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div style="display:none" class="form-group col-sm-2 col-xs-12 group_div">
                                    <label for="group_id">Group Name</label><small class="req"> *</small>
                                    <select name="group_id" disabled id="group_id" required  class="form-control selectpicker"
                                            data-container="body" 
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_group)): ?>
                                            <?php foreach ($all_group as $value): ?>
                                                <option value="<?php echo $value->record_id; ?>">
                                                    <?php echo $value->group_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="subject_id">Select Subject </label><small class="req"> *</small>
                                    <select name="subject_id" id="subject_id" required  class="form-control selectpicker"
                                            data-container="body" 
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_subject)): ?>
                                            <?php foreach ($all_subject as $value): ?>
                                                <option value="<?php echo $value->record_id; ?>">
                                                    <?php echo $value->subject_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="teacher_id">Select Teacher</label><small class="req"> *</small>
                                    <select name="teacher_id" id="teacher_id" required  class="form-control selectpicker"
                                            data-container="body" 
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_teacher)): ?>
                                            <?php foreach ($all_teacher as $value): ?>
                                                <option value="<?php echo $value->record_id; ?>">
                                                    <?php echo $value->name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="session_id">Select Session</label><small class="req"> *</small>
                                    <select name="session_id" id="session_id" required  class="form-control selectpicker"
                                            data-container="body" 
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_session)): ?>
                                            <?php foreach ($all_session as $value): ?>
                                                <option value="<?php echo $value->record_id; ?>">
                                                    <?php echo $value->session_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <input type="submit" name="" id="" value="Save" style="margin-top: 25px;" class="btn btn-info form-control"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Class</th>
                                <th class="text-center">Group</th>
                                <th class="text-center">Section</th>
                                <th class="text-center">Shift</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Teacher Name</th>
                                <th class="text-center">Teacher ID</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($all_value)): ?>
                                    <?php foreach($all_value as $key=>$value): ?>
                                        <tr>
                                            <td class="text-center"><?= ++$key ?></td>
                                            <td class="text-center"><?= "Class-".nfa($value['class_name']); ?></td>
                                            <td class="text-center"><?= $value['group_name'] ?></td>
                                            <td class="text-center"><?= $value['section_name'] ?></td>
                                            <td class="text-center"><?= $value['shift_name'] ?></td>
                                            <td class="text-center"><?= $value['session_name'] ?></td>
                                            <td class="text-center"><?= $value['subject_name'] ?></td>
                                            <td class="text-center"><?= $value['teacher_name'] ?></td>
                                            <td class="text-center"><?= $value['teacher_unique_id'] ?></td>
                                            <td class="actions btn-group-xs text-center">
                                                <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("Delete/teacher_subject_management/" . $value['record_id']."/main"); ?>" title="Delete" class="text-danger btn btn-danger  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#example2').DataTable({
           "info":false,
           "autoWidth": false
       });
    $("#class_id").on("change", function () {
        var class_name = $('#class_id').val().split("#")[1];
        if (class_name == '9' || class_name == '10') {
            $('.group_div').css('display', 'block');
            $('#group_id').prop('disabled',false);
            $('#group_id').selectpicker('val','');
            $('#group_id').selectpicker("refresh");

            $('#section_id').prop('disabled',true);
            $('#section_id').selectpicker('val','');
            $('#section_id').selectpicker("refresh");
            $('.section_div').hide();
        } else {
            $('.group_div').hide();
            $('#group_id').prop('disabled',true);
            $('#group_id').selectpicker('val','');
            $('#group_id').selectpicker("refresh");

            $('#section_id').prop('disabled',false);
            $('#section_id').selectpicker('val','');
            $('#section_id').selectpicker("refresh");
            $('.section_div').css('display', 'block');
        }
        var class_id=$('#class_id').val().split("#")[0];
        var url="<?php echo base_url(); ?>get_ajax_value/get_subject_by_class";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"class_id":class_id},
                success:function(data){
                    $("#subject_id").find('option').remove();
                    $("#subject_id").selectpicker("refresh");
                    if(data!=''){
                        $("#subject_id").append('<option value="">--Select--</option>');
                        $.each(data,function(key,value){
                            $("#subject_id").append('<option value="'+ value.record_id +'">'+ value.subject_name +'</option>');
                        });
                        $("#subject_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
    });
</script>
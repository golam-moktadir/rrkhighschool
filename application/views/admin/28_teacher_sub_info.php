<div class="form-group col-sm-3 col-xs-12">
    <label for="class_id">Select Class</label><small class="req"> *</small> 
    <select required name="class_id" id="class_id" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php if(isset($all_class)): ?>
        <?php foreach ($all_class as $value): ?>
            <option value="<?php echo $value['class_id']; ?>#<?php echo $value['class_name']; ?>">
                <?php echo nfa($value['class_name']); ?>
            </option>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<div class="form-group col-sm-3 col-xs-12">
    <label for="shift_id">Select Shift</label><small class="req"> *</small> 
    <select required name="shift_id" id="shift_id" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php if(isset($all_shift)): ?>
        <?php foreach ($all_shift as $value): ?>
            <option value="<?php echo $value['shift_id']; ?>#<?php echo $value['shift_name']; ?>">
                <?php echo $value['shift_name']; ?>
            </option>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<div style="display:none" class="form-group col-sm-3 col-xs-12 group_div">
    <label for="group_id">Select Group</label><small class="req"> *</small> 
    <select required disabled name="group_id" id="group_id" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php if(isset($all_group)): ?>
        <?php foreach ($all_group as $value): ?>
            <option value="<?php echo $value['group_id']; ?>#<?php echo $value['group_name']; ?>">
                <?php echo $value['group_name']; ?>
            </option>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<div class="form-group col-sm-3 col-xs-12 section_div">
    <label for="section_id">Select Section</label><small class="req"> *</small> 
    <select required name="section_id" id="section_id" class="form-control selectpicker"
            data-container="body">
        <option value="">-- Select --</option>
        <?php if(isset($all_section)): ?>
        <?php foreach ($all_section as $value): ?>
            <option value="<?php echo $value['section_id']; ?>#<?php echo $value['section_name']; ?>">
                <?php echo $value['section_name']; ?>
            </option>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>

<div id="show_info2">

    <div class="form-group col-sm-3 col-xs-12">
        <label for="exam_id">Select Exam</label><small class="req"> *</small> 
        <select required name="exam_id" id="exam_id" class="form-control selectpicker"
                data-container="body">
            <option value="">-- Select --</option>
        </select>
    </div>

</div>

<div id="show_info4">
    <div class="form-group col-sm-3 col-xs-12">
        <label for="subject_id">Select Subject</label><small class="req"> *</small> 
        <select required name="subject_id" id="subject_id" class="form-control selectpicker"
                data-container="body">
            <option value="">-- Select --</option>
        </select>
    </div>
</div>


<script type="text/javascript">
    $("#class_id").on("change", function () {
        var class_name = $('#class_id').val().split("#")[1];
        var teacher_id = $('#teacher_id').val();
        if (class_name == '9' || class_name == '10') {
            $('.group_div').css('display', 'block');
            $('#group_id').prop('disabled',false);
            $('#group_id').selectpicker('val','');
            $('#group_id').selectpicker("refresh");

            $('#section_id').prop('disabled',true);
            $('#section_id').selectpicker('val','');
            $('#section_id').selectpicker("refresh");
            $('.section_div').hide();
        } else{
            $('.group_div').hide();
            $('#group_id').prop('disabled',true);
            $('#group_id').selectpicker('val','');
            $('#group_id').selectpicker("refresh");

            $('#section_id').prop('disabled',false);
            $('#section_id').selectpicker('val','');
            $('#section_id').selectpicker("refresh");
            $('.section_div').css('display', 'block');
        }
        $('#shift_id').selectpicker('val','');
        $('#shift_id').selectpicker("refresh");
        $('#exam_id').selectpicker('val','');
        $('#exam_id').selectpicker("refresh");
        $('#subject_id').selectpicker('val','');
        $('#subject_id').selectpicker("refresh");

        var class_id = $('#class_id').val().split("#")[0];
        var session_id = $('#session_id').val().split("#")[0];
        var post_data = {
            'class_id': class_id,
            'teacher_id': teacher_id,
            'session_id': session_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_exam_info",
            data: post_data,
            success: function (data) {
                $('#show_info2').html(data);
                $('#exam_id').selectpicker('refresh');
            }
        });


        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_teacher_class_subject_info",
            data: post_data,
            success: function (data) {
                $('#show_info4').html(data);
                $('#subject_id').selectpicker('refresh');
            }
        });
    });

    $("#shift_id, #group_id, #section_id").on("change", function () {
        var class_id = $('#class_id').val().split("#")[0];
        var teacher_id = $('#teacher_id').val();
        var shift_id = $('#shift_id').val().split("#")[0];
        var group_id = $('#group_id').val().split("#")[0];
        var section_id = $('#section_id').val().split("#")[0];
        var session_id = $('#session_id').val().split("#")[0];

        var post_data = {
            'session_id': session_id,
            'class_id': class_id,
            'teacher_id': teacher_id,
            'shift_id': shift_id,
            'group_id': group_id,
            'section_id': section_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_teacher_class_subject_info",
            data: post_data,
            success: function (data) {
                $('#show_info4').html(data);
                $('#subject_id').selectpicker('refresh');
            }
        });
    });
</script>
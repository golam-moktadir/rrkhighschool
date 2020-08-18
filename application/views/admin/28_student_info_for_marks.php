<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title" style="color: black;">Marks</h3>
        <?php if($this->session->ses_user_type!="teacher"): ?>
                <button  type="button" class="btn btn-danger pull-right"
                id="delete_previous_marks">Delete</button>
        <?php endif; ?>
    </div>
    <form id="marks_upload">
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
            <table id="example2" class="table table-bordered table-hover subject_table">
                <thead>
                    <tr>
                        <th class="text-center">Sl.</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Student ID</th>
                        <th class="text-center">Fourth Subject</th>
                        <th class="text-center">Roll</th>
                        <th class="text-center">W.Mark(<?= $all_student_mark[0]['s_written_mark'] ?>)</th>
                        <?php if($all_student_mark[0]['mcq']==1): ?>
                            <th class="text-center">M.mark(<?= $all_student_mark[0]['s_mcq_mark'] ?>)</th>
                        <?php endif;?>
                        <?php if($all_student_mark[0]['practical']==1): ?>
                            <th class="text-center">P.mark(<?= $all_student_mark[0]['s_practical_mark'] ?>)</th>
                        <?php endif;?>
                        <th class="text-center">T.Mark(<?= $all_student_mark[0]['subject_total_mark'] ?>)</th>
                        <th class="text-center">Grade(A+)</th>
                        <th class="text-center">Available</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($all_student_mark)): ?>
                        <?php foreach($all_student_mark as $key=>$value): ?>
                            <tr id="<?php echo $value['mark_id'] ?>">
                                <td class="text-center"><?= ++$key;?></td>
                                <td class="text-center"><?= $value['name'] ?></td>
                                <td class="text-center"><?= $value['student_unique_id'] ?></td>
                                <?php if($value['fourth_subject']!=''): ?>
                                    <td class="text-center"><?= $value['fourth_subject'] ?></td>
                                <?php else: ?>
                                    <td class="text-center">N/A</td>
                                <?php endif;?>
                                <td class="text-center"><?= $value['roll'] ?></td>
                                <td class="text-center">
                                    <input type="text" placeholder="Written Mark" <?php if($value['subject_available']==0) echo "disabled"; ?> required name="written_mark_<?= $value['mark_id'] ?>" class="form-control written_mark" id="written_mark_<?= $value['mark_id']?>" value="<?= $value['written_mark'] ?>" >
                                    <input type="hidden"  name="teacher_id" class="form-control" id="teacher_id" value="<?= $value['teacher_id'] ?>" >
                                    <input type="hidden"  name="date" class="form-control" id="date" value="<?= $value['date'] ?>" >
                                    <input type="hidden"  name="session_id" class="form-control" id="session_id" value="<?= $value['session_id'] ?>" >
                                    <input type="hidden"  name="status[]" class="form-control" id="status" value="<?= $value['status'] ?>" >
                                    <input type="hidden"  name="class_id" class="form-control" id="class_id" value="<?= $value['class_id'] ?>" >
                                    <input type="hidden"  name="shift_id" class="form-control" id="shift_id" value="<?= $value['shift_id'] ?>" >
                                    <input type="hidden"  name="mark_id[]" class="form-control" id="mark_id" value="<?= $value['mark_id'] ?>" >

                                </td>
                                <?php if($all_student_mark[0]['mcq']==1): ?>
                                    <td class="text-center"><input type="text" required placeholder="MCQ Mark" <?php if($value['subject_available']==0) echo "disabled"; ?> name="mcq_mark_<?= $value['mark_id'] ?>" class="form-control mcq_mark_" id="mcq_mark_<?= $value['mark_id']?>" value="<?= $value['mcq_mark'] ?>" ></td>
                                <?php endif;?>
                                <?php if($all_student_mark[0]['practical']==1): ?>
                                    <td class="text-center"><input type="text" required placeholder="Practical Mark" <?php if($value['subject_available']==0) echo "disabled"; ?> name="practical_mark_<?= $value['mark_id'] ?>" class="form-control practical_mark" id="practical_mark_<?= $value['mark_id']?>" value="<?= $value['practical_mark'] ?>" ></td>
                                <?php endif;?>
                                <td class="text-center">
                                <input type="hidden"  name="total_mark_<?= $value['mark_id'] ?>" class="form-control" id="total_mark_<?= $value['mark_id']?>" value="<?= $value['total_mark'] ?>" >
                                    <span id="total_mark_text_<?= $value['mark_id'] ?>"><?= $value['total_mark'] ?></span>
                                </td>
                                <td class="text-center">
                                <input type="hidden"  name="grade_<?= $value['mark_id'] ?>" class="form-control" id="grade_<?= $value['mark_id'] ?>" value="<?= $value['grade'] ?>" >
                                <input type="hidden"  name="grade_point_<?= $value['mark_id'] ?>" class="form-control" id="grade_point_<?= $value['mark_id'] ?>" value="<?= $value['grade_point'] ?>" >
                                <span id="total_grade_text_<?= $value['mark_id'] ?>"><?= $value['grade'] ?></span>
                                </td>
                                <td class="text-center"><input type="checkbox" <?php if($value['subject_available']==1) echo "checked"; ?> value="1" name="not_available_<?= $value['mark_id'] ?>" id="avaiable_<?= $value['mark_id'] ?>" class="available"></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="pull-right">
                <button type="submit" class="btn btn-info">Marks Upload</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        const subject_total_mark=<?= $all_student_mark[0]['subject_total_mark'] ?>;
        const s_written_mark=<?= $all_student_mark[0]['s_written_mark'] ?>;
        const s_mcq_mark=parseInt("<?php echo $all_student_mark[0]['s_mcq_mark']==""?"0":$all_student_mark[0]['s_mcq_mark']; ?>");
        const s_practical_mark=parseInt("<?php echo $all_student_mark[0]['s_practical_mark']==""?"0":$all_student_mark[0]['s_practical_mark']; ?>");
        //written mark
        $(".written_mark").on("change focus",function(){
            var mark_id= $(this).closest("tr").attr("id");
            var w_mark=parseInt($(this).val());
            var mcq_mark=parseInt($("#mcq_mark_"+mark_id).val());
            var practical_mark=parseInt($("#practical_mark_"+mark_id).val());
            if(isNaN(w_mark) || w_mark>s_written_mark || w_mark<0)
            {
                w_mark=0;
                $(this).val(w_mark);
                this.select();
            }
            if(isNaN(mcq_mark))
            {
                mcq_mark=0;
            }
            if(isNaN(practical_mark))
            {
                practical_mark=0;
            }
            var total_mark=w_mark+mcq_mark+practical_mark;
            if(isNaN(total_mark))
            {
                total_mark=0;
            }
            mark_calculation(total_mark,mark_id);
        });
        //mcq_mark_
        $(".mcq_mark_").on("change focus",function(){
            var mark_id= $(this).closest("tr").attr("id");
            var w_mark=parseInt($("#written_mark_"+mark_id).val());
            var mcq_mark=parseInt($("#mcq_mark_"+mark_id).val());
            var practical_mark=parseInt($("#practical_mark_"+mark_id).val());
            if(isNaN(w_mark))
            {
                w_mark=0;
            }
            if(isNaN(mcq_mark)|| mcq_mark>s_mcq_mark || mcq_mark<0)
            {
                mcq_mark=0;
                $(this).val(mcq_mark);
                this.select();
            }
            if(isNaN(practical_mark))
            {
                practical_mark=0;
            }
            var total_mark=w_mark+mcq_mark+practical_mark;
            if(isNaN(total_mark))
            {
                total_mark=0;
            }
            mark_calculation(total_mark,mark_id);
        });
        //practical_mark
        $(".practical_mark").on("change focus",function(){
            var mark_id= $(this).closest("tr").attr("id");
            var w_mark=parseInt($("#written_mark_"+mark_id).val());
            var mcq_mark=parseInt($("#mcq_mark_"+mark_id).val());
            var practical_mark=parseInt($("#practical_mark_"+mark_id).val());
            if(isNaN(w_mark))
            {
                w_mark=0;
            }
            if(isNaN(mcq_mark))
            {
                mcq_mark=0;
            }
            if(isNaN(practical_mark)|| practical_mark>s_practical_mark || practical_mark<0)
            {
                practical_mark=0;
                $(this).val(practical_mark);
                this.select();
            }
            var total_mark=w_mark+mcq_mark+practical_mark;
            if(isNaN(total_mark))
            {
                total_mark=0;
            }
            mark_calculation(total_mark,mark_id);
        });

       function mark_calculation(total_mark,mark_id)
        {
            var grade;
            var grade_point;
            $("#total_mark_"+mark_id).val(total_mark);
            $('#total_mark_text_'+mark_id).text(total_mark);

            if(subject_total_mark==100) parcent=total_mark;
            else parcent=total_mark/subject_total_mark*100;

            if (0 <= parcent && parcent <= 32.99) {
                grade = 'F';
                grade_point=0.0;
            } else if (33 <= parcent && parcent <= 39.99) {
                grade = 'D';
                grade_point=1.00;
            } else if (40 <= parcent && parcent <= 49.99) {
                grade = 'C';
                grade_point=2.0;
            } else if (50 <= parcent && parcent <= 59.99) {
                grade = 'B';
                grade_point=3.0;
            } else if (60 <= parcent && parcent <= 69.99) {
                grade = 'A-';
                grade_point=3.50;
            } else if (70 <= parcent && parcent <= 79.99) {
                grade = 'A';
                grade_point=4.0;
            } else if (80 <= parcent && parcent <= 100) {
                grade = 'A+';
                grade_point=5.0;
            } else {
                grade = 'F';
                grade_point=0.0;
            }
            $("#grade_"+mark_id).val(grade);
            $("#grade_point_"+mark_id).val(grade_point);
            $("#total_grade_text_"+mark_id).text(grade);
        }

        //marks upload
        $("#marks_upload").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Insert/insert_grade",
                data: $(this).serialize(),
                success: function (data) {
                    $('#show_info3').html('');
                    $('#msg').html('Mark Given Successfully');
                }
            });
        });

        $(".available").on("click",function(){
            var mark_id= $(this).closest("tr").attr("id");
            if($(this).is(":checked"))
            {
                 $("#written_mark_"+mark_id).prop("disabled",false);
                 $("#mcq_mark_"+mark_id).prop("disabled",false);
                 $("#practical_mark_"+mark_id).prop("disabled",false);
            }
            else{
                 $("#written_mark_"+mark_id).prop("disabled",true);
                 $("#mcq_mark_"+mark_id).prop("disabled",true);
                 $("#practical_mark_"+mark_id).prop("disabled",true);
            }
            $("#written_mark_"+mark_id).val(0);
            $("#mcq_mark_"+mark_id).val(0);
            $("#practical_mark_"+mark_id).val(0);
        });
        
    });
</script>
<script>
    $("#delete_previous_marks").on("click", function () {
        var teacher_id = $('#teacher_id').val();
        var session_id = $('#session_id').val().split("#")[0];
        var shift_id = $('#shift_id').val().split("#")[0];
        var group_id = $('#group_id').val().split("#")[0];
        var section_id = $('#section_id').val().split("#")[0];
        var class_id = $('#class_id').val().split("#")[0];
        var exam_id = $('#exam_id').val();
        var subject_id = $('#subject_id').val();

        var post_data = {
            'session_id': session_id,
            'teacher_id': teacher_id,
            'shift_id': shift_id,
            'class_id': class_id,
            'section_id': section_id,
            'group_id': group_id,
            'exam_id': exam_id,
            'subject_id': subject_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Delete/previous_marks",
            data: post_data,
            success: function (data) {
                location.reload();
            }
        });
    });
</script>
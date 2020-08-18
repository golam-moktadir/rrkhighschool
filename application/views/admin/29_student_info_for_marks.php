<?php
if (!empty($all_value)) {
    foreach ($all_value as $s) {
        $class_name = $s->class_name;
    }
    $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
    $class_array2 = array('6', '7', '8');
    $class_array3 = array('9', '10');
    $subject_50 = array('Bangla 2nd Paper', 'English 2nd Paper', 'ICT', 'Arts And Crafts', 'Physical Education & Health', 'Work & Life Oriented Education');
    $subject_100 = array('English 1st Paper', 'English', 'Oral');
    ?>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title" style="color: black;">Marks</h3>
            <?php if($this->session->ses_user_type!="teacher"): ?>
                <button  type="button" class="btn btn-danger pull-right"
                id="delete_previous_marks">Delete</button>
            <?php endif; ?>
        </div>
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <?php if (in_array($class_name, $class_array1)) { ?>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Student ID</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Roll</th>
                        <th style="text-align: center; width: 15%;">Total<br>
                            <?php if ($subject == 'Drawing') {
                                echo '(20)';
                            } elseif ($subject == 'General Knowledge + Computer' || $subject == 'English 2nd') {
                                echo '(50)';
                            } else {
                                echo '(100)';
                            } ?></th>
                        <th style="text-align: center; width: 15%;">Grade</th>
                    </tr>
                <?php } elseif (in_array($class_name, $class_array2)) { ?>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Student ID</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Roll</th>
                        <?php if (in_array($subject, $subject_50)) { ?>
                            <th style="text-align: center;">Total<br>(50)</th>
                        <?php } elseif (in_array($subject, $subject_100)) { ?>
                            <th style="text-align: center;">Total<br>(100)</th>
                        <?php } else { ?>
                            <th style="text-align: center;">MCQ<br>(30)</th>
                            <th style="text-align: center;">Written Exam<br>(70)</th>
                            <th style="text-align: center;">Total<br>(100)</th>
                        <?php } ?>

                        <th style="text-align: center;">Grade</th>
                    </tr>
                <?php } elseif (in_array($class_name, $class_array3)) {
                    if (in_array($subject, $subject_practical_array)) { ?>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Student ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Roll</th>
                            <th style="text-align: center;">MCQ<br>(25)</th>
                            <th style="text-align: center;">Written Exam<br>(50)</th>
                            <th style="text-align: center;">Practical<br>(25)</th>
                            <th style="text-align: center;">Total<br>(100)</th>
                            <th style="text-align: center;">Grade</th>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Student ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Roll</th>
                            <th style="text-align: center;">MCQ<br>(30)</th>
                            <th style="text-align: center;">Written Exam<br>(70)</th>
                            <th style="text-align: center;">Total<br>(100)</th>
                            <th style="text-align: center;">Grade</th>
                        </tr>
                    <?php } ?>
                <?php } ?>

                </thead>
                <tbody>
                <?php
                $count = 0;
                if (!empty($all_value)) {
                    foreach ($all_value as $single_value) {
                        $check_mark=array_merge($duplicate_array,array("student_id"=>$single_value->student_unique_id));
                        $is_mark=check_exits_student_mark($check_mark);
                        // echo "<pre>";
                        // print_r($check_mark);
                        // die();
                        $count++;
                        if (in_array($class_name, $class_array1)) {
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                                <input type="hidden" name="student_id<?php echo $count; ?>"
                                       id="student_id<?php echo $count; ?>"
                                       value="<?php echo $single_value->student_unique_id; ?>">
                                <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                <input type="hidden" name="name<?php echo $count; ?>"
                                       id="name<?php echo $count; ?>" value="<?php echo $single_value->name; ?>">
                                <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                                <input type="hidden" name="roll<?php echo $count; ?>"
                                       id="roll<?php echo $count; ?>" value="<?php echo $single_value->roll; ?>">
                                <input type="hidden" name="fs<?php echo $count; ?>"
                                       id="fs<?php echo $count; ?>"
                                       value="<?php echo $single_value->fourth_subject; ?>">

                                <td style="text-align: center;">
                                    <input type="text" class="form-control"  name="markw<?php echo $count; ?>"
                                           id="markw<?php echo $count; ?>" value="<?php echo @$is_mark->written_mark; ?>"
                                        <?php if ($subject == 'Drawing') { ?>
                                            onkeyup="grade_20(<?php echo $count; ?>)"
                                        <?php } elseif ($subject == 'General Knowledge + Computer' || $subject == 'English 2nd') { ?>
                                            onkeyup="grade_50(<?php echo $count; ?>)"
                                        <?php } else { ?>
                                            onkeyup="grade2(<?php echo $count; ?>)"
                                        <?php } ?>>
                                    <input type="hidden" class="form-control" name="markm<?php echo $count; ?>"
                                           id="markm<?php echo $count; ?>" value="<?php echo @$is_mark->mcq_mark; ?>">
                                    <input type="hidden" class="form-control" name="markp<?php echo $count; ?>"
                                           id="markp<?php echo $count; ?>" value="<?php echo @$is_mark->practical_mark; ?>">
                                </td>
                                <td style="text-align: center;"><p id="grade<?php echo $count; ?>"><?php echo @$is_mark->grade; ?></p></td>
                                <input type="hidden" name="total_mark<?php echo $count; ?>" value="<?php echo @$is_mark->total_mark; ?>"
                                       id="total_mark<?php echo $count; ?>">
                            </tr>
                        <?php } elseif (in_array($class_name, $class_array2)) {
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                                <input type="hidden" name="student_id<?php echo $count; ?>"
                                       id="student_id<?php echo $count; ?>"
                                       value="<?php echo $single_value->student_unique_id; ?>">
                                <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                <input type="hidden" name="name<?php echo $count; ?>"
                                       id="name<?php echo $count; ?>" value="<?php echo $single_value->name; ?>">
                                <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                                <input type="hidden" name="roll<?php echo $count; ?>"
                                       id="roll<?php echo $count; ?>" value="<?php echo $single_value->roll; ?>">
                                <input type="hidden" name="fs<?php echo $count; ?>"
                                       id="fs<?php echo $count; ?>"
                                       value="<?php echo $single_value->fourth_subject; ?>">


                                <?php if (in_array($subject, $subject_50)) { ?>

                                    <input type="hidden" class="form-control" name="markm<?php echo $count; ?>"
                                           id="markm<?php echo $count; ?>" value="<?php echo @$is_mark->mcq_mark; ?>">
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control"  name="markw<?php echo $count; ?>"
                                               id="markw<?php echo $count; ?>" value="<?php echo @$is_mark->written_mark; ?>"
                                               onkeyup="grade_50(<?php echo $count; ?>)">
                                    </td>
                                    <input type="hidden" class="form-control" name="markp<?php echo $count; ?>"
                                           id="markp<?php echo $count; ?>" value="<?php echo @$is_mark->practical_mark; ?>">

                                <?php } elseif (in_array($subject, $subject_100)) { ?>

                                    <input type="hidden" class="form-control" name="markm<?php echo $count; ?>"
                                           id="markm<?php echo $count; ?>" value="<?php echo @$is_mark->mcq_mark; ?>">

                                    <td style="text-align: center;">
                                        <input type="text" class="form-control" name="markw<?php echo $count; ?>" 
                                               id="markw<?php echo $count; ?>" value="<?php echo @$is_mark->written_mark; ?>" onkeyup="grade2(<?php echo $count; ?>)">
                                    </td>
                                    <input type="hidden" class="form-control" name="markp<?php echo $count; ?>"
                                           id="markp<?php echo $count; ?>" value="<?php echo @$is_mark->practical_mark; ?>">

                                <?php } else { ?>
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control"  name="markm<?php echo $count; ?>"
                                               id="markm<?php echo $count; ?>" value="<?php echo @$is_mark->mcq_mark; ?>" onkeyup="grade(<?php echo $count; ?>)">
                                    </td>
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control"  name="markw<?php echo $count; ?>"
                                               id="markw<?php echo $count; ?>" value="<?php echo @$is_mark->written_mark; ?>" onkeyup="grade(<?php echo $count; ?>)">
                                    </td>
                                    <input type="hidden"  class="form-control" name="markp<?php echo $count; ?>"
                                           id="markp<?php echo $count; ?>" value="<?php echo @$is_mark->practical_mark; ?>">

                                    <td style="text-align: center;"><p id="total<?php echo $count; ?>"><?php echo @$is_mark->total_mark; ?> </p></td>
                                <?php } ?>

                                <td style="text-align: center;"><p id="grade<?php echo $count; ?>"><?php echo @$is_mark->grade; ?></p></td>
                                <input type="hidden" name="total_mark<?php echo $count; ?>" value="<?php echo @$is_mark->total_mark; ?>"
                                       id="total_mark<?php echo $count; ?>">

                            </tr>
                        <?php } elseif (in_array($class_name, $class_array3)) {
                            if (in_array($subject, $subject_practical_array)) { ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                                    <input type="hidden" name="student_id<?php echo $count; ?>"
                                           id="student_id<?php echo $count; ?>"
                                           value="<?php echo $single_value->student_unique_id; ?>">
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <input type="hidden" name="name<?php echo $count; ?>"
                                           id="name<?php echo $count; ?>" value="<?php echo $single_value->name; ?>">
                                    <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                                    <input type="hidden" name="roll<?php echo $count; ?>"
                                           id="roll<?php echo $count; ?>" value="<?php echo $single_value->roll; ?>">
                                    <input type="hidden" name="fs<?php echo $count; ?>"
                                           id="fs<?php echo $count; ?>"
                                           value="<?php echo $single_value->fourth_subject; ?>">
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control" name="markm<?php echo $count; ?>"
                                               id="markm<?php echo $count; ?>" value="<?php echo @$is_mark->mcq_mark; ?>" onkeyup="grade3(<?php echo $count; ?>)">
                                    </td>
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control" name="markw<?php echo $count; ?>" 
                                               id="markw<?php echo $count; ?>" value="<?php echo @$is_mark->written_mark; ?>" onkeyup="grade3(<?php echo $count; ?>)">
                                    </td>
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control" name="markp<?php echo $count; ?>" 
                                               id="markp<?php echo $count; ?>" value="<?php echo @$is_mark->practical_mark; ?>" onkeyup="grade3(<?php echo $count; ?>)">
                                    </td>
                                    <td style="text-align: center;"><p id="total<?php echo $count; ?>"><?php echo @$is_mark->total_mark; ?></p></td>
                                    <td style="text-align: center;"><p id="grade<?php echo $count; ?>"><?php echo @$is_mark->grade; ?></p></td>
                                    <input type="hidden" name="total_mark<?php echo $count; ?>" value="<?php echo @$is_mark->total_mark; ?>"
                                           id="total_mark<?php echo $count; ?>">
                                    
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                                    <input type="hidden" name="student_id<?php echo $count; ?>"
                                           id="student_id<?php echo $count; ?>"
                                           value="<?php echo $single_value->student_unique_id; ?>">
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <input type="hidden" name="name<?php echo $count; ?>"
                                           id="name<?php echo $count; ?>" value="<?php echo $single_value->name; ?>">
                                    <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                                    <input type="hidden" name="roll<?php echo $count; ?>"
                                           id="roll<?php echo $count; ?>" value="<?php echo $single_value->roll; ?>">
                                    <input type="hidden" name="fs<?php echo $count; ?>"
                                           id="fs<?php echo $count; ?>"
                                           value="<?php echo $single_value->fourth_subject; ?>">
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control" name="markm<?php echo $count; ?>" 
                                               id="markm<?php echo $count; ?>" value="<?php echo @$is_mark->mcq_mark; ?>" onkeyup="grade(<?php echo $count; ?>)">
                                    </td>
                                    <td style="text-align: center;">
                                        <input type="text" class="form-control" name="markw<?php echo $count; ?>" 
                                               id="markw<?php echo $count; ?>" value="<?php echo @$is_mark->written_mark; ?>" onkeyup="grade(<?php echo $count; ?>)">
                                    </td>

                                    <td style="text-align: center;"><p id="total<?php echo $count; ?>"><?php echo @$is_mark->total_mark; ?></p></td>
                                    <td style="text-align: center;"><p id="grade<?php echo $count; ?>"><?php echo @$is_mark->grade; ?></p></td>
                                    <input type="hidden" name="total_mark<?php echo $count; ?>" value="<?php echo @$is_mark->total_mark; ?>"
                                           id="total_mark<?php echo $count; ?>">
                                    

                                </tr>
                            <?php }
                        }
                    }
                }
                ?>
                </tbody>
                <tfoot>
                <?php if (in_array($class_name, $class_array1)) { ?>
                    <tr>
                        <td colspan="5" style="text-align: center;"></td>
                        <td style="text-align: center; float: right">
                            <button type="button" class="pull-left btn btn-success" id="marks_upload">Submit &nbsp <i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </td>
                    </tr>
                <?php } elseif (in_array($class_name, $class_array2)) { ?>
                    <tr>
                        <?php if (in_array($subject, $subject_50)) { ?>
                            <td colspan="5" style="text-align: center;"></td>
                        <?php } elseif (in_array($subject, $subject_100)) { ?>
                            <td colspan="5" style="text-align: center;"></td>
                        <?php } else { ?>
                            <td colspan="7" style="text-align: center;"></td>
                        <?php } ?>

                        <td style="text-align: center; float: right">
                            <button type="button" class="pull-left btn btn-success" id="marks_upload">Submit &nbsp <i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </td>
                    </tr>
                <?php } elseif (in_array($class_name, $class_array3)) {
                    if (in_array($subject, $subject_practical_array)) { ?>
                        <tr>
                            <td colspan="8" style="text-align: center;"></td>
                            <td style="text-align: center; float: right">
                                <button type="button" class="pull-left btn btn-success" id="marks_upload">Submit &nbsp
                                    <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7" style="text-align: center;"></td>
                            <td style="text-align: center; float: right">
                                <button type="button" class="pull-left btn btn-success" id="marks_upload">Submit &nbsp
                                    <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tfoot>
            </table>
            <input type="hidden" name="count"
                   id="count" value="<?php echo $count; ?>">
        </div>
    </div>
<?php } ?>
</form>


<script>
    $("#marks_upload").on("click", function () {
        var input_session = $('#session_name').val();
        var input_shift = $('#shift_name').val();
        var input_group = $('#group_name').val();
        var input_section = $('#section_name').val();
        var input_exam = $('#exam_name').val();
        var input_class = $('#class_name').val();
        var input_subject = $('#subject').val();
        var subject_total_mark = $('#subject_total_mark').val();
        var input_teacher = $('#teacher').val();
        var input_count = $('#count').val();
        var input_date = $('#date').val();

        var marks = new Array();

        for (var i = 1; i <= input_count; i++) {
            marks[i - 1] = new Array($('#student_id' + i).val(), $('#name' + i).val(),
                $('#roll' + i).val(), $('#fs' + i).val(), $('#markw' + i).val(),
                $('#markm' + i).val(), $('#markp' + i).val(), $('#grade' + i).text(),
                $('#total_mark' + i).val());
        }

        // console.log(marks);

        var post_data = {
            'session_name': input_session,
            'class': input_class,
            'shift': input_shift,
            'group': input_group,
            'section': input_section,
            'exam': input_exam,
            'subject': input_subject,
            'subject_total_mark': subject_total_mark,
            'teacher': input_teacher,
            'count': input_count,
            'date': input_date,
            'marks': marks,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Insert/insert_grade",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#show_info3').html('');
                $('#msg').html('Mark Given Successfully');
            }
        });
    });

    function roundToTwo(num) {
        return +(Math.round(num + "e+2") + "e-2");
    }

    function tc(count) {
        var markt = $('#markt' + count).val();
        var markc = $('#markc' + count).val();
        var marktc = roundToTwo(((Number(markt) + Number(markc)) * 50) / 75);
        $('#marktc' + count).val(marktc);
        // console.log(marktc);
    }

    function tc2(count) {
        var markt = $('#markt' + count).val();
        var markc = $('#markc' + count).val();
        var marktc = roundToTwo(((Number(markt) + Number(markc)) * 70) / 95);
        $('#marktc' + count).val(marktc);
        // console.log(marktc);
    }

    function grade(count) {
        var parcent=0;
        var markm = $('#markm' + count).val();
        var markw = $('#markw' + count).val();
        var subject_mark= $("#subject_total_mark").val();  
        var total = roundToTwo(Number(markm) + Number(markw));
        $('#total' + count).text(total);
        $('#total_mark' + count).val(total);
        // console.log(total);
        if(subject_mark==100) parcent=total;
        else parcent=total/subject_mark*100;
        $('#total' + count).text(total);
        $('#total_mark' + count).val(total);
        // console.log(parcent);
        if (0 <= parcent && parcent <= 32.99) {
            var grade = 'F';
        } else if (33 <= parcent && parcent <= 39.99) {
            var grade = 'D';
        } else if (40 <= parcent && parcent <= 49.99) {
            var grade = 'C';
        } else if (50 <= parcent && parcent <= 59.99) {
            var grade = 'B';
        } else if (60 <= parcent && parcent <= 69.99) {
            var grade = 'A-';
        } else if (70 <= parcent && parcent <= 79.99) {
            var grade = 'A';
        } else if (80 <= parcent && parcent <= 100) {
            var grade = 'A+';
        } else {
            var grade = 'Invalid';
        }
        $('#grade' + count).text(grade);
    }

    function grade2(count) {
        var parcent=0;
        var subject_mark= $("#subject_total_mark").val();  
        var markw = $('#markw' + count).val();
        var total = roundToTwo(Number(markw));
        if(subject_mark==100) parcent=total;
        else parcent=total/subject_mark*100;
        $('#total' + count).text(total);
        $('#total_mark' + count).val(total);
        // console.log(parcent);
        if (0 <= parcent && parcent <= 32.99) {
            var grade = 'F';
        } else if (33 <= parcent && parcent <= 39.99) {
            var grade = 'D';
        } else if (40 <= parcent && parcent <= 49.99) {
            var grade = 'C';
        } else if (50 <= parcent && parcent <= 59.99) {
            var grade = 'B';
        } else if (60 <= parcent && parcent <= 69.99) {
            var grade = 'A-';
        } else if (70 <= parcent && parcent <= 79.99) {
            var grade = 'A';
        } else if (80 <= parcent && parcent <= 100) {
            var grade = 'A+';
        } else {
            var grade = 'Invalid';
        }
        $('#grade' + count).text(grade);
    }

    function grade_20(count) {
        var markw = $('#markw' + count).val();
        var total_100 = roundToTwo(Number(markw) * 5);
        var total = roundToTwo(Number(markw));
        $('#total' + count).text(total);
        $('#total_mark' + count).val(total);
        
        console.log(total);
        if (0 <= total_100 && total_100 <= 32.99) {
            var grade = 'F';
        } else if (33 <= total_100 && total_100 <= 39.99) {
            var grade = 'D';
        } else if (40 <= total_100 && total_100 <= 49.99) {
            var grade = 'C';
        } else if (50 <= total_100 && total_100 <= 59.99) {
            var grade = 'B';
        } else if (60 <= total_100 && total_100 <= 69.99) {
            var grade = 'A-';
        } else if (70 <= total_100 && total_100 <= 79.99) {
            var grade = 'A';
        } else if (80 <= total_100 && total_100 <= 100) {
            var grade = 'A+';
        } else {
            var grade = 'Invalid';
        }
        $('#grade' + count).text(grade);
    }

    function grade_50(count) {
        var markw = $('#markw' + count).val();
        var total_100 = roundToTwo(Number(markw) * 2);
        var total = roundToTwo(Number(markw));
        $('#total' + count).text(total);
        $('#total_mark' + count).val(total);
        console.log(total);
        if (0 <= total_100 && total_100 <= 32.99) {
            var grade = 'F';
        } else if (33 <= total_100 && total_100 <= 39.99) {
            var grade = 'D';
        } else if (40 <= total_100 && total_100 <= 49.99) {
            var grade = 'C';
        } else if (50 <= total_100 && total_100 <= 59.99) {
            var grade = 'B';
        } else if (60 <= total_100 && total_100 <= 69.99) {
            var grade = 'A-';
        } else if (70 <= total_100 && total_100 <= 79.99) {
            var grade = 'A';
        } else if (80 <= total_100 && total_100 <= 100) {
            var grade = 'A+';
        } else {
            var grade = 'Invalid';
        }
        $('#grade' + count).text(grade);
    }

    function grade3(count) {
        var markm = $('#markm' + count).val();
        var markw = $('#markw' + count).val();
        var markp = $('#markp' + count).val();
        var total = roundToTwo(Number(markm) + Number(markw) + Number(markp));
        $('#total' + count).text(total);
        $('#total_mark' + count).val(total);
        console.log(total);
        if (0 <= total && total <= 32.99) {
            var grade = 'F';
        } else if (33 <= total && total <= 39.99) {
            var grade = 'D';
        } else if (40 <= total && total <= 49.99) {
            var grade = 'C';
        } else if (50 <= total && total <= 59.99) {
            var grade = 'B';
        } else if (60 <= total && total <= 69.99) {
            var grade = 'A-';
        } else if (70 <= total && total <= 79.99) {
            var grade = 'A';
        } else if (80 <= total && total <= 100) {
            var grade = 'A+';
        } else {
            var grade = 'Invalid';
        }
        $('#grade' + count).text(grade);
    }

</script>
<script>
    $("#delete_previous_marks").on("click", function () {
        var teacher_id = $('#teacher').val();
        var input_session = $('#session_name').val();
        var input_shift = $('#shift_name').val();
        var input_group = $('#group_name').val();
        var input_section = $('#section_name').val();
        var input_exam = $('#exam_name').val();
        var input_class = $('#class_name').val();
        var input_subject = $('#subject').val();

        var post_data = {
            'teacher_id': teacher_id,
            'session_name': input_session,
            'class': input_class,
            'shift': input_shift,
            'group': input_group,
            'section': input_section,
            'exam': input_exam,
            'subject': input_subject,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Delete/previous_marks",
            data: post_data,
            success: function () {
                location.reload();
            }
        });
    });
</script>
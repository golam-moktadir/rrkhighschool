<?php
if (!empty($all_value)) {
    foreach ($all_value as $s) {
        $class_name = $s->class_name;
    }
    $class_array1 = array('1', '2');
    $class_array2 = array('3', '4', '5', '6', '7', '8');
    $class_array3 = array('9', '10');
    ?>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title" style="color: black;">Marks</h3>
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
                        <th style="text-align: center;">Bangla <br> (50)</th>
                        <th style="text-align: center;">English <br> (50)</th>
                        <th style="text-align: center;">Mathematics <br> (50)</th>
                        <th style="text-align: center;">General Knowledge + Arabic <br> (50)</th>
                        <th style="text-align: center;">Total <br> (100)</th>

                    </tr>
                <?php } elseif (in_array($class_name, $class_array2)) { ?>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Student ID</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Roll</th>
                        <th style="text-align: center;">Bangla <br> (50)</th>
                        <th style="text-align: center;">English <br> (50)</th>
                        <th style="text-align: center;">Mathematics <br> (50)</th>
                        <th style="text-align: center;">General Science <br> (50)</th>
                        <th style="text-align: center;">Social Science <br> (50)</th>
                        <th style="text-align: center;">Religion <br> (50)</th>
                        <th style="text-align: center;">Total <br> (100)</th>
                    </tr>
                <?php }
                //                elseif (in_array($class_name, $class_array3)) { ?>
                <!--                    <tr>-->
                <!--                        <th style="text-align: center;">No.</th>-->
                <!--                        <th style="text-align: center;">Student ID</th>-->
                <!--                        <th style="text-align: center;">Name</th>-->
                <!--                        <th style="text-align: center;">Roll</th>-->
                <!--                        <th style="text-align: center;">MCQ<br>(25)</th>-->
                <!--                        <th style="text-align: center;">Written Exam<br>(50)</th>-->
                <!--                        <th style="text-align: center;">Practical<br>(25)</th>-->
                <!--                        <th style="text-align: center;">Total<br>(100)</th>-->
                <!--                        <th style="text-align: center;">Grade</th>-->
                <!--                    </tr>-->
                <!--                --><?php //} ?>

                </thead>
                <tbody>
                <?php
                $count = 0;
                if (!empty($all_value)) {
                    foreach ($all_value as $single_value) {
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
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="bang<?php echo $count; ?>"
                                           id="bang<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="eng<?php echo $count; ?>"
                                           id="eng<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="math<?php echo $count; ?>"
                                           id="math<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="gk_arabic<?php echo $count; ?>"
                                           id="gk_arabic<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>

                                <input type="hidden" class="form-control" name="gs<?php echo $count; ?>"
                                       id="gs<?php echo $count; ?>">
                                <input type="hidden" class="form-control" name="ss<?php echo $count; ?>"
                                       id="ss<?php echo $count; ?>">
                                <input type="hidden" class="form-control" name="rel<?php echo $count; ?>"
                                       id="rel<?php echo $count; ?>">

                                <td style="text-align: center;" id="total<?php echo $count; ?>"></td>
                                <input type="hidden" name="total_mark<?php echo $count; ?>"
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
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="bang<?php echo $count; ?>"
                                           id="bang<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="eng<?php echo $count; ?>"
                                           id="eng<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="math<?php echo $count; ?>"
                                           id="math<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>

                                <input type="hidden" class="form-control" name="gk_arabic<?php echo $count; ?>"
                                       id="gk_arabic<?php echo $count; ?>">

                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="gs<?php echo $count; ?>"
                                           id="gs<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="ss<?php echo $count; ?>"
                                           id="ss<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>
                                <td style="text-align: center;">
                                    <input type="text" class="form-control" name="rel<?php echo $count; ?>"
                                           id="rel<?php echo $count; ?>" onkeyup="total(<?php echo $count; ?>)">
                                </td>

                                <td style="text-align: center;" id="total<?php echo $count; ?>"></td>
                                <input type="hidden" name="total_mark<?php echo $count; ?>"
                                       id="total_mark<?php echo $count; ?>">
                            </tr>
                        <?php }
                    }
                }
                ?>
                </tbody>
                <tfoot>
                <?php if (in_array($class_name, $class_array1)) { ?>
                    <tr>
                        <td colspan="8" style="text-align: center;"></td>
                        <td style="text-align: center; float: right">
                            <button type="button" class="pull-left btn btn-success" id="marks_upload">Submit &nbsp; <i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </td>
                    </tr>
                <?php } elseif (in_array($class_name, $class_array2)) { ?>
                    <tr>
                        <td colspan="10" style="text-align: center;"></td>
                        <td style="text-align: center; float: right">
                            <button type="button" class="pull-left btn btn-success" id="marks_upload">Submit &nbsp; <i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </td>
                    </tr>
                <?php } ?>
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
        var input_teacher = $('#teacher').val();
        var input_count = $('#count').val();
        var input_date = $('#date').val();

        var marks = new Array();

        for (var i = 1; i <= input_count; i++) {
            marks[i - 1] = new Array(
                $('#student_id' + i).val(), $('#name' + i).val(),
                $('#roll' + i).val(), $('#bang' + i).val(), $('#eng' + i).val(),
                $('#math' + i).val(), $('#gk_arabic' + i).val(), $('#gs' + i).val(),
                $('#ss' + i).val(), $('#rel' + i).val(), $('#total_mark' + i).val()
            );
        }
        var post_data = {
            'session_name': input_session,
            'class': input_class,
            'shift': input_shift,
            'group': input_group,
            'section': input_section,
            'exam': input_exam,
            'subject': input_subject,
            'teacher': input_teacher,
            'count': input_count,
            'date': input_date,
            'marks': marks,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        // console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Insert/insert_grade_tutorial",
            data: post_data,
            success: function (data) {
                $('#show_info3').html('');
                $('#msg').html('Mark Given Successfully');
            }
        });
    });

    function roundToTwo(num) {
        return +(Math.round(num + "e+2") + "e-2");
    }

    var mark_of = 0;

    function empty_count(count) {
        mark_of = 0;
        if ($('#bang' + count).val() == '') {
            mark_of++;
        }
        if ($('#eng' + count).val() == '') {
            mark_of++;
        }
        if ($('#math' + count).val() == '') {
            mark_of++;
        }
        if ($('#gk_arabic' + count).val() == '') {
            mark_of++;
        }
        if ($('#gs' + count).val() == '') {
            mark_of++;
        }
        if ($('#ss' + count).val() == '') {
            mark_of++;
        }
        if ($('#rel' + count).val() == '') {
            mark_of++;
        }
    }

    function total(count) {
        var bang = $('#bang' + count).val();
        var eng = $('#eng' + count).val();
        var math = $('#math' + count).val();
        var gk_arabic = $('#gk_arabic' + count).val();
        var gs = $('#gs' + count).val();
        var ss = $('#ss' + count).val();
        var rel = $('#rel' + count).val();
        empty_count(count);

        mark_of = 350 - mark_of*50;
        // console.log(mark_of);

        var total = roundToTwo((Number(bang) + Number(eng) +
            Number(math) + Number(gk_arabic) + Number(gs) +
            Number(ss) + Number(rel)) * 100 / mark_of) ;

        $('#total' + count).text(total);
        $('#total_mark' + count).val(total);
    }

</script>
<?php
$class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
$class_array2 = array('6', '7', '8');
$class_array3 = array('9', '10');
$subject_50 = array(
    'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
    'General Knowledge + Computer', 'ICT', 'Arts And Crafts', 'Physical Education & Health',
    'Work & Life Oriented Education'
);
?>

<div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th style="text-align: center;">SL</th>
            <th style="text-align: center;">Student ID</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Roll</th>
            <?php
            $sub_count = 0;
            $subject = '';
            if (!empty($all_value)) {
                foreach ($all_subject as $single_subject) {
                    $sub_count++;
                    if ($single_subject->subject_name == 'Drawing') {
                        $subject = 'Drawing';
                    }
                    ?>
                    <th style="text-align: center;">
                        <?php echo $single_subject->subject_name; ?>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th style="text-align: center; width: 60px;">CQ</th>
                                <?php if (!in_array($single_subject->class_name, $class_array1)) { ?>
                                    <th style="text-align: center; width: 60px;">MCQ</th>
                                    <?php if ($single_subject->practical_applicable == 1) { ?>
                                        <th style="text-align: center; width: 60px;">P</th>
                                    <?php }
                                } ?>
                                <th style="text-align: center; width: 60px;">Total</th>
                            </tr>
                        </table>
                    </th>
                    <?php
                }
            }
            ?>

            <th style="text-align: center;">Total</th>
            <th style="text-align: center;">Average</th>
            <!--            <th style="text-align: center;">Grade Point</th>-->
            <!--            <th style="text-align: center;">Letter Grade</th>-->

        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($all_value)) {
            $new_count = $c / ($sub_count);
            for ($i = 1; $i <= $new_count; $i++) {
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $i; ?></td>
                    <td style="text-align: center;"><?php echo ${"student_id" . $i}; ?></td>
                    <td style="text-align: center;"><?php echo ${"student_name" . $i}; ?></td>
                    <td style="text-align: center;"><?php echo ${"student_roll" . $i}; ?></td>
                    <?php
                    $marks_50 = 0;
                    foreach (${"marks" . $i} as $info) { ?>
                        <td style="text-align: justify;">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <?php ?>
                                    <td style="text-align: center; width: 60px;">
                                        <?php if($info->subject_name == 'Tutorial'){
                                            echo $info->total_mark;
                                        } else {
                                            echo $info->written_mark;
                                        } ?>
                                    </td>
                                    <?php
                                    if (!in_array($single_subject->class_name, $class_array1)) { ?>
                                        <td style="text-align: center; width: 60px;"><?php echo $info->mcq_mark; ?></td>
                                        <?php if ($info->practical_applicable == 1) { ?>
                                            <td style="text-align: center; width: 60px;"><?php echo $info->practical_mark; ?></td>
                                        <?php }
                                    }
                                    if ($info->subject_name == $subject) {
                                        $drawing_mark = $info->total_mark;
                                    }
                                    if (in_array(${"student_class" . $i}, $class_array1)
                                        || in_array(${"student_class" . $i}, $class_array2)) {
                                        if (in_array($info->subject_name, $subject_50)) {
                                            $marks_50 += $info->total_mark;
                                        }
                                    } ?>
                                    <td style="text-align: center; width: 60px;"><?php echo $info->total_mark; ?></td>
                                </tr>
                            </table>
                        </td>
                    <?php } ?>
                    <td style="text-align: center;"><?php echo ${"total" . $i}; ?></td>
                    <td style="text-align: center;">
                        <?php if (in_array($class, $class_array3)) {
                            echo round(${"total". $i} / ($sub_count - 2 + $t_count), 2);
                        } else {
                            if ($subject == 'Drawing') {
                                echo round((${"total". $i} - $drawing_mark + ($drawing_mark * 5)) / ($sub_count + $t_count), 2);
                            } else {
                                echo round((${"total". $i} - $marks_50 + ($marks_50 * 2)) / ($sub_count + $t_count), 2);
                            }
                        } ?>
                    </td>
                    <!--                        <td style="text-align: center;">-->
                    <?php //echo ${"grade".$i};                                ?><!--</td>-->
                    <!--                        <td style="text-align: center;">-->
                    <?php //echo ${"letter".$i};                               ?><!--</td>-->
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php if (!empty($all_value)) {
    $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
    $class_array2 = array('6', '7', '8');
    $class_array3 = array('9', '10');
    $subject_50 = array('Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd', 'General Knowledge + Computer', 'ICT', 'Arts And Crafts', 'Physical Education & Health', 'Work & Life Oriented Education');
    $sub_count = 0;
    foreach ($all_subject as $single_subject) {
        $sub_count++;
        ?>
    <?php } ?>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;">SL</th>
                <th style="text-align: center;">Student ID</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Guardian Name</th>
                <th style="text-align: center;">Mobile</th>
                <th style="text-align: center;">Roll</th>
                <?php
                $sub_count = 0;
                $subject = '';
                if (!empty($all_value)) {
                    foreach ($all_subject as $single_subject) {
                        $sub_count++;
                        if ($single_subject->subject_name == 'Drawing') {
                            $subject = 'Drawing';
                        } ?>
                        <th style="text-align: center;"><?php echo $single_subject->subject_name; ?></th>
                    <?php }
                } ?>

                <th style="text-align: center;">Total</th>
                <th style="text-align: center;">Average</th>
                <th style="text-align: center;">Grade Point</th>
                <th style="text-align: center;">GPA</th>
                <?php if (isset($sms_sent)) { ?>
                    <th style="text-align: center;">SMS Status</th>
                <?php } ?>
                <!--            <th style="text-align: center;">Grade Point</th>-->
                <!--            <th style="text-align: center;">Letter Grade</th>-->

            </tr>
            </thead>
            <tbody>
            <?php
            $new_count = $c / $sub_count;
            $sl = 0;
            for ($i = 1; $i <= $sub_count; $i += $sub_count) {
                if (in_array($class, $class_array3)) {
                    if (${"fs" . $i} == 1) {
                        ${"gpa"} = ${"gpa" . $i} / ($sub_count - 3);
                    } else {
                        ${"gpa"} = ${"gpa" . $i} / ($sub_count - 3);
                    }
                } else {
                    ${"gpa"} = ${"gpa" . $i} / $sub_count;
                }
                if (0 <= ${"gpa"} && ${"gpa"} < 1) {
                    ${'grade'} = 'F';
                } else if (1 <= ${"gpa"} && ${"gpa"} < 2) {
                    ${'grade'} = 'D';
                } else if (2 <= ${"gpa"} && ${"gpa"} < 3) {
                    ${'grade'} = 'C';
                } else if (3 <= ${"gpa"} && ${"gpa"} < 3.5) {
                    ${'grade'} = 'B';
                } else if (3.5 <= ${"gpa"} && ${"gpa"} < 4) {
                    ${'grade'} = 'A-';
                } else if (4 <= ${"gpa"} && ${"gpa"} < 5) {
                    ${'grade'} = 'A';
                } else if (${"gpa"} >= 5) {
                    ${"gpa"} = 5.00;
                    ${'grade'} = 'A+';
                }

                if (${'grade'} == 'F' || ${'grade'} == 'Invalid') {
                    $status = 'Failed';
                } else {
                    $status = 'Passed';
                }
                ${"total"} = ${"total" . $i}; ?>
                <tr>
                    <td style="text-align: center;"><?php echo ++$sl; ?></td>
                    <td style="text-align: center;"><?php echo ${"student_id" . $i}; ?></td>
                    <td style="text-align: center;"><?php echo ${"student_name" . $i}; ?></td>
                    <td style="text-align: center;"><?php echo ${"guardian_name" . $i}; ?></td>
                    <td style="text-align: center;"><?php echo ${"guardian_mobile" . $i}; ?></td>
                    <td style="text-align: center;"><?php echo ${"student_roll" . $i}; ?></td>
                    <?php
                    $marks_50 = 0;
                    foreach (${"marks" . $i} as $info) {
                        if ($info->subject_name == $subject) {
                            $drawing_mark = $info->total_mark;
                        }
                        if (in_array(${"student_class" . $i}, $class_array1)
                            || in_array(${"student_class" . $i}, $class_array2)) {
                            if (in_array($info->subject_name, $subject_50)) {
                                $marks_50 += $info->total_mark;
                            }
                        } ?>
                        <td style="text-align: center;"><?php echo $info->total_mark; ?></td>
                    <?php } ?>
                    <td style="text-align: center;"><?php echo ${"total"}; ?></td>
                    <td style="text-align: center;">
                        <?php if (in_array($class, $class_array3)) {
                            echo round(${"total"} / ($sub_count - 2), 2);
                        } else {
                            if ($subject == 'Drawing') {
                                echo round((${"total"} - $drawing_mark + ($drawing_mark * 5)) / $sub_count, 2);
                            } else {
                                echo round((${"total"} - $marks_50 + ($marks_50 * 2)) / $sub_count, 2);
                            }
                        } ?>
                    </td>
                    <td style="text-align: center;"><?php echo round(${"gpa"}, 2); ?></td>
                    <td style="text-align: center;"><?php echo ${"grade"}; ?></td>
                    <?php if (isset($sms_sent)) { ?>
                        <td style="text-align: center;"><?php echo ${"sms" . $i}; ?></td>
                    <?php } ?>
                    <!--                        <td style="text-align: center;">-->
                    <?php //echo ${"grade".$i}; ?><!--</td>-->
                    <!--                        <td style="text-align: center;">-->
                    <?php //echo ${"letter".$i}; ?><!--</td>-->
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
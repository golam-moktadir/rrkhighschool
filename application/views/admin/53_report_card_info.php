<?php
$class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
$class_array2 = array('6', '7', '8');
$class_array3 = array('9', '10');

$subject_50 = array(
    'Bangla 2nd Paper', 'English 2nd Paper', 'English 2nd',
    'General Knowledge + Computer', 'ICT', 'Arts And Crafts',
    'Physical Education & Health', 'Work & Life Oriented Education'
);

if (!empty($all_value)) {
    foreach ($all_value as $v) {
        $class = $v->class_name;
    }
    ?>
    <div class="table-responsive" style="width: 98%; overflow-x: scroll; color: black;">
        <div class="row">
            <div class="col-xs-4"  style="text-align: center;">
                <b>Name of Student: <?php echo $st_name; ?>
            </div>
            <div class="col-xs-4"  style="text-align: center;">
                <b>Father's Name: </b><?php echo $st_father_name; ?>
            </div>
            <div class="col-xs-4"  style="text-align: center;">
                <b>Mother's Name: </b><?php echo $st_mother_name; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4"  style="text-align: center;">
                <b>Student ID: </b><?php echo $st_id; ?>
            </div>
            <div class="col-xs-3">
                <b>Class: </b><?php echo $st_class; ?>
            </div>
            <div class="col-xs-2"  style="text-align: center;">
                <b>Roll No: </b><?php echo $st_roll; ?>
            </div>
            <div class="col-xs-3"  style="text-align: center;">
                <b>Section: </b><?php echo $st_section_name; ?>
            </div>
        </div>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">Subject</th>
                    <th style="text-align: center;">Subject Total</th>
                    <?php if (in_array($class, $class_array1)) { ?>
                        <th style="text-align: center;">CQ</th>
                    <?php } elseif (in_array($class, $class_array2)) { ?>
                        <th style="text-align: center;">CQ</th>
                        <th style="text-align: center;">MCQ</th>
                    <?php } elseif (in_array($class, $class_array3)) { ?>
                        <th style="text-align: center;">CQ</th>
                        <th style="text-align: center;">MCQ</th>
                        <th style="text-align: center;">Prac</th>
                    <?php } ?>
                    <th style="text-align: center;">Total Mark</th>
                    <th style="text-align: center;">GPA</th>
                    <th style="text-align: center;">Letter Grade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $c; $i++) {
                    ${"gpa"} = ${"gpa" . $i};
                    if (0 <= ${"gpa"} && ${"gpa"} < 1) {
                        ${'grade'} = 'F';
                    } else if (1 <= ${"gpa"} && ${"gpa"} < 2) {
                        ${'grade'} = 'D';
                    } else if (2 <= ${"gpa"} && ${"gpa"} < 3) {
                        ${'grade'} = 'C';
                    } else if (3 <= ${"gpa"} && ${"gpa"} < 3.50) {
                        ${'grade'} = 'B';
                    } else if (3.50 <= ${"gpa"} && ${"gpa"} < 4) {
                        ${'grade'} = 'A-';
                    } else if (4 <= ${"gpa"} && ${"gpa"} < 5) {
                        ${'grade'} = 'A';
                    } else if (5 <= ${"gpa"}) {
                        ${'grade'} = 'A+';
                    } else {
                        ${'grade'} = 'Invalid';
                    }
                    if (${"marks" . $i} != 0) {
                        ?>
                        <tr>
                            <td style="text-align: center;" class="sortnr"><?php echo ${"subject" . $i}; ?></td>
                            <td style="text-align: center;" class="sortnr">
                                <?php
                                if (${"subject" . $i} == 'Drawing') {
                                    echo '20';
                                } elseif (in_array(${"subject" . $i}, $subject_50)) {
                                    echo '50';
                                } else {
                                    echo '100';
                                }
                                ?>
                            </td>
                            <?php if (in_array($class, $class_array1)) { ?>
                                <td style="text-align: center;" class="sortnr"><?php echo ${"w_mark" . $i}; ?></td>
                            <?php } elseif (in_array($class, $class_array2)) { ?>
                                <td style="text-align: center;" class="sortnr"><?php echo ${"w_mark" . $i}; ?></td>
                                <td style="text-align: center;" class="sortnr"><?php echo ${"mcq" . $i}; ?></td>
                            <?php } elseif (in_array($class, $class_array3)) { ?>
                                <td style="text-align: center;" class="sortnr"><?php echo ${"w_mark" . $i}; ?></td>
                                <td style="text-align: center;" class="sortnr"><?php echo ${"mcq" . $i}; ?></td>
                                <td style="text-align: center;" class="sortnr"><?php echo ${"prac" . $i}; ?></td>
                            <?php } ?>
                            <td style="text-align: center;" class="sortnr"><?php echo ${"marks" . $i}; ?></td>
                            <td style="text-align: center;" class="sortnr"><?php echo round(${"gpa" . $i}, 2); ?></td>
                            <td style="text-align: center;" class="sortnr"><?php echo ${"grade"}; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="col-xs-4" style="margin-top: 15px;">
            <p style="text-align: left; font-size: 16px; color: black; font-weight: bold;">
                ------------------------------<br>
                Guardian
            </p>
        </div>
        <div class="col-xs-4"  style="margin-top: 15px;">
            <p style="text-align: center; font-size: 16px; color: black; font-weight: bold;">
                ------------------------------<br>
                Class Teacher
            </p>
        </div>
        <div class="col-xs-4"  style="margin-top: 15px;">
            <p style="text-align: right; font-size: 16px; color: black; font-weight: bold;">
                ------------------------------<br>
                Principal
            </p>
        </div>
    </div>
<?php } ?>

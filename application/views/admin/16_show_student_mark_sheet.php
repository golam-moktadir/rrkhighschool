<?php
function nfa($str)
{
    $search = array("10", "2", "3", "4", "5", '6', "7", "8", "9", "1");
    $replace = array("Ten", "Two", "Three", "Four", "Five", "Six", 'Seven', "Eight", "Nine", "One");
    return str_replace($search, $replace, $str);
}

$class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
$class_array2 = array('6', '7', '8');
$class_array3 = array('9', '10');
if (!empty($all_value)) {
    if (!empty($all_mark)) {
        ?>
        <div>
            <div class="box-header" id="no_print2">
                <h3 class="box-title" style="color: black;">Generate Progress Report</h3>
            </div>
            <p style="padding-left: 10px;">
                <button id="print_button" title="Click to Print" type="button"
                        onClick="window.print()" class="btn btn-flat btn-warning">Print
                </button>
            </p>
            <?php
            $count = 0;
            for ($i = 1; $i <= $count_st; $i++) {
                ?>
                <div class="box-body " style="width: 95%; color: black;margin-left: auto; margin-right: auto;">
                    <table id="example2" style="border:5px black dashed; background-color: papayawhip !important;">
                        <tbody>
                        <tr>
                            <td style="width: 80%; padding: 10px 20px 10px 20px;">
                                <p style="text-align: center;">
                                    <img src="<?php echo base_url(); ?>assets/img/banner2.jpg"
                                         alt="Logo" style="width: 40%; height: 80%;">
                                </p>
                                <div class="row">
                                    <div class="col-xs-4" align="right"></div>
                                    <div class="col-xs-4" align="right">
<!--                                        <p style="text-align: center;">-->
<!--                                            <img src="--><?php //echo base_url(); ?><!--assets/img/logo.png"-->
<!--                                                 alt="Logo" style="width: 80px; height: 80px;">-->
<!--                                        </p>-->
                                        <p style="font-size: 16px; color: #843534; font-weight: bold; text-align: center;">
                                            PROGRESS REPORT
                                        </p>
                                        <p style="font-size: 16px; color: black; font-weight: bold; text-align: center;">
                                            Class: <?php echo nfa(${"class_name" . $i}); ?>
                                        </p>
                                        <p style="font-size: 16px; color: black; font-weight: bold; text-align: center;">
                                            Exam Type: <?php echo $exam_type; ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-4" align="right">
                                        <img src="<?php echo base_url(); ?>assets/img/mark.png"
                                             alt="Logo" width="200px" height="180px">
                                    </div>
                                </div>
                                <p style="font-size: 16px; color: #066; font-weight: bold; padding-top: 10px;">
                                    Name of Student: <?php echo ${"name" . $i}; ?>
                                </p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <p style="font-size: 14px; color: black; font-weight: bold;">
                                            Father's Name: <?php echo ${"father_name" . $i}; ?>
                                        </p>
                                        <p style="font-size: 14px; color: black; font-weight: bold;">
                                            ID: <?php echo ${"student_unique_id" . $i}; ?>
                                        </p>
                                        <p style="font-size: 14px; color: black; font-weight: bold;">
                                            <?php if (in_array(${"class_name" . $i}, $class_array3)) {
                                                echo 'Group: ' . strtoupper(${"group_name" . $i});
                                            } else {
                                                echo 'Section: ' . strtoupper(${"section_name" . $i});
                                            } ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-6">
                                        <p style="font-size: 14px; color: black; font-weight: bold;">
                                            Mother's Name: <?php echo ${"mother_name" . $i}; ?>
                                        </p>
                                        <p style="font-size: 14px; color: black; font-weight: bold;">
                                            Roll No: <?php echo ${"roll" . $i}; ?>
                                        </p>

                                    </div>

                                </div>

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Sl.</th>
                                        <th style="text-align: center;">Name of Subjects</th>
                                        <th style="text-align: center;">Acheived Mark</th>
                                        <th style="text-align: center;">Letter Grade</th>
                                        <th style="text-align: center;">Grade Points</th>
                                        <th style="text-align: center;">Grade Points Average (GPA)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($j = 1; $j <= $count_it; $j++) {
                                        if (strpos(${"subject" . $j . $i}, "ENGLISH 1st") !== false
                                            || strpos(${"subject" . $j . $i}, "BANGLA 1st") !== false) {
                                            ${"gpa"} = ${"gpa" . ($j + 1) . $i};
                                        } else {
                                            ${"gpa"} = ${"gpa" . $j . $i};
                                        }
                                        if(0 <= ${"gpa"} && ${"gpa"} <1){
                                            ${'grade'} = 'F';
                                        }else if (0 <= ${"gpa"} && ${"gpa"} < 2) {
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
                                            ${'grade'} = 'A+';
                                        }
                                        if (${"marks" . $j . $i}) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center;" class="sortnr"><?php echo $j; ?></td>
                                                <td style="text-align: center;"
                                                    class="sortnr"><?php echo ${"subject" . $j . $i}; ?></td>
                                                <td style="text-align: center;"
                                                    class="sortnr">
                                                    <?php echo ${"marks" . $j . $i}; ?>
                                                </td>
                                                <?php ?>
                                                    <?php if (strpos(${"subject" . $j . $i}, "ENGLISH 1st") !== false
                                                        || strpos(${"subject" . $j . $i}, "BANGLA 1st") !== false) {
                                                        echo "<td rowspan='2' style='text-align: center; vertical-align: middle' class='sortnr'>" . ${"grade"} . "</td>
                                                            <td rowspan='2' style='text-align: center; vertical-align: middle' class='sortnr'>" . round(${"gpa" . ($j + 1) . $i}, 2) . "</td>";
                                                    } elseif (strpos(${"subject" . $j . $i}, "ENGLISH 2nd") !== false
                                                        || strpos(${"subject" . $j . $i}, "BANGLA 2nd") !== false) {
                                                        echo "";
                                                    } else {
                                                        echo "<td style='text-align: center;' class='sortnr'>" . ${"grade"} . "</td>
                                                            <td style='text-align: center;' class='sortnr'>" . round(${"gpa" . $j . $i}, 2) . "</td>";
                                                    } ?>

                                                <?php  ?>
                                                <td style="text-align: center; border: none;">
                                                    <?php
                                                    if ($j == (ceil(($sub_count + $t_count) / 2))) {
                                                        echo round(${"total_gpa" . $i}, 2);
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>

                                <p style="font-size: 14px; color: black; font-weight: bold;  padding-top: 20px;">
                                    Date of Publication of Result: <?php echo $published_date; ?>
                                </p>
                                <br><br>
                                <div class="col-xs-4">
                                    <p style="text-align: left; font-size: 16px; color: black; font-weight: bold;">
                                        ------------------------------<br>
                                        Guardian
                                    </p>
                                </div>
                                <div class="col-xs-4">
                                    <p style="text-align: center; font-size: 16px; color: black; font-weight: bold;">
                                        ------------------------------<br>
                                        Class Teacher
                                    </p>
                                </div>
                                <div class="col-xs-4">
                                    <p style="text-align: right; font-size: 16px; color: black; font-weight: bold;">
                                        ------------------------------<br>
                                        Principal
                                    </p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="page-break"></div>

            <?php } ?>

        </div>

    <?php }
} ?>

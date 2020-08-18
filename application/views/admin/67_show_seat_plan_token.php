<?php
$class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
$class_array2 = array('6', '7', '8');
$class_array3 = array('9', '10');
?>


<div>
    <div class="box-header" id="no_print3">
        <h3 class="box-title" style="color: black;">Seat Plan Tokens</h3>
    </div>
    <p style="padding-left: 10px;">
        <button id="print_button" title="Click to Print" type="button"
                onClick="window.print()" class="btn btn-flat btn-warning">Print
        </button>
    </p>
    <div class="box-body table-responsive" style="width: 98%; color: black;">
        <table id="example2" class="table table-bordered table-hover">

            <tbody>
                <tr>
                    <?php
                    $count = 0;
                    foreach ($all_value as $single_value) {
                        $count++;
                        if ($count % 3 == 0) {
                            ?>
                            <td style="text-align: left;">
                                <p style="font-size: 20px; color: #066; font-weight: bold;">
                                    Exam: <?php echo $exam_name; ?>
                                </p>
                                <p style="font-size: 16px; color: #066; font-weight: bold;">
                                    Name: <?php echo $single_value->name; ?>
                                </p>
                                <p style="font-size: 16px; color: #066; font-weight: bold;">
                                    Father's Name: <?php echo $single_value->father_name; ?>
                                </p>
                                <p style="font-size: 16px; color: black; font-weight: bold;">
                                    ID: <?php echo $single_value->student_unique_id; ?>
                                </p>
                                <p style="font-size: 16px; color: black; font-weight: bold;">
                                    Class: <?php echo $single_value->class_name; ?>
                                </p>
                                <?php if (in_array($single_value->class_name, $class_array3)) { ?>
                                    <p style="font-size: 16px; color: black; font-weight: bold;">
                                        Group: <?php echo $single_value->group_name; ?>
                                    </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; color: black; font-weight: bold;">
                                        Section: <?php echo $single_value->section_name; ?>
                                    </p>
                                <?php } ?>
                                <p style="font-size: 16px; color: black; font-weight: bold;">
                                    Roll: <?php echo $single_value->roll; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                        <?php } else { ?>
                            <td style="text-align: left;">
                                <p style="font-size: 20px; color: #066; font-weight: bold;">
                                    Exam: <?php echo $exam_name; ?>
                                </p>
                                <p style="font-size: 16px; color: #066; font-weight: bold;">
                                    Name: <?php echo $single_value->name; ?>
                                </p>
                                <p style="font-size: 16px; color: #066; font-weight: bold;">
                                    Father's Name: <?php echo $single_value->father_name; ?>
                                </p>
                                <p style="font-size: 16px; color: black; font-weight: bold;">
                                    ID: <?php echo $single_value->student_unique_id; ?>
                                </p>
                                <p style="font-size: 16px; color: black; font-weight: bold;">
                                    Class: <?php echo $single_value->class_name; ?>
                                </p>
                                <?php if (in_array($single_value->class_name, $class_array3)) { ?>
                                    <p style="font-size: 16px; color: black; font-weight: bold;">
                                        Group: <?php echo $single_value->group_name; ?>
                                    </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; color: black; font-weight: bold;">
                                        Section: <?php echo $single_value->section_name; ?>
                                    </p>
                                <?php } ?>
                                <p style="font-size: 16px; color: black; font-weight: bold;">
                                    Roll: <?php echo $single_value->roll; ?>
                                </p>
                            </td>
                            <?php
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
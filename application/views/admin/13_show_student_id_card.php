<?php
$class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
$class_array2 = array('6', '7', '8');
$class_array3 = array('9', '10');
?>

<div class="">
    <div class="box-header" id="no_print3">
        <h3 class="box-title" style="color: black;">Generate ID Card</h3>
    </div>
    <p style="padding-left: 10px;">
        <button id="print_button" title="Click to Print" type="button"
                onClick="window.print()" class="btn btn-flat btn-warning">Print
        </button>
    </p>
    <div style="width: 90%; color: black;">
        <table id="example2" class="table">
            <thead>
            <tr>
                <th style="text-align: center;" id="no_print4">SL</th>
                <th style="text-align: center;" id="no_print5">Student ID</th>
                <th style="text-align: center;" id="no_print6">Design</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($all_value as $single_value) {
                $count++;
                ?>
                <tr style="border: 0px;">
                    <td style="text-align: center;" id="no_print8"><?php echo $count; ?></td>
                    <td style="text-align: center;"
                        id="no_print9"><?php echo $single_value->student_unique_id; ?></td>
                    <td style="padding: 10px 20px 10px 20px; background-color: white;">
                        <div style="width: 5.2cm; height: 8.4cm; border:3px black solid; !important; padding: 10px; margin-left: 42%;">

                            <p style="text-align: center; font-size: 10px; color: black; font-weight: bold;">
                                <b style="font-size: 8px"><?= strtoupper(DC) ?></b><br>
                                <b style="font-size: 8px">Ramchandrapur, Muradnagar, Comilla.</b>
                            </p>

                            <p style="text-align: center; margin-top: -8px;">
                                <?php if (file_exists('./assets/img/student/' . $single_value->image)) { ?>
                                    <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $single_value->image; ?>"
                                         alt="Logo" width="30%" height="60%">
                                    <?php
                                } else {
                                    echo "Student Image";
                                }
                                ?>
                            </p>
                            <p style="text-align: center; font-size: 8px; border: 2px black solid; border-radius: 15px; margin-top: -2px;">
                                <strong>STUDENT ID CARD</strong>
                            </p>
                            <p style="text-align: center; font-size: 9px; color: black; font-weight: bold;">
                                Roll: <?php echo $single_value->roll; ?>
                            </p>
                            <div class="col-xs-3" style="text-align: left; font-size: 10px; font-weight: bold;">
                                STUDENT  <br> ID <br> FATHER  <br> CLASS <br> MOBILE <br>
                                <br>Issue.Dt
                            </div>
                            <div class="col-xs-9" style="text-align: left; font-size: 10px; font-weight: bold; white-space: nowrap;">
                                : <?php echo $single_value->name; ?><br>
                                : <?php echo $single_value->student_unique_id; ?><br>
                                : <?php echo $single_value->father_name; ?><br>
                                : <?php echo nfa($single_value->class_name);
                                if (in_array($single_value->class_name, $class_array3)) {
                                    echo ' (' . strtoupper($single_value->group_name) . ')';
                                } else {
                                    echo ' (' . strtoupper($single_value->section_name) . ')';
                                }
                                ?><br>
                                : <?php echo $single_value->parents_mobile; ?><br><br>
                                : <?php echo date("d/m/y", strtotime($validity)); ?>
                            </div>
                            <p class="col-xs-6"
                                 style="text-align: left; font-size: 8px; color: black; font-weight: bold; margin-top: 10px;">

                            </p>

                            <div class="col-xs-6"
                                 style="text-align: right; font-size: 8px; color: black; font-weight: bold; padding-right: 20px; padding-top: 10px">
                                <img src="<?php echo base_url(); ?>assets/img/signature.jpg"
                                alt="Logo" width="60%" height="60%"><br>
                                ____________<br>
                                Principal
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


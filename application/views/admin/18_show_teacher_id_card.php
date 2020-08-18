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
    <div class="box-body table-responsive" style="width: 90%; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;" id="no_print4">SL</th>
                <th style="text-align: center;" id="no_print5">Teacher ID</th>
                <th style="text-align: center;" id="no_print6">Design</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($all_value as $single_value) {
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;" id="no_print8"><?php echo $count; ?></td>
                    <td style="text-align: center;"
                        id="no_print9"><?php echo $single_value->teacher_unique_id; ?></td>
                    <td style="text-align: center;">
                        <div style="width: 5.2cm; height: 8.0cm; border:3px black solid; !important; padding: 10px; margin-left: 42%;">
                            <p style="text-align: center; font-size: 10px; color: black; font-weight: bold;">
                                <b style="font-size: 8px"><?= strtoupper(DC) ?></b><br>
                                <b style="font-size: 8px">Ramchandrapur, Muradnagar, Comilla.</b><br>
                            </p>

                            <p style="text-align: center; margin-top: -8px;">
                                <?php if (file_exists('./assets/img/teacher/' . $single_value->image)) { ?>
                                    <img src="<?php echo base_url(); ?>assets/img/teacher/<?php echo $single_value->image; ?>"
                                         alt="Logo" width="30%" height="60%">
                                    <?php
                                } else {
                                    echo "Teacher Image";
                                }
                                ?>
                            </p>
                            <p style="text-align: center; font-size: 8px; border: 2px black solid; border-radius: 15px; margin-top: -2px;">
                                <strong>TEACHER ID CARD</strong>
                            </p>
                            <p style="text-align: center; font-size: 9px; color: black; font-weight: bold;">
                                <?php echo $single_value->designation; ?>
                            </p>
                            <div class="col-xs-3" style="text-align: left; font-size: 10px; font-weight: bold;">
                                NAME <br> ID <br> B.GROUP  <br> MOBILE <br>
                                <br>Validity
                            </div>
                            <div class="col-xs-9" style="text-align: left; font-size: 10px; font-weight: bold;">
                                : <?php echo $single_value->name; ?><br>
                                : <?php echo $single_value->teacher_unique_id; ?><br>
                                : <?php echo $single_value->blood_group; ?><br>
                                : <?php echo $single_value->mobile; ?><br><br>
                                : <?php echo date("d-M-Y", strtotime($validity)) ?>
                            </div>
                            <p class="col-xs-6"
                               style="text-align: left; font-size: 8px; color: black; font-weight: bold; margin-top: 10px;">

                            </p>
                            <div class="col-xs-6"
                                 style="text-align: right; font-size: 8px; color: black; font-weight: bold; padding-right: 20px; padding-top: 10px">
                                <img src="<?php echo base_url(); ?>assets/img/signature.png"
                                     alt="Logo" width="60%" height="60%"><br>
                                ____________<br>
                                Head Master
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


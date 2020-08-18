<?php if (!empty($all_value)) {
    $class_array1 = array('Play', 'Nursery', '1', '2', '3', '4', '5');
    $class_array2 = array('6', '7', '8');
    $class_array3 = array('9', '10');
    $sub_count = 0;
    foreach ($all_subject as $single_subject) {
        $sub_count++;
        ?>
    <?php }

    function nfa($str)
    {
        $search = array("10", "2", "3", "4", "5", '6', "7", "8", "9", "1");
        $replace = array("Ten", "Two", "Three", "Four", "Five", "Six", 'Seven', "Eight", "Nine", "One");
        return str_replace($search, $replace, $str);
    } ?>
    <div class="box">
        <div class="box-header" id="no_print3">
            <h3 class="box-title" style="color: black;">Generate Testimonial</h3>
        </div>
        <p style="padding-left: 10px;">
            <button id="print_button" title="Click to Print" type="button"
                    onClick="window.print()" class="btn btn-flat btn-warning">Print
            </button>
        </p>
        <div class="box-body table-responsive" style="width: 98%;  color: black;">
            <table id="example2" class="">
                <thead>
                <tr>
                    <th style="text-align: center; width: 10%;" id="no_print4">SL</th>
                    <th style="text-align: center; width: 10%;" id="no_print5">Student ID</th>
                    <th style="text-align: center; width: 80%;" id="no_print6">Testimonial</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $new_count = $c / $sub_count;
                for ($i = 1; $i <= $new_count; $i++) {
                    if (in_array($class, $class_array3)) {
                        if (${"fs" . $i} == 1) {
                            ${"gpa"} = ${"gpa" . $i} / ($sub_count -3 + $t_count);
                        } else {
                            ${"gpa"} = ${"gpa" . $i} / ($sub_count -3 + $t_count);
                        }
                    } else {
                        ${"gpa"} = ${"gpa" . $i} / ($sub_count + $t_count);
                    }
                    if (${"gpa"} >= 5) {
                        ${"gpa"} = 5.00;
                    }
                    ?>
                    <tr>
                        <td style="text-align: center; width: 10%;" id="no_print7"><?php echo $i; ?></td>
                        <td style="text-align: center; width: 10%;"
                            id="no_print8"><?php echo ${'student_id'.$i}; ?></td>
                        <td  style="text-align: center; border:5px black dashed; background-color: papayawhip !important;" id="divToPrint">
                            <p style="text-align: center;">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4"></div>
                                <div class="col-sm-4 col-xs-4" id="icon">
                                    <img src="<?php echo base_url(); ?>assets/img/banner2.jpg" width="100%"
                                         height="100%">
                                </div>
                                <div class="col-sm-4 col-xs-4"></div>
                            </div>
                            </p>
                            <p style="font-size: 20px; color: #066; font-weight: bold;">
                            <h3>Testimonial</h3></p>

                            <p style="font-size: 16px; color: black; font-weight: bold; text-align: justify; padding: 10px;">
                                <br>
                                This is to certify that <?php echo ${'student_name'.$i}; ?> son/daughter of
                                <?php echo ${'father_name'.$i}; ?> and <?php echo${'mother_name'.$i}; ?>,
                                a student of this institute bearing ID
                                No. <?php echo ${'student_id'.$i}; ?>
                                passed the <?php echo $exam; ?> examination of
                                class <?php echo nfa($class); ?> and secured G.P.A <?php echo round(${'gpa'},2);?>
                                on scale of 5.00. His/her date of birth as recorded in his/her registration book is
                                <?php echo date("d F, Y",strtotime(${'birth_date'.$i})); ?>
                                <br><br>
                                To the best in my knowledge and belief he/she is a good student.
                                During this study period he/she did not take part in any activities
                                subversive of the state or of discipline.
                                <br><br>
                                I wish him/her every success in life.
                                <br><br><br>
                            </p>
                            <p style="font-weight: bold; text-align: left; margin-right: 18px; padding: 10px;">
                                Date: <?php echo date('d-m-Y'); ?></p>

                            <p style="font-size: 16px; color: black; font-weight: bold; text-align: right; padding-right: 20px;">
                                _____________________</p>
                            <p style="font-size: 16px; color: black; font-weight: bold; text-align: right; padding-right: 60px;">
                                Principal</p>
                            <p style="font-size: 16px; color: black; font-weight: bold; text-align: right;"></p>
                        </td>
                    </tr>
                    <tr><td> &nbsp;</td></tr>
                    <tr><td> &nbsp;</td></tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <p style="font-size: 20px; color: red;"><?php echo $all_val; ?></p>
<?php } ?>
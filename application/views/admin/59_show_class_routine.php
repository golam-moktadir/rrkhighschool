<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="">
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <h3 class="box-title" style="color: black;">Class Routine</h3>
                        <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                                               onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Day</th>
                                    <?php foreach ($all_class_time as $single_time) { ?>
                                        <th style="text-align: center;"><?php echo date('h:i A', strtotime($single_time->class_time)); ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">Saturday</td>
                                    <?php for ($i = 1; $i <= $total_class; $i++) { ?>
                                        <td style="text-align: center;">
                                            <?php echo ${"saturday_subject" . $i} ?><br>
                                            <?php echo ${"saturday_teacher_name" . $i} ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">Sunday</td>
                                    <?php for ($i = 1; $i <= $total_class; $i++) { ?>
                                        <td style="text-align: center;">
                                            <?php echo ${"sunday_subject" . $i} ?><br>
                                            <?php echo ${"sunday_teacher_name" . $i} ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">Monday</td>
                                    <?php for ($i = 1; $i <= $total_class; $i++) { ?>
                                        <td style="text-align: center;">
                                            <?php echo ${"monday_subject" . $i} ?><br>
                                            <?php echo ${"monday_teacher_name" . $i} ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">Tuesday</td>
                                    <?php for ($i = 1; $i <= $total_class; $i++) { ?>
                                        <td style="text-align: center;">
                                            <?php echo ${"tuesday_subject" . $i} ?><br>
                                            <?php echo ${"tuesday_teacher_name" . $i} ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">Wednesday</td>
                                    <?php for ($i = 1; $i <= $total_class; $i++) { ?>
                                        <td style="text-align: center;">
                                            <?php echo ${"wednesday_subject" . $i} ?><br>
                                            <?php echo ${"wednesday_teacher_name" . $i} ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">Thursday</td>
                                    <?php for ($i = 1; $i <= $total_class; $i++) { ?>
                                        <td style="text-align: center;">
                                            <?php echo ${"thursday_subject" . $i} ?><br>
                                            <?php echo ${"thursday_teacher_name" . $i} ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">Friday</td>
                                    <?php for ($i = 1; $i <= $total_class; $i++) { ?>
                                        <td style="text-align: center;">
                                            <?php echo ${"friday_subject" . $i} ?><br>
                                            <?php echo ${"friday_teacher_name" . $i} ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<style>
    @media print {  
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
        #no_print1 {
            display: none;
        }
        #no_print2 {
            display: none;
        }
        #no_print3 {
            display: none;
        }
    }
    table.table-bordered{
        border: #003399 1px solid;
    }
    table.table-bordered > thead > tr > th{
        border: #003399 1px solid;
    }
    table.table-bordered > tbody > tr > td{
        border: #003399 1px solid;
    }
</style>      


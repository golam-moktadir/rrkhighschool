<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info">
                    <div id="printit" style="text-align: center;">
                        <div class="row">
                            <div class="box-header"  style="color: black; text-align: center;">
                                <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg" 
                                         alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
                            </div>
                        </div>
                        <button id="printOut" onclick="window.print();" style="float: left; margin: 10px;" class="btn btn-flat btn-warning">Print</button>
                        <div class="box-body table-responsive" style="width: 98%; color: black; text-align: center;">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; border: 2px solid black;"><p style="text-align: center;">Date: <?php echo $date; ?></p></td>
                                        <td style="text-align: center; border: 2px solid black;"><p style="text-align: center;">Invoice No: <?php echo $invoice_no; ?></p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-body table-responsive" style="width: 98%; color: black;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; border: 2px solid black;">SL</th>
                                        <th style="text-align: center; border: 2px solid black;">Student ID</th>
                                        <th style="text-align: center; border: 2px solid black;">Hostel</th>
                                        <th style="text-align: center; border: 2px solid black;">Particular</th>
                                        <th style="text-align: center; border: 2px solid black;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($all_value as $single_value) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <td style="text-align: center; border: 2px solid black;"><?php echo $count; ?></td>
                                            <td style="text-align: center; border: 2px solid black;"><?php echo $single_value->student_id; ?></td>
                                            <td style="text-align: center; border: 2px solid black;"><?php echo $single_value->dormitory_name; ?></td>
                                            <td style="text-align: center; border: 2px solid black;"><?php echo preg_replace('%,%', ' ', $single_value->month); ?></td>
                                            <td style="text-align: center; border: 2px solid black;"><?php echo $single_value->amount; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
        #printOut {
            display: none;
        }
    }
    /*    @page {
            size: auto;    auto is the initial value
            margin: 0;   this affects the margin in the printer settings
        }*/
</style>
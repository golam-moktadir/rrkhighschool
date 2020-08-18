<?php if (!empty($all_value)) { ?>

    <div class="row">
        <div class="box-header"  style="color: black; text-align: center;">
            <h3><img src="<?php echo base_url(); ?>assets/img/gangriho_full.jpg" 
                     alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
        </div>
        <h3 class="box-title" style="color: black; text-align: center;"><u>Collection Report</u></h3>
        <p style="padding-left: 20px;"><button id="print_button" title="Click to Print" type="button"
                                               onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
    </div>

    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">SL</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Invoice No.</th>
                    <th style="text-align: center;">Class</th>
                    <th style="text-align: center;">Group</th>
                    <th style="text-align: center;">Student ID</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Hostel Name</th>
                    <th style="text-align: center;">Particular</th>
                    <th style="text-align: center;">Amount</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Discount</th>
                    <th style="text-align: center;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $c; $i++) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo ${"sl" . $i}; ?></td>
                        <td style="text-align: center; "><p style="text-align: center;"><?php echo date('d F, Y', strtotime(${"date" . $i})); ?></p></td>
                        <td style="text-align: center; "><p style="text-align: center;"><?php echo ${"invoice" . $i}; ?></p></td>
                        <td style="text-align: center;"><?php echo ${"class" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"group" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"student_id" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"student_name" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"hall" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo preg_replace('%Fee%', 'Fee<br>', ${"description" . $i}); ?></td>
                        <td style="text-align: center;"><?php echo ${"amount" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"quantity" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"discount" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"total" . $i}; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="12" style="color: teal; text-align: right;">Net Total</td>
                    <td style="text-align: center;"><?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
<?php } ?>


<style>

    @media print {
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
        #printOut {
            display: none;
        }
        #cr_div {
            display: none;
        }
        #cr_title {
            display: none;
        }
        #get_collection {
            display: none;
        }
    }
</style>


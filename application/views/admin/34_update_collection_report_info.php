<?php
function nfa($str)
{
    $search = array("10", "2", "3", "4", "5", '6', "7", "8", "9", "1");
    $replace = array("Ten", "Two", "Three", "Four", "Five", "Six", 'Seven', "Eight", "Nine", "One");
    return str_replace($search, $replace, $str);
}
?>

<p style="padding: 10px;">
    <button id="print_button" title="Click to Print" type="button"
            onClick="window.print()" class="btn btn-flat btn-warning">Print
    </button>
</p>

<div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black; margin-top: -80px;">
    <div class="box-header" style="color: black; text-align: center;">
        <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                 alt="Logo" width="30%" height="60px" style="border-radius: 15px;"></h3>
    </div>
    <h3 class="box-title" style="color: black; text-align: center; padding-bottom: 20px; font-size: 17px;"><u>Collection
            Report</u></h3>
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th style="text-align: center; font-size: 13px;" id="ind_print1">Print</th>
            <th style="text-align: center; font-size: 13px;">Date</th>
            <th style="text-align: center; font-size: 13px;">Invoice</th>
            <th style="text-align: center; font-size: 13px;">Name</th>
            <th style="text-align: center; font-size: 13px;">Class</th>
            <th style="text-align: center; font-size: 13px;">Roll</th>
            <th style="text-align: center; font-size: 13px;">ID</th>
<!--            <th style="text-align: center;">Particular</th>
            <th style="text-align: center;">Fees</th>
            <th style="text-align: center;">Qty</th>
            <th style="text-align: center;">Amount</th>-->
            <th style="text-align: center; font-size: 13px;">Grand Total</th>
            <th style="text-align: center; font-size: 13px;">Discount</th>
            <th style="text-align: center; font-size: 13px;">Payable</th>
            <th style="text-align: center; font-size: 13px;">Paid</th>
            <th style="text-align: center; font-size: 13px;">Due</th>
            <!--<th style="text-align: center;">Collected By</th>-->
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 1; $i <= $c; $i++) {
            ?>
            <tr>
                <!--<td  style="text-align: center;"><?php echo ${"sl" . $i}; ?></td>-->
                <td  style="text-align: center; font-size: 13px;" id="ind_print2"><?php echo ${"print" . $i}; ?></td>
                <td  style="text-align: center; font-size: 13px;">
                    <?php
                    if (${"date" . $i} != "") {
                        echo date('d/m/y', strtotime(${"date" . $i}));
                    }
                    ?>
                </td>
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"invoice" . $i}; ?></td>
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"student_name" . $i}; ?></td>
                <td  style="text-align: center; font-size: 13px;"><?php echo nfa(${"class" . $i}); ?></td>
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"roll" . $i}; ?></td>
<!--                <td  style="text-align: center;"><?php echo ${"group" . $i}; ?></td>-->
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"student_id" . $i}; ?></td>
<!--                <td  style="text-align: center;"><?php echo preg_replace('%Fee%', 'Fee<br>', ${"description" . $i}); ?></td>
                <td  style="text-align: center;"><?php echo ${"amount" . $i}; ?></td>
                <td  style="text-align: center;"><?php echo ${"quantity" . $i}; ?></td>
                <td  style="text-align: center;"><?php echo ${"amount" . $i} * ${"quantity" . $i}; ?></td>-->
<!--                <td  style="text-align: center;"><?php echo ${"total" . $i}; ?></td>
                <td  style="text-align: center;"><?php echo ${"previous_due" . $i}; ?></td>-->
                <td  style="text-align: right; font-size: 13px;">
                   
                    <b style="white-space: nowrap;">Inv.Total: <?php echo ${"total" . $i}; ?></b><br>
                    <b style="white-space: nowrap;">P.Due: <?php echo ${"previous_due" . $i}; ?></b><br>
                    <hr style="margin:0px; padding:0px; border: .5px solid black;">
                    =<?php echo ${"grand_total" . $i}; ?>
                </td>
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"discount" . $i}; ?></td>
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"payable" . $i}; ?></td>
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"payment" . $i}; ?></td>
                <td  style="text-align: center; font-size: 13px;"><?php echo ${"due" . $i}; ?></td>
                <!--<td  style="text-align: center;"><?php echo ${"inserted_by_name" . $i}; ?></td>-->
            </tr>
        <?php } ?>
        <tr>
            <td  style="text-align: right; font-size: 13px;" id="ind_print3"></td>
            <td  colspan="6" style="color: teal; text-align: right; font-size: 13px;">Net Total</td>
            <td  style="text-align: right; font-size: 13px;"><?php echo $total; ?></td>
            <td  style="text-align: center; font-size: 13px;"><?php echo $discount; ?></td>
            <td  style="text-align: center; font-size: 13px;"><?php echo $total_payable; ?></td>
            <td  style="text-align: center; font-size: 13px;"><?php echo $total_paid; ?></td>
            <td  style="text-align: center; font-size: 13px;"><?php echo $total_payable-$total_paid; ?></td>
        </tr>
        </tbody>
    </table>
</div>


<style>

    @media print {
        a[href]:after {
            content: none !important;
        }

        #printOut {
            display: none;
        }

        #print_button {
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
        
        #ind_print1 {
            display: none;
        }

         #ind_print2 {
            display: none;
        }
        #ind_print3 {
            display: none;
        }

        #no_print1 {
            display: none;
        }
    }

    /*    @page {
            size: auto;    auto is the initial value
            margin: 0;   this affects the margin in the printer settings
        }*/
</style>


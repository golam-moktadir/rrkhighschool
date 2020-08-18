
<p style="padding: 10px;">
    <button id="print_button" title="Click to Print" type="button"
            onClick="window.print()" class="btn btn-flat btn-warning">Print
    </button>
</p>

<div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black; margin-top: -80px;">
    <div class="box-header" style="color: black; text-align: center;">
    <h3><img src="<?php echo base_url(); ?>assets/img/logo.png"
                                 alt="Logo"  class="m-t-22 print_logo"></h3>
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
            <th style="text-align: center; font-size: 13px;">Grand Total</th>
            <th style="text-align: center; font-size: 13px;">Discount</th>
            <th style="text-align: center; font-size: 13px;">Payable</th>
            <th style="text-align: center; font-size: 13px;">Paid</th>
            <th style="text-align: center; font-size: 13px;">Due</th>
        </tr>
        </thead>
        <tbody>
            <?php if(isset($invoice_result) && !empty($invoice_result) ): ?>
                <?php foreach($invoice_result['invoice_value'] as $value): ?>
                    <?php foreach($value['value'] as $invoice): ?>
                        <tr>
                            <td style="text-align: center; font-size: 13px;" id="ind_print2">
                                <a style="margin: 5px;" target="_blank" href="<?php echo site_url("Show_form/print_fee_collection/".$invoice['invoice']); ?>"><i class="btn btn-warning fa fa-print"></i>
                            </td>        
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['date']; ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['invoice']; ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['student_name']; ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo nfa($invoice['student_class_name']); ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['student_roll']; ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['student_id']; ?></td>
                            <td  style="text-align: right; font-size: 13px;">
                                <b style="white-space: nowrap;">Inv.Total: <?php echo $invoice['invoice_without_discount']; ?></b><br>
                                <b style="white-space: nowrap;">P.Due: <?php echo $invoice['invoice_previous_due']; ?></b><br>
                                <hr style="margin:0px; padding:0px; border: .5px solid black;">
                                =<?php echo  $invoice['invoice_grand_total']; ?>
                            </td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['invoice_discount']; ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['invoice_payable']; ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['invoice_payment']; ?></td>
                            <td  style="text-align: center; font-size: 13px;"><?php echo $invoice['invoice_recent_due']; ?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
                    <tr>
                        <td  style="text-align: right; font-size: 13px;" id="ind_print3"></td>
                        <td  colspan="6" style="color: teal; text-align: right; font-size: 13px;">Net Total</td>
                        <td  style="text-align: right; font-size: 13px;"><?php echo  $invoice_result['net_total']; ?></td>
                        <td  style="text-align: center; font-size: 13px;"><?php echo $invoice_result['student_total_discount']; ?></td>
                        <td  style="text-align: center; font-size: 13px;"><?php echo $invoice_result['student_total_payable']; ?></td>
                        <td  style="text-align: center; font-size: 13px;"><?php echo $invoice_result['student_total_payment']; ?></td>
                        <td  style="text-align: center; font-size: 13px;"><?php echo $invoice_result['student_total_due']; ?></td>
                    </tr>
            <?php endif;?>
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


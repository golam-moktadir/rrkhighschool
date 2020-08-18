<button id="printOut" onclick="window.print();" style="margin-top: 10px;"
        class="btn btn-warning">Print
</button>
<div id="show_info_studentwise" style="padding: 10px; font-size: 12px; margin-top: -40px; margin-left: 15%; margin-right: 15%;">

    <?php if (!empty($all_value)) { ?>
        <div class="row">
            <div class="col-sm-2 col-xs-2"></div>
            <div class="col-sm-8 col-xs-8" style="text-align: center;">
            <h3><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" width="70px" height="70px" style="border-radius: 15px;" class=""></h3>
                        <p style="white-space: nowrap; font-size: 12px; text-align: center;">Ramchandrapur, Muradnagar, Comilla.
                    <br><b>Phone: </b>01714 415941</p>
                <div class="col-sm-2 col-xs-2"></div>
                <div class="col-sm-8 col-xs-8" style="text-align: center;">
                    <p style="border: 2px solid black; font-size: 12px; white-space: nowrap;">Money Receipt</p>
                </div>
                <div class="col-sm-2 col-xs-2"></div>
            </div>
            <div class="col-sm-2 col-xs-2"></div>
        </div>
        <div class="row" style="padding-left: 20px; padding-right: 20px;">
            <div class="col-xs-4"><p>Invoice No.: <?php echo $invoice_no; ?></p></div>
            <div class="col-xs-4" style="text-align: center"><p>
                    ID: <?php echo $student_id; ?></p></div>
            <div class="col-xs-4" style="text-align: right"><p>
                    Date: <?php echo date('d-M-y', strtotime($date)); ?></p></div>
            <div class="col-xs-5"><p><?php echo $student_name; ?></p></div>
            <div class="col-xs-4" style="text-align: center"><p>Class: <?php echo nfa($class); ?></p>
            </div>
            <div class="col-xs-3" style="text-align: right"><p>Roll: <?php echo $roll; ?></p>
            </div>
        </div>

        <div class="box-body table-responsive" style="width: 100%; color: black;">
            <table id="example2" class="table table-hover"
                   style="border-top: 2px solid black; border-bottom: 2px solid black;">
                <thead style="border-bottom: 2px solid black;">
                <tr>
                    <th style="text-align: center; border-bottom: 2px solid black;">SL</th>
                    <th style="text-align: center; border-bottom: 2px solid black;">Particular</th>
                    <th style="text-align: center; border-bottom: 2px solid black;">Quantity</th>
                    <th style="text-align: right; padding-right: 25px; border-bottom: 2px solid black;">Amount</th>
                </tr>
                </thead>
                <tbody style="">
                <?php
                $sub_total = 0;
                $invoice_pay = 0;
                $invoice_due = 0;
                $invoice_total = 0;
                $invoice_discount = 0;
                for ($i = 1; $i <= $c; $i++) {
                    // $sub_total += (${"amount" . $i});
                    $sub_total += (${"amount" . $i} * ${"quantity" . $i});
                    $invoice_pay += (${"payment" . $i});
                    $invoice_due += (${"due" . $i});
                    $invoice_total += (${"total" . $i});
                    $invoice_discount += (${"discount" . $i});
                    ?>
                    <tr>
                        <td style="text-align: center; <?php
                        if ($i == $c) {
                            echo 'border-bottom: 2px solid black;';
                        }
                        ?>"><?php echo ${"sl" . $i}; ?></td>
                        <td style="text-align: center; <?php
                        if ($i == $c) {
                            echo 'border-bottom: 2px solid black;';
                        }
                        ?>"><?php echo preg_replace('%Fee%', 'Fee ', ${"description" . $i}); ?></td>
                        <td style="text-align: center; <?php
                        if ($i == $c) {
                            echo 'border-bottom: 2px solid black;';
                        }
                        ?>"><?php echo ${"quantity" . $i}; ?></td>
                        <td style="text-align: right; <?php
                        if ($i == $c) {
                            echo 'border-bottom: 2px solid black;';
                        }
                        ?> padding-right: 25px;"><?php echo ${"amount" . $i}*${"quantity" . $i}; ?></td>>
                    </tr>
                    <?php ${"inserted_by"} = ${"inserted_by" . $i}; ?>
                    <?php
                    ${"inserted_by_name"} = ${"inserted_by_name" . $i};
                }
                $previous_due = $invoice_pay + $invoice_due - $invoice_total;
                $grand_total = $sub_total + $previous_due;
                $payable = $grand_total - $invoice_discount;
                ?>
                <tr>
                    <td colspan="5" style="border-bottom: 2px solid black; white-space: nowrap;">
                        <div class="col-xs-5"></div>
                        <div class="col-xs-5" style="text-align: right;">
                            Invoice Total <br>
                            Previous Due <br>
                            Grand Total <br>
                            Discount <br>
                            Payable <br>
                            <b>Paid</b> <br>
                            Due
                        </div>
                        <div class="col-xs-2" style="text-align: right;">
                            <?php echo $sub_total; ?><br>
                            <?php echo $previous_due; ?><br>
                            <?php echo $grand_total; ?><br>
                            <?php echo $invoice_discount; ?><br>
                            <?php echo $payable; ?><br>
                            <b><?php echo $invoice_pay; ?></b><br>
                            <?php echo $invoice_due; ?>
                        </div>

                    </td>
                </tr>
                </tbody>

                <tr>
                    <td colspan="5">
                        <p>In Words: <?php echo numbertowords($invoice_pay); ?> Taka
                            Only</p>
                </tr>

            </table>
            <br>
            <br>
            <div style="text-align: right;" id="collection_staff">
                <p>__________________________</p>
                <p>Authorized Signature
                    <?php
                    foreach (${"inserted_by_name"} as $n) {
                        echo $n->name;
                    }
                    ?></p>
            </div>
        </div>
    <?php } ?>

</div>
<style>

    @media print {
        @page {
            margin: 0;
        }

        a[href]:after {
            content: none !important;
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

        #no_print {
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
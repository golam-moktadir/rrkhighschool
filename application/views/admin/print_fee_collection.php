<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <button id="printOut" onclick="window.print();"
                        class="btn btn-warning">Print
                </button>
                <div id="show_info_studentwise" style="padding: 10px; font-size: 12px; margin-top: -40px; margin-left: 15%; margin-right: 15%;">

                    <div class="row">
                        <div class="col-sm-2 col-xs-2"></div>
                        <div class="col-sm-8 col-xs-8" style="text-align: center;">
                        <h3><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" class="print_logo"></h3><b>Phone: </b>01714 415941</p>
                            <div class="col-sm-2 col-xs-2"></div>
                            <div class="col-sm-8 col-xs-8" style="text-align: center;">
                                <p style="border: 2px solid black; font-size: 12px; white-space: nowrap;">Money
                                    Receipt</p>
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

                    <div class="box-body" style="width: 100%; color: black;">
                        <table id="example2" class="table table-hover"
                               style="border-top: 2px solid black; border-bottom: 2px solid black;">
                            <thead style="border-bottom: 2px solid black;">
                            <tr>
                                <th style="text-align: center; border-bottom: 2px solid black;">SL</th>
                                <th style="text-align: center; border-bottom: 2px solid black;">Particular</th>
                                <th style="text-align: center; border-bottom: 2px solid black;">Quantity</th>
                                <th style="text-align: right; padding-right: 25px; border-bottom: 2px solid black;">
                                    Amount
                                </th>
                            </tr>
                            </thead>
                            <tbody style="">
                            <?php
                            for ($i = 1; $i <= $c; $i++) {
                                ?>
                                <tr>
                                    <td style="text-align: center;
    <?php
                                    if ($i == $c) {
                                        echo 'border-bottom: 2px solid black;';
                                    }
                                    ?>"><?php echo ${"sl" . $i}; ?>
                                    </td>
                                    <td style="text-align: center;
    <?php
                                    if ($i == $c) {
                                        echo 'border-bottom: 2px solid black;';
                                    }
                                    ?>"><?php echo preg_replace('%Fee%', 'Fee ', ${"description" . $i}); ?>
                                    </td>
                                    <td style="text-align: center;
    <?php
                                    if ($i == $c) {
                                        echo 'border-bottom: 2px solid black;';
                                    }
                                    ?>"><?php echo ${"quantity" . $i}; ?>
                                    </td>
                                    <td style="text-align: right; <?php
                                    if ($i == $c) {
                                        echo 'border-bottom: 2px solid black;';
                                    }
                                    ?> padding-right: 25px;"><?php echo ${"amount" . $i}*${"quantity" . $i}; ?></td>
                                </tr>
                            <?php } ?>
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
                                        <?php echo $total + $discount; ?><br>
                                        <?php echo ($payment + $due + $discount) - ($total + $discount); ?><br>
                                        <?php echo $payment + $due + $discount; ?><br>
                                        <?php echo $discount; ?><br>
                                        <?php echo $payment + $due; ?><br>
                                        <b><?php echo $payment; ?></b><br>
                                        <?php echo $due; ?>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                            <tr>
                                <td colspan="5">
                                    <p>In Words: <?php echo numbertowords($payment); ?> Taka
                                        Only</p>
                            </tr>
                        </table>
                        <div class="col-sm-12 col-xs-12" style="text-align: right;">
                            <p><b>___________________________</b>
                                <br>Authorized Signature</p>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>
</aside>
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
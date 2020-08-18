<div class="box box-info">
    <p style="padding: 10px;">
        <button id="print_button" title="Click to Print" type="button"
                onClick="window.print()" class="btn btn-flat btn-warning">Print
        </button>
    </p>
    <div class="box-header" style="color: black; text-align: center;">
        <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                 alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
    </div>
    <h3 class="box-title" style="color: black; text-align: center;"><u>Ledger</u></h3>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;" colspan="5">Collection</th>
                <th style="text-align: center;" colspan="5">Payment</th>
            </tr>
            <tr>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Cash Received</th>
                <th style="text-align: center;">Invoice No</th>
                <!--                    <th style="text-align: center;">Quantity</th>-->
                <th style="text-align: center;">Amount</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Cash Paid</th>
                <th style="text-align: center;">Voucher No</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $income_total = 0;
            $expense_total = 0;
            $invoice_no = '';
            for ($i = 1; $i <= $count_it; $i++) {
                if ($invoice_no != ${"voucher_no" . $i}) {
                    if (!empty(${"amount" . $i})) {
                        $income_total += ${"amount" . $i};
                    }
                    if (!empty(${"expense_amount" . $i})) {
                        $expense_total += ${"expense_amount" . $i};
                    }
                    ?>
                    <tr>
                        <td style="text-align: center;">
                            <?php
                            if (empty(${"date" . $i})) {
                                echo "";
                            } else {
                                echo date('d F, Y', strtotime(${"date" . $i}));
                            }
                            ?>
                        </td>
                        <td style="text-align: center;"><?php echo ${"income_head" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"voucher_no" . $i}; ?></td>
                        <!--                        <td style="text-align: center;">--><?php //echo ${"quantity" . $i};
                        ?><!--</td>-->
                        <td style="text-align: center;"><?php echo ${"amount" . $i}; ?></td>
                        <td style="text-align: center;">
                            <?php
                            if (empty(${"expense_date" . $i})) {
                                echo "";
                            } else {
                                echo date('d F, Y', strtotime(${"expense_date" . $i}));
                            }
                            ?>
                        </td>
                        <td style="text-align: center;"><?php echo ${"expense_head" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"expense_voucher_no" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"expense_quantity" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"expense_amount" . $i}; ?></td>
                    </tr>
                <?php } $invoice_no = ${"voucher_no" . $i};
            } ?>
            <tr>
                <th style="text-align: center;"
                    colspan="5"><?php echo "Collection Total: " . $income_total . " BDT"; ?></th>
                <th style="text-align: center;"
                    colspan="5"><?php echo "Payment Total: " . $expense_total . " BDT"; ?></th>
            </tr>
            <?php $balance = $income_total - $expense_total; ?>
            <tr>
                <th style="text-align: right;" colspan="10"><?php echo "Balance: " . $balance . " BDT"; ?></th>
            </tr>
            </tbody>
        </table>
    </div>
</div>
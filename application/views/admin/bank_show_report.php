<div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
    <table id="example2" class="table table-bordered table-hover" style="color: black;">
        <thead>
            <tr>
                <th style="text-align: center;">SL</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Particular</th>
                <th style="text-align: center;">Bank Name</th>
                <th style="text-align: center;">Account No.</th>
                <th style="text-align: center;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            $deposit_total=0;
            foreach ($deposit_result as $deposit_info) {
                $deposit_total+=$deposit_info->amount; 
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo date('d F, Y', strtotime($deposit_info->date)); ?></td>
                    <td style="text-align: center;">Deposit</td>
                    <td style="text-align: center;"><?php echo $deposit_info->bank_name; ?></td>
                    <td style="text-align: center;"><?php echo $deposit_info->account_no; ?></td>
                    <td style="text-align: center;"><?php echo $deposit_info->amount; ?></td>
                </tr>
            <?php } ?>
                <?php
                 $withdraw_total=0;
            foreach ($withdraw_result as $withdraw_info) {
                $withdraw_total+=$withdraw_info->amount; 
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo date('d F, Y', strtotime($withdraw_info->date)); ?></td>
                    <td style="text-align: center;">Withdraw</td>
                    <td style="text-align: center;"><?php echo $withdraw_info->bank_name; ?></td>
                    <td style="text-align: center;"><?php echo $withdraw_info->account_no; ?></td>
                    <td style="text-align: center;"><?php echo $withdraw_info->amount; ?></td>
                </tr>
            <?php } $total_balance=$deposit_total-$withdraw_total; ?>
                <tr>
                    <td colspan="6" style="text-align: right; font-size: 14px;">Balance: <?php echo number_format($total_balance); ?>/-</td>
                </tr>
        </tbody>

    </table>
</div>


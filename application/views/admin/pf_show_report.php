<div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
    <table id="example2" class="table table-bordered table-hover" style="color: black;">
        <thead>
            <tr>
                <th style="text-align: center;">SL</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Particular</th>
                <th style="text-align: center;">Teacher/Staff ID</th>
                <th style="text-align: center;">Teacher/Staff Name</th>
                <th style="text-align: center;">Designation</th>
                <th style="text-align: center;">Account No.</th>
                <th style="text-align: center;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            foreach ($deposit_result as $deposit_info) {
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo date('d F, Y', strtotime($deposit_info->date)); ?></td>
                    <td style="text-align: center;">Deposit (Sub-total)</td>
                    <td style="text-align: center;"><?php echo $deposit_info->teacher_staff_id; ?></td>
                    <td style="text-align: center;"><?php echo $deposit_info->teacher_staff_name; ?></td>
                    <td style="text-align: center;"><?php echo $deposit_info->designation; ?></td>
                    <td style="text-align: center;"><?php echo $deposit_info->account_no; ?></td>
                    <td style="text-align: center;"><?php echo $deposit_info->sub_total; ?></td>
                </tr>
            <?php } ?>
                <?php
            foreach ($loan_result as $loan_info) {
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo date('d F, Y', strtotime($loan_info->date)); ?></td>
                    <td style="text-align: center;">Loan (Due)</td>
                    <td style="text-align: center;"><?php echo $loan_info->teacher_staff_id; ?></td>
                    <td style="text-align: center;"><?php echo $loan_info->teacher_staff_name; ?></td>
                    <td style="text-align: center;"><?php echo $loan_info->designation; ?></td>
                    <td style="text-align: center;"><?php echo $loan_info->account_no; ?></td>
                    <td style="text-align: center;"><?php echo $loan_info->due_amount; ?></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>


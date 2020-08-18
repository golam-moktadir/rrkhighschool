<p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                       onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>

<div class="box-header"  style="color: black; text-align: center;">
    <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg" 
             alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
</div>
<h3 class="box-title" style="color: black; text-align: center;"><u>Salary Sheet</u></h3>
<div style="padding: 10px;">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="text-align: center;">SL No.</th>
                <th style="text-align: center;">Employees ID</th>
                <th style="text-align: center;">Name of the Employees</th>
                <th style="text-align: center;">Designation</th>
                <th style="text-align: center;">Account No.</th>
                <th style="text-align: center;">Amount (Taka)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            foreach ($all_value as $single_value) {
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->teacher_staff_id; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->teacher_staff_name; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->account_no; ?></td>
                    <td style="text-align: center;"><?php echo number_format($single_value->salary_scale); ?>/-</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4"></td>
                <td style="text-align: center;">Total</td>
                <td style="text-align: center;">=<?php echo number_format($total); ?>/-</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;">
                    <b><?php echo $this->numbertowords->convert_number($total); ?> Taka Only</b>
                </td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <p style="text-align: right; font-size: 16px; color: black; font-weight: bold; text-align: right;">
        ------------------------------<br>
        Principal Signature
    </p><br>
</div>
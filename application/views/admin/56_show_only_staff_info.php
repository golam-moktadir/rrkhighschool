<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;">Staff ID</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Designation</th>
            <th style="text-align: center;">Mobile</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Blood Group</th>
            <th style="text-align: center;">Nationality</th>
            <th style="text-align: center;">Religion</th>
            <th style="text-align: center;">Joining Year</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">Image</th>
            <th style="text-align: center;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($all_value as $single_value) {
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $single_value->staff_unique_id; ?></td>
                <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date_of_birth)); ?></td>
                <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                <td style="text-align: center;"><?php echo $single_value->blood_group; ?></td>
                <td style="text-align: center;"><?php echo $single_value->nationality; ?></td>
                <td style="text-align: center;"><?php echo $single_value->religion; ?></td>
                <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                <td style="text-align: center;">
                    <?php if (file_exists('./assets/img/staff/' . $single_value->image)) { ?>
                        <img src="<?php echo base_url(); ?>assets/img/staff/<?php echo $single_value->image; ?>" width="50" height="50">
                    <?php } ?>
                </td>
                <td style="text-align: center;">
                    <?php
                    if ($single_value->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
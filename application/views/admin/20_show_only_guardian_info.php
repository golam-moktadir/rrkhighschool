<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;">Guardian ID</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Image</th>
            <th style="text-align: center;">Mobile</th>
            <th style="text-align: center;">Student ID</th>
            <th style="text-align: center;">Relation with Student</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">National ID</th>
            <th style="text-align: center;">Year</th>
            <th style="text-align: center;">Blood Group</th>
            <th style="text-align: center;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($all_value as $single_value) {
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $single_value->guardian_unique_id; ?></td>
                <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                <td style="text-align: center;">
                    <img src="<?php echo base_url(); ?>assets/img/guardian/<?php echo $single_value->image; ?>" width="50" height="50">
                </td>
                <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                <td style="text-align: center;"><?php echo $single_value->student_id; ?></td>
                <td style="text-align: center;"><?php echo $single_value->relation_student; ?></td>
                <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                <td style="text-align: center;"><?php echo $single_value->nid; ?></td>
                <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->blood_group; ?></td>
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
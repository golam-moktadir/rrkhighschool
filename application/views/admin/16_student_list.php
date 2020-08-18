<p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button"
                                       onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
<div class="box-header"  style="color: black; text-align: center;">
<h3><img src="<?php echo base_url(); ?>assets/img/logo.png"
                                 alt="Logo" width="100px" height="100px" style="border-radius: 15px;" class="m-t-22"></h3>
</div>
<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;" colspan="11">Class Wise Student List</th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="2">Academic Year</th>
            <th style="text-align: center;" colspan="2">Class</th>
            <th style="text-align: center;" colspan="2">Shift</th>
            <?php if ($class_name == '9' || $class_name == '10') { ?>
                <th style="text-align: center;" colspan="2">Group</th>
            <?php } else { ?>
                <th style="text-align: center;" colspan="2">Section</th>
            <?php } ?>
            <th style="text-align: center;" colspan="3">Total Student</th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="2"><?php echo $session_name; ?></th>
            <th style="text-align: center;" colspan="2"><?php echo nfa($class_name); ?></th>
            <th style="text-align: center;" colspan="2"><?php echo $shift_name; ?></th>
            <?php if ($class_name == '9' || $class_name == '10') { ?>
                <th style="text-align: center;" colspan="2"><?php echo $group_name; ?></th>
            <?php } else { ?>
                <th style="text-align: center;" colspan="2"><?php echo $section_name; ?></th>
            <?php } ?>
            <th style="text-align: center;" colspan="3"><?php echo $student_number; ?></th>
        </tr>
        <tr>
            <th style="text-align: center;">Student ID</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Roll</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Religion</th>
            <th style="text-align: center;">Father's Name</th>
            <th style="text-align: center;">Mother's Name</th>
            <th style="text-align: center;">Guardian Name</th>
            <th style="text-align: center;">Guardian Mobile</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($all_value as $single_value) {
            if($single_value->status != 0){
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                <td style="text-align: center;"><?php echo $single_value->religion; ?></td>
                <td style="text-align: center;"><?php echo $single_value->father_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->mother_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->guardian_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->guardian_mobile; ?></td>
                <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date_of_birth)); ?></td>
                <td style="text-align: center;">
                  <?php  if(file_exists('./assets/img/student/'.$single_value->image)){ ?>
                    <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $single_value->image; ?>" width="50" height="50">
                  <?php } ?>
                </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>

<style>
    @media print {
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
        #no_print1 {
            display: none;
        }
    }
/*    table.table-bordered{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > thead > tr > th{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 18px;
    }
    table.table-bordered > tbody > tr > td{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }*/
</style>


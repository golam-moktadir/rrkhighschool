<?php
function nfa($str)
{
$search = array("10", "2", "3", "4", "5", '6', "7", "8", "9", "1");
$replace = array("Ten", "Two", "Three", "Four", "Five", "Six", 'Seven', "Eight", "Nine", "One");
return str_replace($search, $replace, $str);
}
?>


<p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button"
                                       onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
<table id="example2" class="table table-bordered table-hover" style="overflow: scroll;">
    <thead>
        <tr>
            <th style="text-align: center;">Student ID</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Roll</th>
            <th style="text-align: center;">Image</th>
            <th style="text-align: center;">Class</th>
            <th style="text-align: center;">Group</th>
            <th style="text-align: center;">Section</th>
            <th style="text-align: center;">Year</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Blood Group</th>
            <th style="text-align: center;">Nationality</th>
            <th style="text-align: center;">Religion</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">Father's Name</th>
            <th style="text-align: center;">Father's Occupation</th>
            <th style="text-align: center;">Mother's Name</th>
            <th style="text-align: center;">Mother's Occupation</th>
            <th style="text-align: center;">Parents Mobile</th>
            <th style="text-align: center;">Parents Email</th>
            <th style="text-align: center;">Fourth Subject</th>
            <th style="text-align: center;">Status</th>
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
            <td style="text-align: center;">
                <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $single_value->image; ?>" width="50" height="50">
            </td>
            <td style="text-align: center;"><?php echo "Class - " . nfa($single_value->class_name); ?></td>
            <td style="text-align: center;"><?php echo $single_value->group_name; ?></td>
            <td style="text-align: center;"><?php echo $single_value->section_name; ?></td>
            <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date_of_birth)); ?></td>
            <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
            <td style="text-align: center;"><?php echo $single_value->blood_group; ?></td>
            <td style="text-align: center;"><?php echo $single_value->nationality; ?></td>
            <td style="text-align: center;"><?php echo $single_value->religion; ?></td>
            <td style="text-align: center;"><?php echo $single_value->address; ?></td>
            <td style="text-align: center;"><?php echo $single_value->father_name; ?></td>
            <td style="text-align: center;"><?php echo $single_value->father_occupation; ?></td>
            <td style="text-align: center;"><?php echo $single_value->mother_name; ?></td>
            <td style="text-align: center;"><?php echo $single_value->mother_occupation; ?></td>
            <td style="text-align: center;"><?php echo $single_value->parents_mobile; ?></td>
            <td style="text-align: center;"><?php echo $single_value->parents_email; ?></td>
            <td style="text-align: center;"><?php echo $single_value->fourth_subject; ?></td>
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
</style>


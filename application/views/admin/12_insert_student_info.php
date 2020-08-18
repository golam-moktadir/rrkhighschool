<?php

$stInfo=$this->session->userdata("stInfo");
$class_name=$stInfo['class_name'][0];
$shift_name=$stInfo['shift_name'];
$group_name=$stInfo['group_name'];
$section_name=$stInfo['section_name'];
$session_name=$stInfo['session_name'];
// debug_r($stInfo);
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
} elseif ($msg == "active") {
    $msg = "ID Has been Made Active";
} elseif ($msg == "inactive") {
    $msg = "ID Has been Made Inactive";
}
?>
<style>
    .form-group {
        margin: 0px;
    }

    .col-sm-2 {
        padding: 0px 10px 10px 10px;
    }
</style>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black;">
                    <?php echo form_open_multipart('Insert/insert_student_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Student Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $this->session->flashdata("msg"); ?></p>
                        <div class="container-fluid">
                            <div class="row" style="padding: 10px;">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="class_name">Select Class</label><small class="req">*</small>
                                    <select name="class_name" required id="class_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_class as $single_class) { ?>
                                            <option <?php if($class_name==$single_class->class_name) echo "selected" ?> value="<?php echo $single_class->class_name; ?>#<?php echo $single_class->record_id; ?>">
                                                <?php echo "Class - " . nfa($single_class->class_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="shift_name">Select Shift</label><small class="req">*</small>
                                    <select name="shift_name" id="shift_name" required class="form-control selectpicker"
                                            data-container="body">
                                        <?php foreach ($all_shift as $single_shift) { ?>
                                            <option <?php if($shift_name==$single_shift->shift_name) echo "selected" ?> value="<?php echo $single_shift->shift_name; ?>">
                                                <?php echo $single_shift->shift_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="group_div" style="display: none">
                                    <label for="group_name">Select Group</label>
                                    <select name="group_name" id="group_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_group as $single_group) { ?>
                                            <option <?php if($group_name==$single_group->group_name) echo "selected" ?> value="<?php echo $single_group->group_name; ?>">
                                                <?php echo $single_group->group_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="section_div">
                                    <label for="section_name">Select Section</label>
                                    <select name="section_name" id="section_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_section as $single_section) { ?>
                                            <option <?php if($section_name==$single_section->section_name) echo "selected" ?> value="<?php echo $single_section->section_name; ?>">
                                                <?php echo $single_section->section_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="session_name">Select Year</label><small class="req">*</small>
                                    <select name="session_name" id="session_name" required class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_session as $single_session) { ?>
                                            <option <?php if(date("Y")==$single_session->session_name) echo "selected" ?> value="<?php echo $single_session->session_name; ?>">
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="name">Name</label><small class="req">*</small>
                                    <input type="text" class="form-control" required id="name" placeholder="" name="name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="roll">Roll</label><small class="req">*</small>
                                    <input type="text" class="form-control" required id="roll" placeholder="" name="roll">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="fs_div" style="display: none">
                                    <label for="fourth_subject">Fourh Subject</label><small class="req">*</small>
                                    <select name="fourth_subject" id="fourth_subject" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date_of_birth">Date of Birth</label><small class="req">*</small>
                                    <input type="text" class="form-control new_datepicker" required id="date_of_birth"
                                           placeholder="Select Date" name="date_of_birth" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="gender">Select Gender</label><small class="req">*</small>
                                    <select name="gender" id="gender" required class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="blood_group">Select Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" placeholder=""
                                           name="nationality" value="Bangladeshi" readonly>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="religion">Religion</label>
                                    <select class="form-control selectpicker"
                                            data-container="body" id="religion" name="religion">
                                        <option value="">--Select--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Buddhism">Buddhism</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="" name="image">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control"  id="address" placeholder="" name="address">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name" placeholder=""
                                           name="father_name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="father_occupation">Father's Occupation</label>
                                    <select name="father_occupation" id="father_occupation"
                                            class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option value="Service">Service</option>
                                        <option value="Business">Business</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" class="form-control" id="mother_name" placeholder=""
                                           name="mother_name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="mother_occupation">Mother's Occupation</label>
                                    <select name="mother_occupation" id="mother_occupation"
                                            class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <option value="Housewife">Housewife</option>
                                        <option value="Service">Service</option>
                                        <option value="Business">Business</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="parents_mobile">Parents Mobile</label>
                                    <input type="text" class="form-control" id="parents_mobile" placeholder=""
                                           name="parents_mobile">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="guardian_name">Guardian Name</label>
                                    <input type="text" class="form-control" id="guardian_name" placeholder=""
                                           name="guardian_name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="guardian_mobile">Guardian Mobile</label>
                                    <input type="text" class="form-control" id="guardian_mobile" placeholder=""
                                           name="guardian_mobile">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="guardian_realtion"> R. With Guardian </label>
                                    <input type="text" class="form-control" id="guardian_realtion" placeholder=""
                                           name="guardian_realtion">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="admission_date">Admission Date</label>
                                    <input type="text" class="form-control new_datepicker" id="admission_date"
                                           placeholder="Select Date" name="admission_date"
                                           value="<?php echo date('d-m-Y'); ?>">
                                </div>

                                <div class="form-group col-sm-2 col-xs-12" id="fs_div" style="margin-top: 27px;">
                                    <button type="submit" class="pull-left btn btn-success">Submit <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="box box-info" style="margin-top: 10px;" id="info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="pagination_search" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Student ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Roll</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Parents Mobile</th>
                                <th style="text-align: center;">Guardian Name</th>
                                <th style="text-align: center;">Guardian Mobile</th>
                                <th style="text-align: center;">Realtion With Guardian</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Fourth Subject</th>
                                <th style="text-align: center;">Action</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = $first_count + 1;
                            foreach ($all_value as $single_value) {
                                $count--;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <td style="text-align: center;"><?php echo nfa($single_value->class_name); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->parents_mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->guardian_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->guardian_mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->guardian_realtion; ?></td>
                                    <td style="text-align: center;">
                                        <?php if (file_exists('./assets/img/student/' . $single_value->image)) { ?>
                                            <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $single_value->image; ?>"
                                                 width="50" height="50">
                                        <?php } ?>
                                    </td>
                                    <td style="text-align: center;"><?php
                                        if ($single_value->fourth_subject == '') {
                                            echo 'N/A';
                                        } else {
                                            echo $single_value->fourth_subject;
                                        } ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Show_edit_form/insert_student_info/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info fa fa-edit" title="Edit">
                                        </a>
                                        <?php if ($single_value->status == 0) { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/active/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-success fa fa-eye" title="Activate Student">
                                            </a>
                                        <?php } else { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/inactive/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger fa fa-eye" title="Inactivate Student">
                                            </a>
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
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>


<script type="text/javascript">
check_required();
function check_required()
{
    var input_data = $('#class_name').val().split("#")[0];
    var class_id = $('#class_name').val().split("#")[1];
    if (input_data == '9' || input_data == '10') {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_subject_by_class",
            data: {"class_id":class_id},
            dataType:"json",
            success: function (data) {
                // console.log(data);
                $("#fourth_subject").find('option').remove();
                $("#fourth_subject").selectpicker("refresh");
                $("#subject").find('option').remove();
                $("#subject").selectpicker("refresh");
                if(data!=''){
                    $("#fourth_subject").append('<option value="">--Select--</option>')
                    $.each(data,function(key,value){
                        $("#fourth_subject").append('<option value="'+ value.record_id+'#'+value.subject_name+'">'+ value.subject_name +'</option>')
                        $("#subject").append('<option value="'+ value.record_id+'">'+ value.subject_name +'</option>')
                    });
                    $("#fourth_subject").selectpicker('render').selectpicker('refresh');
                    $("#subject").selectpicker('render').selectpicker('refresh');
                }
            }
        });
    $("#fourth_subject").attr("required",true);
        $('#subj_div').show();
        $('#fs_div').show();
        $('#group_div').show();
        $('#section_name').val('');
        $('#section_div').hide();
    }else{
        $("#fourth_subject").attr("required",false);
        $('#subj_div').hide();
            $('#fs_div').hide();
            $('#subject').val('');
            $('#fourth_subject').val('');
            $('#group_name').val('');
            $('#group_div').hide();
            $('#section_div').show();
    }
}
    $("#class_name").on("change", function () {
        check_required();
    });
</script>

<script type="text/javascript">
    window.onload = function () {
        $('#pagination_search').dataTable({
            "ordering": false,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            fixedHeader: {
                header: true,
                footer: true,
                headerOffset: 50
            }
        });
    };
</script>
<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $class_name = $one_info->class_name;
    $group_name = $one_info->group_name;
    $section_name = $one_info->section_name;
    $shift_name = $one_info->shift_name;
    $version_name = $one_info->version_name;
    $session_name = $one_info->session_name;
    $name = $one_info->name;
    $roll = $one_info->roll;
    $date_of_birth = date('d-m-Y', strtotime($one_info->date_of_birth));
    $gender = $one_info->gender;
    $blood_group = $one_info->blood_group;
    $nationality = $one_info->nationality;
    $religion = $one_info->religion;
    $address = $one_info->address;
    $password = $one_info->password;
    $father_name = $one_info->father_name;
    $mother_name = $one_info->mother_name;
    $parents_mobile = $one_info->parents_mobile;
    $guardian_name = $one_info->guardian_name;
    $guardian_mobile = $one_info->guardian_mobile;
    $guardian_realtion = $one_info->guardian_realtion;
    $parents_email = $one_info->parents_email;
    $father_occupation = $one_info->father_occupation;
    $mother_occupation = $one_info->mother_occupation;
    $subject = $one_info->subject;
    $fourth_subject = $one_info->fourth_subject;
    $fourth_subject_id = $one_info->fourth_subject_id;
    $admission_date = date('d-m-Y', strtotime($one_info->admission_date));
    $ssc_reg = $one_info->ssc_reg;
    $ssc_roll = $one_info->ssc_roll;
    $ssc_session = $one_info->ssc_session;
    $ssc_year = $one_info->ssc_year;
    $ssc_result = $one_info->ssc_result;
    $ssc_board = $one_info->ssc_board;
    $ssc_institution = $one_info->ssc_institution;
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
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/insert_student_info/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Student Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid" style="400%">
                            <div class="row" style="padding: 10px;">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control selectpicker"
                                    data-container="body">
                                        <?php foreach ($all_class as $single_class) { ?>
                                            <option value="<?php echo $single_class->class_name; ?>#<?php echo $single_class->record_id; ?>"
                                                <?php if ($single_class->class_name === $class_name) {
                                                    echo 'selected';
                                                } ?>>
                                                <?php echo "Class - " . nfa($single_class->class_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="shift_name">Select Shift</label>
                                    <select name="shift_name" id="shift_name" class="form-control selectpicker"
                                    data-container="body">
                                        <?php foreach ($all_shift as $single_shift) { ?>
                                            <option value="<?php echo $single_shift->shift_name; ?>"
                                                <?php if ($single_shift->shift_name === $shift_name) {
                                                    echo 'selected';
                                                } ?>>
                                                <?php echo $single_shift->shift_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12"
                                    <?php if ($class_name != 9 && $class_name != 10) {
                                        echo "style ='display: none;'";
                                    } ?>>
                                    <label for="group_name">Select Group</label>
                                    <select name="group_name" id="group_name" class="form-control selectpicker"
                                    data-container="body">
                                        <?php foreach ($all_group as $single_group) { ?>
                                            <option value="<?php echo $single_group->group_name; ?>"
                                                <?php if ($single_group->group_name === $group_name) {
                                                    echo 'selected';
                                                } ?>>
                                                <?php echo $single_group->group_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12"
                                    <?php if ($class_name == 9 || $class_name == 10) {
                                        echo "style ='display: none;'";
                                    } ?>>
                                    <label for="section_name">Select Section</label>
                                    <select name="section_name" id="section_name" class="form-control selectpicker"
                                    data-container="body">
                                        <?php foreach ($all_section as $single_section) { ?>
                                            <option value="<?php echo $single_section->section_name; ?>"
                                                <?php if ($single_section->section_name === $section_name) {
                                                    echo 'selected';
                                                } ?>>
                                                <?php echo $single_section->section_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="session_name">Select Year</label>
                                    <select name="session_name" id="session_name" class="form-control selectpicker"
                                    data-container="body">
                                        <?php foreach ($all_session as $single_session) { ?>
                                            <option value="<?php echo $single_session->session_name; ?>"
                                                <?php if ($single_session->session_name === $session_name) {
                                                    echo 'selected';
                                                } ?>>
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                           value="<?php echo $name; ?>" placeholder="" name="name">
                                    <input type="hidden" class="form-control" id="id"
                                           value="<?php echo $record_id; ?>" placeholder="" name="id">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="roll">Roll</label>
                                    <input type="text" class="form-control" id="roll"
                                           value="<?php echo $roll; ?>" placeholder="" name="roll">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12" id="fs_div"
                                    <?php if ($class_name != '9' && $class_name != '10') {
                                        echo "style ='display: none;'";
                                    } ?>>
                                    <label for="fourth_subject">Fourh Subject</label><small class="req">*</small>
                                    <select name="fourth_subject" id="fourth_subject" class="form-control selectpicker"
                                            data-container="body">
                                       <?php if(isset($all_subject)): ?>
                                            <?php foreach($all_subject as $value): ?>
                                                <option <?php if($value['record_id']==$fourth_subject_id) echo "selected" ?> value="<?php echo $value['record_id'] ?>#<?php echo $value['subject_name'] ?>"><?php echo $value['subject_name'] ?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="text" class="form-control new_datepicker" id="date_of_birth"
                                           value="<?php echo $date_of_birth; ?>" placeholder="Select Date"
                                           name="date_of_birth" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="gender">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control selectpicker"
                                    data-container="body">
                                        <option value="<?php echo $gender; ?>">
                                            <?php echo $gender; ?>
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="blood_group">Select Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control selectpicker"
                                    data-container="body">
                                        <option value="A+" <?php if ($blood_group == 'A+') {
                                            echo 'selected';
                                        } ?>>A+
                                        </option>
                                        <option value="A-" <?php if ($blood_group == 'A-') {
                                            echo 'selected';
                                        } ?>>A-
                                        </option>
                                        <option value="B+" <?php if ($blood_group == 'B+') {
                                            echo 'selected';
                                        } ?>>B+
                                        </option>
                                        <option value="B-" <?php if ($blood_group == 'B-') {
                                            echo 'selected';
                                        } ?>>B-
                                        </option>
                                        <option value="O+" <?php if ($blood_group == 'O+') {
                                            echo 'selected';
                                        } ?>>O+
                                        </option>
                                        <option value="O-" <?php if ($blood_group == 'O-') {
                                            echo 'selected';
                                        } ?>>O-
                                        </option>
                                        <option value="AB+" <?php if ($blood_group == 'AB+') {
                                            echo 'selected';
                                        } ?>>AB+
                                        </option>
                                        <option value="AB-" <?php if ($blood_group == 'AB-') {
                                            echo 'selected';
                                        } ?>>AB-
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" id="nationality"
                                           value="<?php echo $nationality; ?>" placeholder="" name="nationality"
                                           readonly>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="religion">Religion</label>
                                    <select name="religion" id="religion" class="form-control selectpicker"
                                    data-container="body">
                                        <option value="Islam" <?php if ($religion == 'Islam') {
                                            echo 'selected';
                                        } ?>>Islam
                                        </option>
                                        <option value="Hinduism" <?php if ($religion == 'Hinduism') {
                                            echo 'selected';
                                        } ?>>Hinduism
                                        </option>
                                        <option value="Christianity" <?php if ($religion == 'Christianity') {
                                            echo 'selected';
                                        } ?>>Christianity
                                        </option>
                                        <option value="Buddhism" <?php if ($religion == 'Buddhism') {
                                            echo 'selected';
                                        } ?>>Buddhism
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="" name="image">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address"
                                           value="<?php echo $address; ?>" placeholder="" name="address">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name"
                                           value="<?php echo $father_name; ?>" placeholder="" name="father_name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="father_occupation">Father's Occupation</label>
                                    <input type="text" class="form-control" id="father_occupation"
                                           value="<?php echo $father_occupation; ?>" placeholder=""
                                           name="father_occupation">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" class="form-control" id="mother_name"
                                           value="<?php echo $mother_name; ?>" placeholder="" name="mother_name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="mother_occupation">Mother's Occupation</label>
                                    <input type="text" class="form-control" id="mother_occupation"
                                           value="<?php echo $mother_occupation; ?>" placeholder=""
                                           name="mother_occupation">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="parents_mobile">Parents Mobile</label>
                                    <input type="text" class="form-control" id="parents_mobile"
                                           value="<?php echo $parents_mobile; ?>" placeholder="" name="parents_mobile">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="guardian_name">Guardian Name</label>
                                    <input type="text" class="form-control" id="guardian_name" placeholder=""
                                           name="guardian_name" value="<?php echo $guardian_name; ?>">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="guardian_mobile">Guardian Mobile</label>
                                    <input type="text" class="form-control" id="guardian_mobile" placeholder=""
                                           name="guardian_mobile" value="<?php echo $guardian_mobile; ?>">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="guardian_realtion"> R. With Guardian </label>
                                    <input type="text" class="form-control" id="guardian_realtion" placeholder=""
                                           name="guardian_realtion" value="<?php echo $guardian_realtion; ?>">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="admission_date">Admission Date</label>
                                    <input type="text" class="form-control new_datepicker"
                                           id="admission_date" placeholder="Select Date"
                                           name="admission_date" autocomplete="off"
                                           value="<?php echo $admission_date; ?>">
                                </div>
                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 27px;" type="submit" class="pull-left btn btn-success">
                                        Edit <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
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
    $("#fourth_subject").attr("required",true);
    
            $('#subj_div').show();
            $('#fs_div').show();
            $('#group_div').show();
            $('#section_name').val('');
            $('#section_div').hide();
    }else{
        $("#fourth_subject").attr("required",false);
    }
}
    $("#class_name").on("change", function () {
        var input_data = $('#class_name').val().split("#")[0];
        var class_id = $('#class_name').val().split("#")[1];
        check_required();
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
        } else {
            $('#subj_div').hide();
            $('#fs_div').hide();
            $('#subject').val('');
            $('#fourth_subject').val('');
            $('#group_name').val('');
            $('#group_div').hide();
            $('#section_div').show();
        }
    });
</script>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print2">
                    <form id="student_admit_card_form">
                        <div class="box-body">
                            <p style="font-size: 20px;">Search Student Admit Card</p>
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="session_id">Select Year</label><span class="req">*</span>
                                    <select required  name="session_id" id="session_id" data-live-search="true" class="form-control selectpicker select_2"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_session)): ?>
                                              <?php foreach ($all_session as $value) : ?>
                                                <option <?php if(date("Y")==$value->session_name) echo "selected" ?> value="<?php echo $value->record_id; ?>#<?php echo $value->session_name; ?>">
                                                    <?php echo $value->session_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="class_id">Select Class</label><span class="req">*</span>
                                    <select required name="class_id" id="class_id" data-live-search="true" class="form-control selectpicker select_2"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_class)): ?>
                                            <?php foreach ($all_class as $value) : ?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->class_name; ?>">
                                                    <?php echo "Class - " . nfa($value->class_name); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="shift_id">Select Shift</label><span class="req">*</span>
                                    <select required name="shift_id" id="shift_id" data-live-search="true" class="form-control selectpicker select_2"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_shift)): ?>
                                            <?php foreach ($all_shift as $value) : ?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->shift_name; ?>">
                                                    <?php echo $value->shift_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12 section_div">
                                    <label for="section_id">Select Section</label><span class="req">*</span>
                                    <select required name="section_id" id="section_id" data-live-search="true" class="form-control selectpicker select_2"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_section)): ?>
                                            <?php foreach ($all_section as $value) : ?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->section_name; ?>">
                                                    <?php echo $value->section_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div style="display:none" class="form-group col-sm-3 col-xs-12 group_div">
                                    <label for="group_id">Select Group</label><span class="req">*</span>
                                    <select dissabled required name="group_id" id="group_id" data-live-search="true" class="form-control selectpicker select_2"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_group)): ?>
                                            <?php foreach ($all_group as $value) : ?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->group_name; ?>">
                                                    <?php echo $value->group_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="student_id">Select Student Id</label>
                                    <select  name="student_id" id="student_id" data-live-search="true" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_student)): ?>
                                            <?php foreach ($all_student as $value) : ?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->student_unique_id; ?>">
                                                    <?php echo $value->student_unique_id; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="exam_id">Select Exam</label><span class="req">*</span>
                                    <select required name="exam_id" id="exam_id" data-live-search="true" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_exam_type)): ?>
                                            <?php foreach ($all_exam_type as $value) : ?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->exam_type; ?>">
                                                    <?php echo $value->exam_type; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="exam_date">Exam Date</label><span class="req">*</span>
                                    <input required type="text" class="form-control new_datepicker" id="exam_date"
                                           placeholder="Select Date" name="exam_date" autocomplete="off">
                                </div>
                                <div class="box-footer col-sm-3 clearfix" style="margin-top: 27px">
                                    <button id="mark_sheet_btn" type="submit" class="pull-left btn btn-success">Show <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="show_mark_sheet"></div>
            </section>
        </div>
    </section>
</aside>
<script>
    $(document).ready(function(){
        $("#session_id").on("change",function(){
            $("#class_id").selectpicker("val",'');
            $("#class_id").selectpicker("refresh");
        });
        $("#student_id").on("change",function(){
            var student_id=$(this).val();
            if(student_id=='')
            {
                $(".select_2").prop("required",true);
            }else{
                $(".select_2").prop("required",false);
            }
            $(".select_2").selectpicker("refresh");
        });
        //for student
        $("#class_id,#shift_id,#section_id").on("change",function(){
            var session_name=$("#session_id").val().split("#")[1];
            var class_name=$("#class_id").val().split("#")[1];
            var shift_name=$("#shift_id").val().split("#")[1];
            var section_name=$("#section_id").val().split("#")[1];
            var group_name=$("#group_id").val().split("#")[1];
            var post_data={
                "session_name":session_name,
                "class_name":class_name,
                "shift_name":shift_name,
                "section_name":section_name,
                "group_name":group_name,
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_by_condition",
                data: post_data,
                dataType:"json",
                success: function (data) {
                    // console.log(data);
                    $("#student_id").find('option').remove();
                    $("#student_id").selectpicker("refresh");
                    if(data!=''){
                        $("#student_id").append('<option value="">--Select--</option>')
                        $.each(data,function(key,value){
                            $("#student_id").append('<option value="'+ value.record_id +'#'+value.student_unique_id+'">'+ value.student_unique_id +'</option>')
                        });
                        $("#student_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        });
        //for exam type
        $("#class_id").on("change",function(){
            var session_id=$("#session_id").val().split("#")[0];
            var class_id=$("#class_id").val().split("#")[0];
            var post_data={
                "session_id":session_id,
                "class_id":class_id,
            };
            var class_name=$("#class_id").val().split("#")[1];
            if (class_name == '9' || class_name == '10') {
                $('.group_div').css('display', 'block');
                $('#group_id').prop('disabled',false);
                $('#group_id').selectpicker('val','');
                $('#group_id').selectpicker("refresh");

                $('#section_id').prop('disabled',true);
                $('#section_id').selectpicker('val','');
                $('#section_id').selectpicker("refresh");
                $('.section_div').hide();
            } else{
                $('.group_div').hide();
                $('#group_id').prop('disabled',true);
                $('#group_id').selectpicker('val','');
                $('#group_id').selectpicker("refresh");

                $('#section_id').prop('disabled',false);
                $('#section_id').selectpicker('val','');
                $('#section_id').selectpicker("refresh");
                $('.section_div').css('display', 'block');
            }
        });
        $("#student_admit_card_form").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_student_admit_card",
                data: $(this).serialize(),
                success: function (data) {
                    $("#show_mark_sheet").html(data);
                }
            });
        });
        
    });
</script>
<style>
    @media print {
        @page{
           size : A4 landscape;
            scale : 100;
            margin:20mm 0mm 0mm 90mm;
            padding:0px;
        }
         body{
            width:210mm;
        }
        a[href]:after {
            content: none !important;
        }

        #print_button {
            display: none;
        }

        #no_print1 {
            display: none;
        }

        #no_print2 {
            display: none;
        }

        #no_print3 {
            display: none;
        }

        #no_print4 {
            display: none;
        }

        #no_print5 {
            display: none;
        }

        #no_print6 {
            display: none;
        }

        #no_print7 {
            display: none;
        }

        #no_print8 {
            display: none;
        }
    }
    .clearfix::after {
        clear: both;
    }

    .page-break {
        page-break-after: always;
        page-break-inside: avoid;
        page-break-before: avoid;
    }
</style>
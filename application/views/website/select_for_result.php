<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if ($no == 1) {
    $title = "পরিক্ষার ফলাফল";
    $value="";
    $name_ajax = "get_website_total_result";
} elseif ($no == 2) {
    $title = "মেধা তালিকা";
    $value="merit_list";
    $name_ajax = "get_website_merit_list";
} elseif ($no == 3) {
    $title = "View Fail List";
    $value="fail_list";
    $name_ajax = "get_website_fail_list";
}
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info" style="color: black;">
        <form id="search_student_result">
            <div class="box-body">
                <p style="font-size: 20px;"><?php echo $title; ?></p>
                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="session_id">Select Session</label><small class="req"> *</small> 
                            <input type="hidden" name="list" value="<?= $value; ?>">
                            <input type="hidden" name="website" value="website">
                            <select name="session_id" required id="session_id" data-live-search="true" class="form-control selectpicker"
                                    data-container="body">
                                <?php if(isset($all_session)): ?>
                                    <?php foreach ($all_session as $value): ?>
                                        <option value="<?php echo $value->record_id; ?>#<?php echo $value->session_name; ?>">
                                            <?php echo $value->session_name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="class_id">Select Class</label><small class="req"> *</small> 
                            <select name="class_id" required id="class_id" data-live-search="true" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php if(isset($all_class)): ?>
                                    <?php foreach ($all_class as $value): ?>
                                        <option value="<?php echo $value->record_id; ?>#<?php echo $value->class_name; ?>">
                                            <?php echo nfa($value->class_name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="shift_id">Select Shift</label><small class="req"> *</small> 
                            <select required name="shift_id" id="shift_id" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php if(isset($all_shift)): ?>
                                <?php foreach ($all_shift as $value): ?>
                                    <option value="<?php echo $value->record_id; ?>#<?php echo $value->shift_name; ?>">
                                        <?php echo $value->shift_name; ?>
                                    </option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div style="display:none" class="form-group col-sm-3 col-xs-12 group_div">
                            <label for="group_id">Select Group</label><small class="req"> *</small> 
                            <select required disabled name="group_id" id="group_id" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php if(isset($all_group)): ?>
                                <?php foreach ($all_group as $value): ?>
                                    <option value="<?php echo $value->record_id; ?>#<?php echo $value->group_name; ?>">
                                        <?php echo $value->group_name; ?>
                                    </option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12 section_div">
                            <label for="section_id">Select Section</label><small class="req"> *</small> 
                            <select required name="section_id" id="section_id" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php if(isset($all_section)): ?>
                                <?php foreach ($all_section as $value): ?>
                                    <option value="<?php echo $value->record_id; ?>#<?php echo $value->section_name; ?>">
                                        <?php echo $value->section_name; ?>
                                    </option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div id="show_info2">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="exam_id">Select Exam</label>
                                <select name="exam_id" id="exam_id" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer col-sm-3 clearfix">
                            <button style="margin-top: 27px;" type="submit" class="pull-left btn btn-success"
                                    id="">Search &nbsp; <i class="fa fa-search"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div class="box box-info">
        <div class="box-body table-responsive" id="show_result" style="width: 98%; 
             color: black; border: #591e46 5px solid; border-radius: 10px; padding: 15px;">
            <h4 style="text-align: center;"><?php echo $title; ?></h4>
        </div>
    </div>
</div>
<br>
<script type="text/javascript">
    $("#session_id").on("change",function(){
        $("#class_id").prop("selectedIndex", 0);
        $("#exam_id").find('option').remove();
    });
    $("#class_id").on("change", function () {
        var session_id = $('#session_id').val().split("#")[0];
        var class_id = $('#class_id').val().split("#")[0];
        var class_name = $('#class_id').val().split("#")[1];

        if (class_name == '9' || class_name == '10') {
            $('.group_div').css('display', 'block');
            $('#group_id').prop('disabled',false);
            $("#group_id").prop("selectedIndex", 0);

            $('#section_id').prop('disabled',true);
            $("#section_id").prop("selectedIndex", 0);
            $('.section_div').hide();
        } else {
            $('.group_div').hide();
            $('#group_id').prop('disabled',true);
            $("#group_id").prop("selectedIndex", 0);

            $('#section_id').prop('disabled',false);
            $("#section_id").prop("selectedIndex", 0);
            $('.section_div').css('display', 'block');
        }
        $("#shift_id").prop("selectedIndex", 0);
        $("#exam_id").prop("selectedIndex", 0);
       
        var post_data = {
            'class_id': class_id,
            'session_id': session_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_exam_info",
            data: post_data,
            success: function (data) {
                $('#show_info2').html(data);
                $('#date_div').hide();
                $("#exam_id").prop("selectedIndex", 0);
            }
        });
    });
    $("#search_student_result").on("submit",function(e){
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            dataType:"json",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_total_result",
            data: $(this).serialize(),
            success: function (data) {
                if(data.msg=="success")
                {
                    $('#show_result').html(data.result);
                }else{
                    $('#show_result').html("<p style='color: red; text-align: center; font-size: 20px;'><b>Result has not been published yet</b></p>");
                }
                // $('#date_div').hide();
            }
        });
    });
</script>
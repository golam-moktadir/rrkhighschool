<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
                <section class="col-xs-12 connectedSortable">
                    <div class="" style="color: black;">
                        <form id="search_student">
                            <div class="box-body">
                                <p style="font-size: 20px;">Student's Mark Input</p>
                                <p style="font-size: 20px; color: #066;" id="msg"></p>
                                <?php echo $this->session->flashdata('msg');?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group col-sm-3 col-xs-12">
                                            <label for="session_id">Select Session</label><small class="req"> *</small> 
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
                                            <label for="teacher_id">Teacher</label><small class="req"> *</small> 
                                            <select  name="teacher_id" required id="teacher_id" data-live-search="true" class="form-control selectpicker"
                                                    data-container="body">
                                                <option value="">-- Select --</option>
                                                <div>
                                                <?php if(isset($all_teacher)): ?>
                                                    <?php foreach ($all_teacher as $value): ?>
                                                        <option value="<?php echo $value->record_id; ?>">
                                                            <?php echo $value->name; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif;?>
                                                </div>
                                            </select>
                                        </div>
                                        <div id="show_info"></div>
                                        <div class="box-footer col-sm-3 clearfix">
                                            <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success" >Search <i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="show_info3">
                    </div>
                </section>
        </div>
    </section>
</aside>

<script>
    $("#session_id").on("change",function(){
        $('#teacher_id').selectpicker('val','');
        $('#teacher_id').selectpicker('refresh');
    });
    $("#teacher_id").on("change", function () {
        var teacher_id = $('#teacher_id').val();
        var session_id = $('#session_id').val().split("#")[0];
        var post_data = {
            'teacher_id': teacher_id,
            'session_id': session_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_teacher_sub_info",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
                $('#class_id').selectpicker('refresh');
                $('#shift_id').selectpicker('refresh');
                $('#group_id').selectpicker('refresh');
                $('#section_id').selectpicker('refresh');
                $('#exam_id').selectpicker('refresh');
                $('#subject_id').selectpicker('refresh');
            }
        });
    });
   
    $("#search_student").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_student_for_marks",
            data: $(this).serialize(),
            success: function (data) {
                $('#show_info3').html(data);
            }
        });
    });
</script>
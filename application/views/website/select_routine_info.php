<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info" style="color: black;">
        <form id="routine_form">
            <div class="box-body">
                <p style="font-size: 20px;">View Class Routine</p>
                <div class="row">
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="class_name">Select Class<b style="color: red;">*</b></label>
                        <select name="class_name" id="class_name" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_class as $single_class) { ?>
                                <option value="<?php echo $single_class->class_name; ?>">
                                    <?php echo "Class - " . $single_class->class_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="group_name">Select Group<b style="color: red;">*</b></label>
                        <select name="group_name" id="group_name" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_group as $single_group) { ?>
                                <option value="<?php echo $single_group->group_name; ?>">
                                    <?php echo $single_group->group_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="section_name">Select Section<b style="color: red;">*</b></label>
                        <select name="section_name" id="section_name" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_section as $single_section) { ?>
                                <option value="<?php echo $single_section->section_name; ?>">
                                    <?php echo $single_section->section_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="session_name">Select Year<b style="color: red;">*</b></label>
                        <select name="session_name" id="session_name" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_session as $single_session) { ?>
                                <option value="<?php echo $single_session->session_name; ?>">
                                    <?php echo $single_session->session_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <button id="routine_btn" type="button" class="pull-left btn btn-success">Show Routine <i class="fa fa-arrow-circle-right"></i></button>
            </div>
        </form>
    </div>
    <div class="box box-info">
        <div class="box-body table-responsive" id="show_routine" style="width: 98%; overflow: scroll; color: black;">

        </div>
    </div>
</div>

<script type="text/javascript">
    $("#routine_btn").click(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_class_routine",
            data: $('#routine_form').serialize(),
            success: function (data) {
                $('#show_routine').html(data);
            }
        });
    });
</script>
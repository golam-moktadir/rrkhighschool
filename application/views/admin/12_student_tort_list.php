<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="no_print1">
                    <form id="specific_mark_sheet_form">
                        <div class="box-body">
                            <p style="font-size: 20px;">Student Tort List</p>
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="class_name">Select Class</label>
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
                                    <label for="group_name">Select Group</label>
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
                                    <label for="session_name">Select Year</label>
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
                            <button id="tort_list" type="button" class="pull-left btn btn-success">Show <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </form>
                </div>

                <div id="show_mark_sheet"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $("#tort_list").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_tort_list",
                data: $('#specific_mark_sheet_form').serialize(),
                success: function (data) {
                    $('#show_mark_sheet').html(data);
                }
            });
        });
    };
</script>

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
        #no_print2 {
            display: none;
        }
    }
    /*    @page {
            size: auto;    auto is the initial value
            margin: 0;   this affects the margin in the printer settings
        }*/
</style>
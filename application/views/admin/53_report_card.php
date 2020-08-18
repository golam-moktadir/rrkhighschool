<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print1">
                    <?php echo form_open_multipart(''); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Report Card</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <<?php foreach ($all_class as $single_class) { ?>
                                            <option value="<?php echo $single_class->class_name; ?>">
                                                <?php echo 'Class - ' . nfa($single_class->class_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="student_id">Select Student</label>
                                    <select name="student_id" id="student_id" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_student as $single_student) { ?>
                                            <option value="<?php echo $single_student->student_unique_id; ?>">
                                                <?php echo $single_student->student_unique_id; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div id="show_info2">

                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label for="exam_name">Select Exam</label>
                                        <select name="exam_name" id="exam_name" class="form-control selectpicker"
                                                data-container="body">
                                            <option value="">-- Select --</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="box-footer col-sm-3 clearfix">
                                    <button style="margin-top: 27px" type="button" class="pull-left btn btn-success"
                                            id="get_report_card">Search &nbsp <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div>
                    <p style="padding: 10px;">
                        <button id="print_button" title="Click to Print" type="button"
                                onClick="window.print()" class="btn btn-flat btn-warning">Print
                        </button>
                    </p>
                    <div class="box-header" style="color: black; text-align: center;">
                        <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                                 alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
                    </div>
                    <h3 class="box-title" style="color: black; text-align: center; padding-bottom: 10px;"><u>Report
                            Card</u></h3>
                    <div id="show_info"></div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    $("#class_name").on("change", function () {
        var input_data = $('#class_name').val();
        console.log(input_data);
        var post_data = {
            'class_name': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_exam_info",
            data: post_data,
            success: function (data) {
                $('#show_info2').html(data);
                $('#date_div').hide();
                $('#exam_name').selectpicker('refresh');
            }
        });
    });

    $("#get_report_card").on("click", function () {
        var input_class = $('#class_name').val();
        var input_student_id = $('#student_id').val();
        var input_exam = $('#exam_name').val();
        var post_data = {
            'class': input_class,
            'student_id': input_student_id,
            'exam': input_exam,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_report_card",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
                $('#date_div').hide();
            }
        });
    });
</script>

<style>
    @media print {
        a[href]:after {
            content: none !important;
        }
        @page{
            margin: 0px;
            padding: 0px;
        }

        #print_button {
            display: none;
        }

        #no_print1 {
            display: none;
        }
    }

    /*    @page {
            size: auto;    auto is the initial value 
            margin: 0;   this affects the margin in the printer settings 
        }*/
</style>
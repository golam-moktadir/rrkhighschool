<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Search Report</p>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="date">Select Date</label>
                                <input type="date" class="form-control" id="date" placeholder="" name="date">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="teacher_staff">Teacher/Staff Info.</label>
                                <select name="teacher_staff" id="teacher_staff" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_teacher_staff as $single_teacher_staff) { ?>
                                        <option value="<?php echo $single_teacher_staff->teacher_staff_id; ?>">
                                            <?php echo $single_teacher_staff->teacher_staff_id . ", " . $single_teacher_staff->teacher_staff_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success"
                                id="search_report">Search &nbsp <i class="fa fa-search"></i></button>
                    </div>
                </div>


                <div class="box box-info">
                    <p style="padding: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                                      onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                    <div class="box-header"  style="color: black; text-align: center;">
                        <h3><img src="<?php echo base_url(); ?>assets/img/gangriho_full.jpg" 
                                 alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
                    </div>
                    <h3 class="box-title" style="color: black; text-align: center; padding-bottom: 10px;"><u>Provident Fund Report</u></h3>
                    <div id="show_info"></div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#search_report").on("click", function () {
        var date = $('#date').val();
        var teacher_staff = $('#teacher_staff').val();
        var post_data = {
            'date': date,
            'teacher_staff': teacher_staff,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_pf_report",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
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
    }
    /*    @page {
            size: auto;    auto is the initial value 
            margin: 0;   this affects the margin in the printer settings 
        }*/
</style>
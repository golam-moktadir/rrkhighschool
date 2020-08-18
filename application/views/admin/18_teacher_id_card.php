<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Search Specific ID Card</p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="teacher_id">Select Teacher</label>
                                <select name="teacher_id" id="teacher_id" class="form-control selectpicker"
                                        data-container="body"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_teacher as $single_teacher) { ?>
                                        <option value="<?php echo $single_teacher->teacher_unique_id; ?>">
                                            <?php echo $single_teacher->teacher_unique_id; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="validity2">Validity Date<b style="color: red;">*</b></label>
                                <input type="text" name="validity2" id="validity2"
                                       class="form-control new_datepicker"
                                       value="<?php echo date('d-m-Y'); ?>"
                                       autocomplete="off" placeholder="Select Date">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12" style="margin-top: 27px;">
                                <button id="specific_id_card_btn" type="button"
                                        class="pull-left btn btn-success">Show <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="color: black;" id="no_print2">
                    <form id="id_card_form">
                        <div class="box-body">
                            <p style="font-size: 20px;">Search for All ID Card</p>
                            <div class="row">

                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="all">Select </label>
                                    <input type="text" name="all" id="all"
                                           class="form-control"
                                           value="All"
                                           autocomplete="off" readonly>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="validity">Validity Date<b style="color: red;">*</b></label>
                                    <input type="text" name="validity" id="validity"
                                           class="form-control new_datepicker"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>
                                <div class="form-group col-sm-3 col-xs-12" style="margin-top: 27px;">
                                    <button id="id_card_btn" type="button"
                                            class="pull-left btn btn-success">Show <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="show_id_card"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $("#id_card_btn").click(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_all_id_card_teacher",
                data: $('#id_card_form').serialize(),
                success: function (data) {
                    $('#show_id_card').html(data);
                }
            });
        });
        $("#specific_id_card_btn").click(function () {
            var input_data = $('#teacher_id').val();
            var validity = $('#validity2').val();
            var post_data = {
                'teacher_id': input_data,
                'validity': validity,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_specific_id_card_teacher",
                data: post_data,
                success: function (data) {
                    $('#show_id_card').html(data);
                }
            });
        });
    };

    $("#class_name").on("change", function () {
        var input_data = $('#class_name').val();
        console.log(input_data);
        if (input_data == '9' || input_data == '10') {
            $('#group_div').css('display', 'block');
            $('#section_name').val('');
            $('#section_div').hide();
        } else {
            $('#group_name').val('');
            $('#group_div').hide();
            $('#section_div').css('display', 'block');
        }
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

        #no_print9 {
            display: none;
        }
    }

    /*    @page {
            size: auto;    auto is the initial value 
            margin: 0;   this affects the margin in the printer settings 
        }*/
</style>
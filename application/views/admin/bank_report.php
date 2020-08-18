<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Search Report</p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker"
                                       name="date_from" id="date_from"
                                       value="<?php echo date('d-m-Y'); ?>"
                                       autocomplete="off" placeholder="Select Date">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_to">Date To</label>
                                <input type="text" class="form-control new_datepicker"
                                       name="date_to" id="date_to"
                                       value="<?php echo date('d-m-Y'); ?>"
                                       autocomplete="off" placeholder="Select Date">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="bank_name">Select Bank</label>
                                <select name="bank_name" id="bank_name" class="form-control selectpicker"
                                        data-live-search="true" data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_bank as $each_bank) { ?>
                                        <option value="<?php echo $each_bank->bank_name; ?>">
                                            <?php echo $each_bank->bank_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="box-footer col-sm-3 clearfix">
                                <button style="margin-top: 27px" type="button" class="pull-left btn btn-success"
                                        id="search_report">Search &nbsp <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box box-info">
                    <p style="padding: 10px;">
                        <button id="print_button" title="Click to Print" type="button"
                                onClick="window.print()" class="btn btn-flat btn-warning">Print
                        </button>
                    </p>
                    <div class="box-header" style="color: black; text-align: center;">
                        <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                                 alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
                    </div>
                    <h3 class="box-title" style="color: black; text-align: center; padding-bottom: 10px;"><u>Total
                            Report</u></h3>
                    <div id="show_info"></div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#search_report").on("click", function () {
        var from_date = $('#date_from').val();
        var to_date = $('#date_to').val();
        var bank_name = $('#bank_name').val();
        var post_data = {
            'from_date': from_date,
            'to_date': to_date,
            'bank_name': bank_name,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_bank_report",
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
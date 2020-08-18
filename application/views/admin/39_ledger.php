<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print1">
                    <?php echo form_open_multipart('aaa/aaa'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Ledger (Columnar Cash Book)</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date_from">Date From</label>
                                    <input type="text" class="form-control new_datepicker"
                                           name="date_from" id="date_from"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date_to">Date To</label>
                                    <input type="text" class="form-control new_datepicker"
                                           name="date_to" id="date_to"
                                           value="<?php echo date('d-m-Y'); ?>"
                                           autocomplete="off" placeholder="Select Date">
                                </div>
                                <div class="box-footer col-sm-4 clearfix">
                                    <button style="margin-top: 27px" type="button" class="pull-left btn btn-success" id="ledger">Search &nbsp <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div id="show_info"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $("#ledger").on("click", function () {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            var post_data = {
                'date_from': date_from,
                'date_to': date_to,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_ledger_info",
                data: post_data,
                success: function (data) {
                    $('#show_info').html(data);
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
    }
    /*    @page {
            size: auto;    auto is the initial value 
            margin: 0;   this affects the margin in the printer settings 
        }*/
</style>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Send SMS to Guardian</p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="title">Message Title</label>
                                <select name="title" id="title" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_value as $single_value) { ?>
                                        <option value="<?php echo $single_value->title; ?>">
                                            <?php echo $single_value->title; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="body">Message Body</label>
                                <textarea rows="8" name="body" id="body" class="form-control"></textarea>
                            </div>
                            <div class="box-footer col-sm-4 clearfix">
                                <button type="button" class="pull-left btn btn-success" id="send_sms">Send &nbsp <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="box box-info" style="color: black;" id="show_info"></div>
            </section>
        </div>
    </section>
</aside>
<script>
    $('#title').on('change', function () {
        var title = $('#title').val();
        var post_data = {
            'title': title,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_sms_by_title",
            data: post_data,
            success: function (data) {
                //alert(data)
                $('#body').html(data);
            }
        });
    });
    $("#send_sms").on("click", function () {
        var sms_body = $('#body').val();

        var post_data = {
            'sms_body': sms_body,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/send_sms_to_guardians2",
            data: post_data,
            success: function (data) {
                //alert(data)
                $('#show_info').html(data);
            }
        });
    });
</script>
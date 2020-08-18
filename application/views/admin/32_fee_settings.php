<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Insert/fee_settings'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Class-wise Fee Settings</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_class as $single_class) { ?>
                                            <option value="<?php echo $single_class->class_name; ?>">
                                                <?php echo "Class - " . nfa($single_class->class_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="fees_head_name">Fees Head</label>
                                    <select name="fees_head_name" id="fees_head_name" class="form-control selectpicker">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_fee_head as $single_fee_head) { ?>
                                            <option value="<?php echo $single_fee_head->fee_head; ?>">
                                                <?php echo $single_fee_head->fee_head; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="fee_amount">Fees Amount</label>
                                    <input type="text" name="fee_amount" id="fee_amount"
                                           class="form-control selectpicker">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <button style="margin-top: 27px;" type="button" class=" btn btn-success"
                                            id="save_btn">
                                        Add <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="box-body table-responsive" style="width: 98%; color: black;">
                    <table id="salesList" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;">Class</th>
                            <th style="text-align: center;">Fees Head</th>
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="show_all_fees">

                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success btn-sm"
                                id="confirm_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
                <br>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Fee Settings Info</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Fees Head</th>
                                <th style="text-align: center;">Amount</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++; ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo nfa($single_value->class_name); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->fee_head; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->amount; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info fa fa-edit" title="Edit"
                                           href="<?php echo base_url(); ?>Show_edit_form/fee_settings/<?php echo $single_value->record_id; ?>/main">
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger fa fa-trash-o" title="Delete"
                                           href="<?php echo base_url(); ?>Delete/fee_settings/<?php echo $single_value->record_id; ?>">
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>


<script type="text/javascript">

    var all_fees = new Array();
    var fees_count = 0;

    $("#save_btn").click(function () {
        var class_name = $('#class_name').val();
        var fees_head_name = $('#fees_head_name').val();
        var fee_amount = $('#fee_amount').val();
        if (class_name == '') {
            alert("Select Class");
        } else {
            all_fees[fees_count] = new Array(class_name, fees_head_name, fee_amount);
            var full_table = "";
            for (var i = 0; i < all_fees.length; i++) {
                full_table += "<tr>";
                for (var j = 0; j < all_fees[i].length; j++) {
                    full_table += "<td style='text-align: center;'>" + all_fees[i][j] + "</td>";
                }
                full_table += "<td style='text-align: center;'><button class='btn btn-danger fa fa-trash-o' onclick='delete_data(" + i + ")'></button></td></tr>";
            }
            $('#show_all_fees').html(full_table);
            fees_count++;
        }
    });

    function delete_data(arr_no) {
        all_fees.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_fees.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_fees[i].length; j++) {

                full_table += "<td style='text-align: center;'>" + all_fees[i][j] + "</td>";

            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger fa fa-trash-o'\n\
             onclick='delete_data(" + i + ")'></button></td></tr>";
        }
        $('#show_all_fees').html(full_table);
        fees_count--;
    }

    $("#confirm_btn").click(function () {
        var post_data = {
            'all_fees': all_fees,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/fee_settings",
            data: post_data,
            success: function (data) {
                window.location.reload();
            }
        });
    });
</script>
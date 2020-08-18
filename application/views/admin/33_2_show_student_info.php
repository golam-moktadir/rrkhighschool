<?php if (!empty($all_value)) { ?>
    <div class="frm3" id="frm3">
        <?php
        foreach ($all_value as $single_value) {
            $student_id = $single_value->student_id;
            $class = $single_value->class_name;
            ?>

            <div class="box box-info">
                <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                    <div class="row">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" readonly
                                   value="<?php echo $single_value->student_name; ?>">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="class">Class</label>
                            <input type="text" name="class" id="class" class="form-control" readonly
                                   value="<?php echo $single_value->class_name; ?>">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="shift">Shift</label>
                            <input type="text" name="shift" id="shift" class="form-control" readonly
                                   value="<?php echo $single_value->shift_name; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="section">Section</label>
                            <input type="text" name="section" id="section" class="form-control" readonly
                                   value="<?php echo $single_value->section_name; ?>">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="group">Group</label>
                            <input type="text" name="group" id="group" class="form-control" readonly
                                   value="<?php echo $single_value->group_name; ?>">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="hall">Hall Name</label>
                            <input type="text" name="hall" id="hall" class="form-control" readonly
                                   value="<?php echo $single_value->dormitory_name; ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="box box-info">
            <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="fees_head">Fee's Particular</label>
                    </div>
                    <div class="form-group col-sm-2">
                        <select name="fees_head" id="fees_head" class="form-control selectpicker"
                                data-live-search="true">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_fee_head as $fee_head) { ?>
                                <option value="<?php echo $fee_head->record_id . "#" . $fee_head->amount . "#" . $fee_head->fee_head; ?>"><?php echo $fee_head->fee_head; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="amount">Amount</label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" name="amount" id="amount" readonly/>
                    </div>
                </div>
                <div class="row" id="comments_div" style="display: none;">
                    <div class="form-group col-sm-2">
                        <label for="month">Select Month</label>
                    </div>

                    <div class="form-group col-sm-2 ">
                        <select name="month[]" id="month" class="form-control selectpicker"
                                data-live-search="true" multiple="multiple" size="10">
                            <option value="Jan">January</option>
                            <option value="Feb">February</option>
                            <option value="Mar">March</option>
                            <option value="Apr">April</option>
                            <option value="May">May</option>
                            <option value="Jun">June</option>
                            <option value="Jul">July</option>
                            <option value="Aug">August</option>
                            <option value="Sep">September</option>
                            <option value="Oct">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="quantity">Quantity</label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" name="quantity" id="quantity" onkeyup="balance()"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="balance">Balance</label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" name="balance" id="balance"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="discount">Discount</label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" name="discount" id="discount">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="total">Total</label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" name="total" id="total" readonly/>
                    </div>
                    <div class="form-group col-sm-4">
                        <button type="button" class="pull-left btn btn-success" id="save_fees_info">Save &nbsp <i
                                class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control" name="t_data" value="" id="t_data">
        <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_id; ?>">
        <div class="box box-info">
            <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                <p class="box-title" style="color: black; font-size: 20px;">Fees Details</p>
                <table id="myTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Particulars</th>
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Discount</th>
                            <th style="text-align: center;">Total</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                </table>
                <div class="row" style="margin-top:10px;">
                    <div class="form-group col-sm-10" style="text-align:right;">
                        <label for="student_id">Total</label>
                    </div>
                    <div class="form-group col-sm-2" style="text-align:right;">
                        <input type="text" readonly class="form-control" name="in_total" value="0" id="in_total">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>

    var data = "";
    var total = 0;
    var t_id = 0;
    $("#fees_head").on("change", function () {
        $("#quantity").val("");
        $('#total').val("");
        $('#comments').val("");
        $('#discount').val("");
        $('#balance').val("");
        var amount = $("#fees_head").val().split('#');
        console.log(amount);
        if ($("#fees_head").val() == '') {
            $('#comments_div').hide();
            console.log('c');
        } else {
            if (amount[2].includes('Monthly')) {
                $('#comments_div').show();
                console.log('a');
            } else {
                $('#comments_div').hide();
                console.log('b');
            }
        }
        $('#amount').val(amount[1]);
    });

    $("#month").on("change", function () {
        var month = $('#month').val();
        var count = $('#month :selected').length;
        var amount = $('#amount').val();
        var res = amount * count - $('#discount').val();
        $('#quantity').val(count);
        $('#balance').val(res);
    });
    // function balance() {
    //     var amount = $("#fees_head").val().split('#');
    //     var particulars = $("#fees_head option:selected").text();
    //     var res = amount[1] * $('#quantity').val() - $('#discount').val();
    //     $('#balance').val(res);
    //     var cmt = $('#month').val();
    //     // if ($('#comments').val() != "") {
    //     //     cmt = $('#comments').val().replace("#", "-");
    //     //     cmt = "(" + cmt + ")";
    //     // }
    //     console.log(cmt);
    //     //console.log(data);
    //
    // }
    $("#total").on("click", function () {
        var amount = $("#fees_head").val().split('#');
        var particulars = $("#fees_head option:selected").text();
        var res = amount[1] * $('#quantity').val() - $('#discount').val();
        $('#total').val(res);
        var cmt = "";
        if ($('#month').val() != "") {
            cmt = $('#month').val();
            cmt = "(" + cmt + ")";
        }
        data = data + particulars + cmt + "#" + amount[1] + "#" + $("#quantity").val() + "#" + $("#discount").val() + "#" + res + "#";

        total = parseInt(total) + parseInt(res);
        $('#in_total').val(total);
        $('#t_data').val(data);
        $('#myTable tr:last').after('<tr  id=' + (t_id++) + '><td>' + particulars + cmt + '</td><td>' + amount[1] + '</td><td>' + $('#quantity').val() + '</td><td>' + $("#discount").val() + '</td><td>' + res + '</td><td class="delete-confirm btn btn-danger btn-xs" style="width:100%;" >' + 'Delete' + '</td></tr>');

    });

    $('#myTable').on('click', 'tr', function (e) {
        $("#myTable").find("tr:gt(0)").remove();
        //  alert(data);
        var t_id = 0;
        total = 0;
        var id = this.id;
        //alert(id);
        var tmp_data = data;
        data = "";
        var tdata = "";
        tmp_data = tmp_data.slice(0, -1);
        tdata = tmp_data.split("#");
        var j = 0;
        for (var i = 0; i < tdata.length; ) {
            if (j != id) {
                data = data + tdata[i] + "#" + tdata[i + 1] + "#" + tdata[i + 2] + "#" + tdata[i + 3] + "#" + tdata[i + 4] + "#";
                $('#myTable tr:last').after('<tr  id=' + (t_id++) + '><td>' + tdata[i] + '</td><td>' + tdata[i + 1] + '</td><td>' + tdata[i + 2] + '</td><td>' + tdata[i + 3] + '</td><td>' + tdata[i + 4] + '</td><td class="delete-confirm btn btn-danger btn-xs" style="width:100%;" >' + 'Delete' + '</td></tr>');
                total = parseInt(total) + parseInt(tdata[i + 1] * tdata[i + 2]);
            }
            j++;
            i = i + 5;
        }
        $('#in_total').val(total);
        $('#t_data').val(data);
        //  $(this).remove();

    });
    $("#save_fees_info").on("click", function () {
        if ($('#t_data').val() == "") {
            alert("Please insert Fee Info");

        } else {
            //alert($('#t_data').val()+" "+$('#student_id').val());
            var input_data = $('#student_id').val();
            var input_month = $('#date').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Insert/dorm_rent_collection",
                data: $("#frm3 input").serialize(),
                success: function (data) {
                    console.log(data);
                    var invoice = data;
                    window.open("<?php echo base_url(); ?>Get_ajax_value/get_hall_collection_report/" + input_month + "/" + input_data + "/" + invoice, "_blank");
                    $('#show_info').html(data);
                }
            });
        }
    });
    $(".pay").on("click", function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Insert/dorm_rent_collection",
            data: $("#frm2 input").serialize(),
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });

</script>


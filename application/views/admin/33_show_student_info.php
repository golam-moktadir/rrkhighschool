<style>
#overlay {
  position: fixed;
  width: 100%;
  height: 100%;
  display:none;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 999;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 20px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
<div id="overlay">
  <div id="text">Please Wait...</div>
</div>
<div class="frm3" id="frm3">
    <?php
    foreach ($all_value as $single_value) {
        $student_id = $single_value->student_unique_id;
        $class = $single_value->class_name;
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-sm-4 col-xs-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" readonly
                           value="<?php echo $single_value->name; ?>">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label for="class">Class</label>
                    <input type="hidden" name="class" id="class" class="form-control" readonly
                           value="<?php echo $single_value->class_name; ?>">

                    <input type="text" name="class2" id="class2" class="form-control" readonly
                           value="<?php echo nfa($single_value->class_name); ?>">
                </div>
                <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                    <label for="section">Section</label>
                    <input type="text" name="section" id="section" class="form-control" readonly
                           value="<?php echo $single_value->section_name; ?>">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label for="roll">Roll</label>
                    <input type="text" name="roll" id="roll" class="form-control" readonly
                           value="<?php echo $single_value->roll; ?>">
                </div>
                <div class="form-group col-sm-4 col-xs-12" style="display: none">
                    <label for="group">Group</label>
                    <input type="text" name="group" id="group" class="form-control" readonly
                           value="<?php echo $single_value->group_name; ?>">
                </div>

            </div>
        </div>
    <?php } ?>
    <div class="well col-sm-12"
         style="margin-top: 10px; padding: 20px; border: 2px solid; border-radius: 15px;">
        <div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black;">
            <form id="add_fees">
                <div class="row">
                    <div class="form-group col-sm-3" style="padding-top: 5px;">
                        <label for="fees_head">Fees Particular</label><small class="req">*</small>
                        <select name="fees_head" required id="fees_head" class="form-control selectpicker" data-live-search="true">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_fee_head as $fee_head) { ?>
                                <option value="<?php echo $fee_head->record_id . "#" . $fee_head->amount . "#" . $fee_head->fee_head; ?>"
                                <?php
                                if (preg_match('/' . $fee_head->fee_head . '-' . date('Y') . '/', $paid_fees_heads)) {
                                    echo 'disabled';
                                }
                                ?>><?php echo $fee_head->fee_head; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-2" style="padding: 5px;">
                        <label for="amount">Fees Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" readonly/>
                    </div>
                    <div class="form-group col-sm-2" id="comments_div" style="display: none; padding: 5px;">
                        <label for="month">Select Month</label>
                        <select name="month[]" id="month" class="form-control"
                                multiple="multiple" size="10">
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
                    <div id="q" style="display: none;" style="padding: 5px;">
                        <div class="form-group col-sm-3">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" class="form-control" id="quantity"/>
                        </div>
                    </div>
                    <div id="b" style="display: none;" style="padding: 5px;">
                        <div class="form-group col-sm-3">
                            <label for="balance">Total</label>
                            <input type="text" class="form-control" name="balance" id="balance"/>
                        </div>
                    </div>

                    <div class="form-group col-sm-2" style="display: none; padding: 5px;">
                        <label for="payment">Payment</label>
                        <input type="text" class="form-control" value="0" name="payment" id="payment">
                    </div>
                    <div class="form-group col-sm-2" style="padding: 5px;">
                        <label for="total">Balance</label>
                        <input type="text" class="form-control" name="total" id="total" readonly/>
                    </div>
                    <div class="form-group col-sm-1 discount_hide" style="padding: 5px;">
                        <label for="discount">Waiver</label>
                        <input type="text" class="form-control" value="0" name="discount" id="discount">
                    </div>
                    <div class="form-group col-sm-2" style="padding: 5px;">
                        <button style="margin-top: 27px;" type="submit" class="pull-left btn btn-success"
                                id="">Add &nbsp; <i
                                class="fa fa-plus-square"></i>
                        </button>
                    </div>

                </div>
            </form>
            <div class="row"></div>


            <input type="hidden" class="form-control" name="t_data" value="" id="t_data">
            <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_id; ?>">
            <input type="hidden" class="form-control" name="recent_year" value="<?php echo $month; ?>">


            <div class="row">
                <table id="myTable" class="table table-bordered table-hover">
                    <p style="font-size:20px; padding-left: 20px;">Fees Details</p>
                    <thead>
                        <tr>
                            <th style="text-align: center;">Particulars</th>
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Tution Discount</th>
                            <th style="text-align: center;">Sub Total</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                </table>

                <table id="" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="2" style="text-align: center;">Previous Due</td>
                            <td colspan="2" style="text-align: center;" >Discount</td>
                            <td colspan="2" style="text-align: center;">Total</td>
                            <td colspan="2" style="text-align: center;">Payment</td>
                            <td colspan="2" style="text-align: center;">Due</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" readonly class="form-control" name="previous_due"
                                       value="<?php echo $due; ?>" id="previous_due">
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control" value="0"
                                       name="t_discount" id="t_discount">
                            </td>
                            <td colspan="2">
                                <input type="text" readonly class="form-control" name="in_total"
                                       value="0" id="in_total">
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control" name="total_pay"
                                       value="0" id="total_pay">
                            </td>
                            <td colspan="2">
                                <input type="text" readonly class="form-control" name="due"
                                       value="<?php echo $due; ?>" id="due">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="text-align: right;"></td>
                            <td style="float: right;">
                                <button style="width: 100%;" type="button" class="pull-left btn btn-success"
                                        id="save_fees_info">Pay &nbsp; <i
                                        class="fa fa-save"></i></button>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
    </div>
</div>


<script>

    var data = "";
    var total = 0;
    var t_id = 0;
    var p_due = $('#previous_due').val();
    $("#fees_head").on("change", function () {
        //shipan update 11-05-2019
        var fees_head_value=$(this).val().split('#');
        $("#quantity").val(1);
        $('#comments').val("");
        // $('#discount').val(0);
        // $('#payment').val(0);
        var amount = $("#fees_head").val().split('#');
        if ($("#fees_head").val() == '') {
            $('#comments_div').hide();
            $('#q').hide();
            $('#b').hide();
        } else {
            if (!amount[2].includes('Tuition Fee')) {
                $(".discount_hide").hide();
                $('#comments_div').hide();
                $('#q').hide();
                $('#b').hide();
                // $('#month').empty();
                $('#month option').attr('selected', false);
                $('#month').selectpicker('refresh');
            } else {
                //Show paying month yellow
                $(".discount_hide").show();
                $('#comments_div').show();
                $('#month').selectpicker('refresh');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>Get_ajax_value/get_fee_discount",
                    data: $("#frm3 input").serialize(),
                    success: function (data) {
                        $("#discount").val(data);
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>Get_ajax_value/student_tuition_months",
                    data: $("#frm3 input").serialize(),
                    dataType:"json",
                   success: function (data) {
                        var search_data_month=data.tution_month;
                        var search_data_amount=data.tution_amount;
                        var paid = search_data_month.split(',');
                        console.log(paid);
                        var temp_amount = search_data_amount.split(',');
                        var i=0;
                        $('#month > option').each(function () {
                            if (jQuery.inArray($(this).val(), paid) >= 0) {
                                $(this).prop('disabled', true);
                                if(temp_amount[i]==0){
                                    var paidColor=0;
                                    switch (paid[i]) {
                                        case "Jan":
                                            paidColor=1;
                                            break;
                                        case "Feb":
                                            paidColor=2;
                                            break;
                                        case "Mar":
                                            paidColor=3;
                                            break;
                                        case "Apr":
                                            paidColor=4;
                                            break;
                                        case "May":
                                            paidColor=5;
                                            break;
                                        case "Jun":
                                            paidColor=6;
                                            break;
                                        case "Jul":
                                            paidColor=7;
                                            break;
                                        case "Aug":
                                            paidColor=8;
                                            break;
                                        case "Sep":
                                            paidColor=9;
                                            break;
                                        case "Oct":
                                            paidColor=10;
                                            break;
                                        case "Nov":
                                            paidColor=11;
                                            break;
                                        case "Dec":
                                            paidColor=12;
                                            break;
                                    }
                                    $("#comments_div .bootstrap-select .dropdown-menu").find("li:nth-child("+(paidColor)+")").css('background-color', 'red');
                                }
                                i++;
                            }
                        });
                    }
                });
                $("#quantity").val(0);
            }
        }
        $('#amount').val(amount[1]);
        $('#balance').val(amount[1]);
        $('#total').val(amount[1]);
    });

    $("#month").on("change", function () {
        var month = $('#month').val();
        var count = $('#month :selected').length;
        var amount = $('#amount').val();
        var res = amount * count;
        $('#quantity').val(count);
        $('#balance').val(res);
        $('#total').val(res);
    });

    var check_particulars = [];
    $("#add_fees").on("submit", function (e) {
        e.preventDefault();
        var particulars = $("#fees_head option:selected").text();
        if (check_particulars.includes(particulars)) {
            alert("You have already added " + particulars);
        } else {
            check_particulars.push(particulars);
            var amount = $("#fees_head").val().split('#');
            var fee_discount="";
            var res="";
            var tution_discount=$("#discount").val();
            if(tution_discount=='')
            {
                tution_discount=0;
            }
            if(amount[2]=="Tuition Fee"){
                fee_discount = parseInt(tution_discount);
                res = (amount[1] - fee_discount) * $('#quantity').val();
            }else{
                res = (amount[1]) * $('#quantity').val();
            }
            var payment = $('#payment').val();
            if (res - payment > 0) {
                var due = res - payment;
            } else {
                var due = 0;
            }
            var quantity=$('#quantity').val();
            //$('#total').val(payment);
            var cmt = "";
            if ($('#month').val() != null) {
                cmt = $('#month').val();
                cmt = "(" + cmt + ")";
            }
            total=Number($('#in_total').val());
            data=$('#t_data').val();
            data = data + particulars + cmt + "#" + (amount[1]) + "#" + $("#quantity").val() + "#" +(fee_discount*quantity)+ "#"+ (res) + "#";
            total = parseInt(total) + parseInt(res);
            $('#in_total').val(total);
            $('#due').val(Number(p_due) + Number($('#in_total').val()) - Number($('#total_pay').val()));
            $('#t_data').val(data);
            $('#myTable tr:last').after('<tr id=' + (t_id++) + '>' +
                    '<td style="text-align: center;" class="head">' + particulars + cmt + '</td>' +
                    '<td style="text-align: center;" class="amount">' + ((amount[1])) + '</td>' +
                    '<td style="text-align: center;" class="quantity">' + $('#quantity').val() + '</td>' +
                    '<td style="text-align: center;" class="fee_discount">' + (fee_discount*quantity) + '<input type="hidden" value="'+fee_discount*quantity+'" name="tution_fee_discount[]" class="tution_fee_discount"></td>' +
                    '<td style="text-align: center;" class="sub_total">' + res + '<input type="hidden" value="'+res+'" name="sub_res" class="sub_res"></td>' +
                    '<td style="text-align: center; width: 100%" id="'+particulars+'" class="delete-confirm btn btn-danger btn-xs my_table_data" >' + 'Delete' + '</td>' +
                    '</tr>');
            $('#t_discount').val(0);
        }
    });

    $("#t_discount").on("change paste keyup", function () {
        var discount = $('#t_discount').val();
        if (discount == '') {
            discount = 0;
        }
        var due = Number($('#previous_due').val());
        var in_total = (parseFloat(total) - parseFloat(discount));
        $('#in_total').val(in_total);
        $('#due').val(due + in_total - $('#total_pay').val());

    });

    $("#total_pay").on("change paste keyup", function () {
        var in_total = $('#in_total').val();
        var pay = $('#total_pay').val();
        if (pay == '') {
            pay = 0;
        }
        var due = Number($('#previous_due').val()) + Number(in_total) - Number(pay);
        $('#due').val(due);

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


    $('#myTable').on('click', '.my_table_data', function (e) {
        $(this).parent("tr").remove();
        var id=$(this).parent("tr").attr("id");
        var fee_head=$(this).attr("id");
        removeParticulars(check_particulars,fee_head);
        var total_subtotal=0;
        // var head="";
        var head = $(".head");
        var amount = $(".amount");
        var quantity = $(".quantity");
        var fee_discount = $(".fee_discount");
        var sub_total = $(".sub_total");
        var data="";
        for(var i = 0; i < head.length; i++){
           data=data+$(head[i]).text()+"#"+$(amount[i]).text()+"#"+$(quantity[i]).text()+"#"+$(fee_discount[i]).text()+"#"+$(sub_total[i]).text()+"#";
        }
        $("#myTable .sub_res").each(function() {
            total_subtotal+=parseFloat($(this).val());
        });
        $('#t_data').val(data);
        $('#t_discount').val(0);
        $("#in_total").val(total_subtotal);
        var previous_due=parseFloat($("#previous_due").val());
        var in_total=parseFloat($("#in_total").val());
        var total_pay=parseFloat($("#total_pay").val());
        var due=parseFloat($("#due").val());
        var total_due=(previous_due+in_total)-total_pay;
        if(total_due>0)
        {
            $("#due").val(total_due);
        }else{
            $("#due").val(0);
            $("#total_pay").val(0)
        }
        
    });
    function removeParticulars(array, item){
        for(var i in array){
            if(array[i]==item){
                array.splice(i,1);
                break;
            }
        }
    }

    $("#save_fees_info").on("click", function () {
        if(check_particulars=="")
        {
            alert("Please Add Particulars First");
            return;
        }
        //alert($('#t_data').val()+" "+$('#student_id').val());
        var input_data = $('#student_id').val();
        var input_month = $('#date').val();
        var discount = $('#t_discount').val();
        var fee_discount = $('#discount').val();
        var total = $('#in_total').val();
        var payment = $('#total_pay').val();
        var due = $('#due').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Insert/fee_collection",
            data: $("#frm3 input").serialize(),
            beforeSend:function(){
                $("#overlay").show();
            },
            success: function (data) {
                $('#show_info').html(data);
                $("#overlay").hide();
            },
            complete: function() {
                $("#overlay").hide();
            }
        });
    });
    //$(".pay").on("click", function () {
    //    $.ajax({
    //        type: "POST",
    //        url: "<?php //echo base_url();         ?>//Insert/fee_collection",
    //        data: $("#frm2 input").serialize(),
    //        success: function (data) {
    //            $('#show_info').html(data);
    //        }
    //    });
    //});

</script>

<style>
    .bootstrap-select .dropdown-menu li.disabled a {
        background: yellow;
        margin: 5px;
        border: black 1px solid;
        color: black;
    }
</style>

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
$yearArray = range(date("Y") - 1, date("Y") + 1);
$monthArray = array("January", "February", "March", "April",
    "May", "June", "July", "August", "September",
    "October", "November", "December",
);
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print1">
                    <?php echo form_open_multipart('Insert/create_salary_sheet'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Salary Payment</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="month">Select Month</label>
                                <select name="month" id="month" class="form-control selectpicker"
                                        data-container="body"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php
                                    foreach ($yearArray as $single_year) {
                                        foreach ($monthArray as $single_month) {
                                            ?>
                                            <option value="<?php echo $single_month . " " . $single_year; ?>"
                                                <?php
                                                if ($single_month . " " . $single_year == date('F Y')) {
                                                    echo 'selected';
                                                }
                                                ?>>
                                                <?php echo $single_month . " " . $single_year; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="teacher_staff">Select Teacher/Staff</label>
                                <select name="teacher_staff" id="teacher_staff" class="form-control selectpicker"
                                        data-container="body"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_teacher as $single_teacher) { ?>
                                        <option value="<?php echo $single_teacher->teacher_unique_id . "#" . $single_teacher->name; ?>">
                                            <?php echo $single_teacher->teacher_unique_id . ", " . $single_teacher->name; ?>
                                        </option>
                                    <?php } ?>
                                    <?php foreach ($all_staff as $single_staff) { ?>
                                        <option value="<?php echo $single_staff->staff_unique_id . "#" . $single_staff->name; ?>">
                                            <?php echo $single_staff->staff_unique_id . ", " . $single_staff->name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" placeholder=""
                                       name="designation" readonly>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="account_no">Account No.</label>
                                <input type="text" class="form-control" id="account_no" placeholder="" name="account_no"
                                       readonly>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="salary_scale">Salary Amount</label>
                                <input type="text" class="form-control" id="salary_scale" placeholder=""
                                       name="salary_scale">
                            </div>
                            <div class="box-footer col-sm-2 clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Pay <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <br>
                <div class="" style="color: black; height: 700px;">
                    <div class="box-body" id="no_print2">
                        <p style="font-size: 20px;">Search for Salary Sheet</p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="select_month">Select Month</label>
                                <select name="select_month" id="select_month" class="form-control selectpicker"
                                        data-container="body"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php
                                    foreach ($yearArray as $single_year) {
                                        foreach ($monthArray as $single_month) {
                                            ?>
                                            <option value="<?php echo $single_month . " " . $single_year; ?>"
                                                <?php
                                                if ($single_month . " " . $single_year == date('F Y')) {
                                                    echo 'selected';
                                                }
                                                ?>>
                                                <?php echo $single_month . " " . $single_year; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="box-footer col-sm-2 clearfix" id="no_print3">
                                <button style="margin-top: 27px" id="search_month" type="button"
                                        class="pull-left btn btn-success">Search <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="show_info"></div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#teacher_staff").on("change paste keyup", function () {
        var input_data = $('#teacher_staff').val();
        var post_data = {
            'teacher_staff': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_des_acc_salary",
            data: post_data,
            dataType: 'JSON',
            success: function (data) {
                $('#designation').val(data[0]);
                $('#account_no').val(data[1]);
                $('#salary_scale').val(data[2]);
            }
        });
    });
    $("#search_month").on("click", function () {
        var month = $('#select_month').val();
        var post_data = {
            'month': month,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_salary_sheet",
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

        #no_print2 {
            display: none;
        }

        #no_print3 {
            display: none;
        }
    }
</style>


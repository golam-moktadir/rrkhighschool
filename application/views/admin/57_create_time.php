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
                    <?php echo form_open_multipart('Insert/create_class_time'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Class Time</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
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
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="class_time">Time</label>
                                <input type="time" value="08:00" class="form-control" id="class_time" name="class_time">
                            </div>
                            <div class="box-footer col-sm-4 clearfix">
                                <button id="add_btn" style="margin-top: 27px" type="button"
                                        class="pull-left btn btn-success">Add <i
                                            class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="box-body table-responsive" style="width: 98%; color: black; padding-bottom: 10px;">
                    <table id="salesList" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;">Class</th>
                            <th style="text-align: center;">Class Time</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="show_all_time">

                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-right btn btn-success btn-sm"
                                id="save_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Class Time</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            $class_name = '';
                            foreach ($all_value as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <?php if ($single_value->class_name == $class_name) { ?>
                                        <td style="text-align: center;"></td>
                                    <?php } else { ?>
                                        <td style="text-align: center;"><?php echo "Class - " . nfa($single_value->class_name); ?></td>
                                    <?php } ?>
                                    <td style="text-align: center;"><?php echo date('h:i A', strtotime($single_value->class_time)); ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info fa fa-edit" title="Edit"
                                           href="<?php echo base_url(); ?>Show_edit_form/create_class_time/<?php echo $single_value->record_id; ?>/main">
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger fa fa-trash-o" title="Delete"
                                           href="<?php echo base_url(); ?>Delete/create_class_time/<?php echo $single_value->record_id; ?>">
                                        </a>
                                    </td>
                                </tr>
                                <?php $class_name = $single_value->class_name;
                            } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div>

            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    var all_times = new Array();
    var time_count = 0;

    $("#add_btn").click(function () {
        var class_name = $('#class_name').val();
        var class_time = $('#class_time').val();
        if (class_name == '') {
            alert('Select Class')
        } else {
            all_times[time_count] = new Array(class_name, class_time);
            var full_table = "";
            for (var i = 0; i < all_times.length; i++) {
                full_table += "<tr>";
                for (var j = 0; j < all_times[i].length; j++) {
                    if (j === 1) {
                        full_table += "<td style='text-align: center;'>" + all_times[i][1] + "</td>";
                    } else {
                        full_table += "<td style='text-align: center;'>" + all_times[i][j] + "</td>";
                    }
                }
                full_table += "<td style='text-align: center;'><button class='btn btn-danger fa fa-trash-o' onclick='delete_data(" + i + ")'></button></td></tr>";
            }
            $('#show_all_time').html(full_table);
            time_count++;
        }
    });

    function delete_data(arr_no) {
        all_times.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_times.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_times[i].length; j++) {
                if (j === 1) {
                    full_table += "<td style='text-align: center;'>" + all_times[i][1] + "</td>";
                } else {
                    full_table += "<td style='text-align: center;'>" + all_times[i][j] + "</td>";
                }
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger fa fa-trash-o'\n\
             onclick='delete_data(" + i + ")'></button></td></tr>";
        }

        $('#show_all_time').html(full_table);

        time_count--;
    }

    $("#save_btn").click(function () {

        var post_data = {
            'all_times': all_times,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        if (all_times.length == 0) {
            alert('Add Time');
        } else {
            console.log(post_data);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/create_class_time",
                data: post_data,
                success: function (data) {
                    alert("Entry Successfully");
                    location.reload();
                }
            });
        }
    });
</script>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;" id="no_print1">
                    <div class="box-body" align="center">
                        <p style="font-size: 20px;">Search Teacher by ID</p>
                        <div class="form-group">
                            <input type="text"  style="width: 300px; border: 2px solid black;" class="form-control" 
                                   id="search_teacher" placeholder="" name="search_teacher">
                        </div>
                        <div id="show_info" style="overflow: scroll;"></div>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                                               onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                        <div class="box-header"  style="color: black; text-align: center;">
                            <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg" 
                                     alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" colspan="15">All Teacher List</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Teacher ID</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Designation</th>
                                    <th style="text-align: center;">Gender</th>
                                    <th style="text-align: center;">Blood Group</th>
                                    <th style="text-align: center;">Religion</th>
                                    <th style="text-align: center;">Joining Year</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($all_value as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->teacher_unique_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->blood_group; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->religion; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                                        <td style="text-align: center;">
                                            <?php if (file_exists('./assets/img/teacher/' . $single_value->image)) { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/teacher/<?php echo $single_value->image; ?>" width="50" height="50">
                                            <?php } ?>
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
    window.onload = function () {
        $("#search_teacher").on("change paste keyup", function () {
            var input_data = $('#search_teacher').val();
            var post_data = {
                'teacher_id': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_teacher_info",
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
</style>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <div class="box-body" align="center">
                        <p style="font-size: 20px;">Search Guardian by ID</p>
                        <div class="form-group">
                            <input type="text"  style="width: 300px; border: 2px solid black;" class="form-control" 
                                   id="search_guardian" placeholder="" name="search_guardian">
                        </div>
                    </div>
                </div>
                <div class="box box-info" style="color: black;">
                    <div class="box-body table-responsive" id="show_info" 
                         style="width: 98%; overflow: scroll; color: black;"></div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Guardian ID</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Image</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Student ID</th>
                                    <th style="text-align: center;">Relation with Student</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Gender</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">National ID</th>
                                    <th style="text-align: center;">Year</th>
                                    <th style="text-align: center;">Blood Group</th>
                                    <th style="text-align: center;">Status</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->guardian_unique_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/guardian/<?php echo $single_value->image; ?>" width="50" height="50">
                                        </td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->student_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->relation_student; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->nid; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->blood_group; ?></td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($single_value->status == 1) {
                                                echo "Active";
                                            } else {
                                                echo "Inactive";
                                            }
                                            ?>
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
        $("#search_guardian").on("change paste keyup", function () {
            var input_data = $('#search_guardian').val();
            var post_data = {
                'guardian_id': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_guardian_info",
                data: post_data,
                success: function (data) {
                    $('#show_info').html(data);
                }
            });
        });
    };
</script>
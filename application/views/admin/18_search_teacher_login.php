<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Teacher Profile</h3>                                                        
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <tbody>
                                <?php
                                foreach ($one_value as $single_value) {
                                    ?>
                                    <tr>
                                        <th style="text-align: center;">Teacher ID</th>
                                        <td style="text-align: center;"><?php echo $single_value->teacher_unique_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Image</th>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/teacher/<?php echo $single_value->image; ?>" width="50" height="50">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Name</th>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Designation</th>
                                        <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Joining Year</th>
                                        <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Mobile</th>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Email</th>
                                        <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Date of Birth</th>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date_of_birth)); ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Gender</th>
                                        <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Blood Group</th>
                                        <td style="text-align: center;"><?php echo $single_value->blood_group; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Nationality</th>
                                        <td style="text-align: center;"><?php echo $single_value->nationality; ?></td>
                                    </tr>

                                    <tr>
                                        <th style="text-align: center;">Religion</th>
                                        <td style="text-align: center;"><?php echo $single_value->religion; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Address</th>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
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
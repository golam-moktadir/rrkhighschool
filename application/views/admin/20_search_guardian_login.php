<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Guardian Profile</h3>                                                        
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <tbody>
                                <?php
                                foreach ($one_value as $single_value) {
                                    ?>
                                    <tr>
                                        <th style="text-align: center; width: 30%;">Guardian ID</th>
                                        <td style="text-align: center;"><?php echo $single_value->guardian_unique_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Name</th>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Image</th>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/guardian/<?php echo $single_value->image; ?>" width="50" height="50">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Student ID</th>
                                        <td style="text-align: center;"><?php echo $single_value->student_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Relation with Student</th>
                                        <td style="text-align: center;"><?php echo $single_value->relation_student; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Guardian Mobile No.</th>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Email</th>
                                        <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Gender</th>
                                        <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">National ID</th>
                                        <td style="text-align: center;"><?php echo $single_value->nid; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Address</th>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Blood Group</th>
                                        <td style="text-align: center;"><?php echo $single_value->blood_group; ?></td>
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
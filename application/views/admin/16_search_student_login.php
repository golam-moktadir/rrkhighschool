<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Student Profile</h3>                                                        
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <tbody>
                                <?php
                                foreach ($one_value as $single_value) {
                                    ?>
                                    <tr>
                                        <th style="text-align: center; width: 30%;">Student ID</th>
                                        <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Name</th>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Roll</th>
                                        <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Image</th>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $single_value->image; ?>" width="50" height="50">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Class</th>
                                        <td style="text-align: center;"><?php echo "Class - " . $single_value->class_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Group</th>
                                        <td style="text-align: center;"><?php echo $single_value->group_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Section</th>
                                        <td style="text-align: center;"><?php echo $single_value->section_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Year</th>
                                        <td style="text-align: center;"><?php echo $single_value->session_name; ?></td>
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
                                    <tr>
                                        <th style="text-align: center;">Father's Name</th>
                                        <td style="text-align: center;"><?php echo $single_value->father_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Father's Occupation</th>
                                        <td style="text-align: center;"><?php echo $single_value->father_occupation; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Mother's Name</th>
                                        <td style="text-align: center;"><?php echo $single_value->mother_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Mother's Occupation</th>
                                        <td style="text-align: center;"><?php echo $single_value->mother_occupation; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Parents Mobile</th>
                                        <td style="text-align: center;"><?php echo $single_value->parents_mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Parents Email</th>
                                        <td style="text-align: center;"><?php echo $single_value->parents_email; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Fourth Subject</th>
                                        <td style="text-align: center;"><?php echo $single_value->fourth_subject; ?></td>
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
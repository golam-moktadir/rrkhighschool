<style>
    .form-group {
        margin: 0px;
    }

    .col-sm-3 {
        padding: 0px 10px 0px 10px;
    }
</style>
<aside>
    <section class="content" style="padding: 0px 10px 5px 10px;">
        <div class="row">
            <section class="col-xs-12 connectedSortable">

                <div class="" style="margin-top: 10px;">
                    <p style="padding-left: 10px;">
                        <button id="print_button" title="Click to Print" type="button"
                                onClick="window.print()" class="btn btn-flat btn-warning">Print
                        </button>
                    </p>
                    <div class="box-header " style="color: black; text-align: center;" >
                        <h3><img src="<?php echo base_url(); ?>assets/img/logo.png"
                                 alt="Logo"  class="m-t-22 print_logo"></h3>
                    </div>
                    <h3 class="box-title" style="color: black; text-align: center;">All Students List</h3>

                    <div class="box-body table-responsive" style="width: 98%; color: black;">
                        <table id="pagination_search" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Student ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Roll</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Parents Mobile</th>
                                <th style="text-align: center;">Guardian Name</th>
                                <th style="text-align: center;">Guardian Mobile</th>
                                <th style="text-align: center;">Realtion With Guardian</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Fourth Subject</th>
                                <th style="text-align: center;">Action</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            if(!empty($all_students)){
                            foreach ($all_students as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->student_unique_id; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <td style="text-align: center;"><?php echo nfa($single_value->class_name); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->roll; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->parents_mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->guardian_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->guardian_mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->guardian_realtion; ?></td>
                                    <td style="text-align: center;">
                                        <?php if (file_exists('./assets/img/student/' . $single_value->image)) { ?>
                                            <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $single_value->image; ?>"
                                                 width="50" height="50">
                                        <?php } ?>
                                    </td>
                                    <td style="text-align: center;"><?php
                                        if ($single_value->fourth_subject == '') {
                                            echo 'N/A';
                                        } else {
                                            echo $single_value->fourth_subject;
                                        } ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Show_edit_form/insert_student_info/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info fa fa-edit" title="Edit">
                                        </a>
                                        <?php if ($single_value->status == 0) { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/active/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-success fa fa-eye" title="Activate Student">
                                            </a>
                                        <?php } else { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/inactive/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger fa fa-eye" title="Inactivate Student">
                                            </a>
                                        <?php } ?>
                                    </td>
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
                            <?php } } ?>
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
        $('#pagination_search').dataTable({
            "ordering": false,
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
            fixedHeader: {
                header: true,
                footer: true,
                headerOffset: 50
            }
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

        #no_print2 {
            display: none;
        }

        #no_print3 {
            display: none;
        }

        #no_print4 {
            display: none;
        }

        #no_print5 {
            display: none;
        }

        #no_print6 {
            display: none;
        }

        #no_print7 {
            display: none;
        }

        #no_print8 {
            display: none;
        }

        #pagination_search_info {
            display: none;
        }

        #pagination_search_paginate {
            display: none;
        }

        #pagination_search_length {
            display: none;
        }

        #pagination_search_filter {
            display: none;
        }
    }

    /*    @page {
            size: auto;    auto is the initial value
            margin: 0;   this affects the margin in the printer settings
        }*/
</style>
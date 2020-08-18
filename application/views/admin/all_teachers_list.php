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
                    <h3 class="box-title" style="color: black; text-align: center;">All Teachers List</h3>
                    <div class="box-body table-responsive" style="width: 98%; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Teacher ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Designation</th>
                                <th style="text-align: center;">Mobile</th>
                                <th style="text-align: center;">Alternative Mobile</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;" id="no_print1">Action</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_teachers as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->teacher_unique_id; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->alternative_mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                    <td style="text-align: center;">
                                        <?php if(file_exists('./assets/img/teacher/'.$single_value->image)){?>
                                            <img src="<?php echo base_url(); ?>assets/img/teacher/<?php echo $single_value->image; ?>"
                                                 width="50" height="50">
                                        <?php }?>
                                    </td>
                                    <td style="text-align: center;" id="no_print2">
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Show_edit_form/insert_teacher_info/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info fa fa-edit" title="Edit">
                                        </a>
                                        <?php if ($single_value->status == 0) { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/teacher_active/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-success fa fa-eye" title="Activate Teacher">
                                            </a>
                                        <?php } else { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/teacher_inactive/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger fa fa-eye" title="Inactivate Teacher">
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
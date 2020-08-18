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
                                 alt="Logo" width="100px" height="100px" style="border-radius: 15px;" class="m-t-22"></h3>
                    </div>
                    <h3 class="box-title" style="color: black; text-align: center;">All Books List</h3>
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Book Name</th>
                                <th style="text-align: center;">Author</th>
                                <th style="text-align: center;">Available Quantity</th>
                                <th style="text-align: center;" id="no_print1">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_books as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo date("d F, Y", strtotime($single_value->date)); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->book_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->author_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->quantity; ?></td>
                                    <td style="text-align: center;" id="no_print2"><a style="margin: 5px;"
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/insert_book/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/insert_book/<?php echo $single_value->record_id; ?>">Delete
                                        </a>
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
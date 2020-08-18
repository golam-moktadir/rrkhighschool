<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="cr_div">
                    <p style="font-size: 20px;">Collection Invoice</p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12" id="datewise">
                                <label for="exam_name">Date</label>
                                <input type="date" class="form-control" name="date" id="date" value="<?php echo $date;?>" readonly>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12" id="studentwise">
                                <label for="class_name">Student ID</label>
                                <input name="student_id" id="student_id" class="form-control" value="<?php echo $student_id;?>" readonly>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="box box-info">
                    <div class="box-header" id="cr_title">
                        <h3 class="box-title" style="color: black;">Collection Invoice</h3>
                    </div>

                    <div id="show_info_studentwise" style="">
                        <?php if (!empty($all_value)) { ?>

                            <div class="row">
                                <div class="col-sm-4 col-xs-4"></div>
                                <div class="col-sm-4 col-xs-4" style="margin: 50px;">
                                    <img src="<?php echo base_url(); ?>assets/img/usc-icon.jpg" width="60%" height="60%" >
                                </div>
                                <div class="col-sm-4 col-xs-4"></div>
                            </div>

                            <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">SL</th>
                                        <th style="text-align: center;">Date</th>
                                        <th style="text-align: center;">Invoice No.</th>
                                        <th style="text-align: center;">Class</th>
                                        <th style="text-align: center;">Group</th>
                                        <th style="text-align: center;">Student ID</th>
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">Hostel Name</th>
                                        <th style="text-align: center;">Particular</th>
                                        <th style="text-align: center;">Amount</th>
                                        <th style="text-align: center;">Quantity</th>
                                        <th style="text-align: center;">Discount</th>
                                        <th style="text-align: center;">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 1; $i <= $c; $i++) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo ${"sl" . $i}; ?></td>
                                            <td style="text-align: center; "><p style="text-align: center;"><?php echo date('d F, Y', strtotime(${"date" . $i}));?></p></td>
                                            <td style="text-align: center; "><p style="text-align: center;"><?php echo ${"invoice" . $i};?></p></td>
                                            <td style="text-align: center;"><?php echo ${"class" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo ${"group" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo ${"student_id" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo ${"student_name" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo ${"hall" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo preg_replace('%Fee%','Fee<br>',${"description" . $i}); ?></td>
                                            <td style="text-align: center;"><?php echo ${"amount" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo ${"quantity" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo ${"discount" . $i}; ?></td>
                                            <td style="text-align: center;"><?php echo ${"total" . $i}; ?></td>
                                        </tr>
                                        <?php ${"inserted_by"} = ${"inserted_by" . $i}; ?>
                                        <?php ${"inserted_by_name"} = ${"inserted_by_name" . $i};} ?>
                                    <tr>
                                        <td colspan="12" style="color: teal; text-align: right;">Net Total</td>
                                        <td style="text-align: center;"><?php echo $total; ?></td>
                                    </tr>
                                    </tbody>

                                    <tr>
                                        <td colspan="13" style="text-align: right;" id="collection_staff">
                                            <p>_______________</p>
                                            <p><?php foreach (${"inserted_by_name"} as $n) {
                                                    echo $n->name;
                                                } ?></p></td>
                                    </tr>

                                </table>
                            </div>
                            <button id="printOut" onclick="window.print();" style="float: right; margin-top: 10px;"
                                    class="btn btn-info">Print
                            </button>
                        <?php } ?>

                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<style>

    @media print {
        a[href]:after {
            content: none !important;
        }

        #printOut {
            display: none;
        }

        #cr_div {
            display: none;
        }

        #cr_title {
            display: none;
        }

        #get_collection {
            display: none;
        }
    }

    /*    @page {
            size: auto;    auto is the initial value
            margin: 0;   this affects the margin in the printer settings
        }*/
</style>
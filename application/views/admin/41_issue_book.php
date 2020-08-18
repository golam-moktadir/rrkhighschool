<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
} elseif ($msg == "returned") {
    $msg = "Returned Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Insert/issue_book'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Issue Book</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="issue_date">Issue Date</label>
                                    <input type="text" name="issue_date" id="issue_date"
                                           class="form-control new_datepicker"
                                           placeholder="Select Date" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="due_date">Due Date</label>
                                    <input type="text" name="due_date" id="due_date"
                                           class="form-control new_datepicker"
                                           placeholder="Select Date" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="book_id">Select Book</label>
                                    <select name="book_id" id="book_id" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_book as $single_book) { ?>
                                            <option value="<?php echo $single_book->record_id; ?>">
                                                <?php echo $single_book->book_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="student_id">Select Student</label>
                                    <select name="student_id" id="student_id" class="form-control selectpicker"
                                            data-container="body"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_student as $single_student) { ?>
                                            <option value="<?php echo $single_student->student_unique_id; ?>">
                                                <?php echo $single_student->name . ' [ID: ' . $single_student->student_unique_id . ']'; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">
                                        Submit <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
        </div>

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title" style="color: black;">Book Borrow Info.</h3>
            </div>

            <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="text-align: center;">SL</th>
                        <th style="text-align: center;">Book Name</th>
                        <th style="text-align: center;">Student ID</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Class</th>
                        <th style="text-align: center;">Issue Date</th>
                        <th style="text-align: center;">Due Date</th>
                        <th style="text-align: center;">Return Status</th>
                        <th style="text-align: center;">Action</th>
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
                            <td style="text-align: center;"><?php echo $single_value->book_name; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->student_id; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->student_name; ?></td>
                            <td style="text-align: center;"><?php echo nfa($single_value->class); ?></td>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->issue_date)); ?></td>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->due_date)); ?></td>
                            <td style="text-align: center;">
                                <?php if ($single_value->return_status == 1) { ?>
                                    <p style="color: green; font-size: 18px; font-weight: bold;">Yes</p>
                                <?php } else { ?>
                                    <a style="margin: 5px;"
                                       href="<?php echo base_url(); ?>Edit/return_status/<?php echo $single_value->record_id; ?>"
                                       class="btn btn-info">Return
                                    </a>
                                <?php } ?>
                            </td>
                            <td style="text-align: center;">
                                <a style="margin: 5px;"
                                   href="<?php echo base_url(); ?>Show_edit_form/issue_book/<?php echo $single_value->record_id; ?>/main"
                                   class="btn btn-warning">Renew
                                </a>
                                <a style="margin: 5px;"
                                   href="<?php echo base_url(); ?>delete/issue_book/<?php echo $single_value->record_id; ?>/main"
                                   class="btn btn-danger">Delete
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
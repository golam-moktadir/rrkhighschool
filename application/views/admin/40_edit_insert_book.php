<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $date = date('d-m-Y', strtotime($one_info->date));
    $book_name = $one_info->book_name;
    $author_name = $one_info->author_name;
    $quantity = $one_info->quantity;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/insert_book/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Book Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date">Date</label>
                                    <input type="text" name="date" id="date"
                                           class="form-control new_datepicker"
                                           autocomplete="off" placeholder="Select Date"
                                           value="<?php echo $date; ?>">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="book_name">Book Name</label>
                                    <input type="text" name="book_name" id="book_name"
                                           value="<?php echo $book_name; ?>" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="author_name">Author Name</label>
                                    <input type="text" name="author_name" id="author_name"
                                           value="<?php echo $author_name; ?>" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="quantity">Available Quantity</label>
                                    <input type="number" name="quantity" id="quantity"
                                           value="<?php echo $quantity; ?>" class="form-control">
                                </div>
                                <div class="box-footer col-sm-4 clearfix">
                                    <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Edit <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Book Info</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Book Name</th>
                                <th style="text-align: center;">Author</th>
                                <th style="text-align: center;">Available Quantity</th>
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
                                    <td style="text-align: center;"><?php echo date("d F, Y", strtotime($single_value->date)); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->book_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->author_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->quantity; ?></td>
                                    <td style="text-align: center;">
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
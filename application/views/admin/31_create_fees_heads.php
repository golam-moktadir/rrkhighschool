<?php
if($msg=="main"){
    $msg="";
}elseif($msg=="empty"){
    $msg="Please fill out all required fields";
}elseif($msg=="created"){
    $msg="Created Successfully";
}elseif($msg=="edit"){
    $msg="Edited Successfully";
}elseif($msg=="delete"){
    $msg="Deleted Successfully";
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class='' style="color: black;">
                    <?php echo form_open_multipart('Insert/create_fees_heads'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Fees Heads</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="fees_head_name">Fees Head Name</label>
                                    <input type="text" name="fees_head_name" id="fees_head_name" class="form-control">
                                </div>
                                <div class="box-footer col-sm-4 clearfix">
                                    <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Submit &nbsp <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Fees Head Info</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Fees Head Name</th>
                                <th style="text-align: center;">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count=0; foreach($all_value as $single_value){ $count++; ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $count;?></td>
                                <td style="text-align: center;"><?php echo $single_value->fee_head;?></td>
                                <td style="text-align: center;">
                                    <a style="margin: 5px;" class="btn btn-danger"
                                       href="<?php echo base_url(); ?>Delete/fee_head/<?php echo $single_value->record_id; ?>">Delete
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
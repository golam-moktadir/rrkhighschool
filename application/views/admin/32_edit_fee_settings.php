<?php
if($msg=="main"){
    $msg="";
}elseif($msg=="empty"){
    $msg="Please fill out all required fields";
}
foreach($one_value as $one_info){
    $record_id=$one_info->record_id;
    $fee_head=$one_info->fee_head;
    $class_name=$one_info->class_name;
    $amount=$one_info->amount;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/fee_settings/'.$record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Class-wise Fee Settings</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="fees_head_name">Fees Head</label>
                                    <select name="fees_head_name" id="fees_head_name" class="form-control">
                                        <option value="<?php echo $fee_head?>"><?php echo $fee_head?></option>
                                        <?php foreach($all_fee_head as $single_fee_head){ ?>
                                            <option value="<?php echo $single_fee_head->fee_head; ?>">
                                                <?php echo $single_fee_head->fee_head; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control">
                                        <option value="<?php echo $class_name?>"><?php echo "Class - ".$class_name?></option>
                                        <?php foreach($all_class as $single_class){ ?>
                                            <option value="<?php echo $single_class->class_name; ?>">
                                                <?php echo "Class - ".$single_class->class_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="fee_amount">Fees Amount</label>
                                    <input type="text" name="fee_amount" id="fee_amount" class="form-control" value="<?php echo $amount?>">
                                </div>
                                <div class="box-footer col-sm-3 clearfix">
                                    <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Edit &nbsp; <i
                                                class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Fee Settings Info</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Fees Head</th>
                                <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Amount</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count=0; foreach($all_value as $single_value){ $count++; ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count;?></td>
                                    <td style="text-align: center;"><?php echo $single_value->fee_head;?></td>
                                    <td style="text-align: center;"><?php echo $single_value->class_name;?></td>
                                    <td style="text-align: center;"><?php echo $single_value->amount;?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/fee_settings/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/fee_settings/<?php echo $single_value->record_id; ?>">Delete
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
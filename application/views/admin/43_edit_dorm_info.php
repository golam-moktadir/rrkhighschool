<?php
if($msg=="main"){
    $msg="";
}elseif($msg=="empty"){
    $msg="Please fill out all required fields";
}
foreach($one_value as $one_info){
    $record_id = $one_info->record_id;
    $dormitory_name = $one_info->dormitory_name;
    $address = $one_info->address;
    $supervisor = $one_info->supervisor;
    $mobile = $one_info->mobile_no;
    $rent = $one_info->rent;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/dormitory/'.$record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Hostel Info</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="dormitory_name">Hostel Name</label>
                                    <input type="text" name="dormitory_name" id="dormitory_name" class="form-control"
                                    value="<?php echo $dormitory_name;?>">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="dormitory_address">Hostel Address</label>
                                    <input type="text" name="dormitory_address" id="dormitory_address"
                                           class="form-control" value="<?php echo $address;?>">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="dormitory_super">Hostel Supervisor</label>
                                    <input type="text" name="dormitory_super" id="dormitory_super" class="form-control"
                                           value="<?php echo $supervisor;?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                           value="<?php echo $mobile;?>">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="rent">Monthly Rent</label>
                                    <input type="text" name="rent" id="rent" class="form-control"
                                           value="<?php echo $rent;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit &nbsp <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Hostel Info</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Hostel Name</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Supervisor</th>
                                <th style="text-align: center;">Mobile</th>
                                <th style="text-align: center;">Monthly Rent</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->dormitory_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->supervisor; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->mobile_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->rent; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/dorm_info/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/dorm/<?php echo $single_value->record_id; ?>">Delete
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
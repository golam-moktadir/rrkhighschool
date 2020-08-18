<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $transport_name = $one_info->transport_name;
    $model = $one_info->model;
    $route = $one_info->route;
    $driver_name = $one_info->driver_name;
    $driver_mobile = $one_info->driver_mobile;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/transport/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Transport Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="transport_name">Transport Name</label>
                                    <input type="text" name="transport_name" 
                                           value="<?php echo $transport_name; ?>" id="transport_name" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="model">Model</label>
                                    <input type="text" name="model" id="model" 
                                           value="<?php echo $model; ?>" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="route">Route</label>
                                    <input type="text" name="route" id="route" 
                                            value="<?php echo $route; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="driver_name">Driver Name</label>
                                    <input type="text" name="driver_name" 
                                            value="<?php echo $driver_name; ?>" id="driver_name" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="driver_mobile">Driver Mobile</label>
                                    <input type="text" name="driver_mobile" 
                                           value="<?php echo $driver_mobile; ?>"  id="driver_mobile" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
        </div>

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title" style="color: black;">Transport Info.</h3>
            </div>

            <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;">SL</th>
                            <th style="text-align: center;">Transport Name</th>
                            <th style="text-align: center;">Model</th>
                            <th style="text-align: center;">Route</th>
                            <th style="text-align: center;">Driver Name</th>
                            <th style="text-align: center;">Driver Mobile</th>
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
                                <td style="text-align: center;"><?php echo $single_value->transport_name; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->model; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->route; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->driver_name; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->driver_mobile; ?></td>
                                <td style="text-align: center;">
                                    <a style="margin: 5px;" class="btn btn-info"
                                       href="<?php echo base_url(); ?>Show_edit_form/transport/<?php echo $single_value->record_id; ?>/main">Edit
                                    </a>
                                    <a style="margin: 5px;" class="btn btn-danger"
                                       href="<?php echo base_url(); ?>Delete/transport/<?php echo $single_value->record_id; ?>">Delete
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
<?php
//$this->load->view('admin/header');
$this->load->view('admin/header');
?>

<script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">

 <script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>


<script>
    $(document).ready(function () {
        $('#fa').hide();
        $('#ca').hide();
        $('#lsa').hide();
        $('#dra').hide();
        $('#asset_type').change(function () {
            if($(this).val()==''){
                $('#fa').hide();
                $('#ca').hide();
                $('#lsa').hide();
                $('#dra').hide();
            }
            else if($(this).val()=='1'){
                $('#fa').show();
                $('#ca').hide();
                $('#lsa').hide();
                $('#dra').hide();
            }
            else if($(this).val()=='2'){
                $('#fa').hide();
                $('#ca').show();
                $('#lsa').hide();
                $('#dra').hide();
            }
            else if($(this).val()=='3'){
                $('#fa').hide();
                $('#ca').hide();
                $('#lsa').show();
                $('#dra').hide();
            }
            else if($(this).val()=='4'){
                $('#fa').hide();
                $('#ca').hide();
                $('#lsa').hide();
                $('#dra').show();
            }

        });
        $('#fa_price').change(function () {
            var res = $('#fa_price').val() * $('#fa_quantity').val();
            $('#fa_total_amount').val(res);

        });
        $('#fa_quantity').change(function () {
            var res = $('#fa_price').val() * $('#fa_quantity').val();
            $('#fa_total_amount').val(res);

        });
        $('ca_price').change(function () {
            var res = $('#ca_price').val() * $('#ca_quantity').val();
            $('#ca_total_amount').val(res);

        });
    $('#ca_quantity').change(function () {
        var res = $('#ca_price').val() * $('#ca_quantity').val();
        $('#ca_total_amount').val(res);

    });
    $('#lsa_price').change(function () {
        var res = $('#lsa_price').val() * $('#lsa_quantity').val();
        $('#lsa_total_amount').val(res);

    });
    $('#lsa_quantity').change(function () {
        var res = $('#lsa_price').val() * $('#lsa_quantity').val();
        $('#lsa_total_amount').val(res);

    });
    $('#dra_price').change(function () {
        var res = $('#dra_price').val() * $('#dra_quantity').val();
        $('#dra_total_amount').val(res);

    });
    $('#dra_quantity').change(function () {
        var res = $('#dra_price').val() * $('#dra_quantity').val();
        $('#dra_total_amount').val(res);

    });
    $('#lsa_type').change(function () {
        if($(this).val()=='Product'){
           $('#lsa_quantity').show();
        }
        else{
             $('#lsa_quantity').hide();
        }

    });
        
    
});
</script>
<!--main content start-->
<aside class="right-side">  
    <section class="content">
        <!-- page start-->
        <div class="row"> 
            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'userEntryForm', 'role' => 'form');
            echo form_open_multipart('admins/insert_asset_info', $attributes);
            ?>
            <aside class="profile-info col-lg-12">
                <section class="panel">
                    <div class="panel-body bio-graph-info">
                        <?php
                        if ($this->session->flashdata('user_insert_msg')) {
                            echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('user_insert_msg') . '</div>';
                        }
                        if ($this->session->flashdata('user_insert_msg_error')) {
                            echo '<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>ERROR! </strong>' . $this->session->flashdata('user_insert_msg_error') . '</div>';
                        }
                        ?>
                        <h1> Create Asset Information Information</h1>
                        <hr>

                        <div class="form-group">
                            <label  for="user_name" class="col-lg-3 control-label ">Asset Type</label>
                            <div class="col-lg-6">
                                <select name="asset_type" id="asset_type" class="form-control">
                                    <option value="">Select </option>
                                    <?php
                                    $designationList = base_info_lists(100); //5=Asset Type
                                    foreach ($designationList as $list) {
                                        echo "<option  value= '" . $list->value . "'> " . $list->name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div id="fa" style="display: hidden">
                            <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <label  class="col-lg-3 control-label" for="user_addr"> Date </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly name="fa_date" id="fa_date" value="" placeholder="Enter Date ">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Product Name</label>
                                <div class="col-lg-6">
                                    <select name="fa_product_name" id="fa_product_name" class="form-control">
                                        <option value="">Select </option>
                                        <?php
                                        //$designation =  $this->session->userdata('designation');
                                        $designationList = base_info_lists(20); //5=repair Type
                                        foreach ($designationList as $list) {
                                            echo "<option  value= '" . $list->name . "'> " . $list->name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Product Model</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fa_product_model" value="" id="fa_product_model" placeholder="Enter Model">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Product Brand </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fa_product_band" value="" id="fa_product_band" placeholder="Enter Brand">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Provider </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fa_provider" value="" id="fa_provider" placeholder="Enter Provider">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Price </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fa_price" value="" id="fa_price" placeholder="Enter Price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-3 control-label" for="user_contact">Quantity</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fa_quantity" value="" id="fa_quantity" placeholder="Enter Quantity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Total Amount </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fa_total_amount" value="" id="fa_total_amount" readonly placeholder="Enter total amount">
                                </div>
                            </div>
                        </div>
                        <div id="ca" style="display: hidden">
                            <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <label  class="col-lg-3 control-label" for="user_addr"> Date </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly name="ca_date" id="ca_date" value="" placeholder="Enter Date ">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Cash Type</label>
                                <div class="col-lg-6">
                                    <select name="ca_cash_type" id="ca_cash_type" class="form-control">
                                        <option value="">Select </option>
                                        <?php
                                        //$designation =  $this->session->userdata('designation');
                                        $designationList = base_info_lists(21); //5=repair Type
                                        foreach ($designationList as $list) {
                                            echo "<option  value= '" . $list->name . "'> " . $list->name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Amount </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="ca_amount" id="ca_amount" placeholder="Enter total amount">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Receiver Name</label>
                                <div class="col-lg-6">
                                    <select name="ca_receiver" id="ca_receiver" class="form-control">
                                        <option value="">Select </option>
                                        <?php
                                        //$designation =  $this->session->userdata('designation');
                                        $designationList = base_info_lists(22); //5=repair Type
                                        foreach ($designationList as $list) {
                                            echo "<option  value= '" . $list->name . "'> " . $list->name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div id="lsa" style="display: hidden">
                            <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <label  class="col-lg-3 control-label" for="user_addr"> Date </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly name="lsa_date" id="lsa_date" value="" placeholder="Enter Date ">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Type</label>
                                <div class="col-lg-6">
                                    <select name="lsa_type" id="lsa_type" class="form-control">
                                        <option value="">Select </option>
                                        <option value="Product">Product </option>
                                        <option value="Cash">Cash </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Lost By</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="lsa_lost_by" value="" id="lsa_lost_by" placeholder="Enter Lost By">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Stolen By</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="lsa_stolen_by" id="lsa_stolen_by" placeholder="Enter Stolen By">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Amount</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="lsa_amount" id="lsa_amount" placeholder="Enter Amount">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Quantity </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="lsa_quantity" value="" id="lsa_quantity" placeholder="Enter Provider">
                                </div>
                            </div>

                        </div>
                        <div id="dra" style="display: hidden">
                            <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <label  class="col-lg-3 control-label" for="user_addr"> Date </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly name="dra_date" id="dra_date" value="" placeholder="Enter Date ">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Product Name</label>
                                <div class="col-lg-6">
                                    <select name="dra_product_name" id="dra_product_name" class="form-control">
                                        <option value="">Select </option>
                                        <?php
                                        //$designation =  $this->session->userdata('designation');
                                        $designationList = base_info_lists(20); //5=repair Type
                                        foreach ($designationList as $list) {
                                            echo "<option  value= '" . $list->name . "'> " . $list->name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Product Model</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="dra_product_model" id="dra_product_model" placeholder="Enter Model">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Product Brand </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="dra_product_band" id="dra_product_band" placeholder="Enter Brand">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Provider </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="dra_provider" id="dra_provider" placeholder="Enter Provider">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Damage & Repair Type</label>
                                <div class="col-lg-6">
                                    <select name="dra_damage_type" id="dra_damage_type" class="form-control">
                                        <option value="">Select </option>
                                        <?php
                                        //$designation =  $this->session->userdata('designation');
                                        $designationList = base_info_lists(23); //5=repair Type
                                        foreach ($designationList as $list) {
                                            echo "<option  value= '" . $list->name . "'> " . $list->name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Price </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="dra_price" id="dra_price" placeholder="Enter Price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-3 control-label" for="user_contact">Quantity</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="dra_quantity" id="dra_quantity" placeholder="Enter Quantity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Total Amount </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="dra_total_amount" id="dra_total_amount" placeholder="Enter total amount">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-10">
                                <button type="submit" class="btn btn-info" style="margin-left: 10px;">Save</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>                  
                </section>
            </aside>
            <?php
            echo form_close();
            ?>
        </div>
        
    </section>
</aside>

<?php
$this->load->view('admin/footer');
?>
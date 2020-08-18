<?php
$this->load->view('admin/header');
?>

<style>
    label.error{
        color: red;
        font-weight: bold;
    }
       .differentTable, .differentTable td{
   border-color: black;
}
</style>
<script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">
<script>
    $(document).ready(function() {
     $('#parts_rate').change(function(){
          var res = $('#parts_rate').val()*$('#parts_quantity').val();
            $('#parts_total_amount').val(res);
            
        });
                $('#parts_quantity').change(function(){
          var res = $('#parts_rate').val()*$('#parts_quantity').val();
            $('#parts_total_amount').val(res);

        });
        $('.delete-confirm').click(function(e) {
                e.preventDefault();
                $('#delete-confirm').data('id', $(this).data('id')).modal('show');
              });

        $('.btn-delete').click(function(e) {
             e.preventDefault();
              //alert($('#delete-confirm').data('id'));
              window.location.href = "<?php echo base_url() ?>Admins/delete_base_info/"+$('#delete-confirm').data('id');
              });
        $("#userEntryForm").validate({
            rules: {
                parts_name: "required",
                parts_model: "required",
                parts_provider: "required"
            },
            messages: {
                parts_name: "Please enter parts name",
                parts_model: "Please enter parts model",
                parts_provider: "Please enter parts provider info"
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
            echo form_open_multipart('admins/insert_base_info', $attributes);
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
                        $designationList = base_info_lists($base_id);
                        ?>
                        <h1> Create 
                            <?php 
                               if($base_id==20){echo "Fixed Product Name";}
                               else if($base_id==21){echo "Cash Type";}
                               else if($base_id==22){echo "Receiver Name";}
                               else if($base_id==23){echo "Damage & Repair Type";}
                               else {
                                   echo "Url Modified !";
                               }

                            ?>
                            Information</h1>
                        <hr>                        
                        <div class="form-group">
                            <label  for="user_name" class="col-lg-3 control-label ">Name</label>
                            <div class="col-lg-6">
                                <input type="hidden" name="base_id" id="base_id" value="<?php echo $base_id;?>"/>
                                <input type="text" class="form-control" name="name" value="" id="name" placeholder="Enter name ">
                            </div>
                        </div> 
                        <?php if($base_id==16||$base_id==22){?>
                            <div class="form-group">
                                <label  for="user_name" class="col-lg-3 control-label ">Mobile</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="mobile" value="" id="mobile" placeholder="Enter Mobile No ">
                                </div>
                            </div> 
                        <?php }?>
                                                                       
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
        <div class="row">
              
            <div class="col-lg-12">
                <section class="panel-primary panel">
                    <header class="panel-heading">
                       Existing 
                       <?php 
                               if($base_id==20){echo "Fixed Product Name";}
                               else if($base_id==21){echo "Cash Type";}
                               else if($base_id==22){echo "Receiver Name";}
                               else if($base_id==23){echo "Damage & Repair Type";}
                               else {echo "";}
                               ?>
                       Information
                    </header>
                    <table class="table table-striped table-advance table-bordered">
                        <thead>
                            <tr>
                                <th><i class="icon-arrow-down"></i> SL</th>
                                <th><i class="icon-bookmark"></i>Name</th>
                                <?php if($base_id==22){?>
                                   <th><i class="icon-bookmark"></i>Mobile</th> 
                                <?php }?>

                                <th><i class="icon-edit"></i>Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            foreach ($baseList as $aName) {
                                ?>
                                <tr>
                                    <td class="hidden-phone"><?php echo $sn++; ?></td>
                                    <td class="hidden-phone"><?php echo $aName->name; ?></td>
                                    <?php if($base_id==22){?>
                                        <td class="hidden-phone"><?php echo $aName->value; ?></td>
                                     <?php }?>
                                    <td>
                                        <a href="#delete-confirm" data-id="<?php echo $aName->id; ?>" class="delete-confirm btn btn-danger btn-xs"><i class="icon-trash icon-white"></i> Delete</a></td>
                                </tr> 
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
                <div class="text-center">
                    <?php //echo $this->pagination->create_links(); ?>
                </div>
            </div>
            
        </div>
       
    </aside>
    
    <!-- page end-->
    <!-- Delete Modal-->
     <div class="modal fade" id="delete-confirm">
            <div class="modal-header">              
              <h3>Delete this thing?</h3>
            </div>
            <div class="modal-body">
              <p>Be certain</p>
              <input type="hidden" name="prductId" id="prductId"/>
            </div>
            <div class="modal-footer">
              <a href="" class="btn btn-danger btn-delete">Delete</a>
              <a href="#" data-dismiss="modal" class="btn btn-primary">Cancel</a>
            </div>
   </div>

    <!-- Edit Section-->
     <div class="modal fade" id="edit-confirm">
           <!-- <div class="modal-header">
              <h3>Update this thing?</h3>
            </div>  -->
            <div class="modal-header">
              
              <h3>Update Profile</h3>
            </div>
            <div class="modal-body">   
                <div class="form-horizontal">
              <input type="hidden" name="prductId" id="prductId">
            
             <div class="form-group">
                 <label  for="user_name_update" class="col-lg-2 control-label">Officer Name</label>
                 <div class="col-lg-6"><input type="text" class="form-control" name="user_name_update" value="" id="user_name_update" placeholder="Enter your name "></div>
              </div>
              <div class="form-group"><label  class="col-lg-2 control-label" for="user_password_update">Password</label>
                  <div class="col-lg-6"><input type="password" class="form-control" name="user_password_update" value="" id="user_password_update" placeholder="Enter your password "></div>
              </div>

             <div class="form-group"> <label  class="col-lg-2 control-label" for="user_contact_update">Contact</label>
                  <div class="col-lg-6"><input type="text" class="form-control" name="user_contact_update" value="" id="user_contact_update" placeholder="Enter your contact number "></div>
              </div>
              <div class="form-group"><label  class="col-lg-2 control-label" for="user_shipping_addr_update">Office Address</label>
                  <div class="col-lg-6"><input type="text" class="form-control" name="user_shipping_addr_update" id="user_shipping_addr_update" value="" placeholder="Enter your shipping address "></div>
              </div>

                <div class="form-group"><label  class="col-lg-2 control-label" for="user_billing_addr_update">House Address</label>
                   <div class="col-lg-6"> <input type="text" class="form-control" name="user_billing_addr_update" value="" id="user_billing_addr_update" placeholder="Enter your billing address "></div>
               </div>
            </div>
            </div>
            <div class="modal-footer">
              <a href="" class="btn btn-danger btn-edit">Update</a>
              <a href="#" data-dismiss="modal" class="btn btn-primary">Cancel</a>
            </div>
          </div>
    <!-- Edit Section End -->

</section>

<!--main content end-->


<?php
$this->load->view('admin/footer');
?>
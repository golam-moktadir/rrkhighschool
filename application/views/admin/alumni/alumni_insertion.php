<aside>
  <section class="content">
    <div class="row" style="margin-top: 55px;">
      <section class="col-xs-12 connectedSortable">
        <div class="" style="color: black;">            
          <div class="box-body container">
            <p style="font-size: 20px;">প্রাক্তন শিক্ষার্থীদের তালিকা</p>
            <h3 class="text-success text-center">
              <?php echo $this->session->flashdata('message') ?>
            </h3>
              <div class="row">     
                <div class="col-md-6 col-xs-12">                       
                  <button type="button" class="btn btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#exampleModal">Add New Alumni </button>
                </div>
                <div class="col-md-6 col-xs-12" style="float: right;margin: 0px -190px;">
                  <form method='post' action="<?= base_url() ?>Show_form/loadRecord" >
                    <input type='text' placeholder="Enter Name or Batch" name='search' value="<?php echo $search ?>">
                    <input type='submit' name='submit' class="btn-success" value='Submit'>
                  </form>
                </div>
              </div>          
              <br/>
          <!-- Modal -->
          <div class="modal fade" style="font-size: 12px"; id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #FFEFD5 !important;">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alumni Add - All the * are required field </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form action="<?php echo base_url('Insert/insert_alumni_intoDatabase')?>" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <legend>Basic Information</legend>
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-sm-4 col-xs-12">
                          <label for="name" required >Batch No.</label><span> *</span>
                            <input class="form-control" type="number" name="batch" placeholder="Passing year" id="batch">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                          <label for="name" >Alumni's Name</label><span> *</span>
                          <input type="text" class="form-control" id="name" required  name="name">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                          <label for="name">Father's Name</label>
                          <input type="text" class="form-control" name="father_name">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                          <label for="name">Mother's Name</label>
                          <input type="text" class="form-control" name="mother_name">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                          <label for="name">Spouse Name</label>
                          <input type="text" class="form-control" name="spouse_name" >
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                          <label for="name">Profession</label><span> *</span>
                          <input type="text" class="form-control" name="profession" required="">
                        </div>
                      </div>          
                  </fieldset>
                  <fieldset>
                   <legend>Present Address</legend>
                    <div class="col-sm-12 col-xs-12">
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name">Village / Word Name </label>
                         <input type="text" class="form-control" name="present_village">
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name" required >Post Office</label>
                          <input type="text" class="form-control" name="present_post_office">
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name">Upazila</label>
                         <input type="text" class="form-control" name="present_upagila">
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name">District</label>
                          <input type="text" class="form-control" name="present_district">
                      </div>
                      <div class="form-group col-sm-2 col-xs-12">
                        <select name="present_access" required>
                          <option value="1">Show</option>
                          <option value="0">Hide</option>
                        </select>
                      </div>
                    </div>        
                  </fieldset>
                  <fieldset>
                   <legend>Permanent Address</legend>
                    <div class="col-sm-12 col-xs-12">
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name">Village / Word Name </label><span> *</span>
                         <input type="text" class="form-control" name="permanent_village" required="">
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name">Post Office</label><span> *</span>
                          <input type="text" class="form-control" name="permanent_post_office" required="">
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name">Upagila</label><span> *</span>
                         <input type="text" class="form-control" name="permanent_upagila" required="">
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                          <label for="name">District</label><span> *</span>
                          <input type="text" class="form-control" name="permanent_district" required="">
                      </div>
                    </div>        
                  </fieldset>
                  <fieldset>
                    <legend>Contact</legend>
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="name" >Email Address</label>
                           <input type="email" class="form-control" id="name" name="email_id">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="name">Mobile Number</label><span> *</span>
                           <input type="text" class="form-control" id="name" required name="mobile_number">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                          <select name="mobile_access" required>
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                          </select>
                        </div>
                      </div>        
                  </fieldset>
                  <fieldset>
                    <legend>Alumni's Photo</legend>
                    <div class="col-sm-12 col-xs-12">
                      <div class="form-group col-sm-5 col-xs-12">
                          <label for="name">Image's</label>
                         <input type="file" id="image" name="image" accept="image/*">
                      </div>
                  </fieldset>
                  <div class="form-group col-sm-12 col-xs-12" style="padding: 0px 0px 0px 80%;">
                    <button type="submit" id="submit" class="btn btn-primary">Add Alumni</button>
                  </div>
                </form>
              </div>
              
              <div class="modal-footer">
                <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
   <table border='1' width='100%' style='border-collapse: collapse;'>
    <tr>
      <th style="text-align: center;">Batch</th>
      <th style="text-align: center;">Name</th>
      <th style="text-align: center;">Father's Name</th>
      <th style="text-align: center;">Mother's Name</th>
      <th style="text-align: center;">Present Address</th>
      <th style="text-align: center;">Permanent Address</th>
      <th style="text-align: center;">Mobile Number</th>
      <th style="text-align: center;">Image</th>
      <th style="text-align: center;">Action</th>
      
    </tr>
    <?php 
      $sno = $row+1;
      foreach($result as $data){
    ?>
    <tr>
      <td style='text-align:center;'><?php echo $data['batch'] ?></td>
      <td style='text-align:center;'><?php echo $data['name'] ?></td>
      <td style='text-align:center;'><?php echo $data['father_name'] ?></td>
      <td style='text-align:center;'><?php echo $data['mother_name'] ?></td>
      <td style='text-align:center;'>
        <?php 
          if($data['present_access'] == 1){
        ?>
        <h6>Village : <?php echo $data['present_village'] ?></h6>
        <h6>Post office : <?php echo $data['present_post_office'] ?></h6>
        <h6>Upazilla : <?php echo $data['present_upagila'] ?></h6>
        <h6>District : <?php echo $data['present_district'] ?></h6>
        <?php
        }
        else{
          echo "<h6>Nothing to show</h6>";
        }
        ?>
      </td>
      <td style='text-align:center;'>
        <h6>Village : <?php echo $data['permanent_village'] ?></h6>
        <h6>Post office : <?php echo $data['permanent_post_office'] ?></h6>
        <h6>Upazilla : <?php echo $data['permanent_upagila'] ?></h6>
        <h6>District : <?php echo $data['permanent_district'] ?></h6>
      </td>
      <td style='text-align:center;'>
        <?php 
          if($data['mobile_access'] == 1)
            echo $data['mobile_number'];
          else
            echo "<h6>Nothing to show</h6>"; 
        ?>
      </td>
      <td style='text-align:center;'>
        <img src="<?php echo base_url().'assets/img/alumni_images/'.$data['image'] ?>" width='150' height='150'>
      </td>
      <td style="text-align: center;">
        <?php 
          if($data['approval_status'] == 10){
        ?>
          <a class="btn btn-sm btn-warning" href=<?php echo base_url()."Edit/approval_status/$data[id]/alumni_list/Show_form/loadRecord" ?>>
            <i class="fa fa-arrow-circle-down"></i>  
         </a>    
        <?php 
          }
          else{ 
        ?>  
         <a class="btn btn-sm btn-info" href=<?php echo base_url()."Edit/approval_status/$data[id]/alumni_list/Show_form/loadRecord" ?>>
            <i class="fa fa-arrow-circle-up"></i>  
         </a> 
        <?php 
          } 
        ?>
        <a class="btn btn-sm btn-success" href="<?php echo base_url().'Show_edit_form/edit_alumni/'.$data['id'] ?>">
          <i class="fa fa-edit"></i>
        </a>
        <a class="btn btn-sm btn-danger" href="<?php echo base_url().'Show_form/delete_alumni/'.$data['id'].'/'.$data['image'] ?>">
          <i class="fa fa-trash-o"></i>
        </a>
      </td>
    </tr>
      <?php
      $sno++;
      }
      if(count($result) == 0){
      echo "<tr>";
      echo "<td colspan='9'>No record found.</td>";
      echo "</tr>";
    }
      ?>  
   </table>

   <!-- Paginate -->
   <div style='margin-top: 10px;'>
   <?= $pagination; ?>
   </div>
       <!-- /.box-body --> 
            </section>
        </div>
    </section>
</aside>
<script type="text/javascript">
  $(document).ready(function(){
    $("#submit").click(function(){
    var batch = $("#batch").val();
    if(batch.length != 4){
      alert('Please Provide 4 digits only');
      $("#batch").val('');
      return false;
    }
    });

    $('#image').change(function(){
      var image = document.getElementById('image');
      if(image.files[0].size > 1048576){
        alert('Please upload less than 1 Mb Image only');
        image.value = '';
      }
    });
  });
</script>
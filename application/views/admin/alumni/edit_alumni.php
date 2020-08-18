
<section class="content">
    <div class="row" style="margin-top: 55px;">
        <section class="col-xs-12 connectedSortable">
            <div class="" style="color: black;">
                <?php echo form_open_multipart(base_url().'Edit/edit_alumni/'.$alumni->id); ?>
                <div class="box-body">
                    <p style="font-size: 20px;">Edit Alumni</p>
                    <p style="font-size: 20px; color: #066;"><?php echo $this->session->flashdata("msg"); ?></p>
                    <div class="row">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="name">Batch</label>
                            <input type="number" name="batch" id="batch" class="form-control" value="<?php echo $alumni->batch ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="name" >Alumni's Name</label>
                          <input type="text" class="form-control" id="name" value="<?php echo $alumni->name ?>"  name="name">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="name">Father's Name</label>
                          <input type="text" class="form-control" name="father_name" value="<?php echo $alumni->father_name ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="name">Mother's Name</label>
                          <input type="text" class="form-control" name="mother_name" value="<?php echo $alumni->mother_name ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="name">Spouse Name</label>
                          <input type="text" class="form-control" name="spouse_name" value="<?php echo $alumni->spouse_name ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="name" >Profession</label>
                          <input type="text" class="form-control" id="profession" value="<?php echo $alumni->profession ?>"  name="profession">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="image" >Image Only</label>
                          <input type="file" name="image" accept="image/*" id="image">
                        </div>
                        <div class="form-group" col-sm-3 col-xs-12>
                            <img src="<?php echo base_url().'assets/img/alumni_images/'.$alumni->image ?>" width='150' height='150'>
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="text-center text-success">Present Address</h2>
                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="name">Village / Word Name </label>
                         <input type="text" class="form-control" name="present_village" value="<?php echo $alumni->present_village ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                         <label for="name" required >Post Office </label>
                          <input type="text" class="form-control" name="present_post_office" value="<?php echo $alumni->present_post_office ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="name">Upazila</label>
                         <input type="text" class="form-control" name="present_upagila" value="<?php echo $alumni->present_upagila ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="name">District </label>
                         <input type="text" class="form-control" name="present_district" value="<?php echo $alumni->present_district ?>">
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="text-center text-success">Permanent Address</h2>
                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="name">Village / Word Name </label>
                         <input type="text" class="form-control" name="permanent_village" value="<?php echo $alumni->present_village ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                         <label for="name" required >Post Office </label>
                          <input type="text" class="form-control" name="permanent_post_office" value="<?php echo $alumni->present_post_office ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="name">Upazila </label>
                         <input type="text" class="form-control" name="permanent_upagila" value="<?php echo $alumni->present_upagila ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="name">District </label>
                         <input type="text" class="form-control" name="permanent_district" value="<?php echo $alumni->present_district ?>">
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="text-center text-success">Contact Information</h2>
                         <div class="form-group col-sm-3 col-xs-12">
                             <label for="name">Email Address </label>
                         <input type="text" class="form-control" name="email_id" value="<?php echo $alumni->email_id ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="name">Mobile Number </label>
                         <input type="text" class="form-control" name="mobile_number" value="<?php echo $alumni->mobile_number ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="present_access">Present Address Status</label>
                            <select name="present_access" class="form-control">
                                <option <?php if($alumni->present_access == 1) echo 'selected' ?> value="1">Show</option>   
                                <option <?php if($alumni->present_access == 0) echo 'selected' ?> value="0">Hide</option>   </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                             <label for="mobile_access">Mobile Number Status</label>
                             <select name="mobile_access" class="form-control">
                                <option <?php if($alumni->mobile_access == 1) echo 'selected' ?> value="1">Show</option>    
                                <option <?php if($alumni->mobile_access == 0) echo 'selected' ?> value="0">Hide</option>    </select>
                        </div>
                    </div>
                        <div class="box-footer col-xs-4 clearfix">
                            <button style="margin-top: 27px" id="submit" class="pull-left btn btn-success">Update <i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

           
        </section>
    </div>
</section>
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
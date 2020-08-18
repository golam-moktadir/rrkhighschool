<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 5px 5px; text-align: center; margin-top: -25px;">
    <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">Alumni List</h4>                                   
          </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 100%; overflow:;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">Batch</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Father's Name</th>
                        <th style="text-align: center;">Mother's Name</th>
                        <th style="text-align: center;">Present Address</th>
                        <th style="text-align: center;">Permanent Address</th>
                        <th style="text-align: center;">Mobile Number</th>
                        <th style="text-align: center;">Image</th>
                    </tr>
                </thead>
                <tbody style="font-size: 14px;">
                    <?php
                    foreach ($alumni_list as $alumni) {
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $alumni->batch ?></td>
                            <td style="text-align: center;"><?php echo $alumni->name ?></td>
                            <td style="text-align: center;"><?php echo $alumni->father_name ?></td>
                            <td style="text-align: center;"><?php echo $alumni->mother_name ?></td>
                            <td style='text-align:center;'>
                            <?php 
                              if($alumni->present_access == 1){
                            ?>
                            <h6>Village : <?php echo $alumni->present_village ?></h6>
                            <h6>Post office : <?php echo $alumni->present_post_office ?></h6>
                            <h6>Upazilla : <?php echo $alumni->present_upagila ?></h6>
                            <h6>District : <?php echo $alumni->present_district ?></h6>
                            <?php
                            }
                            else{
                              echo "<h6>Nothing to show</h6>";
                            }
                            ?>
                          </td>
                          <td style='text-align:center;'>
                            <h6>Village : <?php echo $alumni->permanent_village ?></h6>
                            <h6>Post office : <?php echo $alumni->permanent_post_office ?></h6>
                            <h6>Upazilla : <?php echo $alumni->permanent_upagila ?></h6>
                            <h6>District : <?php echo $alumni->permanent_district ?></h6>
                          </td>
                          <td style="text-align: center;">
                             <?php 
                              if($alumni->mobile_access == 1)
                                echo $alumni->mobile_number;
                              else
                                echo "<h6>Nothing to show</h6>"; 
                            ?>
                            </td>
                            <td style="text-align: center;">
                                <img src="<?php echo base_url().'assets/img/alumni_images/'.$alumni->image; ?>" width="90">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div> 
</div>
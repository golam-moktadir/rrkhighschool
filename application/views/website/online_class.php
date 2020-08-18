<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
   <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Online Class</h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">SL</th>
                        <th style="text-align: center;">Class</th>
                        <th style="text-align: center;">Group</th>
                        <th style="text-align: center;">Subject</th>
                        <th style="text-align: center;">Section</th>
                        <th style="text-align: center;">Topic Name</th>
                        <th style="text-align: center;">View</th>
                     </tr>
                </thead>
                <tbody>
                    <?php 
                        $count=0;
                        foreach ($lectures as $lecture){ 
                        $count++;
                        ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count; ?></td>
                        <td style="text-align: center;"><?php echo $lecture->class_name ?></td>   
                        <td style="text-align: center;"><?php echo $lecture->group_name; ?></td>
                        <td style="text-align: center;"><?php echo $lecture->subject_name; ?></td>
                        <td style="text-align: center;"><?php echo $lecture->section_name; ?></td>
                        <td style="text-align: center;"><?php echo $lecture->topic_name; ?></td>
                        <?php
                            $value = explode('.', $lecture->link);
                            if(end($value) == 'pdf'){
                        ?>
                        <td style="text-align: center;">
                            <a href="<?php echo base_url().'assets/pdf/lecture/'.$lecture->link ?>" class="btn btn-info" target="_blank">PDF</a>
                        </td>
                    <?php 
                        }
                        else{ 
                    ?>
                        <td style="text-align: center;">
                            <a href="<?php echo $lecture->link ?>" class="btn btn-success" target="_blank">Video</a>
                        </td>
                    <?php 
                        } 
                    ?>
                     </tr>
                    <?php  }  ?>
                </tbody>

            </table>
        </div><!-- /.box-body -->
    </div> 
</div>
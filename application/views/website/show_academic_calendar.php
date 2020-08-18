<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">শিক্ষাবর্ষ পুঞ্জি</h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">File Type</th>
                        <th style="text-align: center;">File</th>
                        <th style="text-align: center;">Published Date</th>
                    </tr>
                </thead>
                <tbody style="font-size: 18px;">
                    <?php
                    $count = 0;
                    foreach ($all_value as $single_value) {
                        $count++;
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $count; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->title; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->file_type; ?></td>
                            <td style="text-align: center;">
                                <?php if ($single_value->file_type == "Image") { ?>
                                    <a href="<?php echo base_url(); ?>assets/img/academic_calendar/<?php echo $single_value->file_name; ?>" 
                                       target="_blank">View This File</a>
                                   <?php } elseif ($single_value->file_type == "PDF") { ?>
                                    <a href="<?php echo base_url(); ?>assets/pdf/academic_calendar/<?php echo $single_value->file_name; ?>" 
                                       target="_blank">View This File</a>
                                   <?php } ?>
                            </td>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->published_date)); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div><!-- /.box-body -->
    </div> 
</div>
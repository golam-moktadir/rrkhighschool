<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info">
        <div class="box-header">
            <h3><?php echo $user_title; ?></h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Particular</th>
                        <th style="text-align: center;">Details</th>
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
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                            <td style="text-align: center;"><?php echo $single_value->particular; ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo base_url(); ?>assets/pdf/notice/<?php echo $single_value->details; ?>" 
                                   target="_blank">View Notice</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div><!-- /.box-body -->
    </div> 
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title"> সিলেবাস</h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Class</th>
                        <th style="text-align: center;">Syllabus</th>
                        <th style="text-align: center;">Published Date</th>
                    </tr>
                </thead>
                <tbody style="font-size: 16px;">
                    <?php
                    $count = 0;
                    foreach ($all_value as $single_value) {
                        $count++;
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $count; ?></td>
                            <td style="text-align: center;"><?php echo "Class - " . $single_value->class_name; ?></td>
                            <td style="text-align: center;">
                                <a href="<?php echo base_url(); ?>assets/pdf/syllabus/<?php echo $single_value->pdf; ?>" 
                                   target="_blank">View Syllabus</a>
                            </td>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->published_date)); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div><!-- /.box-body -->
    </div> 
</div>
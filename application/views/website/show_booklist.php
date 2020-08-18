<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info">
        <div class="box-header">
            <h2>পাঠ্য বইয়ের তালিকা</h2>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Group</th>
                        <th style="text-align: center;">Book Name</th>
                        <th style="text-align: center;">Author Name</th>
                        <th style="text-align: center;">Edition</th>
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
                            <td style="text-align: center;"><?php echo $single_value->group_name; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->book_name; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->author_name; ?></td>
                            <td style="text-align: center;"><?php echo $single_value->edition; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div><!-- /.box-body -->
    </div> 
</div>
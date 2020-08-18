<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
   <div class="box box-info">
        <div class="box-header">
            <h3 class="text-center">পূর্ববর্তী কার্যনির্বাহী পর্ষদ</h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <?php if(isset($all_value)): ?>
                <div class="row">
                    <?php foreach($all_value as $key=>$value): ?>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <?php if($value->image!='' && file_exists("./assets/img/board_of_directors/".$value->image)): ?>
                                <img src="<?php echo base_url() ?>assets/img/board_of_directors/<?php echo $value->image ?>" alt="" style="width:100%">
                                <?php endif; ?>
                                <div class="caption">
                                    <h5 class="text-center"><?= $value->name?></h5>
                                    <p class="text-center"><?= $value->designation?></p>
                                    <p class="text-center"><?= $value->duration?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div><!-- /.box-body -->
    </div> 
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
   <div class="box box-info">
        <div class="box-header">
            <h3 class="text-center">বর্তমান কার্যনির্বাহী পর্ষদ</h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <?php if(isset($all_value)): ?>
                <div class="row">
                    <?php foreach($all_value as $key=>$value): ?>
                        <?php  if($key>0) break; ?>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo base_url() ?>assets/img/governing_body_profile/<?php echo $value->image ?>" alt="Lights" style="width:100%">
                                <div class="caption">
                                    <h5 class="text-center"><?= $value->name?></h5>
                                    <p class="text-center"><?= $value->designation?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <?php foreach($all_value as $key=>$value): ?>
                        <?php  if($key>3) break; ?>
                        <?php if($key>0): ?>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-2">
                                <div class="thumbnail">
                                    <img src="<?php echo base_url() ?>assets/img/governing_body_profile/<?php echo $value->image ?>" alt="Lights" style="width:100%">
                                    <div class="caption">
                                        <h5 class="text-center"><?= $value->name?></h5>
                                        <p class="text-center"><?= $value->designation?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                        <?php endif; ?>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <?php foreach($all_value as $key=>$value): ?>
                        <?php if($key>3): ?>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="<?php echo base_url() ?>assets/img/governing_body_profile/<?php echo $value->image ?>" alt="Lights" style="width:100%">
                                    <div class="caption">
                                        <h5 class="text-center"><?= $value->name?></h5>
                                        <p class="text-center"><?= $value->designation?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div><!-- /.box-body -->
    </div> 
</div>
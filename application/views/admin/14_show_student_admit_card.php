<div>
    <div class="box-header" id="no_print3">
        <h3 class="box-title" style="color: black;">Generate Admit Card</h3>
    </div>
    <p style="padding-left: 10px;">
        <button id="print_button" title="Click to Print" type="button"
                onClick="window.print()" class="btn btn-flat btn-warning">Print
        </button>
    </p>
    <!-- /.box-header -->
    <div class="" style="width: 98%; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center; width: 10%;" id="no_print4">SL</th>
                <th style="text-align: center; width: 10%;" id="no_print5">Student ID</th>
                <th style="text-align: center; width: 80%;" id="no_print6">Admit Card</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($admit_card)): ?>
                <?php foreach($admit_card as $key=>$value): ?>
                    <tr>
                        <td style="text-align: center;" id="no_print7"><?= ++$key; ?></td>
                        <td style="text-align: center;"
                            id="no_print8"><?= $value['student_unique_id']; ?></td>
                        <td style="background-color: white;">
                            <div style="border:2px black solid; !important; width: 20cm;">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="col-xs-12">
                                            <p><img src="<?php echo base_url(); ?>assets/img/logo.png"
                                                    style="width: 50px; height: 50px; margin-top:5px" alt="Logo">
                                                <br>Ramchandrapur, Muradnagar, Comilla.
                                                <br><b>Phone: </b>01714 415941
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="col-xs-6" style="margin-left: 20px;">
                                        </div>
                                        <div class="col-xs-6" style="margin-left: -20px;">
                                            <p style="float: right; padding-top: 15%;">
                                                <?php if (file_exists('./assets/img/student/'.$value['image'])): ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $value['image'] ?>"
                                                        alt="Logo" width="100%" height="100%">
                                                <?php else: ?>
                                                    <span>Student Image</span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="col-xs-12">
                                            <p style="font-size: 18px; color:white; font-weight: bold; text-align: center;
                                    border: 1px black solid; border-radius: 5px; background-color: #798DD6; width: 80%;">
                                                ADMIT CARD
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <p style="font-size: 16px; color: black; font-weight: bold;">
                                                Name of the
                                                Exam: <?php echo $exam_name . ' (' .$exam_date.')'; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-4" style="font-size: 12px;">
                                        <div class="col-xs-6">Class Name:</div>
                                        <div class="col-xs-6 underline" style="margin-left: 0px;"><?= nfa($value['class_name']) ?></div>
                                    </div>
                                    <div class="col-xs-4" style="font-size: 12px; margin-left: -35px;">
                                    <?php if($value['section_name']!=''): ?>
                                        <div class="col-xs-4">Section:</div>
                                        <div class="col-xs-8 underline"><?= $value['section_name'] ?></div>
                                    <?php endif;?>
                                    <?php if($value['group_name']!=''): ?>
                                        <div class="col-xs-4">Group:</div>
                                        <div class="col-xs-8 underline"><?= $value['group_name'] ?></div>
                                    <?php endif;?>
                                    </div>
                                    <div class="col-xs-4" style="font-size: 12px; margin-left: -25px;">
                                        <div class="col-xs-4">ID No.:</div>
                                        <div class="col-xs-8 underline"><?= $value['student_unique_id'] ?></div>
                                    </div>
                                    <div class="col-xs-8" style="font-size: 12px;">
                                        <div class="col-xs-4">Student Name:</div>
                                        <div class="col-xs-8 underline"
                                            style="margin-left: -64px;"><?= strtoupper($value["name"]) ?></div>
                                    </div>
                                    <div class="col-xs-4" style="font-size: 12px;">
                                        <div class="col-xs-4">Roll No:</div>
                                        <div class="col-xs-8 underline"><?= $value["roll"]?></div>
                                    </div>
                                    <div class="col-xs-6" style="font-size: 12px;">
                                        <div class="col-xs-5">Father's Name:</div>
                                        <div class="col-xs-7 underline"
                                            style="margin-left: -52px;"><?= strtoupper($value["father_name"]) ?></div>
                                    </div>
                                    <div class="col-xs-6" style="font-size: 12px;">
                                        <div class="col-xs-4">Mother's Name:</div>
                                        <div class="col-xs-8 underline"
                                            style="margin-left: -10px;"><?= strtoupper($value["mother_name"]) ?></div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-8" align="center">
                                        <div class="col-xs-12">
                                            <p style="font-size: 16px; color:white; font-weight: bold; text-align: center;
                                            border: 1px black solid; border-radius: 5px; background-color:  #843534; width: 40%; margin-left: -100px;">
                                                পরীক্ষা সংক্রান্ত নিয়মাবলী
                                            </p>
                                            <p style="font-size: 14px; text-align: justify;">
                                                <b style="color:red;">* </b>পরীক্ষা শুরু হওয়ার কমপক্ষে ১৫ মিনিট পূর্বে
                                                পরীক্ষার
                                                হলে প্রবেশ করতে হবে।
                                                <br><b style="color:red;">* </b>প্রবেশপত্র ছাড়া কোন কাগজপত্র পরীক্ষা
                                                কেন্দ্রে
                                                বহন করা যাবে না।
                                                <br><b style="color:red;">* </b>প্রত্যেক পরীক্ষার্থীকে প্রয়োজনীয় কলম,
                                                পেন্সিল ও
                                                জ্যামিতি বক্স সঙ্গে আনতে
                                                হবে।
                                                <br><b style="color:red;">* </b>পরীক্ষা শেষ হওয়ার পর পরিদর্শকের নির্দেশক্রমে
                                                পরীক্ষার্থী পরীক্ষা কেন্দ্র
                                                ত্যাগ করবে।
                                                <br><b style="color:red;">* </b>কোন পরীক্ষার্থী অসৎ উপায় অবলম্বন করলে তার
                                                পরীক্ষা বাতিল বলে গণ্য হবে।
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div style="padding-top: 80%; text-align: center; font-size: 12px; color: black; font-weight: bold; margin-left: -10px;">
                                            ________________<br>
                                            Class Teacher
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div style="padding-top: 60%; text-align: center; font-size: 12px; color: black; font-weight: bold; margin-left: -10px;">
                                            <img src="<?php echo base_url(); ?>assets/img/signature.png"
                                                alt="Logo" width="80%" height="100%" style="margin-bottom: -15px;">
                                            ________________<br>
                                            Head Master
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div style="clear:both!important;"/></div>-->
                            <div style="page-break-after:always!important;"></div> 
                            <!--<div style="clear:both!important;"/> </div>-->
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>

        </table>
    </div><!-- /.box-body -->
</div>
<style>
    .underline {
        border-bottom: 2px dashed #999;
        display: inline;
    }

</style>
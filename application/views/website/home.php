<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<p style="color: #9b0c0c; font-size: 16px; font-weight: bold; margin: 0px; padding: 0px;">
<marquee>
    <?php foreach($all_news as $one_news){echo $one_news->news;}?>
</marquee>
</p>
<!-- Slider Start -->
<div class="container"style="width: 100%; margin: 0px; padding: 0px;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin: 0px; padding: 0px;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo base_url(); ?>assets/img/Slider/1.jpg" alt="Slider" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/Slider/2.jpg" alt="Slider" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/Slider/3.jpg" alt="Slider" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/Slider/4.jpg" alt="Slider" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/Slider/5.jpg" alt="Slider" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/Slider/6.jpg" alt="Slider" width="100%" height="55px">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
    </div>
</div>
<section>
    <div class="container" style="text-align: center; padding: 0px 30px; width: 100%; margin: 0px;">
        <div class="row">
            <div class="section-title" style="margin-bottom: 35px; padding-top: 0px;">
                <h2 style="color: #27265b; font-size: 22px;">Our Activities</h2>
            </div>
        </div>
        <div class="row" style="margin-top: -30px; text-align: center;">
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px;
                 height: 500px; background-color: #9da00b; color: white;">
                <div class="service-item">
                    <i class="ion-map" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">স্কুল পরিচিতি</h4>
                    <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title == 1) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit1" style="text-align: justify; font-size: 15px;">
                                <?php echo textshorten($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/1" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px; 
                 height: 500px; background-color: #b21717; color: white;">
                <div class="service-item">
                    <i class="ion-android-clipboard" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">সংসদ সদস্যের বাণী</h4>
                    <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title ==6) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit2" style="text-align: justify; font-size: 15px;">
                                <?php echo textshorten($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/6" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px; 
                 height: 500px; background-color: #3D8099; color: white;">
                <div class="service-item">
                    <i class="ion-android-clipboard" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">উপজেলা চেয়ারম্যানের বাণী</h4>
                    <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title == 2) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit2" style="text-align: justify; font-size: 15px;">
                                <?php echo textshorten($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/2" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: -30px; text-align: center;">
                    
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px;  
                 height: 500px; background-color: #00549a; color: white;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px">সভাপতির বাণী</h4>
                <?php
                foreach ($all_value as $all_info) {
                    if ($all_info->title == 3) {
                        if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                            ?>
                            <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                    width=" 180" height="110"></p>
                            <?php } ?>
                        <p id="limit3" style="text-align: justify; font-size: 15px;">
                            <?php echo textshorten($all_info->details); ?>
                        </p>
                        <?php
                    }
                }
                ?>
                <p style="text-align: center;">
                    <a href="<?php echo base_url(); ?>Show_data/single_page_content/3" 
                       class="btn btn-default" style="margin-top: 10px;">View More</a>
                </p>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px; 
                 height: 500px; background-color: #b115bf; color: white;">
                <div class="service-item">
                    <i class="ion-map" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">প্রধান শিক্ষকের বক্তব্য</h4>
                    <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title == 4) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit4" style="text-align: justify; font-size: 15px;">
                                <?php echo textshorten($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/4" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px;  
                 height: 500px; background-color: #1e5951; color: white;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px">অভিভাবক গণের দায়িত্ব</h4>
                <?php
                foreach ($all_value as $all_info) {
                    if ($all_info->title == 10) {
                        if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                            ?>
                            <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                    width=" 180" height="110"></p>
                            <?php } ?>
                        <p id="limit9" style="text-align: justify; font-size: 15px;">
                            <?php echo textshorten($all_info->details); ?>
                        </p>
                        <?php
                    }
                }
                ?>
                <p style="text-align: center;">
                    <a href="<?php echo base_url(); ?>Show_data/single_page_content/10" 
                       class="btn btn-default" style="margin-top: 10px;">View More</a>
                </p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-xs-12 " style="padding: 5px 20px 5px 20px; border: #066 solid 2px; border-width: 0px 2px 0px 0px;
                 height: 380px; background-color: wheat; color: black;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px; color: maroon;">Important Link</h4>
                <p><a href="http://www.moedu.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        শিক্ষা মন্ত্রণালয়</a></p>
                <p><a href="http://www.mopme.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        প্রাথমিক ও গণশিক্ষা মন্ত্রণালয়</a></p>
                <p><a href="http://www.nctb.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        জাতীয় শিক্ষাক্রম ও পাঠ্যপুস্তক বোর্ড (এনসিটিবি)</a></p>
                <p><a href="http://www.dshe.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর</a></p>
                <p><a href="https://www.comillaboard.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষা বোর্ড, কুমিল্লা</a></p>
                        <p><a href="http://dhakaeducationboard.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        কারিগরি শিক্ষা বোর্ড</a></p>
            </div>
            <div class="col-md-6 col-xs-12 " style="padding: 5px 20px 5px 20px; border: #066 solid 2px; border-width: 0px 0px 0px 2px;
                 height: 380px; background-color: wheat; color: black;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px; color: maroon">Photo Gallery</h4>
                <?php
                $photo_count = 0;
                foreach ($all_photo as $photo) {
                    $photo_count++;
                    ?>
                    <p style="display: inline-block;">
                        <img src="<?php echo base_url(); ?>assets/img/photo_gallery/<?php echo $photo->image_id; ?>"
                             width="35%" height="40%">
                    </p>
                    <?php
                    if ($photo_count == 1) {
                        break;
                    }
                }
                ?>
                <p style="text-align: center;">
                    <a href="<?php echo base_url(); ?>Show_data/photo_gallery" 
                       class="btn btn-default" style="margin-top: 10px;">View More</a>
                </p>
            </div>
        </div>
    </div>
</section>





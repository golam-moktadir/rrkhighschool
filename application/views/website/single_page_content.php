<section id="intro">
    <div class="container" style="width: 100%; padding: 0px 30px;">
        <div class="row">
            <div class="col-sm-8">
                <div class="block">
                    <div class="section-title">
                        <h3><?php echo $title_name; ?></h3>
                        <p style="color: black; text-align: justify;">
                            <?php echo nl2br($details); ?>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="block">
                    <?php
                    if (!empty($image)) {
                        if (file_exists('./assets/img/single_page_content/' . $image)) {
                            ?>
                            <p>
                                <img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $image; ?>" 
                                     width="250" height="250">
                            </p>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>





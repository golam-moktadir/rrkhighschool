<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="row">
                    <div class="col-xs-3"></div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="small-box" style=" border-radius: 10px; background-color: #066; color: white;">
                            <div class="inner" style="text-align: center;">
                                <h4><?= DC ?></h4>
                            </div>
                        </div> 
                    </div>
                    <div class="col-xs-3"></div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div style="border-radius: 10px;" class="small-box bg-red">
                            <div class="inner" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_form/all_students">
                                    <p style="color: wheat; font-size: 20px;"><?php echo $all_student; ?></p>
                                    <p style="color: white; font-size: 20px;">Number of Students</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div style="border-radius: 10px;" class="small-box bg-red">
                            <div class="inner" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_form/all_teachers">
                                    <p style="color: wheat; font-size: 20px;"><?php echo $all_teacher; ?></p>
                                    <p style="color: white; font-size: 20px;">Number of Teachers</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div style="border-radius: 10px;" class="small-box bg-purple">
                            <div class="inner" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_form/all_staffs">
                                    <p style="color: wheat; font-size: 20px;"><?php echo $all_staff; ?></p>
                                    <p style="color: white; font-size: 20px;">Number of Staff</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div style="border-radius: 10px;" class="small-box bg-purple">
                            <div class="inner" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_form/all_books">
                                    <p style="color: wheat; font-size: 20px;"><?php echo $all_book; ?></p>
                                    <p style="color: white; font-size: 20px;">Number of Library Books</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--            <div class="col-xs-6">-->
                    <!--                <div style=border-radius: 10px; class="small-box bg-blue">-->
                    <!--                    <div class="inner" style="text-align: center; height: 100px;">-->
                    <!--                        <p style="color: wheat; font-size: 20px;"></p>-->
                    <!--                        <p style="color: white; font-size: 20px;"></p>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-xs-6">-->
                    <!--                <div style=border-radius: 10px; class="small-box bg-blue">-->
                    <!--                    <div class="inner" style="text-align: center; height: 100px;">-->
                    <!--                        <p style="color: wheat; font-size: 20px;"></p>-->
                    <!--                        <p style="color: white; font-size: 20px;"></p>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                </div>
            </section>
        </div>
    </section>
</aside>



<script type="text/javascript">
    function scrollDown() {
        window.scrollTo(0, document.body.scrollHeight);
    }

    function scrollUp() {
        window.scrollTo(0, 0);
    }
</script>
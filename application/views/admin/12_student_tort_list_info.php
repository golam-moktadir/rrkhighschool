<?php

class BanglaConverter {

    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

    public static function bn2en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }

    public static function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }

}
?>
<div class="box box-info">
    <div class="box-header" id="no_print3">
        <div class="box-header"  style="color: black; text-align: center;">
            <h3><img src="<?php echo base_url(); ?>assets/img/banner.jpg" 
                     alt="Logo" width="40%" height="80px" style="border-radius: 15px;"></h3>
        </div>
        <h3 class="box-title" style="color: black; text-align: center;"><u>Tort List</u></h3>
    </div>
    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button"
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>

    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <h5 style="color: black; text-align: left;"><?php echo BanglaConverter::en2bn($year_session . " - " . ($year_session + 1)); ?> শিক্ষাবর্ষে একাদশ শ্রেণিতে ভর্তিকৃত ছাত্র-ছাত্রীদের তালিকা (টর্ট লিস্ট)</h5>
        <h5 style="color: black; text-align: left;">Group: <?php echo $group; ?></h5>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;"  id="no_print4">ক্রমিক নং</th>
                    <th style="text-align: center;"  id="no_print5">শিক্ষার্থীর নাম, পিতা ও মাতার নাম</th>
                    <th style="text-align: center;"  id="no_print6">স্থায়ী ও বর্তমান ঠিকানা</th>
                    <th style="text-align: center;"  id="no_print7">শ্রেণী রোল নম্বর ও ভর্তির তারিখ</th>
                    <th style="text-align: center;"  id="no_print7">এসএসসি/সমমান রেজি. নম্বর, শিক্ষাবর্ষ ও জন্ম তারিখ</th>
                    <th style="text-align: center;"  id="no_print7">এসএসসি/সমমান পরীক্ষার রোল নম্বর, পাসের বছর, প্রাপ্ত জিপিএ ও বোর্ডের নাম ও জন্ম তারিখ</th>
                    <th style="text-align: center;"  id="no_print7">যে প্রতিষ্ঠান হতে এসএসসি/সমমান পাস করেছে তার নাম ও ঠিকানা</th>
                    <th style="text-align: center;"  id="no_print7">পঠিতব্য বিষয়সমূহ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($all_value as $single_value) {
                    $count++;
                    ?>
                    <tr>
                        <td style="text-align: center; " id="no_print8"><?php echo BanglaConverter::en2bn($count); ?></td>
                        <td style="text-align: center; " id="no_print9">
                            <p><?php echo $single_value->name; ?></p>
                            <p>পিতাঃ <?php echo $single_value->father_name; ?></p>
                            <p>মাতাঃ <?php echo $single_value->mother_name; ?></p>
                        </td>
                        <td style="text-align: center; "><?php echo $single_value->address; ?></td>
                        <td style="text-align: center; ">
                            <p><?php echo BanglaConverter::en2bn($single_value->roll); ?></p>
                            <p><?php echo BanglaConverter::en2bn(date("d-m-Y", strtotime($single_value->admission_date))); ?></p>
                        </td>
                        <td style="text-align: center; ">
                            <p><?php echo BanglaConverter::en2bn($single_value->ssc_reg); ?></p>
                            <p><?php echo BanglaConverter::en2bn($single_value->ssc_session); ?></p>
                            <p><?php echo BanglaConverter::en2bn(date("d-m-Y", strtotime($single_value->date_of_birth))); ?></p>
                        </td>
                        <td style="text-align: center; ">
                            <p><?php echo BanglaConverter::en2bn($single_value->ssc_roll); ?></p>
                            <p><?php echo BanglaConverter::en2bn($single_value->ssc_result) . ', ' . $single_value->ssc_board; ?></p>
                        </td>
                        <td style="text-align: center; "><?php echo $single_value->ssc_institution; ?></td>
                        <td style="text-align: center; ">
                            <?php
                            for ($i = 2; $i <= $c; $i++) {
                                echo ${'sub' . $count . $i} . ': ' . BanglaConverter::en2bn(${'sub_code' . $count . $i}) . '<br>';
                            }
                            echo $single_value->fourth_subject . ': ' . BanglaConverter::en2bn(${'sub_code_f' . $count}) . '(৪র্থ)';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


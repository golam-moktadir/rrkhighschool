<?php if(isset($mark_sheet)): ?>
        <div class="print_div">
            <div class="box-header" id="no_print2">
                <h3 class="box-title" style="color: black;">Generate Progress Report</h3>
            </div>
            <p style="padding-left: 10px;">
                <button id="print_button" title="Click to Print" type="button"
                        onClick="window.print()" class="btn btn-flat btn-warning">Print
                </button>
            </p>
            
            <?php foreach($mark_sheet as $key=>$value): ?>
                <div class="box-body " style="width: 95%; color: black;margin-left: auto; margin-right: auto;">
                    <table id="example2" style="border:5px black dashed; background-color: papayawhip !important;">
                        <tbody>
                        <tr>
                            <td style="width: 80%; padding: 10px 20px 10px 20px;">
                                <p class="text-center">
                                <img src="<?php echo base_url(); ?>assets/img/logo.png"
                                 alt="Logo" width="100px" height="100px"  class="">
                                </p>
                                <div class="row">
                                    <div class="col-xs-4 text-right"></div>
                                    <div class="col-xs-4 text-right">
                                        <p style="font-size: 16px; color: #843534; font-weight: bold; text-align: center;">
                                            PROGRESS REPORT
                                        </p>
                                        <p style="font-size: 16px; color: black; font-weight: bold; text-align: center;">
                                            Exam Type : <?= $value['exam_type'] ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                    <table id="point_table" class=" pull-right">
                                        <tr>
                                            <th class="text-center">Marks</th>
                                            <th class="text-center">Later Grade</th>
                                            <th class="text-center">Grade Point</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center">80-100</td>
                                            <td class="text-center">A+</td>
                                            <td class="text-center">5.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">70-79</td>
                                            <td class="text-center">A</td>
                                            <td class="text-center">4.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">60-69</td>
                                            <td class="text-center">A-</td>
                                            <td class="text-center">3.50</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">50-59</td>
                                            <td class="text-center">B</td>
                                            <td class="text-center">3.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">40-49</td>
                                            <td class="text-center">C</td>
                                            <td class="text-center">2.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">33-39</td>
                                            <td class="text-center">D</td>
                                            <td class="text-center">1.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">0-32</td>
                                            <td class="text-center">F</td>
                                            <td class="text-center">0.00</td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                                    
                                <div class="progress_heading">
                                    <p style="font-size: 16px; color: #066; margin-bottom:0px; font-weight: bold; padding-top: 10px;">
                                        Class: <?= nfa($value['class_name']); ?>
                                    </p>
                                    <div class="row">
                                            <div class="col-xs-6">
                                                <p style="font-size: 16px; color: #066; font-weight: bold; padding-top: 10px;">
                                                    Name of Student : <?= $value['student_name'] ?>
                                                </p>
                                                <p style="font-size: 14px; color: black; ">
                                                    Father's Name : <?= $value['father_name'] ?>
                                                </p>
                                                <p style="font-size: 14px; color: black; ">
                                                    ID : <?= $value['student_unique_id'] ?>
                                                </p>
                                                <p style="font-size: 16px;margin-top:-13px; color: #066; font-weight: bold; padding-top: 10px;">
                                                    Result : <?= $value['avg_grade'] ?>
                                                </p>
                                                
                                            </div>
                                            <div class="col-xs-6">
                                                <p style="font-size: 14px; color: black; ">
                                                    Mother's Name : <?= $value['mother_name'] ?>
                                                </p>
                                                <p style="font-size: 14px; color: black; ">
                                                    Roll No : <?= $value['roll'] ?>
                                                </p>
                                                <p style="font-size: 14px; color: black; ">
                                                    <?php if($value['section_name']!=''): ?>
                                                        Section : <?= $value['section_name'] ?>
                                                    <?php endif;?>
                                                    <?php if($value['group_name']!=''): ?>
                                                        Group : <?= $value['group_name'] ?>
                                                    <?php endif;?>
                                                </p>
        
                                            </div>
                                    </div>
                                </div>

                                <table id="example2" class="subject_table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Sl.</th>
                                        <th class="text-center subject">Name of Subjects</th>
                                        <th class="text-center">Mark</th>
                                        <th class="text-center">Grade</th>
                                        <th class="text-center">Points</th>
                                        <th class="text-center gpa_table">GPA</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($value[$value['student_unique_id']])): ?>
                                            <?php $first=1; $i=1; ?>
                                            <?php foreach($value[$value['student_unique_id']] as $s_key=>$subject): ?>
                                                <?php if($subject['subject_available']==1):?>
                                                    <?php if($subject['subject_id']!=$value['fourth_subject_id']): ?>
                                                    <tr>
                                                        <td class="text-center sortnr" ><?= $i++; ?></td>
                                                        <td class="text-left sortnr subject" ><?= $subject['subject_name'] ?></td>
                                                        <td class="text-center sortnr">
                                                            <?= $subject['total_mark'] ?>
                                                        </td>
                                                        <td class="text-center"><?= $subject['grade'] ?></td>
                                                        <td class="text-center"><?= $subject['grade_point'] ?></td>
                                                        <?php if($first==1): ?>
                                                            <td  rowspan=<?= $value['total_subject'] ?> style="vertical-align : middle; text-align: center; border: none;" class="gpa_table">
                                                                <?=  round($value['avg_point'],"2",PHP_ROUND_HALF_UP); ?>
                                                            </td>
                                                        <?php $first=2;?>
                                                        <?php endif; ?>
                                                    </tr>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach;?>
                                            <?php if($value['fourth_subject_id']!=0): ?>
                                                <tr>
                                                    <td colspan="6"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-center"><strong>Fourth Subject</strong></td>
                                                    <td colspan="2" class="text-center"><strong>GPA</strong></td>
                                                    <td colspan="2" class="text-center"><strong>Additional (GPA)</strong></td>
                                                </tr>
                                                <tr class="fourth_subject">
                                                    <td colspan="2" class="text-center sortnr subject" ><?= $value['fourth_subject_name'] ?></td>
                                                    <td colspan="2" class="text-center"><?= $value['fourth_subject_point'] ?></td>
                                                    <td colspan="2" class="text-center"><?= $value['addition_point'] ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif;?>
                                    </tbody>
                                </table>

                                <p style="font-size: 14px; color: black; font-weight: bold;  padding-top: 20px;">
                                    Date of Publication of Result: <?php echo $published_date; ?>
                                </p>
                                <br><br>
                                <div class="col-xs-4">
                                    <p style="text-align: left; font-size: 16px; color: black; font-weight: bold;">
                                        ------------------------------<br>
                                        Guardian
                                    </p>
                                </div>
                                <div class="col-xs-4">
                                    <p style="text-align: center; font-size: 16px; color: black; font-weight: bold;">
                                        ------------------------------<br>
                                        Class Teacher
                                    </p>
                                </div>
                                <div class="col-xs-4">
                                    <p style="text-align: right; font-size: 16px; color: black; font-weight: bold;">
                                        ------------------------------<br>
                                        Principal
                                    </p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <div class="clear"></div>
                <div class="page-break"></div>
                </div>
            <?php endforeach;?>
        </div>
<?php endif;?>
<style>
    @media print {
        a[href]:after {
            content: none !important;
        }

        #print_button {
            display: none;
        }

        #no_print1 {
            display: none;
        }

        #no_print2 {
            display: none;
        }
        @page {
            margin: 15mm 0mm 0mm 0mm;
            size: A4 portrait;
            /* auto is the current printer page size */
        }
    }
        .clearfix::after {
            clear: both;
        }

        .page-break {
            page-break-after: always;
            page-break-inside: avoid;
            page-break-before: avoid;
        }

</style>

<div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center">Roll</th>
                <th class="text-center">Student Name</th>
                <?php if($class_name==9 || $class_name==10): ?>
                    <th class="text-center">Group Name</th>
                <?php else:?>
                    <th class="text-center">Section Name</th>
                <?php endif;?>
                <th class="text-center">Total Marks</th>
                <th class="text-center">GPA</th>
                <th class="text-center">Letter Grade</th>
                <th class="text-center">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($all_result)): ?>
                <?php foreach($all_result as $key=>$value): ?>
                    <?php if($value['status']=="Fail"): ?>
                        <tr>
                            <td class="text-center"><?= $value['roll'] ?></td>
                            <td class="text-center"><?= $value['student_name'] ?></td>
                            <?php if($class_name==9 || $class_name==10): ?>
                                <td class="text-center"><?= $group_name ?></td>
                            <?php else:?>
                                <td class="text-center"><?= $section_name ?></td>
                            <?php endif;?>
                            <td class="text-center"><?= $value['total_mark'] ?></td>
                            <td class="text-center"><?= $value['gpa_point'] ?></td>
                            <td class="text-center"><?= $value['gpa_letter'] ?></td>
                            <td class="text-center"><?= $value['status'] ?></td>
                        </tr>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>
    </div>
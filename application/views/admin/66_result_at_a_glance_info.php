<div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
    <table id="example2" class="table table-bordered table-hover">
        <tbody>
            <?php if(isset($all_result)): ?>
                    <tr>
                        <?php foreach($all_result as $key=>$value): ?>
                            <?php if($key%6==0): ?>
                                <td style="text-align: center;" class="sortnr"><?= $value['student_unique_id'] ?>(<?= $value['gpa_point'] ?>)</td>
                            </tr>
                            <tr>
                            <?php else: ?>
                            <td style="text-align: center;" class="sortnr">
                                <?= $value['student_unique_id'] ?>(<?= $value['gpa_point'] ?>)
                            </td>
                            <?php endif; ?>
                        <?php endforeach;?>
            <?php endif;?>
        </tbody>
    </table>
</div>
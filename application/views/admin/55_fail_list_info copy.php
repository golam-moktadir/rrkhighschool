<?php if (!empty($all_value)) {
    $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
    $class_array2 = array('6', '7', '8');
    $class_array3 = array('9', '10');
    $sub_count = 0;
    foreach ($all_subject as $single_subject) {
        $sub_count++;
        ?>
    <?php } ?>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <script type="text/javascript">

            function sortTable() {
                var tbl = document.getElementById("example2").tBodies[0];
                var store = [];
                for (var i = 0, len = tbl.rows.length; i < len; i++) {
                    var row = tbl.rows[i];
                    var mark = parseFloat(row.cells[3].textContent || row.cells[3].innerText);
                    var sortnr = (parseFloat(row.cells[4].textContent || row.cells[4].innerText)) + parseFloat(mark);

                    if (!isNaN(sortnr))
                        store.push([sortnr, row]);
                }
                store.sort(function (x, y) {
                    return y[0] - x[0];
                });
                for (var i = 0, len = store.length; i < len; i++) {
                    tbl.appendChild(store[i][1]);

                }
                store = null;

                var tbl = document.getElementById("example2").tBodies[0];
                var store = [];
                for (var i = 0, len = tbl.rows.length; i < len; i++) {
                    var row = tbl.rows[i];
                    var sortnr = (parseFloat(row.cells[4].textContent || row.cells[4].innerText));

                    if (!isNaN(sortnr))
                        store.push([sortnr, row]);
                }
                store.sort(function (x, y) {
                    return y[0] - x[0];
                });
                for (var i = 0, len = store.length; i < len; i++) {
                    tbl.appendChild(store[i][1]);

                }
                store = null;
            }

            sortTable();
        </script>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;">Roll</th>
                <th style="text-align: center;">Student Name</th>
                <?php if ($class == 9 || $class == 10) { ?>
                    <th style="text-align: center;">Group</th>
                <?php } else { ?>
                    <th style="text-align: center;">Section</th>
                <?php } ?>
                <th style="text-align: center;">Total Marks</th>
                <th style="text-align: center;">GPA</th>
                <th style="text-align: center;">Letter Grade</th>
                <th style="text-align: center;">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $new_count = $c / $sub_count;
            for ($i = 1; $i <= $new_count; $i++) {
                if (in_array(${"student_class" . $i}, $class_array3)) {
                    if (${"fs" . $i} == 1) {
                        ${"gpa"} = ${"gpa" . $i} / ($sub_count - 3 + $t_count);
                    } else {
                        ${"gpa"} = ${"gpa" . $i} / ($sub_count - 3 + $t_count);
                    }
                } else {
                    ${"gpa"} = ${"gpa" . $i} / ($sub_count + $t_count);
                }
                if (0 <= ${"gpa"} && ${"gpa"} < 2) {
                    ${'grade'} = 'F';
                } else if (2 <= ${"gpa"} && ${"gpa"} < 3) {
                    ${'grade'} = 'C';
                } else if (3 <= ${"gpa"} && ${"gpa"} < 3.5) {
                    ${'grade'} = 'B';
                } else if (3.5 <= ${"gpa"} && ${"gpa"} < 4) {
                    ${'grade'} = 'A-';
                } else if (4 <= ${"gpa"} && ${"gpa"} < 5) {
                    ${'grade'} = 'A';
                } else if (${"gpa"} >= 5) {
                    ${"gpa"} = 5.00;
                    ${'grade'} = 'A+';
                }


                if (${'grade'} == 'F' || ${'grade'} == 'Invalid') {
                    $status = 'Failed';
                } else {
                    $status = 'Passed';
                }
                ${"total"} = ${"total" . $i};
                if ($status == 'Failed') {
                    ?>
                    <tr>
                        <td style="text-align: center;" class="sortnr"><?php echo ${"student_roll" . $i}; ?></td>
                        <td style="text-align: center;" class="sortnr"><?php echo ${"student_name" . $i}; ?></td>
                        <?php if ($class == 9 || $class == 10) { ?>
                            <td style="text-align: center;" class="sortnr"><?php echo ${"student_group" . $i}; ?></td>
                        <?php } else { ?>
                            <td style="text-align: center;" class="sortnr"><?php echo ${"student_section" . $i}; ?></td>
                        <?php } ?>
                        <td style="text-align: center;" class="sortnr"><?php echo ${"total"}; ?></td>
                        <td style="text-align: center;" class="sortnr"><?php echo round(${"gpa"}, 2); ?></td>
                        <td style="text-align: center;" class="sortnr"><?php echo ${"grade"}; ?></td>
                        <td style="text-align: center;" class="sortnr"><?php echo $status; ?></td>

                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php } ?>
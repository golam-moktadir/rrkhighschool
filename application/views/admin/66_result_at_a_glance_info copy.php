<?php if (!empty($all_value)) {
    $class_array1 = array('Play', 'Nursery', 'KG', '1', '2', '3', '4', '5');
    $class_array2 = array('6', '7', '8');
    $class_array3 = array('9', '10');
    $sub_count = 0;
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

                var tbl = document.getElementById("example2").tBodies[0];
                var store = [];
                for (var i = 0, len = tbl.rows.length; i < len; i++) {
                    var row = tbl.rows[i];
                    row.cells[7].innerHTML = i + 1;
                }
            }

            sortTable();
        </script>
        <table id="example2" class="table table-bordered table-hover">
            <tbody>
            <tr>
                <?php
                $new_count = $c / $sub_count;
                $column_count = 0;
                for ($i = 1;
                $i <= $new_count;
                $i++) {

                if (in_array(${"student_class" . $i}, $class_array3)) {
                    if (${"fs" . $i} == 1) {
                        ${"gpa"} = ${"gpa" . $i} / ($sub_count - 3 + $t_count);
                    } else {
                        ${"gpa"} = ${"gpa" . $i} / ($sub_count - 3 + $t_count);
                    }
                } else {
                    ${"gpa"} = ${"gpa" . $i} / ($sub_count + $t_count);
                }

                if (0 <= ${"gpa"} && ${"gpa"} < 1) {
                    ${'grade'} = 'F';
                } else if (1 <= ${"gpa"} && ${"gpa"} < 2) {
                    ${'grade'} = 'D';
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
                $column_count++;
                ?>

                <?php if ($column_count % 6 == 0) { ?>
                <td style="text-align: center;" class="sortnr">
                    <?php echo ${"student_id" . $i} . ' (' . round(${"gpa"}, 2) . ')'; ?>
                </td>
            </tr>
            <tr>
                <?php } else { ?>
                    <td style="text-align: center;" class="sortnr">
                        <?php echo ${"student_id" . $i} . ' (' . round(${"gpa"}, 2) . ')'; ?>
                    </td>
                    <?php
                }
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
<?php } ?>
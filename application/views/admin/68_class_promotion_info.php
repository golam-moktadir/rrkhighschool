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
                <th style="text-align: center;">Merit Position</th>
                <th style="text-align: center;">Promote</th>
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
                ?>
                <tr>
                    <td style="text-align: center;" class="sortnr"><?php echo ${"student_roll" . $i}; ?></td>
                    <input type="hidden" class="form-control" name="student_id<?php echo $i;?>"
                           id="student_id<?php echo $i;?>" value="<?php echo ${"student_id" . $i};?>">
                    <input type="hidden" class="form-control" name="class<?php echo $i;?>"
                           id="class<?php echo $i;?>" value="<?php echo ${"student_class" . $i};?>">
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
                    <td style="text-align: center;" class="sortnr"></td>
                    <td style="text-align: center;" class="sortnr">
                        <label class="c">
                            <input type="checkbox" checked="checked" id="promote<?php echo $i;?>">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <table id="example2" class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td style="text-align: center; float: right">
                    <button type="button" class="pull-left btn btn-success" id="promotion">Submit &nbsp; <i
                                class="fa fa-arrow-circle-right"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="count"
               id="count" value="<?php echo $new_count; ?>">
    </div>
<?php } ?>


<script type="text/javascript">

    $('#promotion').on('click', function () {
        var input_count = $('#count').val();

        var promoted = new Array();
        for (var i = 1; i <= input_count; i++) {
            if ($('#promote' + i).is(":checked")) {
                var promote = 1;
            } else {
                var promote = 0;
            }
            promoted[i - 1] = new Array($('#student_id' + i).val(), $('#class' + i).val(),
                promote);
        }
        console.log(promoted);
        var post_data = {
            'count': input_count,
            'promoted': promoted,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        // console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Edit/class_promotion",
            data: post_data,
            success: function (data) {
                $('#show_info').html('');
                $('#msg').html('Student Promoted');
            }
        });
    });

</script>


<style>
    /* The c */
    .c {
        display: block;
        position: relative;
        cursor: pointer;
        font-size: 22px;
        margin-left: 35px;
        margin-bottom: 12px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .c input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 23px;
        background-color: #eee;
        border: solid black;
        border-width: 1px 1px 1px 1px;
    }

    /* On mouse-over, add a grey background color */
    .c:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .c input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .c input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .c .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>

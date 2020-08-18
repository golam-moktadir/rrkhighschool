<div id="show_duplicate_msg">
    <h3 style="text-align: center; color: red;">Already Marks Given for This Subject</h3>
    <p style="text-align: center;">
        <button style="text-align: center;" type="button" class="btn btn-danger"
                id="delete_previous_marks">Delete Previous Marks</button>
    </p>
</div>

<script>
    $("#delete_previous_marks").on("click", function () {
        var teacher_id = $('#teacher').val();
        var input_session = $('#session_name').val();
        var input_shift = $('#shift_name').val();
        var input_group = $('#group_name').val();
        var input_section = $('#section_name').val();
        var input_exam = $('#exam_name').val();
        var input_class = $('#class_name').val();
        var input_subject = $('#subject').val();

        var post_data = {
            'teacher_id': teacher_id,
            'session_name': input_session,
            'class': input_class,
            'shift': input_shift,
            'group': input_group,
            'section': input_section,
            'exam': input_exam,
            'subject': input_subject,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Delete/previous_marks",
            data: post_data,
            success: function () {
                $('#show_duplicate_msg').html("<h3 style='text-align: center; color: red;'>Deleted Successfully</h3>");
            }
        });
    });
</script>
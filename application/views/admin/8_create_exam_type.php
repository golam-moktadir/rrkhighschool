<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <form id="temp_form">
                        <div class="box-body">
                            <p style="font-size: 20px;">Create Exam Type</p>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="session_id">Select Session</label><small class="req"> *</small> 
                                    <select name="session_id" required data-live-search="true" id="session_id" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_session)): ?>
                                            <?php foreach ($all_session as $value):?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->session_name; ?>">
                                                    <?php echo $value->session_name; ?>
                                                </option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="class_id">Select Class</label><small class="req"> *</small> 
                                    <select name="class_id" required id="class_id" data-live-search="true" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="">-- Select --</option>
                                        <?php if(isset($all_class)): ?>
                                            <?php foreach ($all_class as $value):?>
                                                <option value="<?php echo $value->record_id; ?>#<?php echo $value->class_name; ?>">
                                                    <?php echo "Class - " . nfa($value->class_name); ?>
                                                </option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="exam_type">Exam Type</label><small class="req"> *</small> 
                                    <input type="text" class="form-control" required id="exam_type" placeholder="" name="exam_type">
                                </div>
                                <div class="box-footer col-sm-4 clearfix">
                                    <button type="submit" class="pull-left btn btn-success">Add <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="box-body table-responsive" style="width: 98%; color: black; padding-bottom: 10px;">
                    <form id="final_form">
                        <table id="temp_data" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL.</th>
                                <th style="text-align: center;">Session</th>
                                <th style="text-align: center;">Class</th>
                                <th style="text-align: center;">Exam Type</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="box-footer clearfix">
                            <button type="submit" class="pull-right btn btn-success btn-sm" id="save_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example2" class="subject_table table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Session</th>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">Exam Type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($all_value)): ?>
                                    <?php foreach($all_value as $key=>$value): ?>
                                        <tr>
                                            <td class="text-center"><?= ++$key;?></td>
                                            <td class="text-center"><?= $value['session_name'];?></td>
                                            <td class="text-center"><?= "Class-".nfa($value['class_name']);?></td>
                                            <td class="text-center"><?= $value['exam_type'];?></td>
                                            <td class="actions btn-group-xs text-center">
                                                <a title="Edit" href="<?php echo site_url("Show_edit_form/create_exam_type/" . $value['record_id'].'/main'); ?>" class=" btn btn-info btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View">Edit</a>
                                                <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("Delete/create_exam_type/" . $value['record_id']); ?>" title="Delete" class="text-danger btn btn-danger  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#example2').DataTable({
        "info":false,
        "autoWidth": false
    });
    //form save temporary
    var store_data=[];
    $("#temp_form").on("submit",function(e){
        e.preventDefault();
        var classs=$("#temp_form #class_id").val().split("#");
        var class_id=classs[0];
        var class_name=classs[1];
        var session=$("#temp_form #session_id").val().split("#");
        var session_id=session[0];
        var session_name=session[1];

        var exam_type=$("#exam_type").val();  

        var  single_input_data={
            class_id:class_id,
            class_name:class_name,
            session_id:session_id,
            session_name:session_name,
            exam_type:exam_type,
        };
        if(!examType(store_data,exam_type))
        {
            store_data.push(single_input_data);
        }else{
            alert(exam_type+" Already Add");   
        }
        function examType(array,exam_type) {
            return array.some(function(el) {
                return el.exam_type === exam_type;
            }); 
        }
        $('#temp_data tbody').find("tr").remove();
        $.each(store_data,function(key,value){
            html = '<tr id="'+value.exam_type+'">' +
                '<td class="text-center">'+(++key)+'</td>' +
                '<td class="text-center">' + value.session_name + 
                '<input type="hidden" name="class_id[]" value="'+value.class_id+'" >'+
                '<input type="hidden" name="session_id[]" value="'+value.session_id+'" >'+
                '<input type="hidden" name="exam_type[]" value="'+value.exam_type+'" >'+
                '</td>' +                    
                '<td class="text-center">' + value.class_name + '</td>' +
                '<td class="text-center">' + value.exam_type + '</td>' +
                '<td class="text-center text-danger"><button  type="button" class="temp_delete btn btn-danger btn-xs">Delete</button></td>' +
                '</tr>';
            $("#temp_data tbody").append(html);
        });
    });

    $("#temp_data").on("click",".temp_delete",function(){
        if(confirm("Are You sure?"))
        {
            var exam_type=$(this).parent().closest('tr').attr("id");
            $(this).parent().closest('tr').remove();
            removeExamType(store_data,exam_type);
        }
    });
    //removeExamType
    function removeExamType(array, exam_type){
        for(var i = 0; i <= array.length - 1; i++){
            if(array[i].exam_type == exam_type){
                array.splice(i,1);
            }
        }
    }
     //final_form
     $("#final_form").on("submit",function(e){
            e.preventDefault();
            if(store_data.length>0)
            {
                var url="<?php echo base_url(); ?>Insert/create_exam_type";
                $.ajax({
                    url:url,
                    type:"post",
                    dataType:"json",
                    data:$(this).serialize(),
                    success:function(data){
                        location.reload();
                    }
                });
            }
            else{
                alert("Please Add Exam First");
            }
        });
</script>
<section class="content">
    <div class="row" style="margin-top: 55px;">
        <section class="col-xs-12 connectedSortable">
            <div class="" style="color: black;">
                <?php echo form_open_multipart('Edit/online_class/'.$one_class->record_id); ?>
                <div class="box-body">
                    <p style="font-size: 20px;">Edit Online Class Tutorial</p>
                    <p style="font-size: 20px; color: #066;"><?php echo $this->session->flashdata('msg') ;?></p>
                    <div class="row">
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="title">Select Class</label>
                            <select required name="class_id" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php
                                    foreach($classes as $class){
                                ?>
                                    <option <?php if($one_class->class_id == $class->record_id) echo 'selected' ?> value="<?php echo $class->record_id ?>"><?php echo $class->class_name ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="title">Select Group</label>
                            <select name="group_id" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php
                                    foreach($groups as $group){
                                ?>
                                    <option <?php if($one_class->group_id == $group->record_id) echo 'selected' ?> value="<?php echo $group->record_id ?>"><?php echo $group->group_name ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="title">Select Subject</label>
                            <select required name="subject_id" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php
                                    foreach($subjects as $subject){
                                ?>
                                    <option <?php if($one_class->subject_id == $subject->record_id) echo 'selected' ?> value="<?php echo $subject->record_id ?>"><?php echo $subject->subject_name ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="title">Select Section</label>
                            <select required name="section_id" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <?php
                                    foreach($sections as $section){
                                ?>
                                    <option <?php if($one_class->section_id == $section->record_id) echo 'selected' ?> value="<?php echo $section->record_id ?>"><?php echo $section->section_name ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="image_name">Topic Name</label>
                            <input type="text" name="topic_name" class="form-control" value="<?php echo $one_class->topic_name ?>">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label>Please Upload PDF only</label>
                            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-8 col-xs-12">
                            <label for="link">Or Video Link</label>
                            <?php 
                                $value = explode('.', $one_class->link);
                                if(end($value) != 'pdf'){

                            ?>
                                 <input value="<?php echo $one_class->link?>" class="form-control" id="link" name="link">
                            <?php 
                                }
                                else{
                            ?>
                                 <input class="form-control" id="link" name="link">
                            <?php
                                }
                            ?>    
                        </div>
                        <div class="box-footer col-xs-4 clearfix">
                            <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Update <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title" style="color: black;">All Info.</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center;">SL</th>
                            <th style="text-align: center;">Class</th>
                            <th style="text-align: center;">Group</th>
                            <th style="text-align: center;">Subject</th>
                            <th style="text-align: center;">Section</th>
                            <th style="text-align: center;">Topic Name</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 0;
                        foreach ($all_value as $single_value) {
                            $count++;
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <?php
                                    foreach($classes as $class){
                                        if($class->record_id == $single_value->class_id){
                                ?>
                                <td style="text-align: center;"><?php echo $class->class_name ?></td>
                                <?php 
                                    }
                                } 
                                    foreach($groups as $group){
                                        if($group->record_id == $single_value->group_id){
                                ?>
                                <td style="text-align: center;"><?php echo $group->group_name ?></td>
                              <?php 
                                    }
                                } 
                                    foreach($subjects as $subject){
                                        if($subject->record_id == $single_value->subject_id){
                              ?>
                                <td style="text-align: center;"><?php echo $subject->subject_name; ?></td>
                              <?php
                                    }
                                }
                                    foreach($sections as $section){
                                        if($section->record_id == $single_value->section_id){
                              ?>
                                <td style="text-align: center;"><?php echo $section->section_name; ?></td>
                            <?php
                                    }
                                }
                                $value = explode('.', $single_value->link);
                                if(end($value) == 'pdf'){
                            ?>
                                <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo base_url().'assets/pdf/lecture/'.$single_value->link ?>"><?php echo $single_value->topic_name ?></a>
                                </td>
                            <?php 
                                }
                                else{ 
                            ?>
                                <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo $single_value->link ?>"><?php echo $single_value->topic_name ?></a>
                                </td>
                            <?php 
                                } 
                            ?>
                                <td style="text-align: center;">
                                    <a style="margin: 5px;"
                                        href="<?php echo base_url(); ?>Show_edit_form/edit_online_class/<?php echo $single_value->record_id; ?>"
                                        class="btn btn-info">Edit
                                    </a>
                                    <a style="margin: 5px;"
                                        href="<?php echo base_url(); ?>Delete/single_page_content/<?php echo $single_value->record_id; ?>"
                                        class="btn btn-danger">Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div><!-- /.box-body -->
            </div>
        </section>
    </div>
</section>
<script src="<?php echo JS_URL ?>bootstrap-select.min.js"></script>
<script type="text/javascript">
    // function validation(){
    //     var pdf_file = document.getElementById('pdf_file').value;
    //     var link = document.getElementById('link').value;
    //     if(!(pdf_file || link)){
    //         alert('No content. Please Upload PDF file or Insert Video Link');
    //         return false;
    //     }
    // }
</script>
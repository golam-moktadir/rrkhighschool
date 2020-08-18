<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('aaa/aaa'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Student Attendance Report</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="class_name">Select Class</label>
                                    <select name="class_name" id="class_name" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="">Class Name</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="group_name">Select Group</label>
                                    <select name="group_name" id="group_name" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="">Group Name</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="section_name">Select Section</label>
                                    <select name="section_name" id="section_name" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="">Section Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="shift_name">Select Shift</label>
                                    <select name="shift_name" id="shift_name" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="">Shift Name</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="student_id">Student ID</label>
                                    <select name="student_id" id="student_id" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="">Student ID</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date_from">Date From</label>
                                    <input type="date" class="form-control" name="date_from" id="date_from">
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="date_to">Date To</label>
                                    <input type="date" class="form-control" name="date_to" id="date_to">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success">Search &nbsp <i class="fa fa-search"></i></button>
                    </div>
                    </form>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Attendance Report</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Day of the Week</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Roll</th>
                                <th style="text-align: center;">Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align: center;">Empty</td>
                                <td style="text-align: center;">Empty</td>
                                <td style="text-align: center;">Empty</td>
                                <td style="text-align: center;">Empty</td>
                                <td style="text-align: center;">Empty</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('aaa/aaa'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Teacher Attendance</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="shift_name">Select Shift</label>
                                    <select name="shift_name" id="shift_name" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="">Shift Name</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="timepicker1">Time</label>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                        <input name="time" id="timepicker1" value="08:30" type="text" class="form-control">
                                    </div>
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
                        <h3 class="box-title" style="color: black;">Attendance Sheet</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Staff ID</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Day of the Week</th>
                                <th style="text-align: center;">Time</th>
                                <th style="text-align: center;">Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align: center;">Empty</td>
                                <td style="text-align: center;">Empty</td>
                                <td style="text-align: center;">Empty</td>
                                <td style="text-align: center;"><?php echo date( "d-m-Y");?></td>
                                <td style="text-align: center;"><?php echo date( "l");?></td>
                                <td style="text-align: center;">Time</td>
                                <td style="text-align: center;">
                                    <label class="radio-inline"><input type="radio" name="status">Absent</label>
                                    <label class="radio-inline"><input type="radio" name="status">Present</label>
                                    <label class="radio-inline"><input type="radio" name="status">Late</label>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: center;"></td>
                                <td style="text-align: center; float: right"><button type="button" class="pull-left btn btn-success">Submit &nbsp <i class="fa fa-arrow-circle-right"></i></button></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!--<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>-->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>

<script type="text/javascript">
    $('#timepicker1').timepicker({
        showInputs: false
    });
</script>
<section class="content">
    <div class="row" style="margin-top: 55px;">
        <section class="col-xs-12 connectedSortable">
            <div class="" style="color: black;">
                <?php echo form_open('Insert/insert_news'); ?>
                <div class="box-body">
                    <p style="font-size: 20px;">Insert News</p>
                    <?php echo $this->session->flashdata("msg"); ?>
                    <div class="row">
                        <div class="form-group col-sm-8 col-xs-12">
                        <textarea class="form-control" id="news"
                                    rows="8" placeholder="" name="news"
                                    style=""></textarea>
                        </div>
                        <div class="box-footer col-xs-4 clearfix">
                            <button type="submit" class="pull-left btn btn-success">Submit
                                <i class="fa fa-arrow-circle-right"></i></button>
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
                            <th style="text-align: center; width: 10%;">No.</th>
                            <th style="text-align: center;">News</th>
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
                                <td style="text-align: center;"><?php echo $single_value->news; ?></td>
                                <td style="text-align: center;">
                                    <a style="margin: 5px;" class="btn btn-danger"
                                        href="<?php echo base_url(); ?>Delete/insert_news/<?php echo $single_value->record_id; ?>">Delete
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
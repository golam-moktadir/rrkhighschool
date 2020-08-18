<section class="content">
    <div class="row" style="margin-top: 55px;">
        <section class="col-xs-12 connectedSortable">
            <div class="" style="color: black;">
                <?php echo form_open_multipart('Insert/single_page_content'); ?>
                <div class="box-body">
                    <p style="font-size: 20px;">Insert Info.</p>
                    <p style="font-size: 20px; color: #066;"><?php echo $this->session->flashdata('msg') ;?></p>
                    <div class="row">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="title">Select Title</label><small class="req">*</small>
                            <select required name="title" id="title" class="form-control selectpicker"
                                    data-container="body">
                                <option value="">-- Select --</option>
                                <option value="1">স্কুল পরিচিতি</option>
                                <option value="2">উপজেলা চেয়ারম্যানের বাণী</option>
                                <option value="3">সভাপতির বাণী</option>
                                <option value="6">সংসদ সদস্যের বাণী</option>
                                <option value="4">প্রধান শিক্ষকের বক্তব্য</option>
                                <option value="8">আমাদের লক্ষ্য</option>
                                <option value="9">নিয়মাবলী</option>
                                <option value="10">অভিভাবক গণের দায়িত্ব</option>
                                <option value="11">স্কুলের পোষাক পরিচ্ছদ</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="image">Image (If Any)</label>
                            <input type="file" class="form-control" id="image" placeholder="" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-8 col-xs-12">
                            <label for="details">Details</label><small class="req">*</small>
                            <textarea required rows="6" class="form-control" id="details" name="details"></textarea>
                        </div>
                        <div class="box-footer col-xs-4 clearfix">
                            <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Submit <i
                                        class="fa fa-arrow-circle-right"></i>
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
                            <th style="text-align: center;">Title</th>
                            <th style="text-align: center;">Image</th>
                            <th style="text-align: center;">Details</th>
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
                                <td style="text-align: center;">
                                    <?php
                                    $title_id = $single_value->title;
                                    if ($title_id == 1) {
                                        echo "স্কুল পরিচিতি";
                                    } elseif ($title_id == 2) {
                                        echo "উপজেলা চেয়ারম্যানের বাণী";
                                    } elseif ($title_id == 3) {
                                        echo "সভাপতির বাণী";
                                    } elseif ($title_id == 4) {
                                        echo "প্রধান শিক্ষকের বক্তব্য";
                                    } elseif ($title_id == 5) {
                                        echo "উপজেলা চেয়ারম্যানের বাণী";
                                    } elseif ($title_id == 6) {
                                        echo "সংসদ সদস্যের বাণী";
                                    } elseif ($title_id == 7) {
                                        echo "Message from Meyor";
                                    } elseif ($title_id == 8) {
                                        echo "আমাদের লক্ষ্য";
                                    } elseif ($title_id == 9) {
                                        echo "নিয়মাবলী";
                                    } elseif ($title_id == 10) {
                                        echo "অভিভাবক গণের দায়িত্ব";
                                    } elseif ($title_id == 11) {
                                        echo "স্কুলের পোষাক পরিচ্ছদ";
                                    }
                                    ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (file_exists('./assets/img/single_page_content/' . $single_value->image)) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $single_value->image; ?>"
                                                style="width: 100px; height: 70px;">
                                    <?php } else {
                                        echo "No Image";
                                    } ?>
                                </td>
                                <td style="text-align: justify;"><?php echo $single_value->details; ?></td>
                                <td style="text-align: center;">
                                    <a style="margin: 5px;"
                                        href="<?php echo base_url(); ?>Show_edit_form/single_page_content/<?php echo $single_value->record_id; ?>"
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
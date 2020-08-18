<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $name = $one_info->name;
    $designation = $one_info->designation;
    $mobile = $one_info->mobile;
    $alternative_mobile = $one_info->alternative_mobile;
    $email = $one_info->email;
    $date_of_birth = date('d-m-Y', strtotime($one_info->date_of_birth));
    $gender = $one_info->gender;
    $blood_group = $one_info->blood_group;
    $nationality = $one_info->nationality;
    $religion = $one_info->religion;
    $session_name = $one_info->session_name;
    $address = $one_info->address;
    $password = $one_info->password;

    $library = $one_info->library;
    $fees_collection = $one_info->fees_collection;
    $accounting = $one_info->accounting;
//    $asset_info = $one_info->asset_info;
    $dormitory = $one_info->dormitory;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/insert_staff_info/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Staff Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                           value="<?php echo $name; ?>" placeholder="" name="name">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="designation">Select Designation</label>
                                    <select name="designation" id="designation" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="<?php echo $designation; ?>">
                                            <?php echo $designation; ?>
                                        </option>
                                        <?php foreach ($all_designation as $single_designation) { ?>
                                            <option value="<?php echo $single_designation->designation; ?>">
                                                <?php echo $single_designation->designation; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="mobile">Mobile No.</label>
                                    <input type="text" class="form-control" id="mobile"
                                           value="<?php echo $mobile; ?>" placeholder="" name="mobile">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="alternative_mobile">Alternative Mobile</label>
                                    <input type="text" class="form-control" id="alternative_mobile" placeholder=""
                                           name="alternative_mobile" value="<?php echo $alternative_mobile; ?>">
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email"
                                           value="<?php echo $email; ?>" placeholder="" name="email">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" class="form-control" id="date_of_birth"
                                           value="<?php echo $date_of_birth; ?>" placeholder="" name="date_of_birth">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="gender">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="<?php echo $gender; ?>">
                                            <?php echo $gender; ?>
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="blood_group">Select Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="<?php echo $blood_group; ?>">
                                            <?php echo $blood_group; ?>
                                        </option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" id="nationality"
                                           value="<?php echo $nationality; ?>" placeholder="" name="nationality">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="religion">Religion</label>
                                    <select class="form-control selectpicker"
                                            data-container="body" id="religion" name="religion">
                                        <option value="Islam" <?php if ($religion == 'Islam') {
                                            echo 'selected';
                                        } ?>>Islam
                                        </option>
                                        <option value="Hinduism" <?php if ($religion == 'Hinduism') {
                                            echo 'selected';
                                        } ?>>Hinduism
                                        </option>
                                        <option value="Christianity" <?php if ($religion == 'Christianity') {
                                            echo 'selected';
                                        } ?>>Christianity
                                        </option>
                                        <option value="Buddhism" <?php if ($religion == 'Buddhism') {
                                            echo 'selected';
                                        } ?>>Buddhism
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="session_name">Select Joining Year</label>
                                    <select name="session_name" id="session_name" class="form-control selectpicker"
                                            data-container="body">
                                        <option value="<?php echo $session_name; ?>">
                                            <?php echo $session_name; ?>
                                        </option>
                                        <?php foreach ($all_session as $single_session) { ?>
                                            <option value="<?php echo $single_session->session_name; ?>">
                                                <?php echo $single_session->session_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address"
                                           value="<?php echo $address; ?>" placeholder="" name="address">
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                           value="<?php echo $password; ?>" placeholder="" name="password">
                                </div>
                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="" name="image">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12 col-xs-12">
                                    <h4><i class="fa fa-angle-double-right text-red"></i> Permission for Staff</h4>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="form-group col-sm-12 col-xs-12">
                                    <label class="checkbox-inline">
                                        <input type="hidden" name="library" value="0">
                                        <input type="checkbox" name="library" value="1" <?php
                                        if ($library == 1) {
                                            echo "checked";
                                        }
                                        ?>> Library
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="hidden" name="fees_collection" value="0">
                                        <input type="checkbox" name="fees_collection" value="1" <?php
                                        if ($fees_collection == 1) {
                                            echo "checked";
                                        }
                                        ?>> Fees Collection
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="hidden" name="accounting" value="0">
                                        <input type="checkbox" name="accounting" value="1" <?php
                                        if ($accounting == 1) {
                                            echo "checked";
                                        }
                                        ?>> Accounting
                                    </label>
                                    <!--                                    <label class="checkbox-inline">
                                                                            <input type="hidden" name="asset_info" value="0">
                                                                            <input type="checkbox" name="asset_info" value="1" <?php
                                    if ($asset_info == 1) {
                                        echo "checked";
                                    }
                                    ?>> Asset Info.
                                                                        </label> -->

                                </div>
                                <div class="box-footer col-sm-2 clearfix">
                                    <button style="margin-top: 5px" type="submit"
                                            class="pull-left btn btn-success btn-sm">
                                        Edit <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>
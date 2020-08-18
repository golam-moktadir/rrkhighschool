<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Welcome to Ramchandrapur Ramkanta High School | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>adminlte/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>adminlte/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>adminlte/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="bg-black">

        <?php echo form_open('Log_in_out/login_check'); ?>

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>

            <div class="body bg-gray"  align="center">
              <!--   <div class="form-group" style="width: 40%; border: #1a3d4f 1px solid; text-align: center;">
                    <select name="user_type" id="user_type" class="form-control" style="color: black;">
                        <option value="">-- Select --</option>
                        <option value="admin">Admin</option>
                        <option value="accounts">Accounts</option>
                        <option value="staff">Staff</option>
                        <option value="teacher">Teacher</option>
                        <option value="alumni">Alumni</option>
                    </select>
                </div> -->
                <div class="form-group" style="border: #066 1px solid;">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group" style="border: #066 1px solid;">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>  

                <div class="form-group" style="color: red;">
                    <?php echo validation_errors(); ?>
                </div>
                <div class="form-group" style="color: red;">
                    <?php echo $this->session->flashdata('message') ?>
                </div>
            </div>
            <div class="footer">                                                               
                <button type="submit" class="btn bg-olive btn-block">Sign in</button> 
            </div>

        </div>

    </form>
    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>adminlte/js/bootstrap.min.js" type="text/javascript"></script>        

</body>
</html>
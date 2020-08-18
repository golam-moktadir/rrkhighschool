<div class="clear" style="padding:25px"></div>
<!--Datepicker-->
<div class="footer" id="no_print1">
    <p style="text-align: center; color: wheat;">Copyright &copy; 2018. Designed & Developed by <a href="http://www.greensoftechbd.com/" target="_blank" style="color: yellow;">GREEN SOFTWARE &
            TECHNOLOGY</a>. All rights reserved</p>
</div>
<style>
    .footer {
        left:0;
        bottom:0%;
        height:50px;
        width:100%;
        background:#066;
        padding-bottom: 5px;
        padding-top: 5px;
        position: fixed;
    }
</style>

<script>
    $(function () {
        $(".new_datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            constrainInput: true,
            changeYear: true,
            changeMonth: true,
            yearRange: '-100:+100'
        });
    });
</script>
<style>
    div.ui-datepicker{
        font-size:13px;
    }
    /*.ui-datepicker-calendar a.ui-state-default { background: cyan; }
    .ui-datepicker-calendar td.ui-datepicker-today a { background: red; }*/
    .ui-datepicker-calendar a.ui-state-hover { background: #066;color: white; }
    .ui-datepicker-calendar a.ui-state-active { background: #066;color: white; }
</style>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>adminlte/js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="--><?php //echo base_url(); ?><!--adminlte/js/AdminLTE/app.js" type="text/javascript"></script>-->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
</body>
</html>
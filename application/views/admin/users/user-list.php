<aside>
  <section class="content">
    <div class="row" style="margin-top: 55px;">
      <section class="col-xs-12 connectedSortable">
        <div class="box box-info" style="margin-top: 10px;" id="info">
          <div class="box-header">
            <h3 class="box-title" style="color: black;">All Info.</h3>
          </div>
          <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
            <table id="pagination_search" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="text-align: center;">Sl.</th>
                    <th style="text-align: center;">Username</th>
                    <th style="text-align: center;">Password</th>
                    <th style="text-align: center;">Role</th>  
                    <th style="text-align: center;">Permissions</th>  
                    <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 1;
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count++; ?></td>
                        <td style="text-align: center;"><?php echo $user->username ?></td>
                        <td style="text-align: center;"><?php echo $user->password ?></td>
                        <td style="text-align: center;"><?php echo $user->role ?></td>
                        <td style="text-align: center;">
                            <a href="<?php echo base_url().'Admins/add_permession/'.$user->id ?>">Permissions</a>
                        </td>
                        <td style="text-align: center;">
                        <?php
                            if($user->approval_status == 10){
                        ?>
                          <a class="btn btn-sm btn-warning" href=<?php echo base_url()."Edit/approval_status/$user->id/users/Admins/user_list" ?>><i class="fa fa-arrow-circle-down"></i></a>
                        <?php
                            }
                            else{
                        ?>
                          <a class="btn btn-sm btn-info" href="<?php echo base_url()."Edit/approval_status/$user->id/users/Admins/user_list" ?>"><i class="fa fa-arrow-circle-up"></i></a>
                        <?php        
                            }
                        ?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </section>
</aside>
<script type="text/javascript">
    window.onload = function () {
        $('#pagination_search').dataTable({
            "ordering": false,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            fixedHeader: {
                header: true,
                footer: true,
                headerOffset: 50
            }
        });
    };
</script>
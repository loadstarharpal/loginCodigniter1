
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Meal
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
           <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/dashboard/users">Users</a></li>
            <li class="active">Edit User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Quick Update</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" role="form" action=""   enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="user-name">User Name</label>
                      <input required="" type="text" class="form-control" value="<?=$users['user_name']?>" id="user_name" name="user_name" placeholder="User name">
                    </div>
                     <div class="form-group">
                      <label for="password">Password</label>
                      <input  type="password" class="form-control" value="" id="password" name="password" placeholder="Enter password ">
                    </div>
                     <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input required="" type="number" class="form-control" value="<?=$users['mobile']?>" id="mobile" name="mobile" placeholder="Enter mobile price">
                    </div>
                   
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  required="" name="status" id="status" class="form-control" >
                            <option value=''>None</option>
                            <option <?php if($users['status']=='active'){echo " selected='selected' ";}?> value='active'>Active</option>
                            <option <?php if($users['status']=='inactive'){echo " selected='selected' ";}?> value='inactive'>Inactive</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="status">Role</label>
                        <select  required="" name="role" id="role" class="form-control" >
                            <option value=''>None</option>
                            <option <?php if($users['role']=='admin'){echo " selected='selected' ";}?> value='admin'>Admin</option>
                            </select>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
           
                    </div>
                   
                   
                     
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input  type="submit" name="submit" value="Update" class="btn btn-primary" />
                  </div>
                </form>
              </div><!-- /.box -->

          
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>

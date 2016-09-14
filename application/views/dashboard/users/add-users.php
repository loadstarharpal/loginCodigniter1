
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Users
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/dashboard/meals">Users</a></li>
            <li class="active">Add Users</li>
          </ol>
        </section>

        

        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Quick Add</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" role="form" action="/dashboard/addUsers"  enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">User Name</label>
                      <input required="" type="text" class="form-control" id="user_name" name="user_name" placeholder="User name">
                    </div>
                     <div class="form-group">
                      <label for="password">Password</label>
                      <input required="" type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                   
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input required="" type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
                    </div>
                    
                     <div class="form-group">
                      <label for="role">Select Role</label>
                        <select  required="" name="role" class="form-control" >
                        <option value="" >Select Role</option>
                         <option value="admin" >Admin</option>
                          
                        </select>
                    </div>
                    
                    <div class="form-group">
						
                        <label for="status">Status</label>
                        <select  required="" name="status" id="status" class="form-control" >
                            <option value=''>None</option>
                            <option value='active'>Active</option>
                            <option value='inactive'>Inactive</option>
                        </select>
                    </div>
                      
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input  type="submit" name="submit" value="Submit" class="btn btn-primary" />
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

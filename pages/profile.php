<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
 <!-- Main content -->
          <section class="content mt-5">
            <div class="container-fluid">
             <div class="card-header">
                <h3 class="card-title mt-3">Update passowrd</h3>
              </div>
              <!-- /.card-header -->
               <div class="row">
                 <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2 mt-3">
                   <div class="card">
                     <div class="card-body">
                      <?php 
                          $login_user = $_SESSION['user_id'];
                          $user_info = $obj->find('user','id',$login_user);

                          if ($user_info) {
                            ?>
                            <form id="update_userForm">
                              
                               <input type="text" hidden name="user_id" value="<?=$login_user?>">
                             <div class="form-group">
                                <label for="password">new password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                              </div>
                              <div class="form-group">
                                <label for="c_password">Confirm password</label>
                                <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm password">
                              </div>
                            
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0">Update user</button>
                                </div>
                                  </form>
                            <?php 
                          }
                       ?>
              
                    </div>
                  </div>
                 </div>
               </div>
            </div>
            <!-- /.card-body -->
            <!-- /.row -->
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper
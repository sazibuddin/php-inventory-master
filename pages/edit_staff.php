<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit Staff</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <!-- /.card-header -->
               <div class="row">
                 <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2 mt-3">
                   <div class="card">
                    <div class="card-header">
                      <h3>edit staff</h3>
                    </div>
                     <div class="card-body">
                      <?php 
                        if (isset($_GET['edit_id'])) {
                           $edit_id = $_GET['edit_id'];
                           $staff_data = $obj->find('staff','id',$edit_id);
                           if ($staff_data) {
                             ?>
                        <form id="editstaffForm">
                          <div class="form-group">
                            <label for="name">Name *:</label>
                            <input type="text" class="form-control" id="name" placeholder="Staff name" name="name" value="<?=$staff_data->name;?>">
                            <input type="text" hidden name="id" value="<?=$staff_data->id;?>">
                          </div>
                          <div class="form-group">
                            <label for="designation">Designation *:</label>
                            <input type="text" class="form-control" id="designation" placeholder="Staff designation" name="designation" value="<?=$staff_data->designation;?>">
                          </div>
                          <div class="form-group">
                            <label for="contact">Contact number *:</label>
                            <input type="text" class="form-control" id="contact" placeholder="Contact member" name="contact" value="<?=$staff_data->con_no;?>">
                          </div>
                          <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Email optional" name="email" value="<?=$staff_data->email;?>">
                          </div>
                           <div class="form-group">
                            <label for="address">Address *:</label>
                            <textarea rows="3" class="form-control" placeholder="Member complect Address" id="address" name="address"><?=$staff_data->address;?></textarea>
                           </div>
                          <button type="submit" class="btn btn-primary btn-block rounded-0">update staff</button>
                         </form>
                             <?php 
                           }
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
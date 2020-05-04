<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 mt-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">add Staff</li>
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
                      <h3>Add a new staff</h3>
                    </div>
                     <div class="card-body">
                         <form id="adstaffForm">
                          <div class="form-group">
                            <label for="name">Name *:</label>
                            <input type="text" class="form-control" id="name" placeholder="Staff name" name="name">
                          </div>
                          <div class="form-group">
                            <label for="designation">Designation *:</label>
                            <input type="text" class="form-control" id="designation" placeholder="Staff designation" name="designation">
                          </div>
                          <div class="form-group">
                            <label for="contact">Contact number *:</label>
                            <input type="text" class="form-control" id="contact" placeholder="Contact member" name="contact">
                          </div>
                          <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Email optional" name="email">
                          </div>
                           <div class="form-group">
                            <label for="address">Address *:</label>
                            <textarea rows="3" class="form-control" placeholder="Member complect Address" id="address" name="address"></textarea>
                           </div>
                          <button type="submit" class="btn btn-primary btn-block rounded-0">Add member</button>
                         </form>
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
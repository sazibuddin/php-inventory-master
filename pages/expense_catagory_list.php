<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expense catagory</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <!-- .row -->
            <div class="card-header">
                <h3 class="card-title">All expense catagory</h3>
              <!--  <a href="index.php?page=add_expense_catagory" class="btn btn-primary btn-sm float-right rounded-0">Add expense catagory</a> -->
                <button type="button" class="btn btn-primary btn-sm float-right rounded-0" data-toggle="modal" data-target=".expenseCatModal"><i class="fas fa-plus"></i> expense catagory</button>

              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <div class="table-responsive">
                    <table id="ex_catagoryTable" class="display dataTable text-center">
                      <thead>
                        <tr>
                          <th>SI</th>
                          <th>Catagory name</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>
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
        <!-- /.content-wrapper -->
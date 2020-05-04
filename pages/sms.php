<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 mt-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Sens sms</li>
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
                      <div class="card-header"><h4><b>Send sms to you customer</b></h4></div>
                      <div class="card-body">
                        <form id="sendSmsForm">
                          <div class="form-group">
                            <label for="sms_number">number</label>
                            <input type="text" class="form-control" id="sms_number" name="sms_number">
                          </div>
                            <div class="form-group">
                            <label for="sms_message">Message </label>
                            <textarea  rows="3" class="form-control" id="sms_message" placeholder="Type message for customer" name="sms_message"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0"><i class="fas fa-running"></i> Send sms</button>
                          </div>
                        </form>
                      </div>
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
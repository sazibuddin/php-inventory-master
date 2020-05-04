<!-- Content Wrapper. Contains page content  -->
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
              <li class="breadcrumb-item active">Catagory</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
             <div class="card-header">
                <h3 class="card-title">Edit catagory</h3>
              </div>
              <!-- /.card-header -->
               <div class="row">
                 <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2 mt-3">
                   <div class="card">
                     <div class="card-body">
      <?php 
        if (isset($_GET['edit_id'])) {
           $edit_id = $_GET['edit_id'];
           $data = $obj->find('catagory' , 'id' , $edit_id);

            if ($data) {
              ?>
                <form id="editCatForm">
                          <div class="form-group">
                            <label for="cat_name">Category </label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?=$data->name;?>">
                            <input type="text" hidden name="id" value="<?=$edit_id;?>"><!-- pass id with hidden field -->
                          </div>
                            <div class="form-group">
                            <label for="cat_descrip">Description </label>
                            <textarea  rows="3" class="form-control" id="cat_descrip" name="cat_descrip"><?=$data->description;?></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0">Update</button>
                          </div>
                        </form>

              <?php 
            }else{
          header("location:index.php?page=error_page");
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
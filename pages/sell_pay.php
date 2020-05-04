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
              <!-- /.card-header -->
               <div class="row">
                 <?php 
        if (isset($_GET['id']) && $_GET['id'] != '') {
           $edit_id = $_GET['id'];
           $data = $obj->find('member' , 'id' , $edit_id);

            if ($data) {
              ?>
                 <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1 mt-3">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="text-center">Sell Payments</h3>
                    </div>
                    <div class="card-body">
                     <div class="row">
                       <div class="col-md-6 col-lg-6">
                          <?php 
                        
                          ?>
                            <p class="m-0 p-0"><b><i>Suppliar info : </i></b></p>
                            <p class="m-0 p-0">Name:<?=$data->name;?></p>
                            <p class="m-0 p-0">Name:<?=$data->company;?></p>
                            <p class="m-0 p-0">Name:<?=$data->address;?></p>
                            <p class="m-0 p-0">Name:<?=$data->con_num;?></p>
                            <p class="m-0 p-0">Name:<?=$data->email;?></p>
                        
                       </div>
                     </div>
                    </div>
                  </div>
                   <div class="card">
                     <div class="card-body">
     
                <form id="sell_payForm">
                          <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                            <label for="payment_date">date </label>
                            <input type="text" hidden name="customer_id" value="<?=$data->id;?>">
                            <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Please select a date" autocomplete="off">
                          </div>
                            </div>
                            <div class="col-md-4">
                           <div class="form-group">
                              <label for="spay_amount">Amount</label>
                            <input type="number" class="form-control" id="spay_amount" name="pay_amount" value="<?=$data->total_due;?>">
                           </div>
                            </div>
                            <div class="col-md-4">
                           <div class="form-group">
                              <label for="spay_type">payment type</label>
                              <select name="pay_type" id="spay_type" class="form-control">
                                <?php 
                                  $all_pay_type = $obj->all('paymethode');
                                  foreach ($all_pay_type as $paymethode) {
                                    ?>
                                      <option value="<?=$paymethode->name?>"><?=$paymethode->name?></option>
                                    <?php 
                                  }
                                 ?>
                              </select>
                           </div>
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="pay_descrip">Description </label>
                            <textarea  rows="3" class="form-control" id="pay_descrip" name="pay_descrip"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0">Pay now</button>
                          </div>
                        </form>

        
         </div>
                  </div>
                 </div>
                       <?php 
            }else{
          header("location:index.php?page=member");
        }
      }else{
        header("location:index.php?page=member");
      }
       ?>
               </div>
            </div>
            <!-- /.card-body -->
            <!-- /.row -->
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper
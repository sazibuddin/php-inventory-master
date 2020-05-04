<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-3">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">new sell</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">

              <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="">Make a sell here</h5>
                </div>
                <div class="card-body">

                  <form id="sellForm" onsubmit=" return false">
                    <div class="order-header">
                   <div class="row">
                     <div class="col-md-6 col-lg-6 d-flex justify-content-start">
                            <div class="form-group" style="width: 70%;">
                      <label for="customer-name">Customer name</label>
                      <select name="customer_name" id="customer_name" class="form-control select2">
                        <option selected disabled>Select a customer</option>
                        <?php 
                          $all_customer = $obj->all('member');

                          foreach ($all_customer as $customer) {
                            ?>
                              <option value="<?=$customer->id;?>"><?=$customer->name;?></option>
                            <?php 
                          }
                         ?>
                      </select>
                    </div>
                          <div class="form-group" style="margin-top: 30px;margin-left: 10px;">
                            <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target=".myModal"><i class="fas fa-plus"></i> customer</button>
                          </div>
                        </div>
                     <div class="col-md-6 col-lg-6">
                      <label for="orderdate">Order date</label>
                       <input type="text" class="form-control datepicker" name="orderdate" id="orderdate" autocomplete="off">
                     </div>
                   </div>
                  </div>
                 <div class="card p-4" style="background: #f1eaea40">
                    <table>
                      <thead>
                        <th>#</th>
                        <th>Product</th>
                        <th>Total qunatity</th>
                        <th>Price</th>
                        <th>order qunatity</th>
                        <th>Total Price</th>
                        <th>Product name</th>
                        <th>Action</th>
                      </thead>
                    <tbody id="invoiceItem">
                      <!-- invoice item will show here by ajax  -->
                    </tbody>
                  </table>
                  <div class="form-group text-right mt-3">
                    <button type="button" class="btn btn-primary pl-5 pr-5" id="addNewRowBtn">Add</button>
                  </div>
                 </div>
                 <div class="invoice-area card pt-3" style="background: #f1eaea40">
                  <div class="row">
                    <div class="com-md-8 offset-md-2 col-lg-8 offset-lg-2">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="subtotal">Subtoal</label>
                          </div> 
                          <div class="col-md-8">
                            <input type="number" class="form-control form-control-sm" name="subtotal" id="subtotal"></div>  
                        </div>
                     </div>
                     <input type="number" hidden="" class="form-control form-control-sm" name="s_discount_amount" id="s_discount_amount">
                     <input type="number" hidden="" class="form-control form-control-sm" name="discount" id="discount">
                     <!-- <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="discount">Discount %</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" class="form-control form-control-sm" name="discount" id="discount"></div>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="s_discount_amount">Discount amount</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" class="form-control form-control-sm" name="s_discount_amount" id="s_discount_amount">
                        </div>
                       </div>
                     </div> -->
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="prev_due">previous total due</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" class="form-control form-control-sm" name="prev_due" id="prev_due">
                         </div>
                       </div>
                     </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="netTotal">Net Total</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" class="form-control form-control-sm" name="netTotal" id="netTotal">
                         </div>
                       </div>
                     </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="paidBill">Paid bill</label>
                          </div>
                          <div class="col-md-8">
                         <input type="number" class="form-control form-control-sm" name="paidBill" id="paidBill">
                       </div>
                        </div>
                      </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="dueBill">Due bill</label>
                         </div>
                         <div class="col-md-8">
                           <input type="text" class="form-control form-control-sm" name="dueBill" id="dueBill">
                         </div>
                       </div>
                       
                     </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="payMethode">Payment Methode</label>
                         </div>
                         <div class="col-md-8">
                            <select name="payMethode" id="payMethode" class="form-control form-control-sm select2">
                             <option selected disabled>Select a payment methode</option>
                              <?php 
                              $all_methode = $obj->all('paymethode');
                                foreach ($all_methode as $payMethode) {
                                  ?>  
                                    <option value="<?=$payMethode->name;?>"><?=$payMethode->name;?></option>
                                  <?php 
                                }?>
                       </select>
                         </div>
                       </div>
                     </div>
                     <div class="form-group text-center">
                       <button type="submit" class="btn btn-success btn-block" id="sellBtn">Make sell</button>
                     </div>
                    </div>
                  </div>
                 </div>
                  </form>
                </div>
              </div>
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper
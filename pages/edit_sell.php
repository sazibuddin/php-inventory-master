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

  <?php 
    if (isset($_GET['edit_id']) ) {
       $edit_id = $_GET['edit_id'];
       $sell_data = $obj->find('invoice' , 'id',$edit_id);
       $all_invoice_detils_res = $obj->findWhere('invoice_details' , 'invoice_no',$edit_id);
       if ($sell_data) {
         ?>
        <div class="card-header">
          <p>Invoice number : <?=$sell_data->invoice_number;?></p>
        </div>
           <div class="card-body">

                  <form id="editSellForm" onsubmit=" return false">
                    <div class="order-header">
                   <div class="row">
                     <div class="col-md-6 col-lg-6">
                            <div class="form-group" >
                      <label for="customer-name">Customer name</label>
                      <select name="customer_name" id="customer_name" class="form-control select2">
                           <?php 

                          $all_customer = $obj->all('member');
                          $select_val = $sell_data->customer_id;

                          foreach ($all_customer as $customer) {
                          if ($select_val == $customer->id) {
                            $selected = 'selected';
                          }else{
                             $selected = '';
                          }
                          ?>  
                        <option <?php echo $selected;?> value="<?=$customer->id;?>"><?=$customer->name;?></option>
                      <?php 
                    }?>
                      </select>
                    </div>
                         
                        </div>
                     <div class="col-md-6 col-lg-6">
                      <label for="orderdate">Order date</label>
                       <input type="text" class="form-control datepicker" name="orderdate" id="orderdate" autocomplete="off" value="<?=$sell_data->order_date;?>">
                       <input type="text" hidden name="invoice_id" value="<?=$sell_data->id;?>">
                     </div>
                   </div>
                  </div>
                 <div class="card p-4" style="background: #f1eaea40">
                    <table>
                      <thead>
                        <th>#</th>
                        <th>Product</th>
                        <th>previous order qty</th>
                        <th>Price</th>
                        <th>order qunatity</th>
                        <th>Total Price</th>
                        <th>Product name</th>
                        <th>Action</th>
                      </thead>
                    <tbody id="editInvoiceItem">
                      <!-- invoice item will show here by ajax  -->
            <?php 
                foreach ($all_invoice_detils_res as $all_invoice_res) {
                  ?>
                    <input type="text" hidden name="up_pid[]" value="<?=$all_invoice_res->pid;?>">
                   <input type="number" hidden name="up_quantity[]" value="<?=$all_invoice_res->quantity;?>">
                    <tr>
        <td><b class="si_number">1</b></td>
                      <td>
                        <input type="text" class="form-control form-control-sm pid" readonly id="product_name" name="pid[]" value="<?=$all_invoice_res->pid;?>">
                    </td>
                      <td>
                        <input type="text" class="form-control form-control-sm qaty" placeholder="previous order Qty" name="prev_order_qty[]" id="prev_order_quantity" readonly value="50">
                      </td>
                      <td>
                        <input type="number" class="form-control form-control-sm price" placeholder="Price" name="price[]" id="price" value="<?=$all_invoice_res->price / $all_invoice_res->quantity ;?>">
                      </td>
                      <td>
                        <input type="number" class="form-control form-control-sm oqty" placeholder="Order Quantity" name="orderQuantity[]" value="<?=$all_invoice_res->quantity;?>">
                      </td>
                      <td>
                        <input type="number" class="form-control form-control-sm tprice" placeholder="Total Price" name="totalPrice[]" id="totalPrice" readonly value="<?=$all_invoice_res->price?>">
                      </td>
                      <td>
                        <input type="text" readonly class="form-control form-control-sm pro_name" name="pro_name[]" id="pro_name" value="<?=$all_invoice_res->product_name?>">
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-sm pl-3 pr-3 cancelThisItem" id="cancelThisItem"><i class="fas fa-times"></i></button>
                      </td>
                    </tr>
                  <?php 
                }
             ?>
                       
           
                    </tbody>
                  </table>
                  <div class="form-group text-right mt-3">
                    <button type="button" class="btn btn-primary pl-5 pr-5" id="EditaddNewRowBtn">Add</button>
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
                            <input type="number" class="form-control form-control-sm" name="subtotal" id="subtotal" value="<?=$sell_data->sub_total;?>"></div>  
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
                          <input type="number" class="form-control form-control-sm" name="prev_due" id="prev_due" value="<?=$sell_data->pre_cus_due;?>">
                         </div>
                       </div>
                     </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="netTotal">Net Total</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" class="form-control form-control-sm" name="netTotal" id="netTotal" value="<?=$sell_data->net_total;?>">
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
                       <button type="submit" class="btn btn-success btn-block" id="editSellBtn">Edit sell</button>
                     </div>
                    </div>
                  </div>
                 </div>
                  </form>
                </div> 

         <?php 
       }else{
        ?>
            <div class="alert alert-danger">No data found for edit</div>
        <?php 
       }
    }
   ?>
               
              </div>
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper
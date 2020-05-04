<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
 <!-- Main content -->
          <section class="content mt-5">
            <div class="container-fluid">
             <div class="card-header">
                <h3 class="card-title mt-3">Buy Product</h3>
              </div>
              <!-- /.card-header -->
               <div class="row">
                 <div class="col-md-12 col-lg-12 mt-3">
                   <div class="card">
                <form id="addByproductForm">

                <div class="card-header">
                   <div class="row">
                    <div class="col-md-6 col-lg-6">
                      <div class="row">
                        <div class="col-md-9">
                           <div class="form-group">
                      <label for="p_supliar">suppliar name *</label>
                      <select name="p_supliar" id="p_supliar" class="form-control  select2">
                        <option selected disabled>Select a Suppliar </option>
                        <?php 
                          $all_supplier = $obj->all('suppliar');
                          foreach ($all_supplier as $supplier) {
                            ?>
                             <option value="<?=$supplier->id?>"><?=$supplier->name?></option>

                            <?php 
                          }
                         ?>
                      </select>
                    </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group" style="margin-top: 30px;">
                            <label for=""></label>
                            <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target=".suppliarModal"><i class="fas fa-plus"></i> Add new</button>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <label for="puchar_date">Purchase date *</label>
                      <div class="form-group">
                        <input type="text" class="form-control datepicker" name="puchar_date" id="puchar_date">
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-10 col-lg-10">
                        <div class="form-group">
                      <label for="p_product_name">purchas product *</label>
                      <select name="p_product_name" id="p_product_name" class="form-control form-control-sm select2">
                        <option selected disabled>Select a product </option>
                        <?php 
                          $all_product = $obj->all('products');
                          foreach ($all_product as $product) {
                            ?>
                              <option value="<?=$product->id?>"><?=$product->product_name?> (<?=$product->brand_name;?>)</option>
                            <?php 
                          }
                         ?>
                      </select>
                    </div>
                      </div>
                      <div class="col-md-2 col-lg-2">
                        <a href="index.php?page=add_product" target="_blank" class="btn btn-success rounded-0" style="margin-top: 30px;">Add new prodcut</a>
                      </div>
                    </div>
                    <div class="row">
                    <div class="cl-md-3 col-lg-3">
                       <div class="form-group">
                      <label for="p_p_quantity">Stock Quantity *</label>
                      <input type="number" class="form-control" id="p_p_quantity" name="p_p_quantity" placeholder="stock quantity" readonly>
                      </div>
                      </div>
                        <div class="cl-md-3 col-lg-3">
                      <div class="form-group">
                      <label for="p_p_price">Buy price *</label>
                      <input type="number" class="form-control" id="p_p_price" name="p_p_price" placeholder="Purchase price">
                      </div>
                      </div>
                       <div class="cl-md-3 col-lg-3">
                       <div class="form-group">
                      <label for="p_pn_quantity">Purchase quantity *</label>
                      <input type="number" class="form-control" id="p_pn_quantity" name="p_pn_quantity" placeholder="Purchase quantity">
                      </div>
                      </div>
                  
                    <div class="cl-md-3 col-lg-3">
                      <div class="form-group">
                      <label for="p_p_sell_price">Sell price *</label>
                      <input type="number" class="form-control" id="p_p_sell_price" name="p_p_sell_price" placeholder="Sell price">
                      </div>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                 <div class="row">
                   <div class="col-md-10 offset-md-1">
                      <div class="card" style="background: #f1eaea40;">
                    <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="p_subtotal">Subtoal</label>
                          </div> 
                          <div class="col-md-8">
                            <input type="number" class="form-control form-control-sm" name="p_subtotal" id="p_subtotal"></div>  
                        </div>
                     </div>
                     <!-- <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_discount">Discount %</label>
                         </div>
                         <div class="col-md-8"><input type="number" class="form-control form-control-sm" name="p_discount" id="p_discount"></div>
                       </div>
                     </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_discount_amount">Discount amount</label>
                         </div>
                         <div class="col-md-8"><input type="number" class="form-control form-control-sm" name="p_discount_amount" id="p_discount_amount"></div>
                       </div>
                     </div> -->
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="supliar_prev_total_due">previous Total due</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" readonly class="form-control form-control-sm" name="supliar_prev_total_due" id="supliar_prev_total_due">
                         </div>
                       </div>
                     </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_netTotal">Net Total</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" readonly class="form-control form-control-sm" name="p_netTotal" id="p_netTotal">
                         </div>
                       </div>
                     </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="p_paidBill">Paid bill</label>
                          </div>
                          <div class="col-md-8">
                         <input type="number" class="form-control form-control-sm" name="p_paidBill" id="p_paidBill">
                       </div>
                        </div>
                      </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_dueBill">Due bill</label>
                         </div>
                         <div class="col-md-8">
                           <input type="number" readonly class="form-control form-control-sm" name="p_dueBill" id="p_dueBill">
                         </div>
                       </div>
                       
                     </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_payMethode">Payment Methode</label>
                         </div>
                         <div class="col-md-8">
                            <select name="p_payMethode" id="p_payMethode" class="form-control form-control-sm select2">
                             <option selected disabled>Select a payment methode</option>
                             <?php 

                        $all_methode = $obj->all('paymethode');

                      foreach ($all_methode as $payMethode) {
                      
                        ?>  
                          <option value="<?=$payMethode->name;?>"><?=$payMethode->name;?></option>
                        <?php 
                      }
                          
                         ?>
                       </select>
                         </div>
                       </div>
                     </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0" id="addByproductBtn">Purchase product </button>
                      </div>
                      </div>
                  </div>
                   </div>
                 </div>
                   
                </div>
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
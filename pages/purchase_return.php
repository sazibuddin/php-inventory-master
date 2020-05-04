<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
 <!-- Main content -->
          <section class="content mt-5">
            <div class="container-fluid">
             <div class="card-header">
                <h3 class="card-title mt-3">return purchase Product</h3>
              </div>
              <!-- /.card-header -->
               <div class="row">
                 <div class="col-md-12 col-lg-12 mt-3">
                   <div class="card">
			<?php 
				if (isset($_GET['return_id'])) {
					$return_id =  $edit_id = $_GET['return_id'];
					$purchase_data = $obj->find('purchase_products','id',$return_id);
          $return_staus = $purchase_data->return_status;

					if ($purchase_data) {
						if ($return_staus != 'return') {
              ?>
                 <form id="purchasereturnForm">
        <div class="card-header">
                   <div class="row">
                    <div class="col-md-6 col-lg-6">
                      <div class="form-group">
                      <label for="p_supliar">suppliar name *</label>
                      <select name="p_supliar" id="p_supliar" class="form-control  select2">
                        <option selected disabled>Select a Suppliar </option>
                        <?php 

                        $all_supplier = $obj->all('suppliar');
                      $select_val = $purchase_data->purchase_suppliar;

                      foreach ($all_supplier as $supplier) {
                      if ($select_val == $supplier->id) {
                        $selected = 'selected';
                      }else{
                         $selected = '';
                      }
                      ?>  
                        <option <?php echo $selected;?> value="<?=$supplier->id;?>"><?=$supplier->name;?></option>
                      <?php 
                    }
                          
                         ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <label for="return_date">return date *</label>
                      <div class="form-group">
                        <input type="text" class="form-control datepicker" name="return_date" id="return_date" autocomplete="off">
                        <input type="text" hidden name="return_id" value="<?php echo $edit_id; ?>">
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-10 col-lg-10">
                        <div class="form-group">
                      <label for="p_product_name">product *</label>
                      <input type="text" name="p_product_name" id="p_product_name" readonly class="form-control" value="<?=$purchase_data->product_name;?>">
                    </div>
                      </div>
                       <div class="col-md-2 col-lg-2">
                        <div class="form-group">
                          <input type="text" hidden name="product_id" value="<?=$purchase_data->product_id; ?>">
                        </div>
                       </div>
                    </div>
                    <div class="row">
                      <div class="cl-md-3 col-lg-3">
                       <div class="form-group">
                      <label for="p_p_quantity">Purchase quantity *</label>
                      <input type="number" class="form-control p_p_quantity" id="p_p_quantity" name="p_p_quantity" placeholder="Purchase quantity" readonly value="<?=$purchase_data->purchase_quantity;?>">

                      <input type="text" name="this_buy_qnty" hidden value="<?=$purchase_data->purchase_quantity;?>">
                      </div>
                      </div>
                       <div class="cl-md-3 col-lg-3">
                        <div class="form-group">
                        <label for="p_pn_quantity">return Quantity *</label>
                        <input type="number" class="form-control" id="p_pn_quantity" name="p_pn_quantity" value="0">
                        </div>
                      </div>
                    <div class="cl-md-3 col-lg-3">
                      <div class="form-group">
                      <label for="p_p_price">Product price *</label>
                      <input type="number" class="form-control" id="p_p_price" name="p_p_price" placeholder="Purchase price" value="<?=$purchase_data->purchase_price;?>">
                      </div>
                      </div>
                    <div class="cl-md-3 col-lg-3">
                      <div class="form-group">
                      <label for="p_p_sell_price">Sell price *</label>
                      <input type="number" class="form-control" id="p_p_sell_price" name="p_p_sell_price" placeholder="Sell price" value="<?=$purchase_data->purchase_sell_price;?>">
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
                            <input type="number" class="form-control form-control-sm" name="p_subtotal" id="p_subtotal" value="0.00">
                        </div>  
                        </div>
                     </div>
                     <input type="number" hidden class="form-control form-control-sm" name="p_discount" id="p_discount" value="0.00">
                     <input type="number" hidden class="form-control form-control-sm" name="p_discount_amount" id="p_discount_amount">
                    <!--  <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_discount">Discount %</label>
                         </div>
                         <div class="col-md-8"><input type="number" class="form-control form-control-sm" name="p_discount" id="p_discount" value="0.00">
                         </div>
                       </div>
                     </div>
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_discount_amount">Discount amount</label>
                         </div>
                         <div class="col-md-8"><input type="number" class="form-control form-control-sm" name="p_discount_amount" id="p_discount_amount">
                         </div>
                       </div>
                     </div> -->
                      <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="p_netTotal">Net Total</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" class="form-control form-control-sm" name="p_netTotal" id="p_netTotal" >
                         </div>
                       </div>
                     </div>
                      
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0" id="purchaserreturnBtn">return purchase product </button>
                      </div>
                      </div>
                  </div>
                   </div>
                 </div>
                   
                </div>
              </form>
              <?php 
            }else{
              echo "<div class='alert alert-danger'>"."Sorry This product already returned. you are not able to return this now"."</div>";
              ?>
                <a href="index.php?page=buy_refund_list" class="btn btn-primary rounded-0 ml-3 mr-3 mt-2 mb-3">View rerturn list</a>
              <?php 
            }
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
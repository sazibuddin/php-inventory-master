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
                    <h5 class="">return sell </h5>
                </div>
                <div class="card-body">
               
                
                  <?php 
                    if (isset($_GET['reurn_id']) ) {
                       $reurn_id = $_GET['reurn_id'];
                       $sell_data = $obj->find('invoice' , 'id',$reurn_id);
                       $return_status = $sell_data->return_status;
                    if ($return_status != 'return') {
                      ?>
    
                    <div class="card">
                  <div class="card-body">
                      <div class="row">
                       <div class="col-md-6 col-lg-6">
                         
                            <p class="m-0 p-0"><b><i>Sell information : </i></b></p>
                            <p class="m-0 p-0">customer name :<?=$sell_data->customer_name;?></p>
                            <p class="m-0 p-0">invoice ID :<?=$sell_data->invoice_number;?></p>
                            <p class="m-0 p-0">Order date :<?=$sell_data->order_date;?></p>
                            <p class="m-0 p-0"><b>Total price :<?=$sell_data->sub_total;?></b></p>
                        
                       </div>
                     </div>
                  </div>
              </div>
                  <form id="returnSell" onsubmit=" return false">
                    <div class="order-header">
                   <div class="row">
                     <div class="col-md-6 col-lg-6">
                          <input type="text" hidden=""   name="return_id" value="<?=$reurn_id;?>">
                          <input type="text" hidden=""   name="customer_id" value="<?=$sell_data->customer_id;?>">
                          <input type="text" hidden=""  name="customer_name" value="<?=$sell_data->customer_name;?>">    
                     </div>
                   
                   </div>
                  </div>
                 <div class="card p-4" style="background: #f1eaea40">
                    <table>
                      <thead>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Order qunatity</th>
                        <th>return qunatity</th>
                        <th>sell price</th>
                      </thead>
                    <tbody id="returnSellItem">
                      <?php 

                       $all_invoice_detils_res = $obj->findWhere('invoice_details' , 'invoice_no',$reurn_id);
                       foreach ($all_invoice_detils_res as $sell_row) {
                         ?>
                            <tr>
                        <td><b class="si_number">1</b></td>
                        <td>
                          <input type="text" readonly class="form-control form-control-sm pro_name" name="pro_name[]" id="pro_name" value="<?=$sell_row->product_name ?>">
                          <input type="text" hidden="" name="pid[]" class="form-control form-control-sm" value="<?=$sell_row->pid ?>">
                        </td>
                        <td><input type="text" class="form-control form-control-sm orderQty" placeholder="Order Quantity" name="orderQuantity[]" id="orderQuantity" readonly value="<?=$sell_row->quantity;?>"></td>
                          <td><input type="number" class="form-control form-control-sm returnQty" placeholder="Return Quantity" name="returnQty[]" value="0"></td>
                        <td><input type="number" class="form-control form-control-sm sellPrice" placeholder="Price" name="sellPrice[]" id="sellPrice" value="<?=$sell_row->price;?>"></td>
                      
                    </tr>
                    <?php 
                      }
                     ?>
                      
                    
                    </tbody>
                  </table>
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
                            <input type="number" class="form-control form-control-sm" name="return_subtotal" id="return_subtotal"></div>  
                        </div>
                     </div>
                  <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                           <label for="netTotal">Net Total</label>
                         </div>
                         <div class="col-md-8">
                          <input type="number" class="form-control form-control-sm" name="return_netTotal" id="nreturn_etTotal" >
                         </div>
                       </div>
                     </div>
                    <div class="form-group">
                       <div class="row">
                         <div class="col-md-3">
                      <label for="orderdate">Rerturn date</label>
                         </div>
                         <div class="col-md-8">
                         
                       <input type="text" class="form-control form-control-sm datepicker rounded-0" name="return_date" id="return_date" autocomplete="off">
                         </div>
                       </div>
                     </div>
                     
                     <div class="form-group text-center">
                       <button type="submit" class="btn btn-success btn-block" id="returnSellBtn">Return sell</button>
                     </div>
                    </div>
                  </div>
                 </div>
                  </form>
                      <?php 
                    }else{
                      ?>
                        <div class="alert alert-danger">This invoice products already returned. you are not able to return this now</div>
                        <a href="index.php?page=sell_return_list" class="btn btn-primary rounded-0">view rerturn list</a>
                      <?php 
                    }
                    }


                  ?>
                </div>
              </div>
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper
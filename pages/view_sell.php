<style>

@page {
  margin-top:  150px;
  margin-bottom:   100px;
}

  @media print {
body{
  font-size: 12px;
}
   .view_sell_payment_info {
    display: none;
}
.view_sell_button-area {
    display: none;
}
footer.main-footer {
    display: none;
}
.card.view_sell_page_info {
    margin-top: 100px;
}
}
</style>
<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
 <!-- Main content -->
          <section class="content mt-5">
            <div class="container-fluid">
              <div class="card view_sell_page_info">
                <div class="card-header">
                  Sell information
                </div>
                <div class="card-body">
         <?php 
            if (isset($_GET['view_id'])) {
             $view_id = $_GET['view_id'];
                $sell_total = $obj->find('invoice','id',$view_id);

               $customer = $sell_total->customer_id;
              $customer = $obj->find('member','id',$customer);
                if ($sell_total) {
                  ?>
                <div class="row">
                  <div class="col-md-4 col-lg-4">
                   <div class="purchase-suppliar-info">
                    <p><i><b>Customer</b></i></p>
                    <p><b>Name : <?=$customer->name;?></b></p>
                    <p> Company : <?=$customer->company;?></p> 
                    <p>Address : <?=$customer->address;?></p>
                    <p>Phone : <?=$customer->con_num;?></p>
                    <p>Email : <?=$customer->email;?></p>
                    <p>Supliar id : <?=$customer->member_id;?></p>
                   </div>
                  </div>
                  <div class="col-md-4 col-lg-4"></div>
                  <div class="col-md-4 col-lg-4">
                    <p>purchase date : <?=$sell_total->order_date; ?></p>
                    <p>Invoice no : <?=$sell_total->invoice_number; ?></p>
                  </div>
                </div> 

                 <table class="display dataTable text-center mt-4">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Product name</th>
                            <th>brand name</th>
                            <th>quantity</th>
                            <th>unit price</th>
                            <th>total price</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                         $invoice_id = $sell_total->id;
                            
                            
                            $all_product = $obj->findWhere('invoice_details','invoice_no', $invoice_id);
                            $i = 0;
                              foreach ($all_product as $products) {
                                $i++;
                                $pid = $products->pid;
                                $p_brand = $obj->find('products','id',$pid);
                                ?>
                                  <tr>
                                    <td><?=$i?></td>
                                    <td><?=$products->product_name?></td>
                                    <td><?=$p_brand->brand_name?></td>
                                    <td><?=$products->quantity?></td>
                                    <td><?=$products->price / $products->quantity?></td>
                                    <td><?=$products->price?></td>
                                  </tr>
                                <?php 
                              }
                          ?>  
                        </tbody>
                      </table>

                        <hr>
                      <div class="row">
                        <div class="col-md-8 col-lg-8">
                         <div class="view_sell_payment_info">
                            <h4 class="mt-4">Payments Information :</h4>
                          <table class="table table-bordered text-center">
                            <thead class="bg-info">
                              <th>#</th>
                              <th>Date</th>
                              <th>Payment type</th>
                              <th>Payment note</th>
                              <th>Payment amount</th>
                            </thead>
                            <tbody>
                              <?php 
                                $all_payment = $obj->findWhere('sell_payment','customer_id', $customer->id);
                                $i=0;
                                foreach ($all_payment as $payment) {
                                  $i++;
                                  ?>
                                    <tr>
                                      <th><?=$i;?></th>
                                      <th><?=$payment->payment_date;?></th>
                                      <th><?=$payment->payment_type;?></th>
                                      <th><?=$payment->pay_description;?></th>
                                      <th><?=$payment->payment_amount;?></th>
                                    </tr>
                                  <?php 
                                }
                               ?>
                            </tbody>
                          </table>
                         </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                          <div class="pruchase-view-description">
                            <table class="table">
                            <tr>
                              <td>Sebtotal</td>
                              <td>:</td>
                              <td><?=$sell_total->sub_total;?></td>
                            </tr>
                            <tr>
                              <td>Previous due</td>
                              <td>:</td>
                              <td><?=$sell_total->pre_cus_due;?></td>
                            </tr>
                            <tr>
                              <td>Net total</td>
                              <td>:</td>
                              <td><?=$sell_total->net_total;?></td>
                            </tr>
                            <tr>
                              <td>paid amount</td>
                              <td>:</td>
                              <td><?=$sell_total->paid_amount;?></td>
                            </tr>
                            <tr>
                              <td>due amount</td>
                              <td>:</td>
                              <td><?=$sell_total->due_amount;?></td>
                            </tr>
                          </table>
                          </div>
                        </div>
                      </div>

           <div class="view_sell_button-area">
             <div class="btn-group" role="group" aria-label="Basic example">
            <a href="index.php?page=return_sell&&reurn_id=<?=$sell_total->id;?>" class="btn btn-info rounded-0 ml-2"><i class="fas fa-reply-all"></i> Return Sell</a>
            <a href="index.php?page=edit_sell&&edit_id=<?=$sell_total->id;?>"" class="btn btn-success rounded-0 ml-2"><i class="fas fa-edit"></i> Edit Sell</a>
            <button type="button" onclick="window.print()" class="btn btn-primary ml-2"><i class="fas fa-file-pdf"></i> Print</button>
          </div>
           </div>
                  <?php  
                }
              }
          ?>
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
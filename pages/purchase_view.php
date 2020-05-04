<style>

@page {
  margin-top:  150px;
  margin-bottom:   100px;
}

  @media print {
body{
  font-size: 12px;
}
   .purchase_view_payment {
    display: none;
}
.purchase_view_btn {
    display: none;
}
footer.main-footer {
    display: none;
}
/*.card.view_sell_page_info {
    margin-top: 100px;
}*/
}
</style>

<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
 <!-- Main content -->
          <section class="content mt-5">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  Purchase information
                </div>
                <div class="card-body">
         <?php 
            if (isset($_GET['view_id'])) {
              $purchase_id = $_GET['view_id'];
              $purchase_total = $obj->find('purchase_products','id',$purchase_id);
              $purchase_suppliar = $purchase_total->purchase_suppliar;
              $purchase_suppliar_info = $obj->find('suppliar','id',$purchase_suppliar);
              ?>
                <div class="row">
                  <div class="col-md-4 col-lg-4">
                   <div class="purchase-suppliar-info">
                      <p><i>suppliar</i></p>
                    <p><b>Name : <?=$purchase_suppliar_info->name;?></b></p>
                    <p> Company : <?=$purchase_suppliar_info->company;?></p> 
                    <p">Address : <?=$purchase_suppliar_info->address;?></p>
                    <p">Phone : <?=$purchase_suppliar_info->con_num;?></p>
                    <p">Email : <?=$purchase_suppliar_info->email;?></p>
                    <p">Supliar id : <?=$purchase_suppliar_info->suppliar_id;?></p>
                   </div>
                  </div>
                  <div class="col-md-4 col-lg-4"></div>
                  <div class="col-md-4 col-lg-4">
                    <p>purchase date : <?=$purchase_total->purchase_date; ?></p>
                  </div>
                </div>

                 <table class="display dataTable text-center mt-4">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Product name</th>
                            <th>quantity</th>
                            <th>purchase price</th>
                            <th>subtotal total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td><?=$purchase_total->product_name;?></td>
                            <td><?=$purchase_total->purchase_quantity;?></td>
                            <td><?=$purchase_total->purchase_price;?></td>
                            <td><?=$purchase_total->purchase_subtotal;?></td>
                          </tr>
                        </tbody>
                      </table>

                        <hr>
                      <div class="row">
                        <div class="col-md-8 col-lg-8">
                        <div class="purchase_view_payment">
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
                                $all_payment = $obj->findWhere('purchase_payment','suppliar_id', $purchase_suppliar_info->id);
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
                              <td><?=$purchase_total->purchase_subtotal;?></td>
                            </tr>
                             <tr>
                              <td>previous due</td>
                              <td>:</td>
                              <td><?=$purchase_total->prev_total_due;?></td>
                            </tr>
                             <tr>
                              <td>Net total</td>
                              <td>:</td>
                              <td><?=$purchase_total->purchase_net_total;?></td>
                            </tr>
                            <tr>
                              <td>paid amount</td>
                              <td>:</td>
                              <td><?=$purchase_total->purchase_paid_bill;?></td>
                            </tr>
                            <tr>
                              <td>due amount</td>
                              <td>:</td>
                              <td><?=$purchase_total->purchase_due_bill;?></td>
                            </tr>
                          </table>
                          </div>
                        </div>
                      </div>

             <div class="purchase_view_btn">
               <div class="btn-group" role="group" aria-label="Basic example">
            <!--   <a href="index.php?page=purchase_edit&&edit_id=<?=$purchase_id;?>" class="btn btn-success rounded-0"><i class="fas fa-edit"></i>Edit</a> -->
              <a href="index.php?page=purchase_return&&return_id=<?=$purchase_total->id?>" class="btn btn-danger rounded-0 ml-2"><i class="fas fa-reply-all"></i> Return</a>
              <button type="button" onclick="window.print()" class="btn btn-primary ml-2"><i class="fas fa-file-pdf"></i> Print</button>
            </div>
             </div>

              <?php 


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
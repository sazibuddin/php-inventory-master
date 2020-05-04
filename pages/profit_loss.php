<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header mt-5">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Profit and loss report </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profit and loss report</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
               <div class="row">
                 <div class="col-md-6 col-lg-6">
                   <div class="card">
                     <div class="card-body">
                       <table class="table">
                        <tr>
                          <td class="text-info" colspan="2">Purchase</td>
                        </tr>
                         <tr>
                           <td >Total Purchase</td>
                           <td class="text-right">
                              <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`purchase_subtotal`) FROM `purchase_products`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $total_purchase =  $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td>Paid Payment</td>
                           <td class="text-right">
                    <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`payment_amount`) FROM `purchase_payment`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td>Purchase due</td>
                           <td class="text-right">
                  <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`total_due`) FROM `suppliar`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td>Purchase Return</td>
                           <td class="text-right">
                 <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`netTotal`) FROM `purchase_return`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $total_return =  $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td><b>Gross Purchase</b></td>
                           <td class="text-right"><b><?php echo $total_purchase - $total_return ; ?></b></td>
                         </tr>
                       </table>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6 col-lg-6">
                   <div class="card">
                   <div class="card-body">
                      <table class="table">
                        <tr>
                          <td class="text-info" colspan="2">Sales</td>
                        </tr>
                         <tr>
                           <td >Total sell</td>
                           <td class="text-right">
                              <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`sub_total`) FROM `invoice`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $total_sell_amount =  $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td>Paid Payment</td>
                           <td class="text-right">
                                        <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`payment_amount`) FROM `sell_payment`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo   $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td>sell due</td>
                           <td class="text-right">
                   <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`total_due`) FROM `member`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo   $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td>sell Return</td>
                           <td class="text-right">
                              <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`amount`) FROM `sell_return`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $total_sell_return =  $total_return =  $res[0];
                  ?>
                           </td>
                         </tr>
                         <tr>
                           <td><b>Gross Sells</b></td>
                           <td class="text-right"><b><?php echo $total_sell_amount - $total_sell_return; ?></b></td>
                         </tr>
                       </table>
                   </div>
                 </div>
                 </div>
               </div>
            </div>
          </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper
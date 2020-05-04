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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="min-height:80vh;">
      <div class="container-fluid">
        <!-- .row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total customer</span>
                <span class="info-box-number">
                  <?php 
                    echo $all_customer = $obj->total_count('member');
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Suppliers</span>
                <span class="info-box-number"> 
                  <?php 
                    echo $all_customer = $obj->total_count('suppliar');
                  ?>
                  </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-align-right"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total sells</span>
                <span class="info-box-number"> 
                    
                          <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`sub_total`) FROM `invoice`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $total_sell_amount =  $res[0];
                  ?>
                  </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-align-right"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total purchase</span>
                <span class="info-box-number"> 
                         <?php  
                      $stmt = $pdo->prepare("SELECT SUM(`purchase_subtotal`) FROM `purchase_products`");
                      $stmt->execute();
                      $res = $stmt->fetch(PDO::FETCH_NUM);
                      echo $total_purchase =  $res[0];
                  ?>
                  </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending orders</span>
                <span class="info-box-number">760</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Incomplete Orders</span>
                <span class="info-box-number">2,000</span>
              </div>
            </div>
          </div> -->
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box bg-warning">
              <div class="info-box-content  text-center text-white">
                <h2 class="info-box-text">Today</h2>
                <span class="sell">Sell:
                    <?php 
                      $today = date('Y-m-d');
                        $stmt = $pdo->prepare("SELECT SUM(`net_total`) FROM `invoice` WHERE `order_date` = '$today'");
                        $stmt->execute();
                        $res = $stmt->fetch(PDO::FETCH_NUM);
                        echo $res[0];

                        ?>
                    
                </span><br>
                <span class="buy">Buy:
                    <?php 
                      $today = date('Y-m-d');
                        $stmt = $pdo->prepare("SELECT SUM(`purchase_net_total`) FROM `purchase_products` WHERE `purchase_date` = '$today'");
                        $stmt->execute();
                        $res = $stmt->fetch(PDO::FETCH_NUM);
                        echo $res[0];

                        ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box bg-primary">
              <div class="info-box-content  text-center">
                <h2 class="info-box-text">Monthly</h2>
                <span class="sell">Sell:
                  <?php 
                      $start_data = date('Y-m-01-');
                      $end_date =   date('Y-m-t');
                        $stmt = $pdo->prepare("SELECT SUM(`net_total`) FROM `invoice` WHERE `order_date` BETWEEN '$start_data' AND  '$end_date' ");
                        $stmt->execute();
                        $res = $stmt->fetch(PDO::FETCH_NUM);
                        echo $res[0];

                        ?>
                 </span><br>
                <span class="buy">Buy:
                  <?php 
                       $start_data = date('Y-m-01-');
                      $end_date =   date('Y-m-t');
                        $stmt = $pdo->prepare("SELECT SUM(`purchase_net_total`) FROM `purchase_products` WHERE `purchase_date` BETWEEN '$start_data' AND  '$end_date'");
                        $stmt->execute();
                        $res = $stmt->fetch(PDO::FETCH_NUM);
                        echo $res[0];

                        ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-6 col-lg-6">
             <div class="card">
              <div class="card-header">
                <b>Factory product stock Alert</b>
              </div>
              <div class="card-body">
                <div class="responsive">
                  <table class="display dataTable text-center">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>name</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $stmt = $pdo->prepare("SELECT * FROM `factory_products` WHERE `quantity` <= `alert_quantity` ; ");
                          $stmt->execute();
                          $res = $stmt->fetchAll(PDO::FETCH_OBJ);
                          foreach ($res as $product) {
                              ?>
                              <tr>
                                <td>1</td>
                                <td><?=$product->product_id;?></td>
                                <td><?=$product->product_name;?></td>
                                <td><?=$product->quantity;?></td>
                              </tr>
                              <?php 
                          }
                          ?>
                     </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <b>Stock Alert</b>
              </div>
              <div class="card-body">
                <div class="responsive">
                  <table class="display dataTable text-center">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>name</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $stmt = $pdo->prepare("SELECT * FROM `products` WHERE `quantity` <= `alert_quanttity` ; ");
                          $stmt->execute();
                          $res = $stmt->fetchAll(PDO::FETCH_OBJ);

                          
                         
                          foreach ($res as $product) {
                              ?>
                              <tr>
                                <td>1</td>
                                <td><?=$product->product_id;?></td>
                                <td><?=$product->product_name;?></td>
                                <td><?=$product->quantity;?></td>
                              </tr>
                              <?php 
                          }
                         
                          

                        
                       ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
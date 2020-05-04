<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/images/Bismillah-Engeenearing-Logo (1).png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Bismillah ss</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php 
               $login_user = $_SESSION['user_id'];
               $login_user = $obj->find('user','id',$login_user);
               echo $login_user->username;
             ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="index.php?page=dashboard" class="nav-link <?php echo $actual_link=='dashboard'?'active':'';?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="index.php?page=member" class="nav-link <?php echo $actual_link=='member'?'active':'';?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="index.php?page=suppliar" class="nav-link <?php echo $actual_link=='suppliar'?'active':'';?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Suppliar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=category" class="nav-link <?php echo $actual_link=='category'?'active':'';?>">
              <i class="nav-icon fas fa-align-right"></i>
              <p>
                 Catagory
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php 
              if ($actual_link == 'add_product' || $actual_link =='product_list') {echo "active";
          }else{
            echo "";
          }
            ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                stock
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=add_product" class="nav-link <?php echo $actual_link=='add_product'?'active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=product_list" class="nav-link <?php echo $actual_link=='product_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>Products list</p>
                </a>
              </li>
             </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php 
              if ($actual_link == 'quick_sell' || $actual_link =='sell_list' || $actual_link =='sell_return_list') {echo "active";
          }else{
            echo "";
          }
            ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Sells
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=quick_sell" class="nav-link <?php echo $actual_link=='quick_sell'?'active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>new sell</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=sell_list" class="nav-link <?php echo $actual_link=='sell_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>Sell list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=sell_return_list" class="nav-link <?php echo $actual_link=='sell_return_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>Sell return list</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- expense sidebar menu -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php 
              if ($actual_link == 'add_expense' || $actual_link =='exspense_list' || $actual_link == 'expense_catagory_list') {echo "active";
          }else{
            echo "";
          }
            ?>">
              <i class="nav-icon fas fa-minus"></i>
              <p>
                Expense
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=add_expense" class="nav-link <?php echo $actual_link=='add_expense'?'active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>new expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=exspense_list" class="nav-link <?php echo $actual_link=='exspense_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>Expense list</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="index.php?page=expense_catagory_list" class="nav-link <?php echo $actual_link=='expense_catagory_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>Expense catagory list</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- buy sidebar  -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php 
              if ($actual_link == 'buy_product' || $actual_link =='buy_list' || $actual_link == 'buy_refund_list') {echo "active";
          }else{
            echo "";
          }
            ?>">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Buy
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=buy_product" class="nav-link <?php echo $actual_link=='buy_product'?'active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>new buy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=buy_list" class="nav-link <?php echo $actual_link=='buy_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>buy list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=buy_refund_list" class="nav-link <?php echo $actual_link=='buy_refund_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>refund buy list</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- buy sidebar  -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php 
              if ($actual_link == 'add_stuff' || $actual_link =='staff_list') {echo "active";
          }else{
            echo "";
          }
            ?>">
               <i class="nav-icon fas fa-users"></i>
              <p>
                Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=add_stuff" class="nav-link <?php echo $actual_link=='add_stuff'?'active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=staff_list" class="nav-link <?php echo $actual_link=='staff_list'?'active':'';?>">
                  <i class="fas fa-align-justify nav-icon"></i>
                  <p>Staff list</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- sms send option -->
            <li class="nav-item">
            <a href="index.php?page=sms" class="nav-link <?php echo $actual_link=='sms'?'active':'';?>">
              <i class="nav-icon fas fa-sms"></i>
              <p>
                 sms
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php 
              if ($actual_link == 'profit_loss' || $actual_link =='sales_report' || $actual_link =='purchase_report' || $actual_link =='purchase_pay_report' || $actual_link =='sell_pay_report') {echo "active";
          }else{
            echo "";
          }
            ?>">
               <i class="nav-icon fas fa-chart-bar"></i>
              <p>
               reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=profit_loss" class="nav-link <?php echo $actual_link=='profit_loss'?'active':'';?>">
                  <i class="far fa-copy nav-icon"></i>
                  <p>profit loss report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=sales_report" class="nav-link <?php echo $actual_link=='sales_report'?'active':'';?>">
                  <i class="far fa-copy nav-icon"></i>
                  <p>Sales report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=purchase_report" class="nav-link <?php echo $actual_link=='purchase_report'?'active':'';?>">
                   <i class="far fa-copy nav-icon"></i>
                  <p>Purchase report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=purchase_pay_report" class="nav-link <?php echo $actual_link=='purchase_pay_report'?'active':'';?>">
                   <i class="far fa-copy nav-icon"></i>
                  <p>Purchase payment report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=sell_pay_report" class="nav-link <?php echo $actual_link=='sell_pay_report'?'active':'';?>">
                   <i class="far fa-copy nav-icon"></i>
                  <p>Sell payment report</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php 
              if ($actual_link == 'backup_database') {echo "active";
          }else{
            echo "";
          }
            ?>">
               <i class="nav-icon fas fa-cogs"></i>
              <p>
                setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=backup_database" class="nav-link <?php echo $actual_link=='backup_database'?'active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup database</p>
                </a>
              </li>
             
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    </div>
    <?php require_once 'inc/member_add_modal.php'; ?>
    <?php require_once 'inc/catagory_modal.php'; ?>
    <?php require_once 'inc/suppliar_modal.php'; ?>
    <?php require_once 'inc/expense_catagory_modal.php'; ?>
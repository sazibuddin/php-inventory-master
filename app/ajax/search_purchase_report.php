<?php 
require_once '../init.php';
	if (isset($_POST) && !empty($_POST)) {
		 $issueData = $_POST['issuedate'];
		 $customer = $_POST['customer'];


		$data = explode('-', $issueData);
	  $issu_first_date = $obj->convertDateMysql($data[0]);
		$issu_end_date = $obj->convertDateMysql($data[1]);

      if ($customer == 'all') {
    $stmt = $pdo->prepare("SELECT * FROM `purchase_products` WHERE `purchase_date` BETWEEN '$issu_first_date' AND '$issu_end_date'");
    $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      if ($res) {
        ?>
          <?php 
          $i=0;
              foreach ($res as $data) {
                $i++;
                ?>
                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$data->id;?></td>
                    <td><?=$data->purchase_date;?></td>
                    <td><?=$data->purchase_suppliar;?></td>
                    <td><?=$data->suppliar_name;?></td>
                    <td><?=$data->purchase_net_total;?></td>
                    <td><?=$data->purchase_paid_bill;?></td>
                    <td><?=$data->purchase_due_bill;?></td>
                  </tr>
                <?php 
              }
           ?>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th>Total : </th>
          <th> 
            <?php  
                $stmt = $pdo->prepare("SELECT SUM(`purchase_subtotal`) FROM `purchase_products` WHERE `purchase_date` BETWEEN '$issu_first_date' AND '$issu_end_date' ");
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_NUM);
                echo $res[0];
            ?>
              
            </th>
          <th>
             <?php  
                $stmt = $pdo->prepare("SELECT SUM(`purchase_net_total`) FROM `purchase_products` WHERE `purchase_date` BETWEEN '$issu_first_date' AND '$issu_end_date' ");
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_NUM);
                echo $res[0];
            ?>
          </th>
          <th>
             <?php  
                $stmt = $pdo->prepare("SELECT SUM(`purchase_due_bill`) FROM `purchase_products` WHERE `purchase_date` BETWEEN '$issu_first_date' AND '$issu_end_date' ");
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_NUM);
                echo $res[0];
            ?>
          </th>
        </tr>
        <?php 
      }else{
         echo "no data found"; 
      }
  }else{
    $stmt = $pdo->prepare("SELECT * FROM `purchase_products` WHERE `purchase_date` BETWEEN '$issu_first_date' AND '$issu_end_date' AND `purchase_suppliar` = $customer");
    $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);

       if ($res) {
        ?>
          <?php 
          $i=0;
               foreach ($res as $data) {
                $i++;
                ?>
                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$data->id;?></td>
                    <td><?=$data->purchase_date;?></td>
                    <td><?=$data->purchase_suppliar;?></td>
                    <td><?=$data->suppliar_name;?></td>
                    <td><?=$data->purchase_net_total;?></td>
                    <td><?=$data->purchase_paid_bill;?></td>
                    <td><?=$data->purchase_due_bill;?></td>
                  </tr>
                <?php 
              }
           ?>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th>Total : </th>
          <th>
             <?php  
                $stmt = $pdo->prepare("SELECT SUM(`purchase_subtotal`) FROM `purchase_products` WHERE `order_date` BETWEEN '$issu_first_date' AND '$issu_end_date' AND `customer_id` = $customer");
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_NUM);
                echo $res[0];
            ?>
          </th>
          <th>
            <?php  
                $stmt = $pdo->prepare("SELECT SUM(`purchase_due_bill`) FROM `purchase_products` WHERE `order_date` BETWEEN '$issu_first_date' AND '$issu_end_date' AND `customer_id` = $customer");
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_NUM);
                echo $res[0];
            ?>
          </th>
          <th>
             <?php  
                $stmt = $pdo->prepare("SELECT SUM(`purchase_due_bill`) FROM `purchase_products` WHERE `order_date` BETWEEN '$issu_first_date' AND '$issu_end_date' AND `customer_id` = $customer");
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_NUM);
                echo $res[0];
            ?>
          </th>
        </tr>
        <?php 
      }else{
         echo "<p class='pt-1' style='text-align:center;'>"."no data found"."</p>"; 
      }
  }


	   


	}
 ?>
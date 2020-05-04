<?php

/**
 * the user class
 */
class Objects {
	protected $pdo;

	// construct $pdo
	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	// prevent sql injection
	public function escape($var) {
		$var = trim($var);
		$var = htmlspecialchars($var);
		$var = stripcslashes($var);
		return $var;
	}


	public function create($table, $fields = array()) {
		$columns = implode(',', array_keys($fields));
		$values = ":" . implode(', :', array_keys($fields));
		$sql = "INSERT INTO {$table}({$columns}) VALUES($values)";

		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $data) {
				$stmt->bindValue(":" . $key, $data);
			}

			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}

	public function update($table, $colum_name, $id, $fields = array()) {
		$columns = '';

		$i = 1;
		foreach ($fields as $name => $value) {
			$columns .= "{$name} = :{$name}";
			if ($i < count($fields)) {
				$columns .= ', ';
			}
			$i++;
		}

		$sql = "UPDATE {$table} SET {$columns} WHERE {$colum_name} = {$id}";
		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $value) {
				$stmt->bindValue(":" . $key, $value);
			}
			$stmt->execute();
			return $stmt->rowCount();
		}

	} // end of update

	public function delete($table, $array) {
		$sql = "DELETE FROM {$table}";
		$where = " WHERE ";
		foreach ($array as $key => $value) {
			$sql .= "{$where} {$key} = :{$key}";
			$where = " AND ";
		}
		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($array as $key => $value) {
				$stmt->bindValue(":" . $key, $value);
			}
			$stmt->execute();
		}
	}



// find all data from table
	public function all($table) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . "");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	// find a specific data
	public function find($table,$column,$value) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = :value LIMIT 1");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	// findWhere
	public function findWhere($table,$column,$value) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = :value ORDER BY id DESC");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


// Count row form table
	public function total_count($table) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " ");
		$stmt->execute();
		$stmt->fetchAll(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();
		return $count;
	}

	public function shortSummery($content,$len)
	{
		$content =  substr($content, 0, $len);
		return $content .= "....";
	}



	public function uploadImage($file,$folderPath)
	{
		$fileName = basename($file['name']);
		$fileTmp  = $file['tmp_name'];
		$fileSize  = $file['size'];
		$error  = $file['error'];

		$ext = explode(".", $fileName);
		$ext = strtolower(end($ext));

		$allowedExt = array('jpg','png','jpeg');

		if (in_array($ext, $allowedExt) === true)
		{
			if ($fileSize <= ( 1024 * 2 ) * 1024)
			{
				$fileRoot = 'img_' . time() . '_' . $fileName;
				move_uploaded_file($fileTmp, $_SERVER["DOCUMENT_ROOT"] . '/client/fiver/drive/admin/upload/' . $folderPath . '/' . $fileRoot);
				return $fileRoot;

			}else{
				$GLOBALS['imageError'] = "This file size is too large";
			}
		}else{
			$GLOBALS['imageError'] = "This file type is not allowed";
		}
	}

	// display the message
	public function message(){
		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}

function convertDate($value=''){
	$originalDate = $value;
	$newDate = date("d M Y", strtotime($originalDate));
	return $newDate;
}

 function convertDateMysql($value=''){
	$originalDate = $value;
	$newDate = date("Y-m-d", strtotime($originalDate));
	return $newDate;
}

// sell invoice create fucntion
public function storeCustomerOrderInvoice($invoice_number,$customer_name ,$orderdate,$find_customer_name,$total_quantity,$orderQuantity,$price,$totalPrice,$pro_name,$pid,$subtotal,$discount,$prev_due,$netTotal,$paidBill,$dueBill,$payMethode ){
		
		$pre_stmt = $this->pdo->prepare("INSERT INTO `invoice`(`invoice_number`,`customer_id`,`customer_name`, `order_date`, `sub_total`, `discount`,`pre_cus_due`, `net_total`, `paid_amount`, `due_amount`, `payment_type`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

		$pre_stmt->bindParam(1,$invoice_number, PDO::PARAM_STR);
		$pre_stmt->bindParam(2,$customer_name, PDO::PARAM_INT);
		$pre_stmt->bindParam(3,$find_customer_name, PDO::PARAM_STR);
		$pre_stmt->bindParam(4,$orderdate, PDO::PARAM_STR);
		$pre_stmt->bindParam(5,$subtotal, PDO::PARAM_STR);
		$pre_stmt->bindParam(6,$discount, PDO::PARAM_STR);
		$pre_stmt->bindParam(7,$prev_due, PDO::PARAM_STR);
		$pre_stmt->bindParam(8,$netTotal, PDO::PARAM_STR);
		$pre_stmt->bindParam(9,$paidBill, PDO::PARAM_STR);
		$pre_stmt->bindParam(10,$dueBill, PDO::PARAM_STR);
		$pre_stmt->bindParam(11,$payMethode, PDO::PARAM_STR);
		$pre_stmt->execute() or die("failed");
		$stmt = $this->pdo->query("SELECT LAST_INSERT_ID()");
		$invoice_no = $stmt->fetchColumn();

		if ($invoice_no != null) {
			for ($i=0; $i <count($price) ; $i++) { 
				// substract quantity
				$remain_quantity = $total_quantity[$i] - $orderQuantity[$i];
				if ($remain_quantity < 0) {
					return "Sorry ! you haven't the quantity";
				}else{
					$stmt = $this->pdo->prepare("UPDATE `products` SET `quantity`=$remain_quantity WHERE `id` = $pid[$i]");
					$stmt->bindParam(":value", $value);
					$stmt->execute();
				}

				$insert_product = $this->pdo->prepare("INSERT INTO `invoice_details`(`invoice_no`,`pid`, `product_name`, `price`, `quantity`) VALUES (?,?,?,?,?)");
				$insert_product->bindParam(1,$invoice_no,PDO::PARAM_INT);
				$insert_product->bindParam(2,$pid[$i],PDO::PARAM_INT);
				$insert_product->bindParam(3,$pro_name[$i],PDO::PARAM_STR);
				$insert_product->bindParam(4,$totalPrice[$i],PDO::PARAM_STR);
				$insert_product->bindParam(5,$orderQuantity[$i],PDO::PARAM_STR);
				$insert_product->execute();
			}
			// payment table update 
			
			$payment_query = array(
		    	'customer_id' => $customer_name,
		    	'payment_date' => $orderdate,
		    	'payment_amount' => $paidBill,
		    	'payment_type' => $payMethode,
		    	'added_by' => $_SESSION['user_id'],
			);
			$payment_res = $this->create('sell_payment',$payment_query);
			// find customer previous transition 
			$find_customer_stmt = $this->find('member','id',$customer_name);
			$prev_total_buy = $find_customer_stmt->total_buy;
			$prev_total_paid = $find_customer_stmt->total_paid;
			$new_total_buy = $prev_total_buy + $subtotal;
		    $new_total_paid = $prev_total_paid + $paidBill;

		    $member_update_query = array(
				'total_buy' => $new_total_buy,
				'total_paid' => $new_total_paid,
				'total_due' => $dueBill,
			);

			$suppliar_update_res = $this->update('member','id' , $customer_name,$member_update_query);
		

			return $invoice_no;
		}

}


} //end of class

?>

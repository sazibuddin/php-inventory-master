<?php 
	require_once '../init.php';
	if (isset($_POST['getSellSingleInfo'])) {
		$id = $_POST['id'];
		$res = $obj->find('products', 'id',$id);

		echo json_encode($res);
	}

 ?>
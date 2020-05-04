<?php
require_once '../init.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (sell_id LIKE :sell_id or 
        suppliar_name LIKE :suppliar_name OR 
        return_date LIKE :return_date OR 
        product_name  LIKE :product_name   OR 
        return_quantity LIKE :return_quantity ) ";
   $searchArray = array( 
        'sell_id'=>"%$searchValue%", 
        'suppliar_name'=>"%$searchValue%",
        'return_date'=>"%$searchValue%",
        'product_name'=>"%$searchValue%",
        'return_quantity'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $pdo->prepare("SELECT COUNT(*) AS allcount FROM purchase_return ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $pdo->prepare("SELECT COUNT(*) AS allcount FROM purchase_return WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $pdo->prepare("SELECT * FROM purchase_return WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
   $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach($empRecords as $row){
   $data[] = array(
      "id"=>$row['id'],
      "sell_id"=>$row['sell_id'],
      "suppliar_name"=>$row['suppliar_name'],
      "return_date"=>$row['return_date'],
      "product_name"=>$row['product_name'],
      "return_quantity"=>$row['return_quantity'],
      "subtotal"=>$row['subtotal'],
      "discount"=>$row['discount'],
      "netTotal"=>$row['netTotal'],
      
   );
}

## Response
$response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
);

echo json_encode($response);
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
   $searchQuery = " AND (id LIKE :id or 
        product_name LIKE :product_name OR 
        purchase_date LIKE :purchase_date OR 
        purchase_suppliar  LIKE :purchase_suppliar   OR 
        purchase_price LIKE :purchase_price ) ";
   $searchArray = array( 
        'id'=>"%$searchValue%", 
        'product_name'=>"%$searchValue%",
        'purchase_date'=>"%$searchValue%",
        'purchase_suppliar'=>"%$searchValue%",
        'purchase_price'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $pdo->prepare("SELECT COUNT(*) AS allcount FROM purchase_products");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $pdo->prepare("SELECT COUNT(*) AS allcount FROM purchase_products WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $pdo->prepare("SELECT * FROM purchase_products WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

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
      "product_name"=>$row['product_name'],
      "purchase_date"=>$row['purchase_date'],
      "purchase_quantity"=>$row['purchase_quantity'],
      "purchase_price"=>$row['purchase_price'],
      "purchase_sell_price"=>$row['purchase_sell_price'],
      "purchase_net_total"=>$row['purchase_net_total'],
      "purchase_due_bill"=>$row['purchase_due_bill'],
      "return_status"=>$row['return_status'],
      "action"=>'
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm rounded-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="index.php?page=purchase_view&&view_id='.$row['id'].'" class="dropdown-item" type="button">view purchase</a>
              <a href="index.php?page=purchase_pay&&id='.$row['id'].'" class="dropdown-item" type="button">Pay now</a>
              <a href="index.php?page=purchase_return&&return_id='.$row['id'].'" class="dropdown-item" type="button">return product</a>
              
             </div>
          </div>
      ',
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
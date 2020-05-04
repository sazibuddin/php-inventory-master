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
        name LIKE :name OR 
        designation LIKE :designation OR 
        con_no LIKE :con_no ) ";
   $searchArray = array( 
        'id'=>"%$searchValue%", 
        'name'=>"%$searchValue%",
        'con_no'=>"%$searchValue%",
        'designation'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $pdo->prepare("SELECT COUNT(*) AS allcount FROM staff ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $pdo->prepare("SELECT COUNT(*) AS allcount FROM staff WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $pdo->prepare("SELECT * FROM staff WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

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
      "name"=>$row['name'],
      "designation"=>$row['designation'],
      "con_no"=>$row['con_no'],
      "email"=>$row['email'],
      "address"=>$row['address'],
      "action"=>'
          <div class="btn-group">
          <button type="button" class="btn btn-primary btn-sm rounded-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="index.php?page=edit_staff&&edit_id='.$row['id'].'" class="dropdown-item" type="button">edit staff</a>
            <a href="" class="dropdown-item" id="staff_delete_btn" data-id="'.$row['id'].'" type="button">delete staff</a>
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
<?php 

  $get_all_table_query = "SHOW TABLES";
  $stmt = $pdo->prepare($get_all_table_query);
  $stmt->execute();
  $res = $stmt->fetchAll();
if (isset($_POST['submit'])) {
  if (isset($_POST['table'])) {
    $output = '';

    foreach ($_POST['table'] as $table) {
      $show_table_query = "SHOW CREATE TABLE".$table . "";
      $stmt = $pdo->prepare($show_table_query);
      $stmt->execute();
      $show_table_res = $stmt->fetchAll();

      foreach ($show_table_res as $show_table_row) {
        $output .= "\n\n".$show_table_row["Create Table"]. "; \n\n";
      }

      $select_query = "SELECT * FROM ".$table."";
      $stmt = $pdo->prepare($select_query);
      $stmt->execute();
      $total_row = $stmt->rowCount();

      for ($count=0; $count < $total_row ; $count++) { 
        $single_res = $stmt->fetch(PDO::FETCH_ASSOC);
        $table_column_array = array_keys($single_res);
        $table_value_array = array_values($single_res);
        $output .= "\nINSERT INTO $table(";
        $output .= "" . implode(", ", $table_column_array) . ")
                  VALUES ( ";
        $output .= "'" . implode("' ,'" , $table_value_array) . " ');
                  \n";


      }
    }
    $file_name = 'batabase_backup_on_' . date('Y-m-d').'.sql';
    $file_handle = fopen($file_name, 'w+');
    fwrite($file_handle, $output);
    fclose($file_handle);
  

   // Download the SQL backup file to the browser
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        exec('rm ' . $file_name); 


  }else{
     $selectError = "Please select atleast 1 table name to export";
  }
  }
 ?>

// <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  // <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Database backup</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Take a database backup</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <?php 
                        if (isset($selectError)) {
                          echo "<div class='alert alert-danger'>". $selectError."</div>";
                        }
                     ?>
                    <form method="post" action="#" id="exportForm">
                      <div class="row">
                      <?php 
                          foreach ($res as $table) {
                            ?>
                             <div class="col-md-3 col-lg-3">
                               <label>
                               <input type="checkbox" class="checkbox_table" name="table[]" value='<?php echo $table['Tables_in_inventory']; ?>'> 
                               <?php echo $table['Tables_in_inventory']; ?>
                             </label>
                             </div>
                            <?php 
                          }
                       ?>

                       </div>
        
                       <div class="form-group">
                         <input type="submit" class="btn btn-info" name="submit" id="submit" value="Expor database">
                       </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                  <!-- /.card-body -->
                </div>
          </section>
<!-- <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
          <script>
            $(document).ready(function() {
              $('#submit').click(function(event) {
                event.preventDefault();
                /* Act on the event */
                var count = 0;
                $('.checkbox_table').each(function() {
                  if ($(this).is(':checked')) {
                    count = count +1;
                  }
                  if (count > 0) {
                    // $('#exportForm').submit();
                  }else{
                    alert("Please select atleast ont table for export");
                    return false;
                  }
                });

              });
            });
          </script> -->
<?php
require "pdo.php";
error_reporting(0);

if (isset($_GET['tabloSectiSelect'])) {
$fieldValue = $_GET['fieldValue'];
$sql = "select column_name,data_type 
from information_schema.columns 
where table_name = '$fieldValue';";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
echo " <option value=''>Sütün Seç</option> ";
foreach ($results as $key => $value) {
  $colName = $value['column_name'];
    echo "
    <option value='$colName'>$colName</option>  
    ";
}

}

if (isset($_GET['querySelect'])) {
  $query = $_GET['query'];
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $results = $stmt->fetchAll();
  $keysOfTable = array_keys($results[0]);
  $valuesOfTable = array_values($results[0]);
  $rowCount = $stmt->rowCount();
  // print_r($valuesOfTable);
  echo " <h4>Satır: <span class='codeText'>$rowCount</span> </h4>";
  echo "
  <table class='table table-bordered'>
  <thead>
    <tr>
  ";
  foreach ($keysOfTable as $value) {
    echo "<th scope='col'>$value</th>";
  }
  echo "
    </tr>
  </thead>
  <tbody>
  <tr>
  ";
for ($i = 0; $i < count($results); $i++) {
  $valuesOfTableRow = array_values($results[$i]);
  foreach ($valuesOfTableRow as $value) {
    echo "<td scope='col'>$value</td>";
  }
  echo "</tr>";
}
echo "
</tbody>
</table>
";
  
}

// END OF SELECT CODE

// START  OF INSERT CODE

if (isset($_GET['tabloSectiInsert'])) {
  $fieldValue = $_GET['fieldValue'];
  $sql = "select is_nullable,column_name,data_type 
  from information_schema.columns 
  where table_name = '$fieldValue';";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll();
  foreach ($results as $key => $value) {
    $colName = $value['column_name'];
    $isNullable = $value['is_nullable'];
    if ($isNullable != 'YES') {
      echo "
      <option selected disabled value='$colName'>$colName</option>  
      ";
    } else {
      echo "
      <option value='$colName'>$colName</option>  
      ";
    }
      
  }
}

if (isset($_GET['sorguInsertSubmit'])) {
  $query = $_GET['query'];
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  echo "Eklenmiştir";
}

// END OF INSERT HERE


// START  OF UPDATE CODE

if (isset($_GET['tabloSectiUpdate'])) {
  $fieldValue = $_GET['fieldValue'];
  $sql = "select column_name,data_type 
  from information_schema.columns 
  where table_name = '$fieldValue';";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll();
  foreach ($results as $key => $value) {
    $colName = $value['column_name'];

      echo "
      <option value='$colName'>$colName</option>  
      ";
  }
}

if (isset($_GET['sorguUpdateSubmit'])) {
  $query = $_GET['query'];
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  echo "Güncellenmiştir";
}

// END OF UPDATE HERE


// START OF DELETE HERE

if (isset($_GET['sorguDeleteSubmit'])) {
  $query = $_GET['query'];
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  echo "Silinmiştir";
}

// END OF DELETE HERE

// START OF SERBEST HERE

if(isset($_GET['querySerbest'])) {
  $query = $_GET['query'];
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $results = $stmt->fetchAll();
  $keysOfTable = array_keys($results[0]);
  $valuesOfTable = array_values($results[0]);
  $rowCount = $stmt->rowCount();
  echo " <h4>Satır: <span class='codeText'>$rowCount</span> </h4><hr>";
  echo "
  <table class='table table-bordered'>
  <thead>
    <tr>
  ";
  foreach ($keysOfTable as $value) {
    echo "<th scope='col'>$value</th>";
  }
  echo "
    </tr>
  </thead>
  <tbody>
  <tr>
  ";
for ($i = 0; $i < count($results); $i++) {
  $valuesOfTableRow = array_values($results[$i]);
  foreach ($valuesOfTableRow as $value) {
    echo "<td scope='col'>$value</td>";
  }
  echo "</tr>";
}
echo "
</tbody>
</table>
";
}
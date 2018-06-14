<?php
require "backend/pdo.php";
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/multiselect.css">
  <meta name="description" content="Hastane Admin Yönetim Sistemi">
  <meta name="keywords" content="Hastane,Hospital,Clinic,Sağlık,Ocağı,Kusi,Musah,Hussein,Davut,Gökdemir,mkhstar,apexpredator">
  <meta name="author" content="Kusi Musah Hussein">
  <title>INSERT</title>
</head>

<body>
  <h3 class='center-text border-text my-2'> <a style="margin-bottom: 3px;" href='hakkinda.html' class="btn btn-secondary">Hakkında</a>Hastane Admin Yönetim Sistemi</h3>

  <div class="dropdown" style='text-align: center; margin: 30px 0 7px 0;'>
    <button class="btn btn-secondary dropdown-toggle" type="button" id="anahtarKelimeSec" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="false">
      Anahtar Kelime Seçin
    </button>
    <div class="dropdown-menu codeElements" aria-labelledby="anahtarKelimeSec">
      <p class='dropdown-item'>Temel</p>
      <hr>
      <a class="dropdown-item" href="select.php">
        <i class="far fa-hand-pointer"></i> SELECT</a>
      <a class="dropdown-item" href="insert.php">
        <i class="fas fa-upload"></i> INSERT</a>
      <a class="dropdown-item" href="update.php">
        <i class="far fa-edit"></i> UPDATE</a>
      <a class="dropdown-item" href="delete.php">
        <i class="far fa-trash-alt"></i> DELETE</a>
        <a class="dropdown-item" href="serbest.php">
        <i class="far fa-handshake"></i> SERBEST UYGULAMA</a>
      <p class='dropdown-item'>Join İşlemleri</p>
      <hr>
      <a class="dropdown-item" href="innerjoin.php">
        <i class="fas fa-dot-circle"></i> INNER JOIN</a>
      <a class="dropdown-item" href="leftjoin.php">
        <i class="fas fa-chevron-left"></i> LEFT JOIN</a>
      <a class="dropdown-item" href="rightjoin.php">
        <i class="fas fa-chevron-right"></i> RIGHT JOIN</a>
      <a class="dropdown-item" href="fulljoin.php">
        <i class="fas fa-circle"></i> FULL JOIN</a>
      <p class='dropdown-item'>Özel Fonksiyonlar</p>
      <hr>
      <a class="dropdown-item" href="count.php">
        <i class="fas fa-sort-amount-up"></i> COUNT</a>
      <a class="dropdown-item" href="sum.php">
        <i class="fas fa-plus-circle"></i> SUM</a>
      <a class="dropdown-item" href="avg.php">
        <i class="fas fa-plus-square"></i> AVG</a>
      <a class="dropdown-item" href="maxmin.php">
        <i class="fas fa-arrows-alt-v"></i> MAX VE MIN</a>
      <a class="dropdown-item" href="ara.php">
        <i class="fas fa-search"></i> ARA</a>
    </div>
  </div>
  <h4 class='center-text codeText'>INSERT</h4>

  <div class="container">

    <form id='insertForm'>

      <div class="form-group">
        <label for="tabloSecInsert">
          <h5>Tablo Seçin</h5>
        </label>
        <select class="form-control" id="tabloSecInsert">

          <?php
          $sql = "select table_name from information_schema.tables where table_schema='public'";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $results = $stmt->fetchAll();
          // print_r($results);
          foreach ($results as $key => $value) {
            $tableName = $value['table_name'];
              echo "
              <option value='$tableName'>$tableName</option>
              ";
          }
          ?>
        </select>
      </div>
      <hr>
      <div class="form-group">
        <label for="multipleSutunSec" style='text-align: left;'>
          <h5>Sütünleri Seçin</h5>
        </label>
        <select class='form-control' id="multipleSutunSec" multiple="multiple" style='width: 100%;'>
          <?php 
           $sql = "select is_nullable, column_name,data_type 
           from information_schema.columns 
           where table_name = (select table_name from information_schema.tables where table_schema='public' limit 1); 
           ";
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


          ?>
        </select>
      </div>

      <hr>
          <div id="insertValuesDiv" style='margin-bottom: 35px;'>
          <h4 style='display: inline;'> <span class="codeText" style='font-weight: bold;'> VALUES </span></h4>
          <button type='button'class="btn btn-secondary" id='girinValuesInsert'>Girin</button>
          </div>
          <hr>
          <div id="pasteOutputIdValuesInsert">
          
          
          
          </div>
          <h4>Sorgu: <span class='codeText' id='sorguInsert'></span> </h4> <hr>


      <button type="submit" class="btn btn-secondary btn-lg btn-block">INSERT</button>
    </form>

  </div>




<!-- MODAL INPUT VALUES START -->

<!-- Modal -->
<div class="modal fade" id="modalInsertValues" tabindex="-1" role="dialog" aria-labelledby="modalInsertValues" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalInsertTitle"><span class="codeText" style='font-weight: bold;'> VALUES </span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id='pasteInsertElements'>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" id='modalGirinInsert' class="btn btn-secondary">Girin</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL Insert VALUES END -->









  <script src="js/all.js"></script>
  <script src="js/jquery.js " crossorigin="anonymous"></script>
  <script src="js/proper.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js" crossorigin="anonymous"></script>
  <script src="js/multiselect.js"></script>
  <script src="js/main.js" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>

</body>

</html>
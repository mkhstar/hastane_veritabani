<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="description" content="Hastane Admin Yönetim Sistemi">
  <meta name="keywords" content="Hastane,Hospital,Clinic,Sağlık,Ocağı,Kusi,Musah,Hussein,Davut,Gökdemir,mkhstar,apexpredator">
  <meta name="author" content="Kusi Musah Hussein">
  <title>Hastane Admin Yönetim Sistemi</title>
</head>

<body>
  <h3 class='center-text border-text my-2'>Hastane Admin Yönetim Sistemi</h3>
  <div class='center-content-flex' style='margin: 70px;'>
    <div>
    <div style='text-align: center;'> 
    <a href="hakkinda.html" class="btn btn-secondary">Hakkında</a>
    </div>
    <div style="text-align:center; margin: 30px;">
    <img src="hospital.jpg" width='100px' height='100px' alt="">
    </div>
    
      <h3 class='center-text'>Hoş Geldiniz</h3>
      <h3 class='center-text'>Başlamak İçin Bir Anahtar Kelime Seçin</h3>
      <div class="dropdown" style='text-align: center; margin: 30px 0;'>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="anahtarKelimeSec" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          Anahtar Kelime Seçin
        </button>
        <div class="dropdown-menu codeElements" aria-labelledby="anahtarKelimeSec">
          <p class='dropdown-item'>Temel</p>
          <hr>
          <a class="dropdown-item" href="select.php"><i class="far fa-hand-pointer"></i> SELECT</a>
          <a class="dropdown-item" href="insert.php"><i class="fas fa-upload"></i> INSERT</a>
          <a class="dropdown-item" href="update.php"><i class="far fa-edit"></i> UPDATE</a>
          <a class="dropdown-item" href="delete.php"><i class="far fa-trash-alt"></i> DELETE</a>
          <a class="dropdown-item" href="serbest.php">
        <i class="far fa-handshake"></i> SERBEST UYGULAMA</a>
          <p class='dropdown-item'>Join İşlemleri</p>
          <hr>
          <a class="dropdown-item" href="innerjoin.php"><i class="fas fa-dot-circle"></i> INNER JOIN</a>
          <a class="dropdown-item" href="leftjoin.php"><i class="fas fa-chevron-left"></i> LEFT JOIN</a>
          <a class="dropdown-item" href="rightjoin.php"><i class="fas fa-chevron-right"></i> RIGHT JOIN</a>
          <a class="dropdown-item" href="fulljoin.php"><i class="fas fa-circle"></i> FULL JOIN</a>
          <p class='dropdown-item'>Özel Fonksiyonlar</p>
          <hr>
          <a class="dropdown-item" href="count.php"><i class="fas fa-sort-amount-up"></i> COUNT</a>
          <a class="dropdown-item" href="sum.php"><i class="fas fa-plus-circle"></i> SUM</a>
          <a class="dropdown-item" href="avg.php"><i class="fas fa-plus-square"></i> AVG</a>
          <a class="dropdown-item" href="maxmin.php"><i class="fas fa-arrows-alt-v"></i> MAX VE MIN</a>
          <a class="dropdown-item" href="ara.php"><i class="fas fa-search"></i> ARA</a>
        </div>
      </div>
    </div>
  </div>

  <script src="js/all.js"></script>
  <script src="js/jquery.js " crossorigin="anonymous"></script>
  <script src="js/proper.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>

</body>

</html>
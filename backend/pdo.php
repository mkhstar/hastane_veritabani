<?php

  $host =  'localhost';
  $port = 5432;
  $user = 'postgres';
  $password = '';
  $dbname = 'HASTANE_YÖNETİM_SİSTEMİ';

  // Set DSN
  $dsn = "pgsql:host=".$host.";port=".$port.";dbname=$dbname;user=$user;password=$password";
  // Create a PDO instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

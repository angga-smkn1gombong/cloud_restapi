<?php
  $host = "localhost"; // isikan dengan nama host
  $user = "personadmin"; // isikan dengan username
  $pass = "!person1"; // isikan dengan password
  $db = "person"; // isikan dengan nama database

  // koneksi ke database
  $mysqli = new mysqli($host, $user, $pass, $db);

  // cek koneksi
  if($mysqli->connect_error){
      die("Koneksi Gagal: " . $mysqli->connect_error);
  }else{
      //echo "Koneksi Berhasil";
  }
?>

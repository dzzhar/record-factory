<?php

// Mengambil route dari url
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

require_once('./controller/recordController.php');

// Mendefinisikan route
switch ($route) {

  // Route "/home"
  case 'home':
    recordController::index();
    break;

  // Route "/add_record"
  case 'add_record':
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Menyimpan data yang di kirim dari method POST
      recordController::createRecord($_POST);

      // Membersihkan data yang ada di dalam POST
      foreach ($_POST as $key => $value) {
        unset($_POST[$key]);
      }
    }
    break;

  // Route tidak ditemukan 
  default:
    echo '404 Not Found';
    break;
}

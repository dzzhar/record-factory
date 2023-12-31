<?php

// Get the route from the URL
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

require_once('./controller/recordController.php');

// Implement your routes
switch ($route) {
  case 'home':
    recordController::index();
    break;
  case 'add_record':
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      recordController::createRecord($_POST);
    }
    
    break;
  default:
    echo '404 Not Found';
    break;
}

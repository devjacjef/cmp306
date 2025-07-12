<?php

require 'connection.php';
$conn = getDatabaseConnection();

require 'library.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
   case 'GET':
      if (isset($_GET['id'])) {
      } else {
      }
      break;
   case 'POST':
      break;
   case 'PUT':
      break;
   case 'DELETE':
      break;
   default:
      header("HTTP/1.0 405 Method Not Allowed");
      break;
}

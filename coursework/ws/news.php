<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connection.php';
$conn = getDatabaseConnection();
require 'library.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
   case 'GET':
      if (isset($_GET['id'])) {

         $id = $_GET['id'];
         $resp = getNews($id);
         header('Content-Type: text/xml');
         echo $resp;
      } else {
         $resp = getAllNews();
         header('Content-Type: text/xml');
         echo $resp;
      }
      break;
   case 'POST':
      var_dump($xml);
      $xml = file_get_contents('php://input');
      $resp = insertNews($xml);
      echo $resp;
      break;
   case 'PUT':
      $id = $_GET['id'];
      $xml = file_get_contents('php://input');
      $resp = updateNews($id, $xml);
      echo $resp;
      break;
   case 'DELETE':
      $id = $_GET['id'];
      $resp = deleteNews($id);
      echo $resp;
      break;
   default:
      header("HTTP/1.0 405 Method Not Allowed");
      break;
}

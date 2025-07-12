<?php
// TODO: Must delete this after hand in
function getDatabaseConnection()
{
   //  Database connections 
   $servername = "localhost";
   $username = "root";
   $password = "hotdog";
   $database = "university";
   $conn = mysqli_connect($servername, $username, $password, $database);
   // Check connection
   if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();

      exit();
   }
   // echo "Connected to MySQL.";
   return $conn;
}

getDatabaseConnection();

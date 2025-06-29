<?php

include("connection.php");
include("deps/thinkpad.php");

$conn = getDatabaseConnection();

function createThinkpad($json)
{
   global $conn;

   $thinkpad = Thinkpad::fromJson($json);

   $stmt = $conn->prepare("insert into thinkpads (ID, Model, Description, ImageUrl, Price) values (?, ?, ?, ?, ?)");

   if (!$stmt) {
      error_log("Prepare failed: " . $conn->error);
      return false;
   }

   $ID = $thinkpad->getId();
   $Model = $thinkpad->getModel();
   $Description = $thinkpad->getDescription();
   $ImageUrl = $thinkpad->getImageUrl();
   $Price = $thinkpad->getPrice();

   $stmt->bind_param("isssd", $ID, $Model, $Description, $ImageUrl, $Price);

   $result = $stmt->execute();

   if (!$result) {
      error_log("Execute failed: " . $stmt->error);
   }

   $stmt->close();

   return $result;
}

function getAllThinkpads()
{
   global $conn;
   $sql = "SELECT * FROM thinkpads LIMIT 6";
   $result = mysqli_query($conn, $sql);
   $rows = array();
   while ($r = mysqli_fetch_assoc($result)) {
      $rows[] = $r;
   }

   return json_encode($rows);
}

function getThinkpadById(int $id)
{
   global $conn;
   $stmt = mysqli_stmt_init($conn);
   $sql = "SELECT * FROM thinkpads WHERE ID= ? LIMIT 1";

   mysqli_stmt_prepare($stmt, $sql);
   mysqli_stmt_bind_param($stmt, 'i', $id);
   mysqli_stmt_execute($stmt);

   $result = mysqli_stmt_get_result($stmt);

   $row = mysqli_fetch_assoc($result);

   return json_encode($row);
}

function updateThinkpad($json)
{
   global $conn;

   $thinkpad = Thinkpad::fromJson($json);
   $stmt = $conn->prepare("UPDATE thinkpads SET Model=?, Description=?, ImageUrl=?, Price=? WHERE ID=?");


   if (!$stmt) {
      error_log("Prepare failed: " . $conn->error);
      return false;
   }

   $ID = $thinkpad->getId();
   $Model = $thinkpad->getModel();
   $Description = $thinkpad->getDescription();
   $ImageUrl = $thinkpad->getImageUrl();
   $Price = $thinkpad->getPrice();

   $stmt->bind_param("sssdi", $Model, $Description, $ImageUrl, $Price, $ID);

   $result = $stmt->execute();
}

function deleteThinkpad($id)
{
   global $conn;
   $sql = "DELETE FROM thinkpads WHERE ID = ?";
   $stmt = mysqli_stmt_init($conn);

   mysqli_stmt_prepare($stmt, $sql);
   mysqli_stmt_bind_param($stmt, 'i', $id);

   $result = mysqli_stmt_execute($stmt);

   if (!$result) {
      error_log("Execute failed: " . $stmt->error);
   }

   $stmt->close();

   return $result;
}

<?php

include("connection.php");
include("deps/thinkpad.php");

$conn = getDatabaseConnection();

function createThinkpad($json)
{
   global $conn;

   $thinkpad = Thinkpad::fromJson($json);

   $stmt = $conn->prepare("insert into thinkpads (Model, Description, ImageUrl, Price, Stock) values (?, ?, ?, ?, ?)");

   if (!$stmt) {
      error_log("Prepare failed: " . $conn->error);
      return false;
   }

   $ID = $thinkpad->getId();
   $Model = $thinkpad->getModel();
   $Description = $thinkpad->getDescription();
   $ImageUrl = $thinkpad->getImageUrl();
   $Price = $thinkpad->getPrice();
   $Stock = $thinkpad->getStock();

   $stmt->bind_param("sssdi", $Model, $Description, $ImageUrl, $Price, $Stock);

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
   $sql = "SELECT * FROM thinkpads";
   $result = mysqli_query($conn, $sql);
   $rows = array();
   while ($r = mysqli_fetch_assoc($result)) {
      $rows[] = $r;
   }

   return json_encode($rows);
}

function getThinkpadById($id)
{
   global $conn;
   $stmt = mysqli_stmt_init($conn);
   $sql = "SELECT * FROM thinkpads WHERE ID=" . $id . " LIMIT 1";

   mysqli_stmt_prepare($stmt, $sql);
   mysqli_stmt_execute($stmt);

   $result = mysqli_stmt_get_result($stmt);

   $row = mysqli_fetch_assoc($result);

   return json_encode($row);
}

function updateThinkpad($json)
{
   global $conn;

   $thinkpad = Thinkpad::fromJson($json);
   $stmt = $conn->prepare("UPDATE thinkpads SET Model=?, Description=?, ImageUrl=?, Price=?, Stock=? WHERE ID=?");

   if (!$stmt) {
      error_log("Prepare failed: " . $conn->error);
      return false;
   }

   $ID = $thinkpad->getId();
   $Model = $thinkpad->getModel();
   $Description = $thinkpad->getDescription();
   $ImageUrl = $thinkpad->getImageUrl();
   $Price = $thinkpad->getPrice();
   $Stock = $thinkpad->getStock();

   $stmt->bind_param("sssdii", $Model, $Description, $ImageUrl, $Price, $Stock, $ID);

   $result = $stmt->execute();

   return $result;
}

function deleteThinkpad($id)
{
   global $conn;
   $sql = "DELETE FROM thinkpads WHERE ID=" . $id;
   $stmt = $conn->prepare($sql);

   $result = $stmt->execute();

   if (!$result) {
      error_log("Execute failed: " . $stmt->error);
   }

   $stmt->close();

   return $result;
}

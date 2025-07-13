<?php

function convertToXML($query)
{
   $news = '<news>';
   $news .= '<id>' . (int)$query['ID'] . '</id>';
   $news .= '<title>' . htmlspecialchars($query['Title']) . '</title>';
   $news .= '<body>' . htmlspecialchars($query['Body']) . '</body>';  // <-- wrap body here
   $news .= '</news>';
   return $news;
}

function getAllNews()
{
   global $conn;
   $query = "SELECT * FROM news ORDER BY ID desc limit 12";
   $result = mysqli_query($conn, $query);

   if (!$result) {
      // Prevents mixing HTML error with XML output
      header("Content-Type: text/plain");
      die("Database error: " . mysqli_error($conn));
   }

   $txt = '<articles>';
   while ($row = mysqli_fetch_assoc($result)) {
      $txt = $txt . convertToXML($row);
   }

   $txt = $txt . '</articles>';
   return $txt;
}

function getNews($id)
{
   global $conn;

   $query = "SELECT * FROM news WHERE ID = $id";
   $result = mysqli_query($conn, $query);
   $response = mysqli_fetch_assoc($result);
   $txt = convertToXML($response);

   return $txt;
}

function insertNews($xml) {}

function updateNews($id, $xml) {}

function deleteNews($id) {}

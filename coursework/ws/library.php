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

function insertNews($xml)
{
   global $conn;
   $data = simplexml_load_string($xml);

   $news_title = $data->title;
   $news_body = $data->body;

   $query = "INSERT INTO news SET title='" . $news_title . "', body='" . $news_body . "'";
   $response = mysqli_query($conn, $query);
   $last_id = mysqli_insert_id($conn);

   if ($response) {
      $resp = $last_id;
   } else {
      $resp = 0;
   }

   return $resp;
}

function updateNews($id, $xml)
{
   global $conn;
   $data = simplexml_load_string($xml);

   $news_title = $data->title;
   $news_body = $data->body;

   $query = "UPDATE news SET title='" . $news_title . "', body='" . $news_body . "' WHERE id=" . $id;

   $response = mysqli_query($conn, $query);

   if ($response) {
      $resp = 1;
   } else {
      $resp = 0;
   }

   return $resp;
}


function deleteNews($id)
{
   global $conn;
   $query = "DELETE FROM news WHERE ID=$id";
   $response = mysqli_query($conn, $query);
   if ($response) {
      $resp = 1;
   } else {
      $resp = 0;
   }

   return $resp;
}

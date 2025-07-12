<?php

function convertToXML($query)
{
   $news = '<news>';
   $news = $news . '<id>' . $query['ID'] . '</id>';
   $news = $news . '<title>' . $query['Title'] . '</title>';
   $news = $news . '<body>' . htmlspecialchars($query['Body']) . '</body>';
   $news = $news . '</news>';
   return $news;
}

function getAllNews() {}

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

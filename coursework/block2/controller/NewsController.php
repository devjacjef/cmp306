<?php

require __DIR__ . '/../model/News.php';

class NewsController
{
   public function getNews($id)
   {
      $url = "http://127.0.0.1/cmp306/coursework/ws/news.php/" . $id;

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $resp = curl_exec($curl);

      if (!$resp) {
         die('Error : "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
      }

      curl_close($curl);

      $news = simplexml_load_string($resp);

      return $news;
   }

   public function getAllNews() {}
   public function createNews(News $news) {}
   public function updateNews(News $id) {}
   public function deleteNews($id) {}
}

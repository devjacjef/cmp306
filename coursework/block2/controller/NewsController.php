<?php

require __DIR__ . '/../model/News.php';

class NewsController
{
   public function convertToXML($title, $body)
   {
      $news = '<news>';
      $news .= '<title>' . htmlspecialchars($title) . '</title>';
      $news .= '<body>' . htmlspecialchars($body) . '</body>';  // <-- wrap body here
      $news .= '</news>';
      return $news;
   }

   public function getNews($id)
   {
      $url = "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/ws/news.php/" . $id;

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

   public function getAllNews()
   {
      $url = "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/ws/news.php";

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

   public function createNews($title, $body)
   {
      $url = "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/ws/news.php";

      $data = $this->convertToXML($title, $body);

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt(
         $curl,
         CURLOPT_HTTPHEADER,
         array(
            'Content-Type: text/xml',
            'Content-Length: ' . strlen($data)
         )
      );
      $resp = curl_exec($curl);

      if (!$resp) {
         die('Error : "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
      }

      curl_close($curl);

      $news = simplexml_load_string($resp);

      return $news;
   }
   public function updateNews($id, $title, $body)
   {
      $url = "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/ws/news.php/" . $id;

      $data = $this->convertToXML($title, $body);

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt(
         $curl,
         CURLOPT_HTTPHEADER,
         array(
            'Content-Type: text/xml',
            'Content-Length: ' . strlen($data)
         )
      );

      $resp = curl_exec($curl);

      print_r($resp);
      if (!$resp) {
         die('Error : "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
      }

      curl_close($curl);

      $news = simplexml_load_string($resp);

      return $news;
   }

   public function deleteNews($id)
   {
      $url = "https://mayar.abertay.ac.uk/~2207061/cmp306/coursework/ws/news.php/" . $id;

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $resp = curl_exec($curl);

      if (!$resp) {
         die('Error : "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
      }

      curl_close($curl);

      $news = simplexml_load_string($resp);

      return $news;
   }
}

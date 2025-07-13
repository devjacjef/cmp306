<?php

$articles = new NewsController();

$news = $articles->getAllNews();

?>
<div class="container">
   <h1 class="text-center">My RSS Feed</h1>
   <div class="row g-4">
      <?php foreach ($news->news as $n): ?>
         <div class="col-lg-4">
            <div class="card">
               <p class="card text-center"><?= $n->title ?></p>
               <p><?= $n->body ?></p>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>

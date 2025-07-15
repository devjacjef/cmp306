<?php

require __DIR__ . '/partials/header.php';
require __DIR__ . '/partials/login.php';
require __DIR__ . '/../controller/NewsController.php';

$news = new NewsController();

// Pulled some code from previous submission.
function getBBCNews()
{
   $rss_url = "http://feeds.bbci.co.uk/news/scotland/rss.xml";

   $xml = simplexml_load_file($rss_url);

   if ($xml === false) {
      return "Could not fetch BBC RSS feed";
   }

   $output = '<div class="row row-cols-1 row-cols-md-3 g-4">'; // This creates a 3-column layout
   $count = 0;

   foreach ($xml->channel->item as $item) {
      if ($count >= 6) break;

      $output .= '<div class="col">';
      $output .= '<div class="card h-100">';

      // Card Header
      $output .= '<div class="card-header text-truncate" style="font-weight: bold;">';
      $output .= htmlspecialchars($item->title);
      $output .= '</div>';

      // Card Body
      $output .= '<div class="card-body d-flex flex-column">';
      $output .= '<p class="card-text overflow-auto">' . htmlspecialchars($item->description) . '</p>';
      $output .= '</div>';

      // Card Footer
      $output .= '<div class="card-footer text-center">';
      $output .= '<a href="' . htmlspecialchars($item->link) . '" class="btn btn-primary btn-sm" target="_blank">Read More</a>';
      $output .= '</div>';

      $output .= '</div>';
      $output .= '</div>';

      $count++;
   }

   $output .= '</div>';

   return $output;
}

?>


<div class="container">
   <h1 class="text-center">Block 2</h1>
   <div class="d-flex justify-content-center">
      <iframe
         width="450"
         height="250"
         src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBSF2c8ozi5lHuce7flP5Cxs9KokTip86k&center=55.860916,-4.251433&zoom=10"
         frameborder="0"
         allowfullscreen>
      </iframe>
   </div>
</div>

<?php
require __DIR__ . '/partials/items.php';
?>

<div class="container">
   <h1 class="text-center">BBC News Feed</h1>
   <?php echo getBBCNews(); ?>
</div>

<?php

require __DIR__ . '/partials/footer.php';


?>

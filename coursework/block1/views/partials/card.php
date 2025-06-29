<?php
foreach ($thinkpads as $t):
?>
   <?php echo "<h1>Loaded!</h1>"; ?>

   <div class="card" style="max-width: 320px">
      <img src="<?= $image ?>" class="card-img-top" alt="Product Image">
      <div class="card-body">
         <h5 class="card-title"><?= $t->getModel() ?></h5>
         <p class="card-text"><?= $t->getDescription() ?></p>
         <div class="d-flex justify-content-between align-items-center">
            <span class="h5 mb-0">£<?= $t->getPrice() ?></span>
            <div>
               <i class="bi bi-star-fill text-warning"></i>
               <i class="bi bi-star-fill text-warning"></i>
               <i class="bi bi-star-fill text-warning"></i>
               <i class="bi bi-star-fill text-warning"></i>
               <i class="bi bi-star-half text-warning"></i>
            </div>
         </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light">
         <!--IMPLEMENT BUTTON CALL THING-->
         <button class="btn btn-primary btn-sm">Add to Cart</button>
      </div>
   </div>
<?php
endforeach; ?>

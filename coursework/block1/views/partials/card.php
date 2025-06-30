   <div class="container my-4">
      <div class="row g-4">
         <?php
         foreach ($thinkpads as $t):
         ?>
            <div class="col-md-4">
               <div class="card" style="max-width: 320px">
                  <img src="<?= $t->getImageUrl() ?>" class="card-img-top" alt="Product Image">
                  <div class="card-body">
                     <h5 class="card-title"><?= $t->getModel() ?></h5>
                     <p class="card-text"><?= $t->getDescription() ?>
                     </p>
                     <a href="#">For more details, click here!</a>

                     <?php if ($t->getStock() > 0): ?>
                        <div class="d-flex justify-content-between align-items-center">
                           <span class="h5 mb-0">£<?= $t->getPrice() ?></span>
                        </div>
                  </div>
                  <div class="card-footer d-flex justify-content-between bg-light">
                     <!--IMPLEMENT BUTTON CALL THING-->
                     <a class="btn btn-primary btn-sm">Buy Now</a>
                     <span class="h5 mb-0">Stock: <?= $t->getStock() ?></span>
                  </div>
               <?php else: ?>
                  <div class="card-footer d-flex justify-content-between bg-light">
                     <!--IMPLEMENT BUTTON CALL THING-->

                     <span class="h5 mb-0">Out of stock </span>
                  </div>
               <?php endif; ?>
               </div>
            </div>
         <?php
         endforeach; ?>
      </div>
   </div>

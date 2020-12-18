<?php foreach ($allRestaurant as $key => $restaurantInfo) : ?>
<div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title"><?=$restaurantInfo['name_restaurant'] ?></h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="index.php?action=main&idRestaurant=<?=$restaurantInfo['id']?>" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
<?php endforeach ?>
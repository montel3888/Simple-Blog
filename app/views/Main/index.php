<br>
<?php if(!empty($products)): ?>
<?php foreach($products as $product): ?>
  <div class="card mb-4">
    <img class="card-img-top" src="<?= $product['image_path'] ?>" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title"><?= $product['product'] ?></h2>
      <p class="card-text"><?= $product['description'] ?></p>
      <a href="main/view?details='<?= $product['id']; ?>'" class="btn btn-primary">Узнать больше &rarr;</a>
    </div>
    <div class="card-footer text-muted">Posted on <?= $product['date']; ?></div>
  </div>
<hr>
<?php endforeach; ?>
<?php endif; ?>
<br>
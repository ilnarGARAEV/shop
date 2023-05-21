<?php 
  session_start();
  $user = $_SESSION['user'];

  if(!$_SESSION['user']) {
    header('Location: auth.php');
  }
  // запретим неавторизованным пользователям переходить на страницу с профилем пользователя

?>
<body>
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>

  <div class='container d-flex'>
    
    <div class='d-flex flex-column'>
      <?php foreach($categories as $category): ?>
        <a 
          href="catalog.php?category=<?= $category['id']; ?>" 
          
          class="category-item"
        >
        <!-- параметры id категории -->

          <?= $category['category']; ?>
        </a>
      <?php endforeach ?>
      <a href="catalog.php" class="category-item">Все товары</a>
    </div>

    <div class="d-flex align-center products">
      <?php foreach($items as $item): ?>
        <a href="product.php?id=<?= $item['id']; ?>">
          <div class="product-item">
            <img src="<?= $item['image']; ?>" alt="">
            <p><?= $item['product']; ?></p>
            <p class="bold"><?= $item['price']; ?> Р </p>
          </div>
          <!-- вывод список продуктов -->
        </a>
      <?php endforeach ?>
    </div>
    
  </div>

</body>
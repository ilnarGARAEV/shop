<?php 
  session_start();
  $user = $_SESSION['user'];

  if(!$_SESSION['user']) {
    header('Location: register.php');
  }
?>
<!-- Запрещаем переходить на эту страницу неавторизованным пользователям -->

<body>
 
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>
  
  <?php if($carts == []): ?>
    <!-- если нет данных то выведит о пустой корзине -->
    <h2 class='center'>Ваша корзина пустая</h2>

  <?php else: ?>

    <div class="container">
      <div class="d-flex align-center products">
        <?php foreach($carts as $cart): ?>
          <a href="product.php?id=<?= $cart['id']; ?>">
            <form action="database/buyproduct.php" method='post' class="product-item">
              <img src="<?= $cart['image']; ?>" alt="">
              <p><?= $cart['product']; ?></p>
              <p class="bold"><?= $cart['price']; ?> Р </p>
              <p>Количество: <?= $cart['count']; ?></p>
              <input name='id' value="<?= $cart['id']; ?>" type="hidden">
              <input name='count' value="<?= $cart['count']; ?>" type="hidden">
              <div class='basket_btn'>
              <button class='btn'>Купить</button>
              <!--<form action="database/deletebasket.php" method='post'> 
                <button class='btn' type='submit'>Удалить</button>
              </form> 
              -->
              <form action="database/deletebasket.php" methot="POST">
                 <input type="hidden" name="cart"  >
                <input type="submit" value="удалить">
              </form> 
              
              </div>
            
            </form>
          </a>
        <?php endforeach; ?>
      </div>

      <form action="database/buyall.php" method='post'>
        <button class="btn ww">Оформить все</button>
      </form>

    </div>

  <?php endif; ?>

</body>
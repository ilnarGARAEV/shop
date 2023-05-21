<?php 
  session_start();
  $user = $_SESSION['user'];

  if(!$_SESSION['user']) {
    header('Location: index.php');
  }
  // запретим неавторизованным пользователям переходить на страницу с профилем пользователя

  if(isset($_POST['delete_order'])){
    $delete_id = $_POST['delete'];
    mysqli_query($connect, "DELETE FROM orders WHERE id = '$delete_id'") or die('Ошибка удаления талона');
 }

?>

<body>
  <?php require 'templates/header.php'; ?>
  <?php require 'database/requests.php'; ?>

  <!-- форма данных пользователя -->
  <div class="container">
    <div>ID пользователя: <?= $user['id']; ?></div>
    <div>ФИО пользователя: 
      <?= $user['surname']; ?> 
      <?= $user['name']; ?> 
      <?= $user['patronymic']; ?>
    </div>
    <div>Логин пользователя: <?= $user['login']; ?></div>
    <div>Почта пользователя: <?= $user['email']; ?></div>

    
    <!-- форма данных пользователя -->

      <!-- блок новых заказов -->
    <h2>Новые заказы</h2>
    <div class="d-flex align-center products">
      <?php foreach($new_orders as $order): ?>
        <a href="product.php?id=<?= $order['id']; ?>">
          <div class="product-item">
            <img src="<?= $order['image']; ?>" alt="">
            <p><?= $order['product']; ?></p>
            <p class="bold"><?= $order['price']; ?> Р </p>
            <p>Количество: <?= $order['count']; ?></p>
            <form methot="post">
              
            </form>
          </div>
        </a>
         
              
      <?php endforeach; ?>
     </div>
<!-- блок Подтвержденные заказы -->
     <h2>Подтвержденные заказы</h2>
    <div class="d-flex align-center products">
      <?php foreach($accepted_orders as $order): ?>
        <a href="product.php?id=<?= $order['id']; ?>">
          <div class="product-item">
            <img src="<?= $order['image']; ?>" alt="">
            <p><?= $order['product']; ?></p>
            <p class="bold"><?= $order['price']; ?> Р </p>
            <p>Количество: <?= $order['count']; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
     </div>

     <!-- блок Отмененные заказы -->
     <h2>Отмененные заказы</h2>
    <div class="d-flex align-center products">
      <?php foreach($canceled_orders as $order): ?>
        <a href="product.php?id=<?= $order['id']; ?>">
          <div class="product-item">
            <img src="<?= $order['image']; ?>" alt="">
            <p><?= $order['product']; ?></p>
            <p class="bold"><?= $order['price']; ?> Р </p>
            <p>Количество: <?= $order['count']; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
     </div>

  </div>
</body>
<?php 

  session_start();

  require 'connect.php';

  $id = $_POST['id'];
  $userId = $_SESSION['user']['id'];
  // получаем массив пользователя и id
  $count = $_POST['count'];

  mysqli_query($connect, "
    INSERT INTO `orders`(`id`, `user_id`, `product_id`, `count`, `status`) VALUES (null,'$userId','$id','$count','1')
  ");

  mysqli_query($connect, "
    delete from cart where user_id = $userId and product_id = $id and count = $count
  ");
  // удалени продукта из корзины

  header('Location: ../basket.php');

?>
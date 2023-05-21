<?php 
  session_start();
  unset($_SESSION['user']);
  header('Location: ../index.php');
  // Уничтожаем сессию пользователя и перенаправляем на главную

?>
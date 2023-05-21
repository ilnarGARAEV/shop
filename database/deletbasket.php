<!-- <?php 

  session_start();

  require 'connect.php';

  if(isset($_POST['products'])) {
    $result = mysql_query("DELETE FROM products where id = ".$_POST['id']."");
}
  header('Location: ../basket.php');
//  удаление из корзину
?> -->
<?php
    
    session_start();

    require 'connect.php';

    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $roleId  = 1;

    if ($surname != '' && $name != '' && $patronymic != '' && $login != '' && $email != '' && $password != '' && $password_confirm != '') {
      if ($password == $password_confirm)  {
        $check_login = mysqli_query($connect, "select login from users where login = '$login'");
        // проверка полей на совпадение
        // проверка пароля
        // проверка пользователя

        if(mysqli_num_rows($check_login) < 1) {

          mysqli_query($connect, "
            insert into users values (null, '$surname', '$name', '$patronymic', '$login', '$email', '$password', '$roleId')
          ");
          // если больше 1 то такой пользователи не существует
          $_SESSION['message'] = 'Регистрация прошла успешно';
          header('Location: ../auth.php');
        } else {
          $_SESSION['message'] = 'Пользователь с таким логином уже существует';
          header('Location: ../register.php');
        }
      } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
      }
    } else {
      $_SESSION['message'] = 'Заполните все поля!';
      header('Location: ../register.php');
    }

    

?>
<?php 
  session_start();
  
  if($_SESSION['user']) {
    header('Location: index.php');
  }
?>
<!-- если Пользователь авторизован то его будет бросать на главную -->

<script>
function noDigits(event) {
  if (",./\|[]{}()_-=+'*&^%$#@!№;:?qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890".indexOf(event.key) != -1)
    event.preventDefault();
}

function noDigitsV2(event) {
  if (",./\|[]{}()_-=+'*&^%$#@!№;:?йцукенгшщзхъфывапролджэячсмитьбюёЁЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ".indexOf(event.key) != -1)
    event.preventDefault();
}
</script>

<body>
  <?php require 'templates/header.php'; ?>
  <!-- форма регистраций -->
  <div class="auth">
    <form action="database/signup.php" method='post'>
      <input class='form_actions' placeholder='Фамилия' name='surname' type="text" onkeypress="noDigits(event)">
      <input class='form_actions' placeholder='Имя' name='name'  type="text" onkeypress="noDigits(event)">
      <input class='form_actions' placeholder='Отчество' name='patronymic'  type="text" onkeypress="noDigits(event)">
      <input class='form_actions' placeholder='Желаемый логин' name='login'  type="text" onkeypress="noDigitsV2(event)">
      <input class='form_actions' placeholder='Email' name='email'  type="text">
      <input class='form_actions' placeholder='Пароль' name='password' minLength='6'  type="password" required>
      <input class='form_actions' placeholder='Повторите пароль' minLength='6' name='password_confirm'  type="password" required>
      <button class='form_actions btn' type='submit'>Зарегистрироваться</button>
      <p>
        <!-- форма регистраций -->
        У вас уже есть аккаунт? - <a href="/auth.php">Войдите</a>!
      </p>
      <?php if($_SESSION['message']): ?>
        <p class="message"><?= $_SESSION['message']; ?></p>
         <!-- если есть сесия сообщения то он выводит сообщение -->
      <?php endif; unset($_SESSION['message']); ?>
       <!-- уничтожение переменной -->
    </form>
  </div>
</body>
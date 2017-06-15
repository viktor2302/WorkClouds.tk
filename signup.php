<?php 
require "db.php";
$data = $_POST;
if(isset($data['do_signup']))
{

$errors= array();
if(trim($data['login']) == '')
{
	$errors[] = 'Введите логин!';
}

if(trim($data['email']) == '')
{
	$errors[] = 'Введите email!';
}

if($data['password'] == '')
{
	$errors[] = 'Введите пароль!';
}

if($data['re_password'] != $data['password'])
{
	$errors[] = 'Повторный пароль введен не верно!';
}

if(R::count('users',"login = ?", array($data['login'])) > 0)
{
	$errors[] = 'Пользователь с таким логином уже существует!';
}

if(R::count('users',"email = ?", array($data['email'])) > 0)
{
	$errors[] = 'Пользователь с таким email уже существует!';
}

if(empty($errors))
{
	$user = R::dispense('users');
	$user->login = $data['login'];
	$user->email = $data['email'];
	$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
	R::store($user);
	echo '<div style="color:white;text-align:center;">Вы успешно зарегистрированы!</div>';
	header('Location: login.php');
}else{
	echo '<div style="color:white;text-align:center;">'.array_shift($errors).'</div>';
}
}

 ?>
<body>

<link rel="stylesheet" href="css/style_auth_log.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<style>
body {
  margin: 0;
  background: #000; 
}
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
    background-size: cover;
    transition: 1s opacity;
    filter: blur(3px);
}
	</style>
 
<script>
	$(document).ready(function(){
		$('.field-input').focus(function(){
			$(this).parent().addClass('is-focused has-label');

		});
		$('.field-input').blur(function(){
			if($(this).val() == ''){
				$(this).parent().removeClass('has-label');
			}
			$(this).parent().removeClass('is-focused');
		});

	});


</script>
<div id="wrapper">
	<video src="videoplayback.mp4" autoplay="true" loop="true" height="100%" width="100%" preload="true"></video>
<div id="container_signup">
	<form action="signup.php" method="POST">
 	<div class="field">
	<label for="id_login" class="field-label">Логин</label>
 		<input type="text" id="id_login" name="login" class="field-input"value="<?php echo @$data['login'];?>">
 	</div>

 	<div class="field">
	<label for="id_email" class="field-label">Email</label>
 		<input type="email" id="id_email" name="email"  class="field-input"value="<?php echo @$data['email'];?>">
 	</div>

 	<div class="field">
	<label for="id_password" class="field-label">Пароль</label>
 		<input type="password" id="id_password" name="password"  class="field-input"value="<?php echo @$data['password'];?>">
 	</div>

 		<div class="field">
	<label for="id_re_password" class="field-label">Повторный пароль</label>
 		<input type="password" id="id_re_password" name="re_password"  class="field-input"value="<?php echo @$data['re_password'];?>">
 	</div>

 	
 		<button type="submit" name="do_signup">Зарегистрироваться</button>
 
 	</form>
<div id="text_content">
 <a href="login.php">У вас уже есть учетная запись?</a>
 <br><br>
 <a href="testVideo.html">На главную</a>
</div>
</div>
</div>
<script src="button.js"></script>
</body>
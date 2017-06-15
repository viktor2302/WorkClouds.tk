<html>
	<meta charset="utf-8"/>
	<title>hello</title>
	<head>
		<link rel="stylesheet" href="jquery.mb.YTPlayer.min.css">
		<link rel="stylesheet" href="css/style.css">

  <style>
  .link {
  margin-top: 20px;
  display: block;
  width: 300px;
  height: 300px;
  background: url(iconCloud.svg) no-repeat;
  background-size: 300px 300px;
  color: black;
}
.link span {
  color: black;
  display: block;
  width: 0px;
  height: 0px;
  position: relative;
  left: 110px;
  top: 160px;
  font-size: 30px;
}
a {
  text-decoration: none;
}

    </style>
	</head>
	<body>
		
	<div id="wrapper">
    	<div id="customElement" style="background: #ddd url('assets/mask-1.png') no-repeat center center; background-size: cover"
         class="player" data-property="{
         videoURL:'https://youtu.be/qzBdsppudgI?list=PLFpuwXoLb9FZksU04D9Yny42ZQhlXedNX',
         containment:'#customElement',
          showControls:false, 
          autoPlay:true, 
          loop:true, 
          mute:true, 
          startAt:0, 
          opacity:1, 
          addRaster:true, 
          quality:'default'}"
            >
        <div id="testText">
            <div id="flex-container">
		<div class="flex-element"><a class="link" href=""><span>Новости</span></a></div>
		<div class="flex-element"><a class="link" href=""><span>Скачать</span></a></div>
		<div class="flex-element"><a class="link" href=""><span>Донаты</span></a></div>
		<div class="flex-element"><a class="link" href=""><span>About</span></a></div>
		<div class="flex-element"><a class="link" href="login.php"><span>Личный кабинет</span></a></div>
		<div class="flex-element"><a class="link" href=""><span>Обратная связь</span></a></div>

	</div>

<?php  
require "db.php";
?>
<?php if(isset($_SESSION['logged_user'])) : ?>
	
	Здравствуйте, <?php echo $_SESSION['logged_user']->login; ?>!
	<div id="user">
		<a href="logout.php">Выйти</a>
	</div>
<?php endif; ?>
      

</div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="jquery.mb.YTPlayer.min.js"></script>
    <script>
        var myPlayer;
        jQuery(function () {
            var isIframe=function(){var a=!1;try{self.location.href!=top.location.href&&(a=!0)}catch(b){a=!0}return a};
            myPlayer = jQuery(".player").YTPlayer();
        });

        /*$('#wrapper .flex-element a').on('click', function(e){
        	e.preventDefault();
        });*/

    </script>
	</body>
</html>
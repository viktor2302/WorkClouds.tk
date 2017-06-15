<?php 
require "db.php";
unset($_SESSION['logged_user']);
header('Location: container_index.php');
 ?>
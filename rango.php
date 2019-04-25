<?php
if (!isset($_SESSION)) {
  @session_start();

}
?>
<?php

if($_SESSION['rang']==2){

	include('cliente/index.php');	
		}
?>
<?php
if($_SESSION['rang']==3){
	include('jefe_administrativo/inicio.php');
	}
?>

<?php
if($_SESSION['rang']==4){
	include('inicio.php');
		}
?>
<?php
if($_SESSION['user_login_status']==1){
	include('index.php');
		}
?>
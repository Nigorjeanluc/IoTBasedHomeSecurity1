<?php
session_start();
include("../connect.php");
	if(isset($_POST['poo'])){
		$username = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
		$sql= "SELECT * FROM users WHERE email='$username' AND password='$password'";
		$res= mysqli_query($dbcon,$sql) or die ("Failed".mysqli_error());
		$row= mysqli_fetch_array($res);
		if(isset($row)){
			$_SESSION['user']=$row['name'];
			$_SESSION['ID_user']=$row['id'];
			echo "<meta http-equiv='refresh' content='0;url=../admin/index.php'>";
		}else{
			echo "<meta http-equiv='refresh' content='0;url=../admin/login.php?yes=0'>";
		}
	}
?>
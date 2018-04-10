<?php
session_start();
include("../connect.php");
	if(isset($_POST['testi'])){
		$name = mysqli_real_escape_string($dbcon,(htmlentities($_POST['name'])));
		$role = mysqli_real_escape_string($dbcon,(htmlentities($_POST['role'])));
        $content = mysqli_real_escape_string($dbcon,(htmlentities($_POST['content'])));
		$sql= 'INSERT INTO test(Name,Role,Content,Date) VALUES(\''.$name.'\',\''.$role.'\',\''.$content.'\',now())';
        $res= mysqli_query($dbcon,$sql);
        //echo $sql;
		if($res){
			echo "<meta http-equiv='refresh' content='0;url=../admin/test.php?yes=0'>";
		}else{
			echo "<meta http-equiv='refresh' content='0;url=../admin/test.php?no=0'>";
		}
	}
	if(isset($_POST['msg'])){
		$day = mysqli_real_escape_string($dbcon,(htmlentities($_POST['day'])));
        $content = mysqli_real_escape_string($dbcon,(htmlentities($_POST['content'])));
		$sql= 'INSERT INTO gahunda(Day,Content,Date) VALUES(\''.$day.'\',\''.$content.'\',now())';
        $res= mysqli_query($dbcon,$sql);
        //echo $sql;
		if($res){
			echo "<meta http-equiv='refresh' content='0;url=../admin/msg.php?yes=0'>";
		}else{
			echo "<meta http-equiv='refresh' content='0;url=../admin/msg.php?no=0'>";
		}
	}
	if(isset($_POST['pub'])){
		$name = mysqli_real_escape_string($dbcon,(htmlentities($_POST['name'])));
		$targetFolder = "../img/pub/";
		$targetFolders = "img/pub/";
        $picone= $targetFolder.basename($_FILES['picone']['name']);
        $file_tmp1=$_FILES['picone']['tmp_name'];
		move_uploaded_file($file_tmp1,$picone);
        $piconein= $targetFolders.basename($_FILES['picone']['name']);
		$sql= 'INSERT INTO adverts(Company,Picture,Date) VALUES(\''.$name.'\',\''.$piconein.'\',now())';
        $res= mysqli_query($dbcon,$sql);
        //echo $sql;
		if($res){
			echo "<meta http-equiv='refresh' content='0;url=../admin/pub.php?yes=0'>";
		}else{
			echo "<meta http-equiv='refresh' content='0;url=../admin/pub.php?no=0'>";
		}
	}
	if(isset($_POST['edit'])){
        $name = mysqli_real_escape_string($dbcon,htmlentities($_POST['admin']));
		$password = htmlentities($_POST['password']);
        $sid=$_POST['id'];
		$_SESSION['admin']=$name;
		$sql= "UPDATE staff SET Username = '$name', Password='$password', Date=now() WHERE ID ='$sid'";
		$res= mysqli_query($dbcon,$sql) or die ("Failed".mysqli_error());
		if(isset($res)){
			echo "<meta http-equiv='refresh' content='0;url=../admin/profile.php?yes=0'>";
		}else{
			echo "<meta http-equiv='refresh' content='0;url=../admin/profile.php?no=0'>";
		}
	}
?>
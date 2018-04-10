<?php
session_start();
include("../connect.php");
	if(isset($_POST['yes'])){
		$name = mysqli_real_escape_string($dbcon,(htmlentities($_POST['name'])));
        $email = mysqli_real_escape_string($dbcon,(htmlentities($_POST['email'])));
        $phone = mysqli_real_escape_string($dbcon,(htmlentities($_POST['tel'])));
        $subject = mysqli_real_escape_string($dbcon,(htmlentities($_POST['subject'])));
        $msg = mysqli_real_escape_string($dbcon,(htmlentities($_POST['message'])));
        $nu = 1;
		$sql= 'INSERT INTO msg(Name,Email,Phone,Subject,Msg,counter) VALUES(\''.$name.'\',\''.$email.'\',\''.$phone.'\',\''.$subject.'\',\''.$msg.'\',\''.$nu.'\')';
        $res= mysqli_query($dbcon,$sql);
        //echo $sql;
		if($res){
			echo "<meta http-equiv='refresh' content='0;url=../contact.php?yes=0'>";
		}else{
			echo "<meta http-equiv='refresh' content='0;url=../contact.php?no=0'>";
		}
	}
?>
<?php
    session_start();
    include("../connect.php");
	if(isset($_REQUEST['del'])){
		$ID = $_REQUEST['del'];
        $target = $ID;
		$sql= "DELETE FROM msg WHERE ID ='$ID'";
		$res= mysqli_query($dbcon,$sql);
        if($res){
		    echo "<meta http-equiv='refresh' content='0;url=../admin/messages.php?yess=1&&#here'>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../admin/messages.php?noo=1&&#here'>";
        }
	}
    if(isset($_REQUEST['dell'])){
		$ID = $_REQUEST['dell'];
        $target = $ID;
		$sql= "DELETE FROM test WHERE ID ='$ID'";
		$res= mysqli_query($dbcon,$sql);
        if($res){
		    echo "<meta http-equiv='refresh' content='0;url=../admin/test.php?yesss=1&&#here'>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../admin/test.php?nooo=1&&#here'>";
        }
	}
    if(isset($_REQUEST['delll'])){
		$ID = $_REQUEST['delll'];
        $target = $ID;
		$sql= "DELETE FROM gahunda WHERE ID ='$ID'";
		$res= mysqli_query($dbcon,$sql);
        if($res){
		    echo "<meta http-equiv='refresh' content='0;url=../admin/msg.php?yesss=1&&#here'>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=../admin/msg.php?nooo=1&&#here'>";
        }
	}
?>
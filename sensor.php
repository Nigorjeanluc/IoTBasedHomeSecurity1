<?php
    include("connect.php");
    if(isset($_GET['lightSensor'])){
		$lightSensor = $_GET['lightSensor'];
        $flameSensor1 = $_GET['flameSensor1'];
        $flameSensor2 = $_GET['flameSensor2'];
        $flameSensor3 = $_GET['flameSensor3'];
        $flameSensor4 = $_GET['flameSensor4'];
        $celcius = $_GET['celcius'];
        $fahrenheit = $_GET['fahrenheit'];
        $sql= "INSERT INTO sensors(LightSensor,FlameSensor1,FlameSensor2,FlameSensor3,FlameSensor4,Celcius,Fahrenheit,created_at,updated_at) 
        VALUES('$lightSensor','$flameSensor1','$flameSensor2','$flameSensor3','$flameSensor4','$celcius','$fahrenheit',now(),now())";
        $res= mysqli_query($dbcon,$sql) or die ("Failed".mysqli_error());
        if(isset($res)){
        echo "<meta http-equiv='refresh' content='0;url=response.php?yes=1'>";
        }else{
        echo "<meta http-equiv='refresh' content='0;url=response.php?yes=0'>";
        }
    }
?>
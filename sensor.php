<?php
    $host='127.0.0.1';
    $user='Nigorjeanluc';
    $password='nigor210694';
    $dbname='IoTBasedHomeSecurity';
    $dbcon=mysqli_connect($host,$user,$password,$dbname);
    if(mysqli_connect_errno())
        {
            die('Connection Failed!'.mysqli_connect_error());
        }
    
    if(isset($_GET['lightSensor'])){
		$lightSensor = $_GET['lightSensor'];
        $flameSensor1 = $_GET['flameSensor1'];
        $flameSensor2 = $_GET['flameSensor2'];
        $flameSensor3 = $_GET['flameSensor3'];
        $flameSensor4 = $_GET['flameSensor4'];
        $celcius = $_GET['celcius'];
        $fahrenheit = $_GET['fahrenheit'];
        $sql= "INSERT INTO sensors(LightSensor,FlameSensor1,FlameSensor2,FlameSensor3,FlameSensor4,Celcius,Fahrenheit,HumanDetect,created_at,updated_at) 
        VALUES('".$_GET["lightSensor"]."','".$_GET["flameSensor1"]."','".$_GET["flameSensor2"]."','".$_GET["flameSensor3"]."','".$_GET["flameSensor4"]."','".$_GET["celcius"]."','".$_GET["fahrenheit"]."','".$_GET["humandetect"]."',now(),now())";
        $res= mysqli_query($dbcon,$sql) or die ("Failed to insert".mysqli_error());
        if(isset($res)){
            header("Location: response.php?yes=1");
        }else{
            header("Location: response.php?yes=0");
        }
    }
?>
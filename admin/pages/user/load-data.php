<?php
    include ('../../../connect.php');
    $dataNewCount = $_POST['dataNewCount'];
    $sql = "SELECT * FROM sensors ORDER BY id DESC LIMIT $dataNewCount";
    $result = mysqli_query($dbcon, $sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<p>";
            echo $row['Celcius'];
            echo "<br>";
            echo $row['created_at'];
            echo "</p>";
        }
    } else {
        echo "No data!";
    }
?>
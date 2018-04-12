<?php
    include('../../../connect.php');
    $query = "SELECT * FROM sensors ORDER BY id DESC LIMIT 10";
    $res = mysqli_query($dbcon, $query);
    $array_info = array();
    while($row = mysqli_fetch_array($res)){
        $array_info[] = $row;
    }

    echo json_encode($array_info);

?>
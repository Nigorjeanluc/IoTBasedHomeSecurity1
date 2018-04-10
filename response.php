<?php
    include("connect.php");
    $yes=isset($_REQUEST['yes']);
    if($yes=1){
        $sqli="SELECT * FROM sensors ORDER BY ID DESC LIMIT 1";
        $result=mysqli_query($dbcon,$sqli);
        while ($row=mysqli_fetch_assoc($result)) {
            echo'Data successfully stored at '.$row["updated_at"];
        }
    }else{
        echo'Data not stored in the database. ';
        $sqlii="SELECT * FROM sensors ORDER BY ID DESC LIMIT 1";
        $result=mysqli_query($dbcon,$sqlii);
        while ($row=mysqli_fetch_assoc($result)) {
            echo'Last data stored at '.$row["updated_at"];
        }
    }
?>
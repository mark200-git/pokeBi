<?php
    require("connection.php");
    $simal = $_POST["temp_pass"];
    echo $simal;
    $passTest = crypt($_POST["temp_pass"], PASSWORD_DEFAULT);
    echo $passTest;
    $query = "INSERT INTO sandbox(field) VALUES('.$passTest.')";
    $useQuery = mysqli_query($connect, $query);
   // $checkQ = "SELECT field FROM sandbox WHERE"
?>
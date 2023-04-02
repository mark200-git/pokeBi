<?php
require "connection.php";
$getUser = $_POST["login"];
$getPassword = $_POST["userPassword"];
$user = $connect->real_escape_string($getUser);
$pass = $connect->real_escape_string($getPassword);

$checkUserExistence = "SELECT * FROM users WHERE nickname = ?";
$queryBind = $connect->prepare($checkUserExistence);
$queryBind->bind_param("s", $user);
$queryBind->execute();
$userChecker = $queryBind->get_result();
$userAfter = $userChecker->fetch_row();
$userRow = $userAfter[1];
echo $userRow;
if(is_null($userRow)){
    echo "Użytkownik o takim nicku nie istnieje";
}
else{
    $firstPassCheck = "SELECT first_password FROM users WHERE nickname = ?";
    $bindFPC= $connect->prepare($firstPassCheck);
    $bindFPC->bind_param("s", $user);
    $bindFPC->execute();
    $fpcChecker = $bindFPC->get_result();
    $fpcAfter = $fpcChecker->fetch_row();
    $getFPC = $fpcAfter[0];
    echo $getFPC;
    if(is_null($getFPC)){
        $mainPassCheck = "SELECT main_password FROM users WHERE nickname =?";
        $bindMPC = $connect->prepare($mainPassCheck);
        $bindMPC->bind_param("s",$user);
        $bindMPC->execute();
        $mpcCheck = $bindMPC->get_result();
        $mpcAfter = $mpcChecker->fetch_row();
        $getMPC = $mpcAfter[0];
        echo $getMPC;
    }
    else{
        if(password_verify($pass, $getFPC)){
            echo "Password git";

        }
        else{
            echo "password non git";
        }
    }
}

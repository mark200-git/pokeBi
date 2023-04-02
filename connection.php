<?php
$username = 'pokeplayer';
$password = 'password';
$database = 'pokebilans';
$host = 'localhost';
$connect = mysqli_connect($host, $username, $password, $database);
if ($connect->connect_errno) {
    echo $connect->connect_errno;
    
}
//else{
//    echo 'Connect success';
//}

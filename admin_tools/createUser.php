<?php
//phpinfo();
require "../connection.php";
$login = $_POST['nickname'];
$f_password = $_POST['firstPassword'];
$login = $connect->real_escape_string($login);
$f_password = $connect->real_escape_string($f_password);
$hashedF_password = password_hash($f_password, PASSWORD_BCRYPT);
$addUserQuery = "INSERT INTO users (nickname, first_password) VALUES(?,?)";
$queryBind = $connect->prepare($addUserQuery);
$queryBind->bind_param("ss", $login, $hashedF_password);
$queryBind->execute();
echo "<a href='createUser.html'>Następny</a>";
?>
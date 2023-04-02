<?php
require 'connection.php';
/* $showPoke = $_POST['pokemon_select'];
echo $showPoke;
$showId = $_POST['idPok'];
echo $showId;
$showDate = $_POST['huntDate'];
echo $showDate;*/
$getPokemon = $_POST['pokemon_select'];
$getNickname = $_POST['nickname_select'];
$getHuntDate = $_POST['huntDate'];
// if($getNickname === "Wybierz nick" || $getPokemon === "Wybierz pokemona" || empty($getHuntDate)){
//    echo "nie może być";

//  else{
$insertSome = "INSERT INTO hunts(id_user, id_sh_pokemon, date_hunt) VALUES((SELECT id_user FROM users WHERE nickname = '" . $getNickname . "'),(SELECT id_pokemon FROM pokemons WHERE pokemon_name= '".$getPokemon."'),(CAST('".$getHuntDate."' AS DATE)))";
$query = mysqli_query($connect, $insertSome);
$selectTable = 'SELECT id_hunt, nickname, pokemon_name, date_hunt FROM hunts INNER JOIN users ON hunts.id_user = users.id_user INNER JOIN pokemons ON hunts.id_sh_pokemon = pokemons.id_pokemon;
';
$useSelect = mysqli_query($connect,$selectTable);
echo "<table><tr><th>ID Polowania</th><th>Nick gracza</th><th>Złapany pokemon</th><th>Data polowania</th></tr>";
if(mysqli_num_rows($useSelect)>0){
    while($row = mysqli_fetch_assoc($useSelect)){
        echo "<tr><td class='record'>".$row["id_hunt"]."</td><td class='record'>".$row["nickname"]."</td><td class='record'>".$row["pokemon_name"]."</td><td class='record'>".$row['date_hunt']."</td></tr>";
    }
} else{
    echo "0 results";
}
//mysqli_close($connect);

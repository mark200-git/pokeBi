<?php 
    require ('connection.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokebilans</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title_bilans">Pokebilans 3.0 ( wersja alpha )</h1>
    <p class="rare">Przedstawiam wam Pokebilans 3.0 w wersji alpha. Oznacza to że jest to ultra podstawowa wersja naszego pokebilansu i będzie się rozwijać. Jak na razie możecie tylko dodawać polowania do bazy.<br> Ogólnie całość wygląda jak wygląda, wybieracie nick, pokemona którego złapaliście i datę kiedy to zrobiliście. POLA NIE MOGĄ BYĆ PUSTE. <br>Po uzupełnieniu pól wciskacie Submit i jesteście przekierowani na stronę na której pojawiają się dodane rekordy do bazy.<br> Kto ma dostęp do arkusza od AlexeiK i ma chęć, to niech uzupełnia statystyki dla Stow, będzie można później elegancko to podsumować na koniec miesiąca/roku itp.</p>
    <form name="pokebilans" action="insert.php" method="POST" class="form">
        <label for="nickname_select">Wybierz nick</label>
        <select name="nickname_select">
            <option>Wybierz nick</option>
            <?php
                $selectNick = 'SELECT nickname FROM users';
                $showNicks = mysqli_query($connect, $selectNick);
                if(mysqli_num_rows($showNicks) > 0){
                    while($row = mysqli_fetch_assoc($showNicks)){
                        echo "<option value = '".$row['nickname']."'>".$row['nickname']."</option>";
                    }
                }
            ?>
        </select>
        <label for="pokemon_select">Wybierz pokemona</label>
        <select name="pokemon_select" id="idPok"> 
            <option value="Wybierz pokemona">Wybierz pokemona</option>
            <?php
                $selectPokemon = 'SELECT pokemon_name AS pokemon FROM pokemons WHERE pokemons.catchable = 1';
                $showPokemon = mysqli_query($connect, $selectPokemon);
                if(mysqli_num_rows($showPokemon) >0){
                    while($row = mysqli_fetch_assoc($showPokemon)){
                        echo "<option value ='".$row['pokemon']."'>".$row['pokemon']."</option>";
                    }
                }
            ?>
        </select>
        <label for ="huntDate">Podaj datę złapania pokemona</label>
        <input type="date" name="huntDate" pattern="YYYY-MM-DD">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php
//INSERT INTO hunts(id_user, id_sh_pokemon, date_hunt) VALUES((SELECT id_user FROM users WHERE nickname = "Durson"), (SELECT id_pokemon FROM pokemons WHERE pokemon_name = "Caterpie"), 2022-04-10);
?>


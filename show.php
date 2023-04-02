<?php
    require('connection.php');
    
    $showSiny = 'SELECT p.name_pokemon AS Pokemon, w.wilderness_name AS Dzicz, r.region_name AS Region
                 FROM shiny_wildernesses sw
                 INNER JOIN pokemons p ON sw.id_pokemon=p.id_pokemon
                 INNER JOIN wildernesses w ON sw.id_wilderness=w.id_wilderness
                 INNER JOIN regions r ON sw.id_region = r.id_region';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Pokebilans 3.0</h1>

<table>
    <?php
        $result = mysqli_query($connect, $showSiny);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td class='record'>".$row["Pokemon"]."</td><td class='record'>".$row["Dzicz"]."</td><td class='record'>".$row["Region"]."</td></tr>";
            }
        } else{
            echo "0 results";
        }
        mysqli_close($connect);
    ?>
</table>
</body>
</html>
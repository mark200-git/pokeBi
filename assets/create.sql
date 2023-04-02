CREATE TABLE pokemons(
    id_pokemon INT PRIMARY KEY AUTO_INCREMENT,
    id_pokedex CHAR(10),
    pokemon_name VARCHAR(30) NOT NULL,
    catchable TINYINT(1)
);
CREATE TABLE regions(
    id_region INT PRIMARY KEY AUTO_INCREMENT,
    region_name CHAR(20) NOT NULL
);
CREATE TABLE prices(
    id_price INT PRIMARY KEY AUTO_INCREMENT,
    price_value_PZ INT NOT NULL
);
CREATE TABLE users(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(30) NOT NULL
);
CREATE TABLE wildernesses(
    id_wilderness INT PRIMARY KEY AUTO_INCREMENT,
    wilderness_name VARCHAR(50) NOT NULL,
    id_region INT,
    CONSTRAINT FK_region FOREIGN KEY(id_region) REFERENCES regions(id_region)
);
CREATE TABLE pokemon_locations(
    id_pokemonLocation INT PRIMARY KEY AUTO_INCREMENT,
    id_pokemon INT,
    id_wilderness INT,
    id_region INT,
    CONSTRAINT FK_pokemon FOREIGN KEY(id_pokemon) REFERENCES pokemons(id_pokemon),
    CONSTRAINT FK_wilderness FOREIGN KEY(id_wilderness) REFERENCES wildernesses(id_wilderness),
    CONSTRAINT FK_regionLoc FOREIGN KEY(id_region) REFERENCES regions(id_region)
);
CREATE TABLE shiny_Locations(
    id_shLocations INT PRIMARY KEY AUTO_INCREMENT,
    id_shPokemon INT,
    id_wilderness INT,
    CONSTRAINT FK_shPokemon FOREIGN KEY(id_shPokemon) REFERENCES pokemons(id_pokemon),
    CONSTRAINT FK_shWilderness FOREIGN KEY(id_wilderness) REFERENCES wildernesses(id_wilderness)
);
CREATE TABLE shiny_prices(
    id_shPrices INT PRIMARY KEY AUTO_INCREMENT,
    id_pokemon INT,
    id_price INT,
    CONSTRAINT FK_shPok FOREIGN KEY(id_pokemon) REFERENCES pokemons(id_pokemon),
    CONSTRAINT FK_shPrice FOREIGN KEY(id_price) REFERENCES prices(id_price)
);
CREATE TABLE hunts(
    id_hunt INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_sh_pokemon INT NOT NULL,
    date_hunt DATE NOT NULL,
    CONSTRAINT FK_huntUser FOREIGN KEY(id_user) REFERENCES users(id_user),
    CONSTRAINT FK_sh_pP FOREIGN KEY(id_sh_pokemon) REFERENCES pokemons(id_pokemon)
);
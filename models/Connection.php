<?php

function connection(){
    $dbHost = "localhost";
    $dbUser = "root";
    $dbUserPassword = "";
    $dbName = "mvcphp";

    try{
        $connection = new PDO(  "mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbUserPassword);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    } catch(PDOException $e){
        die("Echec de la connexion : " . $e->getMessage());
    }
}

<?php

require_once('models/Film.php');
require_once('UserController.php');

function add(){
    if(isset($_POST['title'], $_POST['producer'], $_POST['synopsis'], $_POST['type'], $_POST['scenarist'], $_POST['productionCompany'], $_POST['releaseYear'])){
        $title = $_POST['title'];
        $producer = $_POST['producer'];
        $synopsis = $_POST['synopsis'];
        $type = $_POST['type'];
        $scenarist = $_POST['scenarist'];
        $productionCompany = $_POST['productionCompany'];
        $releaseYear = $_POST['releaseYear'];

        if(!empty($title) && !empty($producer) && !empty($synopsis) && !empty($type) && !empty($scenarist) && !empty($productionCompany) && !empty($releaseYear)){
            $film = new Film(null, $title, $producer, $synopsis, $type, $scenarist, $productionCompany, $releaseYear, 1);
            $film->add($title, $producer, $synopsis, $type, $scenarist, $productionCompany, $releaseYear, 1);
            echo 'Film ajouté';
        } else {
            echo 'Tous les champs doivent être remplis.';
        }
    }

    require_once('views/film/form.php');
}

function library(){
    if($_SESSION == null){
        login();
    } else {
        $films = Film::getFilms();
        require_once('views/film/library.php');
    }
}

function update($id){
    $film = Film::getFilmById($id);
    if(!$film){
        $message = "Film introuvable";
    } else {
        require_once('views/film/updateForm.php');
    }
}

function delete($id){
    $film = Film::getFilmById($id);
    if(!$film){
        $message = "Film introuvable";
    } else {
        Film::delete($id);
    }

    $films = Film::getFilms();
    require_once('views/livre/library.php');
}

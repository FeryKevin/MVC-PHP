<?php

require('User.php');
require('Connection.php');

Class Film{

    private int $id;
    private string $title;
    private string $producer;
    private string $synopsis;
    private string $type;
    private string $scenarist;
    private string $productionCompany;
    private string $releaseYear;
    private User $user;
    
    public function __construct($id, $title, $producer, $synopsis, $type, $scenarist, $productionCompany, $releaseYear, $user)
    {
        $this->id = $id;
        $this->title = $title;
        $this->producer = $producer;
        $this->synopsis = $synopsis;
        $this->type = $type;
        $this->scenarist = $scenarist;
        $this->productionCompany = $productionCompany;
        $this->releaseYear = $releaseYear;
        $this->user = $user;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getProducer(): string {
        return $this->producer;
    }

    public function setProducer(string $producer): void {
        $this->producer = $producer;
    }

    public function getSynopsis(): string {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): void {
        $this->synopsis = $synopsis;
    }

    public function getType(): string {
        return $this->type;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function getScenarist(): string {
        return $this->scenarist;
    }

    public function setScenarist(string $scenarist): void {
        $this->scenarist = $scenarist;
    }

    public function getProductionCompany(): string {
        return $this->productionCompany;
    }

    public function setProductionCompany(string $productionCompany): void {
        $this->productionCompany = $productionCompany;
    }

    public function getReleaseYear(): string {
        return $this->releaseYear;
    }

    public function setReleaseYear(string $releaseYear): void {
        $this->releaseYear = $releaseYear;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function setUser(User $user): void {
        $this->user = $user;
    }

    public function add($title, $producer, $synopsis, $type, $scenarist, $productionCompany, $user){
        $db = connection();
        $stat = $db->prepare('INSERT INTO film (title, producer, synopsis, type, scenarist, productionCompany, releaseYear)
            VALUES (:id, :title, :producer, :synopsis, :type, :scenarist, :productionCompany, :releaseYear, :user)');
        $stat->bindParam(':title', $title, PDO::PARAM_STR);
        $stat->bindParam(':producer', $producer, PDO::PARAM_STR);
        $stat->bindParam(':synopsis', $synopsis, PDO::PARAM_STR);
        $stat->bindParam(':type', $type, PDO::PARAM_STR);
        $stat->bindParam(':scenarist', $scenarist, PDO::PARAM_STR);
        $stat->bindParam(':productionCompany', $productionCompany, PDO::PARAM_STR);
        $stat->bindParam(':user', $user, PDO::PARAM_INT);
        $stat->execute();
    }

    public static function getFilms(){
        try{
            $db = connection();
            $stat = $db->prepare("SELECT * FROM film");
            $stat->execute();
            $films = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $films;
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public static function getFilmById($filmId){
        try {
            $db = connection();
            $stat = $db->prepare("SELECT * FROM film WHERE id = :id");
            $stat->bindParam(':id', $filmId, PDO::PARAM_INT);
            $stat->execute();
            $film = $stat->fetch(PDO::FETCH_ASSOC);
            return $film;
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public function update($id, $title, $producer, $synopsis, $type, $scenarist, $productionCompany, $user){
        try {
            $db = connection();
            $stat = $db->prepare('UPDATE film SET title = :title, producer= :producer, synopsis= :synopsis, type= :type, scenarist= :scenarist, productionCompany= :productionCompany, releaseYear= :releaseYear)
                WHERE id = :id');
            $stat->bindParam(':id', $id, PDO::PARAM_INT);
            $stat->bindParam(':title', $title, PDO::PARAM_STR);
            $stat->bindParam(':producer', $producer, PDO::PARAM_STR);
            $stat->bindParam(':synopsis', $synopsis, PDO::PARAM_STR);
            $stat->bindParam(':type', $type, PDO::PARAM_STR);
            $stat->bindParam(':scenarist', $scenarist, PDO::PARAM_STR);
            $stat->bindParam(':productionCompany', $productionCompany, PDO::PARAM_STR);
            $stat->bindParam(':user', $user, PDO::PARAM_INT);
            $stat->execute();
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public static function delete($id){
        try {
            $db = connection();
            $stat = $db->prepare('DELETE FROM film WHERE id = :id');
            $stat->bindParam(':id', $id, PDO::PARAM_INT);
            $stat->execute();
            return true;
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
            return false;
        }
    }
}

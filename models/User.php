<?php

Class User{

    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private DateTime $created_At;
    private DateTime $updated_At;
    
    public function __construct()
    {
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getCreated_At(): DateTime {
        return $this->created_At;
    }

    public function setCreatedAt(DateTime $created_At): void {
        $this->created_At = $created_At;
    }

    public function getUpdatedAt(): DateTime {
        return $this->updated_At;
    }

    public function setUpdatedAt(DateTime $updated_At): void {
        $this->updated_At = $updated_At;
    }

    public static function create($username, $email, $password){
        try {
            $db = connection();
            $stat = $db->prepare('INSERT INTO user (username, email, password, created_at, updated_at)
                VALUES (:username, :email, :password, NOW(), NOW())');

            $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

            $stat->bindParam(':username', $username, PDO::PARAM_STR);
            $stat->bindParam(':email', $email, PDO::PARAM_STR);
            $stat->bindParam(':password', $password, PDO::PARAM_STR);
            $stat->execute();

            $user_id = $db->lastInsertId();

            return new User ($user_id, $username, $email, $password, new DateTime(), new DateTime());
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }

    public static function getByEmail($email) {
        $db = connection();
        $stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($userData) {
            $user = new User();
            $user->setId($userData['id']);
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            $created_at = new DateTime($userData['created_at']);
            $user->setCreatedAt($created_at);
            $updated_at = new DateTime($userData['updated_at']);
            $user->setUpdatedAt($updated_at);

            return $user;
        } else {
            return null;
        }
    }
}

<?php

Class User{

    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private DateTime $created_At;
    private DateTime $updated_At;
    
    public function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;        
    }

    public function getId(): ?int {
        return $this->id ?? null;
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

    /* EMAIL VERIFY */
    public static function getByEmail($email) {
        $db = connection();
        $stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            $user = new User($userData['username'], $userData['email'], $userData['password']);
            $user->setId($userData['id']);
            $created_at = new DateTime($userData['created_at']);
            $user->setCreatedAt($created_at);
            $updated_at = new DateTime($userData['updated_at']);
            $user->setUpdatedAt($updated_at);

            return $user;
        } else {
            return null;
        }
    }

    /* REGISTER */
    public static function create($username, $email, $password){
        try {
            $db = connection();
            $stat = $db->prepare('INSERT INTO user (username, email, password, created_at, updated_at)
                VALUES (:username, :email, :password, NOW(), NOW())');
            $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
            $stat->bindParam(':username', $username, PDO::PARAM_STR);
            $stat->bindParam(':email', $email, PDO::PARAM_STR);
            $stat->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stat->execute();
            $user_id = $db->lastInsertId();
            $user = new User ($user_id, $username, $email, $hashedPassword, new DateTime(), new DateTime());
            $user->setId($user_id);

            return $user;
        } catch (PDOException $e) {
            die('Erreur de requête : ' . $e->getMessage());
        }
    }
}

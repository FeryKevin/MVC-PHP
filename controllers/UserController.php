<?php

function signin(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $existingUser = User::getByEmail($email);

        if($existingUser){
            $mailTaker = "L'email existe déjà";
        } else {
            $user = User::create($username, $email, $password);

            if($user){
                $message = "Inscription réussie";
            } else {
                $message = "Erreur lors de l'inscription";
            }
        }
    }

    require_once('views/signin.php');
}

function login(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::getByEmail($email);

        if($user && password_verify($password, $user->getPassword())){
            session_start();
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();
            header("Location: /Film/library");
            exit;
        } else {
            $message = "Identifiants incorrects.";
        }
    }

    require_once('views/user/login.php');
}

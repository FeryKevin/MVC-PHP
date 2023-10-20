<?php

function signin(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $existingUser = User::getByEmail($email);
        
        if($existingUser){
            $message = "L'email existe déjà";
        } else { 
            if(!empty($username) && !empty($email) && !empty($password)){
                if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{8,}$/', $password)) {
                    $user = User::create($username, $email, $password);
                    if($user){
                        $message = "Inscription réussie";
                    }
                }else{
                    $message = "Veuillez respecter les conditions pour le mot de passe.";
                }
            } else {
                $message = "Veuillez remplir tous les champs";
            }
        }
    }

    require_once('views/user/signin.php');
}

function login(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::getByEmail($email);

        if($user && password_verify($password, $user->getPassword())){
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();

            header("Location: /library");
            return;

        } else {
            $message = "Identifiants incorrects.";
        }
    }

    require_once('views/user/login.php');
}

function logout() {
    unset($_SESSION['user_id'], $_SESSION['email'], $_SESSION['username']);

    header("Location: /login");
}
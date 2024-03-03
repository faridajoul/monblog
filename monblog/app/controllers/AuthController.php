<?php
require_once 'D:/xampp/htdocs/monblog/app/models/AuteurModel.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $auteurModel = new AuteurModel();
            $auteur = $auteurModel->authenticate($username, $password);

            if ($auteur) {
                // Authentification réussie, démarrez la session
                session_start();
                $_SESSION['authenticated'] = true;
                $_SESSION['username'] = $auteur['username'];
                header('Location: /monblog/billet/index');
                exit();
            } else {
                $error = 'Identifiants invalides';
            }
        }

        // Afficher le formulaire de connexion
        require_once 'D:/xampp/htdocs/monblog/app/views/auth/login.php';
    }

    public function logout()
    {
        // Déconnectez l'utilisateur et détruisez la session
        session_start();
        session_destroy();
        header('Location: /monblog/auth/login');
        exit();
    }
}

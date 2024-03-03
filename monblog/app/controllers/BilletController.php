// app/controllers/BilletController.php
<?php
require_once 'D:/xampp/htdocs/monblog/app/models/BilletModel.php';

class BilletController {
    public function index() {
        // Vérifier si l'utilisateur est connecté
        session_start();
        if (!isset($_SESSION['user_id'])) {
            // Rediriger vers la page de connexion
            header('Location: /monblog/public/index.php?action=login');
            exit();
        }

        $billetModel = new BilletModel();
        $billets = $billetModel->getAll();

        // Appel de la vue
        require_once 'D:/xampp/htdocs/monblog/app/views/billet/index.php';
    }

    public function login() {
        // Vérifier les identifiants et connecter l'utilisateur
        // (Implémentation de la logique de connexion ici)

        // Exemple simple de vérification (à améliorer)
        if ($_POST['username'] === 'utilisateur' && $_POST['password'] === 'motdepasse') {
            session_start();
            $_SESSION['user_id'] = 1; // Id de l'utilisateur en base de données
            header('Location: /monblog/public/index.php?action=vueAccueil');
            exit();
        }

        // Afficher la page de connexion en cas d'échec
        require_once 'D:/xampp/htdocs/monblog/app/views/login.php';
    }

    public function vueAccueil() {
        // Vérifier si l'utilisateur est connecté
        session_start();
        if (!isset($_SESSION['user_id'])) {
            // Rediriger vers la page de connexion
            header('Location: /monblog/public/index.php?action=login');
            exit();
        }

        // Appel de la vue d'accueil
        require_once 'D:/xampp/htdocs/monblog/app/views/vueAccueil.php';
    }
}

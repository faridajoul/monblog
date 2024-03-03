// public/index.php
<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

require_once 'D:/xampp/htdocs/monblog/app/controllers/BilletController.php';

$billetController = new BilletController();

switch ($action) {
    case 'index':
        $billetController->index();
        break;
    case 'login':
        $billetController->login();
        break;
    case 'vueAccueil':
        $billetController->vueAccueil();
        break;
    default:
        // Gérer les autres actions si nécessaire
        break;
}

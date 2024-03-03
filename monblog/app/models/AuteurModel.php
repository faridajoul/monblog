<?php
require_once 'D:/xampp/htdocs/monblog/config/database.php';

class AuteurModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function authenticate($username, $password) {
        $query = $this->db->prepare('SELECT * FROM t_auteur WHERE username = :username AND password = :password');
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

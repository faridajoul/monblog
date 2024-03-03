<?php
require_once 'D:/xampp/htdocs/monblog/config/database.php';

class BilletModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM t_billet');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

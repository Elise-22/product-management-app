<?php

namespace Data;

use PDO;
use PDOException;

class Database{

    private static $instance = null;
    private $connection;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "salecodb";

    // Private constructor to prevent direct object creation
    private function __construct() {
        try {
            $this->connection = new PDO("mysql:host={$this->servername};dbname={$this->database}", 
                                        $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Public static method to return the single instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Method to get the database connection
    public function getConnection() {
        return $this->connection;
    }
}

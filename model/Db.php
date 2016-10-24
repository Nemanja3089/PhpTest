<?php

final class Db
{

    private $host     = "localhost";
    private $user     = "root";
    private $password = "";
    private $db       = "vezba";

    public $pdo;
    private static $instance = null;
    public $conn;

    private function __construct()
    {
        try
        {

            $this->conn = 'mysql:dbname=' . $this->db . ';host=' . $this->host . '';
            $this->pdo  = new PDO($this->conn,
                $this->user,
                $this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
/**
 *  Singleton pattern used for database connection and only one instance of the class will be made
 */
    final public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Db;
        }

        return self::$instance->pdo;
    }
/**
 * close connection to database
 */
    public function __destruct()
    {
        $this->pdo = null;
    }
}

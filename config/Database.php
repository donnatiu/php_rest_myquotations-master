<?php 
  class Database {
    // DB Params
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    // DB Constructor
      public function __construct() {
      $this->host = getenv('MY_HOST');
      $this->db_name = getenv('MY_DB_NAME');
      $this->username = getenv('MY_USERNAME');
      $this->password = getenv('MY_PASSWORD');
    }
    
    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }
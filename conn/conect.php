
<?php
    class Database {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "db_estoque";
        public $conn = null;
    
        public function __construct() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Conexão falhou: " . $this->conn->connect_error);
                
            }
            
        }
        public function __destruct() {
            $this->conn->close();
        }
    }
 ?>
      
      
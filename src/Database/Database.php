<?php

    namespace Todo\Database;
    use PDO;
    
    class Database{
        private $dataSource = 'mysql:host=localhost;dbname=tododb';
        private $user = 'root';
        private $password = '';
        public $pdo;

        public function __construct(){
            try{
                $this->pdo = new PDO($this->dataSource, $this->user, $this->password);

                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }catch(Exception $ex){
                echo "Connection Failed" . $ex->getMessage();
            }
        }
    }
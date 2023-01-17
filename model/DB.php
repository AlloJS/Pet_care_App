<?php

    namespace App\DB;
    use PDO;
    use PDOException;

    class DB 
    {
        public $hostname = 'localhost';
        public $dbname = 'myPetCare';
        public $user = 'root';
        public $password = 'root';
        private function connectionDB()
        {
            try {
                return $connection = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;", $this->user, $this->password);
            } catch (PDOException $e) {
            echo "Connessione non riuscita" . $e->getMessage();
            }
        }
        public function getQuery($query,$array = [])
        {
            $connection = $this->connectionDB();
            try {
                $statement = $connection->prepare($query);
                $statement->execute($array);
            } catch (PDOException $e) {
                echo "La query non ha funzionato" . $e->getMessage();
            }
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } 
    }
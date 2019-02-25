<?php
    class mongodb
    {
        private static $host = "localhost:27017";
        private static $database = "copypasta";
        private static $connection = "";
        private $query = new MongoDB\Driver\Query([]);
        public function __construct(){
            $this->connection = new MongoDB\Driver\Manager("mongodb://".self::$host);
        }
        public static function get(){
            if (is_null(self::$instance)) {
                self::$instance = new db;
            }
            return self::$instance;
        }
        public function getAllTableContent($tableName){
            $rows = $connection->executeQuery($database.$tableName, $query);
            return $rows;
        }
    }
    
    $mongoDB = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    //var_dump($mongoDB);
    $query = new MongoDB\Driver\Query([]);
    $rows = $mongoDB->executeQuery("copypasta.pasta",$query);
    $aMemberships = array('_id', 'pasta_name', 'pasta_content', 'created_at', 'edited_at', 'language', 'user_name');

    foreach ($rows as $row) {
        echo "$row->_id $row->pasta_name : $row->pasta_content\n";
    }
?>
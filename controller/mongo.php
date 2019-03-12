<?php
    class mongodb
    {
        private static $host = "mongo:27017";
        private static $database = "copypasta";
        private $connection = "";
        private static $instance = null;
        public function __construct(){
            $this->connection = new MongoDB\Driver\Manager("mongodb://".self::$host);
        }
        public static function get(){
            if (is_null(self::$instance)) {
                self::$instance = new mongodb;
            }
             //var_dump(self::$instance);
            return self::$instance;
        }
        public function getAllTableContent($tableName){
            $query = new MongoDB\Driver\Query([]);
            $rows = $this->connection->executeQuery(self::$database.'.'.$tableName, $query);
            return $rows;
        }
        public function getFilteredContent($tableName,$filter)
        {
            $query = new MongoDB\Driver\Query($filter);
            $rows = $this->connection->executeQuery(self::$database.'.'.$tableName, $query);
            return $rows;
        }
        public function insertObject($tableName,$object)
        {
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($object);
            $this->connection->executeBulkWrite(self::$database.'.'.$tableName,$bulk);
        }
        public function deleteObject($tableName,$deleteID)
        {
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['_id' => $deleteID]);
            $this->connection->executeBulkWrite(self::$database.'.'.$tableName,$bulk);
        }
    }
    
    /*
    $mongoDB = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    //var_dump($mongoDB);
    $query = new MongoDB\Driver\Query([]);
    $rows = $mongoDB->executeQuery("copypasta.pasta",$query);
    $aMemberships = array('_id', 'pasta_name', 'pasta_content', 'created_at', 'edited_at', 'language', 'user_name');

    foreach ($rows as $row) {
        echo "$row->_id $row->pasta_name : $row->pasta_content\n";
    }
    */
?>
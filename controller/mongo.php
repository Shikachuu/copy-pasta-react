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
            try {
                $query = new MongoDB\Driver\Query([]);
                $rows = $this->connection->executeQuery(self::$database.'.'.$tableName, $query);
                return $rows;
            } catch (MongoDB\Driver\Exception\Exception $e) {
                throw $e;
            }
        }
        public function getFilteredContent($tableName,$filter)
        {
            try {
                $query = new MongoDB\Driver\Query($filter);
                $rows = $this->connection->executeQuery(self::$database.'.'.$tableName, $query);
            return $rows;
            } catch (MongoDB\Driver\Exception\Exception $e) {
                throw $e;
            }
        }
        public function insertObject($tableName,$object)
        {
            try {
                $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($object);
            $this->connection->executeBulkWrite(self::$database.'.'.$tableName,$bulk);
            } catch (MongoDB\Driver\Exception\Exception $e) {
                throw $e;
            }
        }
        public function deleteObject($tableName,$deleteID)
        {
            try {
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->delete(['_id' => $deleteID]);
                $this->connection->executeBulkWrite(self::$database.'.'.$tableName,$bulk);
            } catch (MongoDB\Driver\Exception\Exception $e) {
                throw $e;
            }
        }
    }
?>
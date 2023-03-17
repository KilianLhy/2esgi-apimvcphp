<?php
    namespace Model;
    class Bdd{
        public $db;
        private static $instance;

        private function __construct()
        {
            $this->db = new \PDO('mysql:host=localhost;dbname=2esgi-apimvc', "root", "");
        }

        public static function getInstance()
        {
            if(empty(self::$instance)){
                self::$instance = new Bdd();
            }
            return self::$instance;
        }
}
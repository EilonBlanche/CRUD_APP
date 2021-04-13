<?php
require_once('config.php');

class DB{

    private $db = DB_NAME;
    private $host = DB_HOST;
    private $user = DB_USERNAME;
    private $pass = DB_PASSWORD;
    public $link = null;
    public $error = null;
    public $connected = false;

    public function __construct($var = null) {
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->db);
        if($this->link->connect_errno){
            $this->error = $this->link->connect_error;
            return 0;
        }
        else{
            $this->connected = true;
            return $this->link;
        }
    }
}
?>
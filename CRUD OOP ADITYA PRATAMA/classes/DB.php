<?php
class DB {
    public $hostname;
    public $username;
    public $password;
    public $database;

    public function __construct($hostname, $username, $password, $database){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        
    }

    public function connect(): mysqli|bool {
        return mysqli_connect( $this->hostname,  $this->username, $this->password, $this->database);



    }
}






?>
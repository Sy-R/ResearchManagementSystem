<?php
class DbConnect{

    private $host = "localhost";
    private $dbname = "user_management_system";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct(){
        $this->connect();
    }

    public function connect(){
        //Create connection
        $this->conn = mysqli_connect( $this->host,$this->username, $this->password,$this->dbname);

        //check connection
        if($this->conn->connect_error){
            die("Connection failed". $this->conn->connect_error);
        }else
        return $this->conn;
    }

    // public function getConnection(){
    //      return $this->conn;
    // }

    public function close(){
        $this->conn->close();
    }

}
?>
<!-- done -->
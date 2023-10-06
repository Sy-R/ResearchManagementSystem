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

    public function searchUsername($username){
        //Ensure username is unique in the databse
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $usernameErr = "Username aleady exist.";
            return $usernameErr;
        }

        $stmt->close();
    }

    public function insertUser($values){
        $username = $values['username'];
        $email = $values['email'];
        $password = $values['password'];
        $role = $values['role'];

        $sql = "INSERT INTO users (username, password, email, role)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $password,  $email, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result != TRUE){
            return "Error: " . $stmt->error;
        }

        // if($result == TRUE){
        //     return  "Welcome!";
        // } else {
        //     return "Error inserting user";
        // }
        $stmt->close();
    }
}

?>
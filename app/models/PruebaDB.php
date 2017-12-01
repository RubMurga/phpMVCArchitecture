<?php 

class PruebaDB 
{
  private $username;
  private $password;
  private $db;
  private $connection;

  function __construct(){
    $this->username="userdatabase";
    $this->password="passwordofuser";
    $this->db="nameofdatabase";
    $this->connection = new mysqli("127.0.0.1",$this->username,$this->password,$this->db);
    $this->connection->query("SET NAMES 'utf8'");
    if(mysqli_connect_errno()){
      echo mysqli_connect_error();
    }
  }
  public function get_user_info($correo){
    $query = "SELECT * FROM user where correo = '" . $correo . "';";
    $user_data = $this->connection->query($query)->fetch_assoc();
    return $user_data;
    
  }
}
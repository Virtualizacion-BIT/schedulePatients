<?php
  include('../config/config.php');
  include('../config/Database.php');

  class Patient{
    public $conn;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->connectToDatabase();
    }

    function save($params){
      $firstName = $params['firstName'];
      $lastName = $params['lastName'];
      $email = $params['email'];
      $phone = $params['phone'];
      $diseases = $params['diseases'];
      $sessionDate = $params['sessionDate'];
      $duration = $params['duration'];
      $image = $params['image'];

      $insert = " INSERT INTO Patients VALUES (NULL, '$firstName', '$lastName', '$email', $phone, '$diseases', '$sessionDate', '$duration', '$image') ";
      return mysqli_query($this->conn, $insert);
    }

    function getAll(){
      $sql = " SELECT * FROM Patients ORDER BY sessionDate ASC ";
      return mysqli_query($this->conn, $sql);
    }

    function getOne($id){
      $sql = "SELECT * FROM Patients WHERE id = $id";
      return mysqli_query($this->conn, $sql);
    }

    function update($params){
      $firstName = $params['firstName'];
      $lastName = $params['lastName'];
      $email = $params['email'];
      $phone = $params['phone'];
      $diseases = $params['diseases'];
      $sessionDate = $params['sessionDate'];
      $duration = $params['duration'];
      $image = $params['image'];
      $id = $params['id'];

      $update = " UPDATE Patients SET firstName='$firstName', lastName='$lastName', email='$email', phone='$phone', diseases='$diseases', sessionDate='$sessionDate', duration='$duration', image='$image' WHERE id = $id";
      return mysqli_query($this->conn, $update);
    }

    function remove($id){
      $remove = "DELETE FROM Patients WHERE id = $id";
      return mysqli_query($this->conn, $remove);
    }

  }

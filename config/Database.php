<?php
class Database
{
  public $host = 'localhost'; // Servidor
  public $user = 'root'; // Usuario de phpMyadmin
  public $pass = '';  // Contraseña de phpMyadmin
  public $db = 'schedulePatients'; // Base de datos.
  private $conn;

  /**
   * Método constructor, este método será el primero que se ejecute al momento de llamar la clase Database.
   */
  function __construct()
  {
    $this->conn = $this->connectToDatabase(); //Hacemos un llamado a la función connectToDatabase()
    return $this->conn; // retornamos la conexión.
  }


  /**
   * Función que permitirá conectarnos a nuestra base de satos.
   * @return $conn => Conexión a la DB.
   */
  function connectToDatabase()
  {
    //Utilizamos el mysql para interactuar con nuestra base de datos.
    //Con el método mysqli_connect() vamos a generar la conexión con la base de datos.
    $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    //Validamos si existe algún error de conexión con el método mysqli_connect_error();
    if (mysqli_connect_error()) {
      echo "Tenemos un error de conexión " . mysqli_connect_error(); //Mostramos el error de conexión.
    }
    return $conn;
  }
}

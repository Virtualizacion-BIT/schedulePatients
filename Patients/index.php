<?php
include('../config/config.php');
include('Patient.php');
$p = new Patient();

$allPatients = $p->getAll();

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $remove = $p->remove($_GET['id']);
  if ($remove) {
    header('Location: ' . ROOT . 'Patients/index.php');
  } else {
    $msj = " <div class='alert alert-danger' rol='alert' > Error al eliminar agenda. </div> ";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title> Lista de pacientes </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <?php include('../menu.php') ?>
  <div class="container">
    <h2 class="text-center mb-5"> Lista pacientes </h2>

    <div class="row">
      <?php
      while ($patient = mysqli_fetch_object($allPatients)) {
        $input = $patient->sessionDate;
        echo "<div class='col' >";
        echo " <div class='border border-info p-2'> ";
        echo "<h5> 
                <img src='".ROOT."/images/$patient->image' width='50' height='50' /> 
                $patient->firstName $patient->lastName 
            </h5>";
        echo " <p> <b>Fecha:</b> ".date("D", strtotime($input)) . " " . date("d-M-Y H:i", strtotime($input)). " </p> ";
        echo " <div class='text-center' ><a class='btn btn-success ' href='" . ROOT . "/Patients/edit.php?id=$patient->id' > Modificar </a> - <a class='btn btn-danger ' href='" . ROOT . "/Patients/index.php?id=$patient->id' > Eliminar </a> </div>";
        echo " </div> ";
        echo "</div>";
      }
      ?>
    </div>

  </div>
</body>

</html>
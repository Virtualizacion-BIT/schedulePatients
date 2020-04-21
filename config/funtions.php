<?php
session_start();
function getFolderProject(){
  if (strpos(__DIR__, '/') !== false){
    $root = str_replace('/opt/lampp/htdocs/', '/', __DIR__);
  }else{
    $root = str_replace('C:\\xampp\\htdocs\\', '/', __DIR__);
  }
  $root = str_replace('config', '', $root);
  return $root;
}

function saveImage($files)
{
  $file_name = str_replace(' ', '', $files['image']['name']);
  $file_tmp = $files['image']['tmp_name'];

  move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . getFolderProject().'/images/' . $file_name);
  return $file_name;
}

function validateSession()
{
  if (isset($_SESSION["existsSession"]) && $_SESSION["existsSession"]) {
    header("Location: " . ROOT . "/Students/index.php");
  }
}

function sessionFalse()
{
  if (!isset($_SESSION["existsSession"])) {
    header("Location: " . ROOT);
  }
}

function closeSession()
{
  session_destroy();
  $_SESSION["existsSession"] = false;
}

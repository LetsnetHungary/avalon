<?php session_start();

if(!isset($_SESSION["language"])){
  $_SESSION["language"] = "english";
}

  $header_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/header.json"));
  $yay = file_get_contents("_assets/".$_SESSION["language"]."/rules.json");
  $rules_data = json_decode($yay);

  include 'rules_data.php';
 ?>

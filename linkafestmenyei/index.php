<?php session_start();

if(!isset($_SESSION["language"])){
  $_SESSION["language"] = "english";
}

  $header_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/header.json"));
  $first_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/first.json"));
  $secound_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/secound.json"));
  $third_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/third.json"));

  include 'main.php';
 ?>

<?php session_start();
if($_SESSION["language"] == "english"){
  $_SESSION["language"] = "magyar";
}
else{
  $_SESSION["language"] = "english";
}

header("Location: index.php");

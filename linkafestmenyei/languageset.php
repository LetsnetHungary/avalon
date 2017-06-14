<?php session_start();

if($_SESSION["language"] == "english"){
  $_SESSION["language"] = "magyar";
}
else if ($_SESSION["language"] == "magyar") {
  $_SESSION["language"] = "deutsch";
}
else{
  $_SESSION["language"] = "english";
}
header("Location: index.php");

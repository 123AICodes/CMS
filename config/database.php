<?php
require_once "constants.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_errno($connection)) {
  die(mysqli_errno($connection));
}

<?php
require_once "../config/database.php";

if (isset($_POST['add-finance'])) {

  $ministry = filter_var($_POST['ministry'], FILTER_SANITIZE_SPECIAL_CHARS);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_SPECIAL_CHARS);
  $rec_from = filter_var($_POST['rec_from'], FILTER_SANITIZE_SPECIAL_CHARS);
  $rec_by = filter_var($_POST['rec_by'], FILTER_SANITIZE_SPECIAL_CHARS);
  $expenses = filter_var($_POST['expenses'], FILTER_SANITIZE_SPECIAL_CHARS);
  $purpose = filter_var($_POST['purpose'], FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($ministry)) {
    $_SESSION['add-finance'] = "Please ministry cannot be null";
  } elseif (empty($amount)) {
    $_SESSION['add-finance'] = "Please enter amount";
  } elseif (empty($rec_from)) {
    $_SESSION['add-finance'] = "Please enter receiver's name";
  } elseif (empty($rec_by)) {
    $_SESSION['add-finance'] = "Please, who're you taking from?";
  } else {

    date_default_timezone_get();
    $date = date('M d, y l H:i:s');
    $insert = " INSERT INTO finance(amount,rec_from,rec_by,expenses,purpose,ministry,date)
                VALUES('$amount','$rec_from','$rec_by','$expenses','$purpose','$ministry','$date')";
    $insert_results = mysqli_query($connection, $insert);
  }

  if (isset($_SESSION['add-finance'])) {
    $_SESSION['add-finance-data'] = $_POST;
    header('location:' . ROOT_URL . 'ministries-finance.php');
    die();
  } else {
    if (mysqli_errno($connection)) {
      $_SESSION['add-finance'] = "Error!! Something went wrong. Try Again!!";
      $_SESSION['add-finance-data'] = $_POST;
      die();
    } else {
      $_SESSION['add-finance-success'] = "Ministry finance data saved successfully";
      header('location:' . ROOT_URL . 'ministries-finance.php');
    }
  }
} else {
  header('location:' . ROOT_URL . 'ministries-finance.php');
  die();
}

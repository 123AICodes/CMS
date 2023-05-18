<?php
require_once "../config/database.php";

if (isset($_POST['add-finance'])) {

  $type = filter_var($_POST['type'], FILTER_SANITIZE_SPECIAL_CHARS);
  $period = filter_var($_POST['period'], FILTER_SANITIZE_SPECIAL_CHARS);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_SPECIAL_CHARS);
  $rec_from = filter_var($_POST['rec_from'], FILTER_SANITIZE_SPECIAL_CHARS);
  $rec_by = filter_var($_POST['rec_by'], FILTER_SANITIZE_SPECIAL_CHARS);
  $free_will = filter_var($_POST['free_will'], FILTER_SANITIZE_SPECIAL_CHARS);
  $expenses = filter_var($_POST['expenses'], FILTER_SANITIZE_SPECIAL_CHARS);
  $purpose = filter_var($_POST['purpose'], FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($type)) {
    $_SESSION['add-finance'] = "Please specify type.";
  } elseif (empty($period)) {
    $_SESSION['add-finance'] = "Please specify the period";
  } elseif (empty($amount)) {
    $_SESSION['add-finance'] = "Please enter amount";
  } elseif (empty($rec_from)) {
    $_SESSION['add-finance'] = "Please enter receiver's name";
  } elseif (empty($rec_by)) {
    $_SESSION['add-finance'] = "Please, who're you taking from?";
  } else {

    date_default_timezone_get();
    $date = date('D M, Y L H:i:s');
    $insert = " INSERT INTO finance(type,period,amount,rec_from,rec_by,free_will,expenses,purpose,date)
                VALUES('$type','$period','$amount','$rec_from','$rec_by','$free_will','$expenses','$purpose','$date')";
    $insert_results = mysqli_query($connection, $insert);
  }

  if (isset($_SESSION['add-finance'])) {
    $_SESSION['add-finance-data'] = $_POST;
    header('location:' . ROOT_URL . 'finance.php');
    die();
  } else {
    if (mysqli_errno($connection)) {
      $_SESSION['add-finance'] = "Error!! Something went wrong. Try Again!!";
      $_SESSION['add-finance-data'] = $_POST;
      die();
    } else {
      $_SESSION['add-finance-success'] = "New financial record added successfully";
      header('location:' . ROOT_URL . 'finance.php');
    }
  }
} else {
  header('location:' . ROOT_URL . 'finance.php');
  die();
}

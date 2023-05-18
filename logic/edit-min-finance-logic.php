<?php
require_once "../config/database.php";

if (isset($_POST['edit-finance'])) {

  $id = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
  $ministry = filter_var($_POST['ministry'], FILTER_SANITIZE_SPECIAL_CHARS);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_SPECIAL_CHARS);
  $rec_from = filter_var($_POST['rec_from'], FILTER_SANITIZE_SPECIAL_CHARS);
  $rec_by = filter_var($_POST['rec_by'], FILTER_SANITIZE_SPECIAL_CHARS);
  $expenses = filter_var($_POST['expenses'], FILTER_SANITIZE_SPECIAL_CHARS);
  $purpose = filter_var($_POST['purpose'], FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($ministry)) {
    $_SESSION['edit-finance'] = "Failed! Ministry was null.";
  } elseif (empty($amount)) {
    $_SESSION['edit-finance'] = "Failed! Amount was null";
  } elseif (empty($rec_from)) {
    $_SESSION['edit-finance'] = "Failed! Receiver's name was empty";
  } elseif (empty($rec_by)) {
    $_SESSION['edit-finance'] = "Provide who're you took from?";
  } else {

    $insert = " UPDATE finance SET ministry='$ministry', amount='$amount',rec_from='$rec_from',rec_by='$rec_by',expenses='$expenses',purpose='$purpose' WHERE id='$id' LIMIT 1";
    $insert_results = mysqli_query($connection, $insert);
  }

  if (isset($_SESSION['edit-finance'])) {
    $_SESSION['edit-finance-data'] = $_POST;
    header('location:' . ROOT_URL . 'ministries-finance.php');
    die();
  } else {
    if (mysqli_errno($connection)) {
      $_SESSION['edit-finance'] = "Error!! Something went wrong. Try Again!!";
      $_SESSION['edit-finance-data'] = $_POST;
      die();
    } else {
      $_SESSION['edit-finance-success'] = $ministry . "'s finance updated successfully";
      header('location:' . ROOT_URL . 'ministries-finance.php');
    }
  }
} else {
  header('location:' . ROOT_URL . 'ministries-finance.php');
  die();
}

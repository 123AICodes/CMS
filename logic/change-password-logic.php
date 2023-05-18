<?php
require_once "../config/database.php";
#updating user password
if (isset($_POST['change-password'])) {
  $user_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if (empty($password)) {
    $_SESSION['change-pass'] = 'Please enter your preferred password';
    header('location:' . ROOT_URL . 'settings.php');
  } else {
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $change_password_query = " UPDATE users SET password='$hash_password' WHERE id='$user_id' LIMIT 1";
    $change_password_query_results = mysqli_query($connection, $change_password_query);
    if (mysqli_errno($connection)) {
      $_SESSION['change-pass'] = "Failed to change password";
      header('location:' . ROOT_URL . 'settings.php');
    } else {
      $_SESSION['change-pass-success'] = "Your password is updated successfully";
      header('location:' . ROOT_URL . 'settings.php');
    }
  }
}

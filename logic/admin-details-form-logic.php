<?php
require_once "../config/database.php";

if (isset($_POST['save-settings'])) {
  $user_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
  $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
  $contact = filter_var($_POST['contact'], FILTER_SANITIZE_SPECIAL_CHARS);

  #validations
  if (empty($title)) {
    $_SESSION['admin'] = "Please provide title";
    header('location:' . ROOT_URL . 'settings.php');
  } elseif (empty($name)) {
    $_SESSION['admin'] = "Please provide name";
    header('location:' . ROOT_URL . 'settings.php');
  } elseif (empty($username)) {
    $_SESSION['admin'] = "Please provide username";
    header('location:' . ROOT_URL . 'settings.php');
  } elseif (empty($email)) {
    $_SESSION['admin'] = "Please provide email";
    header('location:' . ROOT_URL . 'settings.php');
  } elseif (empty($contact)) {
    $_SESSION['admin'] = "Please provide contact";
    header('location:' . ROOT_URL . 'settings.php');
  } else {
    #verifying user
    $check_query = " SELECT * FROM users WHERE id='$user_id'";
    $check_results = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_results) > 0) {
      if (isset($_SESSION['admin'])) {
        $_SESSION['admin-data'] = $_POST;
        header('location:' . ROOT_URL . 'settings.php');
        die();
      } else {
        $update_query = " UPDATE users SET title='$title', name='$name', username='$username', email='$email', contact='$contact' WHERE id='$user_id' LIMIT 1";
        $update_results = mysqli_query($connection, $update_query);
        if (mysqli_errno($connection)) {
          header('location:' . ROOT_URL . 'settings.php');
          die();
        } else {
          $_SESSION['admin-success'] = "Your details has been updated successfully";
          header('location:' . ROOT_URL . 'settings.php');
          die();
        }
      }
    } else {
      $_SESSION['admin'] = "Sorry! User not found";
    }
  }
} else {
  header('location:' . ROOT_URL . 'settings.php');
  die();
}

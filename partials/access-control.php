<?php
if (!isset($_SESSION['user_id'])) {
  header('location: ' . ROOT_URL . 'auth/signin.php');
  die();
} elseif (isset($_SESSION['user_id'])) {

  $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $query = " SELECT * FROM users WHERE id=$id";
  $results = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($results);
}

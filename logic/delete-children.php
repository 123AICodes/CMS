<?php
require_once "../config/database.php";

if (isset($_GET['delete_children_id_number'])) {

  $child_id = filter_var($_GET['delete_children_id_number'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM children WHERE id={$child_id} ";
  $query_results = mysqli_query($connection, $query);
  if (mysqli_num_rows($query_results) > 0) {
    $member = mysqli_fetch_assoc($query_results);
    $profil_name = $member['profile'];
    $profile_path = '../thumbnails/' . $profil_name;
    #removing image
    if ($profile_path) {
      unlink($profile_path);
    }
    #deleting member
    $delete_query = " DELETE FROM children WHERE id={$child_id} LIMIT 1";
    $delete_query_results = mysqli_query($connection, $delete_query);
    if (mysqli_errno($connection)) {
      $_SESSION['delete-child'] = "Failed to delete child";
      header('location: ' . ROOT_URL . 'children.php');
    } else {
      $_SESSION['delete-child-success'] = "Children deleted successfully";
      header('location: ' . ROOT_URL . 'children.php');
    }
  }
} else {
  header('location: ' . ROOT_URL . 'children.php');
  die();
}

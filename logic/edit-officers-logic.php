<?php
require_once "../config/database.php";

if (isset($_POST['edit-officer'])) {
  #variables
  $officer_id = filter_var($_POST['id_number'], FILTER_SANITIZE_NUMBER_INT);
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $marital_status = filter_var($_POST['marital_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $residence = filter_var($_POST['residence'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $group_name = filter_var($_POST['group'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $contact = filter_var($_POST['contact'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $ministry = filter_var($_POST['ministry'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  $prev_profile = filter_var($_POST['prev_profile'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $profile = $_FILES['profile'];

  #validations
  if (empty($name)) {
    $_SESSION['edit-officer'] = "Failed! Officer's name was empty";
  } elseif (empty($residence)) {
    $_SESSION['edit-officer'] = "Failed! Officer's residence was empty";
  } elseif (empty($contact)) {
    $_SESSION['edit-officer'] = "Failed! Officer's phone number was empty";
  } else {
    if ($profile['name'] && $profile['size'] < 1000000) {
      $time = time();
      $profile_name = $time . $profile['name'];
      $profile_tmp_name = $profile['tmp_name'];
      $profile_destination_path = '../thumbnails/' . $profile_name;
      #allowed files
      $allowed_files = ['jpg', 'png', 'jpeg', 'webp'];
      $extension = explode('.', $profile_name);
      $extension = end($extension);

      #removing previous image
      $prev_profile_path = '../thumbnails/' . $prev_profile;
      if ($prev_profile_path) {
        unlink($prev_profile_path);
      }

      #verifying file ext
      if (!in_array($extension, $allowed_files)) {
        $_SESSION['change-picture'] = 'file extension is not supported. Supported Ext(eg. jpg, png, jpeg)';
      } else {
        move_uploaded_file($profile_tmp_name, $profile_destination_path);
      }
    }
  }

  #checking if there was an error
  if (isset($_SESSION['edit-officer'])) {
    header('location:' . ROOT_URL . 'officers.php');
    die();
  } else {
    #updating data
    $insert_profile = $profile_name ?? $prev_profile;
    $insert_query = " UPDATE officers SET title='$title', name='$name', marital_status='$marital_status', residence='$residence', group_name='$group_name', email='$email', contact='$contact', ministry='$ministry', status='$status', profile='$insert_profile' WHERE id='$officer_id' LIMIT 1 ";
    $insert_results = mysqli_query($connection, $insert_query);
    #checking connection
    if (mysqli_errno($connection)) {
      header('location:' . ROOT_URL . 'officers.php');
      die(mysqli_errno($connection));
    } else {
      $_SESSION['edit-officer-success'] = "Officers updated successfully";
      header('location:' . ROOT_URL . 'officers.php');
    }
  }
} else {
  header('location:' . ROOT_URL . 'officers.php');
  die();
}

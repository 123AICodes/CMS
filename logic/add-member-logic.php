<?php
require_once "../config/database.php";

if (isset($_POST['add-member'])) {
  #variables
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $marital_status = filter_var($_POST['marital_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $residence = filter_var($_POST['residence'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $group_name = filter_var($_POST['group'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $contact = filter_var($_POST['contact'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $ministry = filter_var($_POST['ministry'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $profile = $_FILES['profile'];

  #validations
  if (empty($name)) {
    $_SESSION['add-member'] = "Please provide name";
  } elseif (empty($residence)) {
    $_SESSION['add-member'] = "Please enter residence";
  } elseif (empty($contact)) {
    $_SESSION['add-member'] = "Please enter phone number";
  } elseif (empty($profile['name'])) {
    $_SESSION['add-member'] = "Please select profile";
  } else {
    #verifying if officer already exist
    $verify_query = " SELECT * FROM members WHERE name='$name' OR email='$email' OR contact='$contact' ";
    $verify_results = mysqli_query($connection, $verify_query);
    if (mysqli_num_rows($verify_results) > 0) {
      $_SESSION['add-member'] = "Please name, email or phone already exist";
    } else {
      #working on image
      $time = time();
      $profile_name = $time . $profile['name'];
      $profile_tmp_name = $profile['tmp_name'];
      $profile_destination_path = '../thumbnails/' . $profile_name;

      #allowed files
      $allowed_files = ['jpg', 'png', 'jpg', 'webp'];
      $extension = explode('.', $profile_name);
      $extension = end($extension);
      if (in_array($extension, $allowed_files)) {
        #checking image size
        if ($profile['size'] > 1000000) {
          $_SESSION['add-member'] = "Please file size is big. 4mb Max";
        } else {
          move_uploaded_file($profile_tmp_name, $profile_destination_path);
        }
      } else {
        $_SESSION['add-member'] = "File is not supported";
      }
    }
  }

  #checking if there was an error
  if (isset($_SESSION['add-member'])) {
    $_SESSION['add-member-data'] = $_POST;
    header('location:' . ROOT_URL . 'members.php');
    die();
  } else {
    #inserting data
    date_default_timezone_get();
    $date = date('M d, y l H:i:s');
    $insert_query = " INSERT INTO members(title, name, marital_status, residence, group_name, email, contact, ministry, status, profile, date) 
                VALUES('$title', '$name', '$marital_status', '$residence', '$group_name', '$email', '$contact', '$ministry', '$status', '$profile_name', '$date')";
    $insert_results = mysqli_query($connection, $insert_query);
    #checking connection
    if (mysqli_errno($connection)) {
      header('location:' . ROOT_URL . 'members.php');
      die(mysqli_errno($connection));
    } else {
      $_SESSION['add-member-success'] = "New member added successfully";
      header('location:' . ROOT_URL . 'members.php');
    }
  }
} else {
  header('location:' . ROOT_URL . 'members.php');
  die();
}

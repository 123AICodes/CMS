<?php
require_once "../config/database.php";
if (isset($_POST['change-picture'])) {
  $user_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
  $prev_profile = filter_var($_POST['prev_profile'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $profile = $_FILES['profile'];

  #validation
  if (empty($profile['name'])) {
    $_SESSION['change-picture'] = 'please select profile picture';
  } else {
    #working on profile
    if ($profile['name'] && $profile['size'] < 1000000) {
      #new profile
      $time = time();
      $profile_name = $time . $profile['name'];
      $profile_tmp_name = $profile['tmp_name'];
      $profile_destination_path = '../thumbnails/' . $profile_name;
      #allowed files
      $allowed_files = ['jpg', 'png', 'jpeg', 'webp'];
      $extension = explode('.', $profile_name);
      $extension = end($extension);
      #checking files
      if (!in_array($extension, $allowed_files)) {
        $_SESSION['change-picture'] = 'file extension is not supported. Supported Ext(eg. jpg, png, jpeg)';
      } else {
        $prev_profile_path = '../thumbnails/' . $prev_profile;
        if ($prev_profile_path) {
          unlink($prev_profile_path);
        }
        move_uploaded_file($profile_tmp_name, $profile_destination_path);
      }
    } else {
      $_SESSION['change-picture'] = 'file size is too big. Max 1mb';
    }
  }
  if (isset($_SESSION['change-picture'])) {
    header('location:' . ROOT_URL . 'profile.php');
    die();
  } else {
    $insert_profile = $profile_name ?? $prev_profile;
    $query = " UPDATE users SET profile='$insert_profile' WHERE id='$user_id' LIMIT 1";
    $query_results = mysqli_query($connection, $query);
    #checking connection
    if (!mysqli_errno($connection)) {
      $_SESSION['change-picture-success'] = 'Profile updated successfully';
      header('location:' . ROOT_URL . 'profile.php');
      die();
    } else {
      die();
    }
  }
}

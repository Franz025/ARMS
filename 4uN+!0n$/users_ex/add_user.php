<?php 
include('../../inc/connection.php');

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$codename = $_POST['codename'];
$email = $_POST['email'];
$contactnum = $_POST['contactnum'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

$error = false;
$image_error = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    // Validate image file type and size
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    $max_size = 5 * 1024 * 1024; // 5MB

    if (!in_array($image_type, $allowed_types)) {
        $image_error = "Invalid file type. Only JPG, PNG, and GIF are allowed.";
        $error = true;
    } elseif ($image_size > $max_size) {
        $image_error = "File size exceeds maximum limit (5MB).";
        $error = true;
    } else {
        // Move the uploaded file to a permanent location
        $image_path = "../../images/users_profile/" . basename($image_name); // Ensure the filename is safe
        if (!move_uploaded_file($image_tmp, $image_path)) {
            $image_error = "Failed to upload the image.";
            $error = true;
        }
    }
} else {
    $image_error = "No file uploaded or file upload error.";
    $error = true;
}

// Hash the password using MD5 before storing it in the database
$hashed_password = md5($password);

if (!$error) {
    $sql = "INSERT INTO `tbl_users` (`username`, `fullname`, `codename`, `email`, `contactnum`, `password`, `user_type`, `image`) 
            VALUES ('$username', '$fullname', '$codename', '$email', '$contactnum', '$hashed_password', '$user_type', '$image_name')";

    $query = mysqli_query($con, $sql);
    $lastId = mysqli_insert_id($con);
    if ($query == true) {
        $data = array('status' => 'true');
        echo json_encode($data);
    } else {
        $data = array('status' => 'false');
        echo json_encode($data);
    }
} else {
    $data = array('status' => 'false', 'error' => $image_error);
    echo json_encode($data);
}

?>

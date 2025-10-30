<?php 
include('../../inc/connection.php');

$username = mysqli_real_escape_string($con, $_POST['username']);
$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$codename = mysqli_real_escape_string($con, $_POST['codename']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$contactnum = mysqli_real_escape_string($con, $_POST['contactnum']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$user_type = mysqli_real_escape_string($con, $_POST['user_type']);
$id = mysqli_real_escape_string($con, $_POST['id']);

$error = false;
$image_error = '';
$image_name = '';

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
        $image_path = "/xampp/htdocs/arms/images/users_profile/" . basename($image_name); // Ensure the filename is safe
        if (!move_uploaded_file($image_tmp, $image_path)) {
            $image_error = "Failed to upload the image.";
            $error = true;
        }
    }
}

if ($error) {
    echo json_encode(['error' => $image_error]);
} else {
    $set_up = [];

    if (!empty($password)) {
        $hashed_password = md5($password);
        $set_up[] = "`password` = '$hashed_password'";
    }

    $set_up[] = "`username` = '$username'";
    $set_up[] = "`fullname` = '$fullname'";
    $set_up[] = "`codename` = '$codename'";
    $set_up[] = "`email` = '$email'";
    $set_up[] = "`contactnum` = '$contactnum'";
    $set_up[] = "`user_type` = '$user_type'";

    if (!empty($image_name)) {
        $set_up[] = "`image` = '$image_name'";
    }

    $set_up_sql = implode(", ", $set_up);
    $sql = "UPDATE `tbl_users` SET $set_up_sql WHERE `id` = '$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {
        echo json_encode(['status' => 'true']);
    } else {
        echo json_encode(['status' => 'false']);
    }
}
?>

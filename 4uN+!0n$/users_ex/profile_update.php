<?php 
include('../../inc/connection.php');
session_start();  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $codename = $_POST['codename'];
    $email = $_POST['email'];
    $contactnum = $_POST['contactnum'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $target = "../../images/users_profile/" . basename($image);

    // Handle file upload
    if (!empty($image) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $image = basename($image);
    } else {
        $image = $_SESSION['image'];  // Keep the existing image if no new image is uploaded
    }

    $hashed_password = !empty($password) ? md5($password) : null;

    // Using prepared statements to prevent SQL injection
    $sql = "UPDATE tbl_users SET username=?, fullname=?, codename=?, email=?, contactnum=?, user_type=?, image=?";
    if (!empty($hashed_password)) {
        $sql .= ", password=?";
    }
    $sql .= " WHERE id=?";

    $stmt = $con->prepare($sql);
    if (!empty($hashed_password)) {
        $stmt->bind_param("ssssssssi", $username, $fullname, $codename, $email, $contactnum, $user_type, $image, $hashed_password, $id);
    } else {
        $stmt->bind_param("sssssssi", $username, $fullname, $codename, $email, $contactnum, $user_type, $image, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['codename'] = $codename;
        $_SESSION['email'] = $email;
        $_SESSION['contactnum'] = $contactnum;
        $_SESSION['user_type'] = $user_type;
        $_SESSION['image'] = $image;

        echo json_encode(['status' => 'true']);
    } else {
        echo json_encode(['status' => 'false', 'error' => $stmt->error]);
    }

    $stmt->close();
    $con->close();
}
?>

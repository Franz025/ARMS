<?php
// Database connection
include('../../inc/connection.php');

// Check connection
if ($con->connect_error) {
    die(json_encode(array("status" => "error", "message" => "Connection failed")));
}

// Fetch the row with id=1
$sql = "SELECT * FROM tbl_web_info WHERE id=1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die(json_encode(array("status" => "error", "message" => "No results found")));
}

// Process update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = 1;
    $website_name = htmlspecialchars(trim($_POST['web_name']), ENT_QUOTES, 'UTF-8');
    $website_title = htmlspecialchars(trim($_POST['web_title']), ENT_QUOTES, 'UTF-8');
    $website_acronym = htmlspecialchars(trim($_POST['web_acronym']), ENT_QUOTES, 'UTF-8');
    $website_footer = htmlspecialchars(trim($_POST['web_footer']), ENT_QUOTES, 'UTF-8');

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $target_dir = "/xampp/htdocs/arms/images/logos/";
        $target_file = $target_dir . $image;

        // Validate file upload
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $sql = "UPDATE tbl_web_info SET web_name=?, web_title=?, web_acronym=?, web_footer=?, image=? WHERE id=?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("sssssi", $website_name, $website_title, $website_acronym, $website_footer, $image, $id);
            } else {
                die(json_encode(array("status" => "error", "message" => "Failed to upload image.")));
            }
        } else {
            die(json_encode(array("status" => "error", "message" => "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.")));
        }
    } else {
        $sql = "UPDATE tbl_web_info SET web_name=?, web_title=?, web_acronym=?, web_footer=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $website_name, $website_title, $website_acronym, $website_footer, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Website Updated successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error updating Website: " . $stmt->error));
    }

    $stmt->close();
}

$con->close();

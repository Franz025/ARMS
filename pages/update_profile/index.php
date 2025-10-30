<?php
include('../inc/connection.php');
?>

<div class="container-fluid">
    <div class="card card">
        <!-- <div class="card-header">
            <h1 class="card-title" style="font-weight: bold; font-size: 15px;">
                🌎
                Web Information:
            </h1>
        </div> -->

        <div class="card-body">
            
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-success card-outline">
                                <div class="card-body box-profile">
                                    <form id="updateUser" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id" value="<?= $_SESSION["id"] ?>">
                                        <input type="hidden" name="trid" id="trid" value="">

                                        <div class="d-flex justify-content-center text-center" style="position: relative; display: inline-block;">
                                            <img id="previewImage" src="../images/users_profile/<?php echo $_SESSION['image']; ?>"
                                                class="img-circle elevation-2"
                                                style="width:100px; height: 100px; object-fit: cover; object-position:center center;"
                                                title="<?php echo $_SESSION['fullname']; ?>">

                                            <label for="imageField" style="position: absolute; bottom: 0; margin-left: 65px; cursor: pointer;">
                                                <img class="img-circle" src="../images/users_profile/camera_icon.png" alt="Upload" style="width: 30px; height: 30px;">
                                            </label>
                                        </div>

                                        <br>

                                        <input type="file" id="imageField" name="image" style="display: none;" accept="image/*" onchange="previewImage(event)">

                                        <script>
                                            function previewImage(event) {
                                                const preview = document.getElementById('previewImage');
                                                const file = event.target.files[0];
                                                const reader = new FileReader();

                                                reader.onload = function() {
                                                    preview.src = reader.result;
                                                }

                                                if (file) {
                                                    reader.readAsDataURL(file);
                                                }
                                            }
                                        </script>


                                        <h3 class="profile-username text-center"><b><?= $_SESSION["fullname"] ?></b>
                                        </h3>
                                        <p class="text-muted text-center"><b><?= $_SESSION["username"] ?></b></p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Email:</b> <a class="float-right"><b><?= $_SESSION["email"] ?></b></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Contact Number:</b> <a class="float-right"><b><?= $_SESSION["contactnum"] ?></b></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Personnel ID:</b> <a class="float-right"><b><?= $_SESSION["codename"] ?></b></a>
                                            </li>
                                        </ul>
                                        <br>
                                        <a href="#" class="btn btn-success btn-block" Disabled><b>
                                                Created At: <?= $_SESSION["created_at"] ?><br>
                                            </b></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="card card-success card-outline">
                                <div class="card-body">
                                    <div class="tab-content">

                                        <div class="form-group row">
                                            <label for="usernameField" class="col-sm-2 col-form-label"><b>Username</b></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="usernameField" value="<?= $_SESSION["username"] ?>" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fullnameField" class="col-sm-2 col-form-label"><b>Fullname</b></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="fullnameField" value="<?= $_SESSION["fullname"] ?>" name="fullname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="codenameField" class="col-sm-2 col-form-label"><b>Personnel ID</b></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="codenameField" value="<?= $_SESSION["codename"] ?>" name="codename">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="emailField" class="col-sm-2 col-form-label"><b>Email</b></label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="emailField" value="<?= $_SESSION["email"] ?>" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="contactField" class="col-sm-2 col-form-label"><b>Contact
                                                    Number</b></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="contactnumField" value="<?= $_SESSION["contactnum"] ?>" name="contactnum">
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 3) : ?>
                                            <input type="hidden" class="form-control" id="user_typeField" value="<?= $_SESSION["user_type"] ?>" name="user_type" Readonly>
                                        <?php endif; ?>
                                        <?php
                                        if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)) : ?>
                                            <div class="form-group row">
                                                <label for="contactField" class="col-sm-2 col-form-label"><b> User Type
                                                    </b></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select" name="user_type" id="user_typeField" Readonly Disabled>
                                                        <option value=""></option>
                                                        <?php
                                                        $usrlvlSql = $con->query("SELECT * FROM `tbl_usertype`");
                                                        while ($rowUsrLvl = $usrlvlSql->fetch_assoc()) :
                                                            $profileUserLvl = $rowUsrLvl["id"];
                                                        ?>
                                                            <option value="<?= $rowUsrLvl['id'] ?>" <?= (isset($profileUserLvl) && $rowUsrLvl['id'] == $_SESSION["user_type"]) ? 'selected' : '' ?>>
                                                                <?= $rowUsrLvl['usertypeLEVEL'] ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group row">
                                            <label for="passwordField" class="col-sm-2 col-form-label"><b> New Password
                                                </b></label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="passwordField" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <!-- <button onclick="goBack()" class="btn btn-outline-secondary"><strong> <i class="fas fa-sign-in-alt"></i> Back
                                                    </strong></button>&nbsp; -->
                                                <button type="submit" class="btn btn-success"><strong> Update </strong></button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) : ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Main content -->
                <section class="content">
                    <form id="updateWeb" enctype="multipart/form-data">
                        <!-- Default box -->
                        <div class="card card-success card-outline">
                            <div class="card-body row">

                                <div class="col-7">
                                    <div class="form-group text-center">
                                        <label for="web_name"><strong> System Name: </strong></label>
                                        <input type="text" name="web_name" class="form-control text-center" id="web_name" value="<?php echo $row['web_name']; ?>" required>
                                    </div>

                                    <div class="form-group text-center">
                                        <label for="web_title"><strong> System Title: </strong></label>
                                        <input type="text" name="web_title" class="form-control text-center" id="web_title" value="<?php echo $row['web_title']; ?>" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <label for="web_acronym"><strong> System Acronym: </strong></label>
                                            <input type="text" name="web_acronym" class="form-control text-center" id="web_acronym" value="<?php echo $row['web_acronym']; ?>" required>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <label for="web_footer"><strong> System Footer: </strong></label>
                                            <input type="text" name="web_footer" class="form-control text-center" id="web_footer" value="<?php echo $row['web_footer']; ?>" required>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-center">
                                            <div class="row">
                                                <label class="form-label"><b> Timezone: &nbsp;</b></label>
                                                <h1 style="font-weight: bold; font-size: 18px;">
                                                    <span class="badge badge-success text-md" value="(UTC +8:00) Asia/Manila" Readonly><strong> (UTC +8:00) Asia/Manila </strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success" value="Submit"><strong> Submit </strong></button>
                                    </div>
                                </div>

                                <div class="col-5 text-center d-flex align-items-center justify-content-center position-relative">
                                    <div class="position-relative">
                                        <label class="badge badge-success text-md"> <strong> Upload Photo: </strong> </label>&nbsp;&nbsp;
                                        <img id="previewLogo" src="../images/logos/<?php echo $row['image']; ?>" class="img-circle elevation-2" style="width:200px; height: 200px; object-fit: cover; object-position:center center;" title="<?php echo $_SESSION["fullname"]; ?>">
                                        <label for="image" style="position: absolute; bottom: 10px; right: 10px; cursor: pointer;">
                                            <img class="img-circle" src="../images/users_profile/camera_icon.png" alt="Upload" style="width: 40px; height: 40px;">
                                        </label>
                                    </div>

                                    <input type="file" id="image" name="image" style="display: none;" onchange="previewLogo(event)">

                                    <script>
                                        function previewLogo(event) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                var output = document.getElementById('previewLogo');
                                                output.src = reader.result;
                                            }
                                            reader.readAsDataURL(event.target.files[0]);
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('#updateWeb').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '../4uN+!0n$/web_ex/update_website.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        timer: 2000
                    }).then(function() {
                        location.reload(); // Reload the page after success
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to update record',
                        icon: 'error',
                        timer: 2000
                    });
                }
            });
        });
    });

    function previewImage(event) {
        const preview = document.getElementById('previewImage');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>



<script>
    function goBack() {
        window.history.back();
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('submit', '#updateUser', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "../4uN+!0n$/users_ex/profile_update.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json.status == 'true') {

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Your Data has been Updated",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload(); // Reload the page after the alert
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Update Failed",
                            text: json.error,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading file:', error);
                }
            });
        });
    });
</script>
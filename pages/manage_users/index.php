<?php include('../inc/connection.php'); ?>

<div class="fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-user-shield"></i> &nbsp;
                Users Information </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-user-plus"></i> <b> Add User </b>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
            </div>
        </div>

        <div class="card-body">

            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <th class="text-center"> Avatar </th>
                    <th class="text-center"> Fullname </th>
                    <th class="text-center"> User Type </th>
                    <?php
                    // Check if user_type is set in the session to avoid potential errors
                    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) : ?>
                        <th class="text-center"> Actions </th>
                    <?php endif; ?>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Update User Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i><b>&nbsp; User
                    </b></h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form id="updateUser" enctype="multipart/form-data" action="update_user.php" method="POST">
                    <div class="container-fluid">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight: bold; font-size: 18px;"> &nbsp;Update User's Information </h3>
                            </div>

                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="">
                                <input type="hidden" name="trid" id="trid" value="">

                                <div class="row">
                                    <!-- Image Section -->
                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                        <div style="position: relative;">
                                            <img id="previewImage" src="../images/users_profile/<?php echo htmlspecialchars($_SESSION["image"], ENT_QUOTES, 'UTF-8'); ?>" class="img-circle elevation-2" style="width:100px; height: 100px; object-fit: cover; object-position:center center;" title="<?php echo htmlspecialchars($_SESSION["fullname"], ENT_QUOTES, 'UTF-8'); ?>">
                                            <label for="imageField" style="position: absolute; bottom: 0; right: 0; transform: translate(50%, 50%); cursor: pointer;">
                                                <img class="img-circle" src="../images/users_profile/camera_icon.png" alt="Upload" style="width: 35px; height: 35px; border: 2px solid white; background: white; border-radius: 50%;">
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Form Controls Section -->
                                    <div class="col-md-8">
                                        <input type="file" id="imageField" name="image" style="display: none;" onchange="previewImage(event)">

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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="usernameField" class="form-label"><b> Username: </b></label>
                                                <input type="text" class="form-control" id="usernameField" name="username">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fullnameField" class="form-label"><b> Fullname: </b></label>
                                                <input type="text" class="form-control" id="fullnameField" name="fullname">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="codenameField" class="form-label"><b> Personnel ID: </b></label>
                                                <input type="text" class="form-control" id="codenameField" name="codename">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="emailField" class="form-label"><b> Email: </b></label>
                                                <input type="email" class="form-control" id="emailField" name="email">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="contactnumField" class="form-label"><b> Contact Number: </b></label>
                                                <input type="text" class="form-control" id="contactnumField" name="contactnum">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="passwordField" class="form-label"><b> Password: </b></label>
                                                <input type="password" class="form-control" id="passwordField" name="password">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="user_typeField" class="form-label"><b> User Type: </b></label>
                                                <select class="form-control select" name="user_type" id="user_typeField" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $usrlvlSql = $con->query("SELECT * FROM `tbl_usertype`");
                                                    while ($rowUsrLvl = $usrlvlSql->fetch_assoc()) :
                                                        $selected = (isset($profileUserLvl) && $rowUsrLvl['id'] == $profileUserLvl) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?php echo htmlspecialchars($rowUsrLvl['id'], ENT_QUOTES, 'UTF-8'); ?>" <?php echo $selected; ?>><?php echo htmlspecialchars($rowUsrLvl['usertypeLEVEL'], ENT_QUOTES, 'UTF-8'); ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i><b>&nbsp; Add User </b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUser" enctype="multipart/form-data" action="add_user.php" method="POST">
                    <div class="container-fluid">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight: bold; font-size: 18px;"> &nbsp;Add User's Information </h3>
                            </div>

                            <div class="card-body">
                        

                                <div class="row">
                                    <!-- Image Section -->
                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                        <div style="position: relative;">
                                            <img id="previewImage" src="../images/users_profile/camera_icon.png" class="img-circle elevation-2" style="width:100px; height: 100px; object-fit: cover; object-position:center center;" title="">
                                            <label for="addimageField" style="position: absolute; bottom: 0; right: 0; transform: translate(50%, 50%); cursor: pointer;">
                                                <img class="img-circle" src="../images/users_profile/camera_icon.png" alt="Upload" style="width: 35px; height: 35px; border: 2px solid white; background: white; border-radius: 50%;">
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Form Controls Section -->
                                    <div class="col-md-8">
                                        <input type="file" id="addimageField" name="image" style="display: none;" onchange="previewImage(event)">

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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="addusernameField" class="form-label"><b> Username: </b></label>
                                                <input type="text" class="form-control" id="addusernameField" name="username">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="addfullnameField" class="form-label"><b> Fullname: </b></label>
                                                <input type="text" class="form-control" id="addfullnameField" name="fullname">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="addcodenameField" class="form-label"><b> Personnel ID: </b></label>
                                                <input type="text" class="form-control" id="addcodenameField" name="codename">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="addemailField" class="form-label"><b> Email: </b></label>
                                                <input type="email" class="form-control" id="addemailField" name="email">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="addcontactnumField" class="form-label"><b> Contact Number: </b></label>
                                                <input type="text" class="form-control" id="addcontactnumField" name="contactnum">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="addpasswordField" class="form-label"><b> Password: </b></label>
                                                <input type="password" class="form-control" id="addpasswordField" name="password">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="adduser_typeField" class="form-label"><b> User Type: </b></label>
                                                <select class="form-control select" name="user_type" id="adduser_typeField" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $usrlvlSql = $con->query("SELECT * FROM `tbl_usertype`");
                                                    while ($rowUsrLvl = $usrlvlSql->fetch_assoc()) :
                                                        $selected = (isset($profileUserLvl) && $rowUsrLvl['id'] == $profileUserLvl) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?php echo htmlspecialchars($rowUsrLvl['id'], ENT_QUOTES, 'UTF-8'); ?>" <?php echo $selected; ?>><?php echo htmlspecialchars($rowUsrLvl['usertypeLEVEL'], ENT_QUOTES, 'UTF-8'); ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {


        var table = $('#example').DataTable({
            autoWidth: false,
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '../4uN+!0n$/$3rv3r_$!d3_4!L3$/server_side_users.php',
            },
            columns: [{
                    "data": 1,
                    render: function(data, type, full, meta) {
                        return '<center><img src="../images/users_profile/' + data + '" alt="User Avatar" style="width: 30px; height: 30px; border-radius: 50%;"></center>';
                    }
                },
                {
                    "data": 3,
                    render: function(data, type, full, meta) {
                        return '<center><b><a href="javascript:void(0);" data-id="' + full[0] + '"  class="editbtn" >' + data + '</a></b></center>';
                    }
                },
                {
                    "data": 7,
                    "render": function(data, type, full, meta) {
                        if (data == 1) {
                            return '<center><span class="badge badge-success text-sm"> SUPER ADMIN </span></center>';
                        } else if (data == 2) {
                            return '<center><span class="badge badge-warning text-sm"> JO </span></center>';
                        } else {
                            return '<center><span class="badge badge-secondary text-sm"> OJT </span></center>';
                        }
                    }
                },

                <?php
                // Check if user_type is set in the session to avoid potential errors
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) : ?> {
                        "data": null,
                        render: function(data, type, full, meta) {

                            return '<center> <a href="javascript:void();" data-id="' + full[0] + '"  class="btn btn-danger btn-sm deleteBtn"</a> <i class="fas fa-trash-alt"></i> </center>';
                            // <a href="javascript:void();" data-id="' + full[0] + '"  class="btn btn-info btn-sm editbtn" >Edit</a>

                        }
                    }
                <?php endif; ?>
            ],
            columnDefs: [{
                // "targets": [0,1,4],
                // "className": "bold-text justify-end",

            }],
            initComplete: function() {
                this.api().columns([12, 13, 14]).every(function() {
                    var column = this;
                    column.search('^$', true, false).draw();
                });



            }
        })
    })
</script>

<script src="../4uN+!0n$/users_ex/7uN2+ion!5.js"></script>
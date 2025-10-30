<?php
include('../inc/connection.php');
?>

<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h6 class="card-title" style="font-weight: bold; font-size: 15px;"><i class="nav-icon fas fa-plus-square"></i>
                &nbsp;
                Ongoing System Requests </h6>
            <div class="card-tools">
                <button id="btngen" data-toggle="modal" data-target="#addUserModal" class="btn btn-success btn-sm">
                    <i class="fas fa-plus-circle"></i><b> New Service Request </b>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
            </div>
        </div>

        <div class="card-body">

            <table id="example" class="table table-striped">
                <thead>
                    <th class="text-center"> Track Number </th>
                    <th class="text-center"> Office </th>
                    <th class="text-center"> Task Description </th>
                    <th class="text-center"> Personnel Name </th>
                    <th class="text-center"> Status </th>

                    <?php
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between bg-success text-center">
                <h6 class="modal-title" id="updateUserModalLabel"><b>&nbsp; Services Details </b></h6>
                <div class="modal-actions">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close this modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>

            <div class="modal-body">
                <form id="updateUser">
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="trid" id="trid" value="">
                    <input type="hidden" name="progs_status" id="progs_status" value="ONGOING">

                    <div class="card card-outline card-success" style="padding: 20px; margin: 10px;">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-4">
                                <label for="progs_statusField" class="form-label"><b> Status: </b></label> &nbsp;
                                <input type="hidden" class="form-control" id="progs_statusField" name="progs_status" value="ONGOING" autocomplete="off" readonly>
                                <span class="badge badge-danger" style="font-size: 15px;"><b>ONGOING</b></span>
                            </div>
                            <div class="col-md-4 d-flex align-items-center mb-3">
                                <label for="tracknumberField" class="form-label me-2"><b>Track Number:</b></label>
                                <input type="text" class="form-control" id="tracknumberField" name="tracknumber" autocomplete="off" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="servicesField" class="form-label"><b> Service Type: </b></label>
                                <select class="form-control select" name="services" id="servicesField" autocomplete="off">
                                    <option selected="" disabled="" value="">Please select...</option>
                                    <?php
                                    $ServicesSql = $con->query("SELECT * FROM tbl_services");
                                    while ($rowServices = $ServicesSql->fetch_assoc()):
                                        $profileServices = $rowServices["id"];
                                    ?>
                                        <option value="<?php echo $rowServices['id'] ?>"
                                            <?php echo (isset($profileServices) && $rowServices['id'] == $profileServices) ? 'selected' : '' ?>>
                                            <?php echo $rowServices['servicesName'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="officesField" class="form-label"><b> Office: </b></label>
                                <select class="form-control select" name="offices" id="officesField" autocomplete="off">
                                    <option selected="" disabled="" value="">Please select...</option>
                                    <?php
                                    $OfficesSql = $con->query("SELECT * FROM tbl_offices");
                                    while ($rowOffices = $OfficesSql->fetch_assoc()):
                                        $profileOffices = $rowOffices["officeCode"];
                                    ?>
                                        <option value="<?php echo $rowOffices['officeCode'] ?>"
                                            <?php echo (isset($profileOffices) && $rowOffices['officeCode'] == $profileOffices) ? 'selected' : '' ?>>
                                            <?php echo $rowOffices['officeName'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="accoms_descField" class="form-label"><b> Task Description: </b></label>
                                <textarea class="form-control" id="accoms_descField" name="accoms_desc" autocomplete="off" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="tech_remarksField" class="form-label"><b> Technical Remarks: </b></label>
                                <textarea class="form-control" id="tech_remarksField" name="tech_remarks" autocomplete="off" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row d-flex justify-content-end">
                            <div class="col-md-8">
                                <label for="date_startedField" class="form-label"><b> Date Started: </b></label>
                                <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d H:i:s') ?>" id="date_startedField" name="date_started">
                            </div>
                            <div class="col-md-4">
                                <label for="user_idField" class="form-label"><b> Personnel Name: </b></label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION["fullname"] ?>" id="user_idField" name="user_id" autocomplete="off">
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <div class="col-md justify-content-start">
                    <button type="button" class="btn btn-success" id="submitBtn"><i class="fas fa-save"></i><b> Save </b></button>
                </div>
                <button type="button" class="btn btn-warning" id="finishedBtn"><i class="fas fa-check-square"></i><b> Update </b></button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title" id="addUserModalLabel"></i><b>&nbsp; New
                        Service Request </b></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUser">

                    <div class="card card-outline card-success" style="padding: 20px; margin: 10px;">

                        <div class="row d-flex justify-content-between">
                            <div class="col-md-4">
                                <label for="addprogs_statusField" class="form-label"><b> Status: </b></label> &nbsp;
                                <input type="hidden" class="form-control" id="addprogs_statusField"
                                    name="progs_status" value="ONGOING"
                                    autocomplete="off" readonly>
                                <span class="badge badge-danger" style="font-size: 15px;"><b>NEW</b></span>
                            </div>
                            <div class="col-md-4 d-flex align-items-center mb-3">
                                <label for="addtracknumberField" class="form-label me-2"><b>Track Number:</b></label>
                                <input type="text" class="form-control" id="addtracknumberField" name="tracknumber" autocomplete="off" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="addservicesField" class="form-label"><b> Service Type: </b></label>
                                <select class="form-control select" name="services" id="addservicesField" autocomplete="off">
                                    <option selected="" disabled="" value="">Please select...</option>
                                    <?php
                                    $ServicesSql = $con->query("SELECT * FROM `tbl_services`");
                                    // Assuming $selectedService is set based on the user's current selected service.
                                    $selectedService = isset($userSelectedService) ? $userSelectedService : '';
                                    while ($rowServices = $ServicesSql->fetch_assoc()):
                                    ?>
                                        <option value="<?php echo $rowServices['id'] ?>"
                                            <?php echo ($rowServices['id'] == $selectedService) ? 'selected' : '' ?>>
                                            <?php echo $rowServices['servicesName'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="addofficesField" class="form-label"><b> Office: </b></label>
                                <select class="form-control select" name="offices" id="addofficesField" autocomplete="off">
                                    <option selected disabled value="">Please select...</option>
                                    <?php
                                    // Fetching profile office code from session or another source
                                    $profileOffices = isset($_SESSION['officeCode']) ? $_SESSION['officeCode'] : '';

                                    $OfficesSql = $con->query("SELECT * FROM `tbl_offices`");
                                    while ($rowOffices = $OfficesSql->fetch_assoc()):
                                    ?>
                                        <option value="<?php echo $rowOffices['officeCode']; ?>"
                                            <?php echo ($rowOffices['officeCode'] == $profileOffices) ? 'selected' : ''; ?>>
                                            <?php echo $rowOffices['officeName']; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="addaccoms_descField" class="form-label"><b>
                                        Task Description:
                                    </b></label>
                                <textarea class="form-control" id="addaccoms_descField" name="accoms_desc" autocomplete="off" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="tech_remarksField" class="form-label"><b>
                                        Technical Remarks:
                                    </b></label>
                                <textarea class="form-control" id="addtech_remarksField" name="tech_remarks" autocomplete="off" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row d-flex justify-content-end">

                            <div class="col-md-8">
                                <label for="adddate_startedField" class="form-label"><b>
                                        Date Started:
                                    </b></label>
                                <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d H:i:s') ?>" id="adddate_startedField" name="date_started" Readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="adduser_idField" class="form-label"><b>
                                        Personnel Name: </b></label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION["fullname"] ?>" id="adduser_idField" name="user_id" autocomplete="off" Readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>

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
                url: '../4uN+!0n$/$3rv3r_$!d3_4!L3$/server_side_accoms_ongoing.php',
            },
            columns: [{
                    "data": 1,
                    render: function(data, type, full, meta) {
                        return '<center><b><a href="javascript:void(0);" data-id="' + full[0] +
                            '"  class="editbtn" >' + data + '</a></b></center>';
                    }
                },
                {
                    "data": 3,
                    render: function(data, type, full, meta) {
                        return '<a href="javascript:void(0);" data-id="' + full[0] +
                            '"  class="editbtn" >' + data + '</a>';
                    }
                },
                {
                    "data": 2,
                    render: function(data, type, full, meta) {
                        return '<a href="javascript:void(0);" data-id="' + full[0] + '" class="editbtn">' + ' <b> ' + full[2] + ': </b> ' + full[4] + '</a>' +
                            '<br/><small>' + full[8] + '</small>';
                    }
                },
                {
                    "data": 5,
                    render: function(data, type, full, meta) {
                        return '<a href="javascript:void(0);" data-id="' + full[0] +
                            '"  class="editbtn" >' + data + '</a>';
                    }
                },
                {
                    "data": 6,
                    render: function(data, type, full, meta) {

                        switch (data) {
                            case 'ONGOING':
                                return '<center><span class="badge badge-danger text-sm"> ONGOING </span></center>';
                            case 'FINISHED':
                                return '<center><span class="badge badge-success text-sm"> FINISHED </span></center>';
                            default:
                                return '';
                        }

                    }

                },
                <?php
                // Check if user_type is set in the session to avoid potential errors
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?> {
                        "data": null,
                        render: function(data, type, full, meta) {

                            return '<center> <a href="javascript:void();" data-id="' + full[0] +
                                '"  class="btn btn-danger btn-sm deleteBtn"</a> <i class="fas fa-trash-alt"></i> </center>';
                            // <a href="javascript:void();" data-id="' + full[0] + '"  class="btn btn-info btn-sm editbtn" >Edit</a>

                        }
                    }
                <?php endif; ?>
            ],
            columnDefs: [{
                // "targets": [0,1,4],
                // "className": "bold-text justify-end",

            }],
            // initComplete: function() {
            //     this.api().columns([12, 13, 14]).every(function() {
            //         var column = this;
            //         column.search('^$', true, false).draw();
            //     });



            // }
        })
    })


    $('#example tbody').on('click', 'a.editbtn', function(event) {
        event.preventDefault();

        var table = $('#example').DataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');

        $('#exampleModal').modal('show');

        $.ajax({
            url: "../4uN+!0n$/couples_ex/get_single_data.php",
            data: {
                id: id
            },
            type: 'post',
            success: function(data) {
                var json = JSON.parse(data);

                $('#tracknumberField').val(json.tracknumber);
                $('#servicesField').val(json.services);
                $('#officesField').val(json.offices);
                $('#accoms_descField').val(json.accoms_desc);
                $('#tech_remarksField').val(json.tech_remarks);
                $('#user_idField').val(json.user_id);
                $('#progs_statusField').val(json.progs_status);
                $('#date_startedField').val(json.date_started);

                // Set the ID and TR ID fields
                $('#id').val(json.id);
                $('#trid').val(trid);
            }
        });
    });

    $('#example tbody').on('click', 'a.deleteBtn', function() {
        event.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, Cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: "Data has been Deleted.",
                    icon: "success"
                });
                //insert function here for delete
                var table = $('#example').DataTable();
                var id = $(this).data('id');

                $.ajax({
                    url: "../4uN+!0n$/couples_ex/delete_user.php",
                    data: {
                        id: id
                    },
                    type: "post",
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table.ajax.reload(null, false);

                        } else {
                            alert('Failed');
                            return;
                        }
                    }
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "Error"
                });
            }
        });
    });


    $(document).ready(function() {
        $("#btngen").click(function() {
            $.ajax({
                url: '../4uN+!0n$/couples_ex/get_previous.php',
                type: 'GET',
                success: function(data) {
                    $('#addtracknumberField').val(data);
                },
                error: function() {
                    alert('Error fetching previous number');
                }
            });
        });
    });


    // Handle form submission
    $(document).on('submit', '#addUser', function(e) {
        e.preventDefault();

        // Fetch form data
        var tracknumber = $('#addtracknumberField').val();
        var services = $('#addservicesField').val();
        var offices = $('#addofficesField').val();
        var accoms_desc = $('#addaccoms_descField').val();
        var tech_remarks = $('#addtech_remarksField').val();
        var user_id = $('#adduser_idField').val();
        var progs_status = $('#addprogs_statusField').val();
        var date_started = $('#adddate_startedField').val();

        if (tracknumber !== '' && services !== '' && offices !== '' && accoms_desc !== '' && user_id !== '' && progs_status !== '' && date_started !== '') {

            // AJAX request to add_user.php
            $.ajax({
                url: "../4uN+!0n$/couples_ex/add_user.php",
                type: "post",
                data: {
                    tracknumber: tracknumber,
                    services: services,
                    offices: offices,
                    accoms_desc: accoms_desc,
                    tech_remarks: tech_remarks,
                    user_id: user_id,
                    progs_status: progs_status,
                    date_started: date_started
                },

                success: function(data) {
                    var json = JSON.parse(data);
                    var status = json.status;
                    if (status === 'true') {
                        var table = $('#example').DataTable();
                        table.ajax.reload(null, false);
                        $('#addUserModal').modal('hide');

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Your Data has been Saved",
                            showConfirmButton: false,
                            timer: 2000 // Adjusted timer to 2000 milliseconds (2 seconds)
                        }).then(function() {
                            // Redirect to the desired page
                            window.location.href = "../pages/?page=accoms_ongoing";
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to Save Data!',
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to communicate with the server!',
                    });
                }
            });

        } else {
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Fill all the required fields!",
                showConfirmButton: false,
                timer: 1500
            });
        }
    });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });


    /*document.getElementById('enableEdit').addEventListener('click', function() {
        const form = document.getElementById('updateUser');

        // Enable form fields
        form.querySelectorAll('input[readonly], select[disabled], textarea[readonly]').forEach(function(element) {
            if (element.id !== 'date_startedField' && element.id !== 'user_idField' && element.id !== 'tracknumberField') {
                element.removeAttribute('readonly');
                element.removeAttribute('disabled');
            }
        });

        // Enable Submit and Finished buttons
        document.getElementById('submitBtn').removeAttribute('disabled');
        document.getElementById('finishedBtn').removeAttribute('disabled');

        // Hide Update button
        document.getElementById('enableEdit').style.display = 'none';
    }); */

    document.getElementById('submitBtn').addEventListener('click', function() {
        document.getElementById('progs_status').value = 'ONGOING';
        submitForm();
    });

    document.getElementById('finishedBtn').addEventListener('click', function() {
        document.getElementById('progs_status').value = 'FINISHED';
        submitForm();
    });

    function submitForm() {
        // Collect specific data
        var tracknumber = document.getElementById('tracknumberField').value;
        var services = document.getElementById('servicesField').value;
        var offices = document.getElementById('officesField').value;
        var accoms_desc = document.getElementById('accoms_descField').value;
        var tech_remarks = document.getElementById('tech_remarksField').value;
        var user_id = document.getElementById('user_idField').value;
        var progs_status = document.getElementById('progs_status').value;
        var date_started = document.getElementById('date_startedField').value;
        var id = document.getElementById('id').value;

        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`
            // timer: 2000, 
            // timerProgressBar: true 
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX request to update user data
                $.ajax({
                    url: "../4uN+!0n$/couples_ex/update_user.php",
                    type: "POST",
                    data: {
                        tracknumber: tracknumber,
                        services: services,
                        offices: offices,
                        accoms_desc: accoms_desc,
                        tech_remarks: tech_remarks,
                        user_id: user_id,
                        progs_status: progs_status,
                        date_started: date_started,
                        id: id
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status === 'true') {
                            $('#exampleModal').modal('hide');
                            Swal.fire({
                                title: "Your Data has been Saved",
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false // Hides confirm button
                            }).then(() => {
                                window.location.href = "../pages/?page=accoms_ongoing";
                            });
                        } else {
                            Swal.fire({
                                title: "Failed to save data!",
                                icon: "error",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: "Failed to communicate with the server!",
                            icon: "error",
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Changes are not saved",
                    icon: "info",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    }
</script>
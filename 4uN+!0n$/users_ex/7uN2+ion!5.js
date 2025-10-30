
$('#example tbody').on('click', 'a.editbtn', function () {
    event.preventDefault();
    //insert function here for editable
    var table = $('#example').DataTable();
    var trid = $(this).closest('tr').attr('id');
    // console.log(selectedRow);
    var id = $(this).data('id');
    $('#exampleModal').modal('show');

    $.ajax({
        url: "../4uN+!0n$/users_ex/get_single_data.php",
        data: {
            id: id
        },
        type: 'post',
        success: function (data) {
            var json = JSON.parse(data);

            $('#usernameField').val(json.username);
            $('#fullnameField').val(json.fullname);
            $('#codenameField').val(json.codename);
            $('#emailField').val(json.email);
            $('#contactnumField').val(json.contactnum);
            // $('#passwordField').val(json.password);
            $('#user_typeField').val(json.user_type);
            if (json.image) {
                $('#previewImage').attr('src', '/pmms/images/users_profile/' + json.image).show();
            }

            $('#id').val(id);
            $('#trid').val(trid);

            console.log(json.image)
        }
    })

})

$('#example tbody').on('click', 'a.deleteBtn', function () {
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
                url: "../4uN+!0n$/users_ex/delete_user.php",
                data: {
                    id: id
                },
                type: "post",
                success: function (data) {
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

$('#imageField').on('change', function () {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImage').attr('src', e.target.result).show();
        }

        reader.readAsDataURL(input.files[0]);
    }
});


$(document).on('submit', '#addUser', function (e) {
    e.preventDefault();

    var formData = new FormData($(this)[0]);

    if (formData.get('username') && formData.get('fullname') && formData.get('user_type') && formData.get('codename') && formData.get('password') && formData.get('email') && formData.get('contactnum')) {

        $.ajax({
            url: "../4uN+!0n$//users_ex/add_user.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;
                if (status == 'true') {
                    var table = $('#example').DataTable();
                    table.ajax.reload(null, false);
                    $('#addUserModal').modal('hide');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Your Data has been Saved",
                        showConfirmButton: false,
                        timer: 2000 // Adjusted timer to 2000 milliseconds (2 seconds)
                    }).then(function () {
                        // Redirect to the desired page
                        window.location.href = "../pages/?page=manage_users";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to save data!',
                    });
                }
            },
            error: function () {
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


$(document).on('submit', '#updateUser', function (e) {
    e.preventDefault();

    var formData = new FormData($(this)[0]);

    if (formData.get('username') && formData.get('fullname') && formData.get('user_type') && formData.get('codename') && formData.get('email') && formData.get('contactnum')) {

        $.ajax({
            url: "../4uN+!0n$/users_ex/update_user.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                var json = JSON.parse(data);
                var status = json.status;
                if (status == 'true') {
                    var table = $('#example').DataTable();
                    table.ajax.reload(null, false);
                    $('#exampleModal').modal('hide');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Your Data has been Saved",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        // Redirect to the desired page after 1.5 seconds
                        window.location.href = "../pages/?page=manage_users";
                    });
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Oops...",
                        text: "Failed to save data!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function () {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Oops...",
                    text: "Failed to communicate with the server!",
                    showConfirmButton: false,
                    timer: 1500
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
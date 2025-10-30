$('#example tbody').on('click', 'a.editbtn', function () {
    event.preventDefault();
    //insert function here for editable
    var table = $('#example').DataTable();
    var trid = $(this).closest('tr').attr('id');
    // console.log(selectedRow);
    var id = $(this).data('id');
    $('#exampleModal').modal('show');

    $.ajax({
        url: "../4uN+!0n$/events_ex/get_single_data.php",
        data: {
            id: id
        },
        type: 'post',
        success: function (data) {
            var json = JSON.parse(data);

            $('#event_nameField').val(json.event_name);


            $('#startField').val(json.start);
            $('#endField').val(json.end);
            $('#backgroundColorField').val(json.backgroundColor);
            $('#borderColorField').val(json.borderColor);

            $('#id').val(id);
            $('#trid').val(trid);

        }
    })

})


$('#example tbody').on('click', 'a.deleteBtn', function (event) {
    event.preventDefault();

    // Get the ID of the item to be deleted
    var id = $(this).data('id');

    // Fetch the data to be deleted
    $.ajax({
        url: "../4uN+!0n$/events_ex/get_single_data.php",
        data: {
            id: id
        },
        type: 'post',
        success: function (data) {
            var json = JSON.parse(data);

            // Populate the fields with the fetched data
            $('#event_nameField').val(json.event_name);
            $('#startField').val(json.start);
            $('#endField').val(json.end);
            $('#backgroundColorField').val(json.backgroundColor);
            $('#borderColorField').val(json.borderColor);


            $('#id').val(id);
            $('#trid').val(json.trid);

            // Show the confirmation dialog
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
                    $.ajax({
                        url: "../4uN+!0n$/events_ex/delete_user.php",
                        data: {
                            id: id,
                            action_type: "DELETED",
                            controlnum: json.controlnum,
                            app_status: json.app_status,
                            interviewed_by: json.interviewed_by,
                            controlnum_renew: json.controlnum_renew,
                            app_status2: json.app_status2,
                            approved_by: json.approved_by

                        },
                        type: "POST",
                        success: function (data) {
                            var json = JSON.parse(data);
                            if (json.status === 'success') {
                                $('#example').DataTable().ajax.reload(null, false);
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Data has been Deleted.",
                                    icon: "success"
                                });
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Failed",
                                    text: json.message || 'Unknown error',
                                    icon: "error"
                                });
                            }
                        },
                        error: function () {
                            swalWithBootstrapButtons.fire({
                                title: "Error",
                                text: "Failed to communicate with server.",
                                icon: "error"
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });
        },
        error: function () {
            swalWithBootstrapButtons.fire({
                title: "Error",
                text: "Failed to fetch data.",
                icon: "error"
            });
        }
    });
});


// $(document).ready(function() {
//     $("#btngen").click(function() {
//         $.ajax({
//             url: '../4uN+!0n$/couples_ex/get_previous.php',
//             type: 'GET',
//             success: function(data) {
//                 $('#addcontrolnumField').val(data);
//             },
//             error: function() {
//                 alert('Error fetching previous number');
//             }
//         });
//     });
// });


// Handle form submission
$(document).on('submit', '#addUser', function (e) {
    e.preventDefault();

    // Fetch form data
    var event_name = $('#addevent_nameField').val();
    var start = $('#addstartField').val();
    var end = $('#addendField').val();


    // Set null if backgrounColor is empty
    if (backgroundColor === '') {
        backgroundColor = null;
    }

    // Set null if borderColor is empty
    if (borderColor === '') {
        borderColor = null;
    }

    // Validate required fields
    if (event_name !== '' && start !== '' && end !== '') {

        // AJAX request to add_user.php
        $.ajax({
            url: "../4uN+!0n$/couples_ex/add_user.php",
            type: "post",
            data: {
                event_name: event_name,
                start: start,
                end: end,
                backgroundColor: backgroundColor !== '' ? backgroundColor : null,
                borderColor: borderColor !== '' ? borderColor : null,

            },

            success: function (data) {
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
                    }).then(function () {
                        // Redirect to the desired page
                        window.location.href = "../pages/?page=couples_seminars";
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


// $(document).ready(function() {
//     // Function to fetch previous control number
//     function fetchPreviousControlNumber() {
//         $.ajax({
//             url: '../4uN+!0n$/couples_ex/get_previous_renew.php',
//             type: 'GET',
//             success: function(data) {
//                 $('#controlnum_renewField').val(data); // Set the fetched control number to the input field
//             },
//             error: function() {
//                 // Handle error if any
//                 alert('Error fetching previous control number');
//             }
//         });
//     }

//     // Event listener for the select element
//     $('#app_status2Field').change(function() {
//         var selectedOption = $(this).val();
//         if (selectedOption === 'RENEWAL') {
//             // Fetch the count of controlnum_renew instead of the previous number
//             fetchPreviousControlNumber();
//         } else {
//             // Reset or do something else when another option is selected
//             $('#controlnum_renewField').val(''); // Clear the field or handle differently
//         }
//     });
// });



$(document).on('submit', '#updateUser', function (e) {
    e.preventDefault();

    // Fetch form data
    var event_name = $('#event_nameField').val();
    var start = $('#startField').val();
    var end = $('#endField').val();

    var trid = $('#trid').val();
    var id = $('#id').val();


    // Set null if backgrounColor is empty
    if (backgroundColor === '') {
        backgroundColor = null;
    }

    // Set null if borderColor is empty
    if (borderColor === '') {
        borderColor = null;
    }

    // Validate required fields
    if (event_name !== '' && start !== '' && end !== '') {




        $.ajax({
            url: "../4uN+!0n$/couples_ex/update_user.php",
            type: "post",
            data: {
                interviewed_by: interviewed_by,
                controlnum: controlnum,
                date_interview: date_interview,
                g_firstname: g_firstname,
                pmc_sched: pmc_sched,
                g_middlename: g_middlename,
                lmp: lmp,
                g_lastname: g_lastname,
                date_marriage: date_marriage,
                g_bday: g_bday,
                date_proposal: date_proposal,
                g_age: g_age,
                num_children: num_children,
                g_status: g_status,
                l_engagement: l_engagement,
                g_address: g_address,
                b_mothername: b_mothername,
                g_educ_attained: g_educ_attained,
                g_fathername: g_fathername,
                g_occupation: g_occupation,
                b_foreign_partner: b_foreign_partner,
                g_contactnum: g_contactnum,
                b_contactnum: b_contactnum,
                g_foreign_partner: g_foreign_partner,
                b_occupation: b_occupation,
                b_fathername: b_fathername,
                b_educ_attained: b_educ_attained,
                g_mothername: g_mothername,
                b_address: b_address,
                b_firstname: b_firstname,
                b_status: b_status,
                b_middlename: b_middlename,
                b_age: b_age,
                b_lastname: b_lastname,
                b_bday: b_bday,
                g_1D: g_1D,
                g_2D: g_2D,
                g_3D: g_3D,
                g_4D: g_4D,
                b_1D: b_1D,
                b_2D: b_2D,
                b_3D: b_3D,
                b_4D: b_4D,
                or_number: or_number,
                TM1: TM1,
                TM2: TM2,
                TM3: TM3,
                app_status: app_status,
                app_status2: app_status2,
                controlnum_renew: controlnum_renew,
                or_number_renew: or_number_renew,
                TM1_renew: TM1_renew,
                TM2_renew: TM2_renew,
                TM3_renew: TM3_renew,
                approved_by: approved_by !== '' ? approved_by : null,
                remarks: remarks !== '' ? remarks : null,
                turnaround_time: turnaround_time,
                action_type: action_type, // Include hardcoded action_type

                id: id
            },
            success: function (data) {
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
                        timer: 1500
                    }).then(function () {
                        // Redirect to the desired page after 1.5 seconds
                        window.location.href = "../pages/?page=couples_seminars";
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


$(document).ready(function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'));
});


var startTime;

function updateTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight (0 hours)
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;
    var timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
    document.getElementById('end_interview').innerHTML = timeString;

    if (!startTime) {
        startTime = new Date(document.getElementById('adddate_interviewField').value);
    }

    // Calculate turnaround time
    var endDate = now;
    var timeDiff = Math.abs(endDate.getTime() - startTime.getTime());
    var diffHours = Math.floor(timeDiff / (1000 * 3600));
    var diffMinutes = Math.floor((timeDiff % (1000 * 3600)) / (1000 * 60));
    var diffSeconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

    // Format turnaround time in HH : mm : ss
    var turnaroundTime = ('0' + diffHours).slice(-2) + ' Hrs : ' +
        ('0' + diffMinutes).slice(-2) + ' min : ' +
        ('0' + diffSeconds).slice(-2) + ' seconds';

    // Update the read-only input field inside the modal
    var modal = document.getElementById('addUserModal');
    if (modal) {
        modal.querySelector('#addturnaround_timeField').value = turnaroundTime;
    }
}

document.getElementById('btngen').addEventListener('click', function () {
    // Reset the start time
    startTime = new Date();

    // Update time immediately on button click
    updateTime();
});

// Call updateTime once when the page loads
updateTime();

// Update time every second
setInterval(updateTime, 1000);

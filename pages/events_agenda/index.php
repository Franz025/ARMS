<?php include('../inc/connection.php'); ?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <!-- /.card -->
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title"><b> 📑 Make an Agenda ? </b></h3>
                        </div>
                        <div class="card-body">

                            <form id="addUser">

                                <div class="input-group">
                                    <label for="addevent_nameField" class="form-label"><b></b></label>
                                    <textarea type="text" class="form-control" id="addevent_nameField" value="" name="event_name" autocomplete="off" placeholder="Agenda"></textarea>

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success"><b> Submit </b></button>
                                    </div>

                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="addstartField" class="form-label"><b>Start Date:</b></label>
                                    <input type="date" class="form-control" id="addstartField" name="start" autocomplete="off">
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="addendField" class="form-label"><b>End Date:</b></label>
                                    <input type="date" class="form-control" id="addendField" name="end" autocomplete="off">
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="addbackgroundColorField" class="form-label"><b>Background Color:</b></label>
                                    <input type="hidden" class="form-control mx-2" id="backgroundColorHex" oninput="updateColorFromHex('addbackgroundColorField', this.value)">
                                    <input type="color" class="form-control" id="addbackgroundColorField" name="backgroundColor" onchange="updateColorPreview('backgroundColorHex', this.value)">
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="addborderColorField" class="form-label"><b>Border Color:</b></label>
                                    <input type="hidden" class="form-control mx-2" id="borderColorHex" oninput="updateColorFromHex('addborderColorField', this.value)">
                                    <input type="color" class="form-control" id="addborderColorField" name="borderColor" onchange="updateColorPreview('borderColorHex', this.value)">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="card card-outline card-success">
                    <div class="card-body p-0">

                        <div id="calendar"></div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- Update User Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="updateUserModalLabel"><i class="fas fa-user-edit"></i><b>&nbsp; Update
                        Application </b></h5>
                <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button> -->
            </div>
            <div class="modal-body">
                <form id="updateUser">

                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="trid" id="trid" value="">

                    <div class="container-fluid">
                        <div class="card card-outline card-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-center text-center">
                                    <div class="col-md-10">
                                        <label for="event_nameField" class="form-label"><b>Agenda Title:</b></label>
                                        <textarea type="text" class="form-control" id="event_nameField" value="" name="event_name" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-5">
                                        <label for="startField" class="form-label"><b>Start Date:</b></label>
                                        <input type="date" class="form-control" id="startField" name="start" autocomplete="off">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="endField" class="form-label"><b>End Date:</b></label>
                                        <input type="date" class="form-control" id="endField" name="end" autocomplete="off">
                                    </div>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center">
                                    <div class="col-md-10">
                                        <label for="backgroundColorField" class="form-label"><b>Background Color:</b></label>
                                        <input type="hidden" class="form-control mx-2" id="backgroundColorHex" oninput="updateColorFromHex('addbackgroundColorField', this.value)">
                                        <input type="color" class="form-control" id="backgroundColorField" name="backgroundColor" onchange="updateColorPreview('backgroundColorHex', this.value)">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-10">
                                        <label for="borderColorField" class="form-label"><b>Border Color:</b></label>
                                        <input type="hidden" class="form-control mx-2" id="borderColorHex" oninput="updateColorFromHex('addborderColorField', this.value)">
                                        <input type="color" class="form-control" id="borderColorField" name="borderColor" onchange="updateColorPreview('borderColorHex', this.value)">
                                    </div>
                                </div>
                                <br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<!-- <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="addUserModalLabel">
                    <i class="fas fa-plus-circle"></i><b>&nbsp; New Application</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUser">
                    <div class="container-fluid">
                        <div class="card card-outline card-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-center text-center">
                                    <div class="col-md-10">
                                        <label for="addevent_nameField" class="form-label"><b>Agenda Title:</b></label>
                                        <textarea type="text" class="form-control" id="addevent_nameField" value="" name="event_name" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-5">
                                        <label for="addstartField" class="form-label"><b>Start Date:</b></label>
                                        <input type="date" class="form-control" id="addstartField" name="start" autocomplete="off">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="addendField" class="form-label"><b>End Date:</b></label>
                                        <input type="date" class="form-control" id="addendField" name="end" autocomplete="off">
                                    </div>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center">
                                    <div class="col-md-10">
                                        <label for="addbackgroundColorField" class="form-label"><b>Background Color:</b></label>
                                        <input type="hidden" class="form-control mx-2" id="backgroundColorHex" oninput="updateColorFromHex('addbackgroundColorField', this.value)">
                                        <input type="color" class="form-control" id="addbackgroundColorField" name="backgroundColor" onchange="updateColorPreview('backgroundColorHex', this.value)">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-md-10">
                                        <label for="addborderColorField" class="form-label"><b>Border Color:</b></label>
                                        <input type="hidden" class="form-control mx-2" id="borderColorHex" oninput="updateColorFromHex('addborderColorField', this.value)">
                                        <input type="color" class="form-control" id="addborderColorField" name="borderColor" onchange="updateColorPreview('borderColorHex', this.value)">
                                    </div>
                                </div>
                                <br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->


<script>
    $(function() {
        // Function to fetch holiday data for the Philippines
        function fetchHolidays(start, end, callback) {
            $.ajax({
                url: '../4uN+!0n$/4p!/get_holidays.php', // URL for your PHP script
                method: 'GET',
                success: function(data) {
                    var holidayEvents = data.map(function(holiday) {
                        return {
                            title: holiday.localName,
                            start: holiday.date,
                            backgroundColor: 'red',
                            borderColor: 'red',
                            className: 'text-sm text-center text-bold'
                        };
                    });
                    callback(holidayEvents);
                },
                error: function() {
                    console.error('Failed to fetch holiday data');
                    callback([]);
                }
            });
        }

        // Initialize the calendar
        var calendarEl = document.getElementById('calendar'); // Make sure you have an element with this ID
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            events: function(fetchInfo, successCallback, failureCallback) {
                $.ajax({
                    url: '../4uN+!0n$/events_ex/get_single_data.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        start: fetchInfo.startStr,
                        end: fetchInfo.endStr
                    },
                    success: function(data) {
                        var events = [];
                        data.forEach(function(event) {
                            events.push({
                                id: event.id,
                                title: event.event_name,
                                start: event.start,
                                end: event.end,
                                backgroundColor: event.backgroundColor,
                                borderColor: event.borderColor,
                                className: 'text-sm text-center text-bold'
                            });
                        });

                        // Fetch holidays and merge with events
                        fetchHolidays(fetchInfo.startStr, fetchInfo.endStr, function(holidays) {
                            successCallback(events.concat(holidays));
                        });
                    },
                    error: function() {
                        failureCallback();
                    }
                });
            },
            editable: false,
            droppable: false,
            eventClick: function(info) {
                var eventObj = info.event;
                var id = eventObj.id;
                $('#exampleModal').modal('show');

                $.ajax({
                    url: "../4uN+!0n$/events_ex/get_single_data.php",
                    data: {
                        id: id
                    },
                    type: 'post',
                    success: function(data) {
                        try {
                            var json = JSON.parse(data);

                            console.log(json);

                            $('#event_nameField').val(json[0].event_name);
                            $('#startField').val(json[0].start);
                            $('#endField').val(json[0].end);
                            $('#backgroundColorField').val(json[0].backgroundColor);
                            $('#borderColorField').val(json[0].borderColor);
                            $('#id').val(id);
                            $('#trid').val(eventObj.id);
                        } catch (e) {
                            console.error("Error parsing JSON:", e);
                        }
                    },
                    error: function() {
                        console.error("Failed to fetch data from the server.");
                    }
                });
            }
        });

        calendar.render();
    });

    $('#example tbody').on('click', 'a.editbtn', function(event) {
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
            success: function(data) {
                var json = JSON.parse(data);
                $('#event_nameField').val(json.event_name);
                $('#startField').val(json.start);
                $('#endField').val(json.end);
                $('#backgroundColorField').val(json.backgroundColor);
                $('#borderColorField').val(json.borderColor);
                $('#id').val(id);
                $('#trid').val(trid);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: ", textStatus, errorThrown);
            }
        })
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
                    url: "../4uN+!0n$/events_ex/delete_events.php",
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
    $(document).on('submit', '#addUser', function(e) {
        e.preventDefault();

        // Fetch form data
        var event_name = $('#addevent_nameField').val();
        var start = $('#addstartField').val();
        var end = $('#addendField').val();
        var backgroundColor = $('#addbackgroundColorField').val(); // Corrected variable name
        var borderColor = $('#addborderColorField').val();

        // Validate required fields
        if (event_name !== '' && start !== '' && end !== '' && backgroundColor !== '' && borderColor !== '') {

            // AJAX request to add_user.php
            $.ajax({
                url: "../4uN+!0n$/events_ex/add_events.php",
                type: "post",
                data: {
                    event_name: event_name,
                    start: start,
                    end: end,
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
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
                            window.location.href = "../pages/?page=events_logs";
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to save data!',
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

    $(document).on('submit', '#updateUser', function(e) {
        e.preventDefault();

        // Fetch form data
        var event_name = $('#event_nameField').val();
        var start = $('#startField').val();
        var end = $('#endField').val();
        var backgroundColor = $('#backgroundColorField').val();
        var borderColor = $('#borderColorField').val();
        var trid = $('#trid').val();
        var id = $('#id').val();

        // Validate required fields
        if (event_name !== '' && start !== '' && end !== '' && backgroundColor !== '' && borderColor !== '') {
            $.ajax({
                url: "../4uN+!0n$/events_ex/update_events.php",
                type: "post",
                data: {
                    event_name: event_name,
                    start: start,
                    end: end,
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                    id: id
                },
                success: function(data) {
                    var json = JSON.parse(data);
                    var status = json.status;
                    if (status === 'true') {
                        var table = $('#example').DataTable();
                        table.ajax.reload(null, false);
                        $('#exampleModal').modal('hide');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Your Data has been Saved",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            // Redirect to the desired page after 1.5 seconds
                            window.location.href = "../pages/?page=events_logs";
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
                error: function() {
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


    function updateColorPreview(hexInputId, color) {
        document.getElementById(hexInputId).value = color;
        document.getElementById(hexInputId + 'Preview').style.backgroundColor = color;
    }

    function updateColorFromHex(colorInputId, hex) {
        if (/^#[0-9A-F]{6}$/i.test(hex)) {
            document.getElementById(colorInputId).value = hex;
            document.getElementById(colorInputId + 'Preview').style.backgroundColor = hex;
        }
    }
</script>
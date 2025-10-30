<?php include('../inc/connection.php'); ?>

<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-calendar-times"></i> &nbsp;
                Agenda List Information Sheet </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
                <!-- <a href="#" data-toggle="modal" data-target="#addUserModal" class="btn btn-success btn-sm"><i
                        class="fas fa-plus-circle"></i><b> New Application </b></a>
                </button> -->
            </div>
        </div>

        <div class="card-body">

            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <th class="text-center"> Agenda List </th>
                    <th class="text-center"> Date Started </th>
                    <th class="text-center"> Date End </th>
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
                url: '../4uN+!0n$/$3rv3r_$!d3_4!L3$/server_side_events_logs.php',
            },
            columns: [{
                    "data": 1,
                    render: function(data, type, full, meta) {
                        return '<center><b><a href="javascript:void(0);" data-id="' + full[0] + '"  class="editbtn" >' + data + '</a></b></center>';
                    }
                },
                {
                    "data": 2,
                    render: function(data, type, full, meta) {
                        return '<center><b><a href="javascript:void(0);" data-id="' + full[0] + '"  class="editbtn" >' + data + '</a></b></center>';
                    }
                },
                {
                    "data": 3,
                    render: function(data, type, full, meta) {
                        return '<center><b><a href="javascript:void(0);" data-id="' + full[0] + '"  class="editbtn" >' + data + '</a></b></center>';
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

    $('#example tbody').on('click', 'a.deleteBtn', function(event) {
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
            success: function(data) {
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
                            url: "../4uN+!0n$/events_ex/delete_events.php",
                            data: {
                                id: id,
                                action_type: "DELETED",
                                controlnum: json.controlnum,
                                app_status: json.app_status,
                                date_interview: json.date_interview,
                                interviewed_by: json.interviewed_by,
                                controlnum_renew: json.controlnum_renew,
                                app_status2: json.app_status2,
                                approved_by: json.approved_by

                            },
                            type: "POST",
                            success: function(data) {
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
                            error: function() {
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
            error: function() {
                swalWithBootstrapButtons.fire({
                    title: "Error",
                    text: "Failed to fetch data.",
                    icon: "error"
                });
            }
        });
    });
</script>
<?php include('../inc/connection.php'); ?>


<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-file-contract"></i> &nbsp; Approved Report Sheet </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
                <!-- <a href="#" data-toggle="modal" data-target="#addUserModal" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i><b> New Application </b></a> -->
                </button>
            </div>
        </div>

        <div class="card-body">

            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <th class="text-center"> Control No.: </th>
                    <th class="text-center"> Date of Interview </th>
                    <th class="text-center"> Groom's and Bride's Fullname </th>
                    <th class="text-center"> Interviewed By: </th>
                    <th class="text-center"> Status: </th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateUserModalLabel"><i class="fas fa-user-edit"></i><b>&nbsp; View Couples Information </b></h5>
                <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button> -->
            </div>
            <div class="modal-body">
                <form id="">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="true"><b> Pre-Marriage Sheet </b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false"><b> Pre-Marriage Certificate </b></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-five-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                            <div class="overlay-wrapper">
                                                <!-- <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div> -->
                                                <?php include('../../pmms/pages/for_print/index.php') ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                                            <div class="overlay-wrapper">
                                                <!-- <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div> -->
                                                <?php include_once('../../pmms/pages/for_print1/index.php') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                    </div>
            </div>
            </form>
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
                url: '../4uN+!0n$/$3rv3r_$!d3_4!L3$/server_side_reports.php',
            },
            columns: [{
                    "data": 1,
                    render: function(data, type, full, meta) {
                        return '<center><b><a href="javascript:void(0);" data-id="' + full[0] + '" id="btngen" class="editbtn" >' + data + '</a></b></center>';
                    }
                },
                {
                    "data": 42,
                    render: function(data, type, full, meta) {
                        return '<center><b><a href="javascript:void(0);" data-id="' + full[0] + '" id="btngen" class="editbtn"   >' + data + '</a></b></center>';
                    }
                },
                {
                    "data": 3,
                    render: function(data, type, full, meta) {
                        return '<b>' + full[4] + ',&nbsp;' + full[2] + '</b> (' + full[6] + ' Years Old)' + ' & <b>' + full[21] + ',&nbsp;' + full[19] + '</b> (' + full[23] + ' Years Old)';
                    }
                },
                {
                    data: 60,
                    render: function(data, type, full, meta) {
                        return '<b class="text text-sm"> ' + data + ' </b>';
                    }
                },
                {
                    "data": 48,
                    render: function(data, type, full, meta) {

                        switch (data) {
                            case 'APPROVED':
                                return '<center><span class="badge badge-success text-sm"> APPROVED </span></center>';
                            case 'RENEWAL':
                                return '<center><span class="badge badge-info text-sm"> RENEWAL </span></center>';
                            case 'PENDING':
                                return '<center><span class="badge badge-warning text-sm"> PENDING </span></center>';
                            case 'CANCELLED':
                                return '<center><span class="badge badge-danger text-sm"> CANCELLED </span></center>';
                            default:
                                return '';
                        }

                    }

                },
                <?php
                // Check if user_type is set in the session to avoid potential errors
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) : ?> {
                        "data": null,
                        render: function(data, type, full, meta) {

                            return '<center> <a href="javascript:void();" data-id="' + full[0] + '"  class="btn btn-danger btn-sm deleteBtn"</a> <i class="fas fa-trash-alt"></i> </center>';
           

                        }
                    }
                <?php endif; ?>
            ],
            columnDefs: [{
                // "targets": [0,1,4],
                // "className": "bold-text justify-end",

            }],
            initComplete: function(settings, json) {

                // $('#example thead th:eq(0)').removeClass('text-center');
                // $('#example thead th:eq(1)').removeClass('text-center');
                // $('#example thead th:eq(5)').removeClass('text-center');
                // $('#example thead th:eq(6)').removeClass('text-center');



                $('#example tbody').on('click', 'a.editbtn', function() {
                    event.preventDefault();
                    //insert function here for editable
                    var table = $('#example').DataTable();
                    var trid = $(this).closest('tr').attr('id');
                    // console.log(selectedRow);
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

                            $('#controlnumField').text(json.controlnum);
                            $('#controlnum_renewField').text(json.controlnum_renew);

                            $('#view_controlnumber').text(json.controlnum);
                            $('#view_controlnumber_renew').text(json.controlnum_renew);

                            $('#g_firstnameField').text(json.g_firstname);
                            $('#g_middlenameField').text(json.g_middlename);
                            $('#g_lastnameField').text(json.g_lastname);

                            $('#view_g_fullname').text(json.g_lastname + ', ' + json.g_firstname + ' ' + json.g_middlename);


                            $('#g_bdayField').text(json.g_bday);
                            $('#g_ageField').text(json.g_age);

                            $('#view_g_age_groom').text(json.g_age + ' years old');

                            $('#g_statusField').text(json.g_status_id);
                            $('#g_addressField').text(json.g_address);

                            $('#view_g_location').text(json.g_address);

                            $('#g_educ_attainedField').text(json.g_educ_attained_id);
                            $('#g_occupationField').text(json.g_occupation);

                            $('#view_g_work').text(json.g_occupation);

                            $('#g_contactnumField').text(json.g_contactnum);
                            $('#g_foreign_partnerField').text(json.g_foreign_partner);
                            $('#g_fathernameField').text(json.g_fathername);
                            $('#g_mothernameField').text(json.g_mothername);
                            $('#g_1DField').text(json.g_1D_id);
                            $('#g_2DField').text(json.g_2D_id);
                            $('#g_3DField').text(json.g_3D_id);
                            $('#g_4DField').text(json.g_4D_id);


                            $('#b_firstnameField').text(json.b_firstname);
                            $('#b_middlenameField').text(json.b_middlename);
                            $('#b_lastnameField').text(json.b_lastname);

                            $('#view_b_fullname').text(json.b_lastname + ', ' + json.b_firstname + ' ' + json.b_middlename);

                            $('#b_bdayField').text(json.b_bday);
                            $('#b_ageField').text(json.b_age);

                            $('#view_b_age_bride').text(json.b_age + ' years old');

                            $('#b_statusField').text(json.b_status_id);
                            $('#b_addressField').text(json.b_address);

                            $('#view_b_location').text(json.b_address);

                            $('#b_educ_attainedField').text(json.b_educ_attained_id);
                            $('#b_occupationField').text(json.b_occupation);

                            $('#view_b_work').text(json.b_occupation);

                            $('#b_contactnumField').text(json.b_contactnum);
                            $('#b_foreign_partnerField').text(json.b_foreign_partner);
                            $('#b_fathernameField').text(json.b_fathername);
                            $('#b_mothernameField').text(json.b_mothername);
                            $('#b_1DField').text(json.b_1D_id);
                            $('#b_2DField').text(json.b_2D_id);
                            $('#b_3DField').text(json.b_3D_id);
                            $('#b_4DField').text(json.b_4D_id);

                            $('#l_engagementField').text(json.l_engagement);
                            $('#num_childrenField').text(json.num_children);
                            $('#date_proposalField').text(json.date_proposal);
                            $('#date_marriageField').text(json.date_marriage);
                            $('#lmpField').text(json.lmp);
                            $('#pmc_schedField').text(json.pmc_sched);
                            $('#date_interviewField').text(json.date_interview);

                            var date = json.date_interview;
                            var options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            var formattedDate = new Date(date).toLocaleDateString('en-US', options);

                            $('#view_date_interview').text(formattedDate);

                            $('#interviewed_byField').text(json.interviewed_byfn);

                            $('#view_interviewed_by').text(json.interviewed_byfn);

                            
                            $('#or_numberField').text(json.or_number);
                            $('#or_number_renewField').text(json.or_number_renew);

                            $('#TM1Field').text(json.TM1_name);
                            $('#TM2Field').text(json.TM2_name);
                            $('#TM3Field').text(json.TM3_name);

                            $('#TM_1Field').text(json.TM1_pos);
                            $('#TM_2Field').text(json.TM2_pos);
                            $('#TM_3Field').text(json.TM3_pos);

                            $('#TM1_renewField').text(json.TM1_renew);
                            $('#TM2_renewField').text(json.TM2_renew);
                            $('#TM3_renewField').text(json.TM3_renew);

                            $('#TM_1renewField').text(json.TM1_pos_renew);
                            $('#TM_2renewField').text(json.TM2_pos_renew);
                            $('#TM_3renewField').text(json.TM3_pos_renew);

                            $('#id').text(id);
                            $('#trid').text(trid);

                        }
                    })

                })

            }
        });

    })




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
                    url: "../couples_ex/delete_user.php",
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
</script>
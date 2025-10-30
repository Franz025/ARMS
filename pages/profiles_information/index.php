<?php

include('../inc/connection.php');
include('../../pmms/pages/manage_profiles/index.php');

?>


<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-user-friends"></i>
                &nbsp;
                Profiles Information Application </h3>
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
                    <th class="text-center"> Control No.: </th>
                    <th class="text-center"> Date of Interview </th>
                    <th class="text-center"> Couple's Name </th>
                    <th class="text-center"> Interviewed By: </th>
                    <th class="text-center"> Status </th>
                    <?php
                    // Check if user_type is set in the session to avoid potential errors
                    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?>
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
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="updateUserModalLabel"><i class="fas fa-user-edit"></i><b>&nbsp; Update
                        Application </b></h5>
                <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button> -->
            </div>
            <div class="modal-body">
                <form id="updateUser">
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="trid" id="trid" value="">

                    <input type="hidden" class="form-control" id="action_typeField" name="action_type">
                    <input type="hidden" class="form-control" id="released_statusField" name="released_status">
                    <input type="hidden" class="form-control" id="released_status2Field" name="released_status2">

                    <div class="row d-flex justify-content-between">
                        <div class="col-4 d-flex align-items-center">
                            <label for="app_statusField" class="form-label"><b>Application Status:</b></label>
                            <input type="hidden" class="form-control" id="app_statusField"
                                value="<?php echo $app_status ?>" name="app_status">
                            <select class="form-control select" id="app_status2Field" name="app_status2" required>
                                <option value=""> </option>
                                <option value="PENDING"> RENEWAL </option>
                            </select>
                        </div>
                        <div class="col-4 d-flex justify-content-end align-items-center">
                            <label for="controlnumField" class="form-label"><b>Control Number:</b></label>
                            <input type="hidden" class="form-control" id="controlnum_renewField"
                                value="<?php echo $controlnum_renew ?>" name="controlnum_renew">
                            <input type="text" class="form-control" id="controlnumField" name="controlnum"
                                autocomplete="off" readonly>
                        </div>
                    </div>

                    <br>


                    <div class="col-md-12">
                        <div class="card card-success card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <!-- <li class="pt-2 px-3">
                                        <h3 class="card-title">Card Title</h3>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-grooms-tab" data-toggle="pill"
                                            href="#custom-tabs-grooms" role="tab" aria-controls="custom-tabs-grooms"
                                            aria-selected="true"><b>
                                                Groom's
                                                Profile </b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-brides-tab" data-toggle="pill"
                                            href="#custom-tabs-brides" role="tab" aria-controls="custom-tabs-brides"
                                            aria-selected="false"><b>
                                                Bride's Profile </b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-other-info-tab" data-toggle="pill"
                                            href="#custom-tabs-other-info" role="tab"
                                            aria-controls="custom-tabs-other-info" aria-selected="false"><b>
                                                Other Information </b></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-grooms" role="tabpanel"
                                        aria-labelledby="custom-tabs-grooms-tab">

                                        <div class="card card-outline card-success">
                                            <div class="card-header">
                                                <h3 class="card-title" style="font-weight: bold; font-size: 18px;">
                                                    🤵🏻 &nbsp; Groom's
                                                    Information </h3>
                                            </div>

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="g_firstnameField" class="form-label"><b> First
                                                                name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="g_firstnameField"
                                                            name="g_firstname" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="g_middlenameField" class="form-label"><b>
                                                                Middle name: </b></label>
                                                        <input type="text" class="form-control" id="g_middlenameField"
                                                            name="g_middlename" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="g_lastnameField" class="form-label"><b> Last name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="g_lastnameField"
                                                            name="g_lastname" autocomplete="off">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="g_bdayField" class="form-label"><b> Birthday:
                                                            </b></label>
                                                        <input type="date" class="form-control" id="g_bdayField"
                                                            name="g_bday" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="g_ageField" class="form-label"><b> Age: </b></label>
                                                        <input type="number" class="form-control" id="g_ageField"
                                                            name="g_age" Readonly>
                                                    </div>

                                                    <script>
                                                        document.getElementById('g_bdayField').addEventListener('input', function () {
                                                            const birthday = new Date(this.value);
                                                            const today = new Date();
                                                            let age = today.getFullYear() - birthday.getFullYear();
                                                            const monthDifference = today.getMonth() - birthday.getMonth();
                                                            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthday.getDate())) {
                                                                age--;
                                                            }
                                                            document.getElementById('g_ageField').value = age;
                                                        });
                                                    </script>

                                                    <div class="col-md-4">
                                                        <label for="g_statusField" class="form-label"><b> Status:
                                                            </b></label>
                                                        <select CLASS="form-control select" name="g_status"
                                                            id="g_statusField">
                                                            <option value=""></option>
                                                            <?php
                                                            $gstatusSql = $con->query("SELECT * FROM `tbl_civilstatuses`");
                                                            while ($rowCvs = $gstatusSql->fetch_assoc()):
                                                                $profileCivilStatus = $rowCvs["id"];
                                                                ?>
                                                                <option value="<?php echo $rowCvs['id'] ?>" <?php echo (isset($profileCivilStatus) && $rowCvs['id'] == $profileCivilStatus)
                                                                       ? '' : '' ?>>
                                                                    <?php echo $rowCvs['civilstatusName'] ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="g_provinceField"
                                                            class="form-label"><b>Province:</b></label>
                                                        <select class="form-control select" name="g_province"
                                                            id="g_provinceField" aria-describedby="g_province">
                                                            <option value="">Select Province</option>
                                                            <?php
                                                            $gprovinceSql = $con->query("SELECT * FROM `tbl_province` ORDER BY provDesc ASC");
                                                            while ($rowPrvns = $gprovinceSql->fetch_assoc()):
                                                                ?>
                                                                <option value="<?php echo $rowPrvns['provCode']; ?>">
                                                                    <?php echo $rowPrvns['provDesc']; ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                        <small id="g_province" class="form-text text-danger">
                                                            *Please select the province.
                                                        </small>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="g_muni_cityField"
                                                            class="form-label"><b>City/Municipality:</b></label>
                                                        <select class="form-control select" name="g_muni_city"
                                                            id="g_muni_cityField" aria-describedby="g_muni_city">
                                                            <option value="">Select City/Municipality
                                                            </option>
                                                            <?php
                                                            $gmunicitySql = $con->query("SELECT * FROM `tbl_city_municipality` ORDER BY citymunDesc ASC");
                                                            while ($rowMncpltyCty = $gmunicitySql->fetch_assoc()):
                                                                ?>
                                                                <option
                                                                    value="<?php echo $rowMncpltyCty['citymunCode']; ?>">
                                                                    <?php echo $rowMncpltyCty['citymunDesc']; ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                        <small id="g_muni_city" class="form-text text-danger">
                                                            *Please select the city/municipality.
                                                        </small>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="g_barangayField"
                                                            class="form-label"><b>Barangay:</b></label>
                                                        <select class="form-control select" name="g_barangay"
                                                            id="g_barangayField" aria-describedby="g_barangay">
                                                            <option value="">Select Barangay</option>
                                                        </select>
                                                        <small id="g_barangay" class="form-text text-danger">
                                                            *Please select the barangay.
                                                        </small>
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function () {

                                                        $('#g_provinceField').change(function () {
                                                            var provCode = $(this).val();
                                                            if (provCode) {
                                                                $.ajax({
                                                                    url: "../4uN+!0n$/couples_ex/get_cities.php",
                                                                    method: "POST",
                                                                    data: {
                                                                        provCode: provCode
                                                                    },
                                                                    success: function (data) {
                                                                        $('#g_muni_cityField').html(data);
                                                                        $('#g_barangayField').html('<option value="">Select Barangay</option>');
                                                                    }
                                                                });
                                                            } else {
                                                                $('#g_muni_cityField').html('<option value="">Select City/Municipality</option>');
                                                                $('#g_barangayField').html('<option value="">Select Barangay</option>');
                                                            }
                                                        });


                                                        $('#g_muni_cityField').change(function () {
                                                            var citymunCode = $(this).val();
                                                            if (citymunCode) {
                                                                $.ajax({
                                                                    url: "../4uN+!0n$/couples_ex/get_barangays.php",
                                                                    method: "POST",
                                                                    data: {
                                                                        citymunCode: citymunCode
                                                                    },
                                                                    success: function (data) {
                                                                        $('#g_barangayField').html(data);
                                                                    }
                                                                });
                                                            } else {
                                                                $('#g_barangayField').html('<option value="">Select Barangay</option>');
                                                            }
                                                        });
                                                    });
                                                </script>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="g_addressField" class="form-label"><b> Address:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="g_addressField"
                                                            name="g_address" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="g_educ_attainedField" class="form-label"><b>
                                                                Educational
                                                                Attainment:
                                                            </b></label>
                                                        <select CLASS="form-control select" name="g_educ_attained"
                                                            id="g_educ_attainedField">
                                                            <option value=""></option>
                                                            <?php
                                                            $gEducSql = $con->query("SELECT * FROM `tbl_education`");
                                                            while ($rowEduc = $gEducSql->fetch_assoc()):
                                                                $profileEducAttained = $rowEduc["id"];
                                                                ?>
                                                                <option value="<?php echo $rowEduc['id'] ?>" <?php echo (isset($profileEducAttained) && $rowEduc['id'] == $profileEducAttained)
                                                                       ? '' : '' ?>>
                                                                    <?php echo $rowEduc['educationName'] ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="g_occupationField" class="form-label"><b>
                                                                Occupation: </b></label>
                                                        <input type="text" class="form-control" id="g_occupationField"
                                                            name="g_occupation" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="g_contactnumField" class="form-label"><b> Contact
                                                                Number:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="g_contactnumField"
                                                            name="g_contactnum" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="g_foreign_partnerField" class="form-label"><b>Are
                                                                you a
                                                                Foreigner?</b></label>
                                                        <select class="form-control" id="g_foreign_partnerField"
                                                            name="g_foreign_partner">
                                                            <option value=""> </option>
                                                            <option value="YES"> YES </option>
                                                            <option value="NO"> NO </option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="g_fathernameField" class="form-label"><b>
                                                                Fathername: </b></label>
                                                        <input type="text" class="form-control" id="g_fathernameField"
                                                            name="g_fathername" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="b_mothernameField" class="form-label"><b> Mother
                                                                Maiden Name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="g_mothernameField"
                                                            name="g_mothername" autocomplete="off">
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="container-fluid">
                                                    <div class="card card-outline card-success">
                                                        <div class="card-header">
                                                            <h3 class="card-title"
                                                                style="font-weight: bold; font-size: 12px;">
                                                                💉
                                                                &nbsp; Vaccine Status </h3>
                                                        </div>

                                                        <div class="card-body">

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label for="g_1DField" class="form-label"><b> First
                                                                            Dose:
                                                                        </b></label>
                                                                    <select CLASS="form-control select" name="g_1D"
                                                                        id="g_1DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="g_2DField" class="form-label"><b>
                                                                            Second Dose:
                                                                        </b></label>
                                                                    <select CLASS="form-control select" name="g_2D"
                                                                        id="g_2DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="g_3DField" class="form-label"><b> First
                                                                            Booster Dose:
                                                                        </b></label>
                                                                    <select CLASS="form-control select" name="g_3D"
                                                                        id="g_3DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="g_4DField" class="form-label"><b>
                                                                            Second Booster Dose:
                                                                        </b></label>
                                                                    <select CLASS="form-control select" name="g_4D"
                                                                        id="g_4DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-brides" role="tabpanel"
                                        aria-labelledby="custom-tabs-brides-tab">

                                        <div class="card card-outline card-success">
                                            <div class="card-header">
                                                <h3 class="card-title" style="font-weight: bold; font-size: 18px;">
                                                    👰🏻 &nbsp;
                                                    Bride's Information </h3>
                                            </div>

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="b_firstnameField" class="form-label"><b> First
                                                                name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_firstnameField"
                                                            name="b_firstname" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="b_middlenameField" class="form-label"><b>
                                                                Middle name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_middlenameField"
                                                            name="b_middlename" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="b_lastnameField" class="form-label"><b> Last name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_lastnameField"
                                                            name="b_lastname" autocomplete="off">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="b_bdayField" class="form-label"><b> Birthday:
                                                            </b></label>
                                                        <input type="date" class="form-control" id="b_bdayField"
                                                            name="b_bday">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="b_ageField" class="form-label"><b> Age: </b></label>
                                                        <input type="number" class="form-control" id="b_ageField"
                                                            name="b_age" Readonly>
                                                    </div>

                                                    <script>
                                                        document.getElementById('b_bdayField').addEventListener('input', function () {
                                                            const birthday = new Date(this.value);
                                                            const today = new Date();
                                                            let age = today.getFullYear() - birthday.getFullYear();
                                                            const monthDifference = today.getMonth() - birthday.getMonth();
                                                            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthday.getDate())) {
                                                                age--;
                                                            }
                                                            document.getElementById('b_ageField').value = age;
                                                        });
                                                    </script>

                                                    <div class="col-md-4">
                                                        <label for="b_statusField" class="form-label"><b> Status:
                                                            </b></label>
                                                        <select CLASS="form-control select" name="b_status"
                                                            id="b_statusField">
                                                            <option value=""></option>
                                                            <?php
                                                            $gstatusSql = $con->query("SELECT * FROM `tbl_civilstatuses`");
                                                            while ($rowCvs = $gstatusSql->fetch_assoc()):
                                                                $profileCivilStatus = $rowCvs["id"];
                                                                ?>
                                                                <option value="<?php echo $rowCvs['id'] ?>" <?php echo (isset($profileCivilStatus) && $rowCvs['id'] == $profileCivilStatus)
                                                                       ? '' : '' ?>>
                                                                    <?php echo $rowCvs['civilstatusName'] ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="b_provinceField"
                                                            class="form-label"><b>Province:</b></label>
                                                        <select class="form-control select" name="b_province"
                                                            id="b_provinceField" aria-describedby="b_province">
                                                            <option value="">Select Province</option>
                                                            <?php
                                                            $gprovinceSql = $con->query("SELECT * FROM `tbl_province` ORDER BY provDesc ASC");
                                                            while ($rowPrvns = $gprovinceSql->fetch_assoc()):
                                                                ?>
                                                                <option value="<?php echo $rowPrvns['provCode']; ?>">
                                                                    <?php echo $rowPrvns['provDesc']; ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                        <small id="b_province" class="form-text text-danger">
                                                            *Please select the province.
                                                        </small>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="b_muni_cityField"
                                                            class="form-label"><b>City/Municipality:</b></label>
                                                        <select class="form-control select" name="b_muni_city"
                                                            id="b_muni_cityField" aria-describedby="b_muni_city">
                                                            <option value="">Select City/Municipality
                                                            </option>
                                                            <?php
                                                            $bmunicitySql = $con->query("SELECT * FROM `tbl_city_municipality` ORDER BY citymunDesc ASC");
                                                            while ($rowMncpltyCty = $bmunicitySql->fetch_assoc()):
                                                                ?>
                                                                <option
                                                                    value="<?php echo $rowMncpltyCty['citymunCode']; ?>">
                                                                    <?php echo $rowMncpltyCty['citymunDesc']; ?>
                                                                </option>
                                                            <?php endwhile; ?>

                                                        </select>
                                                        <small id="b_muni_city" class="form-text text-danger">
                                                            *Please select the city/municipality.
                                                        </small>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="b_barangayField"
                                                            class="form-label"><b>Barangay:</b></label>
                                                        <select class="form-control select" name="b_barangay"
                                                            id="b_barangayField" aria-describedby="b_barangay">
                                                            <option value="">Select Barangay</option>

                                                        </select>
                                                        <small id="b_barangay" class="form-text text-danger">
                                                            *Please select the barangay.
                                                        </small>
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function () {

                                                        $('#b_provinceField').change(function () {
                                                            var provCode = $(this).val();
                                                            if (provCode) {
                                                                $.ajax({
                                                                    url: "../4uN+!0n$/couples_ex/get_cities.php",
                                                                    method: "POST",
                                                                    data: {
                                                                        provCode: provCode
                                                                    },
                                                                    success: function (data) {
                                                                        $('#b_muni_cityField').html(data);
                                                                        $('#b_barangayField').html('<option value="">Select Barangay</option>');
                                                                    }
                                                                });
                                                            } else {
                                                                $('#b_muni_cityField').html('<option value="">Select City/Municipality</option>');
                                                                $('#b_barangayField').html('<option value="">Select Barangay</option>');
                                                            }
                                                        });


                                                        $('#b_muni_cityField').change(function () {
                                                            var citymunCode = $(this).val();
                                                            if (citymunCode) {
                                                                $.ajax({
                                                                    url: "../4uN+!0n$/couples_ex/get_barangays.php",
                                                                    method: "POST",
                                                                    data: {
                                                                        citymunCode: citymunCode
                                                                    },
                                                                    success: function (data) {
                                                                        $('#b_barangayField').html(data);
                                                                    }
                                                                });
                                                            } else {
                                                                $('#b_barangayField').html('<option value="">Select Barangay</option>');
                                                            }
                                                        });
                                                    });
                                                </script>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="b_addressField" class="form-label"><b> Address:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_addressField"
                                                            name="b_address" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="b_educ_attainedField" class="form-label"><b>
                                                                Educational
                                                                Attainment: </b></label>
                                                        <select CLASS="form-control select" name="b_educ_attained"
                                                            id="b_educ_attainedField">
                                                            <option value=""></option>
                                                            <?php
                                                            $gEducSql = $con->query("SELECT * FROM `tbl_education`");
                                                            while ($rowEduc = $gEducSql->fetch_assoc()):
                                                                $profileEducAttained = $rowEduc["id"];
                                                                ?>
                                                                <option value="<?php echo $rowEduc['id'] ?>" <?php echo (isset($profileEducAttained) && $rowEduc['id'] == $profileEducAttained)
                                                                       ? '' : '' ?>>
                                                                    <?php echo $rowEduc['educationName'] ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="b_occupationField" class="form-label"><b>
                                                                Occupation:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_occupationField"
                                                            name="b_occupation" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="b_contactnumField" class="form-label"><b> Contact
                                                                Number:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_contactnumField"
                                                            name="b_contactnum" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="b_foreign_partnerField" class="form-label"><b>Are
                                                                you a
                                                                Foreigner?</b></label>
                                                        <select class="form-control" id="b_foreign_partnerField"
                                                            name="b_foreign_partner">
                                                            <option value=""> </option>
                                                            <option value="YES"> YES </option>
                                                            <option value="NO"> NO </option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="b_fathernameField" class="form-label"><b>
                                                                Father name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_fathernameField"
                                                            name="b_fathername" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="b_mothernameField" class="form-label"><b> Mother's
                                                                Maiden Name:
                                                            </b></label>
                                                        <input type="text" class="form-control" id="b_mothernameField"
                                                            name="b_mothername" autocomplete="off">
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="container-fluid">
                                                    <div class="card card-outline card-success">
                                                        <div class="card-header">
                                                            <h3 class="card-title"
                                                                style="font-weight: bold; font-size: 12px;">
                                                                💉
                                                                &nbsp; Vaccine Status </h3>
                                                        </div>

                                                        <div class="card-body">

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label for="b_1DField" class="form-label"><b> First
                                                                            Dose:
                                                                        </b></label>
                                                                    <select CLASS="form-control select" name="b_1D"
                                                                        id="b_1DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="b_2DField" class="form-label"><b>
                                                                            Second Dose:
                                                                        </b></label>
                                                                    <select CLASS="form-control select" name="b_2D"
                                                                        id="b_2DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="b_3DField" class="form-label"><b> First
                                                                            Booster
                                                                            Dose: </b></label>
                                                                    <select CLASS="form-control select" name="b_3D"
                                                                        id="b_3DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="b_4DField" class="form-label"><b>
                                                                            Second Booster
                                                                            Dose: </b></label>
                                                                    <select CLASS="form-control select" name="b_4D"
                                                                        id="b_4DField">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $bCvaxSql = $con->query("SELECT * FROM `tbl_covidvax`");
                                                                        while ($rowCvax = $bCvaxSql->fetch_assoc()):
                                                                            $profileCvaccine = $rowCvax["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowCvax['id'] ?>"
                                                                                <?php echo (isset($profileCvaccine) &&
                                                                                    $rowCvax['id'] == $profileCvaccine) ? '' : ''
                                                                                    ?>>
                                                                                <?php echo $rowCvax['VaccineName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-other-info" role="tabpanel"
                                        aria-labelledby="custom-tabs-other-info-tab">


                                        <div class="container-container-fluid">
                                            <div class="card card-outline card-success">
                                                <div class="card-header">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h3 class="card-title"
                                                            style="font-weight: bold; font-size: 18px;">
                                                            ℹ️
                                                            &nbsp; Other Information </h3>

                                                        <div class="row">
                                                            <div
                                                                class="col-12 ml-auto d-flex justify-content-end align-items-center">
                                                                <label for="or_numberField" class="form-label"><b> OR
                                                                        No. (NEW):
                                                                    </b></label>


                                                                <input type="text" class="form-control"
                                                                    id="or_numberField" name="or_number"
                                                                    autocomplete="off" Required>
                                                                <small id="or_numberField"
                                                                    class="form-text text-danger">
                                                                    *Please include the O.R. number.
                                                                </small>
                                                                <input type="hidden" class="form-control"
                                                                    id="or_number_renewField" name="or_number_renew"
                                                                    value="" autocomplete="off">
                                                                <input type="hidden" class="form-control"
                                                                    id="approved_byField" name="approved_by" value=""
                                                                    autocomplete="off">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="l_engagementField" class="form-label"><b>
                                                                    Lenght of
                                                                    Engagement: </b></label>
                                                            <input type="text" class="form-control"
                                                                id="l_engagementField" name="l_engagement">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="num_childrenField" class="form-label"><b>
                                                                    Number of
                                                                    Children
                                                                    Desired: </b></label>
                                                            <input type="text" class="form-control"
                                                                id="num_childrenField" name="num_children">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="date_proposalField" class="form-label"><b> Date
                                                                    of
                                                                    Proposal:
                                                                </b></label>
                                                            <input type="date" class="form-control"
                                                                id="date_proposalField" name="date_proposal">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="date_marriageField" class="form-label"><b> Date
                                                                    of
                                                                    Marriage:
                                                                </b></label>
                                                            <input type="date" class="form-control"
                                                                id="date_marriageField" name="date_marriage">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="lmpField" class="form-label"><b>LMP:</b></label>
                                                            <input type="text" class="form-control" id="lmpField"
                                                                name="lmp">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="pmc_schedField" class="form-label"><b>PMC
                                                                    Schedule:</b></label>
                                                            <input type="date" class="form-control" id="pmc_schedField"
                                                                name="pmc_sched">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="date_interviewField" class="form-label"><b>Date
                                                                    of Interview:</b></label>
                                                            <input type="datetime-local" class="form-control"
                                                                value="<?php echo date('Y-m-d\TH:i') ?>"
                                                                id="date_interviewField" name="date_interview" readonly>
                                                            <input type="hidden" class="form-control"
                                                                id="date_approvedField" name="date_approved" value=""
                                                                autocomplete="off" readonly>
                                                        </div>

                                                        <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 2)): ?>
                                                            <div class="col-md-3">
                                                                <label for="interviewed_byField"
                                                                    class="form-label"><b>Interviewed By:</b></label>
                                                                <select class="form-control select" name="interviewed_by"
                                                                    id="interviewed_byField">
                                                                    <option value=""></option>
                                                                    <?php
                                                                    $interviewerSql = $con->query("SELECT * FROM `tbl_users`");
                                                                    while ($rowItvwr = $interviewerSql->fetch_assoc()):
                                                                        $profileInterviewer = $rowItvwr["codename"];
                                                                        ?>
                                                                        <option value="<?php echo $rowItvwr['codename'] ?>"
                                                                            <?php echo (isset($profileInterviewer) && $rowItvwr['codename'] == $profileInterviewer) ? 'selected' : '' ?>>
                                                                            <?php echo $rowItvwr['fullname'] ?>
                                                                        </option>
                                                                    <?php endwhile; ?>
                                                                </select>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 3): ?>
                                                            <div class="col-md-3">
                                                                <label for="interviewed_byField"
                                                                    class="form-label"><b>Interviewed By:</b></label>
                                                                <input type="text" class="form-control"
                                                                    value="<?php echo $_SESSION["fullname"] ?>"
                                                                    id="interviewed_byField" name="interviewed_by" readonly>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>


                                                </div>

                                                <div class="container-fluid">
                                                    <div class="card card-outline card-success">
                                                        <div class="card-header">
                                                            <h3 class="card-title"
                                                                style="font-weight: bold; font-size: 12px;">
                                                                👨🏻‍🏫
                                                                &nbsp;
                                                                Seminar Facilitator </h3>
                                                        </div>

                                                        <div class="card-body">

                                                            <input type="hidden" class="form-control"
                                                                id="TM1_renewField" name="TM1_renew" value=""
                                                                autocomplete="off" Readonly>
                                                            <input type="hidden" class="form-control"
                                                                id="TM2_renewField" name="TM2_renew" value=""
                                                                autocomplete="off" Readonly>
                                                            <input type="hidden" class="form-control"
                                                                id="TM3_renewField" name="TM3_renew" value=""
                                                                autocomplete="off" Readonly>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="TM1Field" class="form-label"><b> Team
                                                                            Member: </b></label>
                                                                    <select CLASS="form-control select" name="TM1"
                                                                        id="TM1Field" Required>
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $EmpSql = $con->query("SELECT * FROM `tbl_employees`");
                                                                        while ($rowEmp = $EmpSql->fetch_assoc()):
                                                                            $profileEmp = $rowEmp["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowEmp['id'] ?>"
                                                                                <?php echo (isset($profileEmp) &&
                                                                                    $rowEmp['id'] == $profileEmp) ? '' : '' ?>>
                                                                                <?php echo $rowEmp['employeeName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                    <small id="TM1Field" class="form-text text-danger">
                                                                        *Please select the team member.
                                                                    </small>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="TM2Field" class="form-label"><b> Team
                                                                            Member: </b></label>
                                                                    <select CLASS="form-control select" name="TM2"
                                                                        id="TM2Field" Required>
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $EmpSql = $con->query("SELECT * FROM `tbl_employees`");
                                                                        while ($rowEmp = $EmpSql->fetch_assoc()):
                                                                            $profileEmp = $rowEmp["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowEmp['id'] ?>"
                                                                                <?php echo (isset($profileEmp) &&
                                                                                    $rowEmp['id'] == $profileEmp) ? '' : '' ?>>
                                                                                <?php echo $rowEmp['employeeName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                    <small id="TM2Field" class="form-text text-danger">
                                                                        *Please select the team member.
                                                                    </small>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="TM3Field" class="form-label"><b> Team
                                                                            Member: </b></label>
                                                                    <select CLASS="form-control select" name="TM3"
                                                                        id="TM3Field" Required>
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $EmpSql = $con->query("SELECT * FROM `tbl_employees`");
                                                                        while ($rowEmp = $EmpSql->fetch_assoc()):
                                                                            $profileEmp = $rowEmp["id"];
                                                                            ?>
                                                                            <option value="<?php echo $rowEmp['id'] ?>"
                                                                                <?php echo (isset($profileEmp) &&
                                                                                    $rowEmp['id'] == $profileEmp) ? '' : '' ?>>
                                                                                <?php echo $rowEmp['employeeName'] ?>
                                                                            </option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                    <small id="TM3Field" class="form-text text-danger">
                                                                        *Please select the team member.
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="container-fluid">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight: bold; font-size: 12px;">
                                    💬
                                    &nbsp; Interviewer Remarks:
                                </h3>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <label for="remarksField" style="font-weight: none;"><b>

                                                </b></label>
                                            <textarea rows="2" cols="50" name="remarks" id="remarksField"
                                                class="form-control" maxlength="512"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success"
                                            style="margin-top: 35px; margin-left: 40px;">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-center">
                        <div class="col-md-3 text-center">
                            <label for="turnaround_timeField" class="form-label"><b> Duration of Interview:
                                    <input type="text" class="form-control" id="turnaround_timeField" value=""
                                        name="turnaround_time" onload="updateTime()" Readonly>

                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- View User Modal -->
<div class="modal fade" id="example2Modal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateUserModalLabel"><i class="fas fa-user-edit"></i><b>&nbsp; View
                        Couples Information </b></h5>
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
                                            <a class="nav-link active" id="custom-tabs-five-overlay-tab"
                                                data-toggle="pill" href="#custom-tabs-five-overlay" role="tab"
                                                aria-controls="custom-tabs-five-overlay" aria-selected="true"><b>
                                                    Pre-Marriage Application </b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab"
                                                data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab"
                                                aria-controls="custom-tabs-five-overlay-dark" aria-selected="false"><b>
                                                    Pre-Marriage Certificate </b></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-five-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-five-overlay"
                                            role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                                            <div class="overlay-wrapper">
                                                <!-- <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div> -->
                                                <?php include('../../pmms/pages/for_print/index.php') ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel"
                                            aria-labelledby="custom-tabs-five-overlay-dark-tab">
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
    $(document).ready(function () {


        var table = $('#example').DataTable({
            autoWidth: false,
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '../4uN+!0n$/$3rv3r_$!d3_4!L3$/server_side_approved.php',
            },
            columns: [{
                "data": 1,
                render: function (data, type, full, meta) {
                    return '<center><b><a href="javascript:void(0);" data-id="' + full[0] +
                        '" id="btngen" class="editbtn" >' + data + '</a></b></center>';
                }
            },
            {
                "data": 48,
                render: function (data, type, full, meta) {
                    return '<center><b><a href="javascript:void(0);" data-id="' + full[0] +
                        '" id="btngen" class="editbtn"   >' + data + '</a></b></center>';
                }
            },
            {
                "data": 3,
                render: function (data, type, full, meta) {
                    return '<b>' + full[4] + ',&nbsp;' + full[2] + '</b> (' + full[6] +
                        ' Years Old)' +
                        ' & <b>' + full[24] + ',&nbsp;' + full[22] + '</b> (' + full[26] +
                        ' Years Old)' +
                        '&nbsp;<a href="javascript:void(0);" data-id="' + full[0] +
                        '" class="viewbtn">' +
                        '<i class="fas fa-id-card d-flex justify-content-end" style="font-size: 20px;"></i>' +
                        '</a>';
                }
            },
            {
                data: 68,
                render: function (data, type, full, meta) {
                    return '<b class="text text-sm"> ' + data + ' </b>';
                }
            },
            // {
            //     data: 43,
            //     render: function(data, type, full, meta) {

            //         switch (data) {
            //             case 'aamacatangay':
            //                 return '<b class="text-success text-sm"> ARLYN A. MACATANGAY </b>';
            //             case 'acgcadano':
            //                 return '<b class="text-success text-sm"> AIZA CAREN G. CADANO </b>';
            //             case 'bvpagsinuhin':
            //                 return '<b class="text-success text-sm"> BABYLYN V. PAGSINUHIN </b>';
            //             case 'edlacsamana':
            //                 return '<b class="text-success text-sm"> EULALI D. LACSAMANA </b>';
            //             case 'frarenas':
            //                 return '<b class="text-success text-sm"> FRANCIS R. ARENAS </b>';
            //             case 'jdibon':
            //                 return '<b class="text-success text-sm"> JANETTE D. IBON </b>';
            //             case 'jhmedrano':
            //                 return '<b class="text-success text-sm"> JUSTIN H. MEDRANO </b>';
            //             case 'ldalvar':
            //                 return '<b class="text-success text-sm"> LEA D. ALVAR </b>';
            //             case 'lgsapinoso':
            //                 return '<b class="text-success text-sm"> LYKA G. SAPINOSO </b>';
            //             case 'mcmcelis':
            //                 return '<b class="text-success text-sm"> MARIA CATHERINE M. CELIS </b>';
            //             case 'zdfaalam':
            //                 return '<b class="text-success text-sm"> ZION D. FAALAM </b>';

            //             default:
            //                 return '';
            //         }
            //     }
            // },
            {
                "data": 54,
                "render": function (data, type, full, meta) {
                    // Initialize status as an empty string
                    var status = '';

                    // Check the status hierarchy: RELEASED > APPROVED
                    if (full[66] === 'RELEASED') {
                        // RELEASED takes precedence
                        status =
                            '<b><center><span class="badge badge-success text-sm"><i class="fas fa-sign-out-alt"></i> RELEASED</span></center></b>';
                    } else if (full[54] === 'APPROVED') {
                        // Show APPROVED if RELEASED is not present
                        status =
                            '<b><center><span class="badge badge-success text-sm"><i class="far fa-check-circle"></i> APPROVED</span></center></b>';
                    } else {
                        // If neither APPROVED nor RELEASED, show the content of full[48] or full[61] accordingly
                        status = '<center><b>' + (full[54] || full[66]) + '</b></center>';
                    }

                    // Return the final status
                    return status;
                }
            },

                <?php
                // Check if user_type is set in the session to avoid potential errors
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1): ?> {
                    "data": null,
                    render: function (data, type, full, meta) {

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
            initComplete: function () {
                this.api().columns([12, 13, 14]).every(function () {
                    var column = this;
                    column.search('^$', true, false).draw();
                });



            }
        })
    })


    $('#example tbody').on('click', 'a.viewbtn', function () {
        event.preventDefault();
        //insert function here for editable
        var table = $('#example').DataTable();
        var trid = $(this).closest('tr').attr('id');
        // console.log(selectedRow);
        var id = $(this).data('id');
        $('#example2Modal').modal('show');

        $.ajax({
            url: "../4uN+!0n$/couples_ex/get_single_data.php",
            data: {
                id: id
            },
            type: 'post',
            success: function (data) {
                var json = JSON.parse(data);

                $('#viewcontrolnumField').text(json.controlnum);
                $('#viewcontrolnum_renewField').text(json.controlnum_renew);

                $('#view_controlnumber').text(json.controlnum);
                $('#view_controlnumber_renew').text(json.controlnum_renew);

                $('#viewg_firstnameField').text(json.g_firstname);
                $('#viewg_middlenameField').text(json.g_middlename);
                $('#viewg_lastnameField').text(json.g_lastname);

                $('#view_g_fullname').text(json.g_lastname + ', ' + json.g_firstname + ' ' + json.g_middlename);


                $('#viewg_bdayField').text(json.g_bday);
                $('#viewg_ageField').text(json.g_age);

                $('#view_g_age_groom').text(json.g_age + ' years old');

                $('#viewg_statusField').text(json.g_status_id);
                $('#viewg_provinceField').text(json.g_province);
                $('#viewg_muni_cityField').text(json.g_muni_city);
                $('#viewg_barangayField').text(json.g_barangay);

                $('#viewg_addressField').text(json.g_address);

                $('#viewgfull_addressField').html(json.g_address + '&nbsp;' + json.g_barangayDesc + ', ' + json.g_muni_cityDesc + ', ' + json.g_provinceDesc);

                $('#view_g_location').text(json.g_address);

                $('#viewg_educ_attainedField').text(json.g_educ_attained_id);
                $('#viewg_occupationField').text(json.g_occupation);

                $('#view_g_work').text(json.g_occupation);

                $('#viewg_contactnumField').text(json.g_contactnum);
                $('#viewg_foreign_partnerField').text(json.g_foreign_partner);
                $('#viewg_fathernameField').text(json.g_fathername);
                $('#viewg_mothernameField').text(json.g_mothername);
                $('#viewg_1DField').text(json.g_1D_id);
                $('#viewg_2DField').text(json.g_2D_id);
                $('#viewg_3DField').text(json.g_3D_id);
                $('#viewg_4DField').text(json.g_4D_id);


                $('#viewb_firstnameField').text(json.b_firstname);
                $('#viewb_middlenameField').text(json.b_middlename);
                $('#viewb_lastnameField').text(json.b_lastname);

                $('#view_b_fullname').text(json.b_lastname + ', ' + json.b_firstname + ' ' + json.b_middlename);

                $('#viewb_bdayField').text(json.b_bday);
                $('#viewb_ageField').text(json.b_age);

                $('#view_b_age_bride').text(json.b_age + ' years old');

                $('#viewb_statusField').text(json.b_status_id);
                $('#viewb_provinceField').text(json.b_province);
                $('#viewb_muni_cityField').text(json.b_muni_city);
                $('#viewb_barangayField').text(json.b_barangay);
                $('#viewb_addressField').text(json.b_address);

                $('#viewbfull_addressField').html(json.b_address + '&nbsp;' + json.b_barangayDesc + ', ' + json.b_muni_cityDesc + ', ' + json.b_provinceDesc);

                $('#view_b_location').text(json.b_address);

                $('#viewb_educ_attainedField').text(json.b_educ_attained_id);
                $('#viewb_occupationField').text(json.b_occupation);

                $('#view_b_work').text(json.b_occupation);

                $('#viewb_contactnumField').text(json.b_contactnum);
                $('#viewb_foreign_partnerField').text(json.b_foreign_partner);
                $('#viewb_fathernameField').text(json.b_fathername);
                $('#viewb_mothernameField').text(json.b_mothername);
                $('#viewb_1DField').text(json.b_1D_id);
                $('#viewb_2DField').text(json.b_2D_id);
                $('#viewb_3DField').text(json.b_3D_id);
                $('#viewb_4DField').text(json.b_4D_id);

                $('#viewl_engagementField').text(json.l_engagement);
                $('#viewnum_childrenField').text(json.num_children);
                $('#viewdate_proposalField').text(json.date_proposal);
                $('#viewdate_marriageField').text(json.date_marriage);
                $('#viewlmpField').text(json.lmp);
                $('#viewpmc_schedField').text(json.pmc_sched);
                $('#viewdate_interviewField').text(json.date_interview);

                var date = json.date_interview;
                var options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                var formattedDate = new Date(date).toLocaleDateString('en-US', options);

                $('#view_date_interview').text(formattedDate);

                $('#viewinterviewed_byField').text(json.interviewed_byfn);

                $('#view_interviewed_by').text(json.interviewed_byfn);


                $('#viewor_numberField').text(json.or_number);
                $('#viewor_number_renewField').text(json.or_number_renew);

                $('#viewTM1Field').text(json.TM1_name);
                $('#viewTM2Field').text(json.TM2_name);
                $('#viewTM3Field').text(json.TM3_name);

                $('#viewTM_1Field').text(json.TM1_pos);
                $('#viewTM_2Field').text(json.TM2_pos);
                $('#viewTM_3Field').text(json.TM3_pos);

                $('#viewTM1_renewField').text(json.TM1_renewname);
                $('#viewTM2_renewField').text(json.TM2_renewname);
                $('#viewTM3_renewField').text(json.TM3_renewname);

                $('#viewTM_1renewField').text(json.TM1_renewpos);
                $('#viewTM_2renewField').text(json.TM2_renewpos);
                $('#viewTM_3renewField').text(json.TM3_renewpos);

                $('#viewid').text(id);
                $('#printpcms').attr('data-id', id);
                $('#viewtrid').text(trid);

            }
        })

    })

    $('#example tbody').on('click', 'a.editbtn', function () {
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
            success: function (data) {
                var json = JSON.parse(data);

                $('#controlnumField').val(json.controlnum);


                $('#g_firstnameField').val(json.g_firstname);
                $('#g_middlenameField').val(json.g_middlename);
                $('#g_lastnameField').val(json.g_lastname);
                $('#g_bdayField').val(json.g_bday);
                $('#g_ageField').val(json.g_age);
                $('#g_statusField').val(json.g_status);
                $('#g_provinceField').val(json.g_province);
                $('#g_muni_cityField').val(json.g_muni_city);
                $('#g_barangayField').val(json.g_barangay);
                $('#g_addressField').val(json.g_address);
                $('#g_educ_attainedField').val(json.g_educ_attained);
                $('#g_occupationField').val(json.g_occupation);
                $('#g_contactnumField').val(json.g_contactnum);
                $('#g_foreign_partnerField').val(json.g_foreign_partner);
                $('#g_fathernameField').val(json.g_fathername);
                $('#g_mothernameField').val(json.g_mothername);
                $('#g_1DField').val(json.g_1D);
                $('#g_2DField').val(json.g_2D);
                $('#g_3DField').val(json.g_3D);
                $('#g_4DField').val(json.g_4D);


                $('#b_firstnameField').val(json.b_firstname);
                $('#b_middlenameField').val(json.b_middlename);
                $('#b_lastnameField').val(json.b_lastname);
                $('#b_bdayField').val(json.b_bday);
                $('#b_ageField').val(json.b_age);
                $('#b_statusField').val(json.b_status);
                $('#b_provinceField').val(json.b_province);
                $('#b_muni_cityField').val(json.b_muni_city);
                $('#b_barangayField').val(json.b_barangay);
                $('#b_addressField').val(json.b_address);
                $('#b_educ_attainedField').val(json.b_educ_attained);
                $('#b_occupationField').val(json.b_occupation);
                $('#b_contactnumField').val(json.b_contactnum);
                $('#b_foreign_partnerField').val(json.b_foreign_partner);
                $('#b_fathernameField').val(json.b_fathername);
                $('#b_mothernameField').val(json.b_mothername);
                $('#b_1DField').val(json.b_1D);
                $('#b_2DField').val(json.b_2D);
                $('#b_3DField').val(json.b_3D);
                $('#b_4DField').val(json.b_4D);


                $('#l_engagementField').val(json.l_engagement);
                $('#num_childrenField').val(json.num_children);
                $('#date_proposalField').val(json.date_proposal);
                $('#date_marriageField').val(json.date_marriage);
                $('#lmpField').val(json.lmp);
                $('#pmc_schedField').val(json.pmc_sched);
                $('#date_interviewField').val(json.date_interview);
                $('#interviewed_byField').val(json.interviewed_by);
                $('#or_numberField').val(json.or_number);

                $('#TM1Field').val(json.TM1);
                $('#TM2Field').val(json.TM2);
                $('#TM3Field').val(json.TM3);
                $('#app_statusField').val(json.app_status);
                $('#app_status2Field').val(json.app_status2);

                $('#controlnum_renewField').val(json.controlnum_renew);
                $('#or_number_renewField').val(json.or_number_renew);

                $('#TM1_renewField').val(json.TM1_renew);
                $('#TM2_renewField').val(json.TM2_renew);
                $('#TM3_renewField').val(json.TM3_renew);
                $('#approved_byField').val(json.approved_by);
                $('#date_approvedField').val(json.date_approved);
                $('#remarksField').val(json.remarks);
                $('#turnaround_timeField').val(json.turnaround_time);
                $('#action_typeField').val(json.action_type);
                $('#released_statusField').val(json.released_status);
                $('#released_status2Field').val(json.released_status2);

                $('#id').val(id);
                $('#trid').val(trid);


                function g_brgyselect() {
                    var citymunCode = json.g_muni_city;
                    if (citymunCode) {
                        $.ajax({
                            url: "../4uN+!0n$/couples_ex/get_barangays.php",
                            method: "POST",
                            data: {
                                citymunCode: citymunCode,
                                brgycode: json.g_barangay
                            },
                            success: function (data) {
                                $('#g_barangayField').html(data);
                            }
                        });
                    } else {
                        $('#g_barangayField').html('<option value="">Select Barangay</option>');
                    }
                }

                function b_brgyselect() {
                    var citymunCode = json.g_muni_city;
                    if (citymunCode) {
                        $.ajax({
                            url: "../4uN+!0n$/couples_ex/get_barangays.php",
                            method: "POST",
                            data: {
                                citymunCode: citymunCode,
                                brgycode: json.b_barangay
                            },
                            success: function (data) {
                                $('#b_barangayField').html(data);
                            }
                        });
                    } else {
                        $('#g_barangayField').html('<option value="">Select Barangay</option>');
                    }
                }

                g_brgyselect();
                b_brgyselect();

            }
        })

    })



    $('#example tbody').on('click', 'a.deleteBtn', function (event) {
        event.preventDefault();

        // Get the ID of the item to be deleted
        var id = $(this).data('id');

        // Fetch the data to be deleted
        $.ajax({
            url: "../4uN+!0n$/couples_ex/get_single_data.php",
            data: {
                id: id
            },
            type: 'post',
            success: function (data) {
                var json = JSON.parse(data);

                // Populate the fields with the fetched data
                $('#controlnumField').val(json.controlnum);
                $('#g_firstnameField').val(json.g_firstname);
                $('#g_middlenameField').val(json.g_middlename);
                $('#g_lastnameField').val(json.g_lastname);
                $('#g_bdayField').val(json.g_bday);
                $('#g_ageField').val(json.g_age);
                $('#g_statusField').val(json.g_status);
                $('#b_provinceField').val(json.b_province);
                $('#b_muni_cityField').val(json.b_muni_city);
                $('#b_barangayField').val(json.b_barangay);
                $('#b_addressField').val(json.b_address);
                $('#g_educ_attainedField').val(json.g_educ_attained);
                $('#g_occupationField').val(json.g_occupation);
                $('#g_contactnumField').val(json.g_contactnum);
                $('#g_foreign_partnerField').val(json.g_foreign_partner);
                $('#g_fathernameField').val(json.g_fathername);
                $('#g_mothernameField').val(json.g_mothername);
                $('#g_1DField').val(json.g_1D);
                $('#g_2DField').val(json.g_2D);
                $('#g_3DField').val(json.g_3D);
                $('#g_4DField').val(json.g_4D);

                $('#b_firstnameField').val(json.b_firstname);
                $('#b_middlenameField').val(json.b_middlename);
                $('#b_lastnameField').val(json.b_lastname);
                $('#b_bdayField').val(json.b_bday);
                $('#b_ageField').val(json.b_age);
                $('#b_statusField').val(json.b_status);
                $('#b_provinceField').val(json.b_province);
                $('#b_muni_cityField').val(json.b_muni_city);
                $('#b_barangayField').val(json.b_barangay);
                $('#b_addressField').val(json.b_address);
                $('#b_educ_attainedField').val(json.b_educ_attained);
                $('#b_occupationField').val(json.b_occupation);
                $('#b_contactnumField').val(json.b_contactnum);
                $('#b_foreign_partnerField').val(json.b_foreign_partner);
                $('#b_fathernameField').val(json.b_fathername);
                $('#b_mothernameField').val(json.b_mothername);
                $('#b_1DField').val(json.b_1D);
                $('#b_2DField').val(json.b_2D);
                $('#b_3DField').val(json.b_3D);
                $('#b_4DField').val(json.b_4D);

                $('#l_engagementField').val(json.l_engagement);
                $('#num_childrenField').val(json.num_children);
                $('#date_proposalField').val(json.date_proposal);
                $('#date_marriageField').val(json.date_marriage);
                $('#lmpField').val(json.lmp);
                $('#pmc_schedField').val(json.pmc_sched);
                $('#date_interviewField').val(json.date_interview);
                $('#interviewed_byField').val(json.interviewed_by);
                $('#or_numberField').val(json.or_number);

                $('#TM1Field').val(json.TM1);
                $('#TM2Field').val(json.TM2);
                $('#TM3Field').val(json.TM3);
                $('#app_statusField').val(json.app_status);
                $('#app_status2Field').val(json.app_status2);

                $('#controlnum_renewField').val(json.controlnum_renew);
                $('#or_number_renewField').val(json.or_number_renew);

                $('#TM1_renewField').val(json.TM1_renew);
                $('#TM2_renewField').val(json.TM2_renew);
                $('#TM3_renewField').val(json.TM3_renew);
                $('#approved_byField').val(json.approved_by);
                $('#date_approvedField').val(json.date_approved);
                $('#remarksField').val(json.remarks);
                $('#turnaround_timeField').val(json.turnaround_time);

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
                            url: "../4uN+!0n$/couples_ex/delete_user.php",
                            data: {
                                id: id,
                                action_type: "DELETED",
                                controlnum: json.controlnum,
                                app_status: json.app_status,
                                date_interview: json.date_interview,
                                interviewed_by: json.interviewed_by,
                                controlnum_renew: json.controlnum_renew,
                                app_status2: json.app_status2,
                                approved_by: json.approved_by,
                                date_approved: json.date_approved

                            },
                            type: "POST",
                            success: function (data) {
                                var json = JSON.parse(data);
                                if (json.status === 'success') {
                                    $('#example').DataTable().ajax.reload(null,
                                        false);
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: "Data has been Deleted.",
                                        icon: "success"
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Failed",
                                        text: json.message ||
                                            'Unknown error',
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


    $(document).ready(function () {
        $("#btngen").click(function () {
            $.ajax({
                url: '../4uN+!0n$/couples_ex/get_previous.php',
                type: 'GET',
                success: function (data) {
                    $('#addcontrolnumField').val(data);
                },
                error: function () {
                    alert('Error fetching previous number');
                }
            });
        });
    });


    // Handle form submission
    $(document).on('submit', '#addUser', function (e) {
        e.preventDefault();

        // Fetch form data
        var interviewed_by = $('#addinterviewed_byField').val();
        var controlnum = $('#addcontrolnumField').val();
        var date_interview = $('#adddate_interviewField').val();
        var g_firstname = $('#addg_firstnameField').val();
        var pmc_sched = $('#addpmc_schedField').val();
        var g_middlename = $('#addg_middlenameField').val();
        var lmp = $('#addlmpField').val();
        var g_lastname = $('#addg_lastnameField').val();
        var date_marriage = $('#adddate_marriageField').val();
        var g_bday = $('#addg_bdayField').val();
        var date_proposal = $('#adddate_proposalField').val();
        var g_age = $('#addg_ageField').val();
        var num_children = $('#addnum_childrenField').val();
        var g_status = $('#addg_statusField').val();
        var l_engagement = $('#addl_engagementField').val();
        var g_address = $('#addg_addressField').val();
        var b_mothername = $('#addb_mothernameField').val();
        var g_educ_attained = $('#addg_educ_attainedField').val();
        var b_fathername = $('#addb_fathernameField').val();
        var g_occupation = $('#addg_occupationField').val();
        var b_foreign_partner = $('#addb_foreign_partnerField').val();
        var g_contactnum = $('#addg_contactnumField').val();
        var b_contactnum = $('#addb_contactnumField').val();
        var g_foreign_partner = $('#addg_foreign_partnerField').val();
        var b_occupation = $('#addb_occupationField').val();
        var g_fathername = $('#addg_fathernameField').val();
        var b_educ_attained = $('#addb_educ_attainedField').val();
        var g_mothername = $('#addg_mothernameField').val();
        var b_address = $('#addb_addressField').val();
        var b_firstname = $('#addb_firstnameField').val();
        var b_status = $('#addb_statusField').val();
        var b_middlename = $('#addb_middlenameField').val();
        var b_age = $('#addb_ageField').val();
        var b_lastname = $('#addb_lastnameField').val();
        var b_bday = $('#addb_bdayField').val();
        var g_1D = $('#addg_1DField').val();
        var g_2D = $('#addg_2DField').val();
        var g_3D = $('#addg_3DField').val();
        var g_4D = $('#addg_4DField').val();
        var b_1D = $('#addb_1DField').val();
        var b_2D = $('#addb_2DField').val();
        var b_3D = $('#addb_3DField').val();
        var b_4D = $('#addb_4DField').val();
        var or_number = $('#addor_numberField').val();
        var TM1 = $('#addTM1Field').val();
        var TM2 = $('#addTM2Field').val();
        var TM3 = $('#addTM3Field').val();
        var app_status = $('#addapp_statusField').val();
        var app_status2 = $('#addapp_status2Field').val();
        var controlnum_renew = $('#addcontrolnum_renewField').val();
        var or_number_renew = $('#addor_number_renewField').val();
        var TM1_renew = $('#addTM1_renewField').val();
        var TM2_renew = $('#addTM2_renewField').val();
        var TM3_renew = $('#addTM3_renewField').val();
        var approved_by = $('#addapproved_byField').val();
        var date_approved = $('#adddate_approvedField').val();
        var remarks = $('#addremarksField').val();
        var turnaround_time = $('#addturnaround_timeField').val();
        var action_type = $('#addaction_typeField').val();
        var released_status = $('#addreleased_statusField').val();
        var released_status2 = $('#addreleased_status2Field').val();
        var g_province = $('#addg_provinceField').val();
        var g_muni_city = $('#addg_muni_cityField').val();
        var g_barangay = $('#addg_barangayField').val();
        var b_province = $('#addb_provinceField').val();
        var b_muni_city = $('#addb_muni_cityField').val();
        var b_barangay = $('#addb_barangayField').val();


        if (g_province === '') {
            g_province = null;
        }

        if (g_muni_city === '') {
            g_muni_city = null;
        }

        if (g_barangay === '') {
            g_barangay = null;
        }

        if (b_province === '') {
            b_province = null;
        }

        if (b_muni_city === '') {
            b_muni_city = null;
        }

        if (b_barangay === '') {
            b_barangay = null;
        }


        if (released_status === '') {
            released_status = null;
        }


        if (released_status2 === '') {
            released_status2 = null;
        }


        if (or_number_renew === '') {
            or_number_renew = null;
        }

        if (controlnum_renew === '') {
            controlnum_renew = null;
        }


        if (or_number_renew === '') {
            or_number_renew = null;
        }


        if (approved_by === '') {
            approved_by = null;
        }


        if (date_approved === '') {
            date_approved = null;
        }


        if (remarks === '') {
            remarks = null;
        }


        if (interviewed_by !== '' && controlnum !== '' && date_interview !== '' && g_firstname !== '' &&
            pmc_sched !== '' && g_middlename !== '' && lmp !== '' && g_lastname !== '' && date_marriage !== '' &&
            g_bday !== '' && date_proposal !== '' && g_age !== '' && num_children !== '' && g_status !== '' &&
            l_engagement !== '' && g_address !== '' && b_mothername !== '' && g_educ_attained !== '' &&
            g_fathername !== '' && g_occupation !== '' && b_foreign_partner !== '' && g_contactnum !== '' &&
            b_contactnum !== '' && g_foreign_partner !== '' && b_occupation !== '' && g_fathername !== '' &&
            b_educ_attained !== '' &&
            g_mothername !== '' && b_address !== '' && b_firstname !== '' && b_status !== '' && b_middlename !==
            '' && b_age !== '' && b_lastname !== '' && b_bday !== '' && g_1D !== '' && g_2D !== '' && g_3D !==
            '' && g_4D !== '' && b_1D !== '' && b_2D !== '' && b_3D !== '' && b_4D !== '' && app_status !== '' &&
            app_status2 !== '' && action_type !== '') {

            // AJAX request to add_user.php
            $.ajax({
                url: "../4uN+!0n$/couples_ex/add_user.php",
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
                    b_fathername: b_fathername,
                    g_occupation: g_occupation,
                    b_foreign_partner: b_foreign_partner,
                    g_contactnum: g_contactnum,
                    b_contactnum: b_contactnum,
                    g_foreign_partner: g_foreign_partner,
                    b_occupation: b_occupation,
                    g_fathername: g_fathername,
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
                    or_number: or_number !== '' ? or_number : null,
                    TM1: TM1 !== '' ? TM1 : null,
                    TM2: TM2 !== '' ? TM2 : null,
                    TM3: TM3 !== '' ? TM3 : null,
                    app_status: app_status,
                    app_status2: app_status2,
                    controlnum_renew: controlnum_renew,
                    or_number_renew: or_number_renew !== '' ? or_number_renew : null,
                    TM1_renew: TM1_renew !== '' ? TM1_renew : null,
                    TM2_renew: TM2_renew !== '' ? TM2_renew : null,
                    TM3_renew: TM3_renew !== '' ? TM3_renew : null,
                    approved_by: approved_by !== '' ? approved_by : null,
                    date_approved: date_approved !== '' ? date_approved : null,
                    remarks: remarks !== '' ? remarks : null,
                    turnaround_time: turnaround_time,
                    action_type: action_type,
                    released_status: released_status !== '' ? released_status : null,
                    released_status2: released_status2 !== '' ? released_status2 : null,
                    g_province: g_province !== '' ? g_province : null,
                    g_muni_city: g_muni_city !== '' ? g_muni_city : null,
                    g_barangay: g_barangay !== '' ? g_barangay : null,
                    b_province: g_province !== '' ? b_province : null,
                    b_muni_city: g_muni_city !== '' ? b_muni_city : null,
                    b_barangay: g_barangay !== '' ? b_barangay : null

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
                            window.location.href = "../pages/?page=profiles_information";
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


    $(document).ready(function () {
        // Function to fetch previous control number
        function fetchPreviousControlNumber() {
            $.ajax({
                url: '../4uN+!0n$/couples_ex/get_previous_renew.php',
                type: 'GET',
                success: function (data) {
                    $('#controlnum_renewField').val(data); // Set the fetched control number to the input field
                },
                error: function () {
                    // Handle error if any
                    alert('Error fetching previous control number');
                }
            });
        }

        // Event listener for the select element
        $('#app_status2Field').change(function () {
            var selectedOption = $(this).val();
            if (selectedOption === 'RENEWAL') {
                // Fetch the count of controlnum_renew instead of the previous number
                fetchPreviousControlNumber();
            } else {
                // Reset or do something else when another option is selected
                $('#controlnum_renewField').val(''); // Clear the field or handle differently
            }
        });
    });



    $(document).on('submit', '#updateUser', function (e) {
        e.preventDefault();

        // Fetch form data
        var interviewed_by = $('#interviewed_byField').val();
        var controlnum = $('#controlnumField').val();
        var date_interview = $('#date_interviewField').val();
        var g_firstname = $('#g_firstnameField').val();
        var pmc_sched = $('#pmc_schedField').val();
        var g_middlename = $('#g_middlenameField').val();
        var lmp = $('#lmpField').val();
        var g_lastname = $('#g_lastnameField').val();
        var date_marriage = $('#date_marriageField').val();
        var g_bday = $('#g_bdayField').val();
        var date_proposal = $('#date_proposalField').val();
        var g_age = $('#g_ageField').val();
        var num_children = $('#num_childrenField').val();
        var g_status = $('#g_statusField').val();
        var l_engagement = $('#l_engagementField').val();
        var g_address = $('#g_addressField').val();
        var b_mothername = $('#b_mothernameField').val();
        var g_educ_attained = $('#g_educ_attainedField').val();
        var g_fathername = $('#g_fathernameField').val();
        var g_occupation = $('#g_occupationField').val();
        var b_foreign_partner = $('#b_foreign_partnerField').val();
        var g_contactnum = $('#g_contactnumField').val();
        var b_contactnum = $('#b_contactnumField').val();
        var g_foreign_partner = $('#g_foreign_partnerField').val();
        var b_occupation = $('#b_occupationField').val();
        var b_fathername = $('#b_fathernameField').val();
        var b_educ_attained = $('#b_educ_attainedField').val();
        var g_mothername = $('#g_mothernameField').val();
        var b_address = $('#b_addressField').val();
        var b_firstname = $('#b_firstnameField').val();
        var b_status = $('#b_statusField').val();
        var b_middlename = $('#b_middlenameField').val();
        var b_age = $('#b_ageField').val();
        var b_lastname = $('#b_lastnameField').val();
        var b_bday = $('#b_bdayField').val();
        var g_1D = $('#g_1DField').val();
        var g_2D = $('#g_2DField').val();
        var g_3D = $('#g_3DField').val();
        var g_4D = $('#g_4DField').val();
        var b_1D = $('#b_1DField').val();
        var b_2D = $('#b_2DField').val();
        var b_3D = $('#b_3DField').val();
        var b_4D = $('#b_4DField').val();
        var or_number = $('#or_numberField').val();
        var TM1 = $('#TM1Field').val();
        var TM2 = $('#TM2Field').val();
        var TM3 = $('#TM3Field').val();
        var app_status = $('#app_statusField').val();
        var app_status2 = $('#app_status2Field').val();
        var controlnum_renew = $('#controlnum_renewField').val();
        var TM1_renew = $('#TM1_renewField').val();
        var TM2_renew = $('#TM2_renewField').val();
        var TM3_renew = $('#TM3_renewField').val();
        var or_number_renew = $('#or_number_renewField').val();
        var approved_by = $('#approved_byField').val();
        var date_approved = $('#date_approvedField').val();
        var remarks = $('#remarksField').val();
        var turnaround_time = $('#turnaround_timeField').val();
        var action_type = 'UPDATED'; // Hardcoded action_type
        var released_status = $('#released_statusField').val();
        var released_status2 = $('#released_status2Field').val();
        var g_province = $('#g_provinceField').val();
        var g_muni_city = $('#g_muni_cityField').val();
        var g_barangay = $('#g_barangayField').val();
        var b_province = $('#b_provinceField').val();
        var b_muni_city = $('#b_muni_cityField').val();
        var b_barangay = $('#b_barangayField').val();

        var trid = $('#trid').val();
        var id = $('#id').val();

        if (g_province === '') {
            g_province = null;
        }

        if (g_muni_city === '') {
            g_muni_city = null;
        }

        if (g_barangay === '') {
            g_barangay = null;
        }

        if (b_province === '') {
            b_province = null;
        }

        if (b_muni_city === '') {
            b_muni_city = null;
        }

        if (b_barangay === '') {
            b_barangay = null;
        }


        if (released_status === '') {
            released_status = null;
        }


        if (released_status2 === '') {
            released_status2 = null;
        }


        if (or_number_renew === '') {
            or_number_renew = null;
        }

        if (controlnum_renew === '') {
            controlnum_renew = null;
        }


        if (or_number_renew === '') {
            or_number_renew = null;
        }


        if (approved_by === '') {
            approved_by = null;
        }


        if (date_approved === '') {
            date_approved = null;
        }


        if (remarks === '') {
            remarks = null;
        }

        // Validate required fields
        if (interviewed_by !== '' && controlnum !== '' && date_interview !== '' && g_firstname !== '' &&
            pmc_sched !== '' && g_middlename !== '' && lmp !== '' && g_lastname !== '' && date_marriage !== '' &&
            g_bday !== '' && date_proposal !== '' && g_age !== '' && num_children !== '' && g_status !== '' &&
            l_engagement !== '' && g_address !== '' && b_mothername !== '' && g_educ_attained !== '' &&
            g_fathername !== '' && g_occupation !== '' && b_foreign_partner !== '' && g_contactnum !== '' &&
            b_contactnum !== '' && g_foreign_partner !== '' && b_occupation !== '' && g_fathername !== '' &&
            b_educ_attained !== '' &&
            g_mothername !== '' && b_address !== '' && b_firstname !== '' && b_status !== '' && b_middlename !==
            '' && b_age !== '' && b_lastname !== '' && b_bday !== '' && g_1D !== '' && g_2D !== '' && g_3D !==
            '' && g_4D !== '' && b_1D !== '' && b_2D !== '' && b_3D !== '' && b_4D !== '' && app_status !== '' &&
            app_status2 !== '') {

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
                    TM1: TM1 !== '' ? TM1 : null,
                    TM2: TM2 !== '' ? TM2 : null,
                    TM3: TM3 !== '' ? TM3 : null,
                    app_status: app_status,
                    app_status2: app_status2,
                    controlnum_renew: controlnum_renew,
                    or_number_renew: or_number_renew,
                    TM1_renew: TM1_renew,
                    TM2_renew: TM2_renew,
                    TM3_renew: TM3_renew,
                    approved_by: approved_by !== '' ? approved_by : null,
                    date_approved: date_approved !== '' ? date_approved : null,
                    remarks: remarks !== '' ? remarks : null,
                    turnaround_time: turnaround_time,
                    action_type: action_type, // Include hardcoded action_type
                    released_status: released_status !== '' ? released_status : null,
                    released_status2: released_status2 !== '' ? released_status2 : null,
                    g_province: g_province !== '' ? g_province : null,
                    g_muni_city: g_muni_city !== '' ? g_muni_city : null,
                    g_barangay: g_barangay !== '' ? g_barangay : null,
                    b_province: g_province !== '' ? b_province : null,
                    b_muni_city: g_muni_city !== '' ? b_muni_city : null,
                    b_barangay: g_barangay !== '' ? b_barangay : null,

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
                            window.location.href = "../pages/?page=profiles_information";
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
</script>

<!-- <script src="../couples_ex/7uN2+ion.js"></script> -->
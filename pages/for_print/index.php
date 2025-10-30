<div class="d-flex justify-content-end">
    <button class="btn btn-success" type="button" id="printpcms" data-id="">
        <i class="fa fa-print"></i> Print
    </button>
</div>

<div class="container-fluid" id="print_outpcms">

    <img src="../images/logos/Bagong Pilipinas-Logo.png" alt="" class="bagongpilipinaslogo" style="position: absolute; margin-left: 30px; margin-top: 8px;"
        height="135px" />
    <img src="../images/logos/BatangasCitySeal.png" alt="" class="batangascitylogo" style="position: absolute; margin-left: 180px; margin-top: 10px;"
        height="130px" />
    <img src="../images/logos/CHO-Logo.png" alt="" class="chologo" style="position: absolute; margin-left: 735px; margin-top: 10px;"
        height="135px" />
    <img src="../images/logos/PopCom-Logo.png" alt="" class="cpdlogo" style="position: absolute; margin-left: 860px; margin-top: -10px;"
        height="175px" />

    <h5 class="text-center pt-4"><b> REPUBLIC OF THE PHILLIPINES </b></h5>
    <h4 class="text-center"><b> BATANGAS CITY </b></h4>
    <h2 class="text-center" style="font-family: Old English Text MT;"> Office of the City Health Officer </h2>
    <h5 class="text-center pt-0"><b> POPCOM DIVISION </b></h5>



    <!-- Horizontal Form -->
    <div class="card card-success" style="border:1px solid black !important;">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h6 style="font-weight: bold;" class="card-title"> PRE-MARRIAGE COUPLES INTERVIEWER'S SHEET </h6>
                <div class="d-flex justify-content-between align-self-center" style="margin-bottom: -15px;">
                    <p>
                        <b> Control Number: &nbsp;</b>
                        <strong>
                            <p id="viewcontrolnumField"></p>
                        </strong>
                    </p>
                </div>
            </div>

        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">




            <div class="row">
                <div class="col-sm-6" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <h5 style="margin-bottom: 0.05rem; font-weight: bold;font-size: 1.2rem;" class="title">
                            🤵🏻‍♂️Groom's Information </h5>
                    </div>
                </div>
                <div class="col-sm-6 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <h5 style="margin-bottom: 0.05rem; font-weight: bold;font-size: 1.2rem;" class="title">
                            👰🏻‍♀️Bride's Information </h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_firstname"><b> Firstname: </b></label>
                        <p id="viewg_firstnameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_middlename"><b> Middlename: </b></label>
                        <p id="viewg_middlenameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_lastname"><b> Lastname: </b></label>
                        <p id="viewg_lastnameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_firstname"><b> Firstname: </b></label>
                        <p id="viewb_firstnameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_middlename"><b> Middlename: </b></label>
                        <p id="viewb_middlenameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_lastname"><b> Lastname: </b></label>
                        <p id="viewb_lastnameField" class="" Readonly></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_bday"><b> Birthday: </b></label>
                        <p id="viewg_bdayField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_age"><b> Age: </b></label>
                        <p id="viewg_ageField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_status"><b> Status: </b></label>
                        <p id="viewg_statusField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_bday"><b> Birthday: </b></label>
                        <p id="viewb_bdayField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_age"><b> Age: </b></label>
                        <p id="viewb_ageField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_status"><b> Status: </b></label>
                        <p id="viewb_statusField" class="" Readonly></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_address"><b> Address: </b></label>
                        <p id="viewgfull_addressField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-6 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_address"><b> Address: </b></label>
                        <p id="viewbfull_addressField" class="" Readonly></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_educ_attained"><b> Educational Attainment: </b></label>
                        <p id="viewg_educ_attainedField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-6 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_educ_attained"><b> Educational Attainment: </b></label>
                        <p id="viewb_educ_attainedField" class="" Readonly></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_occupation"><b> Occupation: </b></label>
                        <p id="viewg_occupationField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_1D"><b> 1st Dose Vaccine: </b></label>
                        <p id="viewg_1DField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_occupation"><b> Occupation: </b></label>
                        <p id="viewb_occupationField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_1D"><b> 1st Dose Vaccine: </b></label>
                        <p id="viewb_1DField" class="" Readonly></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_contactnum"><b> Contact Number: </b></label>
                        <p id="viewg_contactnumField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_2D"><b> 2nd Dose Vaccine: </b></label>
                        <p id="viewg_2DField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_contactnum"><b> Contact Number: </b></label>
                        <p id="viewb_contactnumField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_2D"><b> 2nd Dose Vaccine: </b></label>
                        <p id="viewb_2DField" class="" Readonly></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_fathername"><b> Father Name: </b></label>
                        <p id="viewg_fathernameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_3D"><b> 1st Booster Dose Vaccine: </b></label>
                        <p id="viewg_3DField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_fathername"><b> Father Name: </b></label>
                        <p id="viewb_fathernameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_3D"><b> 1st Booster Dose Vaccine: </b></label>
                        <p id="viewb_3DField" class="" Readonly></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_mothername"><b> Mother's Maiden Name: </b></label>
                        <p id="viewg_mothernameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="g_4D"><b> 2nd Booster Dose Vaccine: </b></label>
                        <p id="viewg_4DField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3 pl-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_mothername"><b> Mother's Maiden Name: </b></label>
                        <p id="viewb_mothernameField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="b_4D"><b> 2nd Booster Dose Vaccine: </b></label>
                        <p id="viewb_4DField" class="" Readonly></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Horizontal Form -->
    <div class="card card-success" style="border:1px solid black !important;">
        <div class="card-header">
            <h6 style="margin-bottom: 0.05rem; font-weight: bold;font-size: 1.2rem;" class="card-title"> OTHER
                INFORMATION </h6>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">


            <div class="row">
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="l_engagement"><b> Lenght of Engagement: </b></label>
                        <p id="viewl_engagementField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="num_children"><b> Number of Children Desired: </b></label>
                        <p id="viewnum_childrenField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="date_proposal"><b> Date of Proposal: </b></label>
                        <p id="viewdate_proposalField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="date_marriage"><b> Date of Marriage: </b></label>
                        <p id="viewdate_marriageField" class="" Readonly></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="lmp"><b> LMP: </b></label>
                        <p id="viewlmpField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="pmc_sched"><b> PMC Schedule: </b></label>
                        <p id="viewpmc_schedField" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="interviewed_by"><b> Date of Interview: </b></label>
                        <p id="viewdate_interviewField" value="<?php echo date('Y-m-d H:i:s'); ?>" class="" Readonly></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="interviewed_by"><b> Interviewed By: </b></label>
                        <p id="viewinterviewed_byField" class="" Readonly></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>

    <!-- Horizontal Form -->
    <div class="card card-success" style="border:1px solid black !important;">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h6 style="margin-bottom: 0.05rem; font-weight: bold;font-size: 1.2rem;" class="card-title"> SIGNATURE
                    OF AGREEMENT </h6>
                <div class="d-flex justify-content-between align-self-center" style="margin-bottom: -15px;">
                    <p>
                        <b> OR Number: &nbsp;</b>
                        <strong>
                            <p id="viewor_numberField"></p>
                        </strong>
                    </p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">

            <div class="row">
                <div class="col-sm-6" style="border-right: 2px solid black;">
                    <!-- text input -->
                    <div class="form-group text-center">
                        <br>
                        <br>
                        <br>
                        <h6><b> SIGNATURE OVER PRINTED NAME OF THE GROOM 🤵🏻‍♂️ </b></h6>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group text-center">
                        <br>
                        <br>
                        <br>
                        <h6><b> SIGNATURE OVER PRINTED NAME OF THE BRIDE 👰🏻‍♀️ </b></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        $('#printpcms').click(function() {
            var id = $(this).data('id');

            // AJAX request to update the released_status
            $.ajax({
                url: '../4uN+!0n$/couples_ex/print_status.php', // Verify the path
                type: 'POST',
                data: {
                    id: id,
                    action: 'release'
                },
                success: function(response) {
                    console.log(response); // Debugging output
                    var result = JSON.parse(response);
                    if (result.status === 'true') {
                        // Proceed to print
                        var _h = $('head').clone();
                        var _p = $('#print_outpcms').clone();
                        var _el = $('<div>');

                        _el.append(_h);
                        _el.append('<style>' +
                            'html, body, .wrapper { -webkit-print-color-adjust: exact !important; -webkit-filter: opacity(1) !important; print-color-adjust: exact !important; margin: 15px; }' +
                            '.pace .pace-progress { background: transparent; }' +
                            '.inputRemove { border: 0px !important; }' +
                            '.bagongpilipinaslogo { position: absolute !important; margin-left: 20px !important;  margin-top: 8px !important; height="135px" !important;}' +
                            '.batangascitylogo { position: absolute !important; margin-left: 155px !important;  margin-top: 10px !important; height="130px" !important;}' +
                            '.chologo { position: absolute !important; margin-left: 690px !important;  margin-top: 10px !important; height="130px" !important;}' +
                            '.cpdlogo { position: absolute !important; margin-left: 810px !important;  margin-top: -10px !important; height="193px" !important;}' +
                            '.table { border: 0px !important; }' +
                            '</style>');

                        _el.append(_p);

                        var printFrame = $('<iframe>', {
                            id: 'printFrame'
                        });

                        $('body').append(printFrame);

                        var printDocument = printFrame[0].contentDocument || printFrame[0].contentWindow
                            .document;
                        printDocument.write(_el.html());
                        printDocument.close();

                        printFrame.on('load', function() {
                            setTimeout(function() {
                                printFrame[0].contentWindow.print();
                                setTimeout(function() {
                                    printFrame.remove();
                                    window.location.reload();
                                }, 300);
                            }, 500);
                        });
                    } else {
                        alert('Failed to update the release status.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        });
    });
</script>
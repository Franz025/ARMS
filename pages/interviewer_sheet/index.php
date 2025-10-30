<?php include('../inc/connection.php');

$resultldalvar = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'ldalvar'";
$getresultldalvar = mysqli_query($con, $resultldalvar);
$countldalvar = mysqli_fetch_assoc($getresultldalvar);

$resultfrarenas = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'frarenas'";
$getresultfrarenas = mysqli_query($con, $resultfrarenas);
$countfrarenas = mysqli_fetch_assoc($getresultfrarenas);

$resultacgcadano = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'acgcadano'";
$getresultacgcadano = mysqli_query($con, $resultacgcadano);
$countacgcadano = mysqli_fetch_assoc($getresultacgcadano);

$resultmcmcelis = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'mcmcelis'";
$getresultmcmcelis = mysqli_query($con, $resultmcmcelis);
$countmcmcelis = mysqli_fetch_assoc($getresultmcmcelis);

$resultzdfaalam = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'zdfaalam'";
$getresultzdfaalam = mysqli_query($con, $resultzdfaalam);
$countzdfaalam = mysqli_fetch_assoc($getresultzdfaalam);

$resultjdibon = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'jdibon'";
$getresultjdibon = mysqli_query($con, $resultjdibon);
$countjdibon = mysqli_fetch_assoc($getresultjdibon);

$resultedlacsamana = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'edlacsamana'";
$getresultedlacsamana = mysqli_query($con, $resultedlacsamana);
$countedlacsamana = mysqli_fetch_assoc($getresultedlacsamana);

$resultaamacatangay = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'aamacatangay'";
$getresultaamacatangay = mysqli_query($con, $resultaamacatangay);
$countaamacatangay = mysqli_fetch_assoc($getresultaamacatangay);

$resultjhmedrano = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'jhmedrano'";
$getresultjhmedrano = mysqli_query($con, $resultjhmedrano);
$countjhmedrano = mysqli_fetch_assoc($getresultjhmedrano);

$resultbvpagsinuhin = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'bvpagsinuhin'";
$getresultbvpagsinuhin = mysqli_query($con, $resultbvpagsinuhin);
$countbvpagsinuhin = mysqli_fetch_assoc($getresultbvpagsinuhin);

$resultlgsapinoso = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = 'lgsapinoso'";
$getresultlgsapinoso = mysqli_query($con, $resultlgsapinoso);
$countlgsapinoso = mysqli_fetch_assoc($getresultlgsapinoso);

$resultcodename = "SELECT count(codename) as total from tbl_users";
$getresultcodename = mysqli_query($con, $resultcodename);
$countcodename = mysqli_fetch_assoc($getresultcodename);

$resultinterviewed_by = "SELECT count(interviewed_by) as total from tbl_pmcis where interviewed_by = ' '";
$getresultinterviewed_by = mysqli_query($con, $resultinterviewed_by);
$countinterviewed_by = mysqli_fetch_assoc($getresultinterviewed_by);

$result = "SELECT count(codename) as total from tbl_users";
$getresult = mysqli_query($con, $result);
$count = mysqli_fetch_assoc($getresult);

$result = "SELECT count(interviewed_by) as total from tbl_pmcis";
$getresult = mysqli_query($con, $result);
$count = mysqli_fetch_assoc($getresult);


?>



<div class="fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title" style="font-weight: bold; font-size: 18px;"><i class="fas fa-users"></i> &nbsp; Interviewer Sheet </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
            </div>
        </div>

        <div class="card-body">


            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-2 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $countldalvar['total'] ?></h3>

                                <p><b> LEA D. ALVAR </b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $countfrarenas['total'] ?></h3>

                                <p><b> FRANCIS R. ARENAS </b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $countacgcadano['total'] ?></h3>

                                <p><b> AIZA CAREN G. CADANO </b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $countmcmcelis['total'] ?><sup style="font-size: 20px"></sup></h3>

                                <p><b> MARIA CATHERINE M. CELIS </b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $countzdfaalam['total'] ?><sup style="font-size: 20px"></sup></h3>

                                <p><b> ZION D. FAALAM </b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $countjdibon['total'] ?><sup style="font-size: 20px"></sup></h3>

                                <p><b> JANETTE D. IBON </b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">

                            <div class="col-lg-2 col-3">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?php echo $countedlacsamana['total'] ?><sup style="font-size: 20px"></sup></h3>

                                        <p><b> EULALI D. LACSAMANA </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-3">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?php echo $countaamacatangay['total'] ?><sup style="font-size: 20px"></sup></h3>

                                        <p><b> ARLYN A. MACATANGAY </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-3">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?php echo $countjhmedrano['total'] ?><sup style="font-size: 20px"></sup></h3>

                                        <p><b> JUSTINE D. MARIANO </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-3">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?php echo $countbvpagsinuhin['total'] ?><sup style="font-size: 20px"></sup></h3>

                                        <p><b> BABYLYN V. PAGSINUHIN </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-3">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?php echo $countlgsapinoso['total'] ?><sup style="font-size: 20px"></sup></h3>

                                        <p><b> LYKA G. SAPINOSO </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
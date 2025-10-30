

<style>
  .background-div {
    background-image: url('../images/wp/popcom_triplicate.jpg') !important;
    background-size: 950px !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
  }

  .sm_u2_custom {
    border-bottom: 4px solid transparent !important;
    width: 250px !important;
    font-size: 13.4px !important;
    font-weight: bold !important;
    text-align: right !important;
    margin-left: 50% !important;
  }

  .sm_u3_custom {
    border-bottom: 4px solid transparent !important;
    width: 200px !important;
    font-size: 13.4px !important;
    font-weight: bold !important;
    text-align: right !important;
    margin-right: 40% !important;
  }

  .sm_u3_custom1 {
    border-bottom: 4px solid transparent !important;
    width: 350px !important;
    font-size: 13.4px !important;
    font-weight: bold !important;
    text-align: right !important;
    margin-right: 100% !important;
  }

  .sm_u4_custom {
    border-bottom: 4px solid transparent !important;
    width: 450px !important;
    font-size: 13.4px !important;
    font-weight: bold !important;
    text-align: right !important;
    margin-right: 40% !important;
  }

  .sm_u5_custom {
    border-bottom: 4px solid transparent !important;
    width: 250px !important;
    font-size: 13.4px !important;
    font-weight: bold !important;
    text-align: right !important;
    margin-right: 40% !important;
  }

  .sm_u5_custom h4 {
    margin-bottom: 0;
  }

  .custom-style {
    padding: 10px;
    margin: 25px;
    border: 1px solid #ccc;
  }
</style>



<div class="d-flex justify-content-end">
  <button class="btn btn-success" type="button" id="printpmc"><i class="fa fa-print"></i> Print</button>
</div>
<div class="container-fluid" id="print_outpmc">

  <br>
  <div class="background-div">
    <div class="container mt-3">
      <div class="d-flex justify-content-between">
        <div class="row w-100">
          <div class="col-7 d-flex justify-content-between align-items-center">

            <!-- <h4 style="font-family: Times New Roman; width: 25%;"><strong> Control No: </strong></h4> -->
            <div class="sm_u5_custom">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4 class="text-center" id="view_controlnumber" style="margin-left: -20px">
              </h4>
            </div>
          </div>
          <div class="col-3 ml-auto d-flex justify-content-end align-items-center">

            <!-- <h4 style="font-family: Times New Roman;"><strong> Date: </strong></h4> -->
            <div class="sm_u5_custom" style="margin-right: 0% !important;">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4 class="text-center" id="view_date_interview" style="margin-left: -10px">
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>



    <br>
    <br>
    <br>
    <br>
    <br>

    <br>
    <br>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>




    <br>
    <div class="d-flex justify-content-center">
      <div class="row">
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_g_fullname" style="margin-left: -140px"></h4>
          </div>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Name </strong></h4> -->
        </div>
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_b_fullname" style="margin-left: 40px"></h4>
          </div>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Name </strong></h4> -->
        </div>
      </div>
    </div>
    <br>

    <div class="d-flex justify-content-center" style="margin-top: -18px !important;">
      <div class="row">
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_g_age_groom" style="margin-left: -140px;"> </h4>
          </div>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Age </strong></h4> -->
        </div>
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_b_age_bride" style="margin-left: 40px;"> </h4>
          </div>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Age </strong></h4> -->
        </div>
      </div>
    </div>
    <br>

    <div class="d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_g_location" style="margin-left: -140px"></h4>
          </div>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Address </strong></h4> -->
        </div>
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_b_location" style="margin-left: 40px"></h4>
          </div>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Address </strong></h4> -->
        </div>
      </div>
    </div>
    <br>

    <div class="d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_g_work" style="margin-left: -140px"></h4>
          </div>
          <br>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Occupation </strong></h4> -->
        </div>
        <div class="col-6">
          <div class="sm_u4_custom">
            <h4 class="text-center" id="view_b_work" style="margin-left: 40px"></h4>
          </div>
          <br>
          <!-- <h4 class="text-center" style="font-family: Times New Roman;"><strong> Occupation </strong></h4> -->
        </div>
      </div>
    </div>
    <br>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="col-4">
          <div class="sm_u5_custom">
            <h4 class="text-center" id="TM1Field" style="margin-left: -100px; font-size: clamp(12px, 2vw, auto);   ">   
            </h4>
            <h4 class="text-center" id="TM_1Field" style="margin-left: -100px; font-size: clamp(20px, 1vw, 32px);   ">
            </h4>

          </div>


        </div>



        <div class="col-4">
          <div class="sm_u5_custom">
            <h4 class="text-center" id="TM2Field" style="margin-left: -50px; font-size: clamp(12px, 2vw, auto);   ">   
            </h4>
            <h4 class="text-center" id="TM_2Field" style="margin-left: -50px; font-size: clamp(20px, 1vw, 32px);   ">   
            </h4>
          </div>


        </div>

        <div class="col-4">
          <div class="sm_u5_custom">
            <h4 class="text-center" id="TM3Field" style="margin-left: -30px; font-size: clamp(12px, 2vw, auto);   ">   
            </h4>
            <h4 class="text-center" id="TM_3Field" style="margin-left: -30px; font-size: clamp(20px, 1vw, 32px);   ">   
            </h4>

          </div>


        </div>

      </div>
    </div>
    <br>

    <br>
    <br>
    <br>
    <div class="d-flex justify-content-end">
      <div>
        <div class="sm_u3_custom1"></div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#printpmc').click(function () {
      var _h = $('head').clone();
      var _p = $('#print_outpmc').clone();
      var _el = $('<div>');
      _el.append(_h);
      _el.append('<style>\
          html, body, .wrapper {-webkit-print-color-adjust: exact !important; -webkit-filter: opacity(1) !important; min-height: unset !important; print-color-adjust: exact !important; margin: 15px !important; }\
          .pace .pace-progress {background: transparent !important;}\
          .inputRemove {border: 0px !important;}\
          .chologo {margin-left: 800px !important;}\
          .table-borderless > tbody > tr > td, .table-borderless > tbody > tr > th, .table-borderless > tfoot > tr > td, .table-borderless > tfoot > tr > th, .table-borderless > thead > tr > td, .table-borderless > thead > tr > th {border: none !important;}\
          .sm_u2_custom {border-bottom: 4px solid transparent !important; width: 250px !important; font-size: 13.4px !important; font-weight: bold !important; text-align: right !important; margin-left: 50% !important;}\
          .sm_u3_custom {border-bottom: 4px solid transparent !important; width: 200px !important; font-size: 13.4px !important; font-weight: bold !important; text-align: right !important; margin-right: 40% !important;}\
          .sm_u3_custom1 {border-bottom: 4px solid transparent !important; width: 400px !important; font-size: 13.4px !important; font-weight: bold !important; text-align: right !important; margin-right: 100% !important;}\
          .sm_u4_custom {border-bottom: 4px solid transparent !important; width: 400px !important; font-size: 13.4px !important; font-weight: bold !important; text-align: right !important; margin-right: 40% !important;}\
          .sm_u5_custom {border-bottom: 4px solid transparent !important; width: 300px !important; font-size: 13.4px !important; font-weight: bold !important; text-align: right !important; margin-right: 40% !important;}\
        </style>');

      _el.append(_p);

      var printFrame = $('<iframe>', {
        id: 'printFrame'
      });
      $('body').append(printFrame);

      var printDocument = printFrame[0].contentDocument || printFrame[0].contentWindow.document;
      printDocument.write(_el.html());

      printFrame.on('load', function () {
        setTimeout(() => {
          printFrame[0].contentWindow.print();
          setTimeout(() => {
            printFrame.remove();
          }, 300);
        }, 500);
      });

      printDocument.close();
    });
  });
</script>
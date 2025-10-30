<?php include('../inc/connection.php'); ?>


<div class="card card-success card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="pt-2 px-3">
                <h3 class="card-title"><b> Agenda List Sheet </b></h3>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-agenda-tab" data-toggle="pill" href="#custom-tabs-agenda" role="tab" aria-controls="custom-tabs-agenda" aria-selected="true"><b><i class="fas fa-calendar-week"></i> Calendar </b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-deletion-tab" data-toggle="pill" href="#custom-tabs-deletion" role="tab" aria-controls="custom-tabs-deletion" aria-selected="false"><b><i class="fas fa-calendar-times"></i>&nbsp; Deletion </b></a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-agenda" role="tabpanel" aria-labelledby="custom-tabs-agenda-tab">
                <?php include('../../pmms/pages/events_agenda/index.php') ?>
            </div>
            <div class="tab-pane fade" id="custom-tabs-deletion" role="tabpanel" aria-labelledby="custom-tabs-deletion-tab">
                <?php include('../../pmms/pages/events_deletion/index.php') ?>
            </div>
        </div>
    </div>
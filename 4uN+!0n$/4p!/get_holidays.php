<?php

header('Content-Type: application/json');


$events = array();


$api_url = "https://www.googleapis.com/calendar/v3/calendars/en.philippines%23holiday%40group.v.calendar.google.com/events";
$api_key = "AIzaSyCi0f4w1sJxJ7exMaT8bF_gTAzrlfSgbmU";


$url = $api_url . '?' . http_build_query(['key' => $api_key]);

$options = [
    'http' => [
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'method' => 'GET',
    ],
];
$context = stream_context_create($options);


$response = file_get_contents($url, false, $context);


if ($response === FALSE) {
    echo json_encode([]);
    exit;
}


$data = json_decode($response, true);


$holidays = [];
foreach ($data['items'] as $event) {
    $holidays[] = [
        'localName' => $event['summary'],
        'date' => $event['start']['date']
    ];
}

$response = @file_get_contents($url, false, $context);
if ($response === FALSE) {
    $error = error_get_last();
    echo json_encode(['error' => $error['message']]);
    exit;
}


echo json_encode($holidays);

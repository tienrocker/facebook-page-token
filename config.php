<?php

require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

session_start();
$fb = new \Facebook\Facebook([
    'app_id'                => '378785039693065',
    'app_secret'            => 'bf83fd265ed12fdac2f0cf0226843f76',
    'default_graph_version' => 'v4.0',
]);
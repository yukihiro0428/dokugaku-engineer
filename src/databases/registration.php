<?php
require_once __DIR__ . '/header.php';
$review = [
	'title' => '',
	'author' => '',
	'status' => '',
	'time' => '',
	'evaluation' => '',
	'impressions' => ''
];
$validated = [];
include 'views/new.php';
require_once __DIR__ . '/footer.php';

<?php
require 'header.php';
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
require 'footer.php';

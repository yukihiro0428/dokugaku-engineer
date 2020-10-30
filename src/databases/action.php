<?php
require_once __DIR__ . '/header.php';
//HTTPメソッドがPOSTだったら
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$status = '';
	if (array_key_exists('status', $_POST)) {
		$status = $_POST['status'];
	}
	$review = [
		'title' => trim($_POST['title']),
		'author' => trim($_POST['author']),
		'status' => $status,
		'time' => $_POST['time'],
		'evaluation' => (int)trim($_POST['evaluation']),
		'impressions' => trim($_POST['impressions'])
	];
}
//バリデートする
$validated = validate($review);
if (!count($validated)) {
	//テーブルにデータを入力する
	createReview($review, $link);
	// 連番を更新
	updateId($link);
	header("Location: done.php");
}


include __DIR__ . '/views/new.php';
require_once __DIR__ . '/footer.php';

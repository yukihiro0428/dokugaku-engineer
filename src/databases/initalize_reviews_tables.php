<?php
require __DIR__ . '/../vendor/autoload.php';

function dbConnect()
{
	$dbHost = $_ENV['DB_HOST'];
	$dbUsername = $_ENV['DB_USERNAME'];
	$dbPassword = $_ENV['DB_PASSWORD'];
	$dbDatabase = $_ENV['DB_DATABASE'];
	$link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);
	if (!$link) {
		echo '<p>Error:データベースに接続できませんでした</p>';
		error_log('Error: fail to connect dateBase');
		echo 'Debugging error;' . mysqli_connect_error();
		error_log('Debugging error:' . mysqli_connect_error());
		exit;
	}
	return $link;
}

function dropTable($link)
{
	$dropTableSql = 'DROP TABLE IF EXISTS reviews;';
	$result = mysqli_query($link, $dropTableSql);
	if ($result) {
		echo '<p>テーブルを削除しました</p>';
	} else {
		echo '<p>Error:テーブルの削除に失敗しました</p>';
		echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;
	}
}

function createTable($link)
{
	$createTableSql = <<<EOT
CREATE TABLE reviews (
	id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255),
	author VARCHAR(100),
	status VARCHAR(5),
	time DATE,
	evaluation INTEGER(1),
	impressions VARCHAR(1000),
	creation_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;
	$result = mysqli_query($link, $createTableSql);
	if ($result) {
		echo 'テーブルを再作成しました' . PHP_EOL;
	}
	// else {
	// 	echo 'Error:テーブルの作成に失敗しました' . PHP_EOL;
	// 	error_log('Error: fail to create table');
	// 	error_log('Debugging error:' . mysqli_error($link));
	// }
}

//バリデートする
function validate($review)
{
	$errors = [];

	//書籍名が正しく入力されているかチェック
	if (!strlen($review['title'])) {
		$errors['title'] = '書籍名を入力してください';
	} elseif (strlen($review['title']) > 255) {
		$errors['title'] = '書籍名は255文字以内で入力してください';
	}

	//著者名=authorが正しく入力されているかチェック
	if (!strlen($review['author'])) {
		$errors['author'] = '著者名を入力してください';
	} elseif (strlen($review['author']) > 100) {
		$errors['title'] = '著者名は100文字以内で入力してください';
	}

	// 読書状況=statusが正しいかチェック
	$choice = array('未読', '読んでいる', '読了');
	if (!in_array($review['status'], $choice, true)) {
		$errors['status'] = '未読、読んでいる、読了のいずれかを入力してください';
	}

	//読んだ時期
	$date = $review['time'];
	if (strlen($date)) {
		list($Y, $m, $d) = explode('-', $date);
	}
	if (!strlen($date)) {
		$errors['time'] = '読んだ日もしくは最後に読んだ日のデータを入力してください';
	} elseif (!checkdate($m, $d, $Y) === true) {
		$errors['time'] = '存在しない日付です';
	} elseif (!strptime($date, '%Y-%m-%d')) {
		$errors['time'] = '存在しない日付です';
	}

	//評価=evaluation の数値チェック
	if ($review['evaluation'] < 1 || $review['evaluation'] > 5) {
		$errors['evaluation'] = '評価を1以上5以下の整数で入力してください';
	}

	//感想=impressions が正しいかチェック
	if (!strlen($review['impressions'])) {
		$errors['impressions'] = '感想を入力してください';
	} elseif (strlen($review['impressions']) > 1000) {
		$errors['impressions'] = '感想は1000文字以内で入力してください';
	}


	return $errors;
}

//連番更新
function updateId($link)
{
	$mysqSET = 'SET @i=0;';
	$mysqUpdate = 'UPDATE reviews SET id=(@i:=@i+1);';

	try {
		mysqli_query($link, $mysqSET);
		mysqli_query($link, $mysqUpdate);
		// echo '<p>連番を更新しました</p>';
	} catch (Exception $e) {
		echo '<p>Errpr:連番の実行に失敗しました</p>';
		error_log('Error: fail to connect updateId');
		error_log('Debugging error:' . mysqli_error($link));
	}
}

//データベース接続
$link = dbConnect();
//テーブル削除
// dropTable($link);
//テーブル作成
// createTable($link);
//接続解除
// mysqli_close($link);

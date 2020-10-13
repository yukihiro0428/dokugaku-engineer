<?php require 'header.php'; ?>
<section class="global-links">
	<h3>登録完了ページ</h3>
	<p class="btn btn-success btns"><a href="registration.php">もう一度登録する</a></p>
	<p class="btn btn-primary btns"><a href="list.php">一覧ページへ</a></p>
	<p class="btn btn-info btns"><a href="front-page.php">HOMEへ</a></p>
</section>
<div class="actionPage">
	<?php
	//HTTPメソッドがPOSTだったら
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$review = [
			'title' => trim($_POST['title']),
			'author' => trim($_POST['author']),
			'status' => trim($_POST['status']),
			'time' => $_POST['time'],
			'evaluation' => (int)trim($_POST['evaluation']),
			'impressions' => trim($_POST['impressions'])
		];
	}
	var_dump($_POST['status']); //追記
	echo '<p>入力時</p>';
	//バリデート出力
	$validated = validate($review);
	if (count($validated) > 0) {
		foreach ($validated as $error) {
			echo '<p>' . $error . '</p>';
		}
		return;
	}
	//SQLに登録する処理
	$sql = <<<EOT
INSERT INTO reviews (
	title,
	author,
	status,
	time,
	evaluation,
	impressions
) VALUES (
	"{$review['title']}",
	"{$review['author']}",
	"{$review['status']}",
	"{$review['time']}",
	"{$review['evaluation']}",
	"{$review['impressions']}"
)
EOT;

	$result = mysqli_query($link, $sql);
	if ($result) {
		echo '<p>データを追加しました</p>' . PHP_EOL;
	} else {
		echo '<p>Error:データの追加に失敗しました</p><p>再登録をお願い致します</p>' . PHP_EOL;
		error_log('Error: fail to add review');
	}
	//連番を更新
	updateId($link);


	?>
</div>
<?php require 'footer.php'; ?>

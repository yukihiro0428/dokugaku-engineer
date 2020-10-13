<?php require 'header.php'; ?>
<section class="global-links">
	<h3>一覧ページ</h3>
	<p class="btn btn-success btns"><a href="registration.php">登録ページへ</a></p>
	<p class="btn btn-info btns"><a href="front-page.php">HOMEへ</a></p>
</section>
<ul class="list-group listPage-items">
	<?php
	// echo '登録されている読書ログを表示します' . PHP_EOL;
	$sql = 'SELECT id, title, author, status, time, evaluation, impressions, creation_date_time FROM reviews';
	$results = mysqli_query($link, $sql);
	while ($review_anw = mysqli_fetch_assoc($results)) {
		echo '<li class="list-group-item listPage-item">';
		echo '<h4>' . $review_anw['id'] . '</h4>';
		echo '<h4>' . '書籍名:' . $review_anw['title'] . '</h4>';
		echo '<p><span>' . '著者名:' . $review_anw['author'] . '/</span>';
		echo '<span>' . '読書状況:' . $review_anw['status'] . '/</span>';
		echo '<span>' . '評価:' . $review_anw['evaluation'] . '</span>';
		echo '<p>' . '読んだ時期(読んでいる場合):' . $review_anw['time'] . '</p>';
		echo '<p>' . '感想:' . $review_anw['impressions'] . '</p>';
		echo '</li>';
	}
	mysqli_free_result($results);
	?>
</ul>
<p class="listPage-p">削除するデータがあれば番号を入力してください</p>
<div class="listPage-foot">
	<form class="input-group" action="deletecolumn.php" method="post">
		<p>
			<input type="number" min="1" class="form-control" placeholder="整数を入力してください" aria-describedby="basic-addon1" name="delete">
		</p>
		<p class="input-group-append">
			<input class="btn btn-success" type="submit" name="submit">
		</p>
	</form>
</div>

<?php require 'footer.php'; ?>

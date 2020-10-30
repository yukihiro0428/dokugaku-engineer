<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/escape.php';

$reviews = [];
$sql = 'SELECT id, title, author, status, time, evaluation, impressions, creation_date_time FROM reviews';
$results = mysqli_query($link, $sql);
while ($review = mysqli_fetch_assoc($results)) {
	$reviews[] = $review;
}
mysqli_free_result($results);
?>
<section class="global-links">
	<h3>一覧ページ</h3>
	<?php
	include __DIR__ . '/link/link_registration.php';
	include __DIR__ . '/link/link_home.php';
	?>
</section>
<ul class="list-group listPage-items">
	<?php if (count($reviews)) : ?>
		<?php foreach ($reviews as $review) : ?>
			<li class="list-group-item listPage-item">
				<h4><?php echo escape($review['id']); ?></h4>
				<h4>書籍名:<?php echo escape($review['title']); ?></h4>
				<p><span>著者名:<?php echo escape($review['author']); ?>/</span><span>読書状況:<?php echo escape($review['status']); ?>/</span><span>評価:<?php echo escape($review['evaluation']); ?></span></p>
				<p>読んだ時期(読んでいる場合):<?php echo escape($review['time']); ?></p>
				<p>感想:<?php echo nl2br(escape($review['impressions']), false); ?></p>
			</li>
		<?php endforeach; ?>
	<?php else : ?>
		<p>データが登録されていません</p>
	<?php endif; ?>
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

<?php require_once __DIR__ . '/footer.php'; ?>

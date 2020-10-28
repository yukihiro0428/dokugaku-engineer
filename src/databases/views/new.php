<section class="global-links">
	<h3>登録ページ</h3>
	<?php
	include __DIR__ . '/../link/link_list.php';
	include __DIR__ . '/../link/link_home.php';
	?>
</section>
<?php if (count($validated)) : ?>
	<ul class="validated_result">
		<?php foreach ($validated as $error) : ?>
			<li><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
<div class="registrationPage">
	<form method="post" action="action.php" accept-charset="UTF-8">
		<p class="form-group">
			<label for="label_ttl">書籍名</label>
			<input value="<?php echo $review['title']; ?>" class=" form-control" id="label_ttl" name="title" cols="30" rows="5"></input>
		</p>
		<p class="form-group">
			<label for="label_author">著者名</label>
			<input value="<?php echo $review['author'] ?>" class="form-control" id="label_author" name="author" cols="30" rows="3"></input>
		</p>
		<p>
			<span>読書状況</span>
			<span class="custom-control custom-radio">
				<input class="custom-control-input" id="label_readed" type="radio" name="status" checked="checked" value="読了" <?php echo ($review['status'] === '読了') ? 'checked' : ''; ?>>
				<label class="custom-control-label" for="label_readed">読了</label>
			</span>
			<span class="custom-control custom-radio">
				<input class="custom-control-input" id="label_reading" type="radio" name="status" value="読んでいる" <?php echo ($review['status'] === '読んでいる') ? 'checked' : ''; ?>>
				<label class="custom-control-label" for="label_reading">読んでいる</label>
			</span>
			<span class="custom-control custom-radio">
				<input class="custom-control-input" id="label_unread" type="radio" name="status" value="未読" <?php echo ($review['status'] === '未読') ? 'checked' : ''; ?>>
				<label class="custom-control-label" for="label_unread">未読</label>
			</span>
		</p>
		<p class="form-group">
			<label for="label_date">読んだ日もしくは最後に読んだ日</label>
			<input value="<?php echo $review['time'] ?>" class="form-control" id="label_date" type="date" name="time">
		</p>
		<p>
			<label for="label_evaluation">評価</label>
			<input type="number" id="label_evaluation" class="custom-select" min="1" max="5" name="evaluation" placeholder="1~5を入力してください" value="<?php echo $review['evaluation'] ?>">
		</p>
		<p class="form-group">
			<label for="label_impressions">感想</label>
			<input value="<?php echo $review['impressions'] ?>" id="label_impressions" class="form-control" name="impressions" cols="30" rows="10"></input>
		</p>

		<p>
			<input class="btn btn-outline-primary" type="submit" name="submit" value="登録">
		</p>
		<p>
			<input class="btn btn-outline-success" type="reset" value="入力内容をリセットする">
		</p>
	</form>
</div>

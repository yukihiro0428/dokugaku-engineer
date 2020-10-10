<?php require 'header.php'; ?>
<section class="global-links">
	<h3>登録ページ</h3>
	<p class="btn btn-primary btns"><a href="list.php">一覧ページへ</a></p>
	<p class="btn btn-info btns"><a href="front-page.php">HOMEへ</a></p>
</section>

<div class="registrationPage">
	<form method="post" action="action.php">
		<p class="form-group">
			<label for="label_ttl"">書籍名</label>
			<textarea class=" form-control" id="label_ttl" name="title" cols="30" rows="5"></textarea>
		</p>
		<p class="form-group">
			<label for="label_author">著者名</label>
			<textarea class="form-control" id="label_author" name="author" cols="30" rows="3"></textarea>
		</p>
		<p>
			<span>読書状況</span>
			<span class="custom-control custom-radio">
				<input class="custom-control-input" id="label_readed" type="radio" name="status" value="読了" checked="checked">
				<label class="custom-control-label" for="label_readed">読了</label>
			</span>
			<span class="custom-control custom-radio">
				<input class="custom-control-input" id="label_reading" type="radio" name="status" value="読んでいる">
				<label class="custom-control-label" for="label_reading">読んでいる</label>
			</span>
			<span class="custom-control custom-radio">
				<input class="custom-control-input" id="label_unread" type="radio" name="status" value="未読">
				<label class="custom-control-label" for="label_unread">未読</label>
			</span>
		</p>
		<p class="form-group">
			<label for="label_date">読んだ日もしくは最後に読んだ日</label>
			<input class="form-control" id="label_date" type="date" name="time">
		</p>
		<p>
			<label for="label_evaluation">評価</label>
			<input type="number" id="label_evaluation" class="custom-select" min="1" max="5" name="evaluation" list="numbers" placeholder="1~5を入力してください">
			<datalist id="numbers">
				<option value="1">
				<option value="2">
				<option value="3">
				<option value="4">
				<option value="5">
			</datalist>
		</p>
		<p class="form-group">
			<label for="label_impressions">感想</label>
			<textarea id="label_impressions" class="form-control" name="impressions" cols="30" rows="10"></textarea>
		</p>

		<p>
			<input class="btn btn-outline-primary" type="submit" name="submit" value="登録">
		</p>
		<p>
			<input class="btn btn-outline-success" type="reset" value="入力内容をリセットする">
		</p>
	</form>
</div>
<?php require 'footer.php'; ?>

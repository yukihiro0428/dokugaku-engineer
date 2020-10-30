<?php require_once __DIR__ . '/header.php'; ?>
<section class="global-links">
	<h3>削除結果ページ</h3>
	<?php
	include __DIR__ . '/link/link_list.php';
	include __DIR__ . '/link/link_registration.php';
	include __DIR__ . '/link/link_home.php';
	?>

</section>
<div class="deletecolumnPage">
	<?php

	function deleteColumn($link)
	{
		//番号を超えた場合の入力をした場合を除外するコードを書く必要がある
		// $selectIdSql = 'SELECT id FROM reviews;';
		// var_export(mysqli_query($link, $selectIdSql));




		$deleteNumber = (int)trim($_POST['delete']);
		$deleteColumnSql = 'DELETE FROM reviews WHERE id =' . $deleteNumber . ';';
		$result = mysqli_query($link, $deleteColumnSql);
		if ($deleteNumber <= 0) {
			echo '<p>1以上の整数を入力してください</p>';
		} elseif ($result) {
			echo '<p>' . $deleteNumber . '番目のデータを削除しました。</p>';
			updateId($link);
		} else {
			echo '<p>Errpr:削除に失敗しました</p>';
			error_log('Error: fail to delete columnId');
			error_log('Debugging error:' . mysqli_error($link));
		}
	}
	deleteColumn($link);

	?>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>

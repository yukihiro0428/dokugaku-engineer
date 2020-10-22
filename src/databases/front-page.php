<?php require 'header.php'; ?>
<?php createTable($link); ?>
<section class="global-links">
	<h3>HOMEページ</h3>
	<p class="btn btn-primary btns"><a href="list.php">一覧ページへ</a></p>
	<p class="btn btn-success btns"><a href="registration.php">登録ページへ</a></p>
</section>

<section class="frontPage">
	<h4>アプリ概要</h4>
	<p>読書した本の感想を入力、保存をしていつでも読み返せることが出来ます</p>
	<h5>機能</h5>
	<p>登録項目：書籍名、著者名、読書状況、読んだ日もしくは最後に読んだ日、評価、感想</p>
	<h5>使用言語</h5>
	<p>PHP、MySQL</p>
	<h5>参考サイト</h5>
	<p><a href="https://dokugaku-engineer.com/">独学エンジニア(https://dokugaku-engineer.com/)</a></p>
	<h5>所感</h5>
	<p>コードの記述関連も学んだがエンジニアの思考を大きく学びました。</p>
	<ul>
		<li>公式ドキュメントを読む。今までブログ記事ばかり見ていたので、エラー時対応出来ませんでした。<br>
			きちんと挙動も確認し、 正しく理解してコードを書く意識を持ちました。</li>
		<li>問題が起きた時に小さく問題を切り分けて個別にアプローチをする重要性を学びました。<br>
			タスク(コーディング 時)を実行する時も同様だと実感しています</li>
		<li>DRY原則を学びました。同じコード関連は一箇所にまとめたり関数化して使いまわしたりして修正、保守性を意識する大切さを学びました</li>
	</ul>
</section>

<?php require 'footer.php'; ?>

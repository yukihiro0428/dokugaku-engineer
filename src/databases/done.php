<?php require 'header.php'; ?>
<section class="global-links">
	<h3>HOMEページ</h3>
	<?php
	include __DIR__ . '/link/link_list.php';
	include __DIR__ . '/link/link_registration.php';
	include __DIR__ . '/link/link_home.php';
	?>
</section>
<p class="action_add">データを追加しました</p>

<?php require 'footer.php'; ?>

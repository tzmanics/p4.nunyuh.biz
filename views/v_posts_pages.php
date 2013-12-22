<div id='postInfo'>
	<?php foreach($posts as $post): ?>


	<h1><?=$post['post_title']?></h1>
	<h3><?=$post['post_description']?></h3>
	<a href="/users/postPage/<?= $usersID?>" title="<?= $users?>'s page">created by : <?= $users?> </a>
	<a href="/posts/follow/<?=$post['user_id']?>" title='Follow'>[+]</a>
	<time datetime="<?=Time::display($post['created'],'d M y')?>">
	<?=Time::display($post['created'])?>
	</time>

	<?php 
	for ($x=1; $x<=4; $x++){
		echo "<img src='".$post['image'.$x]."'>";
		echo "<p>".$post['image'.$x.'_cap']."</p>";
	}?>
	<?php endforeach; ?>
</div>

<div id='postInfo'>
	<?php foreach($posts as $post): ?>

		<!-- loop through and display all post imformation -->
		<h1><?=$post['post_title']?></h1>
		<h3><?=$post['post_description']?></h3>
		<a href="/users/postPage/<?= $usersID?>" title="<?= $users?>'s page">created by : <?= $users?> </a>
		<a href="/posts/follow/<?=$post['user_id']?>" title='Follow'>[+]</a>
		<time datetime="<?=Time::display($post['created'],'d M y')?>">
		<?=Time::display($post['created'])?>
		</time>

		<!-- for loop to display all images -->
		<?php 
		for ($x=1; $x<=4; $x++){
			echo "<img src='".$post['image'.$x]."' alt='post image'>";
			echo "<p>".$post['image'.$x.'_cap']."</p>";
		}?>
	<?php endforeach; ?>
</div>

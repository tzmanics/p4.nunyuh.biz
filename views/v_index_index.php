<div class="container">
	<?php foreach($posts as $post): ?>

	<div class='item'>
		<!-- 1st post image and link to post page -->
		<a href="/posts/pages/<?=$post['post_id']?>">
		<img src="<?=$post['image1']?>" alt='first post image'></a>

		<!-- post info hidden until hover -->
		<div class='postHidden'>
			<p><a href="/posts/pages/<?=$post['post_id']?>"><?=$post['post_title']?></a></p>
			<time datetime="<?=Time::display($post['created'],'d M y')?>">
			<?=Time::display($post['created'])?>
			</time>
		</div>
	</div>
	<?php endforeach; ?>
</div>

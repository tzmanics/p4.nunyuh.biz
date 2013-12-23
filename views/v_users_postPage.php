<!-- display who's post page -->
<h1>posts from <?=$user?>
<!-- follow link -->
<a href="/posts/follow/<?=$post['user_id']?>" title='Follow'>[+]</a></h1>
<div class="container">
	<!-- show all posts from this user -->
	<?php foreach($posts as $post): ?>
		<div class='item'>
			<a href="/posts/pages/<?=$post['post_id']?>">
			<img src="<?=$post['image1']?>" alt='first post image'></a>
			<div class='postHidden'>
				<p><a href="/posts/pages/<?=$post['post_id']?>"><?=$post['post_title']?></a></p>
				<time datetime="<?=Time::display($post['created'],'d M y')?>">
				<?=Time::display($post['created'])?>
				</time>
			</div>
		</div>
	<?php endforeach; ?>
</div>

	<div id="container">
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

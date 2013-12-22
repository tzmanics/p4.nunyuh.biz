<h1><?=$user->username?>'s PROFILE PAGE</h1>

<div class="posts">  
	  
	<ul class="tabs">  
		<li class="tab-link current" data-tab="yourPosts">Your Posts</li>  
		<li class="tab-link" data-tab="theirPosts">Their Posts</li>    
	</ul>  
	  <div id ="container">
	<div id="yourPosts" class="tab-content current">  
		<h2>YOUR POSTS</h2>
	
			<?php foreach($yourPosts as $post): ?>

				<div class='item'>
					<a href="/posts/pages/<?=$post['post_id']?>">
					<img src="<?=$post['image1']?>" alt='first post image'></a>
					<div class='postHidden'>
						<p><a href="/posts/pages/<?=$post['post_id']?>"><?=$post['post_title']?></a></p>
						<time datetime="<?=Time::display($post['created'],'d M y')?>">
						<?=Time::display($post['created'])?>
						</time><br>
						<a href="/posts/deletePost/<?=$post['post_id']?>">delete</a>
					</div>
				</div>
			<?php endforeach; ?>
	
		<p>Click <a href='/posts/add'>HERE</a> to add more Posts</p>
	</div>  
	  
	<div id="theirposts" class="tab-content">  
		<h2>THEIR POSTS</h2>
			<?php foreach($theirPosts as $post): ?>

			<div class='item'>
				<a href="/posts/pages/<?=$post['post_id']?>">
				<img src="<?=$post['image1']?>" alt='first post image'></a>
				<div class='postHidden'>
					<p><a href="/posts/pages/<?=$post['post_id']?>"><?=$post['post_title']?></a></p>
					<time datetime="<?=Time::display($post['created'],'d M y')?>">
					<?=Time::display($post['created'])?>
					<a href="/posts/unfollow/<?=$post['post_user_id']?>">[-]</a>
					</time><br>
				</div>
			</div>
			<?php endforeach; ?>
	</div> 
	</div>
  
</div><!-- posts -->  
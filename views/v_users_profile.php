<h1><?=$user->username?>'s PROFILE PAGE</h1>

<div class="posts">  
	  
	<ul class="tabs">  
		<li class="tab-link current" data-tab="yourPosts">Your Posts</li>  
		<li class="tab-link" data-tab="theirPosts">Their Posts</li>    
	</ul>  
	  
	<div id="yourPosts" class="tab-content current">  
	<h2>YOUR POSTS</h2>
		<?php foreach($yourPosts as $post): ?>
			<article class='post'>
				<h3><?=$post['post_title']?></h3>
				<img src="<?=$post['image1']?>" alt="pup1">
				<h5><?=$post['image1_cap']?></h5>
				<time datetime="<?=Time::display($post['created'],'d M y G:i')?>">
					<?=Time::display($post['created'])?>
				</time>
				<!-- <br><br><a href='/posts/deletePost/<?=$post['post_id']?>'>DELETE</a>-->
			</article>
		<?php endforeach; ?>
		<p>Click <a href='/posts/add'>HERE</a> to add more Posts</p>
	</div>  
	  
	<div id="theirposts" class="tab-content">  

	</div>  

  
</div><!-- posts -->  
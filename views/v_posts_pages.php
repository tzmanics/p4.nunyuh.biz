
<div id="postUser">
	<a href="/users/postPage/<?= $usersID?>"><?= $users?></a>
</div>
<?php foreach($posts as $post): ?>

	<div id='postInfo'>
		<h1><?=$post['post_title']?></h1>
		<h3><?=$post['post_description']?></h3>
		<time datetime="<?=Time::display($post['created'],'d M y')?>">
			<?=Time::display($post['created'])?>
		</time>
	
		<?php 
			for ($x=1; $x<=4; $x++)
			  {
			  echo "<img src='".$post['image'.$x]."'>";
			  echo "<p>".$post['image'.$x.'_cap']."</p>";
			  } 
		?>
	</div>


<?php endforeach; ?>

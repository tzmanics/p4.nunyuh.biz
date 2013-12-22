<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="/css/master.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>  
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
<header>
	<h1><a href="/index">SOCI</a></h1>
	<nav>
		
		
		<?php if($user) {echo "<ul class='userMenu'> <li><a href='/users/profile'>".$user->username."</a></li><br>
		<li class='smlList'><a href='/users/logout'>log out</a></li>
		<li class='smlList'><a href='/users/profile'>profile</a></li>
		<li class='smlList'><a href='/posts/add'>add post</a></li></ul>";
		} else {echo '<a href="/users/login">login</a> / <a href="/users/signup">signup</a>';}?>
	
	</nav>
</header>

<?php if(isset($content)) echo $content; ?>
<?php if(isset($client_files_body)) echo $client_files_body; ?>

<script src="/js/master.js"></script>
<script src="/js/masonry.pkgd.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</body>
</html>
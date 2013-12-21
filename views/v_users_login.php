<h1>LOG IN</h1>

	<!-- show if login error -->
	<?php if(isset($error)): ?>
		<div id='error'>
			Login failed. Please check your username and password.
		</div><br>
	<?php endif; ?>

	<form method='POST' action='/users/p_login'>

	Username: <input type = 'text' name='username'><br><br>
	Password: <input type = 'password' name='password'><br><br>

	<input type='Submit' value='Log In'>

	<p>Not a member?
	<input type='button' value='Sign Up!' onclick='location.href="/users/signup";'></p>

</form>


<div class='forms'>
<h1>SIGN UP</h1>
 <div id='error'><h3><?php if ($email_exists) echo 'We already gots that email.<br>'; 
						   if ($email_exists) echo 'Sorry that username is being used.<br>'; 
 						   if ($invalid_email) echo "That ain't not no email.<br>"; 
						   if ($empty_field) echo 'Mmmmm something is missing...'; ?>        
 </h3></div>
<form method='POST' action='/users/p_signup'>

	Username <input type='text' name='username'><br><br>
	First Name <input type='text' name='first_name'><br><br>
	Last Name <input type='text' name='last_name'><br><br>
	Email <input type='text' name='email'><br><br>
	Password <input type='password' name='password'><br><br>

	<input type='submit' value='Sign Up'>

</form>
</div>
<h3>Use this to create a new user</h3>
<form action="adduser.php" method="POST">
	<input type='hidden' name='canary' value="{$canary}">
	<input type='email' name='email' placeholder="Email..." required >
	<input type='password' name='password' placeholder="Password..." required >
	<input type='submit' value="Login">
</form>

<html>
<head>
<title>Faculty Login</title>
</head>
<body>

<?php echo validation_errors(); ?>
<?php echo form_open('LoginController/flogin'); ?>

<h3>Faculty Username</h3>
<input type="text" name="username" value="" size="50" />

<h3>Faculty Password</h3>
<input type="text" name="password" value="" size="50" />

<div><input id="btn_login" name="btn_login" type="Submit" value="Login" /></div>


</form>

</body>
</html>

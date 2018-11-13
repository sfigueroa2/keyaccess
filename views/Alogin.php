<!DOCTYPE html>
<html>
<head>
<title>Key Access</title>
</head>
<body>

<?php echo validation_errors(); ?>
<?php echo form_open('LoginController/index'); ?>

<h1>Key Access</h1><hr>

<h2>Username</h2>
<input type="text" name="username" value="" size="50" />

<h2>Password</h2>
<input type="text" name="password" value="" size="50" />


<div><input id="btn_login" name="btn_login" type="Submit" value="Login" /></div>
<button type="submit" name="submitForm" value="formSave">SAVE</button>


</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Key Access</title>
</head>
<body>

<?php echo validation_errors(); ?>
<?php echo form_open('LoginController/index'); ?>

<h1>Key Access Management</h1><hr>

<p><button onclick="location.href='<?php echo base_url();?>index.php/StudentController/Slogin'">Student Login</button></p>
<p><button onclick="location.href='<?php echo base_url();?>index.php/StudentController/Flogin'">Faculty Login</button></p>
<p><button onclick="location.href='<?php echo base_url();?>index.php/StudentController/Alogin'">Administrator Login</button></p>

</form>

</body>
</html>

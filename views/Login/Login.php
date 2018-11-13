<!DOCTYPE html>
<html>
<head>
<title>Key Access</title>
</head>
<body>

<?php echo validation_errors(); ?>
<?php echo form_open('LoginController/index'); ?>

<h1>Key Access</h1><hr>

    <button type="submit" name="action" value="student" class="btn btn-primary btn-lg btn-block"> Student Login </button>
    <button type="submit" name="action" value="faculty" class="btn btn-warning btn-lg btn-block"> Faculty Login </button>
    <button type="submit" name="action" value="admin" class="btn btn-warning btn-lg btn-block"> Admin Login </button>

</form>

</body>
</html>

<?php
if (isset($this->session->userdata['logged_student'])) {
    $username = ($this->session->userdata['logged_student']['username']);
    echo "Hello <b id='welcome'>" . $username . "!</b>";
}
if (isset($this->session->userdata['logged_admin'])) {
    $username = ($this->session->userdata['logged_admin']['username']);
    echo "Hello <b id='welcome'>" . $username . "!</b>";
}
if (isset($this->session->userdata['logged_faculty'])) {
    $username = ($this->session->userdata['logged_faculty']['username']);
    echo "Hello <b id='welcome'>" . $username . "!</b>";
}
?>

<html>
        <head>
        </head>
        <body>

          <button onclick="location.href='<?php echo base_url();?>index.php/LoginController/logout'">Logout</button>

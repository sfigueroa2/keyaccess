<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Menu</title>
  </head>
  <body>
    <h1>Admin Menu</h1><hr/>
    <form method="POST" action="">
    </form>
</body>
<p><button onclick="location.href='<?php echo base_url();?>index.php/AdminController/RequestRS'">Request Per Room Per Semester</button></p>
<p><button onclick="location.href='<?php echo base_url();?>index.php/AdminController/RequestStatus'">Request Status</button></p>
<p><button onclick="location.href='<?php echo base_url();?>index.php/AdminController/FacultyAssignedRoom'">Faculty Assigned Room</button></p>
<p><button onclick="location.href='<?php echo base_url();?>index.php/AdminController/GraduatingStudents'">Graduating Students</button></p>
<p><button onclick="location.href='<?php echo base_url();?>index.php/AdminController/BKtoReturn'">Brassk Keys Checked Out</button></p>

</body>
</html>

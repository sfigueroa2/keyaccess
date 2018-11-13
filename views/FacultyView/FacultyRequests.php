<!DOCTYPE html>
<html>
  <head>
    <title>Student Requests</title>
  </head>
  <body>
<h2>Student Requests</h2>
 <table>
  <tr>
    <td><strong>Status</strong></td>
    <td><strong>Request Number</strong></td>
    <td><strong>Room</strong></td>
    <td><strong>Work Order Number</strong></td>
    <td><strong>Start Date</strong></td>
    <td><strong>End Date</strong></td>
 </tr>
  <?php foreach($requests as $r){?>
  <tr>
    <td><?php echo $r->Rstatus;?></td>
    <td><?php echo $r->Renumber;?></td>
    <td><?php echo $r->roomre;?></td>
    <td><?php echo $r->RWorkOrderNo;?></td>
    <td><?php echo $r->Rstart_date;?></td>
    <td><?php echo $r->Rend_date;?></td>
   </tr>
  <?php }?>
</table>

</body>
<p><button onclick="location.href='<?php echo base_url();?>index.php/FacultyController/index'">Back</button></p>

</html>

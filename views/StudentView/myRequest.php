<!DOCTYPE html>
<html>
  <head>
    <title>My Requests</title>
  </head>
  <body>
<h2>My Requests</h2>
 <table>
  <tr>
    <td><strong>Status</strong></td>
    <td><strong>Room</strong></td>
    <td><strong>Request Number</strong></td>
    <td><strong>Reprofessor</strong></td>
    <td><strong>Request Start Date</strong></td>
    <td><strong>Request End Date</strong></td>

 </tr>
  <?php foreach($myRequest as $r){?>
  <tr>
    <td><?php echo $r->Rstatus;?></td>
    <td><?php echo $r->roomre;?></td>
    <td><?php echo $r->Renumber;?></td>
    <td><?php echo $r->Reprofessor;?></td>
    <td><?php echo $r->Rstart_date;?></td>
    <td><?php echo $r->Rend_date;?></td>
   </tr>
  <?php }?>
</table>

</body>
<p><button onclick="location.href='<?php echo base_url();?>index.php/StudentController/index'">Back</button></p>

</html>

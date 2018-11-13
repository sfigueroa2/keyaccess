<!DOCTYPE html>
<html>
  <head>
    <title>Faculty Assigned to Rooms</title>
  </head>
  <body>
<h2>Faculty Assigned to Rooms</h2>
 <table>
  <tr>
    <td><strong>Room</strong></td>
    <td><strong>Faculty Email</strong></td>

 </tr>
  <?php foreach($assigned as $a){?>
  <tr>
    <td><?php echo $a->ROOM_ASSIGNED;?></td>
    <td><?php echo $a->FACULTY_EMAIL;?></td>
   </tr>
  <?php }?>
</table>

</body>

</html>

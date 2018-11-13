<!DOCTYPE html>
<html>
  <head>
    <title>Room Requests Semester</title>
  </head>
  <body>
<h2>Room Requests Semester</h2>
 <table>
  <tr>
    <td><strong>Requests</strong></td>
    <td><strong>Room Number</strong></td>

 </tr>
  <?php foreach($request as $r){?>
  <tr>
    <td><?php echo $r->Requests;?></td>
    <td><?php echo $r->ROOM_NO;?></td>



   </tr>
  <?php }?>
</table>

</body>

</html>

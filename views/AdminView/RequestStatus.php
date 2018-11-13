<!DOCTYPE html>
<html>
  <head>
    <title>Request Status</title>
  </head>
  <body>
<h2>Request Status</h2>
 <table>
  <tr>
    <td><strong>ID</strong></td>
    <td><strong>Name</strong></td>
    <td><strong>Request Number</strong></td>
    <td><strong>Status</strong></td>

 </tr>
  <?php foreach($request as $r){?>
  <tr>
    <td><?php echo $r->STUDENT_ID;?></td>
    <td><?php echo $r->STUDENT_NAME." ".$r->STUDENT_LASTNAME;?></td>
    <td><?php echo $r->REQUEST_NO;?></td>
    <td><?php echo $r->REQUEST_STATUS;?></td>



   </tr>
  <?php }?>
</table>

</body>

</html>

<!DOCTYPE html>
<html>
  <head>
    <title>Brass Keys Checked Out</title>
  </head>
  <body>
<h2>Brass Keys Checked Out</h2>
 <table>
  <tr>
    <td><strong>ID</strong></td>
    <td><strong>Name</strong></td>
 </tr>
  <?php foreach($key as $k){?>
  <tr>
    <td><?php echo $k->STUDENT_ID;?></td>
    <td><?php echo $k->STUDENT_NAME." ".$k->STUDENT_LASTNAME;?></td>
   </tr>
  <?php }?>
</table>

</body>

</html>

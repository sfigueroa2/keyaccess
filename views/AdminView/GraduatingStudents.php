<!DOCTYPE html>
<html>
  <head>
    <title>Graduating Students</title>
  </head>
  <body>
<h2>Graduating Students</h2>
 <table>
  <tr>
    <td><strong>ID</strong></td>
    <td><strong>Name</strong></td>
    <td><strong>Graduation Date</strong></td>

 </tr>
  <?php foreach($grad as $g){?>
  <tr>
    <td><?php echo $g->id;?></td>
    <td><?php echo $g->First." ".$g->Last;?></td>
    <td><?php echo $g->Grad_Date;?></td>
   </tr>
  <?php }?>
</table>

</body>

</html>

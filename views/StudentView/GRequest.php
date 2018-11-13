<body>
  <?php echo validation_errors(); ?>
  <?php echo form_open('StudentController/Request'); ?>
<h1>Request Key Access</h1><hr>

     <p><label>Room Number: </label>
     <select class="form-control">
          <?php

          foreach($faculty as $f)
          {
            echo '<option value="'.$f->Fname.'">'.$f->Fname." ".$f->FlastName.'</option>';
          }
          ?>
        </select>

        <p><label>Room Name: </label>
        <select class="form-control">
            <?php
             foreach($room as $r)
             {
               echo '<option value="'.$r->Rnumber.'">'.$r->Rnumber.'</option>';
             }
             ?>
           </select>

        <p><label>Professor Email: </label>
        <input type="text" name="ptype" placeholder="nvillanueva@utep.edu" value="<?php $f->FlastName ?>">

        <p><label>Expected Graduation Date: </label>
        <input type="text" name="ptype" placeholder="yyyy-mm-dd" value="<?php $f->FlastName ?>">


        <p><input type="submit" id="submit" name="dsubmit" value="Submit">

</body>

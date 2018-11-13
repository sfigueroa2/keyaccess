<body>
  <?php echo validation_errors(); ?>
  <?php echo form_open('StudentController/Request'); ?>

<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php } ?>
<h1>Request Key Access</h1><hr>
<form>
     <p><label>Faculty Name: </label>
     <select class="request">
          <?php

          foreach($faculty as $f)
          {
            echo '<option value="'.$f->Fname.'">'.$f->Fname." ".$f->FlastName.'</option>';

          }
          ?>
        </select><?php echo form_error('pname'); ?>

        <p><label>Room Number: </label>
        <select class="request">
            <?php
             foreach($room as $r)
             {
               echo '<option value="'.$r->Rnumber.'">'.$r->Rnumber.'</option>';
             }
             ?>
           </select><?php echo form_error('room'); ?>

        <p><label>Start Date: </label>
        <input type="text" name="ptype" placeholder="yyyy-mm-dd" class = "rquest"><?php echo form_error('sdate'); ?>

        <p><label>End Date: </label><?php echo form_error('edate'); ?>
        <input type="text" name="ptype" placeholder="yyyy-mm-dd" class"request"><?php echo form_error('edate'); ?>

        <p><input type="submit" id="submit" name="dsubmit" value="Submit">
</form>
<p><button onclick="location.href='<?php echo base_url();?>index.php/StudentController/index'">Back</button></p>

</body>

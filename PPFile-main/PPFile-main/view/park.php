<?php
$vTypes = PPData::getAllVtypes();
//     
?>

<fieldset>
   <legend>Park Vehicle</legend>
   <form action="." method="post">
      <input type="hidden" name="action" value="park">
      <label for="regNr">RegNr:</label>
      <input type="text" id="regNr" name="regNr" required>
      
      <label for="vtype">Vehicletype:</label>
      <input type="radio" id="vtype" name="vtype" value="Car" required>Car
      
      <?php for($i=1;$i<count($vTypes);$i++) { ?> 
         <input type="radio" id="vtype" name="vtype" value="<?= $vTypes[$i] ?>"><?= $vTypes[$i] ?>
      <?php } ?>

      <br>
      <button>Submit</button>
   </form>
</fieldset>
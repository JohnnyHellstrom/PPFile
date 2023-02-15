<?php
$vehicle = $parking->findVehicle($regNr);
$emptylots = $parking->getEmptyLots($vehicle->getVtype());
 ?>
 
<br>

<fieldset>
   <legend><?= "Choose New Lot For {$regNr}" ?></legend>
   <form method="post" action=".">
   <input type="hidden" name="regNr" value="<?= $regNr ?>">
   <input type="hidden" name="action" value="move">
   <label for="emptyLot">EmptyLot</label>
      <select name="emptyLot" id="emptyLot">
      <?php for($i=0;$i<count($emptylots);$i++){ ?>
         <option value="<?=$emptylots[$i]+1 ?>"><?= $emptylots[$i]+1?></option>  
         <?php } ?>
      </select>
      <button>Submit</button>
   </form>
</fieldset>



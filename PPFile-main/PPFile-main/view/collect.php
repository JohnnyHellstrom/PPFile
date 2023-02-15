<?php
$parkedVehicles = $parking->parkedVehicles;
?>

<fieldset>
<legend>Collect Vehicle</legend>
   <form method="post">
      <input type="hidden" name="action" value="collect">
      <label for="regNr">RegNr:</label>
      <select name="regNr" id="regNr">
         <?php for ($i=0;$i<count($parkedVehicles);$i++){
            $array = $parkedVehicles[$i]->getVehiclesInSquare();
            if(empty($array)){continue;}
            for($j=0;$j<count($array);$j++){ 
            ?>
         <option value="<?= $array[$j]->getRegNr() ?>"><?= $array[$j]->getRegNr() ?></option>
         <?php }} ?>
      </select>

      <button>Submit</button>
   </form>

</fieldset>
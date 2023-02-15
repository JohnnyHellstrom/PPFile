<?php
$parkedVehicles = $parking->parkedVehicles;


?>
<fieldset>
<legend>Move Vehicle</legend>
   <form method="post" action=".">
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
      <label for="getEmptyLots">Click to Display Availible Parkinglots</label>
      <input type="submit" name="Lots" value="Lots"></input>
   </form>
</fieldset>



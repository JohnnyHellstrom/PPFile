<?php
function writeToParkingFile($parking){
   //usort($parking->parkedVehicles, [Parkinglot::class, "compareObj"]);
   $parking = serialize($parking);
   $file = fopen("parking.csv", "w");
   fwrite($file, $parking);
   fclose($file);
}

function testInput($data) {

   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function printFindResult($vehicle){
   if(!empty($vehicle)){
      echo "The {$vehicle->getVtype()} with RegNr {$vehicle->getRegNr()} is parked in lot {$vehicle->getlotId()}";
   } else {
      echo "The vehicle does not exist!";
   }
   
}
function printCollectedVehicle($vehicle){
   $checkoutime =  new DateTime('now');
   $rate = PPDATA::getRate($vehicle->getVtype());
   $diff = date_diff($vehicle->getStartTime(), $checkoutime);
   $hours= $diff->format('%h')+1;
   $totalcost = $hours * $rate;

   echo "Your {$vehicle->getVtype()} with RegNr {$vehicle->getRegNr()}
         was parked {$vehicle->getStartTime()->format('Y-m-d h:i')} and collected at
         {$checkoutime->format('Y-m-d h:i')}. Duration = {$hours}h Rate = {$rate} 
         total cost = {$totalcost}$";
}
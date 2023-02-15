<?php
$parkedVehicles = $parking->parkedVehicles;
?>

<table>
   <thead>
      <tr>
         <th scope="col">Parkinglot</th>
         <th scope="col">VehicleType</th>
         <th scope="col">RegNr</th>
         <th scope="col">ArrivalTime</th>
      </tr>
   </thead>
   <tbody>

      <?php for($i=0;$i<count($parkedVehicles);$i++){       
               $array = $parkedVehicles[$i]->getVehiclesInSquare();
               if(!empty($array)){
                  for($j=0;$j<count($array);$j++){
                     ?>
                     <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= $array[$j]->getVtype(); ?></td>
                        <td><?= $array[$j]->getRegNr(); ?></td>
                        <td><?= $array[$j]->getStartTime()->format('Y-m-d h:i'); ?></td>
                     </tr>              
      <?php  } } }  ?>
   </tbody>
</table>
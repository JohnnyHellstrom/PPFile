<?php
require('classes/parkingsquare.php');


class Parkinglot{
   private $capacity;
   public $parkedVehicles = array();

   function __construct($filename = 'parking.csv', $capacity = 10){
      $filedata = $this->readParkingFile($filename);
      if(!empty($filedata->parkedVehicles)){
         $this->capacity = $filedata->capacity;
         $this->parkedVehicles = $filedata->parkedVehicles;
      } else {
         $this->capacity = $capacity;
         $this->parkedVehicles = $this->createParkingArray($capacity);
      }      
   }

   private function createParkingArray($capacity){
      $newArray = array();
      for($i=0;$i<$capacity;$i++){
         $newArray[] = new Parkingsquare();
      }
      return $newArray;
   }

   public function parkVehicle($regNr, $vType){
      $vehicle = $this->findVehicle($regNr);
      $emptylot = $this->getEmptyLots($vType);
      if(!empty($vehicle)){
         echo 'The vehicle is already parked';
      } else if (empty($emptylot)){
         echo 'Parkinglot full!';
      } else {
         $this->parkedVehicles[$emptylot[0]]->addVehicle(new Vehicle($regNr, $vType));
         echo 'The Vehicle is parked';
      } 
         
   }

   public function findVehicle($regNr){
      for($i=0;$i<count($this->parkedVehicles);$i++){
         $vehicle = $this->parkedVehicles[$i]->getVehicle($regNr);
         if(!empty($vehicle)){
            $vehicle->setLotId($i+1);
            return $vehicle;
         }
      }
      return $vehicle;
   }

   public function moveVehicle($regNr, $newlot){
      $vehicle = $this->findVehicle($regNr);
      if($newlot != $vehicle->getLotId()-1){
         $this->parkedVehicles[$newlot]->addVehicle($vehicle);
         $this->parkedVehicles[$vehicle->getLotId()-1]->removeVehicle($vehicle);
         echo 'Your vehicle is moved';
      } else {
         echo 'Same place as before';
      }
   }

   public function collectVehicle($regNr){
      $vehicle = $this->findVehicle($regNr);
      printCollectedVehicle($vehicle);
      $this->parkedVehicles[$vehicle->getLotId()-1]->removeVehicle($vehicle);
   }

   public function getEmptyLots($vtype){
      $emptylots = array();
      for($i=0;$i<count($this->parkedVehicles);$i++){
         if($this->parkedVehicles[$i]->getSizeLeft() - PPData::getVehicleSize($vtype) >= 0){
            $emptylots[] = $i; 
         }      
      }
      return $emptylots;
   }

   private function readParkingFile($filename){
      $file2 = fopen($filename, "r");
      $file3 = fread($file2, 5000);
      fclose($file2);
      $newfilessss = unserialize($file3);
      return $newfilessss;
   }

   static function compareObj($vehicle1, $vehicle2)
   {
      return $vehicle1->getLotId() <=> $vehicle2->getLotId();
   }
} 
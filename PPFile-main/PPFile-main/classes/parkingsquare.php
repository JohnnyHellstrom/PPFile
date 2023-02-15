<?php
require('classes/vehicle.php');

class Parkingsquare{
   private $square = array();
   private $size;

function __construct($size = 100){
$this->size = $size;
}
public function getVehicle($regNr){
   for($i=0;$i<count($this->square);$i++){
      if($this->square[$i]->getRegNr() == $regNr){
         return $this->square[$i] ;
      }   
   }
   return null; 
}
public function getVehiclesInSquare(){
   $arrayOfVehicles = null;
   for($i=0;$i<count($this->square);$i++){
      $arrayOfVehicles[] = $this->square[$i];
   }
   return $arrayOfVehicles;
}

public function addVehicle($vehicle){
   return $this->square[] = $vehicle;
}

public function removeVehicle($vehicle){
   $squareobject = new Parkingsquare();
   for($i=0;$i<count($this->square);$i++){
      if($vehicle->getRegNr() != $this->square[$i]->getRegNr()){
         $squareobject->square[] = $this->square[$i];
      }
   }
   $this->square = $squareobject->square;
}

public function getSizeLeft(){
   $sizeLeft = $this->size;

   for($i=0;$i<count($this->square);$i++){
      $sizeLeft -= $this->square[$i]->getVehicleSize();
   }
   return $sizeLeft;
}

public function getSize(){
   return $this->size;
}





}



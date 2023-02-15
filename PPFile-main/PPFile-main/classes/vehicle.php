<?php

require('classes/data.php');
class Vehicle{
   private $regNr;
   private $vType;
   private $lotId;
   private $startTime;
   private $vehicleSize;


   function __construct($regNr, $vType, $lotId = 0){
      $this->regNr = strtoupper($regNr);
      $this->vType = $vType;
      $this->lotId = $lotId;  //does not get set when Parked!
      $this->startTime = new DateTime('now');
      $this->vehicleSize = PPData::getVehicleSize($vType);     
   }

   public function getVehicleSize(){
      return $this->vehicleSize;
   }  
   
   public function getLotId(){
      return $this->lotId;
   }
   public function setLotId($lotId){
      $this->lotId = $lotId;
   }
   public function getRegNr(){
      return $this->regNr;
   }
   public function getVtype(){
      return $this->vType;
   }
   public function getStartTime(){
      return $this->startTime;
   }


}
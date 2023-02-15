<?php

class PPData
{
   private static $vehicleSize = [
      'Car' => 100,
      'MC' => 50,
      'EChair' => 25,
      'Drone' => 10
   ];
   private static $rate = [
      'Car' => 100,
      'MC' => 50,
      'EChair' => 25,
      'Drone' => 10
   ];

   public static function getVehicleSize($vType)
   {
      $vehicleSize = PPData::$vehicleSize;
      foreach ($vehicleSize as $key => $value) {
         if ($key == $vType) {
            return $value;
         }
      }
   }
   public static function getRate($vType){
      $rate = PPData::$rate;
      foreach ($rate as $key => $value) {
         if ($key == $vType) {
            return $value;
         }
      }
   }
   public static function getAllVtypes(){
      $vTypes = array_keys(PPData::$vehicleSize);
      return $vTypes;
   }
}

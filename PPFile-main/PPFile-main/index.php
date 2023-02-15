<?php
session_start();

require('classes/parkinglot.php');
require('functions.php');

// if user is not logged in
if (!isset($_SESSION["user"])) {
   header("Location: view/loginform.php");
   exit();
 }

$regNr = strtoupper(filter_input(INPUT_POST,'regNr',FILTER_UNSAFE_RAW));
$action = filter_input(INPUT_POST,'action',FILTER_UNSAFE_RAW);
$parking = new Parkinglot();
$newVtype = filter_input(INPUT_POST,'newvtype',FILTER_UNSAFE_RAW);

include('view/header.html');

?> <h2><?="welcome " . $_SESSION['user'];?></h2><?php

// Selects input form
if(isset($_POST['Park'])){
   include('view/park.php');
}
if(isset($_POST['Collect'])){
   include('view/collect.php');
}
if(isset($_POST['Move'])){
   include('view/move.php');
}
if(isset($_POST['Lots'])){
   include('view/getEmptyLots.php');
}
if(isset($_POST['Find'])){
   include('view/find.php');
}
if(isset($_POST['Print'])){
   include('view/print.php');
}
if (isset($_POST["Logout"])) {
   session_destroy();
   unset($_SESSION);
}

// Handles input from hidden formaction above
switch($action){
   
   case 'park':   
         $regNr = testInput($regNr);

         $parking->parkVehicle($regNr,$_POST['vtype']);
         writeToParkingFile($parking);
         break;

   case 'find':
         $regNr = testInput($regNr);
         $vehicle = $parking->findVehicle($regNr);
         printFindResult($vehicle);
         break;

   case 'move':
         $parking->moveVehicle($regNr, $_POST['emptyLot']-1);
         writeToParkingFile($parking);
         break;

   case 'collect':
         $parking->collectVehicle($_POST['regNr']);
         writeToParkingFile($parking);
         break; 

}

include('view/footer.html');



?>
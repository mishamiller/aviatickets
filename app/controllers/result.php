<?php

// var_dump($_POST);
if (isset($_POST['airport_dep'], $_POST['airport_arr'])) {
  // echo $_POST['airport_dep']. " ---> " . $_POST['airport_arr'];
  require_once '../models/root_flight.php';
  require_once '../views/route_flight_view/result.php';
}
?>

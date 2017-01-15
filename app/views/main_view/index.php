<?php
if (isset($_POST['airport_dep'], $_POST['airport_arr'])) {
  echo $_POST['airport_dep']. " ---> " . $_POST['airport_arr'];
  //require '../route_flight_view/result.php';
}
?>

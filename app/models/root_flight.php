<?php
require_once 'db_connect.php';
$dep = $_POST['airport_dep'];
$arr = $_POST['airport_arr'];

$query = $conn->prepare('SELECT route_id, airport_dep, airport_arr FROM `route-flight` LEFT JOIN flight ON `route-flight`.flight_id = flight.flight_id ORDER BY route_id');
$query->execute();
$all_flights = $query->fetchAll();
$start_routes = get_departure_flights($all_flights, $dep);
$end_routes = get_arrival_routes($all_flights, $arr);
$intersect = array_intersect($start_routes, $end_routes);

$find_routes = implode ( ',', $intersect );
// var_dump($find_routes);
$sql = "SELECT route.route_id, airline_name, cost, flight_num, craft_type, airport_dep, airport_arr, time_dep, time_arr
        FROM route, flight, `route-flight`
        WHERE `route-flight`.flight_id = flight.flight_id AND
              `route-flight`.route_id = route.route_id AND
               route.route_id IN ($find_routes) ORDER BY route.route_id, time_arr";
$query = $conn->prepare($sql);
$query->execute();
$select_flights = $query->fetchAll();

$prev_key = "-";
$result_routes = array();

foreach ($select_flights as $key) {

  if ($key['route_id'] != $prev_key) {
    $prev_key = $key['route_id'];
    $result_route = array();
    array_push($result_route, $key);
    array_push($result_routes, $result_route);
  }
  else {
    $end_array = end($result_routes);
    $key_array = key($result_routes);
    array_push($result_routes[$key_array], $key);
  }
}

$count = 0;
foreach ($result_routes as $key) {
  $end_array = end($key);
  $key_array = key($key);
  if ($key[0]['airport_dep'] != $dep or $key[$key_array]['airport_arr'] != $arr) {
    unset($result_routes[$count]);
  }
  $count++;
}

$conn = null;

function get_departure_flights($flights, $dest){
  $result = array();
  foreach ($flights as $flight) {
    if ($flight['airport_dep'] ==$dest){
      array_push($result, $flight['route_id']);
    }
  }
  return $result;
}
function get_arrival_routes($flights, $dest){
  $result = array();
  foreach ($flights as $flight) {
    if ($flight['airport_arr'] ==$dest){
        array_push($result, $flight['route_id']);
    }
  }
  return $result;
}
?>

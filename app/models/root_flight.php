<?php
require_once 'db_connect.php';
 $dep = $_POST['airport_dep'];
 $arr = $_POST['airport_arr'];

 $query = $conn->prepare('SELECT route_id, airport_dep, airport_arr FROM `route-flight` LEFT JOIN flight ON `route-flight`.flight_id = flight.flight_id ORDER BY route_id');
 $query->execute();
 $all_flights = $query->fetchAll();
 //var_dump($all_flights);
 $start_routes = get_departure_flights($all_flights, $dep);
 $end_routes = get_arrival_routes($all_flights, $arr);
 $intersect = array_intersect($start_routes, $end_routes);
 // foreach ($intersect as $key) {
 //   echo $key." ";
 // }

 $find_routes = implode ( ',', $intersect );
 var_dump($find_routes);
 $sql = "SELECT * FROM `route-flight` LEFT JOIN flight ON `route-flight`.flight_id = flight.flight_id WHERE route_id IN ($find_routes) ORDER BY route_id";
 $query = $conn->prepare($sql);
 $query->execute();
 $all_routes = $query->fetchAll();
 // var_dump($all_routes);

 //var_dump($intersect);
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

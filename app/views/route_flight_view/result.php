<?php
foreach ($result_routes as $key) {
  $d_dep = strtotime($key[0]['time_dep']);
  $end_array = end($key);
  $key_array = key($key);
  $d_arr = strtotime($key[$key_array]['time_arr']);

  echo '<div class="route clearfix">
    <div class="route_info">
      <div class="route_time route_time_dep">
        <h3>Время вылета: <span>' . date("G:i", $d_dep) . '</span>
        </h3>
      </div>
      <div class="flights">';

  foreach ($key as $key2) {
    echo '<div class="flight clearfix">
      <div class="flight_option flight_num">
        <h4>№ рейса: <span>'. $key2['flight_num'] .'</span>
        </h4>
      </div>';
    echo '<div class="flight_option craft_type">
      <h4>Тип самолета: <span>'. $key2['craft_type'] .'</span>
      </h4>
    </div>';
    echo '<div class="flight_option airport_dep">
      <h4>Аэропорт отправления: <span>'. $key2['airport_dep'] .'</span>
      </h4>
    </div>';
    echo '<div class="flight_option airport_arr">
      <h4>Аэропорт прибытия: <span>'. $key2['airport_arr'] .'</span>
      </h4>
    </div>';

    $df_dep = strtotime($key2['time_dep']);
    $df_arr = strtotime($key2['time_arr']);

    echo '<div class="flight_option time_dep">
      <h4>Время отправления: <span>'. date("G:i", $df_dep) . ' (' . date("d", $df_dep) . ' ' . date("M", $df_dep) . ') </span>
      </h4>
    </div>';
    echo '<div class="flight_option time_arr">
      <h4>Время прибытия: <span>'. date("G:i", $df_arr) . ' (' . date("d", $df_arr) . ' ' . date("M", $df_arr) . ') </span>
      </h4>
    </div></div>';
  }

  echo '</div><div class="route_time route_time_arr">
    <h3>Время прибытия: <span>' . date("G:i", $d_arr) . '</span>
    </h3>
  </div></div>';

  echo '<div class="route_buy">
    <div class="comp_name">
      <h3>Название компании: <span>'. $key2['airline_name'] .'</span>
      </h3>
    </div>';

  echo '<div class="price">
    <h3>Стоимость: <span>'. $key2['cost'] .' ₽</span>
    </h3>
  </div></div></div>';
}

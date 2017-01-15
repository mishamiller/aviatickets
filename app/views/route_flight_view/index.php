<html>
  <head>
    <title>Routes on HTML format</title>
    <meta charset="utf-8"/>
    <link href="../../aviatickets/public/css/style.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <h1>Подбор авиарейсов</h1>
    <form class="search_form" method="post" action="../app/views/main_view/index.php">
      <div class="search_line clearfix">
        <label for="airport_dep">Аэропорт отправления: </label>
        <input type="text" id="airport_dep" name="airport_dep"/>
        <label for="airport_arr">Аэропорт прибытия: </label>
        <input type="text" id="airport_arr" name="airport_arr"/>
        <input class="search_field search_button" type="submit" value="Найти">
      </div>
    </form>

    <div id="a" style="text-align: center"></div><br><br>
    <div id="result" style="text-align: center"></div><br><br>

    <div class="copyright">
      <p>Михаил Шаймарданов, МГТУ им. Н.Э. Баумана, 2016 г.</p>
    </div>
    <script type="text/javascript" src="../../aviatickets/public/js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../../aviatickets/public/js/main.js"></script>
  </body>
</html>

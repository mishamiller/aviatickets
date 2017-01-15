$('form.search_form').on('submit', function() {
  event.preventDefault();

  var that = $(this),
      url = that.attr('action'),
      type = that.attr('method'),
      data = {};

  that.find('[name]').each(function(index, value) {
    var that = $(this),
        name = that.attr('name');
        value = that.val();
    data[name] = value;
  });

  $.ajax({
    url: url,
    type: type,
    data: data,
    success: function(response) {
      $('#a').html(response);
      $('#result').load('../app/views/route_flight_view/result.php');
    }
  });
});

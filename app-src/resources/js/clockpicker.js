$(function() {
    $('.clockpicker').clockpicker({
      'default': 'now',
      vibrate: true,
      placement: "bottom",
      align: "left",
      autoclose: false,
      twelvehour: true
    });
    $('.clockpicker2').clockpicker({
      'default': 'now',
      vibrate: true,
      placement: "bottom",
      align: "left",
      autoclose: true,
      twelvehour: false
    });
  });
  
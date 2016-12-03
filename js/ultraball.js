/* global js*/

(function() {
  $(document).ready(onReady);

  function onReady() {
    var currentTime = new Date().getHours();
    if (7 <= currentTime && currentTime < 20) {
      if (document.body) {
        document.body.background = "http://itsnotch.com/tumblr/images/daytime_bg.jpg";
      }
    }
    else {
      if (document.body) {
        document.body.background = "http://itsnotch.com/tumblr/images/nighttime_bg.jpg";
      }
    }
  };
})();

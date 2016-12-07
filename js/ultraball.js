/* global js*/

clouds = ["/img/clouds/clouds1.png",
          "/img/clouds/clouds2.png",
          "/img/clouds/clouds3.png"];

(function() {
  $(document).ready(onReady);

  function onReady() {
    var cloudDiv = document.getElementById("cloud");
    cloudDiv.src = clouds[Math.floor(Math.random()*clouds.length)];
  };
})();

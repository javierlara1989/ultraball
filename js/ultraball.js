/* global js*/

clouds = ["/img/clouds/clouds1_low.png",
          "/img/clouds/clouds2_low.png",
          "/img/clouds/clouds3_low.png"];

skyColours = ["#001848", "#001848", "#001848", "#301860", "#301860", "#483078",
              "#604878", "#906090", "#0CC3FA", "#61D6FA", "#89E0FA" ,"#89E0FA",
              "#B4EAFA", "#B4EAFA", "#B4EAFA", "#B4EAFA", "#7DAECC" ,"#4B93BF",
              "#368ABE", "#167AB8", "#483078", "#301860", "#001848", "#001848"];

(function() {
  $(document).ready(onReady);

  function onReady() {
    setWeather();
  };

  function setWeather(){
    var cloudDiv = document.getElementById("cloud");
    cloudDiv.src = clouds[Math.floor(Math.random()*clouds.length)];

    var currentTime = new Date().getHours();
    document.body.style.backgroundColor = skyColours[currentTime];
  }
})();

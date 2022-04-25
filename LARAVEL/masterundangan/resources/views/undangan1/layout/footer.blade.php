 <!-- footer_start -->
 <footer class="footer">
      
    <div class="copy-right_text">
      <div class="container">
        <div class="footer_border"></div>
        <div class="row">
          <div class="col-xl-12">
            <p class="copy_right text-center">
            <strong>Copyright &copy; 2021 <a href="#" target="_blank">Boy & Girl</a></strong> All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer_end -->
</div>
<!-- Sunshine Template -->


<!-- JS here -->
<script src="assets/js/modernizr-3.5.0.min.js"></script>
<script src="assets/js/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-form.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/scrollIt.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/nice-select.min.js"></script>
<script src="assets/js/gijgo.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/plugins.js"></script>

<!--contact js-->
<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/mail-script.js"></script>
<script src="assets/js/sweetalert2.all.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/myalert.js"></script>

<script>
  var countDownDate = new Date("june 07, 2021 11:00:00").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("clock").innerHTML = '<div class="countdown_wrap d-flex"><div  class="single_countdown"><h3>' + days + '</h3><span>Days</span></div><div class="single_countdown"><h3>' + hours + '</h3><span>Hours</span></div><div class="single_countdown"><h3>' + minutes + '</h3><span>Minutes</span></div><div class="single_countdown"><h3>' + seconds + '</h3><span>Seconds</span></div></div>';

      // If the count down is over, write some text 
      if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
      }
  }, 1000);

  // $('#clock').countdown('2020/01/07', function (event) {
  //     $(this).html(event.strftime(
  //         '<div class="countdown_wrap d-flex"><div  class="single_countdown"><h3>%D</h3><span>Days</span></div><div class="single_countdown"><h3>%H</h3><span>Hours</span></div><div class="single_countdown"><h3>%M</h3><span>Minutes</span></div><div class="single_countdown"><h3>%S</h3><span>Seconds</span></div></div>'
  //     ));
  // });
</script>
<script>
  function initMap() {
      var uluru = {
          lat: -25.363,
          lng: 131.044
      };
      var grayStyles = [{
              featureType: "all",
              stylers: [{
                      saturation: -90
                  },
                  {
                      lightness: 50
                  }
              ]
          },
          {
              elementType: 'labels.text.fill',
              stylers: [{
                  color: '#ccdee9'
              }]
          }
      ];
      var map = new google.maps.Map(document.getElementById('map'), {
          center: {
              lat: -31.197,
              lng: 150.744
          },
          zoom: 9,
          styles: grayStyles,
          scrollwheel: false
      });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
</script>


<script>
  const custom_swal = $('.custom_swal').data('custom_swal');

  if (custom_swal) {
      Swal.fire({
          title: '',
          text: custom_swal,
          type: 'success',
          toast: true,
          position: 'center',
          showConfirmButton: false,
          timer: 3000
      })
  }


  $(window).load(function() {
      $("#my_audio").trigger('load');
      $("#my_audio").trigger('play');
  });
 function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1);
  var sURLVariables = sPageURL.split('%20'); 
  var sParameterName;
  var i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
      console.log(sParameterName);
      var nama = document.getElementById('namaTamu');
      nama.innerHTML+=sParameterName+' ';
  }
};
getUrlParameter()

</script> 
{{-- <script>
  document.onkeydown=function(e)
  {
      if(event.keyCode == 123){
          return false;
      }
      if( e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
          return false;
      }
      if( e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
          return false;
      }
      if( e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
          return false;
      }
  }
</script> --}}


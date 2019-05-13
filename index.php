<?php 
session_start();

?>
<!doctype html>
<html lang="en">

<?php 
  include ('x-head.php')
?>
  <body>
 <?php 
 include('x-header.php');
 ?>

    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.theme.default.min.css">
<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/bg1.png" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>CvSU SAKA</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Buy crops today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
          <img src="img/bg2.png" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="container">
          <div class="carousel-caption">
             <h1>Farmer's Training Center  </h1>
              <h1>and  </h1>
              <h1>Technology Demonstration Farm</h1>
          </div>
        </div>
      </div>
      <div class="carousel-item">
          <img src="img/bg3.png" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>Goods and Croops</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="products" role="button">Browse Goods and Croops</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7" style="background-color: orange; border-radius: 55px 25px 55px 25px; ">
        <h2 class="featurette-heading text-white">Who we are</h2>
        <p class="lead text-white">Farmers Training Center and Technology Demonstration Farm (FTC-TDF) also known as SAKA-Sanayan sa Kakayahang Agrikultura is located inside Cavite State University (Main Campus) . In 1983, the SAKA started their project. They grow multiple variety of more than 30 types of goods and crops throughout their growing season which is year round. Their vegetables are enjoyed by many Indangeños because its regular buyer are the vendors and people of Indang. Now, this year the Farmers Training Center and Technology Demonstration Farm is ready to improve their system and technology to expand their potential market.</p>
      </div>
      <div class="col-md-5">
      
        <img src="img/q2.jpg"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
      </div>
    </div>
     <div class="owl-carousel owl-theme">
            <div class="item">
             <img src="img/q1.jpg">
            </div>
            <div class="item">
               <img src="img/q2.jpg">
            </div>
            <div class="item">
              <img src="img/q3.jpg">
            </div>
            <div class="item">
             <img src="img/q4.jpg">
            </div>
            <div class="item">
              <img src="img/q5.jpg">
            </div>
          </div>
    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2" style="background-color: green; border-radius: 25px 55px 25px 55px; ">
        <h2 class="featurette-heading text-white">Our Commitment. . .</h2>
        <p class="lead text-white">The Unversity Extension Services, through the Farmers Training Center and Technology Demonstration Farm, is commited "to help rural and urban dwellers and other clientele in acquiring new knowledge and skills in line with their interest and needs geared towards increasing income and consequently, improving their standard of living."</p>
      </div>
      <div class="col-md-5 order-md-1">
        <div class="col-md-12">
          <img src="img/cvsu.jpg"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
        </div>
        <div class="col-md-12">
          <h6 class="text-center">CAVITE STATE UNIVERSITY DON SEVERINO DELAS ALAS (MAIN) CAMPUS </h6>
         Indang, Cavite 4122
         <br>
          <strong>Official Website:</strong> <a href="www.cvsu.edu.ph"> www.cvsu.edu.ph</a>
        </div>
         
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7  order-md-2" >
        <h2 class="featurette-heading" style="margin-top: -55px;">Map</h2>
   
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247405.591740788!2d120.769277525186!3d14.328132787238776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd821014e92dfd%3A0x6845fb3c06ec30c8!2sCavite+State+University+Main+Campus!5e0!3m2!1sen!2sph!4v1557635065687!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

      </div>
      <div class="col-md-5  order-md-1">
       <ul class="list-group">
        <li class="list-group-item active">Contact Us</li>
        <li class="list-group-item">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-square" class="svg-inline--fa fa-envelope-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"  height="25px" width="25px"><path fill="currentColor" d="M400 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM178.117 262.104C87.429 196.287 88.353 196.121 64 177.167V152c0-13.255 10.745-24 24-24h272c13.255 0 24 10.745 24 24v25.167c-24.371 18.969-23.434 19.124-114.117 84.938-10.5 7.655-31.392 26.12-45.883 25.894-14.503.218-35.367-18.227-45.883-25.895zM384 217.775V360c0 13.255-10.745 24-24 24H88c-13.255 0-24-10.745-24-24V217.775c13.958 10.794 33.329 25.236 95.303 70.214 14.162 10.341 37.975 32.145 64.694 32.01 26.887.134 51.037-22.041 64.72-32.025 61.958-44.965 81.325-59.406 95.283-70.199z"></path></svg>
         FTCTDFcvsu@gmail.com </li>
        <li class="list-group-item">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="25px" width="25px"><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg>
           FTCTDF_cvsumain@facebook.com</li>
        <li class="list-group-item">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="mobile-alt" class="svg-inline--fa fa-mobile-alt fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  height="25px" width="25px"><path fill="currentColor" d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm112-108c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12V60c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v312z"></path></svg>
         09358127891 </li>
        <li class="list-group-item">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  height="25px" width="25px"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>
         464105050</li>
      </ul>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


  </div><!-- /.container -->

<!-- Modal -->
<div class="modal fade" id="modal_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modal_header">
        <h5 class="modal-title" id="ActionModalLabel">Shopping Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="cart_mbody">
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="checkout">Check out</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php 
include('x-footer.php');
?>
</main>
<?php 
include('x-script.php');
?>


    <script src="OwlCarousel/dist/owl.carousel.js"></script>
          <script>
 $(document).ready(function(){
  refreshTable();
});
function refreshTable(){
    $('#cart_mbody').load('load_shoppincart.php', function(){
       setTimeout(refreshTable, 5000);
    });
}

  $(document).on('click', '#checkout', function(){
    or_ID = $('#or_ID').val();

  if(confirm("Are you sure you want to checkout this items?"))
    {
      if ($('#or_ID').length) {
        $.ajax({
            type        :   'POST',
            url:"action-data.php",
            data        :   {action:"checkout",or_ID:or_ID},
            dataType    :   'json',
            complete     :   function(data) {
              alert(data.responseJSON.msg);
              if (data.responseJSON.success) {
                    window.location.assign("order?or_ID="+or_ID);
              }
          
            }
        });
      }
      else{
         alert('You must order first');
      }
      
    
    }
    else
    {
      return false; 
    }
      
  
});
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
          </script>
</body>
</html>

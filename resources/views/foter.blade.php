


<!---------------------------- Footer -------------------------------->

<br>
<br>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<footer class="page-footer font-small blue-grey lighten-5" style="background-color: #dee0e3;"  >

  <div style="background-color:#3e4145;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0" style="color:#ebecee;">
          <h5  style="font-family:'Courier New', Courier, monospace">Get connected with us on social networks!</h5>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
          <i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i>
           

         <!--Linkedin -->
         <a class="li-ic">
            <i class="fa fa-linkedin-in white-text mr-4"> </i>
          </a>

          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fa fa-twitter fa-3x"> </i>&nbsp;
          </a>

          <!--Linkedin -->
          <a class="social" href="#">
            <i class="fa fa-linkedin-in white-text mr-4"> </i>
          </a>

          <!-- Google +-->
          <a class="gplus-ic">
          <i class="fa fa-whatsapp fa-3x" aria-hidden="true"></i>&nbsp;
          </a>


          <!--Linkedin -->
          <a class="li-ic">
            <i class="fa fa-linkedin-in white-text mr-4"> </i>
          </a>


          <!--Instagram-->
          <a>
          <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5"  >

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-4 col-xl-3 mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Elpitiya Electronic</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Brand new and High Quality Items. You can choose what you need. </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold" >Categories</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
       <p>
       <?php $cats =DB::table('categories')->get(); ?>
        @foreach($cats as $cat)
          <a class="dropdown-item" href="{{url('category',$cat->id)}}">{{ucwords($cat->title)}}</a>
         @endforeach
       
       </p>
        
        
        
        
        
        

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
     
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact Us</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></i>&nbsp; Main Street, Elpitiya, Srilanka.</p>
        

        <p>
        <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>&nbsp; info@elpitiyaelectronic.com</p>


        <p>
        <i class="fa fa-phone fa-2x" aria-hidden="true"></i>&nbsp; + 94 234 567 888</p>


        <p>
        <i class="fa fa-fax fa-2x" aria-hidden="true"></i>&nbsp; + 94 234 567 898</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3"  style="background-color: #a6adb5;">© 2020 Copyright:
    <a class="dark-grey-text" href="#"> ElectronicShop.com</a>
  </div>
  <!-- Copyright -->

</footer>


<!---------------------------- Footer -------------------------------->
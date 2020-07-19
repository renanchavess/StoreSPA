<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Vue + Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>
    <body>

        @yield('content')

        <script src="https://kit.fontawesome.com/eb120e7855.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    </body>
    <!-- Footer -->
<footer class="page-footer bg-gradient">

    <!-- Footer Elements -->
    <div class="container">
  
      <!-- Grid row-->
      <div class="row justify-content-center">  
        <!-- Grid column -->
        <div class="col-12 py-5">
            <div class="my-5 text-center">
                <!-- Facebook -->
                <a class="fb-ic">
                    <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic">
                    <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <!-- Google +-->
                <a class="gplus-ic">
                    <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <!--Linkedin -->
                <a class="li-ic">
                    <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic">
                    <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <!--Pinterest-->
                <a class="pin-ic">
                    <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
                </a>
            </div>
        </div>
        <!-- Grid column -->  
      </div>
      <!-- Grid row-->
  
    </div>
    <!-- Footer Elements -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://renanchaves.com/"> renanchaves.com</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
</html>

 <?php
    session_start();
 ?>   
    <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>  
        .carousel-item{
            height:auto!important;
            width:405px!important;
        }
      </style>
    </head>
    <body>
        
        <header>
            <div class = "parallax-container">
                <nav class = "transparent  z-depth-0">
                    <div class ="nav-wrapper container">
                        <a href = "#" class = "brand-logo">Logo</a>
                        <ul id = "nav-mobile" class = "right  hide-on-med-and-down">
                            <li><a href = "#">Link 1</a></li>
                            <li><a href = "#">Link 2</a></li>
                            <li><a class = "waves-effect waves-light modal-trigger" href = "#login-modal">Login</a></li>
                        </ul>
                    </div>
                </nav>
                <div id="login-modal" class="modal">
                    <form action="/login.php" method="POST">
                        <div class="modal-content">
                            <h4>Login</h4>
                            <div class="input-field">
                                <input type="text" name = "username" id = "username">
                                <label for="text">Username: </label>
                            </div>
                            <div class="input-field">
                                <input type="password" name = "password" id = "password">
                                <label for="password">Password: </label>
                            </div>
                            <div>
                                <?php 
                                    if(isset($_SESSION['errors'])){
                                        echo $_SESSION['errors'];
                                        unset($_SESSION['errors']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type = "submit" class = "modal-action modal-close waves-effect waves-green btn-flat">Login</button>
                        </div>
                    </form>
                </div>
                <div class ="container">
                    <div class="row center">
                        <h1 class = "header center white-text text-darken-1" id = "website_name"><b>Animal Haven Veterinary Clinic</b></h1>
                    </div>
                    <br>
                    <div class = "row center">
                        <a class ="waves-effect waves-lighten btn-large">Contact Us</a>
                    </div>
                </div>
                <div class = "parallax">
                    <img src = "/images/doggos.jpg">
                </div>
            </div>
        </header>
        <main style="padding-top: 100px">
            <div class="container" style="margin-bottom: 100px">
                <div class="row">
                    <div class="col s4 center">
                        <i class="material-icons large">healing</i>
                        <h4 class="center">Professional Veterinarians</h4>
                        <p>
                            Some Promotional Text Here.
                        </p>
                    </div>
                    <div class="col s4 center">
                        <i class="material-icons large">pets</i>
                        <h4 class="center">Animal Lovers</h4>
                        <p>
                            Some Promotional Text Here.
                        </p>
                    </div>
                    <div class="col s4 center">
                        <i class="material-icons large">loyalty</i>
                        <h4 class="center">Customer Friendly</h4>
                        <p>
                            Some Promotional Text Here.
                        </p>
                    </div>                    
                </div>
            </div>
            <div class="parallax-container">
                <div class="parallax">
                    <img src="/images/dogs.jpg" alt="">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="carousel">
                            <a class="carousel-item" href="#one!"><img src="/images/cat1.jpg"></a>
                            <a class="carousel-item" href="#two!"><img src="/images/cat2.jpg"></a>
                            <a class="carousel-item" href="#three!"><img src="/images/cat3.jpg"></a>
                            <a class="carousel-item" href="#four!"><img src="/images/dog1.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>

        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/materialize.min.js"></script>
        <script>
            $(function(){
                $('.parallax').parallax();
                $('.carousel').carousel();
                $('.modal').modal();
            });
        </script>
    </body>
</html>
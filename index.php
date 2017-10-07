 <?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include("./shared/db_connect.php");
    $store_details = $conn->query("SELECT * FROM clinic_details")->fetch_assoc();
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
                        <a href = "#" class = "brand-logo">
                            <img src="/images/logo.png" alt="" width="auto" height="100px">
                        </a>
                        <ul id = "nav-mobile" class = "right  hide-on-med-and-down">
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
                        <a class ="waves-effect waves-lighten btn-large">
                            <i class="material-icons left">call</i><?=$store_details['contact_number']?><small></small>
                        </a>
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
                            Only the most professional veterinarians will take care of your beloved pets.
                        </p>
                    </div>
                    <div class="col s4 center">
                        <i class="material-icons large">pets</i>
                        <h4 class="center">Animal Lovers</h4>
                        <p>
                            Your pet's well being is our highest priority.
                        </p>
                    </div>
                    <div class="col s4 center">
                        <i class="material-icons large">loyalty</i>
                        <h4 class="center">Customer Friendly</h4>
                        <p>
                            We don't just take care of our patients but also their owners.
                        </p>
                    </div>                    
                </div>
            </div>
            <div class="container" style="margin-bottom: 100px">
                <div class="row center">
                    <h4>Top Services</h4>
                </div>
                <div class="row">
                    <div class="col m4">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Grooming</span>
                                <p>Good grooming is about more than just having a pretty pet. You're also tackling potential health conditions, says Bernadine Cruz, DVM, a veterinarian at Laguna Hills Animal Hospital in Laguna Hills, Calif. Here's how to care for your pet before any problems crop up.
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="#"></a>
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Surgery</span>
                                <p>
                                    No pet owner likes the idea of a beloved animal having to undergo surgery, but it helps to know that your pet is in skilled, caring, compassionate hands. 
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="#"></a>
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Vaccination</span>
                                <p>
                                    Vaccines help prevent many illnesses that affect pets. Vaccinating your pet has long been considered one of the easiest ways to help him live a long, healthy life. Not only are there different vaccines for different diseases, there are different types and combinations of vaccines. Vaccination is a procedure that has risks and benefits that must be weighed for every pet relative to his lifestyle and health. 
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="#"></a>
                                <a href="#"></a>
                            </div>
                        </div>
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
                <h5 class="white-text"></h5>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright <b>Animal Haven Veterinary Clinic</b>
            <a class="grey-text text-lighten-4 right" href="#!"><i class="material-icons left">call</i>
                <?=$store_details['contact_number']?><small></small></a>
            <a class="grey-text text-lighten-4 right" href="#!"><i class="material-icons left">home</i>
                <?=$store_details['address']?><small></small></a>
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
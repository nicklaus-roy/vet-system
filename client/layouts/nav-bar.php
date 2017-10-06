<div >     
    <nav>
        <div class="nav-wrapper" style="background-color: rgb(224, 177, 67)">
            <a href="/client/reservations/index.php" class="brand-logo" style="padding-left: 10px">
                <img src="/images/logo.png" height = "70px" width = "auto" alt="">
                <p style="margin-top: -90px;font-size: 20px;margin-left: 100px">Animal Haven Veterinary Clinic</p>
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="<?=$_SESSION['reservations']?>"><a href="/client/reservations/index.php" class="black-text">
                    <i class="material-icons" style="font-size: 30px">event</i>
                </a></li>
<!--                 <li class=""><a href="/client/services/index.php" class="black-text">
                    <i class="material-icons" style="font-size: 30px">healing</i>
                </a></li>
                 -->                <li class=""><a href="/client/pets/index.php" class="black-text">
                    <i class="material-icons" style="font-size: 30px">pets</i>
                </a></li>

                <li class="">
                    <a class='dropdown-button black-text' 
                        data-beloworigin="true"
                        href='#' data-activates='dropdown1'>
                        <i class="material-icons" style="font-size: 31px">account_circle</i>
                    </a>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="/client/account/index.php">Account Settings</a></li>
                        <li><a href="/logout.php">Logout</a></li>
                      </ul>
                </li>

            </ul>
        </div>
    </nav>
</div>
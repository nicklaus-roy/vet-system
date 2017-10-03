<div >     
    <nav>
        <div class="nav-wrapper" style="background-color: rgb(224, 177, 67)">
            <a href="/admin/home.php" class="brand-logo" style="padding-left: 10px"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="<?=$_SESSION['reservations']?>"><a href="/admin/reservations/index.php" class="black-text">
                    <i class="material-icons" style="font-size: 30px">event</i>
                </a></li>
                <li class="<?=$_SESSION['sales']?>"><a href="/admin/sales/index.php" class="black-text">
                    <i class="material-icons" style="font-size: 30px">local_offer</i>
                </a></li>
                <li class=""><a href="/admin/inventory/index.php" class="black-text">
                    <i class="material-icons" style="font-size: 30px">layers</i>
                </a></li>
                <li class="<?=$_SESSION['delivery']?>"><a href="/admin/delivery/index.php" class="black-text">
                    <i class="material-icons" style="font-size: 30px">local_shipping</i>
                </a></li>
                <li class="">
                    <a class='dropdown-button black-text' 
                        data-beloworigin="true"
                        href='#' data-activates='dropdown1'>
                        <i class="material-icons" style="font-size: 31px">account_circle</i>
                    </a>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="/logout.php">logout</a></li>
                      </ul>
                </li>

            </ul>
        </div>
    </nav>
</div>
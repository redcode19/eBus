<?php
    require_once('header.php');
?>
<?php require_once('loader.php');?>
<div class="container" id="myDiv" style="display:none">
    <div class="row justify-content-md-center">
        <div class="col-xs-4"></div>
        <div class="col-md-auto">
            <div class="landing-page">
                 <img src="img/indicator.png" alt="" width="400" class=" img-fluid animated bounceInDown ">
                 <center><img src="img/shadow-indicator.png" width="150" alt="" class=" img-fluid animated fadeInDown ">
                 <br>   
                 <a href="checkplace.php" id='geolocate' class=" btn btn-warning btn-block animated bounceIn">Find Me !</a></center>
            </div>
            <div class="bottom-city">
                <img src="img/city-grey.png" style="position:fixed; bottom:0;" class=" img-fluid animated fadeInUp " alt="">
                <img src="img/city-dark.png" style="position:fixed; bottom:0;" class=" img-fluid animated fadeInUp " alt="">
            </div>
        </div>
        <div class="col-xs-4"></div>        
        </div>
    </div>
</div>
<?php

    require_once('footer.php');
?>
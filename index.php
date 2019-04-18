
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    
<?php include("includes/navigation.php"); ?>

<style type="text/css">
   
    .row {
    margin-right: 15px;
    margin-left: 15px;
}

.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

::-webkit-scrollbar {
    display: none;
}

</style>

<div style="margin-top: -20px;">

         <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="images/slide1.jpg" style="height: 615px; width: 100%" alt="First slide">
        </div>
        <div class="item">
          <img class="second-slide" src="images/slide2.jpg" style="height: 615px; width: 100%" alt="Second slide">
        </div>
        <div class="item">
          <img class="third-slide" src="images/slide3.jpg" style="height: 615px; width: 100%" alt="Third slide">
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    </div>
    
   <?php include("includes/footer.php"); ?>     
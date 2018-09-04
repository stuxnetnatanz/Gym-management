<?php
    require('includes/header.php');
    $status = $_GET['login'];
    if($status == "success") {
        echo'
        <div class="alert alert-success">
          <strong>Success!</strong> Logged in sucessfully
        </div>
        ';
    }
    else {
        $status = $_GET['logout'];
        if($status == "success") {
            echo'
            <div class="alert alert-success">
              <strong>Success!</strong> Logged out sucessfully
            </div>
            ';
        }
    }
?>

<div class = "container" style = "width: 100%; height: 50%;">
    <div id = "myCarousel" class = "carousel slide" data-ride = "carousel">
        <!-- Indicators -->
        <ol class = "carousel-indicators">
            <li data-target = "#myCarousel" data-slide-to = "0" class = "active"></li>
            <li data-target = "#myCarousel" data-slide-to = "1"></li>
            <li data-target = "#myCarousel" data-slide-to = "2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class = "carousel-inner" style = "width: 100%; height: 100%;">
            <div class = "item active" >
                <img src = "/gym_management/assets/images/1.jpg" alt = "Los Angeles">
            </div>

            <div class = "item">
                <img src = "/gym_management/assets/images/2.jpg" alt = "Chicago">
            </div>

            <div class = "item">
                <img src = "/gym_management/assets/images/3.jpg" alt = "New york">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class = "left carousel-control" href = "#myCarousel" data-slide = "prev">
            <span class = "glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class = "right carousel-control" href = "#myCarousel" data-slide = "next">
            <span class = "glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>

<link rel = "stylesheet" type = "text/css" href = "/gym_management/assets/css/index.css">

<div class="content">
<h1>Fitness is Mentality</h1>
<p>Being healthy and fit in simple terms means taking good care of the body. We should remember that a healthy mind resides only in a healthy body. Good health of both mind and body helps one maintain the required energy level to achieve success in life. All of us must strive to achieve wholesome health.

Protecting your body from the intake of harmful substances, doing regular exercises, having proper food and sleep are some of the important instances that define a healthy lifestyle. Being fit allows us to perform our activities without being lethargic, restless or tired.

A healthy and fit person is capable of living the life to the fullest, without any major medical or physical issues. Being healthy is not only related to the physical well-being of a person, it also involves the mental stability or the internal peace of a person.
</p>
</div>

<div class="content">
<h1>How to stay healthy</h1>
<p>

Staying healthy physically can help you stay healthy emotionally too. If you're eating the right food and keeping fit, your body will be strong and help you to cope with stress and also fight illness.

Eating well and exercising often when you're a teenager will also help you stay in good health later in life.

Getting regular sleep is another really important way to stay healthy. Having late nights can leave you feeling tired the next day. It can be difficult, but try to have at least 8 hours sleep each night.

</p>
</div>

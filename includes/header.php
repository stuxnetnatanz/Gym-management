<html>
    <head>
        <title>Fitness Freak</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="/gym_management/assets/css/bootstrap.min.css"></link>
        <script src="/gym_management/assets/js/jquery.min.js"></script>
        <script src="/gym_management/assets/js/bootstrap.min.js"></script>
    </head>
    <body>

        <nav class = "navbar navbar-inverse">
            <div class = "container-fluid">
                <div class = "navbar-header">
                    <a class = "navbar-brand" id = "Company" href = "/gym_management/index.php">Fitness Freak</a>
                </div>
                <ul class = "nav navbar-nav">
                    <li id = "About"><a href = "/gym_management/about.php">About</a></li>
                    <li id = "Facilities"><a href = "/gym_management/facilities.php">Facilities</a></li>
                    <li id = "Trainers"><a href = "/gym_management/trainers.php">Our trainers</a></li>
                    <li id = "Achievements"><a href = "/gym_management/achievements.php">Achievements</a></li>
                    <li id = "Gallery"><a href = "/gym_management/gallery.php">Gallery</a></li>
                    <li id = "Contact"><a href = "/gym_management/contact.php">Contact</a></li>
                </ul>
                <ul class = "nav navbar-nav navbar-right">
                    <?php
                      session_start();
                      if(!isset($_SESSION['uid'])) {

                        echo '<li class = "dropdown"><a class = "dropdown-toggle" data-toggle = "dropdown"><span class = "glyphicon glyphicon-user"></span> Sign Up<span class = "caret"></span></a>
                          <ul class = "dropdown-menu" style = "text-align: center;">
                            <li><a href = "/gym_management/signup/signup_client.php">Join us</a></li>
                            <li><a href = "/gym_management/signup/signup_trainer.php">Join as trainer</a></li>
                          </ul>
                        </li>
                        ';
                        echo '
                        <li class = "dropdown"><a class = "dropdown-toggle" data-toggle = "dropdown"><span class = "glyphicon glyphicon-log-in"></span> Login<span class="caret"></span></a>
                          <ul class = "dropdown-menu" style = "text-align: center;">
                            <li><a href = "/gym_management/login/login.php">Customer</a></li>
                            <li><a href = "/gym_management/login/login.php">Trainer</a></li>
                            <li><a href = "/gym_management/login/login_admin.php">Admin</a></li>
                          </ul>
                        </li>
                        ';
                      }
                      else if($_SESSION['type'] == "client") {
                        echo '
                          <li class = "dropdown"><a class = "dropdown-toggle" data-toggle = "dropdown"><span class = "glyphicon glyphicon-user"></span> Account<span class="caret"></span></a>
                          <ul class = "dropdown-menu" style = "text-align: center;">
                            <li><a href = "/gym_management/client/edit_details.php">Edit details</a></li>
                          </ul>
                        </li>
                        ';
                        echo '
                        <li><a href = "/gym_management/logout/logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
                        ';
                      }
                      else if($_SESSION['type'] == "trainer") {
                        echo '
                          <li class = "dropdown"><a class = "dropdown-toggle" data-toggle = "dropdown"><span class = "glyphicon glyphicon-user"></span> Account<span class="caret"></span></a>
                          <ul class = "dropdown-menu" style = "text-align: center;">
                            <li><a href = "/gym_management/trainer/edit_details.php">Edit details</a></li>
                            <li><a href = "/gym_management/trainer/update_chart.php">Update diet chart</a></li>
                          </ul>
                        </li>
                        ';
                        echo '
                        <li><a href = "/gym_management/logout/logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
                        ';
                      }
                      else {
                        echo '
                          <li class = "dropdown"><a class = "dropdown-toggle" data-toggle = "dropdown"><span class = "glyphicon glyphicon-user"></span> Account<span class="caret"></span></a>
                          <ul class = "dropdown-menu" style = "text-align: center;">
                            <li><a href = "/gym_management/admin/edit_details.php">Update password/key</a></li>
                            <li><a href = "/gym_management/admin/add_admin.php">Add new admin</a></li>
                            <li><a href = "/gym_management/admin/assign_trainer.php">Assign trainer</a></li>
                            <li><a href = "/gym_management/admin/change_trainer_type.php">Change trainer type</a></li>
                            <li><a href = "/gym_management/admin/remove_member.php">Remove member</a></li>
                          </ul>
                        </li>
                        ';
                        echo '
                        <li><a href = "/gym_management/logout/logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
                        ';
                      }
                    ?>
                </ul>
            </div>
        </nav>
    </body>
</html>

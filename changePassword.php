<!DOCTYPE html>
<html>

<head>
    <title>About DLegends - Furniture Company</title>
    <link rel="stylesheet" href="css/customerprofile.css">
</head>
<div class="colour">
    <header>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="https://use.typekit.net/maf1fpm.css">
        </a>
</div>
<section>
    <div class="topnav">
        <nav>
            <h1 class="logo">Furniche</h1>
            <ul>
                <li><a class="active" href="Main.html">Home</a></li>
                <li><a href="loginview.php">Login</a></li>
                <li><a href="contactview.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </nav>
    </div>
</section>
</header>
</div>

<body>
    <?php
    require("../../../TeamProject6/model/User.php"); ?>
    <section>
        <div class="profile">
            <img src="Thomas.jpg" alt="My Image" class="my_img">
            <div class="contact-col">
                <form method="post">
                    <?php
                    //$user= new User(null, null, null, null, null, null, null, null);
                    $user->getDetails();
                    echo '
                    <input type="firstname"name="firstname"placeholder="Mothers Maiden Name " value=' . $user->firstname . ' required/>
                    <br>
                    <input type="password"name="password"placeholder="New Password" value=' . $user->surname . ' required/>
                    <br>
                    <button type="submit" name="submitted" id="submit-btn">Change Password</button>
                </form>';
                    if (isset($_POST["submitted"])) {
                        //$user = new User(null, null, $_POST['email'], $_POST['firstname'], $_POST['surname'], $_POST['address'], $_POST['phone'], null);
                        include_once("controller/UpdateDetailsController.php");
                        //$controller = new UpdateDetailsController($user);
                        $controller->invoke();
                        //header('Location: update.php');
                    } ?>
            </div>
        </div>
    </section>
</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>About Us</h4>
                <ul>
                    <li><a href="#">Our Founder</a> </li>
                    <li><a href="#">Our Values</a> </li>
                    <li><a href="#">Our Privacy Policy</a> </li>
                    <li><a href="#">Our Services</a> </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Address</h4>
                <h5>206 Canada Place, Liverpool Street, E12 1CL</h5>
            </div>
            <div class="footer-col">
                <h4>Contact Us</h4>
                <h5>Email us at: comms@furniche.com</h5>
                <h5>Call us at: 01563385967</h5>
                <ul>
                    <li><a href="contactview.php">Contact Us via our Website</a> </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class="social-links">
                    <a href="https://en-gb.facebook.com/"><i class="fab fa-facebook - f"></i></a>
                    <a href="https://twitter.com/?lang=en"><i class="fab fa-twitter"></i></a>
                    <a href="https://uk.linkedin.com/"><i class="fab fa-linkedin - in"></i></a>
                    <a href="https://github.com/"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
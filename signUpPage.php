<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Design</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div class="container">

        <div class="image_box">
            <img src="signuppic.jpg" alt="Sign Up Image">
        </div>

        <div class="box">
            <h2>Sign up</h2>
            <form method="post">

                <div class="input_box">
                    <label>First Name<input type="text" name="firstname" required></label>
                </div>

                <div class="input_box">
                    <label>Surname<input type="text" name="surname" required></label>
                </div>

                <div class="input_box">
                    <label>Email<input type="text" name="email" required></label>
                </div>

                <div class="input_box">
                    <label>Username<input type="text" name="username" required></label>
                </div>

                <div class="input_box">
                    <label>Password<input type="password" name="password" required></label>
                </div>

                <div class="input_box">
                    <label>Confirm Password<input type="password" name="password2" required></label>
                </div>
                <script src="showPasswordScript.js"></script>
                <label class="checkbox"><input type="checkbox" name="passcbx" onclick="showPassword()">Show Password</label>

                <div class="link_box">
                    <div class="link">By creating an account you agree to <a href="#">Terms & Conditions</a></div>
                </div>

                <button class="login_button" name="submitted" type="submit">Login</button>
                <?php
                include("signUp.php");
                ?>

                <div class="link_box">
                    <div class="signup_link">Have an account? <a href="loginview.php">Login</a></div>
                    <div class="contact_link">Need Help? <a href="#">Contact Us</a></div>
                </div>

            </form>
        </div>

    </div>

</body>
</html>
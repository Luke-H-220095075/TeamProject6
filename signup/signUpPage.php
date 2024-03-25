<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniche - Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
    
    <div class="container">
<br>
        <div class="image_box">
            <img src="signuppic.jpg" alt="Sign Up Image">
        </div>

        <div class="box">
            <form method="post">

                <div class="input_box">
                    <input type="text" id="firstname" name="firstname" required>
                    <label for="firstname">First Name</label>
                </div>

                <div class="input_box">
                    <input type="text" id="surname" name="surname" required>
                    <label for="surname">Surname</label>
                </div>

                <div class="input_box">
                    <input type="text" id="email" name="email" required>
                    <label for="email">Email</label>
                </div>

                <div class="input_box">
                    <input type="text" id="username" name="username" required>
                    <label for="username">Username</label>
                </div>

                <div class="input_box">
                    <input type="password" id="password" name="password" minlength="8" pattern="(?=.*?[#?!@$%^&*-\]\[]) oninvalid='setCustomValidity('Please use at least 8 characters and a special character')' required>
                    <label for="password">Password</label>
                </div>

                <div class="input_box">
                    <input type="password" id="password2" name="password2" required>
                    <label for="password2">Confirm Password</label>
                </div>
                <script src="showPasswordScript.js"></script>
                <label class="checkbox"><input type="checkbox" name="passcbx" onclick="showPassword()">Show Password</label>
                <div>Please enter your mother's maiden name. This is so we can recover your account if you forget your password</div>
                <div class="input_box">
                    <input type="password" id="sanswer" name="sanswer" required>
                    <label for="sanswer">Mother's maiden name</label></div>
                <div class="link_box">
                    <div class="link">By creating an account you agree to <a href="#">Terms & Conditions</a></div>
                </div>

                <button class="login_button" name="submitted" type="submit">Sign Up</button>
                <?php
                include("signUp.php");
                ?>

                <div class="link_box">
                    <div class="signup_link">Have an account? <a href="../loginview.php">Login</a></div>
                    <div class="contact_link">Need Help? <a href="../contactview.php">Contact Us</a></div>
                </div>

            </form>
        </div>
<br>
    </div>

</body>
</html>
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
            <img src="signuppic.jpg">
        </div>

        <div class="box">
            <h2>Sign up</h2>
            <form method="post">

                <div class="input_box">
                    <input type="text" name="firstname" required>
                    <label>First name</label>
                </div>

                <div class="input_box">
                    <input type="text" name="surname" required>
                    <label>Surname</label>
                </div>

                <div class="input_box">
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input_box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>

                <div class="input_box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>

                <div class="input_box">
                    <input type="password" name="password2" required>
                    <label>Confirm Password</label>
                </div>
                <script src="showPasswordScript.js"></script>
                <label class="checkbox"><input type="checkbox" name="passcbx" onclick="showPassword()"><p>Show Password</p></label>

                <div class="input_box">
                    <input type="password" name="sanswer" required>
                    <label>Please enter your mother's maiden name. This is so we can recover your account if you forget your password.</label>
                </div>
                <div class="link_box">
                    <div class="link">By creating an account you agree to <a href="#">Terms & Conditions</a></div>
                </div>

                <button class="login_button" name="submitted" type="submit">Login</button>
                <?php
                include("signUp.php");
                ?>

                <div class="link_box">
                    <div class="signup_link">Have an account? <a href="C:\Users\Osaze\Downloads\Furniche -use\Furniche\loginp.html">Login</a></div>
                    <div class="contact_link">Need Help? <a href="#">Contact Us</a></div>
                </div>

            </form>
        </div>

    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniche - Log In</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div class="container">

        <div class="image_box">
            <img src="Pictures%20for%20website/loginpic.jpg" alt="Log In Image">
        </div>

        <div class="box">
            <h2>Log In</h2>
            <form method="post">

                <div class="input_box">
                    <input type="text" id="username" name="username" required>
                    <label for="username">Username</label>
                </div>

                <div class="input_box">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <script src="showPasswordScript.js"></script>
                <label class="checkbox"><input type="checkbox" name="passcbx" onclick="showPassword()">Show Password</label>

                <div class="forgot_password_box">
                    <div class="forgot_password"><a href="#">Forgot Password?</a></div>
                </div>

                <div class="link_box">
                    <div class="link">By creating an account you agree to <a href="#">Terms & Conditions</a></div>
                </div>

                <button class="login_button" name="submitted" type="submit">Log In</button>
                <?php
                session_start();
                include("signIn.php");
                ?>

                <div class="link_box">
                    <div class="signup_link">Don't have an account? <a href="signUpPage.php">Sign Up</a></div>
                    <div class="contact_link">Need Help? <a href="contact.php">Contact Us</a></div>
                </div>

            </form>
        </div>

    </div>

</body>
</html>
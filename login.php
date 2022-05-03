<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Account.php");
    require_once("includes/classes/Constants.php");

    $account = new Account($con);

    if(isset($_POST["signUpButton"]))
    {
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $success = $account->register($firstName, $lastName, $username, $email, $email, $password, $password2);

        if($success)
        {
            $_SESSION['userLoggedIn'] = $username;
            session_start();
            header("Location: index.php");
        }
    }

    if(isset($_POST["signInButton"]))
    {
        if(isset($_POST["remember"]))
        {
            $_SESSION.session_set_cookie_params(3600);
        }
        else
        {
            $_SESSION.session_set_cookie_params(0);
        }
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $success = $account->login($username, $password);

        if($success)
        {
            $_SESSION["userLoggedIn"] = $username;
            session_start();
            header("Location: index.php");
        }
    }

    function getInputValue($name)
    {
        if(isset($_POST[$name]))
        {
            echo $_POST[$name];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to My Streaming Website</title>
        <link rel="stylesheet" type="text/css" href="assets/style/form.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body onload="setActive();">
        <div class="wrapper">
            <!-- Sign Up -->
            <div class="wrapper__form wrapper--signup">
                <form method="POST" class="form_class" id="form1">
                    <h2 class="form__title">Sign Up</h2>

                    <span><?php echo $account->getError(Constants::$firstNameCharacters); ?></span>
                    <input type="text" name="firstName" placeholder="First Name" class="input" required>

                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <input type="text" name="lastName" placeholder="Last Name" class="input" required>

                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <input type="text" name="username" placeholder="Username" class="input" required>

                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <input type="email" name="email" placeholder="Email" class="input" required>

                    <?php echo $account->getError(Constants::$passwordLength); ?>
                    <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                    <input type="password" name="password" placeholder="Password" class="input" required>
                    <input type="password" name="password2" placeholder="Confirm Password" class="input" required>

                    <input type="submit" name="signUpButton" class="button_class" value="Sign Up">
                </form>
            </div>

        <!-- Sign In -->
        <div class="wrapper__form wrapper--signin">
            <form method="POST" class="form_class" id="form2">
                <h2 class="form__title">Sign In</h2>
                
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <input type="text" name="username" placeholder="Username" class="input" value="<?php getInputValue("username")?>" required>
                <input type="password" name="password" placeholder="Password" class="input" required>
                <div>
                    <span>Remember Me</span>
                    <input type="checkbox" name="remember" class="form-check-input">
                </div>
                <input type="submit" class="button_class" name="signInButton" value="Sign In">
            </form>
        </div>

        <!-- Overlay -->
        <div class="wrapper__overlay">
            <div class="overlay">
                    <div class="overlay__panel overlay--left">
                        <button class="button_class" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay__panel overlay--right">
                        <button class="button_class" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const signInbutton_class = document.getElementById("signIn");
            const signUpbutton_class = document.getElementById("signUp");
            const fistForm = document.getElementById("form1");
            const secondForm = document.getElementById("form2");
            const wrapper = document.querySelector(".wrapper");

            signInbutton_class.addEventListener("click", () => {
            wrapper.classList.remove("right-panel-active");
            localStorage.setItem("active", "false");
            });

            signUpbutton_class.addEventListener("click", () => {
            wrapper.classList.add("right-panel-active");
            localStorage.setItem("active", "true");
            });

            function setActive()
            {
                if(localStorage.getItem("active")=="true")
                {
                    wrapper.classList.add("right-panel-active");
                }
            }
        </script>
    </body>
</html>
<?php
require_once("includes/header.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");

$user = new User($con, $userLoggedIn);

$detailsMessage = "";
$passwordMessage = "";
$subscriptionMessage = "";

if(isset($_POST["saveDetailsButton"]))
{
    $account = new Account($con);

    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);

    if($account->updateDetails($firstName, $lastName, $email, $userLoggedIn))
    {
        $detailsMessage = "<div class='alertSuccess'>
                               Details updated successfully
                           </div>";
    }
    else{
        $errorMessage = $account->getFirstError();

        $detailsMessage = "<div class='alertError'>
                               $errorMessage
                           </div>";
    }
}

if(isset($_POST["savePasswordButton"]))
{
    $account = new Account($con);

    $oldPassword = FormSanitizer::sanitizeFormPassword($_POST["oldPassword"]);
    $newPassword = FormSanitizer::sanitizeFormPassword($_POST["newPassword"]);
    $newPassword2 = FormSanitizer::sanitizeFormPassword($_POST["newPassword2"]);

    if($account->updatePassword($oldPassword, $newPassword, $newPassword2, $userLoggedIn))
    {
        $passwordMessage = "<div class='alertSuccess'>
                               Password updated successfully
                           </div>";
    }
    else{
        $errorMessage = $account->getFirstError();

        $passwordMessage = "<div class='alertError'>
                               $errorMessage
                           </div>";
    }
}
?>

<script>
    function toggleInvoice(){
        invoice = document.querySelector('.invoiceDisplay');
        invoice.classList.toggle('active');
    }
</script>

<div class='wrapper2'>
<div class="settingsContainer column">
    <div class="formSection">
        <form method="POST">
            <h2>User details</h2>

            <?php
            $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : $user->getFirstName();
            $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : $user->getLastName();
            $email = isset($_POST["email"]) ? $_POST["email"] : $user->getEmail();

            ?>

            <input type="text" name="firstName" placeholder="First Name" value="<?php echo $firstName; ?>">
            <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $lastName; ?>">
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">

            <div class="message">
                <?php echo $detailsMessage; ?>
            </div>

            <input type="submit" name="saveDetailsButton" value="Save">
        </form>

        <form method="POST" style="padding-left: 100px">
            <h2>Update password</h2>
            <input type="password" name="oldPassword" placeholder="Old password">
            <input type="password" name="newPassword" placeholder="New password">
            <input type="password" name="newPassword2" placeholder="Confirm new password">

            <div class="message">
                <?php echo $passwordMessage; ?>
            </div>

            <input type="submit" name="savePasswordButton" value="Save">
        </form>
    </div>

    <div class="formSection2">
        <h2>Subscription</h2>

        <div class="message">
            <?php echo $subscriptionMessage; ?>
        </div>

        <?php
            if($user->getIsSubscribed())
            {
                echo "<h3>Your subscription is active!</h3><br><h4 class='invoice' onclick='toggleInvoice();'>Show Invoice</h4><br><a href='profile.php?subscribe=true'>Change Plan</a>";
                if($_GET["subscribe"]=="true")
                {
                    header("Location: subscribe.php"); 
                }
                if($_GET["subscribe"]=="subscribe")
                {
                    $user->setIsSubscribed(1,(int)$_GET["tier"]);
                    header("Location: profile.php?subscribe=false");
                }
            }
            else
            {
                $_GET["subscribe"]=="false";
                echo "<a href='profile.php?subscribe=true'>Subscribe to My Streaming Website</a>";
                if($_GET["subscribe"]=="true")
                {
                    header("Location: subscribe.php"); 
                }
                if($_GET["subscribe"]=="subscribe")
                {
                    $user->setIsSubscribed(1,(int)$_GET["tier"]);
                    header("Location: profile.php?subscribe=false"); 
                }
            }
        ?>
    </div>
</div>
</div>
<div class='invoiceDisplay' onclick='toggleInvoice();'>
    <div class='invoiceTitle'>
            <h2>
                Subscription Invoice
            </h2>
    </div>
    <div class='invoiceDetails'>
        <h3>Subscription Tier: </h3>
        <span><?php 
            switch((int)$user->getSubscriptionTier())
            {
                case 1: echo "Rs. 800 Tier"; break;
                case 2: echo "Rs. 500 Tier"; break;
                case 3: echo "Rs. 200 Tier"; break;
                default: echo "Tier retrieval error! Try later!";
            }
        ?></span>
    </div>
    <div class='invoiceDetails'>
        <h3>Renewal Date: </h3>
        <span><?php echo date('d-m-Y', strtotime($user->getSubscriptionDate(). '+ 1 year')); ?></span>
    </div>
    <div class='invoiceDetails'>
        <h3>Plan Benefits: </h3>
        <span><?php 
            switch((int)$user->getSubscriptionTier())
            {
                case 1: echo "4K Streaming, Upto 4 Devices, Mobile, TV & Desktop"; break;
                case 2: echo "1080p Streaming, Upto 2 Devices, Mobile, TV & Desktop"; break;
                case 3: echo "480p Streaming, Upto 1 Device, Mobile Only"; break;
                default: echo "Tier retrieval error! Try later!";
            }
        ?></span>
    </div>
</div>
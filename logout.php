<?php
    $_SESSION.session_set_cookie_params(-10);
    session_start();
    session_destroy();
    header("Location: login.php");
<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.png" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="assets/js/datatables.min.css">
    <link rel="stylesheet" href="assets/css/uikit.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
    <script src="assets/js/jquery-3.4.1.js"></script>
    <script src="assets/js/datatables.min.js"></script>
</head>
<body uk-parallax="bgy: -200">
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
    <nav class="uk-navbar-container uk-navbar-black uk-margin uk-dark navBarWhite" uk-navbar>
        <div class="uk-navbar-center">

            <div class="uk-navbar-center-left">
                <div>
                    <ul class="uk-navbar-nav">
                        <?php
                        if (isset($_SESSION["uid"])) {
                            ?>
                            <li>
                                <a href="#"><?php
                                    if ($_SESSION["urol"] == "A")
                                        echo "ADMIN";
                                    else
                                        echo "USER";
                                    ?></a>
                                <div class="uk-navbar-dropdown">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <?php
                                        if ($_SESSION["urol"] == "U") {
                                            ?>
                                            <li><a href="profile.php">PROFILE</a></li>
                                            <li><a href="quiz.php">QUIZ</a></li>
                                            <?php
                                        } else if ($_SESSION["urol"] == "A") {
                                            ?>
                                            <li><a href="admcat.php">ADD CATEGORY</a></li>
                                            <li><a href="admques.php">ADD QUESTION</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li><a href="login.php">LOGIN</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            if (isset($_SESSION["urol"])) {
                ?>
                <a class="uk-navbar-item uk-logo" href="leaderboard.php">QUIZ/TIME</a>
                <?php
            } else {
                ?>
                <a class="uk-navbar-item uk-logo" href="index.php">QUIZ/TIME</a>
                <?php
            }
            ?>
            <div class="uk-navbar-center-right">
                <div>
                    <ul class="uk-navbar-nav">
                        <?php
                        if (isset($_SESSION["uid"])) {
                            ?>
                            <li><a href="logout.php">LOGOUT</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="register.php">REGISTER</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</div>
<?php
    $title="Quiz/Time - Index";
?>
<?php include_once "includes/header.php";
if(isset($_SESSION["uid"],$_SESSION["sid"])){
    header("Location:quiz.php");
}
?>
<div class="uk-child-width-auto@l uk-text-center" uk-grid>
    <div class="uk-position-large uk-position-center">
        <div class="uk-card-large uk-card-default uk-card-hover uk-card-body">
            <h3 class="uk-card-title">Welcome to Quiz/Time</h3>
            <p class="uk-margin">
                <a href="register.php" class="uk-button uk-button-default">REGISTER</a>
                <a href="login.php" class="uk-button uk-button-secondary">LOGIN</a>
            </p>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php";?>
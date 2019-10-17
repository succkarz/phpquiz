<?php
$title = "Quiz/Time - Login";
include_once "includes/db.php";
include_once "includes/header.php";
if(isset($_SESSION["uid"],$_SESSION["sid"])){
    if($_SESSION["urol"]=="U")
        header("Location:quiz.php");
    else
        header("Location:admcat.php");
}
if (isset($_POST["reg"])) {
    $error = false;
    $db = new db;
    $link = $db->dbconnect();
    $unameml = filter_input(INPUT_POST, "txteml");
    $upwd = filter_input(INPUT_POST, "txtpwd");
    if (!$error) {

        $res = mysqli_query($link, "select uid,upwd,urol from tbuser where ueml='$unameml' or unam='$unameml';");
        if (mysqli_num_rows($res) > 0) {
            $r = mysqli_fetch_row($res);
            if ($upwd == $r[1]) {
                $_SESSION["uid"] = $r[0];
                $_SESSION["urol"]=$r[2];
                $_SESSION["sid"] = session_create_id();
                if ($r[2] == "A")
                    header("Location:admcat.php");
                else
                    header("Location:quiz.php");
            }
        } else {
            $msg = "USERNAME/PASSWORD INCORRECT";
        }
    } else {
        $msg = "FAILED TO LOGIN, TRY AGAIN";
    }

}
?>
    <div class="uk-card uk-card-default uk-card-hover  uk-card-body uk-width-1-4@m uk-width-1-2@s uk-align-center">
        <form method="post" enctype="multipart/form-data">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">LOGIN</legend>

                <div class="uk-margin">
                    <input class="uk-input" name="txteml" type="text" placeholder="Email or Username" required>
                </div>

                <div class="uk-margin">
                    <input class="uk-input" name="txtpwd" type="password" placeholder="Password" required>
                </div>
                <div class="uk-align-center uk-text-center">
                    <button type="submit" name="reg" class="uk-button uk-button-primary">LOGIN</button>
                </div>
                <?php if (isset($msg)) {
                    echo '<div class="uk-margin uk-text-center">';
                    echo '<p class="uk-text-capitalize uk-text-danger">';
                    echo $msg;
                    echo "</p>";
                    echo "</div>";
                } ?>
            </fieldset>
        </form>
    </div>

<?php include_once "includes/footer.php"; ?>
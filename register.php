<?php
include_once "includes/db.php";
if (isset($_POST["reg"])) {
    $error = false;
    $db = new db;
    $link = $db->dbconnect();
    $unam = filter_input(INPUT_POST, "txtnam");
    if (!filter_input(INPUT_POST, "txteml", FILTER_VALIDATE_EMAIL)) {
        $error = true;
    }
    $ueml = filter_input(INPUT_POST, "txteml", FILTER_VALIDATE_EMAIL);
    $upwd = filter_input(INPUT_POST, "txtpwd");
    $ubio = filter_input(INPUT_POST, "txtbio");
    $ugen = filter_input(INPUT_POST, "rgen");
    if (!empty(["file"]["name"])) {
        $upic = $_FILES["file"]["name"];
        $ext = pathinfo($upic, PATHINFO_EXTENSION);
    } else {
        $upic = "default.jpg";
        $ext = "jpg";
    }
    if (!$error) {
        $res = mysqli_query($link, "insert into tbuser values(null,'$unam','$ueml','$upwd','$ubio','$ugen',null,default,default)") or mysqli_error($link);
        if (mysqli_affected_rows($link) > 0) {
            $msglbl = "REGISTERED! <a href='login.php'>Login now</a>";
            $msg=<<<EOT
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Successful Registered!</p>
</div>
EOT;

            $id = mysqli_insert_id($link);
            mysqli_query($link, "update tbuser set upic='$id.$ext' where uid=$id;");
            move_uploaded_file($_FILES["file"]["tmp_name"], "userpics/" . $id . '.' . $ext);
        } else {
            $msg = <<<EOT
<div class="uk-alert-warning" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Failed to Register!</p>
</div>`;
EOT;
        }
    } else {
        $msg = <<<EOT
<div class="uk-alert-warning" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Failed to register!</p>
</div>;
EOT;
    }

}
$title = "Quiz/Time - Register";
?>
<?php include_once "includes/header.php";
if (isset($_SESSION["uid"], $_SESSION["sid"])) {
    if ($_SESSION["urol"] == "U")
        header("Location:quiz.php");
    else
        header("Location:admcat.php");
}
?>
    <div class="uk-card uk-card-default uk-card-hover  uk-card-body uk-width-1-2@m uk-align-center">
        <?php
        if(isset($msg)) echo $msg;
        ?>
        <form method="post" enctype="multipart/form-data">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">REGISTER</legend>

                <div class="uk-margin">
                    <input class="uk-input" name="txtnam" type="text" placeholder="Username" required>
                </div>

                <div class="uk-margin">
                    <input class="uk-input" name="txteml" type="email" placeholder="Email" required>
                </div>

                <div class="uk-margin">
                    <input class="uk-input" name="txtpwd" type="password" placeholder="Password" required>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="txtpwdcon" type="password" placeholder="Confirm Password">
                </div>
                <div class="uk-margin">
                    <textarea class="uk-textarea" name="txtbio" rows="3" placeholder="About you" required></textarea>
                </div>

                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                    <label><input class="uk-radio" type="radio" value="M" name="rgen" checked> Male</label>
                    <label><input class="uk-radio" type="radio" value="F" name="rgen"> Female</label>
                </div>
                <div class="uk-margin uk-placeholder uk-align-center uk-text-center" uk-margin>
                    <div uk-form-custom="target: true">
                        <input type="file" name="file">
                        <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Profile Image"
                               disabled>
                    </div>
                </div>
                <div class="uk-align-center uk-text-center uk-margin-auto">
                    <button type="submit" name="reg" class="uk-button uk-button-primary">Register</button>
                </div>
                <?php if (isset($msg)) {
                    echo '<div class="uk-margin uk-text-center">';
                    echo '<p class="uk-text-bold uk-text-capitalize">';
                    echo $msg;
                    echo "</p>";
                    echo "</div>";
                } ?>
            </fieldset>
        </form>
    </div>

<?php include_once "includes/footer.php"; ?>
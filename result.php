<?php
$title = "Quiz/Time - Result";
include_once "includes/db.php";
include_once "includes/header.php";
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "U") {
    header("Location:login.php");
}
if (isset($_SESSION["qizid"]) && $_SESSION["qizid"] != "") {
    $error = false;
    $db = new db;
    $link = $db->dbconnect();
    $qizid = $_SESSION["qizid"];
    $score = 0;
    $qry = "select * from tbusrans where uaqizid='$qizid'";
    $res = mysqli_query($link, $qry);
    if (mysqli_num_rows($res) > 0) {
        while ($r = mysqli_fetch_row($res)) {
            $q = "select asts from tbans where aid=$r[2]";
            $r2 = mysqli_query($link, $q);
            if (mysqli_num_rows($r2) > 0) {
                $cc = mysqli_fetch_row($r2);
                if ($cc[0] == "T")
                    $score += 1;
            }
        }
        $uid = $_SESSION["uid"];
        $cid=filter_input(INPUT_GET,"id");
        $totques = $_SESSION["cqno"] - 1;
        $qry = "insert tbresult values(null,'$qizid',$uid,$score,$totques,$cid,default)";
        mysqli_query($link, $qry);
        unset($_SESSION["cqno"]);
        unset($_SESSION["qizid"]);
        unset($_SESSION["preqid"]);
    }
}
?>
    <div class="uk-width-1-1@l uk-width-1-2@m uk-width-1-2@s uk-align-center">
        <div class="uk-width-1-2@l uk-card uk-card-large uk-card-default uk-card-body uk-margin-auto uk-padding-large">
            <div class="uk-flex uk-flex-center uk-flex-wrap">
                <div class="uk-card uk-card-hover uk-card-body uk-margin-left uk-margin-small-top">
                    <h2>YOU SCORED <strong><?= $score; ?></strong> OUT OF <strong><?= $totques ?></strong></h2>
                    <br>
                    <a class="uk-text-center" href="quiz.php">Go for another one!</a>
                </div>
            </div>
        </div>
    </div>

<?php include_once "includes/footer.php"; ?>
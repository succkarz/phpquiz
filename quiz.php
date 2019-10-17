<?php
$title = "Quiz/Time - Category";
include_once "includes/db.php";
include_once "includes/header.php";
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "U") {
    header("Location:login.php");
}
if (isset($_SESSION['cqno'])) {
    if($_SESSION["cqno"]<6 && $_SESSION["cqno"]!=""){
        $db=new db;
        $link=$db->dbconnect();
        $qzid=$_SESSION["qizid"];
        mysqli_query($link,"delete from tbusrans where uaqizid='$qzid'");
    }
    try {
        unset($_SESSION["cqno"]);
    } catch (Exception $a) {
    }
    try {
        unset($_SESSION["qizid"]);
    } catch (Exception $a) {
    }
    try {
        unset($_SESSION["preqid"]);
    } catch (Exception $a) {
    }
}
?>
    <div class="uk-width-1-1@l uk-width-1-2@m uk-width-1-2@s uk-align-center">
        <div class="uk-flex uk-flex-center uk-flex-wrap">
            <?php
            $db = new db;
            $link = $db->dbconnect();
            $qry = "select cid,cnam from tbcat";
            $res = mysqli_query($link, $qry);
            while ($r = mysqli_fetch_row($res)) {
                ?>
                <a class="nodec" href="ques.php?id=<?= $r[0] ?>">
                    <div class="uk-card uk-card-large uk-card-default uk-card-body uk-margin-left uk-margin-small-top cardhover">
                        <?= $r[1] ?>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
<?php include_once "includes/footer.php"; ?>
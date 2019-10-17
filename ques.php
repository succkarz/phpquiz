<?php
$title = "Quiz/Time - Questions";
include_once "includes/db.php";
include_once "includes/header.php";
$error = false;
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "U") {
    header("Location:login.php");
}
if (isset($_SESSION["cqno"]))
    $_SESSION["cqno"] += 1;
else {
    $_SESSION["cqno"] = 1;
    if (isset($_SESSION["preqid"])) {
        unset($_SESSION["preqid"]);
    }
    $qizid = $_SESSION["uid"] . $_SESSION["sid"];
    $_SESSION["qizid"] = str_shuffle($qizid);
}
if ($_SESSION["cqno"] == 6) {
    header("Location:result.php?id=" . $_GET["id"]);
}
if (isset($_GET["id"], $_GET["qid"], $_GET["aid"])) {
    //FOR NOT DIRECTLY SAVING TO DATABASE THIS CAN BE APPLIED
//    $quesid = $_GET["qid"];
//    $ansid = $_GET["aid"];
//    $quizid = $_SESSION["qizid"];
//    $qno = $_SESSION["cqno"];
    //$_SESSION["answers"][] = ["quizid"=>$quizid,"qid" => $quesid, "aid" => $ansid, "qno" => $qno];
    $db = new db;
    $link = $db->dbconnect();
    $iqid = filter_input(INPUT_GET, "qid");
    $iaid = filter_input(INPUT_GET, "aid");
    $iauid = $_SESSION["uid"];
    $qizid = $_SESSION["qizid"];
    $qry = "insert tbusrans values(null,$iqid,$iaid,$iauid,'$qizid',default)";
    mysqli_query($link, $qry);
}
?>
    <div class="uk-width-1-1@l uk-width-1-2@m uk-width-1-2@s uk-align-center">
        <div class="uk-width-1-2@l uk-card uk-card-large uk-card-default uk-card-body uk-margin-auto uk-padding-large">
            <div class="uk-align-center uk-text-center">
                <?php
                $db = new db;
                $link = $db->dbconnect();
                $preqid = isset($_SESSION["preqid"]) ? $_SESSION["preqid"] : $_SESSION["preqid"] = 0;
                $id = filter_input(INPUT_GET, "id");
                $qry = "select * from tbque where qid not in($preqid) and qcatid=$id order by rand() asc limit 1 ";
                $res = mysqli_query($link, $qry);
                if (mysqli_num_rows($res) > 0) {
                    $r = mysqli_fetch_row($res);
                    echo "<h2>" . $_SESSION["cqno"] . '. ' . $r[1] . "</h2>";
                    $_SESSION["preqid"] .= ',' . $r[0];
                    $qid = $r[0];
                } else {
                    echo "<span>NO QUESTIONS FOUND</span><br>";
                    echo "<a href=\"quiz.php\">Go Back...</a>";
                    //unset($_SESSION["qizid"],$_SESSION["cqno"]);
                    $error = true;
                }
                ?>
            </div>
            <?php
            if ($error == false) {
                ?>
                <div class="uk-flex uk-flex-center uk-flex-wrap uk-align">
                    <?php
                    $qry = "select * from tbans where aqid=$qid order by rand();";
                    $res = mysqli_query($link, $qry);
                    while ($r = mysqli_fetch_row($res)) {
                        ?>
                        <a class="nodec"
                           href="ques.php?id=<?= urlencode($id) ?>&qid=<?= urlencode($r[1]) ?>&aid=<?= urlencode(($r[0])) ?>">
                            <div class="uk-card uk-card-hover uk-box-shadow-hover-xlargeb uk-card-body uk-margin-left uk-margin-small-top">
                                <?= $r[2] ?>
                            </div>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

<?php include_once "includes/footer.php"; ?>
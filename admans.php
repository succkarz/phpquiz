<?php
$title = "Quiz/Time - Add Answers";
include_once "includes/db.php";
include_once "includes/header.php";
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "A") {
    header("Location:login.php");
}
if (isset($_POST["btnadd"])) {
    var_dump($_POST);
    $answers=htmlspecialchars($_POST["txt"]);
    $rightans=(int) preg_replace('/[^0-9]/', '', filter_input(INPUT_POST,"radioans"));
    $aqid=filter_input(INPUT_POST,"h1");
    $db = new db;
    $link = $db->dbconnect();
    foreach($answers as $key=>$ans){
        if($key+1==$rightans){
            $qry="insert tbans values(null,$aqid,'$ans','T','".date('Y/m/d')."')";
        }else{
            $qry="insert tbans values(null,$aqid,'$ans','F','".date('Y/m/d')."')";
        }
        mysqli_query($link,$qry);
        header("Location:admques.php");
    }
}

?>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-width-1-2@m uk-width-1-2@s uk-align-center uk-margin-auto@s uk-margin-remove-bottom">
        <?php
        if (isset($_GET["qid"])) {
            ?>
            <form method="post" class="uk-width-auto" action="admans.php">
                <legend class="uk-legend">Answers</legend>
                <div class="uk-width-1-1@s">
                    <?php
                    $db = new db;
                    $link = $db->dbconnect();
                    $qry = "select * from tbque where qid=" . filter_input(INPUT_GET, "qid");
                    $res = mysqli_query($link, $qry);
                    $r = mysqli_fetch_row($res);
                    echo "<h2>$r[1]</h2>";
                    mysqli_free_result($res);
                    ?>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="txt[]"
                           type="text"
                           placeholder="Answer 1.." required>
                    RIGHT ANSWER OR NOT? <input class="uk-radio" value="txta1" name="radioans" type="radio">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="txt[]"
                           placeholder="Answer 2.." required>
                    RIGHT ANSWER OR NOT? <input class="uk-radio" value="txta2" name="radioans" type="radio">

                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="txt[]"
                           placeholder="Answer 3.." required>
                    RIGHT ANSWER OR NOT? <input class="uk-radio" value="txta3" name="radioans" type="radio">

                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="txt[]"
                           placeholder="Answer 4.." required>
                    RIGHT ANSWER OR NOT? <input class="uk-radio" value="txta4" name="radioans" type="radio">
                </div>
                <div class="uk-align-center uk-text-center">
                    <button type="submit" name="btnadd" class="uk-button-large uk-button-primary">ADD</button>
                    <input type="hidden" name="h1" value="<?=filter_input(INPUT_GET,"qid")?>"/>
                </div>
            </form>
            <?php
            $qid = filter_input(INPUT_GET, "qid");
            $qry = "SELECT atxt FROM `tbans` where aqid=$qid";
            $res = mysqli_query($link, $qry);
            if (mysqli_num_rows($res)) {
                ?>
                <table class="uk-table uk-table-divider uk-table-responsive uk-width-auto">
                    <caption>Answers</caption>
                    <tbody>
                    <tr>
                        <?php
                        $i = 1;
                        while ($r = mysqli_fetch_row($res)) {
                            ?>
                            <td><strong><?= $i ?>. <span class="uk-text-bolder"><?= $r[0] ?></span></strong></td>
                            <?php
                            $i++;
                        }
                        mysqli_free_result($res);
                        ?>
                    </tr>
                    </tbody>
                </table>
                <?php
            }
        } else {
            if (isset($msg)) {
                echo $msg;
            } else {
                echo "NOTHING HERE!";
            }
        }
        ?>
    </div>

<?php include_once "includes/footer.php"; ?>
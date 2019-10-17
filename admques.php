<?php
$title = "Quiz/Time - Add Question";
include_once "includes/db.php";
include_once "includes/header.php";
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "A") {
    header("Location:login.php");
}
if (isset($_POST["btnadd"])) {
    $db = new db;
    $link = $db->dbconnect();
    $cq = htmlspecialchars(filter_input(INPUT_POST, "txtqtit"));
    $cqid = filter_input(INPUT_POST, "txtcat");
    $qry = "insert tbque values(null,'$cq',$cqid,'" . date('Y/m/d') . "')";
    mysqli_query($link, $qry);
    header("Location: admans.php?qid=" . mysqli_insert_id($link));
}
if (isset($_POST["btnupd"])) {
    $db = new db;
    $link = $db->dbconnect();
    $cn = htmlspecialchars(filter_input(INPUT_POST, "txtqtit"));
    $qcid = filter_input(INPUT_POST, "txtcat");
    $ci = filter_input(INPUT_POST, "h1");
    $qry = "update tbque set qtit='$cn',qcatid=$qcid where qid=$ci";
    mysqli_query($link, $qry);
}
if (isset($_GET["m"]) && isset($_GET["qid"])) {
    $qid = filter_input(INPUT_GET, "qid");
    $mode = filter_input(INPUT_GET, "m");
    if ($mode == "E") {
        $db = new db;
        $link = $db->dbconnect();
        $qry = "select * from tbque where qid=$qid";
        $res = mysqli_query($link, $qry);
        $r = mysqli_fetch_row($res);
        $qnam = $r[1];
        $qidi = $r[0];
    }
    if ($mode == "D") {
        $db = new db;
        $link = $db->dbconnect();
        $id = filter_input(INPUT_GET, "qid");
        $qry = "delete from tbque where qid=$id";
        mysqli_query($link, $qry);
    }
}
?>
    <div class="uk-card uk-card-default uk-card-hover  uk-card-body uk-width-1-2@m uk-width-1-2@s uk-align-center uk-margin-auto@s uk-margin-remove-top uk-margin-remove-bottom">
        <form method="post" action="admques.php">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Question</legend>
                <div class="uk-margin">
                    <?php
                    $db = new db;
                    $link = $db->dbconnect();
                    $qry = "select * from tbcat";
                    $res = mysqli_query($link, $qry);
                    echo "<select name='txtcat' class='uk-select'>";
                    echo "<option value=-1>Select Category</option>";
                    while ($r = mysqli_fetch_row($res)) {
                        echo "<option value='$r[0]'>$r[1]</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="txtqtit" value="<?= isset($qnam) ? $qnam : null ?>" type="text"
                           placeholder="Question.." required>
                    <input type="hidden" name="h1" value="<?= isset($qidi) ? $qidi : null ?>"/>
                </div>
                <div class="uk-align-center uk-text-center">
                    <?php
                    if (!isset($_GET["m"])) {
                        ?>
                        <button type="submit" name="btnadd" class="uk-button uk-button-primary">ADD</button>
                        <?php
                    } else if (isset($_GET["m"]) && $_GET["m"] == "E") {
                        ?>
                        <button type="submit" name="btnupd" class="uk-button uk-button-primary">UPDATE
                        </button>
                        <?php
                    } else {
                        ?>
                        <button type="submit" name="btnadd" class="uk-button uk-button-primary">ADD</button>
                        <?php
                    }

                    ?>
                    <button type="submit" class="uk-button uk-button-primary">Clear</button>
                </div>
            </fieldset>
        </form>
        <?php
        $db = new db;
        $link = $db->dbconnect();
        $qry = "SELECT *,(select cnam from tbcat where cid=q.qcatid) FROM `tbque` q group by qtit order by qcatid";
        $res = mysqli_query($link, $qry);
        ?>
        <table id="dtBle" class="uk-table uk-table-hover uk-table-responsive">
            <caption>Quiz History</caption>
            <thead>
            <tr>
                <th>Category Name</th>
                <th>Ques Title</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Add Answers</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($r = mysqli_fetch_row($res)) {
                ?>
                <tr>
                    <td><strong><span class="uk-text-bolder"><?= $r[4] ?></span></strong></td>
                    <td><?= $r[1] ?></td>
                    <td><a href="admques.php?qid=<?= $r[0] ?>&m=E">Edit</a></td>
                    <td><a href="admques.php?qid=<?= $r[0] ?>&m=D">Delete</a></td>
                    <td><a href="admans.php?qid=<?= $r[0] ?>">Add Answers</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#dtBle').DataTable();
        });
    </script>
<?php include_once "includes/footer.php"; ?>
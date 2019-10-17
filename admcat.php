<?php
$title = "Quiz/Time - Category";
include_once "includes/db.php";
include_once "includes/header.php";
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "A") {
    header("Location:login.php");
}
if (isset($_POST["btnadd"])) {
    $db = new db;
    $link = $db->dbconnect();
    $cn = htmlspecialchars(filter_input(INPUT_POST,"txtcat"));
    $qry = "insert tbcat values(null,'$cn','A','" . date('Y/m/d') . "')";
    mysqli_query($link, $qry);
}
if (isset($_POST["btnupd"])) {
    $db = new db;
    $link = $db->dbconnect();
    $cn = htmlspecialchars(filter_input(INPUT_POST,"txtcat"));
    $ci = filter_input(INPUT_POST,"h1");
    $qry = "update tbcat set cnam='$cn' where cid=$ci";
    mysqli_query($link, $qry);
}
if (isset($_GET["m"]) && isset($_GET["cid"])) {
    $cid = filter_input(INPUT_GET, "cid");
    $mode = filter_input(INPUT_GET, "m");
    if ($mode == "E") {
        $db = new db;
        $link = $db->dbconnect();
        $qry = "select * from tbcat where cid=$cid";
        $res = mysqli_query($link, $qry);
        $r = mysqli_fetch_row($res);
        $cnam = $r[1];
        $cidi = $r[0];
    }
}
?>
    <div class="uk-card uk-card-default uk-card-hover  uk-card-body uk-width-1-2@m uk-width-1-2@s uk-align-center uk-margin-auto@s uk-margin-remove-top uk-margin-remove-bottom">
        <form method="post" action="admcat.php">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Category</legend>

                <div class="uk-margin">
                    <input class="uk-input" name="txtcat" value="<?= isset($cnam) ? $cnam : null ?>" type="text"
                           placeholder="Category name" required>
                    <input type="hidden" name="h1" value="<?=isset($cidi) ? $cidi : null ?>"/>
                </div>
                <div class="uk-align-center uk-text-center">
                    <?php
                    if (!isset($_GET["m"])) {
                        ?>
                        <button type="submit" name="btnadd" class="uk-button-large uk-button-primary">ADD</button>
                        <?php
                    } else if (isset($_GET["m"]) && $_GET["m"] == "E") {
                        ?>
                        <button type="submit" name="btnupd" class="uk-button-large uk-button-primary">UPDATE</button>
                        <?php
                    } else {
                        $db = new db;
                        $link = $db->dbconnect();
                        $id = filter_input(INPUT_GET, "cid");
                        $qry = "delete from tbcat where cid=$id";
                        mysqli_query($link, $qry);
                        ?>
                        <button type="submit" name="btnadd" class="uk-button-large uk-button-primary">ADD</button>
                        <?php
                    }

                    ?>
                    <button type="submit" class="uk-button-large uk-button-primary">Clear</button>
                </div>
            </fieldset>
        </form>
        <?php
        $db = new db;
        $link = $db->dbconnect();
        $qry = "select * from tbcat";
        $res = mysqli_query($link, $qry);
        ?>
        <table class="uk-table uk-table-hover uk-table-responsive">
            <caption>Quiz History</caption>
            <thead>
            <tr>
                <th><strong>Category Name</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($r = mysqli_fetch_row($res)) {
                ?>
                <tr>
                    <td><strong><?= $r[1] ?></strong></td>
                    <td><a href="admcat.php?cid=<?= $r[0] ?>&m=E">Edit</a></td>
                    <td><a href="admcat.php?cid=<?= $r[0] ?>&m=D">Delete</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

<?php include_once "includes/footer.php"; ?>
<?php
$title = "Quiz/Time - Leaderboard";
include_once "includes/db.php";
include_once "includes/header.php";
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "U"|| $_SESSION["urol"]=="A") {
    header("Location:login.php");
}
if (isset($_SESSION["qizid"]) && $_SESSION["qizid"] != "") {

}
?>
    <div class="uk-width-1-2@l uk-card uk-card-large uk-card-default uk-card-body uk-margin-auto uk-padding-large">
        <div class="uk-align-center uk-text-center">
        </div>
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
            <tr>
                <th><strong>Picture</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Score</strong></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $db = new db();
            $link = $db->dbconnect();
            $qry = "select unam,upic,(select sum(rnofrans) calc from tbresult where ruid=u.uid) tot from tbuser u order by tot desc";
            $res = mysqli_query($link, $qry);
            while ($r = mysqli_fetch_row($res)) {
                ?>
                <tr>

                    <td><img class="uk-preserve-width uk-border-circle" src="userpics/<?= $r[1] ?>" width="40"
                             height="50"></td>
                    <td class="uk-text-uppercase"><?=$r[0]?></td>
                    <td><strong><?=$r[2]?></strong></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

<?php include_once "includes/footer.php"; ?>
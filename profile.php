<?php
$title = "Quiz/Time - Profile";
include_once "includes/db.php";
include_once "includes/header.php";
if (!isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"]) || $_SESSION["urol"] != "U") {
    header("Location:login.php");
}
?>
    <div class="uk-width-1-1@l uk-width-1-2@m uk-width-1-2@s uk-align-center">
        <div class="uk-width-1-2@l uk-card uk-card-large uk-card-default uk-card-body uk-margin-auto uk-padding-large">
            <div class="uk-align-center uk-text-center">
                <?php
                $db = new db();
                $link = $db->dbconnect();
                $uid = $_SESSION["uid"];
                $qry="select unam,upic from tbuser where uid=$uid";
                $res=mysqli_query($link,$qry);
                $u=mysqli_fetch_row($res);
                ?>
                <h2><?=$u[0]?></h2>
                <img class="uk-border-pill uk-box-shadow-xlarge" src="userpics/<?=$u[1]?>" width="200" height="200" alt="//||\\">
            </div>
            <table class="uk-table uk-table-hover">
                <caption>Quiz History</caption>
                <thead>
                <tr>
                    <th><strong>DATE</strong></th>
                    <th><strong>TIME</strong></th>
                    <th><strong>TOPIC</strong></th>
                    <th><strong>SCORE</strong></th>
                </tr>
                </thead>
                <tbody>
                <?php

                $res = mysqli_query($link, "select *,(select cnam from tbcat where cid=r.rcid) cnam from tbresult r where ruid=$uid order by radddat desc");
                while ($r = mysqli_fetch_row($res)) {
                    $dat = $r[6];
                    ?>
                    <tr>
                        <td><?= date("F d, Y", strtotime($dat)) ?></td>
                        <td><?= date("l, g:i A", strtotime($dat)) ?></td>
                        <td><strong><?= $r[7] ?></strong></td>
                        <td><?= $r[3] ?> Out of <?= $r[4] ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once "includes/footer.php"; ?>
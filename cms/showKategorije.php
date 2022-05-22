<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = "SELECT `cat_id`, `cat_title` FROM `categories`";
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idKategorije = $_GET['id'];
    delData($con, $idKategorije, 'cat_id', 'categories', 'showKategorije');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Kategorije</span>
            <button class="btn" onclick="window.location.href='addKategorije'">Dodaj Kategoriju</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Kategorije</th>
                <th>Naslov Kategorije</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $cat_title ?></td>
                    <?php addAkcije('editKategorije', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = 'SELECT `id_blog`, `blog_heading` FROM `blogs`';
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idBloga = $_GET['id'];
    delData($con, $idBloga, 'idBloga', 'blogs', 'showBlog');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Blogovi</span>
            <button class="btn" onclick="window.location.href='addBlog'">Dodaj Blog</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Bloga</th>
                <th>Naslov</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id_blog'];
                $naslov = $row['blog_heading'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $naslov ?></td>
                    <?php addAkcije('editBlog', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
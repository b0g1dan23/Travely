<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = "SELECT blogs.id_blog, categories.cat_id, blogs.blog_heading,categories.cat_title FROM `blogs_categories` inner JOIN blogs inner join categories ON blogs.id_blog = blogs_categories.id_blog AND categories.cat_id = blogs_categories.cat_id;";
$res = mysqli_query($con, $query);

if (isset($_GET['id_blog']) && isset($_GET['cat_id'])) {
    $idBloga = $_GET['id_blog'];
    $idKategorije = $_GET['cat_id'];
    $delQuery = "DELETE FROM `blogs_categories` WHERE id_blog = $idBloga AND cat_id = $idKategorije";
    $res = mysqli_query($con, $delQuery);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
            window.location.href = 'showPovezivanje.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showPovezivanje.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Povezivanje</span>
            <button class="btn" onclick="window.location.href='addPovezivanje'">Dodaj kategoriju blogu</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>Naziv Bloga</th>
                <th>Naziv Kategorije</th>
                <th>Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $cat_id = $row['cat_id'];
                $id_blog = $row['id_blog'];
                $cat_title = $row['cat_title'];
                $blog_heading = $row['blog_heading'];
            ?>
                <tr>
                    <td><?php echo $blog_heading ?></td>
                    <td><?php echo $cat_title ?></td>
                    <td class="admin__td"><a onclick="window.location.href = `?id_blog=${<?php echo $id_blog ?>}&cat_id=${<?php echo $cat_id ?>}`" href="#" class="admin__akcije">Obrisi</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = "SELECT blogovi.id_blog, kategorije.cat_id, blogovi.naslov,kategorije.cat_title FROM `blogoviKategorije` inner JOIN blogovi inner join kategorije ON blogovi.id_blog = blogoviKategorije.id_blog AND kategorije.cat_id = blogoviKategorije.cat_id;";
$res = mysqli_query($con, $query);

if (isset($_GET['id_blog']) && isset($_GET['cat_id'])) {
    $idBloga = $_GET['id_blog'];
    $idKategorije = $_GET['cat_id'];
    $delQuery = "DELETE FROM `blogoviKategorije` WHERE id_blog = $idBloga AND cat_id = $idKategorije";
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
                $naslov = $row['naslov'];
            ?>
                <tr>
                    <td><?php echo $naslov ?></td>
                    <td><?php echo $cat_title ?></td>
                    <td class="admin__td"><a onclick="window.location.href = `?id_blog=${<?php echo $id_blog ?>}&cat_id=${<?php echo $cat_id ?>}`" href="#" class="admin__akcije">Obrisi</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
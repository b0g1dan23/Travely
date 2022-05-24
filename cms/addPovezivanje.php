<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $idBloga = $_POST['idBloga'];
    $idKategorije = $_POST['idKategorije'];
    $queryInsert = "INSERT INTO `blogoviKategorije`(`id_blog`, `cat_id`) VALUES ('$idBloga','$idKategorije')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
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
        </div>
        <form action="addPovezivanje" method="POST" class="apartmani__form">
            <div class="contact__input">
                <label for="idBloga">
                    <h3 class="h3" style="display:inline-block;">Blog</h3>
                </label>
                <select name="idBloga" class="apartmani__select">
                    <?php
                    $query = 'SELECT `id_blog`, `naslov` FROM `blogovi`';
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id_blog = $row['id_blog'];
                        $naslov = $row['naslov'];
                    ?>
                        <option value="<?php echo $id_blog ?>"><?php echo $naslov ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="contact__input">
                <label for="idKategorije">
                    <h3 class="h3" style="display:inline-block;">Kategorija</h3>
                </label>
                <select name="idKategorije" class="apartmani__select">
                    <?php
                    $query = 'SELECT `cat_id`, `cat_title` FROM `kategorije`';
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                    ?>
                        <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Povezivanje</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
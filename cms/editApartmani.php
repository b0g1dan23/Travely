<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_GET['id'])) {
    $idApartmana = $_GET['id'];
    $initQuery = "SELECT `nazivApartmana`, `brojSoba`, `maxOsobe`, `kvadratura`, `brKupatila`, `udaljenost_more`, `udaljenost_centar`, `sprat`, `cena`, `Video`, `images`, `Promo?`, `godina_izgradnje`, `brGaraza`, `postanskiBroj`, `opisApartmana`, `ulica`, `brUlice`, `idVlasnika`, `idGrada`, `idHotela` FROM `apartmani` WHERE idApartmana = $idApartmana";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
    $initOpisApartmana = $row['opisApartmana'];
}


if (isset($_POST['btn_update'])) {
    $nazivApartmana = $_POST['nazivApartmana'];
    $brojSoba = $_POST['brojSoba'];
    $maxOsobe = $_POST['maxOsobe'];
    $kvadratura = $_POST['kvadratura'];
    $brKupatila = $_POST['brKupatila'];
    $udaljenost_more = $_POST['udaljenost_more'];
    $udaljenost_centar = $_POST['udaljenost_centar'];
    $sprat = $_POST['sprat'];
    $cena = $_POST['cena'];
    $video = $_POST['video'];
    $images = $_POST['images'];
    $promo = $_POST['promo'];
    $godina_izgradnje = $_POST['godina_izgradnje'];
    $brGaraza = $_POST['brGaraza'];
    $postanskiBroj = $_POST['postanskiBroj'];
    $ulica = $_POST['ulica'];
    $brUlice = $_POST['brUlice'];
    $idHotela = $_POST['idHotela'];
    $idVlasnika = $_POST['idVlasnika'];
    $idGrada = $_POST['idGrada'];
    $opisApartmana = $_POST['opisApartmana'];

    $queryEdit = "UPDATE `apartmani` SET `nazivApartmana`='$nazivApartmana',`brojSoba`=$brojSoba,`maxOsobe`=$maxOsobe,`kvadratura`=$kvadratura,`brKupatila`=$brKupatila,`udaljenost_more`=$udaljenost_more,`udaljenost_centar`=$udaljenost_centar,`sprat`=$sprat,`cena`=$cena,`Video`='$video',`images`='$images',`Promo?`=$promo,`godina_izgradnje`=$godina_izgradnje,`brGaraza`=$brGaraza,`postanskiBroj`=$postanskiBroj,`opisApartmana`='$opisApartmana',`ulica`='$ulica',`brUlice`=$brUlice,`idVlasnika`=$idVlasnika,`idGrada`=$idGrada,`idHotela`=$idHotela WHERE `idApartmana`=" . $_GET['id'];
    echo $queryEdit;
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
            window.location.href = 'showApartmani.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showApartmani.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Apartmani</span>
        </div>
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivApartmana" placeholder="Naziv Apartmana" value="<?php echo $row['nazivApartmana'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brojSoba" placeholder="Broj soba" value="<?php echo $row['brojSoba'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="maxOsobe" placeholder="Maximalni broj osoba" value="<?php echo $row['maxOsobe'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="kvadratura" placeholder="Kvadratura" value="<?php echo $row['kvadratura'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brKupatila" placeholder="Broj kupatila" value="<?php echo $row['brKupatila'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="udaljenost_more" placeholder="Udaljenost od mora" value="<?php echo $row['udaljenost_more'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="udaljenost_centar" placeholder="Udaljenost od centra" value="<?php echo $row['udaljenost_centar'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="sprat" placeholder="Sprat" value="<?php echo $row['sprat'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="cena" placeholder="Cena" value="<?php echo $row['cena'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="video" placeholder="Video" value="<?php echo $row['Video'] ?>" />
            </div>
            <div class="contact__input">
                <input type="text" name="images" placeholder="Slike" value="<?php echo $row['images'] ?>" />
            </div>
            <div class="contact__input">
                <label for="promo">
                    <h3 class="h3" style="display:inline-block;">Promo?</h3>
                </label>
                <select name="promo" class="apartmani__select">
                    <option value="1">Yes</option>
                    <option value="0" <?php if (!$row['Promo?']) echo 'selected' ?>>No</option>
                </select>
            </div>
            <div class="contact__input">
                <input type="number" name="godina_izgradnje" placeholder="Godina izgradnje" value="<?php echo $row['godina_izgradnje'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brGaraza" placeholder="Broj garaza" value="<?php echo $row['brGaraza'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="postanskiBroj" placeholder="Postanski Broj" value="<?php echo $row['postanskiBroj'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="ulica" placeholder="Ulica" value="<?php echo $row['ulica'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brUlice" placeholder="Broj ulice" value="<?php echo $row['brUlice'] ?>" required />
            </div>
            <div class="contact__input">
                <label for="idVlasnika">
                    <h3 class="h3" style="display:inline-block;">Vlasnik</h3>
                </label>
                <select name="idVlasnika" class="apartmani__select">
                    <?php
                    $query = 'SELECT `idVlasnika`, CONCAT(vlasnici.Ime, " " , vlasnici.Prezime) as Vlasnik FROM `vlasnici`';
                    $res = mysqli_query($con, $query);
                    while ($row1 = mysqli_fetch_assoc($res)) {
                        $idVlasnika = $row1['idVlasnika'];
                        $vlasnik = $row1['Vlasnik'];
                    ?>
                        <option value="<?php echo $idVlasnika ?>" <?php if ($idVlasnika === $row['idVlasnika']) echo 'selected' ?>><?php echo $vlasnik ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="contact__input">
                <label for="idHotela">
                    <h3 class="h3" style="display:inline-block;">Hotel</h3>
                </label>
                <select name="idHotela" class="apartmani__select">
                    <?php
                    $query = 'SELECT `idHotela`, `nazivHotela` FROM `hoteli`';
                    $res = mysqli_query($con, $query);
                    while ($row2 = mysqli_fetch_assoc($res)) {
                        $idHotela = $row2['idHotela'];
                        $nazivHotela = $row2['nazivHotela'];
                    ?>
                        <option value="<?php echo $idHotela ?>" <?php if ($idHotela === $row['idHotela']) echo 'selected' ?>><?php echo $nazivHotela ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="contact__input">
                <label for="idGrada">
                    <h3 class="h3" style="display:inline-block;">Grad</h3>
                </label>
                <select name="idGrada" class="apartmani__select">
                    <?php
                    $query = 'SELECT `idGrada`, `nazivGrada` FROM `gradovi`';
                    $res = mysqli_query($con, $query);
                    while ($row3 = mysqli_fetch_assoc($res)) {
                        $idGrada = $row3['idGrada'];
                        $nazivGrada = $row3['nazivGrada'];
                    ?>
                        <option value="<?php echo $idGrada ?>" <?php if ($idGrada === $row['idGrada']) echo 'selected' ?>><?php echo $nazivGrada ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="contact__input">
                <textarea name="opisApartmana" class="contact__textarea" placeholder="Opis apartmana" cols="30" rows="10"><?php echo $initOpisApartmana ?></textarea>
            </div>

            <button type="submit" name="btn_update" class="btn">Izmeni Apartman</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
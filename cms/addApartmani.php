<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
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

    $queryInsert = "INSERT INTO `apartmani`(`nazivApartmana`, `brojSoba`, `maxOsobe`, `kvadratura`, `brKupatila`, `udaljenost_more`, `udaljenost_centar`, `sprat`, `cena`, `Video`, `images`, `Promo?`, `godina_izgradnje`, `brGaraza`, `postanskiBroj`, `opisApartmana`, `ulica`, `brUlice`, `idVlasnika`, `idGrada`, `idHotela`) VALUES ('$nazivApartmana', $brojSoba, $maxOsobe, $kvadratura, $brKupatila, $udaljenost_more, $udaljenost_centar, $sprat, $cena, '$video', '$images', $promo, $godina_izgradnje, $brGaraza, $postanskiBroj, '$opisApartmana', '$ulica', $brUlice, $idVlasnika, $idGrada, $idHotela)";
    echo $queryInsert;
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
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
        <form action="addApartmani" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivApartmana" placeholder="Naziv Apartmana" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brojSoba" placeholder="Broj soba" required />
            </div>
            <div class="contact__input">
                <input type="number" name="maxOsobe" placeholder="Maximalni broj osoba" required />
            </div>
            <div class="contact__input">
                <input type="number" name="kvadratura" placeholder="Kvadratura" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brKupatila" placeholder="Broj kupatila" required />
            </div>
            <div class="contact__input">
                <input type="number" name="udaljenost_more" placeholder="Udaljenost od mora" required />
            </div>
            <div class="contact__input">
                <input type="number" name="udaljenost_centar" placeholder="Udaljenost od centra" required />
            </div>
            <div class="contact__input">
                <input type="number" name="sprat" placeholder="Sprat" required />
            </div>
            <div class="contact__input">
                <input type="number" name="cena" placeholder="Cena" required />
            </div>
            <div class="contact__input">
                <input type="text" name="video" placeholder="Video" />
            </div>
            <div class="contact__input">
                <input type="text" name="images" placeholder="Slike" />
            </div>
            <div class="contact__input">
                <label for="promo">
                    <h3 class="h3" style="display:inline-block;">Promo?</h3>
                </label>
                <select name="promo" class="apartmani__select">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="contact__input">
                <input type="number" name="godina_izgradnje" placeholder="Godina izgradnje" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brGaraza" placeholder="Broj garaza" required />
            </div>
            <div class="contact__input">
                <input type="number" name="postanskiBroj" placeholder="Postanski Broj" required />
            </div>
            <div class="contact__input">
                <input type="text" name="ulica" placeholder="Ulica" required />
            </div>
            <div class="contact__input">
                <input type="number" name="brUlice" placeholder="Broj ulice" required />
            </div>
            <div class="contact__input">
                <label for="idVlasnika">
                    <h3 class="h3" style="display:inline-block;">Vlasnik</h3>
                </label>
                <select name="idVlasnika" class="apartmani__select">
                    <?php
                    $query = 'SELECT `idVlasnika`, CONCAT(vlasnici.Ime, " " , vlasnici.Prezime) as Vlasnik FROM `vlasnici`';
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $idVlasnika = $row['idVlasnika'];
                        $vlasnik = $row['Vlasnik'];
                    ?>
                        <option value="<?php echo $idVlasnika ?>"><?php echo $vlasnik ?></option>
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
                    while ($row = mysqli_fetch_assoc($res)) {
                        $idHotela = $row['idHotela'];
                        $nazivHotela = $row['nazivHotela'];
                    ?>
                        <option value="<?php echo $idHotela ?>"><?php echo $nazivHotela ?></option>
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
                    while ($row = mysqli_fetch_assoc($res)) {
                        $idGrada = $row['idGrada'];
                        $nazivGrada = $row['nazivGrada'];
                    ?>
                        <option value="<?php echo $idGrada ?>"><?php echo $nazivGrada ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="contact__input">
                <textarea name="opisApartmana" class="contact__textarea" placeholder="Opis apartmana" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Apartman</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
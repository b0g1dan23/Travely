<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $nazivHotela = $_POST['nazivHotela'];
    $brTelefona = $_POST['brTelefona'];
    $idGrada = $_POST['idGrada'];
    $queryInsert = "INSERT INTO `hoteli`(`nazivHotela`, `brTelefona`, `idGrada`) VALUES ('$nazivHotela','$brTelefona','$idGrada')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
            window.location.href = 'showHoteli.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showHoteli.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Hoteli</span>
        </div>
        <form action="addHoteli" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivHotela" placeholder="Naziv Hotela" required />
            </div>
            <div class="contact__input">
                <input type="text" name="brTelefona" placeholder="Broj Telefona" required />
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
            <button type="submit" name="submit" class="btn">Dodaj Hotel</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
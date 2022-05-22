<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $brTelefona = $_POST['brTelefona'];
    $queryInsert = "INSERT INTO `vlasnici`(`Ime`, `Prezime`, `BrTelefona`) VALUES ('$ime','$prezime','$brTelefona')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
            window.location.href = 'showVlasnici.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showVlasnici.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Vlasnici</span>
        </div>
        <form action="addVlasnici" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="ime" placeholder="Ime" required />
            </div>
            <div class="contact__input">
                <input type="text" name="prezime" placeholder="Prezime" required />
            </div>
            <div class="contact__input">
                <input type="text" name="brTelefona" placeholder="Broj telefona" required />
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Vlasnika</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
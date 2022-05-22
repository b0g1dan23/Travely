<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $imePosiljaoca = $_POST['imePosiljaoca'];
    $telefonPosiljaoca = $_POST['telefonPosiljaoca'];
    $emailPosiljaoca = $_POST['emailPosiljaoca'];
    $poruka = $_POST['poruka'];
    $queryInsert = "INSERT INTO `porukaagentu`(`imePosiljaoca`, `telefonPosiljaoca`, `emailPosiljaoca`, `poruka`) VALUES ('$imePosiljaoca','$telefonPosiljaoca','$emailPosiljaoca','$poruka')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
            window.location.href = 'showPoruke.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showPoruke.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Poruke</span>
        </div>
        <form action="addPoruke" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="imePosiljaoca" placeholder="Ime Posiljaoca" required />
            </div>
            <div class="contact__input">
                <input type="text" name="telefonPosiljaoca" placeholder="Telefon Posiljaoca" required />
            </div>
            <div class="contact__input">
                <input type="text" name="emailPosiljaoca" placeholder="Email Posiljaoca" required />
            </div>
            <div class="contact__input">
                <textarea name="poruka" class="contact__textarea" placeholder="Sadrzina poruke" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Poruku</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $nazivGrada = $_POST['nazivGrada'];
    $queryInsert = "INSERT INTO `gradovi`(`nazivGrada`) VALUES ('$nazivGrada')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
            window.location.href = 'showGradovi.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showGradovi.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Gradovi</span>
        </div>
        <form action="addGradovi" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivGrada" placeholder="Grad" required />
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Grad</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
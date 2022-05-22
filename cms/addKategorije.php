<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    $queryInsert = "INSERT INTO `categories`(`cat_title`) VALUES ('$cat_title')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
            window.location.href = 'showKategorije.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showKategorije.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Kategorije</span>
        </div>
        <form action="addKategorije" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="cat_title" placeholder="Naslov Kategorije" required />
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Kategoriju</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
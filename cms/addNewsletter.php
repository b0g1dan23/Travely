<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $queryInsert = "INSERT INTO `poste`(`email`) VALUES ('$email')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
            window.location.href = 'showNewsletter.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showNewsletter.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Poste</span>
        </div>
        <form action="addNewsletter" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="email" placeholder="Email" required />
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Postu</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $heading = $_POST['nazivBloga'];
    $imgBlog = $_POST['imgBlog'];
    $tagoviBlog = $_POST['tagoviBlog'];
    $sadrzinaBloga = $_POST['sadrzinaBloga'];
    $trenutnoVreme = date('y-m-d');
    $queryInsert = "INSERT INTO `blogovi`(`naslov`, `datum`, `sadrzaj`, `pozadina`, `tagovi`) VALUES ('$heading','$trenutnoVreme','$sadrzinaBloga','$imgBlog','$tagoviBlog')";
    $res = mysqli_query($con, $queryInsert);
    if ($res) {
?>
        <script>
            alert('Uspesno dodat podatak');
            window.location.href = 'showBlog.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showBlog.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Blogovi</span>
        </div>
        <form action="addBlog" method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivBloga" placeholder="Naziv bloga" required />
            </div>
            <div class="contact__input">
                <input type="text" name="imgBlog" placeholder="Slika bloga" required />
            </div>
            <div class="contact__input">
                <input type="text" name="tagoviBlog" placeholder="Tagovi" required />
            </div>
            <div class="contact__input">
                <textarea name="sadrzinaBloga" class="contact__textarea" placeholder="Sadrzina bloga" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Blog</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
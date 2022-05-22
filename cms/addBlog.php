<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_POST['submit'])) {
    $blog_heading = $_POST['nazivBloga'];
    $imgBlog = $_POST['imgBlog'];
    $tagsBlog = $_POST['tagsBlog'];
    $sadrzinaBloga = $_POST['sadrzinaBloga'];
    $trenutnoVreme = date('y-m-d');
    $queryInsert = "INSERT INTO `blogs`(`blog_heading`, `blog_date`, `blog_content`, `blog_bg`, `blog_tags`) VALUES ('$blog_heading','$trenutnoVreme','$sadrzinaBloga','$imgBlog','$tagsBlog')";
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
                <input type="text" name="tagsBlog" placeholder="Tagovi" required />
            </div>
            <div class="contact__input">
                <textarea name="sadrzinaBloga" class="contact__textarea" placeholder="Sadrzina bloga" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="submit" class="btn">Dodaj Blog</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
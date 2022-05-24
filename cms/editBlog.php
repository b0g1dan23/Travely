<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

$idBloga = '';
if (isset($_GET['id'])) {
    $idBloga = $_GET['id'];
    $initQuery = "SELECT * FROM blogovi WHERE id_blog = $idBloga";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
}


if (isset($_POST['btn_update'])) {
    $nazivBloga = $_POST['nazivBloga'];
    $imgBlog = $_POST['imgBlog'];
    $tagoviBlog = $_POST['tagoviBlog'];
    $sadrzinaBloga = $_POST['sadrzinaBloga'];
    $dateBlog = $_POST['dateBlog'];
    $queryEdit = "UPDATE `blogovi` SET `naslov`='$nazivBloga',`datum`='$dateBlog',`sadrzaj`='$sadrzinaBloga',`pozadina`='$imgBlog',`tagovi`='$tagoviBlog' WHERE `id_blog` =" . $_GET['id'];
    echo $queryEdit;
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
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
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivBloga" placeholder="Naziv bloga" value="<?php echo $row['naslov'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="imgBlog" placeholder="Slika bloga" value="<?php echo $row['pozadina'] ?>" required />
            </div>
            <div class="contact__input">
                <label for="dateBlog">
                    <h3 class="h3">Izmeni datum objave bloga &downarrow;</h3>
                </label>
                <input type="date" name="dateBlog" placeholder="yyyy-mm-dd" min="1997-01-01" max="2030-12-31" value="<?php echo $row['datum'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="tagoviBlog" placeholder="Tagovi" value="<?php echo $row['tagovi'] ?>" required />
            </div>
            <div class="contact__input">
                <textarea name="sadrzinaBloga" class="contact__textarea" placeholder="Sadrzina bloga" cols="30" rows="10"><?php echo $row['sadrzaj'] ?></textarea>
            </div>
            <button type="submit" name="btn_update" class="btn">Izmeni Blog</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
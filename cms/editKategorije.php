<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_GET['id'])) {
    $idKategorije = $_GET['id'];
    $initQuery = "SELECT `cat_title` FROM `categories` WHERE cat_id = $idKategorije";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
}


if (isset($_POST['btn_update'])) {
    $cat_title = $_POST['cat_title'];
    $queryEdit = "UPDATE `categories` SET `cat_title`='$cat_title' WHERE cat_id =" . $_GET['id'];
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
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
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="cat_title" placeholder="Naslov Kategorije" value="<?php echo $row['cat_title'] ?>" required />
            </div>
            <button type="submit" name="btn_update" class="btn">Izmeni Kategoriju</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
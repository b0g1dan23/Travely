<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_GET['id'])) {
    $idGrada = $_GET['id'];
    $initQuery = "SELECT `idGrada`, `nazivGrada` FROM `gradovi` WHERE idGrada = $idGrada";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
}


if (isset($_POST['btn_update'])) {
    $nazivGrada = $_POST['nazivGrada'];
    $queryEdit = "UPDATE `gradovi` SET `nazivGrada`='$nazivGrada' WHERE idGrada =" . $_GET['id'];
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
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
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivGrada" placeholder="Grad" value="<?php echo $row['nazivGrada'] ?>" required />
            </div>
            <button type="submit" name="btn_update" class="btn">Izmeni Grad</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
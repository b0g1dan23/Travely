<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_GET['id'])) {
    $idPoruke = $_GET['id'];
    $initQuery = "SELECT * FROM porukaagentu WHERE idPoruke = $idPoruke";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
}


if (isset($_POST['btn_update'])) {
    $imePosiljaoca = $_POST['imePosiljaoca'];
    $telefonPosiljaoca = $_POST['telefonPosiljaoca'];
    $emailPosiljaoca = $_POST['emailPosiljaoca'];
    $poruka = $_POST['poruka'];
    $queryEdit = "UPDATE `porukaagentu` SET `imePosiljaoca`='$imePosiljaoca',`telefonPosiljaoca`='$telefonPosiljaoca',`emailPosiljaoca`='$emailPosiljaoca',`poruka`='$poruka' WHERE idPoruke =" . $_GET['id'];
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
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
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="imePosiljaoca" placeholder="Ime Posiljaoca" value="<?php echo $row['imePosiljaoca'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="telefonPosiljaoca" placeholder="Telefon Posiljaoca" value="<?php echo $row['telefonPosiljaoca'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="emailPosiljaoca" placeholder="Email Posiljaoca" value="<?php echo $row['emailPosiljaoca'] ?>" required />
            </div>
            <div class="contact__input">
                <textarea name="poruka" class="contact__textarea" placeholder="Sadrzina poruke" cols="30" rows="10"><?php echo $row['poruka'] ?></textarea>
            </div>
            <button type="submit" name="btn_update" class="btn">Izmeni Poruku</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
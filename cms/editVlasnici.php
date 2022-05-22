<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_GET['id'])) {
    $idVlasnika = $_GET['id'];
    $initQuery = "SELECT `Ime`,`Prezime`,`BrTelefona` FROM `vlasnici` WHERE idVlasnika = $idVlasnika";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
}


if (isset($_POST['btn_update'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $brTelefona = $_POST['brTelefona'];
    $queryEdit = "UPDATE `vlasnici` SET `Ime`='$ime',`Prezime`='$prezime',`BrTelefona`='$brTelefona' WHERE idVlasnika =" . $_GET['id'];
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
            window.location.href = 'showVlasnici.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showVlasnici.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Vlasnici</span>
        </div>
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="ime" placeholder="Ime" value="<?php echo $row['Ime'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="prezime" placeholder="Prezime" value="<?php echo $row['Prezime'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="brTelefona" placeholder="Broj telefona" value="<?php echo $row['BrTelefona'] ?>" required />
            </div>
            <button type="submit" name="btn_update" class="btn">Izmeni Vlasnika</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
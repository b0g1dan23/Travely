<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_GET['id'])) {
    $idHotela = $_GET['id'];
    $initQuery = "SELECT `nazivHotela`, `brTelefona` FROM `hoteli` WHERE idHotela = $idHotela";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
}


if (isset($_POST['btn_update'])) {
    $nazivHotela = $_POST['nazivHotela'];
    $brTelefona = $_POST['brTelefona'];
    $idGrada = $_POST['idGrada'];
    $queryEdit = "UPDATE `hoteli` SET `nazivHotela`='$nazivHotela',`brTelefona`='$brTelefona',`idGrada`='$idGrada' WHERE idHotela =" . $_GET['id'];
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
            window.location.href = 'showHoteli.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showHoteli.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Hoteli</span>
        </div>
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="nazivHotela" placeholder="Naziv Hotela" value="<?php echo $row['nazivHotela'] ?>" required />
            </div>
            <div class="contact__input">
                <input type="text" name="brTelefona" placeholder="Broj Telefona" value="<?php echo $row['brTelefona'] ?>" required />
            </div>
            <div class="contact__input">
                <label for="idGrada">
                    <h3 class="h3" style="display:inline-block;">Grad</h3>
                </label>
                <select name="idGrada" class="apartmani__select">
                    <?php
                    $query = 'SELECT `idGrada`, `nazivGrada` FROM `gradovi`';
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $idGrada = $row['idGrada'];
                        $nazivGrada = $row['nazivGrada'];
                    ?>
                        <option value="<?php echo $idGrada ?>"><?php echo $nazivGrada ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="btn_update" class="btn">Izmeni Hotel</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
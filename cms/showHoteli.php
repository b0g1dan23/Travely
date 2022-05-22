<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = "SELECT `idHotela`, `nazivHotela`, `brTelefona`,gradovi.nazivGrada FROM `hoteli` INNER JOIN gradovi ON hoteli.idGrada = gradovi.idGrada";
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idHotela = $_GET['id'];
    delData($con, $idHotela, 'idHotela', 'hoteli', 'showHoteli');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Hoteli</span>
            <button class="btn" onclick="window.location.href='addHoteli'">Dodaj Hotel</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Hotela</th>
                <th>Naziv Hotela</th>
                <th>Broj telefona</th>
                <th>Grad</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['idHotela'];
                $nazivHotela = $row['nazivHotela'];
                $brTelefona = $row['brTelefona'];
                $nazivGrada = $row['nazivGrada'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $nazivHotela ?></td>
                    <td><?php echo $brTelefona ?></td>
                    <td><?php echo $nazivGrada ?></td>
                    <?php addAkcije('editHoteli', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
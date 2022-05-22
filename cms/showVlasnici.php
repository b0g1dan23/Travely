<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = "SELECT `idVlasnika`, CONCAT(`Ime`, ' ', `Prezime`) as Vlasnik, `BrTelefona` FROM `vlasnici`";
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idVlasnika = $_GET['id'];
    delData($con, $idVlasnika, 'idVlasnika', 'vlasnici', 'showVlasnici');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Vlasnici</span>
            <button class="btn" onclick="window.location.href='addVlasnici'">Dodaj Vlasnika</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Vlasnika</th>
                <th>Vlasnik</th>
                <th>Br Telefona</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['idVlasnika'];
                $Vlasnik = $row['Vlasnik'];
                $BrTelefona = $row['BrTelefona'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $Vlasnik ?></td>
                    <td><?php echo $BrTelefona ?></td>
                    <?php addAkcije('editVlasnici', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
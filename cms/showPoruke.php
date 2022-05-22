<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = 'SELECT `idPoruke`, `imePosiljaoca`, `telefonPosiljaoca`, `emailPosiljaoca`, `poruka` FROM `porukaagentu`';
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idPoruke = $_GET['id'];
    delData($con, $idPoruke, 'idPoruke', 'porukaagentu', 'showPoruke');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Poruke</span>
            <button class="btn" onclick="window.location.href='addPoruke'">Dodaj Poruku</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Poruke</th>
                <th>Ime Posiljaoca</th>
                <th>Telefon Posiljaoca</th>
                <th>Email Posiljaoca</th>
                <th>Poruka</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['idPoruke'];
                $imePosiljaoca = $row['imePosiljaoca'];
                $telefonPosiljaoca = $row['telefonPosiljaoca'];
                $emailPosiljaoca = $row['emailPosiljaoca'];
                $poruka = $row['poruka'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $imePosiljaoca ?></td>
                    <td><?php echo $telefonPosiljaoca ?></td>
                    <td><?php echo $emailPosiljaoca ?></td>
                    <td><?php echo $poruka ?></td>
                    <?php addAkcije('editPoruke', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
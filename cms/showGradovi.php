<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = "SELECT `idGrada`, `nazivGrada` FROM `gradovi`";
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idGrada = $_GET['id'];
    delData($con, $idGrada, 'idGrada', 'gradovi', 'showGradovi');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Gradovi</span>
            <button class="btn" onclick="window.location.href='addGradovi'">Dodaj Grad</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Grada</th>
                <th>Grad</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['idGrada'];
                $grad = $row['nazivGrada'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $grad ?></td>
                    <?php addAkcije('editGradovi', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = 'SELECT `idApartmana`, `nazivApartmana`, `Promo?`,CONCAT(vlasnici.Ime," ",vlasnici.Prezime) as vlasnik FROM `apartmani` INNER JOIN vlasnici ON apartmani.idVlasnika = vlasnici.idVlasnika';
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delData($con, $id, 'idApartmana', 'apartmani', 'showApartmani');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Apartmani</span>
            <button class="btn" onclick="window.location.href='addApartmani'">Dodaj Apartman</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Apartmana</th>
                <th>Ime Apartmana</th>
                <th>Ime vlasnika</th>
                <th>Status</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['idApartmana'];
                $ime = $row['nazivApartmana'];
                $promo = $row['Promo?'];
                $vlasnik = $row['vlasnik'];
                $mes = '';
                $promo == 1 ? $mes .= 'Promo' : $mes .= "No promo";
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $ime ?></td>
                    <td><?php echo $vlasnik ?></td>
                    <td><?php echo $mes ?></td>
                    <?php addAkcije('editApartmani', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
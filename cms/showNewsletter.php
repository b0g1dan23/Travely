<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = 'SELECT `idNewsletter`, `email` FROM `poste`';
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idNewsletter = $_GET['id'];
    delData($con, $idNewsletter, 'idNewsletter', 'poste', 'showNewsletter');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Poste</span>
            <button class="btn" onclick="window.location.href='addNewsletter'">Dodaj Postu</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Poste</th>
                <th>Email</th>
                <th colspan="2">Akcije</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['idNewsletter'];
                $email = $row['email'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $email ?></td>
                    <?php addAkcije('editNewsletter', $id) ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script src="index.js"></script>
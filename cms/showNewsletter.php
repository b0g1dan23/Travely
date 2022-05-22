<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";
include "funkcije.php";

$query = 'SELECT `idNewsletter`, `email` FROM `newsletter`';
$res = mysqli_query($con, $query);

if (isset($_GET['id'])) {
    $idNewsletter = $_GET['id'];
    delData($con, $idNewsletter, 'idNewsletter', 'newsletter', 'showNewsletter');
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Newsletter</span>
            <button class="btn" onclick="window.location.href='addNewsletter'">Dodaj Newsletter</button>
        </div>
        <table class="apartmani__table">
            <tr>
                <th>ID Newsletter</th>
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
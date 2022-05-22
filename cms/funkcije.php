<?php
include "../includes/dbconfig.php";

function addAkcije($location, $id)
{
?>
    <td class="admin__td"><a onclick="window.location.href = `<?php echo $location ?>.php?id=${<?php echo $id ?>}`" href="#" class="admin__akcije">Izmeni</a></td>
    <td class="admin__td"><a onclick="window.location.href = `?id=${<?php echo $id ?>}`" href="#" class="admin__akcije">Obrisi</a></td>
    <?php
}

function delData($con, $id, $idChangable, $table, $location)
{
    $delQuery = "DELETE FROM `$table` WHERE $idChangable = $id";
    $res = mysqli_query($con, $delQuery);
    if ($res) {
    ?>
        <script>
            alert('Uspesno odradjena promena');
            window.location.href = '<?php echo $location ?>.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = '<?php echo $location ?>.php';
        </script>
<?php
    }
}

<?php
include "../includes/header.php";
include "includes/admin_side.php";
include "../includes/dbconfig.php";

if (isset($_GET['id'])) {
    $idNewsletter = $_GET['id'];
    $initQuery = "SELECT `email` FROM `poste` WHERE idNewsletter = $idNewsletter";
    $initRes = mysqli_query($con, $initQuery);
    $row = mysqli_fetch_assoc($initRes);
}


if (isset($_POST['btn_update'])) {
    $email = $_POST['email'];
    $queryEdit = "UPDATE `poste` SET `email`='$email' WHERE idNewsletter =" . $_GET['id'];
    echo $queryEdit;
    $res = mysqli_query($con, $queryEdit);
    if ($res) {
?>
        <script>
            alert('Uspesno odradjena promena');
            window.location.href = 'showNewsletter.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Doslo je do greske');
            window.location.href = 'showNewsletter.php';
        </script>
<?php
    }
}
?>
<div class="admin__content">
    <div class="apartmani">
        <div class="apartmani__tekst">
            <span class="span-bold">Poste</span>
        </div>
        <form method="POST" class="apartmani__form">
            <div class="contact__input">
                <input type="text" name="email" placeholder="Email" value="<?php echo $row['email'] ?>" required />
            </div>
            <button type="submit" name="btn_update" class="btn">Izmeni Postu</button>
        </form>

    </div>
</div>

<script src="index.js"></script>
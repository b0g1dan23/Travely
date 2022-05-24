<?php
include "includes/header.php";
include "includes/dbconfig.php";

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con, $email);
    $queryChecker = "SELECT `email` FROM `poste` WHERE email = '$email' ";
    $resChecker = mysqli_query($con, $queryChecker);
    $mes = 'Thank You!';
    $mesContent = 'Thank you for submitting your email in our newsletter, we will notify you if some good deals appear!';
    if (mysqli_num_rows($resChecker) >= 1) {
        $mes = 'Already there!';
    } else {
        $queryWriter = "INSERT INTO `poste`(`email`) VALUES ('$email')";
        $resWriter = mysqli_query($con, $queryWriter);
    }
}

if (isset($_POST['submitPosiljaoca'])) {
    $imePosiljaoca = mysqli_real_escape_string($con, $_POST['imePosiljaoca']);
    $telefonPosiljaoca = mysqli_real_escape_string($con, $_POST['telefonPosiljaoca']);
    $emailPosiljaoca = mysqli_real_escape_string($con, $_POST['emailPosiljaoca']);
    $poruka = mysqli_real_escape_string($con, $_POST['poruka']);
    $mes = 'Thank You!';
    $queryChecker = "SELECT * FROM `porukaagentu` WHERE poruka = '$poruka'";
    $resChecker = mysqli_query($con, $queryChecker);
    if (mysqli_num_rows($resChecker) >= 1) {
        $mes = 'Already sent!';
    } else {
        $query = "INSERT INTO `porukaagentu`(`imePosiljaoca`, `telefonPosiljaoca`, `emailPosiljaoca`, `poruka`) VALUES ('$imePosiljaoca','$telefonPosiljaoca','$emailPosiljaoca','$poruka')";
        $res = mysqli_query($con, $query);
    }
    $mesContent = 'Thank you for submitting our form! Your submission has been sent to our agent, we will contact you as soon as possible! NOTE: If your number is outside Serbia, expect answer on Viber';
}
?>

<div class="ty">
    <div class="container">
        <div class="ty-content">
            <h1 class="h1"><?php echo $mes ?></h1>
            <i class="fa-solid fa-check"></i>
            <span class="span"><?php echo $mesContent ?></span>
            <a href="index" class="span">Click here to go back on homepage</a>
        </div>
    </div>
</div>
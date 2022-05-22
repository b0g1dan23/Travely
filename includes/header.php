<?php
$filename = basename($_SERVER['PHP_SELF'], ".php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href='<?php if ($filename == "index" || $filename == "ty") {
                                        echo "css/style.css";
                                    } else echo "../css/style.css"; ?>' />
    <script src="https://kit.fontawesome.com/61377e0d20.js" crossorigin="anonymous"></script>
    <link href="https://css.gg/phone.css" rel="stylesheet" />
    <link href="https://css.gg/css?=|menu-right-alt" rel="stylesheet" />



    <title>Travely <?php if ($filename != "index") echo "- " . ucfirst($filename) . "" ?></title>
</head>

<body>
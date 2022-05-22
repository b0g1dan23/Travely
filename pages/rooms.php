<?php include "../includes/header.php" ?>
<?php include "../includes/dbconfig.php" ?>
<!-- HEADER & HOME -->
<?php include "../includes/navigation.php" ?>

<?php
// QUERY
$ap_query = 'SELECT `idApartmana`,`nazivApartmana`, `brojSoba`, `maxOsobe`,`cena`, `kvadratura`,`images`, `brKupatila`,`ulica`, `brUlice`, apartmani.idVlasnika, `idGrada`, CONCAT(vlasnici.Ime, " ", vlasnici.Prezime) as Vlasnik
    FROM `apartmani` INNER JOIN vlasnici 
    ON apartmani.idVlasnika = vlasnici.idVlasnika';
if (isset($_GET['paralia']) && isset($_GET['adults']) && isset($_GET['children']) && isset($_GET['rooms'])) {
    $search_res = $_GET['paralia'];
    $adults = $_GET['adults'];
    $children = $_GET['children'];
    $rooms = $_GET['rooms'];
    $brojLjudi = $adults + $children;
    $search_res = mysqli_real_escape_string($con, $search_res);
    $ap_query .= " AND nazivApartmana LIKE '%$search_res%'";
    $ap_query .= " AND maxOsobe >= $brojLjudi";
    $ap_query .= " AND brojSoba >= $rooms";
}
echo $ap_query;
$res = mysqli_query($con, $ap_query);
mysqli_num_rows($res) > 1 ? $mes = 'Properties' : $mes = 'Property';
?>

<main>
    <section class="rooms">
        <div class="container">

            <div class="rooms__title">
                <h2 class="h2 rooms__h2">Rooms</h2>
            </div>
            <div class="rooms__content">
                <div class="rooms__left">
                    <div class="rooms__sortcontainer">
                        <div class="rooms__num">
                            <span class="span"><?php echo mysqli_num_rows($res) . " " . $mes ?></span>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="base_input-button span rooms__button">
                                Sort by: <span class="dropdown_span" data-button-span>Default Order</span>
                            </button>
                            <div class="dropdown-content" id="rooms">
                                <ul class="dropdown_ul rooms__sort">
                                    <!-- Ovde ide js da bi moglo da se sortira -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Room Container -->
                    <?php include "../includes/rooms/roomItem.php" ?>
                </div>

                <!-- Sidebar -->
                <?php include "../includes/rooms/sidebar.php" ?>
            </div>
        </div>
    </section>
</main>

<!-- FOOTER -->
<?php include "../includes/footer.php" ?>
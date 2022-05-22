<?php
include "../includes/header.php";
include "../includes/dbconfig.php";
include "../includes/navigation.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT apartmani.*,gradovi.nazivGrada FROM `apartmani` INNER JOIN gradovi ON apartmani.idGrada = gradovi.idGrada WHERE idApartmana = $id;";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['idApartmana'];
        $naziv = $row['nazivApartmana'];
        $brojSoba = $row['brojSoba'];
        $kvadratura = $row['kvadratura'];
        $brKupatila = $row['brKupatila'];
        $udaljenost_more = $row['udaljenost_more'];
        $udaljenost_centar = $row['udaljenost_centar'];
        $sprat = $row['sprat'];
        $cena = $row['cena'];
        $godina_izgradnje = $row['godina_izgradnje'];
        $brGaraza = $row['brGaraza'];
        $opisApartmana = $row['opisApartmana'];
        $postanskiBroj = $row['postanskiBroj'];
        $Video = $row['Video'];
        $ulica = $row['ulica'];
        $brUlice = $row['brUlice'];
        $idHotela = $row['idHotela'];
        $grad = $row['nazivGrada'];
        $images = $row['images'];
    }
    $type = $idHotela == 0 ? 'Apartment' : 'Hotel Room';
    $images = preg_split("/\,/", $images);
}
?>

<main>
    <div class="eachroom">
        <div class="container">
            <div class="eachroom__text">
                <div class="eachroom__text-left">
                    <h2 class="h2"><?php echo $naziv ?></h2>
                    <span class="span"><?php echo $ulica . ', ' . $brUlice . ', ' . $postanskiBroj . ', ' . $grad ?></span>
                </div>
                <span class="span-bold">$<span class="span-bold" data-eachroom-price><?php echo $cena ?></span>/day</span>
            </div>
            <div class="eachroom__carousel" data-carousel>
                <button class="rooms__carousel-button prev" style="transform: scale(1.5); margin-left: 2rem;" data-carousel-button="prev">&lt;</button>
                <button class="rooms__carousel-button next" style="transform: scale(1.5); margin-right: 2rem;" data-carousel-button="next">&gt;</button>
                <ul data-slides>
                    <?php
                    for ($i = 0; $i < count($images); $i++) {
                        if ($i === 0) {
                            echo "<li class='rooms__slide' id='eachroom' data-active><img src='$images[$i]' alt='Hotel'></li>";
                        } else {
                            echo "<li class='rooms__slide' id='eachroom'><img src='$images[$i]' alt='Hotel'></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="eachroom__content">
                <div class="eachroom__left">
                    <div class="eachroom__overview">
                        <h3 class="h3">Overview</h3>
                        <hr>
                        <div class="eachroom__apartmentypes">
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><?php echo $type ?></span>
                                <span class="span">Property type</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-bed"></i> <?php echo $brojSoba ?></span>
                                <span class="span">Bedroom</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-shower"></i> <?php echo $brKupatila ?></span>
                                <span class="span">Bathroom</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-car"></i> <?php echo $brGaraza ?></span>
                                <span class="span">Garage</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-ruler"></i> <?php echo $kvadratura ?></span>
                                <span class="span">
                                    &#13217;</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-city"></i> <?php echo $udaljenost_centar ?><span style="font-size: 1.2rem;">m</span></span>
                                <span class="span">from City Centre</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-umbrella-beach"></i> <?php echo $udaljenost_more ?><span style="font-size: 1.2rem;">m</span></span>
                                <span class="span">from Beach</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-building"></i> <?php echo $sprat ?></span>
                                <span class="span">Floor</span>
                            </div>
                            <div class="eachroom__apartmentgroup">
                                <span class="span-bold"><i class="fa-solid fa-calendar-days"></i> <?php echo $godina_izgradnje ?></span>
                                <span class="span">Year built</span>
                            </div>
                        </div>
                    </div>

                    <div class="eachroom__overview">
                        <h3 class="h3">Description</h3>
                        <hr>
                        <p class="p"><?php echo $opisApartmana ?></p>
                    </div>

                    <div class="eachroom__overview">
                        <h3 class="h3">Address</h3>
                        <hr>
                        <div class="eachroom__boxes">
                            <div class="eachroom__group">
                                <span class="span-bold">Address</span>
                                <span class="span"><?php echo $ulica . ', ' . $brUlice ?></span>
                            </div>
                            <div class="eachroom__group">
                                <span class="span-bold">Zip/Postal Code</span>
                                <span class="span"><?php echo $postanskiBroj ?></span>
                            </div>
                            <div class="eachroom__group">
                                <span class="span-bold">City</span>
                                <span class="span"><?php echo $grad ?></span>
                            </div>
                            <div class="eachroom__group">
                                <span class="span-bold">Country</span>
                                <span class="span">Greece</span>
                            </div>
                        </div>
                    </div>

                    <?php if ($Video) {
                        echo "<div class='eachroom__overview'>
                        <h3 class='h3'>Video</h3>
                        <hr>
                        <iframe src='$Video' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>";
                    } ?>



                </div>
                <div class="eachroom__right">
                    <div class="eachroom__right-form">
                        <div class="eachroom__right-textupper">
                            <img src="../images/user.jpg" alt="User" class="eachroom__userimg">
                            <div class="eachroom__right-username">
                                <span class="span"><i class="fa-solid fa-user"></i> Danijela Stevanovic</span>
                                <br>
                                <span class="span"><a href="#">View Listings</a></span>
                            </div>
                        </div>
                        <form method="POST" class="eachroom__right-form" action="../ty.php">
                            <input type="text" name="imePosiljaoca" placeholder="Name">
                            <input type="tel" name="telefonPosiljaoca" placeholder="Phone">
                            <input type="email" name="emailPosiljaoca" placeholder="Email">
                            <textarea name="poruka" cols="30" rows="10" style="resize: none;">Hello, I am interested in <?php echo $naziv ?></textarea>
                            <input type="submit" name="submitPosiljaoca" value="Send message" class="btn">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<?php include "../includes/footer.php"; ?>
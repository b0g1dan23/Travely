<div class="rooms__box">
    <?php
    $result = mysqli_query($con, $ap_query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['idApartmana'];
        $naziv = $row['nazivApartmana'];
        $brSobe = $row['brojSoba'];
        $brKupatila = $row['brKupatila'];
        $brOsobe = $row['maxOsobe'];
        $ulica = $row['ulica'];
        $brUlice = $row['brUlice'];
        $kvadratura = $row['kvadratura'];
        $vlasnik = $row['Vlasnik'];
        $cena = $row['cena'];
        $images = $row['images'];
        $images = preg_split("/\,/", $images);
    ?>
        <div class="rooms__item">
            <img src="<?php echo $images[0] ?>" alt="Hotel 1" class="rooms__item-img">
            <div class="rooms__text">
                <a onclick="window.location.href='eachroom?id=<?php echo $id ?>'" style="cursor:pointer">
                    <h4 class="h4"><?php echo $naziv ?></h4>
                </a>

                <span class="span"><?php echo $ulica . " " . $brUlice ?></span>
                <span class="span rooms__item-span"><span><i class="fa-solid fa-bed"></i> <?php echo $brSobe ?></span>
                    <span><i class="fa-solid fa-shower"></i> <?php echo $brKupatila ?></span>
                    <span><i class="fa-solid fa-ruler"></i> <span class="rooms__kvadratura-span"> <?php echo $kvadratura ?> </span> &#13217;</span></span>
                <span class="span rooms__item-span"><span><i class="fa-solid fa-user"></i> <?php echo $vlasnik ?></span></span>
            </div>
            <div class="rooms__price">
                <div class="rooms__price-upper">
                    <span class="span"><span class="rooms__price-span"><?php echo $cena ?></span>&euro;/day</span>
                </div>
                <div class="rooms__price-lower">
                    <button class="btn rooms__item-btn" onclick="window.location.href='eachroom?id=<?php echo $id ?>'">Details</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
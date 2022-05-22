<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php include "includes/dbconfig.php" ?>



<!-- FEATURES -->
<section class="features">
    <div class="features__boxes">
        <div class="features__box">
            <div class="features__icon">
                <img src="images/icon_1.svg" alt="Hotel icon" class="features__img" />
            </div>
            <div class="features__h2">
                <h2 class="h2">Fabulous Resort</h2>
            </div>
            <div class="features__p">
                <p class="p">
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque
                    eleifend orci ipsum, a bibendum.
                </p>
            </div>
        </div>
        <div class="features__box">
            <div class="features__icon">
                <img src="images/icon_2.svg" alt="Hotel icon" class="features__img" />
            </div>
            <div class="features__h2">
                <h2 class="h2">Infinity Pool</h2>
            </div>
            <div class="features__p">
                <p class="p">
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque
                    eleifend orci ipsum, a bibendum.
                </p>
            </div>
        </div>
        <div class="features__box">
            <div class="features__icon">
                <img src="images/icon_3.svg" alt="Hotel icon" class="features__img" />
            </div>
            <div class="features__h2">
                <h2 class="h2">Luxury Rooms</h2>
            </div>
            <div class="features__p">
                <p class="p">
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque
                    eleifend orci ipsum, a bibendum.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- GALLERY -->
<section class="gallery">
    <div class="gallery__item"></div>
    <div class="gallery__item"></div>
    <div class="gallery__item"></div>
    <div class="gallery__item"></div>
</section>

<section class="bookit">
    <div class="container">
        <div class="bookit__heading">
            <h2 class="h2">Book a room</h2>
        </div>
        <div class="bookit__about">
            <p class="p">
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque
                eleifend orci ipsum, a bibendum lacus suscipit sit. Vestibulum ante
                ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum,
                a bibendum lacus suscipit sit.
            </p>
        </div>
        <div class="bookit__rooms">
            <?php
            $query = "SELECT `idApartmana`,`nazivApartmana`,`cena`, `images` FROM `apartmani` LIMIT 3";
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($res)) {
                $cena = $row['cena'];
                $id = $row['idApartmana'];
                $naziv = $row['nazivApartmana'];
                $slike = $row['images'];
                $slike = preg_split("/\,/", $slike);
                $prva = $slike[0];
                if (strpos('../', $prva) + 1) {
                    $prva = str_replace('../', '', $prva);
                }
                echo "<div class='bookit__item'>
                    <img class='bookit__img' src='$prva' alt='Hotel'>
                <div class='bookit__price'>
                    <p class='p bookit__p'>$$cena/day</p>
                </div>
                    <button class='btn bookit__btn'>$naziv</button>
                </div>";
            }
            ?>
        </div>
    </div>
</section>
<!-- TESTIMONIALS -->
<?php include "includes/testimonials.php" ?>
<!-- FOOTER -->
<?php include "includes/footer.php" ?>
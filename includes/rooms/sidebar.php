
<div class="rooms__right">
    <div class="rooms__title">
        <h3 class="h3">Featured Properties</h3>
    </div>
    <div class="rooms__carousel" data-carousel>
        <button class="rooms__carousel-button prev" data-carousel-button="prev">&lt;</button>
        <button class="rooms__carousel-button next" data-carousel-button="next">&gt;</button>
        <ul data-slides>
            <?php
            $query = "SELECT `images` FROM `apartmani` WHERE `Promo?` = 1";
            $res = mysqli_query($con, $query);
            $index = 0;
            while ($row = mysqli_fetch_assoc($res)) {
                $slike = $row['images'];
                $slike = preg_split("/\,/", $slike);
                $prva = $slike[0];

                $active = $index === 0 ? ' data-active' : '';
                echo "
                <li class='rooms__slide'$active>
                    <img src='$prva' alt='Hotel'>
                </li>";
                $index++;
            }
            ?>
        </ul>
    </div>
    <div class="rooms__title">
        <h3 class="h3">Property Type</h3>
    </div>
    <div class="rooms__type">
        <ul class="rooms__type-ul">
            <li class="rooms__type-li">

            <?php
$query = 'SELECT * FROM apartmani WHERE idHotela = 1';
$res = mysqli_query($con, $query);
$room_query = 'SELECT * FROM apartmani WHERE idHotela != 1';
$room_res = mysqli_query($con, $room_query);
?>

                <a href="?idHotela=1" class="rooms__type-a">&gt; Apartment</a>
                <span class="span rooms__type-span">(<?php echo mysqli_num_rows($res) ?>)</span>
            </li>
            <li class="rooms__type-li">
                <a href="?idHotela=0" class="rooms__type-a">&gt; Hotel Room</a>
                <span class="span rooms__type-span">(<?php echo mysqli_num_rows($room_res) ?>)</span>
            </li>
        </ul>
    </div>
</div>
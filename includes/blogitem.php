<?php
function printBlog($res)
{
    while ($row = mysqli_fetch_assoc($res)) {
        $naslov = $row['naslov'];
        $datum = $row['datum'];
        $sadrzaj = $row['sadrzaj'];
        $pozadina = $row['pozadina'];
?>
        <div class="blogs__item">

            <div class="popup">
                <p class="p"><?php echo $sadrzaj ?></p>
            </div>
            <div class="blogs__img">
                <div class="blogs__date">
                    <a><?php echo $datum ?></a>
                </div>
                <img src="<?php echo $pozadina ?>" alt="Blog 1" />
            </div>
            <div class="blogs__textcontent">
                <div class="blogs__heading">
                    <h2 class="h2"><?php echo $naslov ?></h2>
                </div>
                <div class="blogs__paragraph">
                    <p class="p">
                        <?php echo $sadrzaj ?>
                    </p>
                </div>
                <div class="blogs__button">
                    <button class="btn blogs__actionBtn">Read More</button>
                </div>
            </div>
        </div>
    <?php
    }
}

if (isset($_GET['tag'])) {
    $tag = $_GET['tag'];
    $query = "SELECT * FROM `blogovi` WHERE tagovi LIKE '%$tag%'";
    $res = mysqli_query($con, $query);
    printBlog($res);
} else if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $query = "SELECT blogovi.* FROM `blogoviKategorije` inner JOIN blogovi inner join kategorije ON blogovi.id_blog = blogoviKategorije.id_blog AND kategorije.cat_id = blogoviKategorije.cat_id WHERE kategorije.cat_id = $cat_id";
    $res = mysqli_query($con, $query);
    printBlog($res);
} else if (isset($_GET['id_blog'])) {
    $id_blog = $_GET['id_blog'];
    $query = "SELECT * FROM blogovi WHERE id_blog = $id_blog";
    $res = mysqli_query($con, $query);
    printBlog($res);
} else if (isset($_GET['blogHeading'])) {
    $blogHeading = $_GET['blogHeading'];
    $query = "SELECT * FROM blogovi WHERE naslov LIKE '%$blogHeading%'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) > 0) {
        printBlog($res);
    } else {
    ?>
        <div class="blogs__item">
            <div class="popup">
                <div class="unknown_image"></div>
            </div>
            <div class="blogs__textcontent">
                <div class="blogs__heading">
                    <h2 class="h2">Blog koji trazis ne postoji</h2>
                </div>
                <div class="blogs__paragraph">
                    <p class="p">
                        Paragraf ne postoji jer bloga nema 😔
                    </p>
                </div>
                <div class="blogs__button">
                    <button class="btn blogs__actionBtn">Ne vodi nigde, ali klikni 😊</button>
                </div>
            </div>
        </div>
<?php
    }
} else {
    $query = "SELECT * FROM blogovi";
    $res = mysqli_query($con, $query);
    printBlog($res);
}
?>
<script src="../js/popup.js"></script>
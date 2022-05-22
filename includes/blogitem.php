<?php
function printBlog($res)
{
    while ($row = mysqli_fetch_assoc($res)) {
        $blog_heading = $row['blog_heading'];
        $blog_date = $row['blog_date'];
        $blog_content = $row['blog_content'];
        $blog_bg = $row['blog_bg'];
?>
        <div class="blogs__item">

            <div class="popup">
                <p class="p"><?php echo $blog_content ?></p>
            </div>
            <div class="blogs__img">
                <div class="blogs__date">
                    <a><?php echo $blog_date ?></a>
                </div>
                <img src="<?php echo $blog_bg ?>" alt="Blog 1" />
            </div>
            <div class="blogs__textcontent">
                <div class="blogs__heading">
                    <h2 class="h2"><?php echo $blog_heading ?></h2>
                </div>
                <div class="blogs__paragraph">
                    <p class="p">
                        <?php echo $blog_content ?>
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
    $query = "SELECT * FROM `blogs` WHERE blog_tags LIKE '%$tag%'";
    $res = mysqli_query($con, $query);
    printBlog($res);
} else if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $query = "SELECT blogs.* FROM `blogs_categories` inner JOIN blogs inner join categories ON blogs.id_blog = blogs_categories.id_blog AND categories.cat_id = blogs_categories.cat_id WHERE categories.cat_id = $cat_id";
    $res = mysqli_query($con, $query);
    printBlog($res);
} else if (isset($_GET['id_blog'])) {
    $id_blog = $_GET['id_blog'];
    $query = "SELECT * FROM blogs WHERE id_blog = $id_blog";
    $res = mysqli_query($con, $query);
    printBlog($res);
} else if (isset($_GET['blogHeading'])) {
    $blogHeading = $_GET['blogHeading'];
    $query = "SELECT * FROM blogs WHERE blog_heading LIKE '%$blogHeading%'";
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
    $query = "SELECT * FROM blogs";
    $res = mysqli_query($con, $query);
    printBlog($res);
}
?>
<script src="../js/popup.js"></script>
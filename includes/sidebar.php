<div class="blogs__sidebar">
    <div class="blogs__search">
        <input type="text" id="blog_search" class="footer__input" placeholder="Keywords" />
        <script>
            let blogSearch = document.querySelector('#blog_search');
            const sendSearch = () => {
                window.location.href = `?blogHeading=${blogSearch.value}`;
            };
        </script>
        <input type="submit" value="Search" onclick="sendSearch()" class="btn" />
    </div>

    <div class="blogs__recent">
        <div class="blogs__heading">
            <h4 class="h4">Recents posts</h4>
        </div>
        <div class="blogs__list">
            <ul class="blogs__ul">
                <?php

                use JetBrains\PhpStorm\ArrayShape;

                $query = 'SELECT id_blog,naslov FROM blogovi ';
                $query .= 'ORDER BY datum DESC LIMIT 5';
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                    $naslov = $row['naslov'];
                    $id_blog = $row['id_blog'];
                    echo "<li class='blogs__li'><a href='?id_blog=$id_blog' class='blogs__a'>$naslov</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="blogs__recent">
        <div class="blogs__heading">
            <h4 class="h4">Categories</h4>
        </div>
        <div class="blogs__list">
            <ul class="blogs__ul">
                <?php
                $query = 'SELECT kategorije.cat_id, kategorije.cat_title FROM `blogoviKategorije` inner JOIN blogovi inner join kategorije ON blogovi.id_blog = blogoviKategorije.id_blog AND kategorije.cat_id = blogoviKategorije.cat_id GROUP BY(cat_id)';
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<li class='blogs__li'><a href='?cat_id=$cat_id' class='blogs__a'>$cat_title</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="blogs__recent">
        <div class="blogs__heading">
            <h4 class="h4">Tags</h4>
        </div>
        <div class="blogs__list">
            <ul class="blogs__ul-random">
                <?php
                $query = 'SELECT tagovi from blogovi';
                $res = mysqli_query($con, $query);
                $tagovi = '';
                while ($row = mysqli_fetch_assoc($res)) {
                    $tagovi .= $row['tagovi'] . ',';
                }
                $tagovi = trim($tagovi);
                $tagovi_arr = array_unique(preg_split("/\,/", $tagovi));
                foreach ($tagovi_arr as $tag) {
                    if ($tag) echo "<li class='blogs__li-random'><a href='?tag=$tag' class='blogs__a-random'>$tag</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<header class="header">
    <div class="container">
        <div class="header__content">
            <div class="header__logo">
                <a href="<?php if ($filename != 'index') echo '../' ?>index" class="header__link">Travely</a>
            </div>
            <div class="header__right">
                <!-- Navigation -->
                <nav class="navigation">

                    <ul class="navigation__list">
                        <a class="navigation__link navigation__burger navigation__burger-open"><i class="gg-menu-right-alt"></i></a>
                        <a class="navigation__link navigation__burger navigation__burger-close"><i class="fa-solid fa-xmark"></i></a>
                        <li class="navigation__listitem">
                            <a href="<?php if ($filename != 'index') echo '../' ?>" class="navigation__link">Home</a>
                        </li>
                        <li class="navigation__listitem">
                            <a href="<?php if ($filename == 'index') echo 'pages/' ?>rooms" class="navigation__link">Rooms</a>
                        </li>
                        <li class="navigation__listitem">
                            <a href="<?php if ($filename == 'index') echo 'pages/' ?>blog" class="navigation__link">Blogs</a>
                        </li>
                        <button class="btn btn-hover navigation__button" onclick="window.location.href = '<?php if ($filename == 'index') echo 'pages/' ?>rooms'">
                            Book Online
                        </button>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</header>
<!-- Main background -->
<div class="home" id='<?php echo $filename ?>'>
    <!-- Header -->
    <div class="home__text">
        <h1 class="h1 home__h1"><?php switch ($filename) {
                                    case 'index':
                                        echo 'A Luxury Stay';
                                        break;
                                    case 'contact':
                                        echo 'Contact';
                                        break;
                                    case 'about':
                                        echo 'About us';
                                        break;
                                    case 'blog':
                                        echo 'Blog';
                                        break;
                                    case 'rooms':
                                        echo 'Rooms';
                                        break;
                                    case 'eachroom':
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $query = "SELECT nazivApartmana FROM `apartmani` WHERE idApartmana = $id;";
                                            $res = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $naziv = $row['nazivApartmana'];
                                            }
                                            echo $naziv;
                                        }
                                        break;
                                } ?></h1>
    </div>
    <div class="container">
        <!-- <form method="GET" action="<?php if ($filename == 'index' || $filename == '') echo 'pages/' ?>rooms" class="home__form"> -->
        <input type="text" placeholder="Search Apartments" name="paralia" class="base_input base__textic" />
        <div class="dropdown">
            <button type="button" title="Caooos" class="base_input base_input-button">
                <i class="fa-solid fa-user"></i>
                <span id="updateAdults" name="adults">1</span> adult &#8226;
                <span id="updateChildren" name="children">0</span> children &#8226;
                <span id="updateRooms" name="rooms">1</span> room
            </button>
            <div class="dropdown-content">
                <ul class="dropdown_ul">
                    <li class="dropdown_li">
                        <span class="dropdown_span">Adults</span>
                        <div class="dropdown_right">
                            <button type="button" class="dropdown_btn-box dropdown_btn-adults"><i class="fa-solid fa-minus dropdown_btn dropdown-adults"></i></button>
                            <span class="dropdown_span-right" id='dropdown_span-right--adults'>1</span>
                            <button type="button" class="dropdown_btn-box dropdown_btn-adults"><i class="fa-solid fa-plus dropdown_btn dropdown-adults"></i></button>
                        </div>
                    </li>
                    <li class="dropdown_li">
                        <span class="dropdown_span">Children</span>
                        <div class="dropdown_right">
                            <button type="button" class="dropdown_btn-box dropdown_btn-children"><i class="fa-solid fa-minus dropdown_btn dropdown-children"></i></button>
                            <span class="dropdown_span-right" id='dropdown_span-right--children'>0</span>
                            <button type="button" class="dropdown_btn-box dropdown_btn-children"><i class="fa-solid fa-plus dropdown_btn dropdown-children"></i></button>
                        </div>
                    </li>
                    <li class="dropdown_li">
                        <span class="dropdown_span">Rooms</span>
                        <div class="dropdown_right">
                            <button type="button" class="dropdown_btn-box dropdown_btn-rooms"><i class="fa-solid fa-minus dropdown_btn dropdown-rooms"></i></button>
                            <span class="dropdown_span-right" id='dropdown_span-right--rooms'>1</span>
                            <button type="button" class="dropdown_btn-box dropdown_btn-rooms"><i class="fa-solid fa-plus dropdown_btn dropdown-rooms"></i></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <script>
            let searchText = document.querySelector(".base__textic");
            let adults = document.querySelector('#updateAdults');
            let children = document.querySelector('#updateChildren');
            let rooms = document.querySelector('#updateRooms');

            function sendText() {
                window.location.href = `<?php if ($filename == 'index' || $filename == '') echo 'pages/' ?>rooms?paralia=${searchText.value}&adults=${adults.textContent}&children=${children.textContent}&rooms=${rooms.textContent}`
            }
        </script>
        <button type="submit" class="btn" onclick="sendText()">Search</a>
            <!-- </form> -->
    </div>
</div>
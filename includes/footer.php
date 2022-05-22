<footer class="footer">
    <div class="container">
        <div class="footer__content">
            <div class="footer__logo">
                <a href="<?php if ($filename != 'index') echo '../' ?>index" class="footer__link">Travely</a>
            </div>
            <div class="footer__logo-down">
                <a href="#" class="footer__link-down">since 2014</a>
            </div>
            <div class="container">
                <div class="footer__down">
                    <div class="footer__address">
                        <h4 class="h4">Our Address</h4>
                        <div class="footer__list">
                            <span class="span">Beach Str 345 <br> 67559 Miami <br> USA</span>
                        </div>
                    </div>
                    <div class="footer__reservations">
                        <h4 class="h4">Reservations</h4>
                        <div class="footer__list">
                            <span class="span">Tel: 345 5667 889 <br> reservations@hotelba.com</span>
                        </div>
                    </div>
                    <div class="footer__newsletter">
                        <h4 class="h4">Newsletter</h4>
                        <form method="POST" action="<?php if ($filename != 'index') echo '../' ?>ty">
                            <input type="email" name="email" placeholder="Your email address" class="footer__input" required />
                            <input type="submit" name="submit" value="Subscribe" class="btn footer__btn" />
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<script type="module" src="<?php if ($filename != 'index') echo '../' ?>js/index.js"></script>
</body>

</html>
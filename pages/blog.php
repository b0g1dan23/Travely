<?php include "../includes/header.php" ?>
<?php include "../includes/dbconfig.php" ?>
<!-- HEADER & HOME -->
<?php include "../includes/navigation.php" ?>
<!-- Content -->
<main>

  <section class="blogs">
    <div class="container">
      <div class="blogs__content">
        <div class="blogs__items">
          <div class="overlay">&nbsp;</div>
          <?php include "../includes/blogitem.php" ?>
        </div>

        <!-- Sidebar -->
        <?php include "../includes/sidebar.php" ?>
      </div>
    </div>
  </section>
</main>
<!-- FOOTER -->
<?php include "../includes/footer.php" ?>
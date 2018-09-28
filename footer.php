    <footer>
      <div class="container">
        <div class="row">
          <div class="column">
            <div class="title">Contact Details</div>
          </div>

          <div class="column">
            <div class="title">Navigation</div>
            <?php wp_nav_menu('main'); ?>
          </div>

          <div class="column">
            <div class="title">Navigation</div>
            <?php wp_nav_menu('footer'); ?>
          </div>

          <div class="column">
            <div class="title">Policies</div>
            <?php wp_nav_menu('policies'); ?>

            <div class="formation-badge" data-start-colour="#fff" data-hover-colour="#5dc145">
              <script src="https://formationmedia.co.uk/scripts/badge/badge.js"></script>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>

  </body>
</html>

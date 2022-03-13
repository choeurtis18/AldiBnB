</div>

<footer>
  <section class="footer-section">
      <a href="<?php echo home_url(); ?>">
      <div id="" class="abnb-footer-child abnb-footer-icon">
        <img src="<?php get_template_directory_uri() ?>/wp-content/uploads/2022/03/logo.png" alt="AldiBnB Logo">
          <p>ALDIB'n'B</p>
      </div>
      </a>
  </section>

  <section class="footer-section">
      <?php wp_nav_menu([
      'theme_location' => 'header', 
      'container' => false,
      'menu_class' => "abnb-footer-child"
      ]) 
      ?>
  </section>

  <section class="footer-section footer-iconsGroup">
    <a class="footer-icon" href="#!" role="button"><i class="fa fa-facebook-square"></i></a>
    <a class="footer-icon" href="#!" role="button"><i class="fa fa-instagram"></i></a>
    <a class="footer-icon" href="#!" role="button"><i class="fa fa-twitter"></i></a>
    <a class="footer-icon" href="#!" role="button"><i class="fa fa-linkedin-square"></i></a>
  </section>

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    <p>© 2020 Copyright: <a class="text-white" href="<?php echo home_url(); ?>">ALDIB'n'b.com</a></p> 
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

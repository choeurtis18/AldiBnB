</div>

<style>
.abnb-footer-child {
color: #fff;
    list-style-type: none;
    text-decoration: none;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    padding: 0;
}
</style>

<footer class="bg-dark text-center text-white">
  <div class="container p-4">

    <section class="mb-4">
        <a href="<?php echo home_url(); ?>">
        <div id="" class="abnb-footer-child abnb-footer-icon">
            <i class="fa fa-home fa-2xl" aria-hidden="true"></i>
            <p>ALDIB'n'B</p>
        </div>
        </a>
    </section>

    <section class="mb-4">
        <?php wp_nav_menu([
        'theme_location' => 'header', 
        'container' => false,
        'menu_class' => "abnb-footer-child"
        ]) 
        ?>
    </section>

    <section class="mb-4">
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-facebook-f"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-instagram"></i
      ></a>
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-linkedin"></i
      ></a>
    </section>
    
  </div>
  
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="<?php echo home_url(); ?>">ALDIB'n'b.com</a>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

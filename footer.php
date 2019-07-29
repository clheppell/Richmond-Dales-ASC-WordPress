<?php
global $wp;
$current_url = urlencode(home_url(add_query_arg(array(), $wp->request)));
?>
<footer>
  <!-- THE HEPPELL FOOTER -->
  <div class="cls-global-footer cls-global-footer-inverse cls-global-footer-body d-print-none focus-highlight pb-0 mt-5">
    <div class="container">
      <div class="hidden-print">
        <div class="row">
          <div class="col-md-6">
            <p class="lead"><strong>Our pools</strong></p>
            <div class="row">
              <div class="col-lg-6">
                <address>
                  <!--<strong><?php bloginfo('name'); ?></strong><br>-->
                  <strong>Richmond Swimming Pool</strong><br>
                  Station Road<br>
                  Richmond<br>
                  DL10 4LD
                </address>
              </div>
              <div class="col-lg-6">
                <address>
                  <!--<strong><?php bloginfo('name'); ?></strong><br>-->
                  <strong>Catterick Leisure Centre</strong><br>
                  Gough Road<br>
                  Catterick Garrison<br>
                  DL9 3EL
                </address>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <p class="lead"><strong>Contact us</strong></p>
            <p class="mb-0"><a href="mailto:tbc@rdasc.org.uk" target="new">Email us</a></p>
            <p><a href="https://membership.rdasc.org.uk/reportanissue?url=<?=$current_url?>">Report an issue with this page</a></p>
          </div>
          <div class="col-md-6 col-lg-3">
            <p class="lead"><strong>Other swimming sites</strong></p>
            <ul class="list-unstyled cls-global-footer-link-spacer">
              <li><a title="British Swimming" target="_blank" href="http://www.swimming.org/britishswimming/">British Swimming</a></li>
              <li><a title="the Amateur Swimming Association" target="_blank" href="http://www.swimming.org/swimengland/">Swim England</a></li>
              <li><a title="Swim England North East Region" target="_blank" href="http://asaner.org.uk/">Swim England North East</a></li>
              <li><a title="Northumberland and Durham Swimming" target="_blank" href="http://asaner.org.uk/northumberland-durham-swimming-association/">Northumberland &amp; Durham Swimming</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cls-global-footer-legal">
    <div class="container">
      <div class="row">
        <div class="col source-org vcard copyright">
          <p class="mb-0" style="margin-bottom:0">&copy; <?=current_time("Y", $gmt = 0)?> <span class="org fn"><?php bloginfo('name'); ?></span>. Designed by Chris Heppell.</p>
        </div>
      </div>
    </div>
  </div> <!-- /.container -->

  <!-- Modals and Other Hidden HTML -->
  <?php wp_footer(); ?>
  <?php $theme_dir = get_template_directory_uri(); ?>
  <script rel="preload" src="<?=$theme_dir?>/js/jquery-3.3.1.slim.min.js"></script>
  <script src="<?=$theme_dir?>/js/popper.min.js"></script>
  <script src="<?=$theme_dir?>/js/bootstrap.min.js"></script>
  <script async src="<?=$theme_dir?>/js/Cookies.js"></script>
  <script async src="<?=$theme_dir?>/js/chester.js"></script>
</footer>

</body>
</html>

<div class="d-print-none">
  <h3>More from <?php bloginfo('name'); ?></h3>
  <p>
    <a class="btn btn-light" data-parent="#collapse-more" role="button" data-toggle="collapse" href="#collapse-searchbox" aria-expanded="false" aria-controls="collapse-searchbox">
      Search
    </a>
    <a class="btn btn-light" data-parent="#collapse-more" role="button" data-toggle="collapse" href="#collapse-recentposts" aria-expanded="false" aria-controls="collapse-recentposts">
      Recent
    </a>
  </p>
  <div id="collapse-more accordion-group">
    <div class="collapse" id="collapse-searchbox">
      <div class="cell">
        <?php get_search_form(); ?>
      </div>
    </div>
    <div class="collapse" id="collapse-recentposts">
      <div class="cell text-left">
        <h3 class="sidebar-module-title">Recent News</h3>
        <ul class="mb-0">
          <?php
          $args = array(
            'numberposts' => 5,
            'offset' => 0,
            'category' => 0,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'include' => '',
            'exclude' => '',
            'meta_key' => '',
            'meta_value' =>'',
            'post_type' => 'post',
            'post_status' => 'publish, future, pending, private',
            'suppress_filters' => true
          );

          $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
            foreach ($recent_posts as $recent) { ?>
              <li><a href="<?=get_permalink($recent["ID"])?>">
                <?=htmlspecialchars($recent["post_title"])?>
              </a></li>
            <?php } 
            wp_reset_query();
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>

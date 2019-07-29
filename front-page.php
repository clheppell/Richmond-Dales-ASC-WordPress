<?php

$file = null;
$cache_file = get_template_directory() . '/cache/SE-News.json';
if(file_exists($cache_file)) {
if(time() - filemtime($cache_file) > 10800) {
    // too old , re-fetch
    $cache = file_get_contents('https://www.swimming.org/sport/wp-json/wp/v2/posts');
    file_put_contents($cache_file, $cache);
    $file = $cache;
  } else {
    $file = file_get_contents($cache_file);
  }
} else {
  // no cache, create one
  $cache = file_get_contents('https://www.swimming.org/sport/wp-json/wp/v2/posts');
  file_put_contents($cache_file, $cache);
  $file = $cache;
}
$asa = json_decode($file);

$file = null;
$cache_file = get_template_directory() . '/cache/SE-NE.xml';
if (file_exists($cache_file)) {
  if (time() - filemtime($cache_file) > 10800) {
    // too old , re-fetch
    $cache = file_get_contents('http://asaner.org.uk/feed/');
    file_put_contents($cache_file, $cache);
    $file = $cache;
  } else {
    $file = file_get_contents($cache_file);
  }
} else {
  // no cache, create one
  $cache = file_get_contents('http://asaner.org.uk/feed/');
  file_put_contents($cache_file, $cache);
  $file = $cache;
}
$asa_ne = null;
try {
  $asa_ne = new SimpleXMLElement($file);
} catch (Exception $e) {
}

get_header(); ?>

<div class="">
  <div class="container">
    <?php if (have_posts()) { ?>
    <div class="row mb-4 blog-main">
			<div class="col-md-9">
        <?php while (have_posts()) { the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('post blog-post'); ?>>
          <h1><?php the_title(); ?></h1>
          <div class="entry entry-content clearfix">
            <?php the_content(); ?>
          </div>
        </div>
        <?php } ?>
			</div>
    </div>
    <?php } ?>
    
    <div class="mb-4">
      <h2 class="mb-4">Latest News</h2>
      <div class="news-grid">
        <?php
        $args = [
        	'numberposts' => 6,
        	'offset' => 0,
        	'category' => 0,
        	'orderby' => 'post_date',
        	'order' => 'DESC',
        	'include' => '',
        	'exclude' => '',
        	'meta_key' => '',
        	'meta_value' =>'',
        	'post_type' => 'post',
        	'post_status' => 'publish',
        	'suppress_filters' => true
        ];
        /* post status, future, pending, private */
        $recent_posts = wp_get_recent_posts($args, ARRAY_A);
      	foreach($recent_posts as $recent) { ?>
      	<a href="<?=get_permalink($recent["ID"])?>" title="<?=$recent["post_title"]?>">
          <span class="title"><?=$recent["post_title"]?></span>
          <span class="category"><?=get_the_category($recent["ID"])[0]->name?></span>
        </a>
      	<?php }
      	wp_reset_query();
        ?>
			</div>
		</div>

    <?php if (function_exists('eo_get_events')) { ?>
    <div class="mb-4">
      <h2 class="mb-4">Upcoming Galas</h2>
      <div class="news-grid">
        <!--<a href="/competitions">Due to issues beyond our control, the list of upcoming galas is currently unavailable.</a>-->
        <?php

        $events = eo_get_events([
				  'numberposts'       => 6,
				  'event_end_after'   => date("Y-m-d"),
          'group_events_by'   => 'series',
          'event-category'    => 'galas'
				]);

      	foreach($events as $event) {
          $format = (eo_is_all_day($event->ID) ? 'j F' :  'H:i, j F');
          ?>
      	<a href="<?=get_permalink($event->ID)?>" title="<?=get_the_title($event->ID)?>, <?=eo_get_venue_name(eo_get_venue($event->ID))?>">
          <div>
            <span class="title mb-0"><?=get_the_title($event->ID)?></span>
            <span class="d-flex mb-3"><?=eo_get_venue_name(eo_get_venue($event->ID))?></span>
          </div>
          <?php
          $output = "";
          $start = eo_get_the_start($format, $event->ID, null, $event->occurrence_id);
          $end = eo_get_the_end($format, $event->ID, null, $event->occurrence_id);
          if ($start != $end) {
            $output = $start . " to " . $end;
          } else {
            $output = $start;
          } ?>
          <span class="category"><?=$output?></span>
        </a>
      	<?php }
      	wp_reset_query();

        ?>
			</div>
		</div>
    <?php } ?>

    <?php if ($asa != null && $asa != "") { ?>
    <div class="mb-4">
      <h2 class="mb-4">Swim England News</h2>
      <div class="news-grid">
        <?php
        $site = get_site_url();
        $max_posts = 6;
        if (sizeof($asa) < $max_posts) {
          $max_posts = sizeof($asa);
        }
        for ($i = 0; $i < $max_posts; $i++) { ?>
  			<a href="<?=$asa[$i]->link?>" target="_blank" title="<?=$asa[$i]->title->rendered?>">
  				<span class="mb-3">
            <span class="title mb-0">
  						<?=$asa[$i]->title->rendered?>
  					</span>
  				</span>
          <span class="category">
  					News
  				</span>
        </a>
        <?php } ?>
  		</div>
  	</div>
    <?php } ?>

    <?php if ($asa_ne != null) { ?>
    <div class="mb-4">
      <h2 class="mb-4">Swim England North East News</h2>
      <div class="news-grid">
        <?php
        $max_posts = 6;
        if (sizeof($asa_ne->channel->item) < $max_posts) {
          $max_posts = sizeof($asa_ne->channel->item);
        }
        for ($i = 0; $i < $max_posts; $i++) { ?>
  			<a href="<?=$asa_ne->channel->item[$i]->link?>" target="_blank" title="<?=$asa_ne->channel->item[$i]->title?> (<?=$asa_ne->channel->item[$i]->category?>)">
  				<span class="mb-3">
            <span class="title mb-0">
  						<?=$asa_ne->channel->item[$i]->title?>
  					</span>
  				</span>
          <span class="category">
  					<?=$asa_ne->channel->item[$i]->category?>
  				</span>
        </a>
        <?php } ?>
  		</div>
  	</div>
    <?php } ?>

  </div>
</div>

<!--<div class="container"><div class="row front-page-content"></div></div>-->
<?php get_footer();


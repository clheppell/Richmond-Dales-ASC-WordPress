<?php get_header(); ?>
<?php get_template_part('pageheader'); ?>

<div class="container">

  <div class="cell bg-primary-dark text-white mb-5">
    <h1 class="mb-4">Search Results</h1>
    <div id="search">
      <?php get_search_form(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 blog-main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="cell">
        <h2>
          <a href="<?php the_permalink() ?>" rel="bookmark">
            <?php the_title(); ?>
          </a>
        </h2>

        <?php the_excerpt(); ?>
      </div>

	    <?php endwhile; else: ?>
	    <p class="lead">
        Sorry. We didn't find anything for that.
      </p>
      
      <p>
        Please try another search.
      </p>
      
	    <?php endif; ?>

      <?php if ( function_exists('wp_bootstrap_pagination') ) wp_bootstrap_pagination(); ?>

      </div><!-- /.blog-main -->
    <div class="col-lg-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>

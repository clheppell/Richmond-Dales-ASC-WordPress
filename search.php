<?php get_header(); ?>
<?php get_template_part('pageheader'); ?>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="cell bg-dark text-white mb-5">
        <h1 class="mb-4">Search Results</h1>
        <div id="search">
        <?php

          $search_terms = '';

          if (isset($_GET["s"])) {
            $search_terms = htmlspecialchars($_GET["s"]);
          }

          ?>

          <form action="<?=get_home_url()?>/" id="searchform" method="get">
            <label for="s" class="sr-only">Search</label>
            <div class="input-group input-group-lg">
              <input type="search" class="form-control" id="s" name="s" placeholder="Search the site"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
              </div>
            </div>
          </form>
        </div>
      </div>

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

    </div>
  </div>
</div>
<?php get_footer(); ?>

<?php

date_default_timezone_set('Europe/London');

$search_terms = '';
if (isset($_GET["s"])) {
  $search_terms = htmlspecialchars($_GET["s"]);
}
$theme_dir = get_template_directory_uri();

if (isset($_GET['theme_opt'])) {
  $_SESSION['theme_opt'] = $_GET['theme_opt'];
}
?>
<!DOCTYPE html>
<!--
Copyright Chris Heppell 2019. 

Bootstrap CSS and JavaScript is Copyright Twitter Inc, 2011-2019,
jQuery v3.1.0 is Copyright jQuery Foundation 2016,

Designed by Chris Heppell, www.chrisheppell.uk

-->
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-title" content="RDASC">
    <meta name="format-detection" content="telephone=no">
    <!--<script>var shiftWindow = function() { scrollBy(0, -100) }; if (location.hash) shiftWindow(); window.addEventListener("hashchange", shiftWindow);</script>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700|Merriweather:400,600" type="text/css">
    <link rel="stylesheet" href="<?=$theme_dir?>/css/init1-prefixed.css" type="text/css">
    <link rel="stylesheet" href="<?=$theme_dir?>/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="icon" sizes="196x196" href="<?=$theme_dir?>/img/touch-icon-196x196.png">
    <!-- For Chrome for Android: -->
    <link rel="icon" sizes="192x192" href="<?=$theme_dir?>/img/touch-icon-192x192.png">
    <!-- For iPhone 6 Plus with @3× display: -->
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?=$theme_dir?>/img/apple-touch-icon-180x180-precomposed.png">
    <!-- For iPad with @2× display running iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=$theme_dir?>/img/apple-touch-icon-152x152-precomposed.png">
    <!-- For iPad with @2× display running iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$theme_dir?>/img/apple-touch-icon-144x144-precomposed.png">
    <!-- For iPhone with @2× display running iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=$theme_dir?>/img/apple-touch-icon-120x120-precomposed.png">
    <!-- For iPhone with @2× display running iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$theme_dir?>/img/apple-touch-icon-114x114-precomposed.png">
    <!-- For the iPad mini and the first- and second-generation iPad (@1× display) on iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?=$theme_dir?>/img/apple-touch-icon-76x76-precomposed.png">
    <!-- For the iPad mini and the first- and second-generation iPad (@1× display) on iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$theme_dir?>/img/apple-touch-icon-72x72-precomposed.png">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="<?=$theme_dir?>/img/apple-touch-icon-precomposed.png"><!-- 57×57px -->
    <link rel="mask-icon" href="<?=$theme_dir?>/img/apple/chesterIcon.svg" color="#bd0000">
    <meta name="application-name" content="<?php bloginfo('name'); ?>"/>
    <meta name="msapplication-square70x70logo" content="small.jpg"/>
    <meta name="msapplication-square150x150logo" content="medium.jpg"/>
    <meta name="msapplication-wide310x150logo" content="wide.jpg"/>
    <meta name="msapplication-square310x310logo" content="large.jpg"/>
    <meta name="msapplication-TileColor" content="#bd0000"/>
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .focus-highlight a:focus, .blog-sidebar a:focus, .event a:focus, .hentry a:focus, .blog-main a:focus {
        background: #ffbf47;
        outline: 3px solid #ffbf47;
        outline-offset: 0;
      }
      footer .focus-highlight a:focus {
        color: #212529;
      }
      <? if (date("m") == "12") { ?>
      .bg-primary-darker {
        /*background:#005fbd;*/
        background-image:url("https://www.chesterlestreetasc.co.uk/wp-content/themes/chester/img/christmas.png");
        background-size:50% auto;
        padding:1rem;
        color:#fff;
        text-shadow: 1px 1px 1px rgba(0,0,0,.5);
      }
      <? } ?>
    </style>

  </head>
  <?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

    <div class="sr-only sr-only-focusable">
      <a href="#maincontent">Skip to main content</a>
    </div>

    <noscript>
      <div class="bg-dark text-white box-shadow py-2 d-print-none">
        <div class="container">
          <p class="mb-0">
            <strong>
              JavaScript is disabled or not supported
            </strong>
          </p>
          <p>
      	    It looks like you've got JavaScript disabled or your browser does not
      	    support it. JavaScript is essential for our website to properly so we
      	    recommend you enable it or upgrade to a browser which supports it as
      	    soon as possible. <strong><a href="http://browsehappy.com/" class="text-white"
      	    target="_blank">Upgrade your browser today <i class="fa
      	    fa-external-link" aria-hidden="true"></i></a></strong>.
          </p>
          <p class="mb-0">
            If JavaScript is not supported by your browser, <?php bloginfo('name'); ?>
            recommends you install <strong><a class="text-white"
            href="https://www.firefox.com">Firefox by Mozilla</a></strong>.
          </p>
        </div>
      </div>
    </noscript>

    <div class="d-print-none festive">

      <div class="mb-5">

        <div class="py-3 d-block">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <a href="<?=esc_url(home_url('/'))?>" title="Website Homepage" class="text-decoration-none">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <img class="logo" src="<?=get_template_directory_uri()?>/img/logo.jpg">
                    </div>
                    <div class="col">
                      <h1><?php bloginfo('name'); ?></h1>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col d-none d-lg-flex">
                <!--<p class="lead mb-0 ml-auto text-right"><?bloginfo('description')?></p>-->
                <form class="ml-auto" action="<?=esc_url(home_url('/'))?>" id="head-search" method="get">
                  <label for="s" class="sr-only">Search</label>
                  <div class="input-group">
                    <input class="form-control border-primary" id="s" name="s" placeholder="Search the site" type="search" <?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?>>
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                        <span class="sr-only">
                          Search
                        </span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="d-block">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark justify-content-between mb-0 bg-primary rounded">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#chesterNavbar" aria-controls="chesterNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
              <?php
                wp_nav_menu( array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
                  'container_id'      => 'chesterNavbar',
                  'menu_class'        => 'nav navbar-nav mr-auto',
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker())
                );
              ?>
            </nav>
          </div>
        </div>

      </div>

    </div>

    <div id="maincontent"></div>

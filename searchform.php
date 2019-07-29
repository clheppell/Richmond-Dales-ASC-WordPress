<?php

$search_terms = '';

if (isset($_GET["s"])) {
  $search_terms = htmlspecialchars($_GET["s"]);
}

?>

<form action="<?=get_home_url()?>/" id="searchform" method="get">
  <label for="s" class="sr-only">Search</label>
  <div class="input-group">
    <input type="search" class="form-control" id="s" name="s" placeholder="Search the site"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
    </div>
  </div>
</form>

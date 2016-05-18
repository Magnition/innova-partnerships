<?php get_header(); ?>
<?php if ( have_posts() ) : ?>	
<div class="container-fluid blog-banner">
    <div class="row">
      <div class="container">
	<h1>Search Results for <?php printf( __( '%s', 'bootstrapwp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      </div>
    </div>
</div>

<div class="container-fluid blog-body">
    <div class="row-fluid">
            <div class="container">
                <div class="col-md-8 col-sm-8">
                    <?php get_template_part('loop', 'search'); ?>
					
<?php else : ?>
<div class="container-fluid blog-banner">
    <div class="container">
      <div class="row">
	<h1>Search Results for <?php printf( __( '%s', 'bootstrapwp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      </div>
    </div>
</div>

<div class="container-fluid blog-body">
    <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-8">
				  <?php _e( 'Unfortunately no results matched your search. You may wish to try again using a different search term.<br><br> If the product you are looking for is not in our catalogue, don&rsquo;t forget about our <a href="/custom-affimers/">custom Affimer service</a>. A typical project only takes 7 weeks! <br>', 'bootstrapwp' ); ?></p>
<?php endif; ?>
	  <?php search_nav( 'nav-below' ); ?>
					
                </div>
			<?php get_sidebar(); ?>
            </div><!-- /.kc-wrap -->
    </div><!-- /.row-fluid -->
</div><!-- /.container-fluid -->
<?php get_footer(); ?>
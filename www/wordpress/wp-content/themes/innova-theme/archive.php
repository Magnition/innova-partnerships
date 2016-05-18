<?php get_header(); ?>
<div class="container-fluid blog-banner">
    <div class="row">
      <div class="container">
	<h1>Archive News</h1>
      </div>
    </div>
</div>

<div class="container-fluid blog-body">
  <div class="container">
    <div class="row">
	<div class="col-md-8">
	    <?php
	    //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	    //query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>5) );
	    if (have_posts()) : while ( have_posts() ) : the_post(); ?>
	    <?php if ( has_post_thumbnail() ): ?>
	    <div class="row post-wrap-image">
	      <div class="col-md-2 col-sm-2">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		  <?php the_post_thumbnail('full', array( 'class' => 'img-responsive' ));?></a>
	      </div><!-- /.col-md-6 -->
	      <div class="col-md-9 col-sm-9 col-md-offset-1 col-sm-offset-1 content">
		<p class="heading"><?php the_time('jS F Y'); ?></p>
		<h2 class="blog_title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="btn btn-grey">Read More</a>
	      </div><!-- /.col-md-6 -->
	    </div><!-- /.post-wrap -->
	    <?php else: ?>
	      <div class="row post-wrap">
		<div class="col-md-12">
		  <p class="heading"><?php the_time('jS F Y'); ?></p>
		  <h2 class="blog_title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
		  <?php the_excerpt(); ?>
		  <a href="<?php the_permalink(); ?>" class="btn btn-grey">Read More</a>
		</div><!-- /.col-md-6 -->
	      </div><!-- /.post-wrap -->
	    <?php endif; ?>
	  
	  <?php endwhile; endif; ?>
	</div><!-- /.col-md-8 -->
	<?php get_sidebar(); ?>
    </div><!-- /.row -->
    
	  <?php lees_paging_nav('');?>
  </div><!-- /.container -->
</div><!-- /.container-fluid -->

<?php get_footer();?>
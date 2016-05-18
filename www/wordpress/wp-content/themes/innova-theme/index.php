<?php get_header(); ?>
<section class="range-banner blog-banner">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="container">
                <div class="col-md-3 col-sm-3">
                    <h1><span>Latest News</span></h1>
                </div><!-- /.col-sm-2 -->
            </div><!-- /.container -->
            <div class="fadestrip"></div>
        </div>
    </div>
</section><!-- /.range-banner -->

<section class="blog-body">
    <div class="container">
        <div class="row">
            <!-- /.blog body -->
            <div class="col-md-7 col-sm-7">
             
			 <?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>5) );
			if (have_posts()) : while ( have_posts() ) : the_post(); ?>
			<?php if ( has_post_thumbnail() ): ?>
			 
                <!-- /.start post -->
                <div class="post-wrap">
                    <div class="col-md-12 col-sm-12 cat-tags"><a href="#">Category Tag</a> | <a href="#">Category Tag</a></div>
                    <div class="blog-post">
                        <div class="col-md-6 col-sm-6">
                            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h1>
                            <p>By <?php the_author(); ?> | <?php the_time('jS F Y'); ?></p>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-grey">Read More</a>
                        </div><!-- /.col-md-6 content --> 
                        <div class="col-md-6 col-sm-6 blog-img">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('full', array( 'class' => 'img-responsive' ));?></a>
                        </div><!-- /.col-md-6 image -->
                    </div><!-- /.blog-post -->
                </div><!-- /.post-wrap -->
                <!-- /.end post -->
	    <?php else: ?>
	      <div class="post-wrap">
                    <div class="col-md-12 col-sm-12 cat-tags"><a href="#">Category Tag</a> | <a href="#">Category Tag</a></div>
                    <div class="blog-post">
                        <div class="col-md-12 col-sm-12">
                            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h1>
                            <p>By <?php the_author(); ?> | <?php the_time('jS F Y'); ?></p>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-grey">Read More</a>
                        </div><!-- /.col-md-6 content --> 
                        
                    </div><!-- /.blog-post -->
                </div><!-- /.post-wrap -->
                <!-- /.end post -->
	    <?php endif; ?>
	  <?php endwhile; endif; ?>
	  <?php lees_paging_nav('');?>
            </div><!-- /.col-md-8 -->
            <!-- /. sidebar here and editable in sidebar.php -->
            <?php get_sidebar(); ?>
            <!-- /.end sidebar -->
        </div><!-- ./row -->
    </div><!-- /.container -->
</section><!-- /.blog-body -->


<?php get_footer();?>
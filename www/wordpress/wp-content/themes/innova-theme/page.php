<?php
   /**
    * Template Name: Basic Page
    * Description: Basic Page Template
    */
   get_header(); ?>

<section class="range-banner blog-banner">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="container">
                <div class="col-md-3 col-sm-3">
                    <h1><span><?php the_title();?></span></h1>
                </div><!-- /.col-sm-2 -->
            </div><!-- /.container -->
            <div class="fadestrip"></div>
        </div>
    </div>
</section><!-- /.range-banner -->


<?php //if (have_posts()) : while ( have_posts() ) : the_post(); ?>
<section class="blog-body">
    <div class="container">
        <div class="row">

                <div class="col-md-12 col-sm-12 post-body">

                    <?php //the_content(); ?>
                </div><!-- /.col-md-10 -->
                
                <div class="col-md-12 col-sm-12 post-body content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();

							get_template_part('content', 'page');

							echo "\n\n";
							
							// If comments are open or we have at least one comment, load up the comment template
							if (comments_open() || '0' != get_comments_number()) {
								comments_template();
							}

							echo "\n\n";

						} //endwhile;
						?> 
					</main>
				</div>

        </div><!-- ./row -->
    </div><!-- /.container -->
</section><!-- /.blog-body -->
<?php //endwhile; endif; ?>

<!-- This includes the conditional footer elements for showrooms and CTA bar -->
<?php include_once('repeaters/conditional-footer.php'); ?>

<?php get_footer();?>
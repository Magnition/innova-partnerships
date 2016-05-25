<?php
/**
* Template Name: Business Growth Page
* Description: Business Growth template
*/
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<h3 class="text-center">Growing a successful life science business is hard.  For over a decade, we have delivered projects and supported a variety of business ventures and we’ve learned a lot along the way.  Here are the most common challenges we can help you overcome:</h3>
		</div>
	</div>
</div>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array( 'post_type' => 'case-study', 'paged'=>$paged, 'showposts'=>5) );
if (have_posts()) : while ( have_posts() ) : the_post(); ?>

			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					
						<div class="portfolio-item">
							
							<div class="row">
								<div class="col-sm-6">
									
									<div class="portfolio-item-details">
										
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										
										<h5>Subtitle text here</h5>
										
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" class="btn btn-pink">Case Study</a>
										
									</div><!-- portfolio-item-details -->
									
								</div><!-- col -->
								
								<div class="col-sm-6">
									<?php if ( has_post_thumbnail() ): ?>
									<div class="portfolio-item-thumbnail">
										
										<?php the_post_thumbnail('full', array( 'class' => 'img-responsive' ));?>
										
										<div class="portfolio-item-hover">
											
											<a class="fancybox-portfolio-gallery zoom-action" href="images/portfolio/image-28.jpg"><i class="mt-icons-expand3"></i></a>
											
										</div><!-- portfolio-item-hover -->
										
									</div><!-- portfolio-item-thumbnail -->
									<?php endif; ?>
								</div><!-- col -->
								
							</div><!-- row -->
							
						</div><!-- portfolio-item -->
					
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
	<?php endwhile; endif; ?>
<?php get_footer();?>
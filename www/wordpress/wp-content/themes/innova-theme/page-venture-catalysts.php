<?php
/**
* Template Name: Venture Catalysts Page
* Description: Venture Catalysts template
*/
get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<h3 class="text-center">Aside from our conventional advisory service, we understand the value in creating strategic partnerships to build successful life science start-ups.   Through sweat equity and seed investment, we share the journey with you and forge a flexible working relationship that suits you best. Explore our range of portfolio companies that currently benefit from this innovative approach.</h3>
		</div>
	</div>
</div>


			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					
						<div class="portfolio-item">
							
							<div class="row">
								
								<div class="col-sm-8">
									
									<div class="portfolio-item-details">
										
										<h4><a href="portfolio-single.html">Sport Magazin</a></h4>
										
										<p>Quisque viverra ex sed lectus blandit ultricies. Quisque id lectus interdum, sollicitudin lectus non, mattis enim. 
										Quisque dolor tortor, porta vel elit non, condimentum blandit ex odio eget turpis suscipit rhoncus.</p>
										
										
									</div><!-- portfolio-item-details -->
									
								</div><!-- col -->
								
								<div class="col-sm-4">
									
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

<?php get_footer(); ?>
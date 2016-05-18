<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
						
			<div class="blog-article">
				
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="blog-article-thumbnail">
						<?php the_post_thumbnail(); ?>
				</div><!-- blog-article-thumbnail -->
				<?php } ?>								
				
				<?php if (is_single()): ?>
				<div class="blog-article-date"><?php the_time('j');?> <small><?php the_time('M');?></small></div>
				<?php endif; ?>
							
							<div class="blog-article-details">
							
								<h3><?php the_title(); ?></h3>
								
								
							</div><!-- blog-article-details -->
							
							<?php the_content(); ?>
					</div><!-- blog-article -->
						
                        
                        
						
						
		</div><!-- col -->
	</div>
</div>
					
<?php get_footer(); ?>
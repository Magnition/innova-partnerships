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
				
				<?php if (is_singular('case-study')): ?>
				<h3><?php the_title(); ?></h3>
				<?php else: ?>
				<div class="blog-article-date"><?php the_time('j');?> <small><?php the_time('M');?></small></div>
				<div class="blog-article-details">
					<h3><?php the_title(); ?></h3>
				</div><!-- blog-article-details -->
				<?php endif; ?>
				
				<?php the_content(); ?>
				</div><!-- blog-article -->

		</div><!-- col -->
		<?php get_sidebar(); ?>
	</div>
</div>
					
<?php get_footer(); ?>
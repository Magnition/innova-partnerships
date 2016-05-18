<?php get_footer(); ?>
	<footer id="footer">
		<div class="container">
			<div class="row footlogo">
				<div class="col-md-2 col-sm-2">
					 
				</div>
			</div><!-- /.row -->
			<div class="row">
				<?php
				/** Loading WordPress Custom Menu  **/
				wp_nav_menu( array(
					  'menu'            => 'footer-menu-col-1',
					  'container'       => 'div',
					  'container_class'      => 'col-md-6 col-sm-6',
					  'fallback_cb'     => '',
					  'menu_id' => 'footer-menu-col-1'
				) ); ?>
				
				<?php
				/** Loading WordPress Custom Menu  **/
				wp_nav_menu( array(
					  'menu'            => 'footer-menu-col-2',
					  'container'       => 'div',
					  'container_class'      => 'col-md-3 col-sm-3',
					  'fallback_cb'     => 'footer-menu-col-2',
					  'menu_id' => ''
				) ); ?>
				<?php
				/** Loading WordPress Custom Menu  **/
				wp_nav_menu( array(
					  'menu'            => 'footer-menu-col-3',
					  'container'       => 'div',
					  'container_class'      => 'col-md-3 col-sm-3',
					  'fallback_cb'     => '',
					  'menu_id' => 'footer-menu-col-3'
				) ); ?>

			<div class="footcontact col-md-3 col-sm-3">
				<div class="footphone col-md-3 col-sm-3"></div>
				<div class="col-md-9 col-sm-9 pull-right">
					<h5>Call us today:</h5>
					<p>01236 739397</p>
					<a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank" class="social facebook"></a>
					<a href="http://www.twitter.com/share?text=<?php echo get_the_title(); ?> - <?php echo get_bloginfo('name'); ?>&url=<?php echo get_the_permalink(); ?>" class="social twitter" target="_blank"></a>
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=%<?php echo get_the_title(); ?>&summary=&source=" class="social linkedin" target="_blank"></a>
				</div>
				
			</div><!-- /.col-md-2 -->
			
		</div><!-- /.row -->
	</div><!-- /.container -->	
	
	<div class="social-links">
	    <div class="container">
		<div class="row">
		    <div class="col-sm-3 tel">
				<i class="icon  svg-innova-logo--white  svg-innova-logo--white-dims"></i>
			</div><!-- /.col-md-10 -->
			<div class="col-sm-8 pull-right">
				<a href="/terms-conditions/">Terms &amp; Conditions</a>   |   <a href="/privacy-policy/">Privacy Policy</a> <p class="text-right">Copyright Innova Partnerships</p>
			</div><!-- /.col-md-2 -->
		</div><!-- /.row -->
	    </div><!-- /.container -->
	</div><!-- /.social-links -->
    
</footer>

       <?php wp_footer(); ?> 
</body>
</html>
<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */
?>
<!-- /.blog sidebar -->
<div class="col-sm-4 sidebar">
	<div class="lets-talk">
		<i class="icon svg-lets-talk svg-lets-talk-dims"></i>
		<h4 class="text-center">Let's Talk</h4>
		<p class="text-center">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.</p>
		<a href="" class="text-center">Get in touch today</a>
	</div>
	<?php if ( function_exists('dynamic_sidebar')) {
		dynamic_sidebar('sidebar-posts');
		} ?>

</div><!-- /.col-md-4 -->
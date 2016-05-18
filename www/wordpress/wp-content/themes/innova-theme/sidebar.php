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
<div class="col-md-4 col-sm-4 col-md-offset-1 col-sm-offset-1 sidebar">
    <div class="widget">
         <div class="row-fluid search">
		  <form role="search" method="get" class="searchform" action="<?php echo home_url('/'); ?>">
			  <div class="sform">
				  <input type="text" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}"  value="Search" name="s" id="search" />
				  
				  <button class="search-btn" type="button" id="searchsubmit">Search</button>
			  </div>
		  </form>
		 </div>
    </div>
    
	<?php if ( function_exists('dynamic_sidebar')) { dynamic_sidebar('sidebar-posts'); } ?>
    
    <div class="widget">
        <p class="side-heads"><a href="/contact-us/">Contact Us Today</a></p>
    </div><!-- /.row -->
                
    <div class="widget">
        <p class="side-heads">Visit Our Showrooms</p>
        <div class="cumbernauld">
            <a href="contact-us/" class="btn btn-trans">Arrange an Appointment</a>
        </div>
    </div><!-- /.row -->
</div><!-- /.col-md-4 -->
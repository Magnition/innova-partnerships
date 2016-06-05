<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<title>
		<?php
			if (have_posts()) : the_post();
			$custom_site_title = get_field('seo_title');
			if ( !empty($custom_site_title[0]) ) {
				echo $custom_site_title;
			} else {
				/*
				* Print the <title> tag based on what is being viewed.
				*/
				global $page, $paged;
				wp_title( '|', true, 'right' );
				// Add the blog name.
				bloginfo( 'name' );
				// Add the blog description for the home/front page.
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 ):
					echo ' | ' . sprintf( __( 'Page %s', 'bootstrapwp' ), max( $paged, $page ) );
				endif;
			} 
			endif;
			rewind_posts(); wp_reset_query();
		?>
	</title>
	<?php if ( get_field('meta_description') ) { ?>
				<meta name="description" content="<?php the_field('meta_description'); ?>" /><?php
			} if ( get_field('meta_keywords') ) { ?>
				<meta name="keywords" content="<?php the_field('custom_meta_keywords'); ?>" /><?php
			} if (get_field('no_index')) {
				echo '<meta name="robots" content="noindex, follow">';
			}
	?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
     <!-- Le fav and touch icons -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=3">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-152x152.png" />
    <!-- Bootstrap Core CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- Custom Fonts -->
	  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
	<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
<![endif]-->
  </head>
<body <?php body_class(); ?> id="page-top" data-spy="scroll" data-target=".navbar">
 <header>
  
  			<div id="header-top">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-8 pull-right">
							
							<div class="widget widget-contact pull-right">
								
								<ul>
									<li>    
										<i class="mt-icons-telephone"></i>
										<span class="hidden-xs">856-438-6826</span>
										<a class="visible-xs-inline" href="tel:8564386826">856-438-6826</a>
									</li>
									<li>
										<i class="mt-icons-mail"></i>
										<a href="mailto:contact@bergen.com">contact@bergen.com</a>
									</li>
									<li>
									  <p>Social Links</p>
									</li>
								</ul>
								
							</div><!-- widget-contact -->
							
						</div><!-- col -->

					</div><!-- row -->
				</div><!-- container -->
				
			</div><!-- header-top -->

		    <!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
			    <div class="navbar-header">
				<a class="navbar-toggle" href="#footer">
				    <i class="fa fa-bars"></i>
				</a>
				<a class="navbar-brand" href="<?php echo home_url(); ?>">
				    <i class="icon  svg-innova-logo  svg-innova-logo-dims"></i>
				</a>

			    </div><!-- /.navbar-header -->
		
		<!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
				    <?php
				    /** Loading WordPress Custom Menu  **/
				    wp_nav_menu( array(
				    'menu'            => 'main-menu',
				    'menu_class'      => 'nav navbar-nav',
				    'fallback_cb'     => '',
				    'menu_id' => '',
					'walker' => new wp_bootstrap_navwalker()
				    //'walker' => new Bootstrapwp_Walker_Nav_Menu()
				    ) ); ?>
				
			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		  </nav>  
	  </header>
 <!-- CONTENT -->
<div id="content">
  
  <?php if(is_front_page()): ?>
  <?php else: ?>
	 <div id="page-header" class="style-1">  
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<?php if (is_post_type_hierarchical( 'case-study' )): ?>
						<h4>Case Study</h4>
					<?php elseif(is_page_template( 'page-template-archive-case-study' ) ): ?>
						<h4>Business Growth</h4>
					<?php elseif(is_page_template( '' )): ?>
						<h4>Venture Catalysts</h4>
					<?php elseif (is_single()): ?>
						<h4>Blog</h4>
					<?php else: ?>
						<h4><?php the_title();?></h4>
					<?php endif; ?>
								
				</div><!-- col -->
				<div class="col-sm-6">
					<?php bootstrapwp_breadcrumbs(); ?>
								
				</div><!-- col -->
			</div><!-- row -->
		</div><!-- container -->    
	</div><!-- page-header -->
  <?php endif; ?>
<?php
if ( have_posts() ) while ( have_posts() ) : the_post();
if('asset' == get_post_type()){ } else { ?>
				  <p><?php $post_type = get_post_type_object( get_post_type($post) ); echo $post_type->label; ?>: </p><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h2> <?php the_title();?></h2></a>
				  <?php } ?>
				  <?php if('asset' == get_post_type()) { ?>
				  <p><?php
				  $asset_url = types_render_field( "asset-url", array( 'raw' => 'true') );
				  $post_type = get_post_type_object( get_post_type($post) ); echo $post_type->label; ?>: </p><a href="<?php echo $asset_url; ?>" title="<?php the_title();?>"><h2> <?php the_title();?></h2></a>
					<?php
						    $content = get_the_content();
						    $permalink = get_permalink();
						    
						    echo '<p>';
						    $string = strip_tags($content);
						    if (strlen($string) > 150) {
							$stringCut = substr($string, 0, 150);
							$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						    }
						    echo $string;
						    echo '</p>';
						    echo '<a href="'. $asset_url .'" class="read-more" target="_blank">Download<span class="arrow-btn"></span></a>';
					?>
				  <?php } elseif('product' == get_post_type()) { ?>
					    <?php
						    $content = get_the_content();
						    $permalink = get_permalink();
						    
						    echo '<p>';
						    $string = strip_tags($content);
						    if (strlen($string) > 150) {
							$stringCut = substr($string, 0, 150);
							$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						    }
						    echo $string;
						    echo '</p>';
						    echo '<a href="'. $permalink .'" class="read-more">View product<span class="arrow-btn"></span></a>';
					?>
				  <?php } else { ?>
				      <?php if(get_field('main_content_area')) {
						    $permalink = get_permalink();
						    $content = get_field('main_content_area');
						    echo '<p>';
						    $string = strip_tags($content);
						    if (strlen($string) > 150) {
							$stringCut = substr($string, 0, 150);
							$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						    }
						    echo $string;
						    echo '</p>';
						    echo '<a href="'. $permalink .'" class="read-more">Read More<span class="arrow-btn"></span></a>';
				      } elseif(get_field('description')) {
						    $permalink = get_permalink();
						    $content = get_field('description');
						    echo '<p>';
						    $string = strip_tags($content);
						    if (strlen($string) > 150) {
							$stringCut = substr($string, 0, 150);
							$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						    }
						    echo $string;
						    echo '</p>';
						    echo '<a href="'. $permalink .'" class="read-more">Read More<span class="arrow-btn"></span></a>';
				      } else {
						    $content = get_the_content();
						    $permalink = get_permalink();
						    echo '<p>';
						    $string = strip_tags($content);
						    if (strlen($string) > 150) {
							$stringCut = substr($string, 0, 150);
							$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						    }
						    echo $string;
						    echo '</p>';
						    echo '<a href="'. $permalink .'" class="read-more">Read More<span class="arrow-btn"></span></a>';
				      }
                    }
                    
        endwhile; ?>
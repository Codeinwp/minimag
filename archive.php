<?php
	get_header(); 
?>
	<div id="two-columns">
		<div id="content" role="main">
			<div class="page-heading">
 
				<h2>	<?php
						if ( is_category() ) :
							printf( __( 'Category Archives: %s', 'minimag' ), '<span>' . single_cat_title( '', false ) . '</span>' );
						elseif ( is_tag() ) :
							printf( __( 'Tag Archives: %s', 'minimag' ), '<span>' . single_tag_title( '', false ) . '</span>' );
						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author Archives: %s', 'minimag' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						elseif ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'minimag' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'minimag' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'minimag' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'minimag' );
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'minimag');
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'minimag' );
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'minimag' );
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'minimag' );
						else :
							_e( 'Archives', 'minimag' );
						endif;
					?></h2>
			</div>
            <div class="post-list">
 
		<?php if ( have_posts() ) : ?>
  
			<?php while ( have_posts() ) : the_post(); ?>
				<?php  
					get_template_part( 'content', get_post_format() );
				?>
			<?php endwhile; ?>
                <div class="clear">
				</div> 
				<?php 
 
							minimag_content_nav( 'nav-below' );
 
				?>
		<?php else : ?>
			<?php get_template_part( 'no-results', 'index' ); ?>
		<?php endif; ?>
 
                <div class="clear">
				</div>
				
				</div> 
			</div>
   
					
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
 
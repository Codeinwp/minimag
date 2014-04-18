<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package minimag
 */
if ( ! function_exists( 'minimag_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function minimag_content_nav( $nav_id ) {
	global $wp_query, $post;
	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous )
			return;
	}
	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';
	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?> wp-pagenavi">
	  
	<?php if ( is_single() ) : // navigation links for single posts ?>
		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'minimag' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'minimag' ) . '</span>' ); ?>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'minimag' ) ); ?></div>
		<?php endif; ?>
		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'minimag' ) ); ?></div>
		<?php endif; ?>
	<?php endif; ?>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; 
if ( ! function_exists( 'minimag_comment' ) ) :
 
function minimag_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
 
	if($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback'  ){
	
		?>
						<div  <?php comment_class('comentarii') ?> id="comment-<?php comment_ID() ?>"  > 
							<div class='comentarii-author'> 
								<span class= "from "></span> <?php 
									echo get_comment_author_link();
								?>
							</div> 
							<div class='comentarii-content'> 
								<strong></strong> <span class= "comment-body "> 
								<?php comment_text(); ?>
								 </span> 
							</div> 
						</div> 
		
		<?php
	
	} 
	  
}
endif; 
  
function minimag_category_transient_flusher() { 
	delete_transient( 'all_the_cool_cats' );
}
function minimag_related_posts(){
	$id = get_the_ID();
	$cats = get_the_category($id);
		if(!empty($cats)){
			$cat_ids = array();
			foreach($cats as $individual_cat)
				$cat_ids[] = $individual_cat->cat_ID;
			$args = array(
						'category__in' => $cat_ids,
						'post__not_in' => array($id), 
						'ignore_sticky_posts'=> 1,
						'posts_per_page'=>6
				);
			$dh_query = new wp_query($args);
			$post_count = $dh_query->post_count;
			if($dh_query->have_posts()) { 
				?>
				<div class="post-related">
					<div class="title"> </div> 
						<div class="related-post-holder"> 
							<?php
								while ( $dh_query->have_posts()  ) { 
										$dh_query->the_post();
										get_template_part( 'content', 'related' );
								}
							?> 
						 </div>
				</div>
				<?php				
			}
			wp_reset_query();
		
		}
}
add_action( 'edit_category', 'minimag_category_transient_flusher' );
add_action( 'save_post', 'minimag_category_transient_flusher' );
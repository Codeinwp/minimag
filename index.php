<?php
	get_header(); 
?>
	<div id="two-columns">
		<div id="content" role="main">
			<div class="page-heading">
 
				<h2>
				<?php 
					_e("LATEST ARTICLES","minimag");
				?>
				</h2>
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
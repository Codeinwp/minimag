 <div class="related-post-box">
	<div class="related-post-img">
		<a href="<?php the_permalink(); ?>"> <?php get_the_post_thumbnail(get_the_ID(), array(100,100) );?></a></div>  
			<div class="related-post-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</div> 
		<div class="related-post-comments">
			<p class="comments"> 
				<?php echo comments_number(); ?>
			</p>
		</div> 									
</div>
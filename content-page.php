 
<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
					<div class="holder">
	<header class="entry-header  heading ">
		
								 
    
	                            	<h2 class="title-post"><span><?php the_title(); ?></span></h2>
	
    
     								<p class="underneath-title">
                                  		by <span class="link-l author-link"><?php the_author_posts_link() ?></span>
										on <span class="date"><?php the_time('F j, Y'); ?></span>,
                                    	<a href="<?php echo get_permalink(get_the_ID()); ?>#comm" class="comments-l"><?php comments_number() ?></a>
                                    </p>
	
	 
	</header> 
	<div class="entry-content content">
	
								<div class="text-box-s">
											<div class="text-holder-s post-body">
												 <?php 
												the_content();
												?> 
                                                
											</div>
								</div> 
		 
	</div> 
	
                        <div class="clear"  ></div>
		</div>
		 
                        <div class="clear" ></div>
			<section class="about">
                        	<p class="title">
								<?php echo __( 'About the author', 'minimag' ) ; ?>
								<span><?php  the_author_posts_link(); ?></span>
							</p>
                                <p class="description"> <?php the_author_meta( 'description'); ?>  </p>
                            	<p class="img">
                                    <a href="<?php echo get_the_author_link(); ?> ">
                                        <?php echo get_avatar(get_the_author_meta("ID")); ?>
                                    </a>
								</p>
							<div class="clear" ></div>
			</section>
			 
			 
			           <div class="clear" ></div>
	
</article>  
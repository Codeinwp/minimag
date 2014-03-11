 
<article id="post-<?php the_ID(); ?>" <?php post_class(array('test','list')); ?>>
 
					<div class="holder">
						<header class="entry-header heading"> 
							
								<?php $cats = get_the_category(get_the_ID());
									 foreach($cats as $cat){
								?>
								<a href="<?php echo get_category_link( get_cat_ID($cat->cat_name) ); ?>" class="design"><?php echo strtoupper($cat->cat_name); ?></a>
							
                            	<?php }  ?>
                                
                                	<h2><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h2>
                                    
                                    <p class="underneath-title">
                                  		by <span class="link-l author-link"><?php the_author_posts_link() ?></span>
										on <span class="date"><?php the_time('F j, Y'); ?></span>,
                                    	<a href="<?php echo get_permalink(get_the_ID()); ?>#comm" class="comments-l"><?php comments_number() ?></a>
                                    </p>
                                    
						</header> 
                        <div class="content">
								<div class="photo">
									<div class="photo-holder">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
									</div>
								</div>
                                <div class="text-box">
											<div class="text-holder">
												<?php echo minimag_excerpt(250); ?>                                                
											</div>
 
											<div class="foot-info-hp">
												<a class="more"  href="<?php echo get_permalink(get_the_ID()); ?>"><?php  echo __( 'Continue reading &rarr;', 'minimag' );  ?></a>
											</div>
								</div>
                        </div>
                     </div> 
				<div class="clear"></div>
 </article>
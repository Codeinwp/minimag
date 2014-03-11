<?php
	global $minimag_options;
	
	
?>						</div>
					</div>
 
				</div> 
				<footer id="colophon" class="site-footer" role="contentinfo">
					<div id="footer">
						<div class="footer-holder">
						<ul>
							<?php wp_nav_menu( array('container' => 'div','theme_location' => 'bottom_nav','fallback_cb' => false,"depth"=>1 ) ); ?>
						</ul>
						<p class="copyr">&copy;<?php echo date("Y"); ?> <?php bloginfo('name'); ?>. 
						<?php 
						_e('Theme developed by', 'minimag');
						?>
						<a href="http://themes.codeinwp.com/themes/minimag/" target="_blank" rel="nofollow">Codeinwp.com</a>.</p>
 
 					<?php if(trim($minimag_options['CMfb']) != '' || trim($minimag_options['CMfb']) != '' ||  trim($minimag_options['CMfb']) != '' ) { ?>
                    <ul class="social">
						<?php if(trim($minimag_options['CMtw']) != '') { ?><li><a href="<?php echo $minimag_options['CMtw']; ?>">twitter</a></li> <?php } ?>
						<?php if(trim($minimag_options['CMfb']) != '') { ?><li><a href="<?php echo $minimag_options['CMfb']; ?>" class="facebook">facebook</a></li> <?php } ?>
						<?php if(trim($minimag_options['CMrss']) != '') { ?><li><a href="<?php echo $minimag_options['CMrss']; ?>"  class="rss" >rss</a></li> <?php } ?> 
					</ul>
					<?php } ?>                    
						</div>
					</div>
                    
				</footer>
			</div> 
			<div class="color-line-footer"></div> 
 
<?php wp_footer(); ?>
 
 </body>
</html>
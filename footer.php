					</div>
					</div>
 
				</div> 
				<footer id="colophon" class="site-footer" role="contentinfo">
					<div id="footer">
						<div class="footer-holder">
						<ul>
							<?php wp_nav_menu( array('container' => 'div','theme_location' => 'bottom_nav','fallback_cb' => false,"depth"=>1 ) ); ?>
						</ul>
				
						<p class="copyr">&copy;<?php echo date("Y"); ?> <?php bloginfo('name'); ?>. 
						<a href="http://themeisle.com/themes/minimag/?utm_source=minimag&utm_medium=link&utm_campaign=themefooter" target="_blank">MiniMag</a><?php _e(' powered by ','cwp'); ?><a href="http://wordpress.org/" target="_blank"><?php _e('WordPress','cwp'); ?></a>
						</p>
 					<?php
						$var_CMfb = cwp('CMfb');
						$var_CMtw = cwp('CMtw');
						$var_CMrss = cwp('CMrss');
					?>
 					<?php if((isset($var_CMfb) && $var_CMfb != '') || (isset($var_CMtw) && $var_CMtw != '') ||  (isset($var_CMrss) && $var_CMrss != '') ) { ?>
                    <ul class="social">
						<?php if(isset($var_CMfb) && $var_CMfb != '') { ?><li><a href="<?php echo $var_CMfb; ?>" class="facebook">facebook</a></li> <?php } ?>
						<?php if(isset($var_CMtw) && $var_CMtw != '') { ?><li><a href="<?php echo $var_CMtw; ?>" >twitter</a></li> <?php } ?>
						<?php if(isset($var_CMrss) && $var_CMrss != '') { ?><li><a href="<?php echo $var_CMrss; ?>"  class="rss" >rss</a></li> <?php } ?> 
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
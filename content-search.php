										<div class="search-result">
											<p><a href="<?php the_permalink(); ?>" class="search-result-title"><?php the_title(); ?></a></p>
											
							<p class="search-date"><?php the_time('l, F jS, Y') ?></p>
		<?php			
			$categories = get_the_category( );
			$links = array();
			foreach($categories as $category){
				$links[] ="<a href=".get_category_link($category ).">".$category->cat_name ."</a>";
			 
			 }
			 
			 
			 if(!empty($category)){
			 
		?>				
				<p class="link"><?php _e( 'Posted in', 'minimag' ); ?>:  <?php echo implode(", ",$links) ?> | <a href="<?php echo get_permalink(get_the_ID()); ?>#comm"><?php comments_number() ?> >> </a></p>
			<?php } ?>				
										</div>
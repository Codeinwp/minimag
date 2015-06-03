 
					<form id="searchform" class="search-form" action="<?php echo esc_url( home_url() ); ?>/" method="get" role="search">
						<input id="s" class="text" type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
						<input id="searchsubmit" type="submit" class="submit" value="">
					</form>	

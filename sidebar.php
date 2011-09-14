<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

			<h4>Search this blog</h4>
			<div id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</div>

<?php endif; ?>
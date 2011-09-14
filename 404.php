<?php get_header(); ?> 

			<div id="leftcolumn" class="clearfix">
				
				<p>Sorry, but nothing was found here.</p>
				
				<p>Here are some things you can do:</p>
				
				<p>1) Go back to the <a href="<?php echo home_url(); ?>">homepage</a>.</p>
				
				<p>2) Do a search</p>
				<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>">
					<div>
						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" value="" name="s" id="s">
						<input type="submit" id="searchsubmit" value="Search">
					</div>
				</form>
				
				<p>3) Check out some recent news stories:</p>
				<?php query_posts('showposts=15'); ?>
				<?php while (have_posts()) : the_post(); ?>
				<ul>
				<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
				</ul>
				<?php endwhile;?>

			</div>
			
			<div id="rightcolumn" class="clearfix">
			
				<?php get_sidebar(); ?>
				
			</div>

<?php get_footer(); ?>
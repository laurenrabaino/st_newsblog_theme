<?php get_header(); ?>

			<div id="leftcolumn" class="clearfix">

				<div id="blogNameMasthead">
					<h2><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/today_file_header.jpg" alt="<?php bloginfo( 'name' ); ?>" /></a></h2>
					<p class="tagline"><?php bloginfo( 'description' ); ?></p>
					<div id="access" class="blogNav clearfix" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'blog-nav' ) ); ?>
					</div>
					<div style="clear:both;"></div>
				</div>

				<div class="categoryTopper">

					<!--h5><?php if(is_category()) { single_cat_title(); } ?></h5>-->
					<?php
					$categorydesc = category_description();
					if ( ! empty( $categorydesc ) ) {
						echo apply_filters( 'archive_meta', '' . $categorydesc . '' );
					}
					?>
					<div class="catRSS"><a href="feed"><img src="http://seattletimes.nwsource.com/art/ui/1024/rss.gif">Subscribe</a></div>
				</div>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="hentry">

					<h5 class="hed6"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
					<p class="entry-meta">Posted by <?php the_author_posts_link() ?> on <?php the_time('F j, Y') ?> at <?php the_time('g:i A'); ?></p>

					<?php the_content(); ?>

					<p class="entry-utility"><span class="comments-link"><a href="<?php the_permalink() ?>#comments" class="commentCount"><?php fb_comment_count() ?> comments</a></span> | Posted in <?php exclude_post_categories('1',', '); ?></p>

				</div>

				<?php endwhile; else: ?>

				<h2 class="hed6">Page not found</h2>

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

				<?php endif; ?>

				<p><?php posts_nav_link(); ?></p>

			</div>

			<div id="rightcolumn" class="clearfix">

				<?php get_sidebar(); ?>

			</div>

<?php get_footer(); ?>
<?php get_header(); ?>

			<div id="leftcolumn" class="clearfix">

				<div id="blogNameMasthead">
					<h2><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<p class="tagline"><?php bloginfo( 'description' ); ?></p>
					<div id="access" class="blogNav clearfix" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'blog-nav' ) ); ?>
					</div>
					<div style="clear:both;"></div>
				</div>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<h5 class="hed6"><?php the_title(); ?></h5>

					<div class="entry-meta">
						Posted by <?php the_author_posts_link() ?> on <?php the_time('F jS, Y') ?> at <?php the_time('g:i a'); ?>
					</div>

				<div id="content-main">

					<?php the_content(); ?>

					<div class="sharing-left clearfix">
						<p class="entry-utility">Posted in: <?php the_category(', '); ?></p>
						<p><?php the_tags(); ?></p>
						<!-- ADDTHIS SOCIAL MEDIA SHARING -->
						<div class="addthis_toolbox">
							<ul class="addthis_share clearfix">
								<li><span>Share:</span></li>
								<li><a class="addthis_button_twitter">&nbsp;</a></li>
								<li><a class="addthis_button_facebook">&nbsp;</a></li>
								<li><a class="addthis_button_linkedin">&nbsp;</a></li>
								<li><a class="addthis_button_email">&nbsp;</a></li>
								<li><a class="addthis_button_expanded">&nbsp;</a></li>
								<!--<li><a class="addthis_button_google_plusone last">&nbsp;</a></li>-->
							</ul>
						</div>
						<div style="clear:both; float:none;"></div>
						<!-- END ADDTHIS -->
					</div>

					<div class="sharing-right clearfix">
						<div class="fb-count"><iframe src="//www.facebook.com/plugins/like.php?app_id=169588046452521&amp;href&amp;send=false&amp;layout=box_count&amp;width=50&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:90px;" allowTransparency="true"></iframe></div>
						<div class="tweet-count"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?>" data-via="seattletimes">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
						<div class="gplus-count"><g:plusone size="tall"></g:plusone></div>
					</div>

					<div class="clear"></div>

					<h3>Comments</h3>
					<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php the_permalink() ?>" num_posts="5" width="630"></fb:comments>

				</div>

				<?php endwhile; else: ?>

				<h2 class="title_page">Page not found</h2>

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
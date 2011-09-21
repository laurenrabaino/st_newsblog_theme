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
						Posted by <?php the_author_posts_link() ?> on <?php the_time('F j, Y') ?> at <?php the_time('g:i A'); ?>
					</div>

				<div id="content-main">

					<?php the_content(); ?>

					<div class="sharing-left clearfix">
						<p class="entry-utility">Posted in: <?php exclude_post_categories('1',', '); ?></p>
						<p><?php the_tags(); ?></p>
						<!-- ADDTHIS SOCIAL MEDIA SHARING -->
						<div class="addthis_toolbox">
							<ul class="addthis_share clearfix">
								<li><span>Share:</span></li>
								<li><a class="addthis_button_stumbleupon">&nbsp;</a></li>
								<li><a class="addthis_button_delicious">&nbsp;</a></li>
								<li><a class="addthis_button_reddit">&nbsp;</a></li>
								<li><a class="addthis_button_digg">&nbsp;</a></li>
								<li><a class="addthis_button_email">&nbsp;</a></li>
								<li><a class="addthis_button_expanded">&nbsp;</a></li>
								<!-- END ADDTHIS -->
								<li class="fb-count"><div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) {return;}
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/en_US/all.js#appId=279558868722586&xfbml=1";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
								<div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false" data-action="recommend"></div></li>
								<li class="tweet-count"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?>" data-via="seattletimes">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
								<li class="linkedin-count"><script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-counter="right"></script></li>
								<li class="gplus-count"><g:plusone size="medium"></g:plusone></li>
							</ul>
						</div>
						<div style="clear:both; float:none;"></div>
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
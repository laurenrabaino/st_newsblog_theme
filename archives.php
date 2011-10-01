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
				
				<h2 class="title_page"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			
				<div id="content-main">
					
					<?php the_content(); ?>
					
					<ul id="archives-page" class="xoxo">  
                        <li id="category-archives">  
                            <h2>Archives by Category</h2>  
                            <ul>  
                                <?php wp_list_categories('optioncount=1&title_li=&show_count=1') ?>  
                            </ul>  
                        </li>  
                        <li id="monthly-archives">  
                            <h2>Archives by Month</h2>  
                            <ul>  
                                <?php wp_get_archives('type=monthly&show_post_count=1') ?>  
                            </ul>  
                        </li>  
                    </ul>  
				
				</div>
			
			</div>
			
			<div id="rightcolumn" class="clearfix">
			
				<?php get_sidebar(); ?>
				
			</div>

<?php get_footer(); ?>
<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
			<div id="content" role="main">
				<h1 class="page-title"><?php
					printf( __( ' %s', 'twentyten' ), '<span class="categTitle">' . single_cat_title( '', false ) . '</span>' );
				?></h1><a href="../../category/<?php
$category = get_the_category();
echo $category[0]->slug;
?>/feed"><img src="http://seattletimes.nwsource.com/art/ui/1024/rss.gif" style="float:right;margin-right:10px;"></a>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

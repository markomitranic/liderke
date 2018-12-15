<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content static-post-page">
		<div id="content" role="main">
		
		<?php global $query_string; // required
			  $posts = query_posts($query_string.'&cat=-25'); // exclude category 25 ?>
		
		
		<?php if ( have_posts() ) : ?>

				<?php $counter = 1; ?>

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content', get_post_format() ); ?>
				
					<?php if( $counter === 3 ) : ?> 
						
						
						<?php // custom query for petitions
							$args = array(
								'cat' => 25,
								'posts_per_page' => 1
							);
							$category_posts = new WP_Query($args);
						?>
						
						<?php if($category_posts->have_posts()) : ?> 
							<?php while($category_posts->have_posts()) : $category_posts->the_post(); ?>
								<?php get_template_part( 'content', 'petition' ); ?>  
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>								

						
						<?php if ( is_active_sidebar( 'petition_widget' ) ) : // widget petition post (optional) ?>
							<article class="petition-block">
								<?php dynamic_sidebar( 'petition_widget' ); ?>
							</article>
						<?php endif; ?>	

					<?php endif; ?>
				
				<?php $counter++; ?>
				
			<?php endwhile; ?>
	   		<!-- end of the loop -->

		    <!-- pagination here -->
		    <?php if (function_exists('custom_pagination')) : ?>
				<?php custom_pagination($the_query->max_num_pages, "", $paged); ?>
			<?php endif; ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>


			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

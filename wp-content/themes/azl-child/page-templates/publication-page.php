<?php
/**
 * Template Name: Publication Page Template
 *
**/

get_header(); ?>

	<div id="primary" class="site-content category-wrapper publication-page">
		<div id="content" role="main">

			<?php
				// set up or arguments for our custom query
				$paged = ( get_query_var('paged') ) ? absint( get_query_var( 'paged' ) ) : 1;
				$publication_args = array(
				'post_type' => 'publications',
				'posts_per_page' => 3,
				'paged' => $paged
				);
				// create a new instance of WP_Query
				$publication_query = new WP_Query( $publication_args );
			?>
			
			<?php if ( $publication_query->have_posts() ) : ?>
				
				<?php while ( $publication_query->have_posts() ) : $publication_query->the_post(); ?>
				
					<?php get_template_part( 'content', 'publication' ); ?>
								
				<?php endwhile; ?>
		   		<!-- end of the loop -->

			    <!-- pagination here -->
			    <?php if (function_exists('custom_pagination')) : ?>
					<?php custom_pagination($publication_query->max_num_pages, "", $paged); ?>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			<?php else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.', 'twentytwelve'); ?></p>
			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
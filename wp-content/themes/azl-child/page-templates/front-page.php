<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div class="hero-area">
		
		<?php if(get_field('hero_image')) : // Hero image ?>
			<div class="hero-img">
				<img src="<?php the_field('hero_image'); ?>" alt="" />
			</div>
		<?php endif; ?>

		<div class="hero-txt-area">

			<?php if(get_field('hero_heading')) : // Hero heading ?>
				<div class="hero-heading">
					<h1><?php the_field('hero_heading'); ?></h1>
				</div>
			<?php endif; ?>

			<?php if(get_field('hero_text')) : // Hero txt ?>
				<div class="hero-text">
					<?php the_field('hero_text'); ?>
				</div>
			<?php endif; ?>
		
			<?php if(get_field('home_page_link')) : // Hero link ?>
				<div class="hero-link">
					<a href="<?php the_field('home_page_link'); ?>"><?php the_field('home_page_link_txt'); ?> <i class="fa fa-angle-right"></i></a>
				</div>
			<?php endif; ?>
		</div>

	</div>

		<?php if(get_field('post_heading')) : // Hero post heading ?>
				<div class="home-post-heading">
					<h2><?php the_field('post_heading'); ?></h2>
				</div>
		<?php endif; ?>

	<div id="primary" class="site-content front-page-content">
		<div id="content" role="main">

			  	  
			<?php
				// set up or arguments for our custom query
				$paged = ( get_query_var('page') ) ? absint( get_query_var( 'page' ) ) : 1;
				$query_args = array(
				'cat'=> '-25',
				'post_type' => 'post',
				'posts_per_page' => 3,
				'paged' => $paged
				);
				// create a new instance of WP_Query
				$the_query = new WP_Query( $query_args );
			?>
					
				<?php $counter = 1; ?>
				
			<?php if ( $the_query->have_posts() ) : ?>
				
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
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

				<?php wp_reset_postdata(); ?>

			<?php else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.', 'twentytwelve'); ?></p>
			<?php endif; ?>
			
		    

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
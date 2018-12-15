<?php
/**
 * Template Name: Akademija Page Template
 *
**/

get_header(); ?>

	<div id="primary" class="site-content custom-page">
		<div id="content" role="main">
			
			<!-- Hero section -->
			<div class="hero-area">
				<?php if(get_field('ak_hero_image')) : ?>
					<div class="hero-img">
						<img src="<?php the_field('ak_hero_image'); ?>" alt="" />
					</div>
				<?php endif; ?>

				<div class="hero-txt-area">
					<?php if(get_field('ak_page_name')) : ?>
						<div class="hero-heading">
							<h3><?php the_field('ak_page_name'); ?></h3>
						</div>
					<?php endif; ?>
					
					<div class="hero-cell-block">
						<?php if(get_field('ak_hero_cell_one_heading')) : ?>
							<div class="hero-cell-heading">
								<h2><?php the_field('ak_hero_cell_one_heading'); ?></h2>
							</div>
						<?php endif; ?>
						<?php if(get_field('ak_hero_cell_txt_one')) : ?>
							<div class="hero-cell-txt">
								<?php the_field('ak_hero_cell_txt_one'); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="hero-cell-block">
						<?php if(get_field('ak_hero_cell_two_heading')) : ?>
							<div class="hero-cell-heading">
								<h2><?php the_field('ak_hero_cell_two_heading'); ?></h2>
							</div>
						<?php endif; ?>
						<?php if(get_field('ak_hero_cell_txt_two')) : ?>
							<div class="hero-cell-txt">
								<?php the_field('ak_hero_cell_txt_two'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div><!-- .hero-area -->
		

			<?php if( get_field('ak_program_heading') || get_field('ak_program_content') ) : ?>
				<div class="section-row center-text">
					<div id="program-section" class="section-heading">
						<h2><?php the_field('ak_program_heading'); ?></h2>
					</div>
					<?php the_field('ak_program_content'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field('ak_values_heading') || get_field('ak_values_content') ) : ?>
				<div class="section-row center-text">
					<div id="value-section" class="section-heading">
						<h2><?php the_field('ak_values_heading'); ?></h2>
					</div>
					<?php the_field('ak_values_content'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field('ak_origins_heading') || get_field('ak_origins_content_cell_one') || get_field('ak_origins_content_cell_two') || get_field('ak_origins_toggle') ) : ?>
				<div class="section-row">
					<div id="origins-section" class="section-heading">
						<h2><?php the_field('ak_origins_heading'); ?></h2>
					</div>
					<div id="akademija-hide" class="academy-hidden">
						<div class="origins-text-cell">
							<?php the_field('ak_origins_content_cell_one'); ?>
						</div>
						<div class="origins-text-cell">
							<?php the_field('ak_origins_content_cell_two'); ?>
						</div>
					</div>
					<div id="whole-text" class="btn-link">
						<?php the_field('ak_origins_toggle'); ?>
					</div>
				</div>
			<?php endif; ?>


			<?php if( get_field('ak_publication_heading') ) : ?>
				<div class="section-row clear-margin">
					<div id="publication-section" class="section-heading">
						<h2><?php the_field('ak_publication_heading'); ?></h2>
					</div>
				</div>
			<?php endif; ?>

			<div class="section-row academy-publications-posts clear-margin">
				<?php
					$query_args = array(
					'post_type' => 'publications',
					'posts_per_page' => 3
					);
					$publication = new WP_Query( $query_args );
				?>
				
				<?php if ( $publication->have_posts() ) : ?>
					
					<?php while ( $publication->have_posts() ) : $publication->the_post(); ?>
					
						<?php get_template_part( 'content', 'academy' ); ?>
									
					<?php endwhile; ?>
			   		<!-- end of the loop -->
	
					<?php wp_reset_postdata(); ?>
	
				<?php else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.', 'twentytwelve'); ?></p>
				<?php endif; ?>				
				
			</div>

			<?php if ( get_field('ak_publication_page_link') && get_field('ak_publication_page_link_name') ) : ?>
				<div class="section-row center-text">
					<div class="publication-post-section">
						<div class="btn-link">
							<a href="<?php the_field('ak_publication_page_link'); ?>" target="_blank"><?php the_field('ak_publication_page_link_name'); ?></a>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if( get_field('ak_team_heading') || get_field('ak_team_content') ) : ?>
				<div class="section-row">
					<div id="team-section" class="section-heading">
						<h2><?php the_field('ak_team_heading'); ?></h2>
					</div>
					<?php the_field('ak_team_content'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field('ak_contact_heading') || get_field('ak_contact_socials') || get_field('ak_contact_map') || get_field('ak_contact_info') ) : ?>
				
				<div class="section-row">
					<div id="map-section" class="section-heading">
						<h2><?php the_field('ak_contact_heading'); ?></h2>
					</div>
					<div class="azl-links">
						<?php the_field('ak_contact_socials'); ?>
					</div>
					<div class="google-map-block">
						<?php the_field('ak_contact_map'); ?>
					</div>
					<div class="map-block">
						<div class="azl-location">
							<?php the_field('ak_contact_info'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
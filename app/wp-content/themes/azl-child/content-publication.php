<?php
/**
 * The default template for displaying content on publication page
 */
?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="post-meta-info">
		    <?php if ( 'publications' == get_post_type() ) : ?>
			    <div class="entry-meta">
					<time class="entry-time updated" itemprop="datePublished" datetime="<?php the_time('c'); ?>"><span class="azl-time"><?php the_time('d'); ?>.<?php the_time('m'); ?>.</span></time>
				</div><!-- .entry-meta -->
		    <?php endif; ?>
		</div><!--.post-meta-info-->


		<div class="arcticle-container">
			<div class="publication-taxonomy">
				<?php the_terms($post->ID, 'publication_category'); ?>
			</div>


			<!-- Meta for mobile -->
			<div class="mobile-post-meta-info">
			    <?php if ( 'publications' == get_post_type() ) : ?>
				    <div class="entry-meta">
						<time class="entry-time updated" itemprop="datePublished" datetime="<?php the_time('c'); ?>"><span class="azl-time"><?php the_time('d'); ?>.<?php the_time('m'); ?>.<?php the_time('Y'); ?>.</span></time>
					</div><!-- .entry-meta -->
			    <?php endif; ?>
			</div><!--.post-meta-info-->

			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="featured-post">
				<?php _e( 'Featured post', 'azl' ); ?>
			</div>
			<?php endif; ?>

			<header class="entry-header">
				<?php if ( is_single() ) : ?>
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<?php else : ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<?php endif; ?>
				
			</header><!-- .entry-header -->

			<?php if ( ! post_password_required() && ! is_attachment() && ! is_single() ) : ?>
				<div class="featured-post-img">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-post-thumbnails-two'); ?></a>
					<?php else: ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/post-thumb-170.jpg" alt="No image"></a>
					<?php endif; ?>
				</div><!-- .featured-post-img -->
			<?php endif; ?>


			<?php if ( is_search() || is_home() || is_category() || is_page_template( 'page-templates/publication-page.php' )) : ?>
			
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			
			<?php else : ?>
			
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'azl' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'azl' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			<?php endif; ?>

		</div>
	</article><!-- #post -->
	

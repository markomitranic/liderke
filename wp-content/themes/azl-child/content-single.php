<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrapper'); ?>>
		
			
		<div class="article-wrapper">

			<div class="post-meta-info">
			    <?php if ( 'post' == get_post_type() ) : ?>
				    <div class="entry-meta">
						<time class="entry-time updated" itemprop="datePublished" datetime="<?php the_time('c'); ?>"><span class="azl-time"><?php the_time('d'); ?>.<?php the_time('m'); ?>.</span></time>
					</div><!-- .entry-meta -->
			    <?php endif; ?>
			</div><!--.post-meta-info-->

			<div class="arcticle-container">
				
				<?php the_category(); ?>

				<!-- Meta for mobile -->
				<div class="mobile-post-meta-info">
				    <?php if ( 'post' == get_post_type() ) : ?>
					    <div class="entry-meta">
							<time class="entry-time updated" itemprop="datePublished" datetime="<?php the_time('c'); ?>"><span class="azl-time"><?php the_time('d'); ?>.<?php the_time('m'); ?>.<?php the_time('Y'); ?>.</span></time>
						</div><!-- .entry-meta -->
				    <?php endif; ?>
				</div><!--.post-meta-info-->

				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					
					<div class="featured-post">
						<?php _e( 'Featured post', 'twentytwelve' ); ?>
					</div>
				
				<?php endif; ?>
				
				<header class="entry-header">

					<?php if ( is_single() ) : ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php else : ?>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
					<?php endif; // is_single() ?>
					

					<?php if ( ! post_password_required() && ! is_attachment() && ! is_single()) {
							the_post_thumbnail('custom-post-thumbnails');
						}
						
					?>

				</header><!-- .entry-header -->

			</div><!-- .arcticle-container -->

		</div><!-- .arcticle-wrapper -->

		<div class="post-gallery">
			<?php if(get_field('gallery')) : ?>
				<div class="introduction-text">
					<?php the_field('gallery'); ?>
				</div>
			<?php endif; ?>		
		</div>
		
		<div class="article-wrapper">

			<?php if(get_field('introduction')) : ?>
				<div class="introduction-text">
					<?php the_field('introduction'); ?>
				</div>
			<?php endif; ?>
	
			<!-- Article text -->
			<div class="arcticle-container">
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
			</div><!-- .arcticle-container -->
		
		</div><!-- .arcticle-wrapper -->
	
	</article><!-- #post -->
	

<?php
/**
 * The template used for displaying posts in academy-page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('publication-post-wrapper'); ?>>
		<div class="featured-post-img">
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-post-thumbnails-three'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/post-thumb-270.jpg" alt="No image"></a>
			<?php endif; ?>
		</div><!-- .featured-post-img -->

		<header class="entry-header">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

</article><!-- #post -->

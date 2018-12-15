<?php
/**
 * The template used for displaying posts in petition category
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('petition-post-wrapper'); ?>>
		<header class="entry-header petition-entry-header">
			<h2 class="entry-title">
				<?php _e( 'Support us, and sign petition for ', 'twentytwelve' ); ?><a href="<?php the_permalink(); ?>" class="petition-post-title" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		</header><!-- .entry-header -->

		<div class="entry-summary petition-entry-summary">
			<a href="<?php the_permalink(); ?>" rel="bookmark" class="petition-widget-btn"><i class="fa fa-pencil"></i><?php _e( 'Sign petition!', 'twentytwelve' ); ?></a>
		</div><!-- .entry-summary -->

</article><!-- #post -->

<?php
/**
 * The template part used for displaying content for the theme.
 *
 * @package Accessible_Zen
 * @since Accessible Zen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() ) : ?>
		<?php the_post_thumbnail(); ?>
		<span class="title"><?php esc_html_e( 'Featured', 'accessible-zen' ); ?></span>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php else : ?>
		<?php the_post_thumbnail(); ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<!--<p><?php accessiblezen_author(); ?></p>-->
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_category() || is_tag() || is_author() || is_day() || is_month() || is_year() || is_search() ) : // Only display Excerpts for certain pages ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
		if ( get_theme_mod( 'accessiblezen_post_content' ) == '' || 'option2' ) :
		the_content( esc_html__( 'Continue reading ', 'accessible-zen' ) . the_title( '', '', false ) . '' );
		else :
		the_excerpt();
		endif;
		?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'accessible-zen' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php accessiblezen_posted_on(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'accessible-zen' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

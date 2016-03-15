<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogname21
 */

?>

<section class="single-post-section">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<div class="posted-date">
						<div class="inner-block">
							<span><?php echo get_the_date( 'j' ); ?></span>
							<span><?php echo get_the_date( 'F' ); ?></span>
						</div>
					</div>
					<div class="comments-count">
						<a href="<?php the_permalink() ?>#comments">
							<?php comments_number( __( '0 Comments' ), __( '1 Comment' ), __( '% Comments' ) ); ?>
						</a>
					</div>
					<div class="category-post">
						<?php $categories = get_the_category();
						if ( $categories ) {
							foreach ( $categories as $category ) {
								$out .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>, ';
							}
							echo trim( $out, ', ' );
						}
						?>
					</div>


				</div><!-- .entry-meta -->
				<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blogname21' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			?>

		</div><!-- .entry-content -->
	</article><!-- #post-## -->

</section>
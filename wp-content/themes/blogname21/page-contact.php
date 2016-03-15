<?php
/*** The template for displaying contact page.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogname21
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="contact-page">
				<div class="container-fluid">
					<div class="feautured-image">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'contact' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.

					echo do_shortcode('[contact-form-7 id="42" title="Contact form 1"]' ); ?>
				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('alternative');
get_footer();

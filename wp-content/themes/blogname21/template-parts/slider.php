<div class="flexslider">
	<ul class="slides">
		<?php $args = array(
			'post_type' => 'slider',
			'posts_per-page'=> 6
		);
		$the_query  = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<div class="img-wrapper">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="slider-description">
						<?php the_title( '<h3 class="slider-title"><a href="' . esc_url( get_permalink('slider') ) . '" rel="bookmark">', '</a></h3>'); ?>
						<div class="slider-excerpt">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</li>
			<?php endwhile;
			wp_reset_postdata();
		endif; ?>

	</ul>
</div>
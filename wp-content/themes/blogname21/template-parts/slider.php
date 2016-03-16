<div class="flexslider">
	<ul class="slides">
		<?php $args = array(
			'post_type' => 'slider',
			'posts_per_page'=> 6
		);
		$the_query  = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<div class="img-wrapper">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="slider-description">
						<h3><a href="<?php  the_permalink(); ?>"><?php the_title();?> </a></h3>
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
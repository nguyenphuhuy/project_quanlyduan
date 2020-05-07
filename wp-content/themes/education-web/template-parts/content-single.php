<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Education Web
 */

$postformat = get_post_format();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-lists">
	    <div class="blog-items <?php if ( !has_post_thumbnail() ){ echo esc_attr( 'nopostimage' ); }?>">

	        <?php education_web_post_format_media( $postformat ); ?>

	        <div class="blog-exercpt">

	        	<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	            
	            <?php if ( 'post' === get_post_type() ) : ?>

					<div class="entry-meta">

						<?php education_web_posted_on(); ?>

					</div><!-- .entry-meta -->
					
				<?php endif; ?>
	        </div>
	    </div>

	    <div class="entry-content">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'education-web' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-web' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->

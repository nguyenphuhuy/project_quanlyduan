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

				<?php the_excerpt(); ?>
	            <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('Continue Reading','education-web'); ?></a>
	        </div>
	        
	    </div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

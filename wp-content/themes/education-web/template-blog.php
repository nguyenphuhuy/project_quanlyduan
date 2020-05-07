<?php
/**
 * The template for displaying  page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Education Web
 *
 * Template Name: Blog Template
 */

$blog = get_theme_mod('education_web_blogtemplate_postcat');
$nuposts = get_theme_mod('education_web_display_number_blogtemplate');

$blog_cat_id = explode(',', $blog);

$args = array(
    'posts_per_page' => $nuposts,
    'post_type' => 'post',
    'paged'     => get_query_var( 'paged' ),					            
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $blog_cat_id
        ),
    ),
);

get_header();

	/**
	 * Breadcrumb 
	 *
     * @since 1.0.0
    */
	do_action( 'education_web_add_breadcrumb', 10 );
?>


<section id="services" class="services single section">
	<div class="container">
		<div class="row">
		
			<div id="primary" class="col-md-8 col-sm-8 col-xs-12 content-area">
				<main id="main" class="site-main">
					<div class="services-main">
						<div class="services-content">
							<?php
								query_posts( $args );

								if ( have_posts() ) : ?>


									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post();

										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', get_post_format() );

									endwhile;

									the_posts_pagination( 
		                                array(
		                                    'prev_text' => esc_html__( 'Prev', 'education-web' ),
		                                    'next_text' => esc_html__( 'Next', 'education-web' ),
		                                )
		                            );

								else :

									get_template_part( 'template-parts/content', 'none' );

								endif; 
							?>
						</div>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>
			
		</div>
	</div>
</section>
<?php get_footer();
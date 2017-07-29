<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package robokarthikeyan
 */

get_header(); ?>


		<?php
		while ( have_posts() ) : the_post();

            if (  ! is_front_page() ) : ?>
				    <header id="bg-head" class="section-wrapper tb-pad">
				        <div class="section-bg bottom" style="background-image: url(<?php echo wp_get_attachment_image_src(8,'full',true)[0]; ?>)">
				            <div class="container">
                                <div class="content">
                                    <div class="nav-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    
                                </div>
				            </div>
				        </div>
				        <div class="container bg-white page-title">
				            <h1 class=""><?php single_post_title(); ?></h1>
				            <h4 class="ubuntu no-margin-bottom"><i><?php robokarthikeyan_posted_on(); ?></i></h4>
				        </div>
				    </header>
			     <?php
			     endif;

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>


<?php
get_sidebar();
get_footer();

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
                 ?>
                 
                 <div class="page-content">
                 <div class="container">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'robokarthikeyan' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'robokarthikeyan' ),
				'after'  => '</div>',
			) );
		?>
	
			     
                <?php

			//the_post_navigation();
$count = 0;
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</div><!-- .entry-content -->
             </div>
             <div class="search-content"></div>
<?php
//get_sidebar();
get_footer();

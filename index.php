<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package robokarthikeyan
 */

get_header(); ?>


		<?php
		if ( have_posts() ) :

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

			/* Start the Loop */
?>
        <div class="page-content">
            <div class="container">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
            <?php
                        while ( have_posts() ) : the_post();
            
                    
            
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                    
                            get_template_part( 'template-parts/content', get_post_format() );
                                
                        endwhile;
                                
                        the_posts_navigation( $arg = array(
                    'prev_text'=> '<div class="btn btn-move" ><span>Previous</span> <i class="fa fa-arrow-left"></i></div>',
                    'next_text'=> '<div class="btn btn-move" ><span>Next</span> <i class="fa fa-arrow-right"></i></div>'
                ) );
                                ?></div></div></div>
        </div>
             <div class="search-content"></div><?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		


<?php
//get_sidebar();
get_footer();

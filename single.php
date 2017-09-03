<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                 <div class="container">
                    <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="poster">
                                    <?php echo the_post_thumbnail( 'full', ['class'=>'img-responsive'] ); ?>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <div class="like">
                                                <i class="fa fa-thumbs-o-up"></i>
                                            </div>
                                        </div>
                                        <div class="pull-right">
                                            <ul class="share-social-media">
                                                <li><a href="https://facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank"><i class="fa fa-facebook-f"></i><span class="count"></span></a></li>
                                                <li><a href="https://twitter.com/home?status=<?php echo get_the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="whatsapp://send?text=<?php echo get_the_permalink().' '.get_the_title(); ?>" target="_self"><i class="fa fa-whatsapp"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                 
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
	</div><!-- .entry-content -->
			     
                <?php

			//the_post_navigation();
$count = 0;
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>


<?php
get_sidebar();
get_footer();

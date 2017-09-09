<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package robokarthikeyan
 */

get_header(); ?>
    

		<?php
		if ( have_posts() ) : ?>
            
            <header id="bg-head" class="section-wrapper tb-pad">
				        <div class="section-bg bottom" style="background-image: url(<?php echo wp_get_attachment_image_src(8,'full',true)[0]; ?>)">
				            <div class="container">
                                <div class="content">
                                    <div class="nav-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <form method="get" class="search-box" action="<?php echo site_url(); ?>">
                                        <input type="text" placeholder="search" name="s">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
				            </div>
				        </div>
				        <div class="container bg-white page-title">
				            <h1 class="no-margin-bottom"><?php the_archive_title(); ?></h1>
				        </div>
				    </header>
                    <div class="page-content">
                 <div class="container">
                 <div class="row">
                    <div class="col-sm-9">
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
                        ?>
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="sidebar-wrapper">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
                        <?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
</div>
<div class="search-content"></div>


<?php
get_sidebar();
get_footer();

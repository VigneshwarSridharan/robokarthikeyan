<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                <h1 class="no-margin-bottom"><?php printf( esc_html__( 'Search Results for: %s', 'robokarthikeyan' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </div>
        </header>
        <?php
			     endif;
                 ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">

                        <?php
			             /* Start the Loop */
			             while ( have_posts() ) : the_post();
                
			             	/**
			             	 * Run the loop for the search to output the results.
			             	 * If you want to overload this in a child theme then include a file
			             	 * called content-search.php and that will be used instead.
			             	 */
			             	get_template_part( 'template-parts/content', 'search' );
                
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

                <?php

get_footer();
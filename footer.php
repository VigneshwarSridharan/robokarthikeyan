<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package robokarthikeyan
 */

?>

<footer class="section-wrapper tb-pad page-footer">
    <div class="section-bg bottom" style="background-image: url(<?php echo wp_get_attachment_image_src(8,'full',true)[0]; ?>)">
        <div class="container">
            <?php
            if(is_active_sidebar('footer-1'))
            { 
                ?><div class="col-sm-4"><?php
                dynamic_sidebar('footer-1');
                ?></div><?php
            }
            if(is_active_sidebar('footer-2'))
            { 
                ?><div class="col-sm-4"><?php
                dynamic_sidebar('footer-2');
                ?></div><?php
            }
            if(is_active_sidebar('footer-3'))
            { 
                ?><div class="col-sm-4"><?php
                dynamic_sidebar('footer-3');
                ?></div><?php
            }
            ?>
        </div>
    </div>
</footer>
	<div class="copy-rights text-center">
	    <p>Copyright &copy; Karthikeyan. | Design by Vigneshwar</p>
	</div>

<?php wp_footer(); ?>

</body>
</html>

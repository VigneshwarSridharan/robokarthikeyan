<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package robokarthikeyan
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php login_check(); ?>

<nav id="navigation" class="page-navigation" role="navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'nav',
                    'menu_class'     => 'links',
                    'container_class'=> 'container'
				) );
			?>
			<ul class="links">
			    <?php  
                if(is_user_logged_in())
                {
                    ?>
                    <li>
                        <a href="<?php echo wp_logout_url(site_url()) ?>">Logout</a>
                    </li>
                    <?php
                }
                else
                {
                    ?>
                    <li>
                        <a href="#User-login" data-toggle="modal" data-tab-open="#register">Register</a>
                    </li>
                    <li>
                        <a href="#User-login" data-toggle="modal" data-tab-open="#login">Login</a>
                    </li>
                    <?php
                }
                ?>
			</ul>
			<div class="close-nav" toggle-nav>
			    <span></span><span></span>
			</div>
</nav><!-- #site-navigation -->
	
<?php fixedNavigation(); ?>
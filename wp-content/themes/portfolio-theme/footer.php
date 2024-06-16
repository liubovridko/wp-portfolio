<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio
 */

?>

<footer>
    <div class="container">
	 <div class="footer-logo">
       <?php 
        if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ( $logo ) {
                $logo_url = $logo[0];
                echo '<a href="'.home_url().'">';
                echo '<img src="'.esc_url($logo_url).'" alt="'.esc_attr(get_bloginfo('name')).'" width="290" height="65">';
                echo '</a>';
            }
        } else {
            echo '<a href="'.home_url().'"><img src="'.get_template_directory_uri().'/assets/img/logo.png" alt="John Doe Logo" width="290" height="65"></a>';
        }
        ?>
        </div>
        <nav>
            <?php
            if (is_active_sidebar('footer-1')) {
                dynamic_sidebar('footer-1');
            }
            ?>
        </nav>
        <p>&copy; <?php echo date("Y"); ?> All rights reserved</p>
    </div>
</footer>
<?php wp_footer(); ?>
</div>
</body>
</html>

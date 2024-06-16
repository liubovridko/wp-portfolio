<?php
/**
 * Template Name: Front Page
 *
 * @package Portfolio
 */

get_header(); ?>

<main id="primary" class="site-main">

  <section class="hero">
      <div class="hero-container">
        <div class="hero-content">
            <h1><?php the_field('hero_heading'); ?></h1>
            <p><?php the_field('hero_content'); ?></p>
            <?php 
             $btn_link = get_field('btn_link');
             $btn_name = get_field('btn_name');
            ?>
            <a href="<?php echo esc_url($btn_link); ?>" class="green-btn"><?php echo esc_html($btn_name); ?></a>
        </div>
        <div class="hero-image">
            <?php
            $hero_image = get_field('hero_image');
            if( $hero_image ) :
                $hero_img_url = esc_url($hero_image['url']);
                $hero_img_alt = esc_attr($hero_image['alt']);
                $hero_img_width = $hero_image['width'];
                $hero_img_height = $hero_image['height'];
            ?>
                <img src="<?php echo $hero_img_url; ?>" alt="<?php  echo $hero_img_alt; ?>" width="<?php echo $hero_img_width ?>" height="<?php echo $hero_img_height; ?>">
            <?php endif; ?>
        </div>
	  </div>
  </section>

   <section class="superstar-seo">
         <div class="content-wrapper">
              <div class="text-column">
                 <h2><?php the_field('seo_heading'); ?></h2>
                 <p><?php the_field('seo_content'); ?></p>
             </div>
             <div class="image-column">
             <?php
                $seo_image = get_field('seo_image');
                if( $seo_image ) :
                    $image_url = esc_url($seo_image['url']);
                    $image_alt = esc_attr($seo_image['alt']);
                    $image_width = $seo_image['width'];
                    $image_height = $seo_image['height'];
                ?>
                    <img src="<?php echo $image_url; ?>" alt="<?php  echo $image_alt; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
                <?php endif; ?>
            </div>
      </div>
   </section>

   <section class="testimonials">
    <div class="container">
        <div class="section-header">
            <h2>What My <span>Clients Say</span></h2>
            <div class="slider-nav">
               <button class="prev">
                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g clip-path="url(#clip0_1_343)">
                         <path d="M19.7709 9.94711C19.7706 9.94687 19.7704 9.9466 19.7702 9.94636L15.688 5.88387C15.3821 5.57953 14.8875 5.58067 14.5831 5.88653C14.2787 6.19235 14.2799 6.68699 14.5857 6.99137L17.3265 9.71886H0.78125C0.349766 9.71886 0 10.0686 0 10.5001C0 10.9316 0.349766 11.2814 0.78125 11.2814H17.3264L14.5857 14.0089C14.2799 14.3132 14.2788 14.8079 14.5831 15.1137C14.8875 15.4196 15.3822 15.4207 15.688 15.1164L19.7702 11.0539C19.7704 11.0536 19.7706 11.0534 19.7709 11.0531C20.0769 10.7477 20.0759 10.2515 19.7709 9.94711Z" fill="black"/>
                     </g>
                     <defs>
                        <clipPath id="clip0_1_343">
                           <rect width="20" height="20" fill="" transform="translate(0 0.5)"/>
                        </clipPath>
                     </defs>
                  </svg>
                </button>
                <button class="next">
                 <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g clip-path="url(#clip0_1_56)">
                        <path d="M19.7709 9.44704C19.7706 9.44681 19.7704 9.44654 19.7702 9.4463L15.688 5.38381C15.3821 5.07947 14.8875 5.08061 14.5831 5.38646C14.2787 5.69228 14.2799 6.18693 14.5857 6.49131L17.3265 9.2188H0.78125C0.349766 9.2188 0 9.56857 0 10.0001C0 10.4315 0.349766 10.7813 0.78125 10.7813H17.3264L14.5857 13.5088C14.2799 13.8132 14.2788 14.3078 14.5831 14.6136C14.8875 14.9195 15.3822 14.9206 15.688 14.6163L19.7702 10.5538C19.7704 10.5536 19.7706 10.5533 19.7709 10.5531C20.0769 10.2477 20.0759 9.75142 19.7709 9.44704Z" fill="black"/>
                     </g>
                     <defs>
                        <clipPath id="clip0_1_56">
                           <rect width="20" height="20" fill=""/>
                        </clipPath>
                     </defs>
                 </svg>
                </button>
            </div>
        </div>
        <div class="testimonial-slider-wrapper">
        <div class="testimonial-slider">
                <?php
                $args = array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $testimonial_query = new WP_Query($args);
                if ($testimonial_query->have_posts()) :
                    while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                        $name = get_field('custom_name'); 
                        $position = get_field('custom_position'); 
                        $photo_data = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        $photo_url = $photo_data[0];
                        $photo_width = $photo_data[1];
                        $photo_height = $photo_data[2];
                        $content = get_the_content();
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(array('<p>', '</p>'), '', $content); // Remove <p>
                ?>
                        <div class="testimonial">
                        <img src="<?php echo esc_url($photo_url); ?>" alt="Client Photo" width="<?php echo $photo_width; ?>" height="<?php echo $photo_height; ?>">
                            <div class="testimonial-content">
                                <p><?php echo $content; ?></p>
                                <h3><?php echo esc_html($name); ?></h3>
                                <span><?php echo esc_html($position); ?></span>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        <div class="slider-indicators">
            <button class="indicator active"></button>
            <button class="indicator"></button>
            <button class="indicator"></button>
        </div>
    </div>
</section>

    <section class="contact">
        <div class="container">
            <div class="contact-text">
               <h2>Get in Touch</h2>
               <?php if ( is_active_sidebar( 'contact-section' ) ) : ?>
                <?php dynamic_sidebar( 'contact-section' ); ?>
                <?php endif; ?>
            </div>
            <?php echo do_shortcode( '[forminator_form id="9"]' ); ?>
      </div> 
    </section>
</main>
<?php get_footer(); ?>


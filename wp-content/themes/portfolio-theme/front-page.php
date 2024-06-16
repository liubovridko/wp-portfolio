<?php
/**
 * Template Name: Front Page
 *
 * @package Portfolio
 */

get_header(); ?>

<main id="primary" class="site-main">

   <section class="superstar-seo">
         <div class="content-wrapper">
               <div class="text-column">
                  <h2>Superstar SEO</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
               </div>
               <div class="image-column">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_devices.png" alt="Superstar SEO">
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
                        $photo = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $content = get_the_content();
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(array('<p>', '</p>'), '', $content); // Remove <p>
                ?>
                        <div class="testimonial">
                            <img src="<?php echo esc_url($photo); ?>" alt="Client Photo">
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
            <form action="#">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="message" placeholder="Write Message" required></textarea>
                <button type="submit" class="green-btn btn-with-icon">Submit Message</button>
            </form>
      </div>
    </section>
</main>
<?php get_footer(); ?>


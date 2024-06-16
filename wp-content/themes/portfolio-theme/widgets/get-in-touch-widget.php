<?php
/**
 * Custom Get In Touch Widget
 */


 class Portfolio_Get_In_Touch extends WP_Widget {

    function __construct() {
        parent::__construct(
            'get_in_touch_contact_widget',
            __( 'Get in Touch Widget', 'portfolio' ),
            array(
                'description' => __( 'Displays a contact block with email and address.', 'portfolio' ),
            )
        );
    }

    /**
     * Outputs the content of the widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';
        $address = ! empty( $instance['address'] ) ? $instance['address'] : '';

        echo $args['before_widget'];
        ?>
        <div class="contact-info">
            <?php if ( ! empty( $email ) ) : ?>
                <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
            <?php endif; ?>
            <?php if ( ! empty( $address ) ) : ?>
                <p><?php echo esc_html( $address ); ?></p>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin.
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        $email = ! empty( $instance['email'] ) ? $instance['email'] : __( 'hello@domainname.com', 'portfolio' );
        $address = ! empty( $instance['address'] ) ? $instance['address'] : __( '237 Maple Avenue, Suite 902', 'portfolio' );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email:', 'portfolio' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_attr_e( 'Address:', 'portfolio' ); ?></label>
            <textarea class="widefat" rows="4" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"><?php echo esc_textarea( $address ); ?></textarea>
        </p>
        <?php
    }

    /**
     * Processing widget options on save.
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_text_field( $new_instance['email'] ) : '';
        $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? sanitize_textarea_field( $new_instance['address'] ) : '';
        return $instance;
    }
}
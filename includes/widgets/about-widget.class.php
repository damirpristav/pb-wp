<?php

class PRT_PB_Widgets_About extends WP_Widget{

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'pb_about_widget',
            'description' => __( 'About widget', 'pinkbutterflies' ),
        );
        parent::__construct( 'pb-about-widget', __( 'PB: About widget', 'pinkbutterflies' ), $widget_ops );

    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'About me', 'pinkbutterflies' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $author_image_url = ( ! empty( $instance['author_image_url'] )  ? $instance['author_image_url'] : '' );
        $author_desc = ( ! empty( $instance['author_desc'] )  ? $instance['author_desc'] : '' );

        echo $args['before_widget'];

        if( $title ){
            echo $args['before_title'] . $title . $args['after_title'];
        }

        ?>
        <div class="widget-content">
            <div class="image-box">
                <img src="<?php echo $author_image_url; ?>" alt="" />
            </div>
            <div class="about-text">
                <p><?php echo $author_desc; ?></p>
            </div>
        </div>
        <?php

        echo $args['after_widget'];

    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin

        $author_image_url = isset( $instance['author_image_url'] ) ? esc_attr( $instance['author_image_url'] ) : '';
        $author_desc = isset( $instance['author_desc'] ) ? esc_attr( $instance['author_desc'] ) : '';

        ?>

        <p>
            <label for="<?php echo $this->get_field_name( 'author_image_url' ); ?>"><?php _e( 'Image URL:', 'pinkbutterflies' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'author_image_url' ); ?>" id="<?php echo $this->get_field_id( 'author_image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $author_image_url ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'author_desc' ); ?>"><?php _e( 'About Author:', 'pinkbutterflies' ); ?></label>
            <textarea rows="5" class="widefat" id="<?php echo $this->get_field_id( 'author_desc' ); ?>" name="<?php echo $this->get_field_name( 'author_desc' ); ?>"><?php echo $author_desc; ?></textarea>
        </p>

        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['author_image_url'] = strip_tags( $new_instance['author_image_url'] );
        $instance['author_desc'] = strip_tags( $new_instance['author_desc'] );

        return $instance;
    }

}

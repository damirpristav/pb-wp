<?php

class PRT_PB_Widgets_Social extends WP_Widget{

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'pb_social_widget',
            'description' => __( 'Social widget', 'pinkbutterflies' ),
        );
        parent::__construct( 'pb-social-widget', __( 'PB: Social widget', 'pinkbutterflies' ), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Follow me', 'pinkbutterflies' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $facebook = ( ! empty( $instance['facebook'] )  ? $instance['facebook'] : '' );
        $twitter = ( ! empty( $instance['twitter'] )  ? $instance['twitter'] : '' );
        $instagram = ( ! empty( $instance['instagram'] )  ? $instance['instagram'] : '' );
        $google_plus = ( ! empty( $instance['gplus'] )  ? $instance['gplus'] : '' );
        $youtube = ( ! empty( $instance['youtube'] )  ? $instance['youtube'] : '' );
        $tumblr = ( ! empty( $instance['tumblr'] )  ? $instance['tumblr'] : '' );
        $linkedin = ( ! empty( $instance['linkedin'] )  ? $instance['linkedin'] : '' );
        $pinterest = ( ! empty( $instance['pinterest'] )  ? $instance['pinterest'] : '' );
        $rss = ( ! empty( $instance['rss'] )  ? $instance['rss'] : '' );
        $behance = ( ! empty( $instance['behance'] )  ? $instance['behance'] : '' );
        $dribbble = ( ! empty( $instance['dribbble'] )  ? $instance['dribbble'] : '' );
        $github = ( ! empty( $instance['github'] )  ? $instance['github'] : '' );
        $qq = ( ! empty( $instance['qq'] )  ? $instance['qq'] : '' );
        $digg = ( ! empty( $instance['digg'] )  ? $instance['digg'] : '' );
        $soundcloud = ( ! empty( $instance['soundcloud'] )  ? $instance['soundcloud'] : '' );
        $steam = ( ! empty( $instance['steam'] )  ? $instance['steam'] : '' );
        $vimeo = ( ! empty( $instance['vimeo'] )  ? $instance['vimeo'] : '' );
        $vine = ( ! empty( $instance['vine'] )  ? $instance['vine'] : '' );

        echo $args['before_widget'];

        if( $title ){
            echo $args['before_title'] . $title . $args['after_title'];
        }

        ?>

        <div class="widget-content">
            <div class="icons">
                <?php if( $facebook ): ?><a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                <?php if( $twitter ): ?><a href="<?php echo $twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
                <?php if( $instagram ): ?><a href="<?php echo $instagram; ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
                <?php if( $google_plus ): ?><a href="<?php echo $google_plus; ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a><?php endif; ?>
                <?php if( $youtube ): ?><a href="<?php echo $youtube; ?>" target="_blank"><i class="fab fa-youtube"></i></a><?php endif; ?>
                <?php if( $tumblr ): ?><a href="<?php echo $tumblr; ?>" target="_blank"><i class="fab fa-tumblr"></i></a><?php endif; ?>
                <?php if( $linkedin ): ?><a href="<?php echo $linkedin; ?>" target="_blank"><i class="fab fa-linkedin"></i></a><?php endif; ?>
                <?php if( $pinterest ): ?><a href="<?php echo $pinterest; ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a><?php endif; ?>
                <?php if( $rss ): ?><a href="<?php echo $rss; ?>" target="_blank"><i class="fas fa-rss"></i></a><?php endif; ?>
                <?php if( $behance ): ?><a href="<?php echo $behance; ?>" target="_blank"><i class="fab fa-behance"></i></a><?php endif; ?>
                <?php if( $dribbble ): ?><a href="<?php echo $dribbble; ?>" target="_blank"><i class="fab fa-dribbble"></i></a><?php endif; ?>
                <?php if( $github ): ?><a href="<?php echo $github; ?>" target="_blank"><i class="fab fa-github"></i></a><?php endif; ?>
                <?php if( $qq ): ?><a href="<?php echo $qq; ?>" target="_blank"><i class="fab fa-qq"></i></a><?php endif; ?>
                <?php if( $digg ): ?><a href="<?php echo $digg; ?>" target="_blank"><i class="fab fa-digg"></i></a><?php endif; ?>
                <?php if( $soundcloud ): ?><a href="<?php echo $soundcloud; ?>" target="_blank"><i class="fab fa-soundcloud"></i></a><?php endif; ?>
                <?php if( $steam ): ?><a href="<?php echo $steam; ?>" target="_blank"><i class="fab fa-steam"></i></a><?php endif; ?>
                <?php if( $vimeo ): ?><a href="<?php echo $vimeo; ?>" target="_blank"><i class="fab fa-vimeo"></i></a><?php endif; ?>
                <?php if( $vine ): ?><a href="<?php echo $vine; ?>" target="_blank"><i class="fab fa-vine"></i></a><?php endif; ?>
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
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Follow me', 'pinkbutterflies' );
        $twitter = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
        $tumblr = isset( $instance['tumblr'] ) ? esc_attr( $instance['tumblr'] ) : '';
        $facebook = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
        $linkedin = isset( $instance['linkedin'] ) ? esc_attr( $instance['linkedin'] ) : '';
        $google_plus = isset( $instance['gplus'] ) ? esc_attr( $instance['gplus'] ) : '';
        $pinterest = isset( $instance['pinterest'] ) ? esc_attr( $instance['pinterest'] ) : '';
        $instagram = isset( $instance['instagram'] ) ? esc_attr( $instance['instagram'] ) : '';
        $youtube = isset( $instance['youtube'] ) ? esc_attr( $instance['youtube'] ) : '';
        $rss = isset( $instance['rss'] ) ? esc_attr( $instance['rss'] ) : '';
        $behance = isset( $instance['behance'] ) ? esc_attr( $instance['behance'] ) : '';
        $dribbble = isset( $instance['dribbble'] ) ? esc_attr( $instance['dribbble'] ) : '';
        $github = isset( $instance['github'] ) ? esc_attr( $instance['github'] ) : '';
        $qq = isset( $instance['qq'] ) ? esc_attr( $instance['qq'] ) : '';
        $digg = isset( $instance['digg'] ) ? esc_attr( $instance['digg'] ) : '';
        $soundcloud = isset( $instance['soundcloud'] ) ? esc_attr( $instance['soundcloud'] ) : '';
        $steam = isset( $instance['steam'] ) ? esc_attr( $instance['steam'] ) : '';
        $vimeo = isset( $instance['vimeo'] ) ? esc_attr( $instance['vimeo'] ) : '';
        $vine = isset( $instance['vine'] ) ? esc_attr( $instance['vine'] ) : '';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'pinkbutterflies' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $facebook; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Twitter link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $twitter; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>">Instagram link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instagram; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'gplus' ); ?>">Google+ link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" value="<?php echo $google_plus; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>">Youtube link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $youtube; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">Tumblr link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $tumblr; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">Linkedin link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $linkedin; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">Pinterest link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $pinterest; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'rss' ); ?>">RSS link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $rss; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'behance' ); ?>">Behance link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $behance; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>">Dribbble link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $dribbble; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'github' ); ?>">Github link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo $github; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'qq' ); ?>">Qq link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'qq' ); ?>" name="<?php echo $this->get_field_name( 'qq' ); ?>" value="<?php echo $qq; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'digg' ); ?>">Digg link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'digg' ); ?>" name="<?php echo $this->get_field_name( 'digg' ); ?>" value="<?php echo $digg; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>">Soundcloud link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" value="<?php echo $soundcloud; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'steam' ); ?>">Steam link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'steam' ); ?>" name="<?php echo $this->get_field_name( 'steam' ); ?>" value="<?php echo $steam; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>">Vimeo link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $vimeo; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'vine' ); ?>">Vine link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vine' ); ?>" name="<?php echo $this->get_field_name( 'vine' ); ?>" value="<?php echo $vine; ?>" />
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
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['twitter'] = strip_tags( $new_instance['twitter'] );
        $instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
        $instance['facebook'] = strip_tags( $new_instance['facebook'] );
        $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
        $instance['gplus'] = strip_tags( $new_instance['gplus'] );
        $instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
        $instance['instagram'] = strip_tags( $new_instance['instagram'] );
        $instance['youtube'] = strip_tags( $new_instance['youtube'] );
        $instance['rss'] = strip_tags( $new_instance['rss'] );
        $instance['behance'] = strip_tags( $new_instance['behance'] );
        $instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
        $instance['github'] = strip_tags( $new_instance['github'] );
        $instance['qq'] = strip_tags( $new_instance['qq'] );
        $instance['digg'] = strip_tags( $new_instance['digg'] );
        $instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
        $instance['steam'] = strip_tags( $new_instance['steam'] );
        $instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
        $instance['vine'] = strip_tags( $new_instance['vine'] );

        return $instance;
    }

}

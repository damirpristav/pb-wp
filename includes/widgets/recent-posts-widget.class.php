<?php

class PRT_PB_Widgets_Recent_Posts extends WP_Widget{

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'pb_recent_posts_widget',
            'description' => __( 'Most recent posts with thumbnail', 'pinkbutterflies' ),
        );
        parent::__construct( 'pb-recent-posts-widget', __( 'PB: Recent posts', 'pinkbutterflies' ), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'pinkbutterflies' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;

        if( ! $number ){
            $number = 3;
        }

        $r = new WP_Query(
            apply_filters( 'widget_posts_args',
                array(
                    'posts_per_page' => $number,
                    'no_found_rows' => true,
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        )
                    ),
                )
            )
        );

        if( $r->have_posts() ):

            echo $args['before_widget'];

            if( $title ){
                echo $args['before_title'] . $title . $args['after_title'];
            }

            ?>

            <div class="widget-content">
                <ul class="recent-posts-with-thumb">
                    <?php while( $r->have_posts() ): $r->the_post(); ?>
                    <li>
                        <div class="image-box">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail('recent-thumb');
                                }
                                ?>
                            </a>
                        </div>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p class="date"><?php echo get_the_date('F j, Y'); ?></p>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <?php echo $args['after_widget']; ?>

            <?php

            wp_reset_postdata();

        endif;

    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Recent Posts', 'pinkbutterflies' );
        $number = isset( $instance['number'] ) ? esc_attr( $instance['number'] ) : 3;
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'pinkbutterflies' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts:', 'pinkbutterflies' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $number; ?>" />
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
        $instance['number'] = (int) $new_instance['number'];

        return $instance;
    }

}

<?php

require_once( __DIR__ . '/about-widget.class.php' );
require_once( __DIR__ . '/social-widget.class.php' );
require_once( __DIR__ . '/recent-posts-widget.class.php' );

class PRT_PB_Widgets extends PRT_PinkButterflies{

    public function __construct(){

        add_action( 'widgets_init', array( $this, 'register_widgets' ) );

    }

    public function register_widgets(){

        register_widget( 'PRT_PB_Widgets_About' );
        register_widget( 'PRT_PB_Widgets_Recent_Posts' );
        register_widget( 'PRT_PB_Widgets_Social' );

    }

}

$prtPBWidgets = new PRT_PB_Widgets;

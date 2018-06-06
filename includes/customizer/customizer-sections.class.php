<?php

class PRT_PB_Customizer_Sections extends PRT_PB_Customizer{

    public function get_sections(){

        $sections = array();

        $sections['header'] = array(
            'id' => $this->prefix . 'header',
            'title' => __( 'PB: Header', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['social_icons'] = array(
            'id' => $this->prefix . 'social_icons',
            'title' => __( 'PB: Social Icons', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['featured_posts'] = array(
            'id' => $this->prefix . 'featured_posts',
            'title' => __( 'PB: Featured Posts', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['blog_layouts'] = array(
            'id' => $this->prefix . 'blog_layouts',
            'title' => __( 'PB: Blog Layouts', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['posts'] = array(
            'id' => $this->prefix . 'posts',
            'title' => __( 'PB: Posts', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['navigation'] = array(
            'id' => $this->prefix . 'navigation',
            'title' => __( 'PB: Navigation', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['subscription'] = array(
            'id' => $this->prefix . 'subscription',
            'title' => __( 'PB: Subscription', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['footer'] = array(
            'id' => $this->prefix . 'footer',
            'title' => __( 'PB: Footer', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['fonts'] = array(
            'id' => $this->prefix . 'fonts',
            'title' => __( 'PB: Fonts', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['other'] = array(
            'id' => $this->prefix . 'other',
            'title' => __( 'PB: Other', 'pinkbutterflies' ),
            'priority' => 150,
            'panel' => ''
        );

        $sections['main_colors'] = array(
            'id' => $this->prefix . 'main_colors',
            'title' => __( 'Main', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['header_colors'] = array(
            'id' => $this->prefix . 'header_colors',
            'title' => __( 'Header', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['mobile_menu_colors'] = array(
            'id' => $this->prefix . 'mobile_menu_colors',
            'title' => __( 'Mobile Menu', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['lightbox_colors'] = array(
            'id' => $this->prefix . 'lightbox_colors',
            'title' => __( 'Lightbox', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['featured_slider_colors'] = array(
            'id' => $this->prefix . 'featured_slider_colors',
            'title' => __( 'Featured Slider', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['newsletter_colors'] = array(
            'id' => $this->prefix . 'newsletter_colors',
            'title' => __( 'Subscribe To Newsletter', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['title_box_colors'] = array(
            'id' => $this->prefix . 'title_box_colors',
            'title' => __( 'Title Box', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['posts_colors'] = array(
            'id' => $this->prefix . 'posts_colors',
            'title' => __( 'Posts', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['single_post_colors'] = array(
            'id' => $this->prefix . 'single_post_colors',
            'title' => __( 'Single Post', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['cf7_colors'] = array(
            'id' => $this->prefix . 'cf7_colors',
            'title' => __( 'Contact Form 7', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['recipe_wrap_colors'] = array(
            'id' => $this->prefix . 'recipe_wrap_colors',
            'title' => __( 'Recipe Card', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['comments_colors'] = array(
            'id' => $this->prefix . 'comments_colors',
            'title' => __( 'Comments', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['photo_gallery_colors'] = array(
            'id' => $this->prefix . 'photo_gallery_colors',
            'title' => __( 'Photo Gallery', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['nothing_found_colors'] = array(
            'id' => $this->prefix . 'nothing_found_colors',
            'title' => __( 'Nothing Found', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['navigation_colors'] = array(
            'id' => $this->prefix . 'navigation_colors',
            'title' => __( 'Navigation', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['section_404_colors'] = array(
            'id' => $this->prefix . 'section_404_colors',
            'title' => __( '404 Page', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['sidebar_colors'] = array(
            'id' => $this->prefix . 'sidebar_colors',
            'title' => __( 'Sidebar', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['instagram_section_colors'] = array(
            'id' => $this->prefix . 'instagram_section_colors',
            'title' => __( 'Instagram Section', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        $sections['footer_colors'] = array(
            'id' => $this->prefix . 'footer_colors',
            'title' => __( 'Footer', 'pinkbutterflies' ),
            'priority' => 200,
            'panel' => 'prt_pb_colors'
        );

        return $sections;

    }

}

<?php

class PRT_PB_Customizer_Settings extends PRT_PB_Customizer{

    private $theme_opt_prefix = 'prt_pb_options';

    public function get_settings(){

        $settings = array();

        $settings['logo'] = array(
            'id' => $this->theme_opt_prefix . '[logo]',
            's_key' => 'logo',
            'cap' => 'edit_theme_options',
            'default' => get_template_directory_uri() . '/images/logo.png',
            'desc' => '',
            'sanitize' => 'esc_url_raw',
            'label' => __( 'Change Logo', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header',
            'type' => 'image',
            'transport' => 'postMessage',
            'in_css' => false
        );

        $settings['header_image'] = array(
            'id' => $this->theme_opt_prefix . '[header_image]',
            's_key' => 'header_image',
            'cap' => 'edit_theme_options',
            'default' => get_template_directory_uri() . '/images/header-image.jpg',
            'desc' => __( 'Only for header version 2.', 'pinkbutterflies' ),
            'sanitize' => 'esc_url_raw',
            'label' => __( 'Header Image', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header',
            'type' => 'bg_image',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '#header.version-2 .header-top',
                'property' => 'background-image'
            )
        );

        $settings['header_version'] = array(
            'id' => $this->theme_opt_prefix . '[header_version]',
            's_key' => 'header_version',
            'cap' => 'edit_theme_options',
            'default' => 'v1',
            'desc' => __( 'Change header version', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_radio',
            'label' => __( 'Header Version', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header',
            'type' => 'radio',
            'choices' => array(
                'v1' => __( 'Version 1', 'pinkbutterflies' ),
                'v2' => __( 'Version 2', 'pinkbutterflies' ),
                'v3' => __( 'Version 3', 'pinkbutterflies' ),
                'v4' => __( 'Version 4', 'pinkbutterflies' ),
            ),
            'transport' => 'refresh',
            'in_css' => false,
        );

        $settings['social_profiles'] = array(
            'id' => $this->theme_opt_prefix . '[social_profiles]',
            's_key' => 'social_profiles',
            'cap' => 'edit_theme_options',
            'default' => '',
            'desc' => '',
            'sanitize' => 'sanitize_dropdown',
            'label' => __( 'Social Profiles', 'pinkbutterflies' ),
            'section' => $this->prefix . 'social_icons',
            'type' => 'social_icons',
            'transport' => 'refresh',
            'in_css' => false
        );

        $settings['hide_slider'] = array(
            'id' => $this->theme_opt_prefix . '[hide_slider]',
            's_key' => 'hide_slider',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide featured slider', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Slider', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'postMessage',
        );

        $settings['slider_version'] = array(
            'id' => $this->theme_opt_prefix . '[slider_version]',
            's_key' => 'slider_version',
            'cap' => 'edit_theme_options',
            'default' => 'v1',
            'desc' => __( 'Change slider version', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_radio',
            'label' => __( 'Featured Slider Version', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_posts',
            'type' => 'radio',
            'choices' => array(
                'v1' => __( 'Version 1', 'pinkbutterflies' ),
                'v2' => __( 'Version 2', 'pinkbutterflies' ),
                'v3' => __( 'Version 3', 'pinkbutterflies' ),
                'v4' => __( 'Version 4', 'pinkbutterflies' ),
            ),
            'transport' => 'refresh',
            'in_css' => false,
        );

        $settings['blog_layout'] = array(
            'id' => $this->theme_opt_prefix . '[blog_layout]',
            's_key' => 'blog_layout',
            'cap' => 'edit_theme_options',
            'default' => 'standard',
            'desc' => __( 'Change blog layout', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_radio',
            'label' => __( 'Blog Layout', 'pinkbutterflies' ),
            'section' => $this->prefix . 'blog_layouts',
            'type' => 'radio',
            'choices' => array(
                'standard' => __( 'Standard', 'pinkbutterflies' ),
                'standard-s-left' => __( 'Standard - Sidebar Left', 'pinkbutterflies' ),
                'standard-no-s' => __( 'Standard - No Sidebar', 'pinkbutterflies' ),
                'standard-grid' => __( 'First Standard - Other Grid', 'pinkbutterflies' ),
                'standard-grid-s-left' => __( 'First Standard - Other Grid - Sidebar Left', 'pinkbutterflies' ),
                'standard-grid-no-s' => __( 'First Standard - Other Grid - No Sidebar', 'pinkbutterflies' ),
                'grid' => __( 'Grid', 'pinkbutterflies' ),
                'grid-s-left' => __( 'Grid - Sidebar Left', 'pinkbutterflies' ),
                'grid-full' => __( 'Grid Full Width', 'pinkbutterflies' ),
                'list' => __( 'List', 'pinkbutterflies' ),
                'list-s-left' => __( 'List - Sidebar Left', 'pinkbutterflies' ),
                'list-no-s' => __( 'List - No Sidebar', 'pinkbutterflies' ),
                'masonry' => __( 'Masonry', 'pinkbutterflies' ),
                'masonry-s-left' => __( 'Masonry - Sidebar Left', 'pinkbutterflies' ),
                'masonry-full' => __( 'Masonry Full Width', 'pinkbutterflies' ),
                'masonry-v2' => __( 'Masonry Version 2', 'pinkbutterflies' ),
            ),
            'transport' => 'refresh',
            'in_css' => false,
        );

        /* *********************************
        ** Posts
        ***********************************/
        $settings['default_bg_image_single'] = array(
            'id' => $this->theme_opt_prefix . '[default_bg_image_single]',
            's_key' => 'default_bg_image_single',
            'cap' => 'edit_theme_options',
            'default' => get_template_directory_uri() . '/images/404-image.jpg',
            'desc' => __( 'If single post does not have featured image default image will be use as background image on single post version 1 in title box', 'pinkbutterflies' ),
            'sanitize' => 'esc_url_raw',
            'label' => __( 'Change Single Post Default Image', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'image',
            'transport' => 'refresh',
            'in_css' => false
        );

        $settings['hide_categories'] = array(
            'id' => $this->theme_opt_prefix . '[hide_categories]',
            's_key' => 'hide_categories',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide categories section on posts', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Categories', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_post_meta'] = array(
            'id' => $this->theme_opt_prefix . '[hide_post_meta]',
            's_key' => 'hide_post_meta',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide post meta section on posts', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Post Date & Author', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_post_comments'] = array(
            'id' => $this->theme_opt_prefix . '[hide_post_comments]',
            's_key' => 'hide_post_comments',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide post comments number section on posts', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Number of Comments', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_post_share'] = array(
            'id' => $this->theme_opt_prefix . '[hide_post_share]',
            's_key' => 'hide_post_share',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide post share buttons section on posts', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Share Post Buttons', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_read_more'] = array(
            'id' => $this->theme_opt_prefix . '[hide_read_more]',
            's_key' => 'hide_read_more',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide read more section on posts', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Read More Button', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_categories_single'] = array(
            'id' => $this->theme_opt_prefix . '[hide_categories_single]',
            's_key' => 'hide_categories_single',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide categories section on single post', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Categories on Single Post', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_post_meta_single'] = array(
            'id' => $this->theme_opt_prefix . '[hide_post_meta_single]',
            's_key' => 'hide_post_meta_single',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide post meta section on single post', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Post Date & Author on Single Post', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_post_tags'] = array(
            'id' => $this->theme_opt_prefix . '[hide_post_tags]',
            's_key' => 'hide_post_tags',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide post tags section on single post', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Post Tags', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_post_comments_single'] = array(
            'id' => $this->theme_opt_prefix . '[hide_post_comments_single]',
            's_key' => 'hide_post_comments_single',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide post comments number section on single post', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Number of Comments on Single Post', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_post_share_single'] = array(
            'id' => $this->theme_opt_prefix . '[hide_post_share_single]',
            's_key' => 'hide_post_share_single',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide post share buttons section on single post', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Share Post Buttons on Single Post', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_related_posts'] = array(
            'id' => $this->theme_opt_prefix . '[hide_related_posts]',
            's_key' => 'hide_related_posts',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide related posts section on single post', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Related Posts', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_about_author'] = array(
            'id' => $this->theme_opt_prefix . '[hide_about_author]',
            's_key' => 'hide_about_author',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide about author section on single post', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide About Author Section', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        /* *********************************
        ** Navigation
        ***********************************/
        $settings['nav_version'] = array(
            'id' => $this->theme_opt_prefix . '[nav_version]',
            's_key' => 'nav_version',
            'cap' => 'edit_theme_options',
            'default' => 'v1',
            'desc' => __( 'Change navigation version', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_radio',
            'label' => __( 'Navigation Version', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation',
            'type' => 'radio',
            'choices' => array(
                'v1' => __( 'Version 1 - Newer & Older', 'pinkbutterflies' ),
                'v2' => __( 'Version 2 - Numbers', 'pinkbutterflies' ),
                'v3' => __( 'Version 3 - Load More Button', 'pinkbutterflies' ),
            ),
            'transport' => 'refresh',
            'in_css' => false,
        );

        $settings['posts_to_load'] = array(
            'id' => $this->theme_opt_prefix . '[posts_to_load]',
            's_key' => 'posts_to_load',
            'cap' => 'edit_theme_options',
            'default' => '3',
            'desc' => __( 'Number of posts to load when navigation version 3 is selected and load more button is clicked', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Number of Posts to Load', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation',
            'type' => 'text',
            'transport' => 'refresh',
            'in_css' => false
        );

        $settings['nav_version_archive'] = array(
            'id' => $this->theme_opt_prefix . '[nav_version_archive]',
            's_key' => 'nav_version_archive',
            'cap' => 'edit_theme_options',
            'default' => 'v1',
            'desc' => __( 'Change Navigation Version on Archive Pages & Search Page', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_radio',
            'label' => __( 'Navigation Version on Archive Pages & Search Page', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation',
            'type' => 'radio',
            'choices' => array(
                'v1' => __( 'Version 1 - Newer & Older', 'pinkbutterflies' ),
                'v2' => __( 'Version 2 - Numbers', 'pinkbutterflies' ),
                'v3' => __( 'Version 3 - Load More Button', 'pinkbutterflies' ),
            ),
            'transport' => 'refresh',
            'in_css' => false,
        );

        $settings['posts_to_load_archive'] = array(
            'id' => $this->theme_opt_prefix . '[posts_to_load_archive]',
            's_key' => 'posts_to_load_archive',
            'cap' => 'edit_theme_options',
            'default' => '3',
            'desc' => __( 'Number of posts to load when navigation version 3 is selected and load more button is clicked on archive pages', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Number of Posts to Load on Archive Pages', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation',
            'type' => 'text',
            'transport' => 'refresh',
            'in_css' => false
        );

        /* *********************************
        ** Subscription
        ***********************************/
        $settings['subscription_text_1'] = array(
            'id' => $this->theme_opt_prefix . '[subscription_text_1]',
            's_key' => 'subscription_text_1',
            'cap' => 'edit_theme_options',
            'default' => __( 'Thanks for visiting! We are so happy to have you.', 'pinkbutterflies' ),
            'desc' => __( 'If empty, theme default text will be used', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Subscription Heading 3 Text', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'text',
            'transport' => 'postMessage',
            'in_css' => false
        );

        $settings['subscription_text_2'] = array(
            'id' => $this->theme_opt_prefix . '[subscription_text_2]',
            's_key' => 'subscription_text_2',
            'cap' => 'edit_theme_options',
            'default' => __( 'Let\'s stay in touch', 'pinkbutterflies' ),
            'desc' => __( 'If empty, theme default text will be used', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Subscription Heading 6 Text', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'text',
            'transport' => 'postMessage',
            'in_css' => false
        );

        $settings['subscription_text_3'] = array(
            'id' => $this->theme_opt_prefix . '[subscription_text_3]',
            's_key' => 'subscription_text_3',
            'cap' => 'edit_theme_options',
            'default' => __( 'Subscribe for the latest news and updates delivered straight to your inbox.', 'pinkbutterflies' ),
            'desc' => __( 'If empty, theme default text will be used', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Subscription Paragraph Text', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'textarea',
            'transport' => 'postMessage',
            'in_css' => false
        );

        $settings['subscription_shortcode'] = array(
            'id' => $this->theme_opt_prefix . '[subscription_shortcode]',
            's_key' => 'subscription_shortcode',
            'cap' => 'edit_theme_options',
            'default' => '',
            'desc' => __( 'Copy your mailchimp generated shortcode here. If this field is empty subscription section will not be visible.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Mailchimp Shortcode', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'text',
            'transport' => 'refresh',
            'in_css' => false
        );

        $settings['subscription_position'] = array(
            'id' => $this->theme_opt_prefix . '[subscription_position]',
            's_key' => 'subscription_position',
            'cap' => 'edit_theme_options',
            'default' => 'bottom',
            'desc' => __( 'Choose subscription section position. On single posts and pages and archive pages position will always be before footer.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_radio',
            'label' => __( 'Position of subscription section', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'radio',
            'choices' => array(
                'top' => __( 'After Header & Featured Slider', 'pinkbutterflies' ),
                'bottom' => __( 'Before Footer', 'pinkbutterflies' ),
            ),
            'transport' => 'refresh',
            'in_css' => false
        );

        $settings['hide_subscription'] = array(
            'id' => $this->theme_opt_prefix . '[hide_subscription]',
            's_key' => 'hide_subscription',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Hide subscription section on blog page', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Subscription Section', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_subscription_single'] = array(
            'id' => $this->theme_opt_prefix . '[hide_subscription_single]',
            's_key' => 'hide_subscription_single',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => '',
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Subscription Section on Single Post or Page', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        $settings['hide_subscription_archive'] = array(
            'id' => $this->theme_opt_prefix . '[hide_subscription_archive]',
            's_key' => 'hide_subscription_archive',
            'cap' => 'edit_theme_options',
            'default' => false,
            'desc' => __( 'Archive pages are category, tag, author and date based pages.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_checkbox',
            'label' => __( 'Hide Subscription Section on Archive Pages & Search Results Page', 'pinkbutterflies' ),
            'section' => $this->prefix . 'subscription',
            'type' => 'toggle_checkbox',
            'in_css' => false,
            'transport' => 'refresh',
        );

        /* *********************************
        ** Footer
        ***********************************/
        $settings['footer_text'] = array(
            'id' => $this->theme_opt_prefix . '[footer_text]',
            's_key' => 'footer_text',
            'cap' => 'edit_theme_options',
            'default' => 'Copyright &copy; 2017 The PinkButterflies - WordPress theme for bloggers - by PRThemes',
            'desc' => '',
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Footer text', 'pinkbutterflies' ),
            'section' => $this->prefix . 'footer',
            'type' => 'textarea',
            'transport' => 'postMessage',
            'in_css' => false
        );

        /* *********************************
        ** Fonts
        ***********************************/
        $settings['body_font'] = array(
            'id' => $this->theme_opt_prefix . '[body_font]',
            's_key' => 'body_font',
            'cap' => 'edit_theme_options',
            'default' => 'Merriweather:regular',
            'desc' => __( 'Change Font Family. Default: Merriweather', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Body Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => 'body, input, select, textarea',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['headings_font'] = array(
            'id' => $this->theme_opt_prefix . '[headings_font]',
            's_key' => 'headings_font',
            'cap' => 'edit_theme_options',
            'default' => 'Kaushan+Script:regular',
            'desc' => __( 'Change Font Family. Default: Kaushan Script', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Headings Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => 'h1, h2, h3, h4, h5',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['heading6_font'] = array(
            'id' => $this->theme_opt_prefix . '[heading6_font]',
            's_key' => 'heading6_font',
            'cap' => 'edit_theme_options',
            'default' => 'Montserrat:regular',
            'desc' => __( 'Change Font Family. Default: Montserrat', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Heading 6 Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => 'h6',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['menu_font'] = array(
            'id' => $this->theme_opt_prefix . '[menu_font]',
            's_key' => 'menu_font',
            'cap' => 'edit_theme_options',
            'default' => 'Montserrat:500',
            'desc' => __( 'Change Font Family. Default: Montserrat', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Menu Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '#main-menu a, #mobile-menu-trigger, #top-menu a, .version-3 #main-menu ul a, #mobile-menu li',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['menu_font_header_v3'] = array(
            'id' => $this->theme_opt_prefix . '[menu_font_header_v3]',
            's_key' => 'menu_font_header_v3',
            'cap' => 'edit_theme_options',
            'default' => 'Shadows+Into+Light+Two:regular',
            'desc' => __( 'Change Font Family. Default: Shadows Into Light Two', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Menu Font on Header Version 3', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.version-3 #main-menu a, .version-3 #mobile-menu-trigger',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['categories_font'] = array(
            'id' => $this->theme_opt_prefix . '[categories_font]',
            's_key' => 'categories_font',
            'cap' => 'edit_theme_options',
            'default' => 'Shadows+Into+Light+Two:regular',
            'desc' => __( 'Change Font Family. Default: Shadows Into Light Two', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Categories Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider .item .categories a, #featured-slider-2 .item .text-wrap .categories a, #featured-slider-3 .item .text-wrap .categories a,
.post .categories a, #title-box.v3 .categories div a, #title-box.v1 .categories div a',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['buttons_font'] = array(
            'id' => $this->theme_opt_prefix . '[buttons_font]',
            's_key' => 'buttons_font',
            'cap' => 'edit_theme_options',
            'default' => 'Montserrat:regular',
            'desc' => __( 'Change Font Family. Default: Montserrat', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Buttons Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.post footer .read-more-wrap a, .post .read-more-wrap a, .read-more-wrap a,.pb-navigation a, .pb-navigation span, .post-password-form input[type="submit"],
.jetpack_subscription_widget #subscribe-submit input, .null-instagram-feed p.clear a, #instagram-wrap .pb-instagram-boxes .pb-instagram-box.follow-box .overlay a,
#subscribe-to-newsletter form button, .page-404-content a.btn, .comment .comment-body .reply a, .comment-respond .form-submit input, .recipe-wrap .buttons a, .wpcf7 form p input[type="submit"],
#subscribe-to-newsletter form input[type="submit"]',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['quote_font'] = array(
            'id' => $this->theme_opt_prefix . '[quote_font]',
            's_key' => 'quote_font',
            'cap' => 'edit_theme_options',
            'default' => 'Kaushan+Script:regular',
            'desc' => __( 'Change Font Family. Default: Kaushan Script', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Quotes Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-post-content blockquote',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['title_box_subtitle_font'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_subtitle_font]',
            's_key' => 'title_box_subtitle_font',
            'cap' => 'edit_theme_options',
            'default' => 'Shadows+Into+Light+Two:regular',
            'desc' => __( 'Change Font Family. Default: Shadows Into Light Two', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Title Box Paragraph before Heading Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box p.sub-title',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['recipe_wrap_headings_font'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_wrap_headings_font]',
            's_key' => 'recipe_wrap_headings_font',
            'cap' => 'edit_theme_options',
            'default' => 'Shadows+Into+Light+Two:regular',
            'desc' => __( 'Change Font Family. Default: Shadows Into Light Two', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Recipe Box Headings Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .ingredients h3, .recipe-wrap .instructions h3, .recipe-wrap .notes h3',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['recipe_wrap_instructions_steps_num_font'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_wrap_instructions_steps_num_font]',
            's_key' => 'recipe_wrap_instructions_steps_num_font',
            'cap' => 'edit_theme_options',
            'default' => 'Kaushan+Script:regular',
            'desc' => __( 'Change Font Family. Default: Kaushan Script', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Recipe Box Instructions Steps Number Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .instructions p span',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['error_404_page_heading_font'] = array(
            'id' => $this->theme_opt_prefix . '[error_404_page_heading_font]',
            's_key' => 'error_404_page_heading_font',
            'cap' => 'edit_theme_options',
            'default' => 'Montserrat:regular',
            'desc' => __( 'Change Font Family. Default: Montserrat', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( '404 Page Heading 1 Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-404-content h1',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['calendar_widget_font'] = array(
            'id' => $this->theme_opt_prefix . '[calendar_widget_font]',
            's_key' => 'calendar_widget_font',
            'cap' => 'edit_theme_options',
            'default' => 'Shadows+Into+Light+Two:regular',
            'desc' => __( 'Change Font Family. Default: Shadows Into Light Two', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Calendar Widget Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.widget_calendar #wp-calendar',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        $settings['footer_text_font'] = array(
            'id' => $this->theme_opt_prefix . '[footer_text_font]',
            's_key' => 'footer_text_font',
            'cap' => 'edit_theme_options',
            'default' => 'Montserrat:regular',
            'desc' => __( 'Change Font Family. Default: Montserrat', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Footer Text Font', 'pinkbutterflies' ),
            'section' => $this->prefix . 'fonts',
            'type' => 'google_fonts',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => '.footer-text p',
                'property' => array( 'font-family', 'font-weight', 'font-style' )
            ),
        );

        // $settings['h1_size'] = array(
        //     'id' => $this->theme_opt_prefix . '[h1_size]',
        //     's_key' => 'h1_size',
        //     'cap' => 'edit_theme_options',
        //     'default' => '',
        //     'desc' => __( 'H1 font size, unit: em.', 'pinkbutterflies' ),
        //     'sanitize' => 'sanitize_text_field',
        //     'label' => __( 'Heading 1 Font Size', 'pinkbutterflies' ),
        //     'section' => $this->prefix . 'fonts',
        //     'type' => 'text',
        //     'transport' => 'refresh',
        //     'in_css' => true,
        //     'css' => array(
        //         'selector' => 'h1',
        //         'property' => 'font-size'
        //     )
        // );
        //
        // $settings['h2_size'] = array(
        //     'id' => $this->theme_opt_prefix . '[h2_size]',
        //     's_key' => 'h2_size',
        //     'cap' => 'edit_theme_options',
        //     'default' => '',
        //     'desc' => __( 'H2 font size, unit: em.', 'pinkbutterflies' ),
        //     'sanitize' => 'sanitize_text_field',
        //     'label' => __( 'Heading 2 Font Size', 'pinkbutterflies' ),
        //     'section' => $this->prefix . 'fonts',
        //     'type' => 'text',
        //     'transport' => 'refresh',
        //     'in_css' => true,
        //     'css' => array(
        //         'selector' => 'h2',
        //         'property' => 'font-size'
        //     )
        // );

        /* *********************************
        ** Other
        ***********************************/
        $settings['default_bg_image_category_v1'] = array(
            'id' => $this->theme_opt_prefix . '[default_bg_image_category_v1]',
            's_key' => 'default_bg_image_category_v1',
            'cap' => 'edit_theme_options',
            'default' => get_template_directory_uri() . '/images/404-image.jpg',
            'desc' => __( 'If category version 1 does not have image set, default image will be use as background image on category version 1 templates', 'pinkbutterflies' ),
            'sanitize' => 'esc_url_raw',
            'label' => __( 'Change Category Version 1 Default Background Image', 'pinkbutterflies' ),
            'section' => $this->prefix . 'other',
            'type' => 'image',
            'transport' => 'refresh',
            'in_css' => false
        );

        $settings['error404_bg_image'] = array(
            'id' => $this->theme_opt_prefix . '[error404_bg_image]',
            's_key' => 'error404_bg_image',
            'cap' => 'edit_theme_options',
            'default' => get_template_directory_uri() . '/images/404-image.jpg',
            'desc' => '',
            'sanitize' => 'esc_url_raw',
            'label' => __( '404 Page Background Image', 'pinkbutterflies' ),
            'section' => $this->prefix . 'other',
            'type' => 'bg_image',
            'transport' => 'postMessage',
            'in_css' => true,
            'css' => array(
                'selector' => 'body.page-404',
                'property' => 'background-image'
            )
        );

        $settings['no_featured_image_icon'] = array(
            'id' => $this->theme_opt_prefix . '[no_featured_image_icon]',
            's_key' => 'no_featured_image_icon',
            'cap' => 'edit_theme_options',
            'default' => 'ban',
            'desc' => __( 'Copy your fontawesome icon name here. You can check this <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">page</a> for icon names.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'List layout Icon name when no featured image', 'pinkbutterflies' ),
            'section' => $this->prefix . 'other',
            'type' => 'text',
            'transport' => 'refresh',
            'in_css' => false,
        );

        $settings['instagram_username'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_username]',
            's_key' => 'instagram_username',
            'cap' => 'edit_theme_options',
            'default' => '',
            'desc' => __( 'Copy your Instagram username here. You need to have at least 6 images in your instagram account.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_text_field',
            'label' => __( 'Instagram username', 'pinkbutterflies' ),
            'section' => $this->prefix . 'other',
            'type' => 'text',
            'transport' => 'refresh',
            'in_css' => false,
        );

        $settings['instagram_version'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_version]',
            's_key' => 'instagram_version',
            'cap' => 'edit_theme_options',
            'default' => 'v1',
            'desc' => __( 'Change instagram section version. If you have less than 14 images version 1 will be used, even if you select version 2.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_radio',
            'label' => __( 'Instagram Section Version', 'pinkbutterflies' ),
            'section' => $this->prefix . 'other',
            'type' => 'radio',
            'choices' => array(
                'v1' => __( 'Version 1, 6 images', 'pinkbutterflies' ),
                'v2' => __( 'Version 2, 11 images', 'pinkbutterflies' ),
            ),
            'transport' => 'refresh',
            'in_css' => false,
        );

        /* *********************************
        ** Colors
        ***********************************/

        /* ********** Main ********** */
        $settings['body_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[body_bg_color]',
            's_key' => 'body_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change body background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Body Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'main_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => 'body, #instagram-wrap .pb-instagram-two-boxes .pb-instagram-box:first-child:after,
#instagram-wrap .pb-instagram-one-box-full .pb-instagram-box:after, .posts-container-list .post:after, .posts-container-standard .post:after,
.posts-container .post.sticky:before',
                'property' => 'background-color'
            )
        );

        $settings['form_fields_placeholder_color'] = array(
            'id' => $this->theme_opt_prefix . '[form_fields_placeholder_color]',
            's_key' => 'form_fields_placeholder_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change form input fields placeholder color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Form Inputs Placeholder Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'main_colors',
            'type' => 'color_input_placeholder',
            'transport' => 'refresh',
            'in_css' => true,
        );

        /* ********** Header ********** */
        $settings['header_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_bg_color]',
            's_key' => 'header_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change header background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header.version-1, #header.version-2, #header.version-3, #header.version-4',
                'property' => 'background-color'
            )
        );

        $settings['header_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_text_color]',
            's_key' => 'header_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change header text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header .search form button, #header .social a, #header .search-mobile a, #main-menu a, #mobile-menu-trigger, 
#header.version-2 .search-wrap a, #header.version-3 .search-wrap a, #header.version-4 .search-wrap a, #top-menu a',
                'property' => 'color'
            )
        );

        $settings['header_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_text_hover_color]',
            's_key' => 'header_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change header text mouse over color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header Text Mouse Over Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header .social a:hover, #header .search form button:hover, #header .search-mobile a:hover,
#main-menu a:hover, #mobile-menu-trigger:hover, #main-menu li.current-menu-item > a, #header.version-2 .search-wrap a:hover,
#header.version-3 .search-wrap a:hover, #header.version-4 .search-wrap a:hover, #top-menu a:hover, #top-menu li.current-menu-item > a',
                'property' => 'color'
            )
        );

        $settings['header_border_top_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_border_top_color]',
            's_key' => 'header_border_top_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change header version 1 border top color & dropdown menu border top color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header Version 1 Border Top Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header.version-1 .header-top, #main-menu li ul, #top-menu li ul',
                'property' => 'border-color'
            )
        );

        $settings['header_main_nav_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_main_nav_border_color]',
            's_key' => 'header_main_nav_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change header main navigation border color. header search form border color & header version 4 logo section border color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header Main Navigation Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header .search form, .version-1 #main-nav, .version-2 #main-nav, .version-4 .header-logo-wrap',
                'property' => 'border-color'
            )
        );

        $settings['header_v4_main_nav_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_v4_main_nav_bg_color]',
            's_key' => 'header_v4_main_nav_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change header version 4 main navigation background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header Version 4 Navigation Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.version-4 #main-nav',
                'property' => 'background-color'
            )
        );

        $settings['header_v2_v4_form_border_top_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_v2_v4_form_border_top_color]',
            's_key' => 'header_v2_v4_form_border_top_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change header version 2 & 4 search forms border top color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header Version 2 & 4 Search Form Border Top Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header.version-2 .search-wrap .search form, #header.version-4 .search-wrap .search form',
                'property' => 'border-top-color'
            )
        );

        $settings['header_dropdown_menu_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_dropdown_menu_bg_color]',
            's_key' => 'header_dropdown_menu_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change header dropdown menu background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Dropdown Menu Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#main-menu li ul, #top-menu li ul',
                'property' => 'background-color'
            )
        );

        $settings['header_dropdown_menu_item_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_dropdown_menu_item_border_color]',
            's_key' => 'header_dropdown_menu_item_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change header dropdown menu items border bottom color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Dropdown Menu Item Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#main-menu li ul li, #top-menu li ul li',
                'property' => 'border-color'
            )
        );

        $settings['header_v3_nav_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_v3_nav_border_color]',
            's_key' => 'header_v3_nav_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change header version 3 navigation border top color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header V3 Navigation Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.version-3 #main-nav .column-12',
                'property' => 'border-color'
            )
        );

        $settings['header_v2_top_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_v2_top_overlay_bg_color]',
            's_key' => 'header_v2_top_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change header version 2 overlay background color on background image section.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header V2 Overlay Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header.version-2 .header-top .overlay',
                'property' => 'background-color'
            )
        );

        $settings['header_v3_top_bar_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[header_v3_top_bar_bg_color]',
            's_key' => 'header_v3_top_bar_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change header version 3 top bar background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Header V3 Top Bar Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'header_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#header.version-3 .header-top',
                'property' => 'background-color'
            )
        );

        /* ********** Mobile Menu ********** */
        $settings['mobile_menu_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[mobile_menu_overlay_bg_color]',
            's_key' => 'mobile_menu_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change mobile menu overlay background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Overlay Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'mobile_menu_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#mobile-menu-overlay',
                'property' => 'background-color'
            )
        );

        $settings['mobile_menu_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[mobile_menu_bg_color]',
            's_key' => 'mobile_menu_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change mobile menu background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'mobile_menu_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#mobile-menu-wrap, #mobile-menu li ul',
                'property' => 'background-color'
            )
        );

        $settings['mobile_menu_items_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[mobile_menu_items_border_color]',
            's_key' => 'mobile_menu_items_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change mobile menu items border bottom color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Menu Items Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'mobile_menu_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#mobile-menu li',
                'property' => 'border-color'
            )
        );

        $settings['mobile_menu_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[mobile_menu_text_color]',
            's_key' => 'mobile_menu_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change mobile menu text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'mobile_menu_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#mobile-menu li a, #mobile-menu li.menu-item-has-children .submenu-toggle',
                'property' => 'color'
            )
        );

        $settings['mobile_menu_selected_item_color'] = array(
            'id' => $this->theme_opt_prefix . '[mobile_menu_selected_item_color]',
            's_key' => 'mobile_menu_selected_item_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change mobile menu selected item text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Selected Item Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'mobile_menu_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#mobile-menu li.current-menu-item > a, #mobile-menu li.menu-item-has-children .submenu-toggle:hover',
                'property' => 'color'
            )
        );

        $settings['mobile_menu_close_submenu_color'] = array(
            'id' => $this->theme_opt_prefix . '[mobile_menu_close_submenu_color]',
            's_key' => 'mobile_menu_close_submenu_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Change mobile close submenu text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Submenu Close Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'mobile_menu_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#mobile-menu li.close-submenu a',
                'property' => 'color'
            )
        );

        $settings['mobile_menu_third_level_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[mobile_menu_third_level_border_color]',
            's_key' => 'mobile_menu_third_level_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Change submenu(third level menu) from submenu border top color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Third Level Menu Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'mobile_menu_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#mobile-menu li > ul .menu-item-has-children ul',
                'property' => 'border-color'
            )
        );

        /* ********** Lightbox ********** */
        $settings['lightbox_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[lightbox_overlay_bg_color]',
            's_key' => 'lightbox_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change lightbox overlay background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Overlay Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'lightbox_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb-lightbox .overlay',
                'property' => 'background-color'
            )
        );

        $settings['lightbox_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[lightbox_text_color]',
            's_key' => 'lightbox_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change lightbox text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'lightbox_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb-lightbox-content form input, .pb-lightbox-content form button',
                'property' => 'color'
            )
        );

        /* ********** Featured Slider ********** */
        $settings['featured_container_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_container_bg_color]',
            's_key' => 'featured_container_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#fbfbfb',
            'desc' => __( 'Change featured slider container background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Container Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-wrap',
                'property' => 'background-color'
            )
        );

        $settings['featured_container_v3_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_container_v3_bg_color]',
            's_key' => 'featured_container_v3_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change featured slider version 3 container background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V3 Container Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-wrap.v3',
                'property' => 'background-color'
            )
        );

        $settings['featured_container_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_container_border_color]',
            's_key' => 'featured_container_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change featured slider container border color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Container Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-wrap',
                'property' => 'border-color'
            )
        );

        $settings['featured_slider_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_slider_text_color]',
            's_key' => 'featured_slider_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change featured slider text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-wrap .prev, #featured-slider-wrap .next, #featured-slider .item .categories a, #featured-slider .item h2 a,
#featured-slider-2 .item .text-wrap h2.post-title a, #featured-slider-3 .item .text-wrap h2.post-title a,
#featured-slider-4 .item .text-wrap h4.post-title a, #featured-slider-2 .item .text-wrap .categories a,
#featured-slider-3 .item .text-wrap .categories a, #featured-slider .item .excerpt',
                'property' => 'color'
            )
        );

        $settings['featured_slider_nav_buttons_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_slider_nav_buttons_bg_color]',
            's_key' => 'featured_slider_nav_buttons_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change featured slider previous and next button background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Previous & Next Button Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-wrap .prev, #featured-slider-wrap .next, #featured-slider-wrap .prev-2, #featured-slider-wrap .prev-3, 
#featured-slider-wrap .prev-4, #featured-slider-wrap .next-2, #featured-slider-wrap .next-3, #featured-slider-wrap .next-4',
                'property' => 'background-color'
            )
        );

        $settings['featured_slider_v1_nav_buttons_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_slider_v1_nav_buttons_bg_hover_color]',
            's_key' => 'featured_slider_v1_nav_buttons_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change featured slider version 1 previous and next button background color on mouse over.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V1 Previous & Next Button Background Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-wrap .prev:hover, #featured-slider-wrap .next:hover',
                'property' => 'background-color'
            )
        );

        $settings['featured_slider_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_slider_text_hover_color]',
            's_key' => 'featured_slider_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change featured slider text color on mouse over.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider .item .categories a:hover, #featured-slider .item h2 a:hover, #featured-slider-2 .item .text-wrap h2.post-title a:hover,
#featured-slider-3 .item .text-wrap h2.post-title a:hover, #featured-slider-4 .item .text-wrap h4.post-title a:hover,
#featured-slider-2 .item .text-wrap .categories a:hover, #featured-slider-3 .item .text-wrap .categories a:hover',
                'property' => 'color'
            )
        );

        $settings['featured_slider_v2_v3_textbox_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_slider_v2_v3_textbox_bg_color]',
            's_key' => 'featured_slider_v2_v3_textbox_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change featured slider v2 and v3 text box background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V2 & V3 Text Box Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-2 .item .va-col .overlay, #featured-slider-3 .item .va-col .overlay',
                'property' => 'background-color'
            )
        );

        $settings['featured_slider_v2_v3_textbox_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_slider_v2_v3_textbox_border_color]',
            's_key' => 'featured_slider_v2_v3_textbox_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change featured slider v2 and v3 text box border color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V2 & V3 Text Box Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-2 .item .va-col .overlay, #featured-slider-3 .item .va-col .overlay',
                'property' => 'border-color'
            )
        );

        $settings['featured_slider_v4_textbox_background_color'] = array(
            'id' => $this->theme_opt_prefix . '[featured_slider_v4_textbox_background_color]',
            's_key' => 'featured_slider_v4_textbox_background_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change featured slider v4 text box background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V4 Text Box Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'featured_slider_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#featured-slider-4 .item .text-wrap .overlay',
                'property' => 'background-color'
            )
        );

        /* ********** Subscribe to Newsletter ********** */
        $settings['newsletter_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_bg_color]',
            's_key' => 'newsletter_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change subscribe to newsletter background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter',
                'property' => 'background-color'
            )
        );

        $settings['newsletter_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_text_color]',
            's_key' => 'newsletter_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change subscribe to newsletter text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter, #subscribe-to-newsletter form input[type="text"], #subscribe-to-newsletter form input[type="email"],
#subscribe-to-newsletter form input[type="submit"]',
                'property' => 'color'
            )
        );

        $settings['newsletter_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_border_color]',
            's_key' => 'newsletter_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change subscribe to newsletter border color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter',
                'property' => 'border-color'
            )
        );

        $settings['newsletter_form_fields_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_form_fields_bg_color]',
            's_key' => 'newsletter_form_fields_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change subscribe to newsletter input fields background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Input Field Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter form input[type="text"], #subscribe-to-newsletter form input[type="email"]',
                'property' => 'background-color'
            )
        );

        $settings['newsletter_button_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_button_bg_color]',
            's_key' => 'newsletter_button_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change subscribe to newsletter button background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter form input[type="submit"], #subscribe-to-newsletter form button',
                'property' => 'background-color'
            )
        );

        $settings['newsletter_button_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_button_text_color]',
            's_key' => 'newsletter_button_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change subscribe to newsletter button text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter form input[type="submit"], #subscribe-to-newsletter form button',
                'property' => 'color'
            )
        );

        $settings['newsletter_button_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_button_bg_hover_color]',
            's_key' => 'newsletter_button_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change subscribe to newsletter button background hover color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Background Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter form input[type="submit"]:hover, #subscribe-to-newsletter form button:hover',
                'property' => 'background-color'
            )
        );

        $settings['newsletter_button_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[newsletter_button_text_hover_color]',
            's_key' => 'newsletter_button_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change subscribe to newsletter button text hover color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'newsletter_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#subscribe-to-newsletter form input[type="submit"]:hover, #subscribe-to-newsletter form button:hover',
                'property' => 'color'
            )
        );

        /* ********** Title Box ********** */
        $settings['title_box_v1_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v1_bg_color]',
            's_key' => 'title_box_v1_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#fbfbfb',
            'desc' => __( 'Change title box version 1 background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V1 Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v1',
                'property' => 'background-color'
            )
        );

        $settings['title_box_v1_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v1_border_color]',
            's_key' => 'title_box_v1_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change title box version 1 border color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V1 Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v1',
                'property' => 'border-color'
            )
        );

        $settings['title_box_v1_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v1_text_color]',
            's_key' => 'title_box_v1_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change title box version 1 text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V1 Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v1, #title-box.v1 .categories div a, #title-box.v1 h2, #title-box.v1 .post-meta a:hover',
                'property' => 'color'
            )
        );

        $settings['title_box_v2_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v2_overlay_bg_color]',
            's_key' => 'title_box_v2_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change title box version 2 overlay background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V2 Overlay Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v2 .overlay',
                'property' => 'background-color'
            )
        );

        $settings['title_box_v3_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v3_overlay_bg_color]',
            's_key' => 'title_box_v3_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change title box version 3 overlay background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V3 Overlay Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v3 .overlay',
                'property' => 'background-color'
            )
        );

        $settings['title_box_social_icons_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_social_icons_color]',
            's_key' => 'title_box_social_icons_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change title box social icons color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Social Icons Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box .social a',
                'property' => 'color'
            )
        );

        $settings['title_box_social_icons_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_social_icons_hover_color]',
            's_key' => 'title_box_social_icons_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change title box social icons hover color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Social Icons Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box .social a:hover',
                'property' => 'color'
            )
        );

        $settings['title_box_v1_cat_area_lines_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v1_cat_area_lines_bg_color]',
            's_key' => 'title_box_v1_cat_area_lines_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change title box version 1 category section left and right line background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V1 Category Section Lines Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v1 .categories div .line-left, #title-box.v1 .categories div .line-right',
                'property' => 'background-color'
            )
        );

        $settings['title_box_v3_cat_area_lines_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v3_cat_area_lines_bg_color]',
            's_key' => 'title_box_v3_cat_area_lines_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change title box version 3 category section left and right line background color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V3 Category Section Lines Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v3 .categories div .line-left, #title-box.v3 .categories div .line-right',
                'property' => 'background-color'
            )
        );

        $settings['title_box_v2_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v2_text_color]',
            's_key' => 'title_box_v2_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change title box version 2 text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V2 Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v2',
                'property' => 'color'
            )
        );
        
        $settings['title_box_v3_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v3_text_color]',
            's_key' => 'title_box_v3_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change title box version 3 text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V3 Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v3 .categories div a, #title-box.v3 h2, #title-box.v3 .post-meta a:hover',
                'property' => 'color'
            )
        );

        $settings['title_box_v1_v3_post_meta_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v1_v3_post_meta_color]',
            's_key' => 'title_box_v1_v3_post_meta_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Change title box version 1 & 3 post meta color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V1 & V3 Post Meta Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v3 .post-meta, #title-box.v1 .post-meta, #title-box.v3 .post-meta a, #title-box.v1 .post-meta a',
                'property' => 'color'
            )
        );

        $settings['title_box_v1_v3_cat_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[title_box_v1_v3_cat_hover_color]',
            's_key' => 'title_box_v1_v3_cat_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change title box version 1 & 3 category hover color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V1 & V3 Category Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'title_box_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#title-box.v3 .categories div a:hover, #title-box.v1 .categories div a:hover',
                'property' => 'color'
            )
        );

        /* ********** Post Colors ********** */
        $settings['posts_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_text_color]',
            's_key' => 'posts_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Posts text color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post, .post .categories a, .post h2.post-title a, .post h4.post-title a, .page h2.page-title, .post .post-meta a:hover,
.post footer .post-comments-number a, .post footer .post-share a, .related-posts .pb-related h4 a, 
.posts-container-grid .post h3.post-title a, .posts-container-masonry .post h3.post-title a, .posts-container-masonry .page h3.post-title a, 
.posts-container-masonry-full-v1 .post h3.post-title a, .posts-container-list .post h3.post-title a',
                'property' => 'color'
            )
        );

        $settings['posts_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_hover_color]',
            's_key' => 'posts_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Posts hover color.', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post .categories a:hover, .post h2.post-title a:hover, .post h4.post-title a:hover, .post footer .post-comments-number a:hover,
.post footer .post-share a:hover, .related-posts .pb-related h4 a:hover, .posts-container-grid .post h3.post-title a:hover,
.posts-container-masonry .post h3.post-title a:hover, .posts-container-masonry .page h3.post-title a:hover,
.posts-container-masonry-full-v1 .post h3.post-title a:hover, .posts-container-list .post h3.post-title a:hover, .posts-container .post.sticky:before',
                'property' => 'color'
            )
        );

        $settings['posts_cat_section_left_right_lines_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_cat_section_left_right_lines_bg_color]',
            's_key' => 'posts_cat_section_left_right_lines_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Posts category section left and right lines color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Category Lines Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post .categories div span',
                'property' => 'background-color'
            )
        );

        $settings['posts_masonry_full_v2_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_masonry_full_v2_bg_color]',
            's_key' => 'posts_masonry_full_v2_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Masonry version 2 posts background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Masonry V2 Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.posts-container-masonry-full-v2 .post',
                'property' => 'background-color'
            )
        );

        $settings['posts_meta_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_meta_color]',
            's_key' => 'posts_meta_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Posts meta(date and author) color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Posts Meta Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post .post-meta, .post .post-meta a',
                'property' => 'color'
            )
        );

        $settings['posts_read_more_btn_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_read_more_btn_bg_color]',
            's_key' => 'posts_read_more_btn_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change read more button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Read More Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post footer .read-more-wrap a, .post .read-more-wrap a, .read-more-wrap a',
                'property' => 'background-color'
            )
        );

        $settings['posts_read_more_btn_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_read_more_btn_text_color]',
            's_key' => 'posts_read_more_btn_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change read more button text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Read More Button Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post footer .read-more-wrap a, .post .read-more-wrap a, .read-more-wrap a',
                'property' => 'color'
            )
        );

        $settings['posts_read_more_btn_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_read_more_btn_border_color]',
            's_key' => 'posts_read_more_btn_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change read more button border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Read More Button Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post footer .read-more-wrap a, .post .read-more-wrap a, .read-more-wrap a',
                'property' => 'border-color'
            )
        );

        $settings['posts_read_more_btn_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_read_more_btn_bg_hover_color]',
            's_key' => 'posts_read_more_btn_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change read more button background hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Read More Button BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post footer .read-more-wrap a:hover, .post .read-more-wrap a:hover, .read-more-wrap a:hover',
                'property' => 'background-color'
            )
        );

        $settings['posts_read_more_btn_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_read_more_btn_text_hover_color]',
            's_key' => 'posts_read_more_btn_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change read more button text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Read More Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post footer .read-more-wrap a:hover, .post .read-more-wrap a:hover, .read-more-wrap a:hover',
                'property' => 'color'
            )
        );

        $settings['posts_read_more_btn_border_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_read_more_btn_border_hover_color]',
            's_key' => 'posts_read_more_btn_border_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change read more button border hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Read More Button Border Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post footer .read-more-wrap a:hover, .post .read-more-wrap a:hover, .read-more-wrap a:hover',
                'property' => 'border-color'
            )
        );

        $settings['posts_featured_gallery_nav_btns_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_featured_gallery_nav_btns_bg_color]',
            's_key' => 'posts_featured_gallery_nav_btns_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change featured gallery navigation buttons background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Featured Gallery Navigation Buttons BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post .featured-image .owl-gallery span.prev, .post .featured-image .owl-gallery span.next,
.featured-image .owl-gallery span.prev, .featured-image .owl-gallery span.next',
                'property' => 'background-color'
            )
        );

        $settings['posts_featured_gallery_nav_btns_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_featured_gallery_nav_btns_color]',
            's_key' => 'posts_featured_gallery_nav_btns_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change featured gallery navigation buttons text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Featured Gallery Navigation Buttons Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post .featured-image .owl-gallery span.prev, .post .featured-image .owl-gallery span.next,
.featured-image .owl-gallery span.prev, .featured-image .owl-gallery span.next',
                'property' => 'color'
            )
        );

        $settings['posts_standard_list_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_standard_list_border_color]',
            's_key' => 'posts_standard_list_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change standard & list posts border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Standard & List Posts Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.posts-container-list .post, .posts-container-standard .post',
                'property' => 'border-color'
            )
        );

        $settings['posts_standard_list_hash_char_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_standard_list_hash_char_color]',
            's_key' => 'posts_standard_list_hash_char_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change standard & list posts hash character color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Standard & List Posts Hash Character Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.posts-container-list .post:after, .posts-container-standard .post:after',
                'property' => 'color'
            )
        );

        $settings['posts_list_no_featured_image_section_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_list_no_featured_image_section_bg_color]',
            's_key' => 'posts_list_no_featured_image_section_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change list posts no featured image section background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'No Featured Image Section On List Posts Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.posts-container-list .post .featured-image .no-thumbnail .overlay',
                'property' => 'background-color'
            )
        );

        $settings['posts_list_no_featured_image_section_icon_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_list_no_featured_image_section_icon_color]',
            's_key' => 'posts_list_no_featured_image_section_icon_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change list posts no featured image section icon color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'No Featured Image Section On List Posts Icon Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.posts-container-list .post .featured-image .no-thumbnail .icon',
                'property' => 'color'
            )
        );

        $settings['posts_sticky_border_top_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_sticky_border_top_color]',
            's_key' => 'posts_sticky_border_top_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change sticky post border top color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Sticky Post Border Top Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.posts-container .post.sticky',
                'property' => 'border-color'
            )
        );

        $settings['posts_sticky_masonry_v2_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_sticky_masonry_v2_bg_color]',
            's_key' => 'posts_sticky_masonry_v2_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change sticky post masonry version 2 layout background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Sticky Post Masonry V2 BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'posts_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.posts-container.posts-container-masonry-full-v2 .post.sticky',
                'property' => 'background-color'
            )
        );

        /* ********** Single Post Colors ********** */
        $settings['single_post_content_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_content_color]',
            's_key' => 'single_post_content_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Single post content color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Content Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-post-content',
                'property' => 'color'
            )
        );

        $settings['single_post_content_link_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_content_link_color]',
            's_key' => 'single_post_content_link_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post content link & list item start icon color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Content Link Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-post-content ul li:before, .single-post-content p a, .content-none-section p a',
                'property' => 'color'
            )
        );

        $settings['single_post_blockquote_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_blockquote_border_color]',
            's_key' => 'single_post_blockquote_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post content quote border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Content Quote Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-post-content blockquote',
                'property' => 'border-color'
            )
        );

        $settings['single_post_blockquote_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_blockquote_bg_color]',
            's_key' => 'single_post_blockquote_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Single post content quote background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Content Quote BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-post-content blockquote',
                'property' => 'background-color'
            )
        );

        $settings['single_post_blockquote_v2_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_blockquote_v2_text_color]',
            's_key' => 'single_post_blockquote_v2_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post content quote version 2 text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Content Quote V2 Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-post-content blockquote.v2',
                'property' => 'color'
            )
        );

        $settings['page_links_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[page_links_border_color]',
            's_key' => 'page_links_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Single post or page content navigation border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post or Page Content Navigation Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-links',
                'property' => 'border-color'
            )
        );

        $settings['page_links_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[page_links_text_color]',
            's_key' => 'page_links_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Single post or page content navigation text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post or Page Content Navigation Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-links a span',
                'property' => 'color'
            )
        );

        $settings['page_links_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[page_links_text_hover_color]',
            's_key' => 'page_links_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post or page content navigation text hover & active link color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post or Page Content Navigation Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-links a:hover span, .page-links span',
                'property' => 'color'
            )
        );

        $settings['post_tag_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_tag_bg_color]',
            's_key' => 'post_tag_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Post tag background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Tag BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post-tags a',
                'property' => 'background-color'
            )
        );

        $settings['post_tag_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_tag_text_color]',
            's_key' => 'post_tag_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Post tag text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Tag Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post-tags a',
                'property' => 'color'
            )
        );

        $settings['post_tag_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_tag_bg_hover_color]',
            's_key' => 'post_tag_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Post tag background hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Tag BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post-tags a:hover',
                'property' => 'background-color'
            )
        );

        $settings['post_tag_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_tag_text_hover_color]',
            's_key' => 'post_tag_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Post tag text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Tag Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.post-tags a:hover',
                'property' => 'color'
            )
        );

        $settings['single_post_share_icons_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_share_icons_text_color]',
            's_key' => 'single_post_share_icons_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Single post share icons & number of comments text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Share Post Icons Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-share-wrap .comments-num a, .single-share-wrap .post-share a',
                'property' => 'color'
            )
        );

        $settings['single_post_share_icons_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_share_icons_text_hover_color]',
            's_key' => 'single_post_share_icons_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post share icons & number of comments text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Share Post Icons Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-share-wrap .comments-num a:hover, .single-share-wrap .post-share a:hover',
                'property' => 'color'
            )
        );

        $settings['posts_related_heading_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_related_heading_bg_color]',
            's_key' => 'posts_related_heading_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change related posts heading background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Related Posts Heading BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.related-posts h6',
                'property' => 'background-color'
            )
        );

        $settings['posts_related_heading_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_related_heading_color]',
            's_key' => 'posts_related_heading_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change related posts heading text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Related Posts Heading Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.related-posts h6',
                'property' => 'color'
            )
        );

        $settings['posts_related_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_related_border_color]',
            's_key' => 'posts_related_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change related posts border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Related Posts Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.related-posts',
                'property' => 'border-color'
            )
        );

        $settings['posts_related_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[posts_related_overlay_bg_color]',
            's_key' => 'posts_related_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change related posts overlay background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Related Posts Overlay Background Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.related-posts .pb-related .overlay',
                'property' => 'background-color'
            )
        );

        $settings['single_post_about_author_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_about_author_bg_color]',
            's_key' => 'single_post_about_author_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#fbfbfb',
            'desc' => __( 'Single post about author box background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'About Author Box BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.about-post-author',
                'property' => 'background-color'
            )
        );

        $settings['single_post_about_author_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_about_author_text_color]',
            's_key' => 'single_post_about_author_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Single post about author box text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'About Author Box Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.about-post-author',
                'property' => 'color'
            )
        );

        $settings['single_post_about_author_heading_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_about_author_heading_color]',
            's_key' => 'single_post_about_author_heading_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post about author box author name or username color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'About Author Box Author Name Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.about-post-author .author-info h5',
                'property' => 'color'
            )
        );

        $settings['single_post_about_author_icons_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_about_author_icons_color]',
            's_key' => 'single_post_about_author_icons_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Single post about author box icons color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'About Author Box Icons Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.about-post-author .author-info .author-social a',
                'property' => 'color'
            )
        );

        $settings['single_post_about_author_icons_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_about_author_icons_hover_color]',
            's_key' => 'single_post_about_author_icons_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post about author box icons hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'About Author Box Icons Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'single_post_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.about-post-author .author-info .author-social a:hover',
                'property' => 'color'
            )
        );

        /* ********** Contact 7 Form Colors ********** */
        $settings['cf7_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_text_color]',
            's_key' => 'cf7_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change contact form 7 text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7',
                'property' => 'color'
            )
        );

        $settings['cf7_form_fields_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_form_fields_border_color]',
            's_key' => 'cf7_form_fields_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change contact form 7 fields border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Fields Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7 form p input, .wpcf7 form p textarea, .post-password-form input, .post-password-form input[type="password"],
.content-none-section form input, .content-none-section form button[type="submit"]',
                'property' => 'border-color'
            )
        );

        $settings['cf7_button_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_button_bg_color]',
            's_key' => 'cf7_button_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change contact form 7 button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7 form p input[type="submit"], .post-password-form input[type="submit"], .content-none-section form button[type="submit"]',
                'property' => 'background-color'
            )
        );

        $settings['cf7_button_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_button_text_color]',
            's_key' => 'cf7_button_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change contact form 7 button text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7 form p input[type="submit"], .post-password-form input[type="submit"], .content-none-section form button[type="submit"]',
                'property' => 'color'
            )
        );

        $settings['cf7_button_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_button_border_color]',
            's_key' => 'cf7_button_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change contact form 7 button border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7 form p input[type="submit"], .post-password-form input[type="submit"], .content-none-section form button[type="submit"]',
                'property' => 'border-color'
            )
        );

        $settings['cf7_button_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_button_bg_hover_color]',
            's_key' => 'cf7_button_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change contact form 7 button background hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7 form p input[type="submit"]:hover, .post-password-form input[type="submit"]:hover, .content-none-section form button[type="submit"]:hover',
                'property' => 'background-color'
            )
        );

        $settings['cf7_button_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_button_text_hover_color]',
            's_key' => 'cf7_button_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change contact form 7 button text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7 form p input[type="submit"]:hover, .post-password-form input[type="submit"]:hover, .content-none-section form button[type="submit"]:hover',
                'property' => 'color'
            )
        );

        $settings['cf7_button_border_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[cf7_button_border_hover_color]',
            's_key' => 'cf7_button_border_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change contact form 7 button border hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Border Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'cf7_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.wpcf7 form p input[type="submit"]:hover, .post-password-form input[type="submit"]:hover, .content-none-section form button[type="submit"]:hover',
                'property' => 'border-color'
            )
        );

        /* ********** Recipe Card Colors ********** */
        $settings['recipe_card_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_text_color]',
            's_key' => 'recipe_card_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change recipe card text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.single-post-content .recipe-wrap, .single-post-content .recipe-wrap .recipe-time .col p.time',
                'property' => 'color'
            )
        );

        $settings['recipe_card_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_bg_color]',
            's_key' => 'recipe_card_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change recipe card background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap',
                'property' => 'background-color'
            )
        );

        $settings['recipe_card_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_border_color]',
            's_key' => 'recipe_card_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change recipe card border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap, .recipe-wrap .recipe-time',
                'property' => 'border-color'
            )
        );

        $settings['recipe_card_button_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_button_text_color]',
            's_key' => 'recipe_card_button_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change recipe card print button text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Print Button Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .buttons a',
                'property' => 'color'
            )
        );

        $settings['recipe_card_button_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_button_bg_color]',
            's_key' => 'recipe_card_button_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change recipe card print button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Print Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .buttons a',
                'property' => 'background-color'
            )
        );

        $settings['recipe_card_button_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_button_text_hover_color]',
            's_key' => 'recipe_card_button_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change recipe card print button text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Print Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .buttons a:hover',
                'property' => 'color'
            )
        );

        $settings['recipe_card_button_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_button_bg_hover_color]',
            's_key' => 'recipe_card_button_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change recipe card print button background hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Print Button BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .buttons a:hover',
                'property' => 'background-color'
            )
        );

        $settings['recipe_card_heading_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_heading_color]',
            's_key' => 'recipe_card_heading_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change recipe card headings text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Headings Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .recipe-time .col p, .recipe-wrap .ingredients h3, .recipe-wrap .instructions h3,
.recipe-wrap .notes h3',
                'property' => 'color'
            )
        );

        $settings['recipe_card_instructions_num_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_instructions_num_bg_color]',
            's_key' => 'recipe_card_instructions_num_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change recipe card instructions number circle background color & list items dot color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Instructions Number - Circle BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap .ingredients .list-wrap ul li:before, .recipe-wrap .instructions p span',
                'property' => 'background-color'
            )
        );

        $settings['recipe_card_yields_color'] = array(
            'id' => $this->theme_opt_prefix . '[recipe_card_yields_color]',
            's_key' => 'recipe_card_yields_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Change recipe card yields text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Yields Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'recipe_wrap_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.recipe-wrap p.yields span',
                'property' => 'color'
            )
        );

        /* ********** Comments Colors ********** */
        $settings['comments_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_text_color]',
            's_key' => 'comments_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Comments text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body, .comment .comment-body .comment-author cite a',
                'property' => 'color'
            )
        );

        $settings['comments_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_border_color]',
            's_key' => 'comments_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Comments border bottom color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body',
                'property' => 'border-color'
            )
        );

        $settings['comments_meta_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_meta_color]',
            's_key' => 'comments_meta_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Comments meta(date) color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Date Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body .comment-meta a',
                'property' => 'color'
            )
        );

        $settings['comments_content_link_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_content_link_color]',
            's_key' => 'comments_content_link_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Comments content link color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Link Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body .comment-content a',
                'property' => 'color'
            )
        );

        $settings['comments_reply_button_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_reply_button_color]',
            's_key' => 'comments_reply_button_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Comments reply button text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Reply Button Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body .reply a',
                'property' => 'color'
            )
        );

        $settings['comments_reply_button_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_reply_button_bg_color]',
            's_key' => 'comments_reply_button_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Comments reply button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Reply Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body .reply a',
                'property' => 'background-color'
            )
        );

        $settings['comments_reply_button_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_reply_button_hover_color]',
            's_key' => 'comments_reply_button_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Comments reply button text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Reply Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body .reply a:hover',
                'property' => 'color'
            )
        );

        $settings['comments_reply_button_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_reply_button_bg_hover_color]',
            's_key' => 'comments_reply_button_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Comments reply button background hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Reply Button BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment .comment-body .reply a:hover',
                'property' => 'background-color'
            )
        );

        $settings['comments_respond_section_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_respond_section_text_color]',
            's_key' => 'comments_respond_section_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Add Comment section text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Leave Comment Section Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond, .comment-respond .comment-form-comment textarea, .comment-respond .comment-form-author input,
.comment-respond .comment-form-email input, .comment-respond .comment-form-url input, .comment-respond h4 small a',
                'property' => 'color'
            )
        );

        $settings['comments_respond_section_highlighted_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_respond_section_highlighted_color]',
            's_key' => 'comments_respond_section_highlighted_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Add Comment section highlighted color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Leave Comment Section Highlighted Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond h4 small a:hover, .comment-respond h4 > a, .comment-respond .logged-in-as a',
                'property' => 'color'
            )
        );

        $settings['comments_respond_section_fields_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_respond_section_fields_border_color]',
            's_key' => 'comments_respond_section_fields_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Add Comment section form fields border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Leave Comment Section Form Fields Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .comment-form-comment textarea, .comment-respond .comment-form-author input,
.comment-respond .comment-form-email input, .comment-respond .comment-form-url input',
                'property' => 'border-color'
            )
        );

        $settings['comments_respond_section_fields_border_focus_color'] = array(
            'id' => $this->theme_opt_prefix . '[comments_respond_section_fields_border_focus_color]',
            's_key' => 'comments_respond_section_fields_border_focus_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Add Comment section form fields border color on focus', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Leave Comment Section Form Fields Border Color on Focus', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .comment-form-comment textarea:focus, .comment-respond .comment-form-author input:focus,
.comment-respond .comment-form-email input:focus, .comment-respond .comment-form-url input:focus',
                'property' => 'border-color'
            )
        );

        $settings['post_comment_btn_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_comment_btn_color]',
            's_key' => 'post_comment_btn_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change Post comment button text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Comment Button Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .form-submit input',
                'property' => 'color'
            )
        );

        $settings['post_comment_btn_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_comment_btn_bg_color]',
            's_key' => 'post_comment_btn_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change Post comment button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Comment Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .form-submit input',
                'property' => 'background-color'
            )
        );

        $settings['post_comment_btn_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_comment_btn_border_color]',
            's_key' => 'post_comment_btn_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change Post comment button border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Comment Button Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .form-submit input',
                'property' => 'border-color'
            )
        );

        $settings['post_comment_btn_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_comment_btn_hover_color]',
            's_key' => 'post_comment_btn_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change Post comment button text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Comment Button Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .form-submit input:hover',
                'property' => 'color'
            )
        );

        $settings['post_comment_btn_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_comment_btn_bg_hover_color]',
            's_key' => 'post_comment_btn_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change Post comment button background hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Comment Button BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .form-submit input:hover',
                'property' => 'background-color'
            )
        );

        $settings['post_comment_btn_border_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[post_comment_btn_border_hover_color]',
            's_key' => 'post_comment_btn_border_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change Post comment button border hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Post Comment Button Border Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'comments_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.comment-respond .form-submit input:hover',
                'property' => 'border-color'
            )
        );

        /* ********** Photo Gallery Colors ********** */
        $settings['photo_gallery_image_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[photo_gallery_image_overlay_bg_color]',
            's_key' => 'photo_gallery_image_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Photo gallery page image overlay background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Image Overlay BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'photo_gallery_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.my-gallery-container .my-photo .photo-overlay .bg',
                'property' => 'background-color'
            )
        );

        // $settings['photo_gallery_image_v2_overlay_bg_color'] = array(
        //     'id' => $this->theme_opt_prefix . '[photo_gallery_image_v2_overlay_bg_color]',
        //     's_key' => 'photo_gallery_image_v2_overlay_bg_color',
        //     'cap' => 'edit_theme_options',
        //     'default' => '#ffffff',
        //     'desc' => __( 'Photo gallery page image overlay version 2 background color', 'pinkbutterflies' ),
        //     'sanitize' => 'sanitize_hex_color',
        //     'label' => __( 'Image Overlay V2 BG Color', 'pinkbutterflies' ),
        //     'section' => $this->prefix . 'photo_gallery_colors',
        //     'type' => 'color',
        //     'transport' => 'refresh',
        //     'in_css' => true,
        //     'css' => array(
        //         'selector' => '.my-gallery-container .my-photo .photo-overlay-2 .bg',
        //         'property' => 'background-color'
        //     )
        // );

        /* ********** Nothing Found Colors ********** */
        $settings['nothing_found_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[nothing_found_text_color]',
            's_key' => 'nothing_found_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Nothing found section text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'nothing_found_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.nothing-found-section, .nothing-found-section input, .nothing-found-section button',
                'property' => 'color'
            )
        );

        $settings['nothing_found_form_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[nothing_found_form_bg_color]',
            's_key' => 'nothing_found_form_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Nothing found section form background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Form BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'nothing_found_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.nothing-found-section form',
                'property' => 'background-color'
            )
        );

        $settings['nothing_found_search_btn_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[nothing_found_search_btn_bg_hover_color]',
            's_key' => 'nothing_found_search_btn_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Nothing found section search button hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Search Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'nothing_found_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.nothing-found-section form button:hover',
                'property' => 'color'
            )
        );

        /* ********** Navigation Colors ********** */
        $settings['navigation_btns_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[navigation_btns_text_color]',
            's_key' => 'navigation_btns_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Navigation buttons text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Buttons Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb-navigation a',
                'property' => 'color'
            )
        );

        $settings['navigation_btns_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[navigation_btns_border_color]',
            's_key' => 'navigation_btns_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Navigation buttons text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Buttons Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb-navigation a',
                'property' => 'border-color'
            )
        );

        $settings['navigation_btns_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[navigation_btns_bg_color]',
            's_key' => 'navigation_btns_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Navigation V1 and V3 button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb-navigation a',
                'property' => 'background-color'
            )
        );

        $settings['navigation_btns_active_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[navigation_btns_active_bg_color]',
            's_key' => 'navigation_btns_active_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Navigation active button background and on hover background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Active Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb-navigation a:hover, .pb-navigation-3 span.current',
                'property' => 'background-color'
            )
        );

        $settings['navigation_btns_v2_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[navigation_btns_v2_bg_color]',
            's_key' => 'navigation_btns_v2_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Navigation V2 button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'V2 Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb-navigation-3 a, .pb-navigation-3 span',
                'property' => 'background-color'
            )
        );

        $settings['single_post_nav_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_nav_text_color]',
            's_key' => 'single_post_nav_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Single post navigation text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Single Post Nav Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#pb-post-navigation .left a, #pb-post-navigation .right a',
                'property' => 'color'
            )
        );

        $settings['single_post_nav_text_color2'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_nav_text_color2]',
            's_key' => 'single_post_nav_text_color2',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Single post navigation previous and next text - text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Single Nav Previous & Next Text - Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#pb-post-navigation .left a span, #pb-post-navigation .right a span',
                'property' => 'color'
            )
        );
        
        $settings['single_post_nav_text_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[single_post_nav_text_hover_color]',
            's_key' => 'single_post_nav_text_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Single post navigation text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Single Post Nav Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'navigation_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#pb-post-navigation .left a:hover, #pb-post-navigation .right a:hover',
                'property' => 'color'
            )
        );

        /* ********** 404 Page Colors ********** */
        $settings['error_404_overlay_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[error_404_overlay_bg_color]',
            's_key' => 'error_404_overlay_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Image overlay background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Overlay BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'section_404_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => 'body.page-404 .page-404-overlay',
                'property' => 'background-color'
            )
        );

        $settings['error_404_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[error_404_text_color]',
            's_key' => 'error_404_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => '',
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'section_404_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-404-content',
                'property' => 'color'
            )
        );

        $settings['error_404_heading_color'] = array(
            'id' => $this->theme_opt_prefix . '[error_404_heading_color]',
            's_key' => 'error_404_heading_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Heading text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Heading Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'section_404_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-404-content h1',
                'property' => 'color'
            )
        );

        $settings['error_404_btn_color'] = array(
            'id' => $this->theme_opt_prefix . '[error_404_btn_color]',
            's_key' => 'error_404_btn_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => '',
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'section_404_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-404-content a.btn',
                'property' => 'color'
            )
        );

        $settings['error_404_btn_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[error_404_btn_bg_color]',
            's_key' => 'error_404_btn_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => '',
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'section_404_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.page-404-content a.btn',
                'property' => 'background-color'
            )
        );

        /* ********** Sidebar Colors ********** */
        $settings['sidebar_widget_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_color]',
            's_key' => 'sidebar_widget_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change sidebar widgets text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Widgets Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.widget, .pb_social_widget .icons a, .jetpack_subscription_widget #subscribe-email input, .null-instagram-feed p.clear a,
.widget_search form input, .widget_categories ul li a, .widget_archive ul li a, .widget_archive select, .widget_categories select,
.pb_recent_posts_widget ul li h4 a, .widget_tag_cloud .tagcloud a, .widget_nav_menu ul li a, .widget_meta ul li a,
.widget_pages ul li a, .widget_recent_comments ul li a, .widget_recent_entries ul li a, .widget_rss ul li a, .widget .widget-title a',
                'property' => 'color'
            )
        );

        $settings['sidebar_widget_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_border_color]',
            's_key' => 'sidebar_widget_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change sidebar widgets border color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Widgets Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.widget, .widget_calendar #wp-calendar tbody, .widget_calendar #wp-calendar thead tr th, .widget_calendar #wp-calendar td',
                'property' => 'border-color'
            )
        );

        $settings['sidebar_widget_title_border_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_title_border_color]',
            's_key' => 'sidebar_widget_title_border_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change sidebar widgets title border bottom color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Widgets Title Border Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.widget .widget-title',
                'property' => 'border-color'
            )
        );

        $settings['sidebar_widget_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_hover_color]',
            's_key' => 'sidebar_widget_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change sidebar widgets text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Widgets Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb_social_widget .icons a:hover, .widget_categories ul li a:hover, .widget_archive ul li a:hover,
.widget_nav_menu ul li a:hover, .pb_recent_posts_widget ul li h4 a:hover, .widget_meta ul li a:hover, .widget_pages ul li a:hover,
.widget_recent_comments ul li a:hover, .widget_recent_entries ul li a:hover, .widget_rss ul li a:hover, .widget_text .textwidget a,
.widget_calendar #wp-calendar thead tr th, .widget_calendar #wp-calendar td:last-child',
                'property' => 'color'
            )
        );

        $settings['sidebar_widget_form_fields_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_form_fields_bg_color]',
            's_key' => 'sidebar_widget_form_fields_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#eeeeee',
            'desc' => __( 'Change sidebar widgets form fields background color & tags widget tag background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Widgets Form Fields BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.jetpack_subscription_widget #subscribe-email input, .widget_search form, .widget_archive select,
.widget_categories select, .widget_tag_cloud .tagcloud a',
                'property' => 'background-color'
            )
        );

        $settings['sidebar_widget_buttons_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_buttons_bg_color]',
            's_key' => 'sidebar_widget_buttons_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change jetpack subscriptions widget button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Jetpack Subscription Widget Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.jetpack_subscription_widget #subscribe-submit input, .null-instagram-feed p.clear a',
                'property' => 'background-color'
            )
        );

        $settings['sidebar_widget_tag_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_tag_bg_hover_color]',
            's_key' => 'sidebar_widget_tag_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change tags widget tag hover background color, jetpack subscriptions widget button hover background color and calendar widget todays date bg color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Tag Button BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.jetpack_subscription_widget #subscribe-submit input:hover,
.null-instagram-feed p.clear a:hover, .widget_tag_cloud .tagcloud a:hover, .widget_calendar #wp-calendar tbody td#today',
                'property' => 'background-color'
            )
        );

        $settings['sidebar_widget_tag_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_tag_hover_color]',
            's_key' => 'sidebar_widget_tag_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change tags widget tag hover text color, jetpack subscriptions widget button hover text color and calendar widget todays date text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Tag Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.jetpack_subscription_widget #subscribe-submit input:hover,
.null-instagram-feed p.clear a:hover, .widget_tag_cloud .tagcloud a:hover, .widget_calendar #wp-calendar tbody td#today',
                'property' => 'color'
            )
        );

        $settings['sidebar_widget_calendar_post_date_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_calendar_post_date_bg_color]',
            's_key' => 'sidebar_widget_calendar_post_date_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change calendar widget post dates background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Calendar Widget Post Dates BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.widget_calendar #wp-calendar tbody td a',
                'property' => 'background-color'
            )
        );

        $settings['sidebar_widget_calendar_post_date_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_calendar_post_date_color]',
            's_key' => 'sidebar_widget_calendar_post_date_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change calendar widget post dates text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Calendar Widget Post Dates Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.widget_calendar #wp-calendar tbody td a',
                'property' => 'color'
            )
        );

        $settings['sidebar_widget_post_date_color'] = array(
            'id' => $this->theme_opt_prefix . '[sidebar_widget_post_date_color]',
            's_key' => 'sidebar_widget_post_date_color',
            'cap' => 'edit_theme_options',
            'default' => '#aaaaaa',
            'desc' => __( 'Change recent post & rss widget post date text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Recent Posts Post Date Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'sidebar_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.pb_recent_posts_widget ul li p.date, .widget_recent_entries ul li span.post-date,
.widget_rss ul li span.rss-date, .widget_calendar #wp-calendar tfoot td#prev a, .widget_calendar #wp-calendar tfoot td#next a',
                'property' => 'color'
            )
        );

        /* ********** Instagram Colors ********** */
        $settings['instagram_follow_me_box_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_follow_me_box_bg_color]',
            's_key' => 'instagram_follow_me_box_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change instagram follow me box background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Follow Me Box BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'instagram_section_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#instagram-wrap .pb-instagram-boxes .pb-instagram-box.follow-box .overlay',
                'property' => 'background-color'
            )
        );

        $settings['instagram_follow_me_box_color'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_follow_me_box_color]',
            's_key' => 'instagram_follow_me_box_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change instagram follow me box text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Follow Me Box Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'instagram_section_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#instagram-wrap .pb-instagram-boxes .pb-instagram-box.follow-box .overlay a',
                'property' => 'color'
            )
        );

        $settings['instagram_follow_me_btn_color'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_follow_me_btn_color]',
            's_key' => 'instagram_follow_me_btn_color',
            'cap' => 'edit_theme_options',
            'default' => '#ffffff',
            'desc' => __( 'Change instagram follow me button text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Follow Me Button Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'instagram_section_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#instagram-wrap a.instagram-follow-btn',
                'property' => 'color'
            )
        );

        $settings['instagram_follow_me_btn_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_follow_me_btn_bg_color]',
            's_key' => 'instagram_follow_me_btn_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change instagram follow me button background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Follow Me Button BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'instagram_section_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#instagram-wrap a.instagram-follow-btn',
                'property' => 'background-color'
            )
        );

        $settings['instagram_follow_me_btn_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_follow_me_btn_hover_color]',
            's_key' => 'instagram_follow_me_btn_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change instagram follow me button text hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Follow Me Button Text Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'instagram_section_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#instagram-wrap a.instagram-follow-btn:hover',
                'property' => 'color'
            )
        );

        $settings['instagram_follow_me_btn_bg_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[instagram_follow_me_btn_bg_hover_color]',
            's_key' => 'instagram_follow_me_btn_bg_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change instagram follow me button background hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Follow Me Button BG Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'instagram_section_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#instagram-wrap a.instagram-follow-btn:hover',
                'property' => 'background-color'
            )
        );

        /* ********** Footer Colors ********** */
        $settings['footer_bg_color'] = array(
            'id' => $this->theme_opt_prefix . '[footer_bg_color]',
            's_key' => 'footer_bg_color',
            'cap' => 'edit_theme_options',
            'default' => '#faeef0',
            'desc' => __( 'Change footer background color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'BG Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'footer_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#footer',
                'property' => 'background-color'
            )
        );

        $settings['footer_text_color'] = array(
            'id' => $this->theme_opt_prefix . '[footer_text_color]',
            's_key' => 'footer_text_color',
            'cap' => 'edit_theme_options',
            'default' => '#222222',
            'desc' => __( 'Change footer text color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Text Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'footer_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '#footer, .footer-social a',
                'property' => 'color'
            )
        );

        $settings['footer_icons_hover_color'] = array(
            'id' => $this->theme_opt_prefix . '[footer_icons_hover_color]',
            's_key' => 'footer_icons_hover_color',
            'cap' => 'edit_theme_options',
            'default' => '#f364ba',
            'desc' => __( 'Change footer icons hover color', 'pinkbutterflies' ),
            'sanitize' => 'sanitize_hex_color',
            'label' => __( 'Icons Hover Color', 'pinkbutterflies' ),
            'section' => $this->prefix . 'footer_colors',
            'type' => 'color',
            'transport' => 'refresh',
            'in_css' => true,
            'css' => array(
                'selector' => '.footer-social a:hover',
                'property' => 'color'
            )
        );

        return $settings;

    }

}

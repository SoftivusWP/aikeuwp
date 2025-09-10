<?php

/**
 * aikeu customizer
 *
 * @package aikeu
 */

use Kirki\Compatibility\Kirki;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function aikeu_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('aikeu_customizer', [
        'priority' => 10,
        'title'    => esc_html__('Aikeu Customizer', 'aikeu'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title'       => esc_html__('Header Info Setting', 'aikeu'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('header_top_setting_color', [
        'title'       => esc_html__('Header Menu Color', 'aikeu'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'aikeu'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'aikeu'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title'       => esc_html__('Side Info', 'aikeu'),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title'       => esc_html__('Breadcrumb Setting', 'aikeu'),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'aikeu'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => esc_html__('Footer Settings', 'aikeu'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('color_setting', [
        'title'       => esc_html__('Color Setting', 'aikeu'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('404_page', [
        'title'       => esc_html__('404 Page', 'aikeu'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);




    $wp_customize->add_section('typo_setting', [
        'title'       => esc_html__('Typography Setting', 'aikeu'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);

    $wp_customize->add_section('slug_setting', [
        'title'       => esc_html__('Slug Settings', 'aikeu'),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'aikeu_customizer',
    ]);
}

add_action('customize_register', 'aikeu_customizer_panels_sections');

function _header_top_fields($fields)
{


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_preloader',
        'label'    => esc_html__('Preloader On/Off', 'aikeu'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    $fields[] = [
        'type'        => 'text',
        'settings'    => 'aikeu_preloader_text',
        'label'       => esc_html__('Preloader Text', 'your-textdomain'),
        'section'     => 'header_top_setting',
        'default'     => 'LOADING',
        'active_callback' => [
            [
                'setting'  => 'aikeu_preloader',
                'operator' => '==',
                'value'    => true,
            ]
        ]
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'aikeu_preloader_image',
        'label'       => esc_html__('Preloader Image', 'your-textdomain'),
        'section'     => 'header_top_setting',
        'default'     => '', // No default image
        'active_callback' => [
            [
                'setting'  => 'aikeu_preloader',
                'operator' => '==',
                'value'    => true,
            ]
        ]
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_backtotop',
        'label'    => esc_html__('Back To Top On/Off', 'aikeu'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    // search 
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_navright_search_switch',
        'label'    => esc_html__('Search Swicher', 'aikeu'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    // Contact Info  
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'header_button_switch',
        'label'    => esc_html__('Header Button Swicher', 'aikeu'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    $fields[] = [
        'type'        => 'text',
        'settings'    => 'aikeu_btnone_text',
        'label'       => esc_html__('Button Text', 'your-textdomain'),
        'section'     => 'header_top_setting',
        'default'     => 'Contact',
        'active_callback' => [
            [
                'setting'  => 'header_button_switch',
                'operator' => '==',
                'value'    => true,
            ]
        ]
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'aikeu_btnone_link',
        'label'    => esc_html__('Button URL', 'aikeu'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'aikeu'),
        'active_callback' => [
            [
                'setting'  => 'header_button_switch',
                'operator' => '==',
                'value'    => true,
            ]
        ]
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_top_fields');



/*
Header Settings
 */
function _header_header_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__('Select Header Style', 'aikeu'),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__('Select an option...', 'aikeu'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__('Header Logo', 'aikeu'),
        'description' => esc_html__('Upload Your Logo.', 'aikeu'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/images/logo/logo.png',
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');

/*
Header Settings
 */

/*
Header Settings color
 */
function _header_top_fields_color($fields)
{
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_menu_bg_color',
        'label'       => __('Menu BG Color', 'aikeu'),
        'description' => esc_html__('This is a Menu BG color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_menu_border_color',
        'label'       => __('Menu Border Color', 'aikeu'),
        'description' => esc_html__('This is a Menu Border color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_menu_color',
        'label'       => __('Menu Color', 'aikeu'),
        'description' => esc_html__('This is a Menu color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_menu_color_hover',
        'label'       => __('Menu Hover Color', 'aikeu'),
        'description' => esc_html__('This is a Menu color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_menu_search_box',
        'label'       => __('Menu Search Box BG', 'aikeu'),
        'description' => esc_html__('This is a Search Box bg color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_menu_search_box_color',
        'label'       => __('Menu Search Box Color', 'aikeu'),
        'description' => esc_html__('This is a Search Box color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'custom_menu_css_buttom',
        'label'       => __('Menu Button Box BG', 'aikeu'),
        'description' => esc_html__('This is a Button Box bg color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'custom_menu_css_buttom_color',
        'label'       => __('Menu Button Box Color', 'aikeu'),
        'description' => esc_html__('This is a Button Box color control.', 'aikeu'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];



    return $fields;
}
add_filter('kirki/fields', '_header_top_fields_color');

/*
Header Settings color
 */

/*
_header_page_title_fields
 */
function _header_page_title_fields($fields)
{
    // Breadcrumb Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_switch',
        'label'    => esc_html__('Breadcrumb Area Hide', 'aikeu'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];
    // Breadcrumb Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_text_switch',
        'label'    => esc_html__('Breadcrumb Text Hide', 'aikeu'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];
    // Breadcrumb Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_breadcrumb_inner_thumb_switch',
        'label'    => esc_html__('Breadcrumb Inner Thumbs Hide', 'aikeu'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'aikeu'),
        'description' => esc_html__('Breadcrumb Background Image', 'aikeu'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/images/cmn-bg.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_inner_thumb',
        'label'       => esc_html__('Breadcrumb inner Left Image', 'aikeu'),
        'description' => esc_html__('Breadcrumb inner Image', 'aikeu'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/images/cmn-thumb-left.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_inner_thumb2',
        'label'       => esc_html__('Breadcrumb inner Right Image', 'aikeu'),
        'description' => esc_html__('Breadcrumb inner Image', 'aikeu'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/images/cmn-thumb-right.png',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'aikeu'),
        'description' => esc_html__('This is a Breadcrumb bg color control.', 'aikeu'),
        'section'     => 'breadcrumb_setting',
        'default'     => '',
        'priority'    => 10,
    ];

    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'breadcrumb_heading_typography',
        'label'       => esc_html__('breadcrumb Font', 'aikeu'),
        'section'     => 'breadcrumb_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.cmn-banner .cmn-banner__content h2',
            ],
        ],
    ];
    // $fields[] = [
    //     'type'     => 'switch',
    //     'settings' => 'breadcrumb_info_switch',
    //     'label'    => esc_html__('Breadcrumb Info switch', 'aikeu'),
    //     'section'  => 'breadcrumb_setting',
    //     'default'  => '1',
    //     'priority' => 10,
    //     'choices'  => [
    //         'on'  => esc_html__('Enable', 'aikeu'),
    //         'off' => esc_html__('Disable', 'aikeu'),
    //     ],
    // ];

    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'aikeu'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_blog_cat',
        'label'    => esc_html__('Blog Category Meta On/Off', 'aikeu'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_blog_author',
        'label'    => esc_html__('Blog Author Meta On/Off', 'aikeu'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_blog_date',
        'label'    => esc_html__('Blog Date Meta On/Off', 'aikeu'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'aikeu_blog_comments',
        'label'    => esc_html__('Blog Comments Meta On/Off', 'aikeu'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'aikeu'),
            'off' => esc_html__('Disable', 'aikeu'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'aikeu_blog_btn',
        'label'    => esc_html__('Blog Button text', 'aikeu'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Read More', 'aikeu'),
        'priority' => 10,
    ];

    // $fields[] = [
    //     'type'     => 'text',
    //     'settings' => 'breadcrumb_blog_title',
    //     'label'    => esc_html__('Blog Title', 'aikeu'),
    //     'section'  => 'blog_setting',
    //     'default'  => esc_html__('Blog', 'aikeu'),
    //     'priority' => 10,
    // ];

    // $fields[] = [
    //     'type'     => 'text',
    //     'settings' => 'breadcrumb_blog_title_details',
    //     'label'    => esc_html__('Blog Details Title', 'aikeu'),
    //     'section'  => 'blog_setting',
    //     'default'  => esc_html__('Blog Details', 'aikeu'),
    //     'priority' => 10,
    // ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__('Choose Footer Style', 'aikeu'),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__('Select an option...', 'aikeu'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'footer_bg_color',
        'label'       => __('Footer BG Color', 'aikeu'),
        'description' => esc_html__('This is a Footer bg color control.', 'aikeu'),
        'section'     => 'footer_setting',
        'default'     => '#03211B',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'aikeu_copyright',
        'label'    => esc_html__('Copy Right', 'aikeu'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('Copyright &copy; 2024 Aikeu. All Rights Reserved', 'aikeu'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');

// color
function aikeu_color_fields($fields)
{

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_color_option',
        'label'       => __('Primary Color', 'aikeu'),
        'description' => esc_html__('This is a Primary color control.', 'aikeu'),
        'section'     => 'color_setting',
        'default'     => '#65ff4b',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'aikeu_color_option_2',
        'label'       => __('Secondary Color', 'aikeu'),
        'description' => esc_html__('This is a Secondary color control.', 'aikeu'),
        'section'     => 'color_setting',
        'default'     => '#FCB650',
        'priority'    => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', 'aikeu_color_fields');

// 404
function aikeu_404_fields($fields)
{
    // // 404 settings
    // $fields[] = [
    //     'type'        => 'image',
    //     'settings'    => 'aikeu_404_bg',
    //     'label'       => esc_html__( '404 Image.', 'aikeu' ),
    //     'description' => esc_html__( '404 Image.', 'aikeu' ),
    //     'section'     => '404_page',
    // ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'aikeu_error_title',
        'label'    => esc_html__('Not Found Title', 'aikeu'),
        'section'  => '404_page',
        'default'  => esc_html__('Page not found', 'aikeu'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'aikeu_error_desc',
        'label'    => esc_html__('404 Description Text', 'aikeu'),
        'section'  => '404_page',
        'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'aikeu'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'aikeu_error_link_text',
        'label'    => esc_html__('404 Link Text', 'aikeu'),
        'section'  => '404_page',
        'default'  => esc_html__('Back To Home', 'aikeu'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'aikeu_404_fields');





/**
 * Added Fields
 */
function aikeu_typo_fields($fields)
{
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__('Body Font', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'p',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_link_setting',
        'label'       => esc_html__('Link', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_span_setting',
        'label'       => esc_html__('Span', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__('Heading h1 Fonts', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__('Heading h2 Fonts', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__('Heading h3 Fonts', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__('Heading h4 Fonts', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__('Heading h5 Fonts', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__('Heading h6 Fonts', 'aikeu'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'aikeu_typo_fields');




/**
 * Added Fields
 */
function aikeu_slug_setting($fields)
{
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'aikeu_case_study_slug',
        'label'    => esc_html__('Case Study Slug', 'aikeu'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('casestudy', 'aikeu'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'aikeu_services_slug',
        'label'    => esc_html__('Services Slug', 'aikeu'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('services', 'aikeu'),
        'priority' => 10,
    ];

    return $fields;
}

add_filter('kirki/fields', 'aikeu_slug_setting');







/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function aikeu_THEME_option($name)
{
    $value = '';
    if (class_exists('aikeu')) {
        $value = Kirki::get_option(aikeu_get_theme(), $name);
    }

    return apply_filters('aikeu_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function aikeu_get_theme()
{
    return 'aikeu';
}

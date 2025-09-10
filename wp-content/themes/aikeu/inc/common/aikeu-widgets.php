<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aikeu_widgets_init()
{

    $footer_style_2_switch = get_theme_mod('footer_style_2_switch', false);
    $footer_style_3_switch = get_theme_mod('footer_style_3_switch', false);
    $footer_style_4_switch = get_theme_mod('footer_style_4_switch', false);

    /**
     * blog sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'aikeu'),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__('Set Your Blog Widget', 'aikeu'),
        'before_widget' => '<div id="%1$s" class="sidebar__widget sidebar__part %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sidebar__widget-head"><h3 class="sidebar__widget-title">',
        'after_title'   => '</h3></div>',
    ]);


    // $footer_widgets = get_theme_mod('footer_widget_number', 1);

    // // footer default
    // for ($num = 1; $num <= $footer_widgets + 1; $num++) {
    //     register_sidebar([
    //         'name'          => sprintf(esc_html__('Footer %1$s', 'aikeu'), $num),
    //         'id'            => 'footer-' . $num,
    //         'description'   => sprintf(esc_html__('Footer column %1$s', 'aikeu'), $num),
    //         'before_widget' => '<div id="%1$s" class="footer__nav-list footer-box footer__widget footer-col-' . $num . ' %2$s">',
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h4 class="footer__widget-title">',
    //         'after_title'   => '</h4>',
    //     ]);
    // }

    // // footer 2
    // if ($footer_style_2_switch) {
    //     for ($num = 1; $num <= $footer_widgets; $num++) {
    //         register_sidebar([
    //             'name'          => sprintf(esc_html__('Footer Style 2 : %1$s', 'aikeu'), $num),
    //             'id'            => 'footer-2-' . $num,
    //             'description'   => sprintf(esc_html__('Footer Style 2 : %1$s', 'aikeu'), $num),
    //             'before_widget' => '<div id="%1$s" class="footer__nav-list footer__widget footer__widget-2 footer-col-2-' . $num . ' %2$s">',
    //             'after_widget'  => '</div>',
    //             'before_title'  => '<h4 class="footer__widget-title">',
    //             'after_title'   => '</h4>',
    //         ]);
    //     }
    // }
}
add_action('widgets_init', 'aikeu_widgets_init');

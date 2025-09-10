<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aikeu
 */

/** 
 *
 * aikeu header
 */

function aikeu_check_header()
{
    $aikeu_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
    $aikeu_default_header_style = get_theme_mod('choose_default_header', 'header-style-1');

    if ($aikeu_header_style == 'header-style-1') {
        get_template_part('template-parts/header/header-1');
    } elseif ($aikeu_header_style == 'header-style-2') {
        get_template_part('template-parts/header/header-2');
    } elseif ($aikeu_header_style == 'header-style-3') {
        get_template_part('template-parts/header/header-3');
    } else {

        /** default header style **/
        if ($aikeu_default_header_style == 'header-style-2') {
            get_template_part('template-parts/header/header-2');
        } else {
            get_template_part('template-parts/header/header-1');
        }
    }
}
add_action('aikeu_header_style', 'aikeu_check_header', 10);


/**
 * [aikeu_header_lang description]
 * @return [type] [description]
 */
function aikeu_header_lang_defualt()
{
    $aikeu_header_lang = get_theme_mod('aikeu_header_lang', false);
    if ($aikeu_header_lang) : ?>

        <ul>
            <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__('English', 'aikeu'); ?> <i class="fa-light fa-angle-down"></i></a>
                <?php do_action('aikeu_language'); ?>
            </li>
        </ul>

    <?php endif; ?>
<?php
}

/**
 * [aikeu_language_list description]
 * @return [type] [description]
 */
function _aikeu_language($mar)
{
    return $mar;
}
function aikeu_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__('English', 'aikeu') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('Bangla', 'aikeu') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('French', 'aikeu') . '</a></li>';
        $mar .= ' </ul>';
    }
    print _aikeu_language($mar);
}
add_action('aikeu_language', 'aikeu_language_list');


// header logo
function aikeu_header_logo()
{ ?>
    <?php
    $aikeu_logo = get_template_directory_uri() . '/assets/images/logo/logo.png';

    $aikeu_site_logo = get_theme_mod('logo', $aikeu_logo);
    ?>


    <a class="standard-logo navbar-brand" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($aikeu_site_logo); ?>" alt="<?php print esc_attr__('logo', 'aikeu'); ?>" />
    </a>
<?php
}

// header logo
function aikeu_header_sticky_logo()
{ ?>
    <?php
    $aikeu_logo_black = get_template_directory_uri() . '/assets/images/logo/logo-black.png';
    $aikeu_secondary_logo = get_theme_mod('seconday_logo', $aikeu_logo_black);
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <images src="<?php print esc_url($aikeu_secondary_logo); ?>" alt="<?php print esc_attr__('logo', 'aikeu'); ?>" />
    </a>
<?php
}

function aikeu_mobile_logo()
{
    // side info
    $aikeu_mobile_logo_hide = get_theme_mod('aikeu_mobile_logo_hide', false);

    $aikeu_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');

?>

    <?php if (!empty($aikeu_mobile_logo_hide)) : ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($aikeu_site_logo); ?>" alt="<?php print esc_attr__('logo', 'aikeu'); ?>" />
            </a>
        </div>
    <?php endif; ?>



<?php }

/**
 * [aikeu_header_social_profiles description]
 * @return [type] [description]
 */
function aikeu_header_social_profiles()
{
    $aikeu_topbar_fb_url = get_theme_mod('aikeu_topbar_fb_url', __('#', 'aikeu'));
    $aikeu_topbar_twitter_url = get_theme_mod('aikeu_topbar_twitter_url', __('#', 'aikeu'));
    $aikeu_topbar_instagram_url = get_theme_mod('aikeu_topbar_instagram_url', __('#', 'aikeu'));
    $aikeu_topbar_linkedin_url = get_theme_mod('aikeu_topbar_linkedin_url', __('#', 'aikeu'));
    $aikeu_topbar_youtube_url = get_theme_mod('aikeu_topbar_youtube_url', __('#', 'aikeu'));
?>
    <ul>
        <?php if (!empty($aikeu_topbar_fb_url)) : ?>
            <li><a href="<?php print esc_url($aikeu_topbar_fb_url); ?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($aikeu_topbar_twitter_url)) : ?>
            <li><a href="<?php print esc_url($aikeu_topbar_twitter_url); ?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($aikeu_topbar_instagram_url)) : ?>
            <li><a href="<?php print esc_url($aikeu_topbar_instagram_url); ?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($aikeu_topbar_linkedin_url)) : ?>
            <li><a href="<?php print esc_url($aikeu_topbar_linkedin_url); ?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($aikeu_topbar_youtube_url)) : ?>
            <li><a href="<?php print esc_url($aikeu_topbar_youtube_url); ?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif; ?>
    </ul>

<?php
}

function aikeu_footer_social_profiles()
{
    $aikeu_footer_fb_url = get_theme_mod('aikeu_footer_fb_url', __('', 'aikeu'));
    $aikeu_footer_twitter_url = get_theme_mod('aikeu_footer_twitter_url', __('', 'aikeu'));
    $aikeu_footer_instagram_url = get_theme_mod('aikeu_footer_instagram_url', __('', 'aikeu'));
    $aikeu_footer_linkedin_url = get_theme_mod('aikeu_footer_linkedin_url', __('', 'aikeu'));
    $aikeu_footer_youtube_url = get_theme_mod('aikeu_footer_youtube_url', __('', 'aikeu'));
?>

    <ul>
        <?php if (!empty($aikeu_footer_fb_url)) : ?>
            <li>
                <a href="<?php print esc_url($aikeu_footer_fb_url); ?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($aikeu_footer_twitter_url)) : ?>
            <li>
                <a href="<?php print esc_url($aikeu_footer_twitter_url); ?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($aikeu_footer_instagram_url)) : ?>
            <li>
                <a href="<?php print esc_url($aikeu_footer_instagram_url); ?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($aikeu_footer_linkedin_url)) : ?>
            <li>
                <a href="<?php print esc_url($aikeu_footer_linkedin_url); ?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($aikeu_footer_youtube_url)) : ?>
            <li>
                <a href="<?php print esc_url($aikeu_footer_youtube_url); ?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * [aikeu_header_menu description]
 * @return [type] [description]
 */

function aikeu_header_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'navbar__list',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [aikeu_header_menu description]
 * @return [type] [description]
 */
function aikeu_mobile_menu()
{
?>
    <?php
    $aikeu_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false,
    ]);

    $aikeu_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $aikeu_menu);
    echo wp_kses_post($aikeu_menu);
    ?>
<?php
}

/**
 * [aikeu_search_menu description]
 * @return [type] [description]
 */
function aikeu_header_search_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [aikeu_footer_menu description]
 * @return [type] [description]
 */
function aikeu_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'justify-content-center justify-content-lg-start',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}


/**
 * [aikeu_category_menu description]
 * @return [type] [description]
 */
function aikeu_category_menu()
{
    wp_nav_menu([
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}

/**
 *
 * aikeu footer
 */
add_action('aikeu_footer_style', 'aikeu_check_footer', 10);

function aikeu_check_footer()
{
    $aikeu_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1');

    /** default footer style **/
    if ($aikeu_default_footer_style == 'footer-style-1') {
        get_template_part('template-parts/footer/footer-1');
    }
}

// aikeu_copyright_text
function aikeu_copyright_text()
{
    $home_url = esc_url(home_url('/')); // Get the home URL
    $copyright_text = get_theme_mod('aikeu_copyright', 'Copyright © 2025 <a href="' . $home_url . '">Aikeu</a> - All Rights Reserved');
    echo wp_kses($copyright_text, array(
        'a' => array(
            'href' => array(),
        ),
    ));
}



/**
 *
 * pagination
 */
if (!function_exists('aikeu_pagination')) {

    function _aikeu_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function aikeu_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _aikeu_pagi_callback($pagi);
    }
}


// header top bg color
function aikeu_breadcrumb_bg_color()
{

    // Breadcrumb Color
    $color_code = get_theme_mod('aikeu_breadcrumb_bg_color', '');
    $custom_css = '';
    if ($color_code != '') {
        $custom_css .= "body .cmn-banner{
            background-color: $color_code !important;
        }";
    }
    // Enqueue and add inline styles for menu Color
    wp_register_style('aikeu-menu-custom', false);
    wp_enqueue_style('aikeu-menu-custom', false);
    wp_add_inline_style('aikeu-menu-custom', $custom_css, true);
}
add_action('wp_enqueue_scripts', 'aikeu_breadcrumb_bg_color');

// breadcrumb-spacing top
function aikeu_breadcrumb_spacing()
{
    $padding_px = get_theme_mod('aikeu_breadcrumb_spacing', '160px');
    wp_enqueue_style('aikeu-custom', AIKEU_THEME_CSS_DIR . 'aikeu-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('aikeu-breadcrumb-top-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aikeu_breadcrumb_spacing');

// breadcrumb-spacing bottom
function aikeu_breadcrumb_bottom_spacing()
{
    $padding_px = get_theme_mod('aikeu_breadcrumb_bottom_spacing', '160px');
    wp_enqueue_style('aikeu-custom', AIKEU_THEME_CSS_DIR . 'aikeu-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style('aikeu-breadcrumb-bottom-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aikeu_breadcrumb_bottom_spacing');

// scrollup
function aikeu_scrollup_switch()
{
    $scrollup_switch = get_theme_mod('aikeu_scrollup_switch', false);
    wp_enqueue_style('aikeu-custom', AIKEU_THEME_CSS_DIR . 'aikeu-custom.css', []);
    if ($scrollup_switch) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('aikeu-scrollup-switch', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aikeu_scrollup_switch');


function aikeu_menu_custom_color()
{
    // Default Menu Color
    $color_code_menu_bg = get_theme_mod('aikeu_menu_bg_color', '');
    $custom_menu_css_bg = '';
    if ($color_code_menu_bg != '') {
        $custom_menu_css_bg .= ".primary-navbar li a{
            color: $color_code_menu_bg !important;
        }";
    }
    // Default Menu Color
    $color_code_menu_border = get_theme_mod('aikeu_menu_border_color', '');
    $custom_menu_css_border = '';
    if ($color_code_menu_border != '') {
        $custom_menu_css_border .= ".primary-navbar li a{
            color: $color_code_menu_border !important;
        }";
    }
    // Default Menu Color
    $color_code_menu = get_theme_mod('aikeu_menu_color', '');
    $custom_menu_css = '';
    if ($color_code_menu != '') {
        $custom_menu_css .= ".primary-navbar li a{
            color: $color_code_menu !important;
        }";
    }
    // Default Menu Color
    $color_code_menu_hover = get_theme_mod('aikeu_menu_color_hover', '');
    $custom_menu_css_hov = '';
    if ($color_code_menu_hover != '') {
        $custom_menu_css_hov .= ".primary-navbar li a:hover{
            color: $color_code_menu_hover !important;
        }";
    }
    // Second Menu Color
    $color_code_menu2 = get_theme_mod('aikeu_second_menu_color', '');
    $custom_menu_css2 = '';
    if ($color_code_menu2 != '') {
        $custom_menu_css2 .= ".second .primary-navbar li a{
            color: $color_code_menu2 !important;
        }";
    }
    // Second Menu Hover Color
    $color_code_hover = get_theme_mod('aikeu_menu_color_2', '');
    $custom_menu_css_hover = '';
    if ($color_code_hover != '') {
        $custom_menu_css_hover .= ".second .primary-navbar li a:hover{
            color: $color_code_hover !important;
        }";
    }
    // // Second Menu Color
    // $color_code_menu_info = get_theme_mod('custom_menu_css_info', '');
    // $custom_menu_css_info = '';
    // if ($color_code_menu_info != '') {
    //     $custom_menu_css_info .= ".offcanvas .offcanvas-body .custom-nevbar__right .custom-nevbar__right-location{
    //         color: $color_code_menu_info !important;
    //     }";
    // }
    // search box bg
    $color_code_search = get_theme_mod('aikeu_menu_search_box', '');
    $custom_menu_css_search = '';
    if ($color_code_search != '') {
        $custom_menu_css_search .= ".open-search{
            background: $color_code_search !important;
        }";
    }
    // search box Color
    $color_code_search_color = get_theme_mod('aikeu_menu_search_box_color', '');
    $custom_menu_css_search2 = '';
    if ($color_code_search_color != '') {
        $custom_menu_css_search2 .= ".primary-navbar .navbar__mobile-options button i{
            color: $color_code_search_color !important;
        }";
    }

    // button box Bg
    $color_code_buttom = get_theme_mod('custom_menu_css_buttom', '');
    $custom_menu_css_buttom = '';
    if ($color_code_buttom != '') {
        $custom_menu_css_buttom .= ".primary-navbar .btn.btn--primary{
            background: $color_code_buttom !important;
        }";
    }
    // buttom box Color
    $color_code_buttom_color = get_theme_mod('custom_menu_css_buttom_color', '');
    $custom_menu_css_buttom_color = '';
    if ($color_code_buttom_color != '') {
        $custom_menu_css_buttom_color .= ".primary-navbar .btn.btn--primary {
            color: $color_code_buttom_color !important;
        }";
    }
    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_css_bg', false);
    wp_enqueue_style('custom_menu_css_bg', false);
    wp_add_inline_style('custom_menu_css_bg', $custom_menu_css, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_css_border', false);
    wp_enqueue_style('custom_menu_css_border', false);
    wp_add_inline_style('custom_menu_css_border', $custom_menu_css_hov, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('aikeu-menu-custom', false);
    wp_enqueue_style('aikeu-menu-custom', false);
    wp_add_inline_style('aikeu-menu-custom', $custom_menu_css, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('aikeu-menu-custom-hover', false);
    wp_enqueue_style('aikeu-menu-custom-hover', false);
    wp_add_inline_style('aikeu-menu-custom-hover', $custom_menu_css_hov, true);

    // Enqueue and add inline styles for Secondary menu Color
    wp_register_style('aikeu-menu-custom-2', false);
    wp_enqueue_style('aikeu-menu-custom-2', false);
    wp_add_inline_style('aikeu-menu-custom-2', $custom_menu_css2, true);

    // Enqueue and add inline styles for menu hover Color
    wp_register_style('aikeu-menu-hover-custom', false);
    wp_enqueue_style('aikeu-menu-hover-custom', false);
    wp_add_inline_style('aikeu-menu-hover-custom', $custom_menu_css_hover, true);


    // Enqueue and add inline styles for search bg
    wp_register_style('aikeu-menu-custom-search', false);
    wp_enqueue_style('aikeu-menu-custom-search', false);
    wp_add_inline_style('aikeu-menu-custom-search', $custom_menu_css_search, true);

    // Enqueue and add inline styles for search Color
    wp_register_style('aikeu-menu-custom-search2', false);
    wp_enqueue_style('aikeu-menu-custom-search2', false);
    wp_add_inline_style('aikeu-menu-custom-search2', $custom_menu_css_search2, true);

    // Enqueue and add inline styles for button bg
    wp_register_style('aikeu-menu-custom-button', false);
    wp_enqueue_style('aikeu-menu-custom-button', false);
    wp_add_inline_style('aikeu-menu-custom-button', $custom_menu_css_buttom, true);

    // Enqueue and add inline styles for button Color
    wp_register_style('aikeu-menu-custom-button-color', false);
    wp_enqueue_style('aikeu-menu-custom-button-color', false);
    wp_add_inline_style('aikeu-menu-custom-button-color', $custom_menu_css_buttom_color, true);
}
add_action('wp_enqueue_scripts', 'aikeu_menu_custom_color');


// theme color

function aikeu_custom_color()
{
    // Primary Color
    $color_code = get_theme_mod('aikeu_color_option', '#65ff4b');
    $custom_css = '';
    if ($color_code != '') {
        $custom_css .= ":root{
            --primary-color: $color_code !important;
            --tp-theme-1: $color_code !important;
        }";
    }
    // Secondary Color
    $color_code2 = get_theme_mod('aikeu_color_option_2', '#FCB650');
    $custom_css2 = '';
    if ($color_code2 != '') {
        $custom_css2 .= ":root{
            --secondary-color: $color_code2 !important;
        }";
    }
    // Enqueue and add inline styles for Primary Color
    wp_register_style('aikeu-custom', false);
    wp_enqueue_style('aikeu-custom', false);
    wp_add_inline_style('aikeu-custom', $custom_css, true);
    // Enqueue and add inline styles for Secondary Color
    wp_register_style('aikeu-custom-2', false);
    wp_enqueue_style('aikeu-custom-2', false);
    wp_add_inline_style('aikeu-custom-2', $custom_css2, true);
}
add_action('wp_enqueue_scripts', 'aikeu_custom_color');


// theme color
function aikeu_custom_color_scrollup()
{
    $color_code = get_theme_mod('aikeu_color_scrollup', '#2b4eff');
    wp_enqueue_style('aikeu-custom', AIKEU_THEME_CSS_DIR . 'aikeu-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        wp_add_inline_style('aikeu-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aikeu_custom_color_scrollup');

// theme color
function aikeu_custom_color_secondary()
{
    $color_code = get_theme_mod('aikeu_color_option_3', '#30a820');
    wp_enqueue_style('aikeu-custom', AIKEU_THEME_CSS_DIR . 'aikeu-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".asdf { border-color: " . $color_code . "}";
        wp_add_inline_style('aikeu-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aikeu_custom_color_secondary');

// theme color
function aikeu_custom_color_secondary_2()
{
    $color_code = get_theme_mod('aikeu_color_option_3_2', '#ffb352');
    wp_enqueue_style('aikeu-custom', AIKEU_THEME_CSS_DIR . 'aikeu-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style('aikeu-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aikeu_custom_color_secondary_2');


// aikeu_kses_intermediate
function aikeu_kses_intermediate($string = '')
{
    return wp_kses($string, aikeu_get_allowed_html_tags('intermediate'));
}

function aikeu_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function aikeu_kses($raw)
{

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}

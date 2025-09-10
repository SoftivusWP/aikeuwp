<?php

/**
 * aikeu_scripts description
 * @return [type] [description]
 */
function aikeu_scripts()
{

    /**
     * all css files 
     */

    wp_enqueue_style('aikeu-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');
    wp_enqueue_style('aikeu-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

    wp_enqueue_style('sbootstrap', AIKEU_THEME_CSS_DIR2 . 'bootstrap/css/bootstrap.min.css', []);
    wp_enqueue_style('sbootstrap-icons', AIKEU_THEME_CSS_DIR2 . 'bootstrap-icons/bootstrap-icons.min.css', []);
    wp_enqueue_style('smaterialicons-icons', AIKEU_THEME_CSS_DIR2 . 'material-icons/css/materialicons.css', []);
    wp_enqueue_style('scus_fontawesome', AIKEU_THEME_CSS_DIR2 . 'font-awesome/css/fontawesome.min.css', []);
    wp_enqueue_style('nice-select', AIKEU_THEME_CSS_DIR2 . 'nice-select/css/nice-select.css', []);
    wp_enqueue_style('smagnific-popup', AIKEU_THEME_CSS_DIR2 . 'magnific-popup/css/magnific-popup.css', []);
    wp_enqueue_style('sslick', AIKEU_THEME_CSS_DIR2 . 'slick/css/slick.css', []);
    wp_enqueue_style('sodometer', AIKEU_THEME_CSS_DIR2 . 'odometer/css/odometer.css', []);
    wp_enqueue_style('sspacing', AIKEU_THEME_CSS_DIR . 'spacing.css', [], time());
    wp_enqueue_style('smain-css', AIKEU_THEME_CSS_DIR . 'main.css', [], time());
    wp_enqueue_style('sblog-css', AIKEU_THEME_CSS_DIR . 'aikeu-blog.css', [], time());
    wp_enqueue_style('swoocommerce-css', AIKEU_THEME_CSS_DIR . 'woocommerce.css', [], time());
    wp_enqueue_style('saikeu-unit', AIKEU_THEME_CSS_DIR . 'aikeu-unit.css', [], time());
    wp_enqueue_style('saikeu-custom', AIKEU_THEME_CSS_DIR . 'aikeu-custom.css', [], time());
    wp_enqueue_style('sresponsive', AIKEU_THEME_CSS_DIR . 'responsive.css', [], time());
    wp_enqueue_style('saikeu-style', get_stylesheet_uri());

    // all js
    wp_enqueue_script('sbootstrap-js', AIKEU_THEME_JS_DIR2 . 'bootstrap/js/bootstrap.bundle.min.js', ['jquery'], '',  true);
    wp_enqueue_script('nice-select-js', AIKEU_THEME_JS_DIR2 . 'nice-select/js/jquery.nice-select.min.js', ['jquery'], '',  true);
    wp_enqueue_script('smagnific-popup-js', AIKEU_THEME_JS_DIR2 . 'magnific-popup/js/jquery.magnific-popup.min.js', ['jquery'], '',  true);
    wp_enqueue_script('sslick-js', AIKEU_THEME_JS_DIR2 . 'slick/js/slick.min.js', ['jquery'], false, true);
    wp_enqueue_script('sodometer-js', AIKEU_THEME_JS_DIR2 . 'odometer/js/odometer.min.js', ['jquery'], false, true);
    wp_enqueue_script('simagesloaded-js', AIKEU_THEME_JS_DIR2 . 'images-loaded/imagesloaded.pkgd.min.js', ['jquery'], false, true);
    wp_enqueue_script('sisotope-js', AIKEU_THEME_JS_DIR2 . 'isotope/isotope.pkgd.min.js', ['jquery'], false, true);
    wp_enqueue_script('spackery-js', AIKEU_THEME_JS_DIR2 . 'isotope/packery.pkgd.min.js', ['jquery'], false, true);
    wp_enqueue_script('sSplitText-js', AIKEU_THEME_JS_DIR2 . 'gsap/SplitText.min.js', ['jquery'], false, true);
    wp_enqueue_script('ScrollSmoother-js', AIKEU_THEME_JS_DIR2 . 'gsap/ScrollSmoother.min.js', ['jquery'], false, true);
    wp_enqueue_script('sScrollToPlugin-js', AIKEU_THEME_JS_DIR2 . 'gsap/ScrollToPlugin.min.js', ['jquery'], false, true);
    wp_enqueue_script('sScrollTrigger-js', AIKEU_THEME_JS_DIR2 . 'gsap/ScrollTrigger.min.js', ['jquery'], false, true);
    wp_enqueue_script('sgsap-js', AIKEU_THEME_JS_DIR2 . 'gsap/gsap.min.js', ['jquery'], false, true);
    wp_enqueue_script('sviewport-js', AIKEU_THEME_JS_DIR2 . 'viewport/viewport.jquery.js', ['jquery'], false, true);
    wp_enqueue_script('svanilla-tilt-js', AIKEU_THEME_JS_DIR2 . 'vanilla-tilt/tilt.jquery.js', ['jquery'], false, true);
    wp_enqueue_script('sparticles-js', AIKEU_THEME_JS_DIR2 . 'particle-js/particles.min.js', ['jquery'], false, true);

    wp_enqueue_script('splugin-js', AIKEU_THEME_JS_DIR . 'plugins.js', ['jquery'], '', true);
    wp_enqueue_script('smain-js', AIKEU_THEME_JS_DIR . 'main.js', ['jquery'], '', true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'aikeu_scripts');

/*
Register Fonts
 */
function aikeu_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'aikeu')) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap';
    }
    return $font_url;
}
